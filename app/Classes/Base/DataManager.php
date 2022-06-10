<?php

namespace App\Classes\Base;

use App\Classes\Traits\GeneralTrait;
use App\Classes\Traits\GettingTraits;
use App\Classes\Traits\SavingTraits;
use App\Classes\Traits\InfoTrait;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Carbon;
use App\Classes\Contracts\IManager;

abstract class DataManager implements IManager
{
    use SavingTraits, GeneralTrait, GettingTraits, InfoTrait;

    public const STANDARD_TIME_FORMAT = 'Y-m-d H:i:s';

    public const ORDER_TYPE_DESC = 'desc';

    public const ORDER_TYPE_ASC = 'asc';

    /**
     * URL for an external API
     *
     * @var string
     */
    protected $url;

    /**
     * A model for a data from an external API
     *
     * @var string
     */
    protected $model;

    /**
     * A container for a data from an external API
     *
     * @var array
     */
    protected $apiData = [];

    /**
     * Searching time parameter which starts from
     *
     * @var string
     */
    protected $fromTime;

    /**
     * Searching time parameter which ends to
     *
     * @var string
     */
    protected $toTime;

    /**
     * Searching time parameter for a time range
     *
     * @var object
     */
    protected $now;

    /**
     * Searching time parameter format
     *
     * @var string
     */
    public $searchTimeFormat = self::STANDARD_TIME_FORMAT;

    /**
     * Searching time parameter field name
     *
     * @var string
     */
    public $searchTimeName = 'created_at';

    /**
     * If a retrieving data count is more than one
     *
     * @var bool
     */
    public $isMultiple = false;

    /**
     * Order by a given column
     *
     * @var string
     */
    private $orderByColumn;

    /**
     * ordering type
     *
     * @var string
     */
    private $orderBy;

    /**
     * set pagination to retrieving data
     *
     * @var boolean
     */
    private $hasPagination = false;

    /**
     * pagination per page count
     *
     * @var int
     */
    private $perPage = 10;

    /**
     * set configurations for a manager
     *
     * @param string $path
     * @return void
     */
    public function config(string $path)
    {
        $this->setUrl($path);

        $this->setCurrentTime();
    }

    /**
     * Set a url for an external API
     *
     * @param string $path
     * @return void
     */
    protected function setUrl(string $path)
    {
        $url = config('transaction.url');
        $port = config('transaction.port');

        if (!$url || !$port || !$path) {
            throw new \InvalidArgumentException('Url or port not found!');
        }

        $url = $url . ':' . $port . $path;

        $this->url = $url;
    }

    /**
     * Check a model of a manager exists
     *
     * @return void
     */
    private function checkModelExist()
    {
        $modelData = $this->getModelData();

        if (!$this->model || $modelData->getParentClass()->name !== 'Illuminate\Database\Eloquent\Model') {
            throw new \Exception('$model property has been not assigned or was not given proper class!');
        }
    }

    /**
     * Set current time for a searching time parameter
     *
     * @return void
     */
    private function setCurrentTime()
    {
        $this->now = Carbon::now();
    }

    /**
     * Set ordeing column name and ordering type
     * 
     * @param string $column
     * @param string $type
     * @return void
     */
    public function setOrderBy(string $column, string $type = self::ORDER_TYPE_DESC)
    {
        $this->orderByColumn = $column;
        $this->orderBy = $type;
    }

    /**
     * Set ordeing column name and ordering type
     * 
     * @param string $perPage
     * @return void
     */
    public function setPagination(int $perPage)
    {
        $this->hasPagination = true;
        $this->perPage = $perPage;
    }

    /**
     * Get data from an external API
     *
     * @return void
     */
    public function getApiData(): void
    {
        $response = Http::post($this->url);

        if ($response->successful()) {
            $this->apiData = $this->getResult($response->body());
        } else {
            $this->retryAPI();
        }
    }

    /**
     * Check data from an external API is empty
     *
     * @return void
     */
    public function checkApiData()
    {
        $modelName = $this->getModelData();
        $time = date('Y-m-d H:i:s');

        if (
            !$this->apiData ||
            !is_array($this->apiData)
        ) {
            $errorMsg = "{$modelName->getName()} could not be get!";
            Log::channel('monitoringlog')->error("Error: " . $errorMsg . "\nError time: {$time}");
            $this->retryAPI();
            // throw new \Exception($errorMsg . ' ' . $time);
        }
    }

    public function getApiUrl()
    {
        $url = explode("/", $this->url);
        return $url[count($url) - 1];
    }

    /**
     * Save data into database
     *
     * @return void
     */
    public function saveData()
    {
        $this->beforeSave();

        $this->save();
    }

    /**
     * Get data from database
     *
     * @return void
     */
    public function getData()
    {
        $this->beforeGet();

        return $this->get();
    }
}
