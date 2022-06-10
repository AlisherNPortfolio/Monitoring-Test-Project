@extends('layouts.main')
@push('styles')
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css', true) }}"/>
    <link rel="stylesheet" href="{{ asset('css/main.css', true) }}"/>
    <link rel="stylesheet" href="{{ asset('css/media.css', true) }}"/>
@endpush

@section('content')
<section class="nd_block_one">
    <div class="d-flex mb-3">
        <div class="d-flex w-100 flex-column">
            <div class="nd_chart_block w-100 tps-local">
                <div class="nd_chart_title">
                    <p class="nd_text_h1"><span class="nd_text_h1">TPS</span> Local</p>
                </div>

                <div id="chart1" class="nd_chart1">
                    <div class="nd_chart_img">
                        <img src="img/grid%202.png" alt="">
                    </div>
                </div>
                <div class="nd_absolut_text">
                    <p class="nd_text_h2" id="tps"></p>
                </div>

            </div>

            <div class="nd_chart_block nn_block tps-local">
                <div class="nd_chart_title">
                    <p class="nd_text_h1"><span class="nd_text_h1">TPS</span>MPS</p>
                </div>
                <div id="chart2" class="nd_chart1">
                    <div class="nd_chart_img">
                        <img src="img/grid%202.png" alt="">
                    </div>
                </div>
                <div class="nd_absolut_text">
                    <p class="nd_text_h2" id="tps_mps_count"></p>
                </div>

            </div>
        </div>
    </div>
    <div class="d-flex second-child">
        <div class="d-flex flex-wrap align-content-lg-start wdd">
            <div class="nd_static">
                <div class="nd_chart_block mb-0 w-100 mr-3">
                    <div class="nd_chart_title">
                        <p class="nd_text_h1">MPS <span class="nd_gray">Front</span></p>
                    </div>
                    <div id="chart3" class="nd_chart3">
                        <div class="nd_chart_img">
                            <img src="img/grid%202.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="nd_static">
                <div class="nd_chart_block mb-0 w-100 mr-3">
                    <div class="nd_chart_title">
                        <p class="nd_text_h1">MPS <span class="nd_gray">Back</span></p>
                    </div>
                    <div id="chart8" class="nd_chart3">
                        <div class="nd_chart_img">
                            <img src="img/grid%202.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="nd_static">
                <div class="nd_chart_block mb-0 w-100 mr-3">
                    <div class="nd_chart_title">
                        <p class="nd_text_h1">Local <span class="nd_gray">Front</span></p>
                    </div>
                    <div id="chart9" class="nd_chart3">
                        <div class="nd_chart_img">
                            <img src="img/grid%202.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="nd_static">
                <div class="nd_chart_block mb-0 w-100 mr-3">
                    <div class="nd_chart_title">
                        <p class="nd_text_h1">Local <span class="nd_gray">Back</span></p>
                    </div>
                    <div id="chart10" class="nd_chart3">
                        <div class="nd_chart_img">
                            <img src="img/grid%202.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="nd_static_item_pages">
        <div class="nd_static_item">
            <div class="nd_chart_item  mb-0 ">
                <div class="nd_chart_title">
                    <p class="nd_text_h6 " style="opacity: 1">ОТРЦ бал. </p>
                </div>
                <div class="nd_item_title">
                    <p class="nd_text_h8"><span id="otpBepTotal">0</span> /<span class="nd_gray" id="otpBepGood"> 0</span></p>
                </div>
                <div id="chart4" class="nd_chart2">
                </div>
            </div>
        </div>


        <div class="nd_static_item">
            <div class="nd_chart_item  mb-0 ">
                <div class="nd_chart_title">
                    <p class="nd_text_h6 " style="opacity: 1">Общий <span class="nd_gray">% не успешных транзакций</span></p>
                </div>
                <div class="nd_item_title">
                    <p class="nd_text_h8"><span id="total">0</span> /<span class="nd_gray" id="totalGood"> 0</span></p>
                </div>
                <div id="chart5" class="nd_chart2">
                </div>
            </div>
        </div>



        <div class="nd_static_item">
            <div class="nd_chart_item  mb-0 ">
                <div class="nd_chart_title">
                    <p class="nd_text_h6 " style="opacity: 1">POS <span class="nd_gray">% не успешных транзакций</span></p>
                </div>
                <div class="nd_item_title">
                    <p class="nd_text_h8"><span id="pos_total">0</span> /<span class="nd_gray" id="pos_good"> 0</span></p>
                </div>
                <div id="chart6" class="nd_chart2">
                </div>
            </div>
        </div>


        <div class="nd_static_item">
            <div class="nd_chart_item  mb-0 ">
                <div class="nd_chart_title">
                    <p class="nd_text_h6 " style="opacity: 1">EPOS <span class="nd_gray">% не успешных транзакций</span></p>
                </div>
                <div class="nd_item_title">
                    <p class="nd_text_h8"><span id="epos_total">0</span> /<span class="nd_gray" id="epos_good"> 0</span></p>
                </div>
                <div id="chart7" class="nd_chart2">
                </div>
            </div>
        </div>


        <div class="nd_static_item">
            <div class="nd_chart_item  mb-0 ">
                <div class="nd_chart_title">
                    <p class="nd_text_h6 " style="opacity: 1">ATM <span class="nd_gray">% не успешных транзакций</span></p>
                </div>
                <div class="nd_item_title">
                    <p class="nd_text_h8"><span id="atm_total">0</span> /<span class="nd_gray" id="atm_good"> 0</span></p>
                </div>
                <div id="chart11" class="nd_chart2">
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@push('end_scripts')
<script src="{{ asset('js/jquery.min.js', true) }}"></script>
<script src="{{ asset('js/slick.min.js', true) }}"></script>
<script src="{{ asset('js/bootstrap.min.js', true) }}"></script>
<script src="{{ asset('js/general.js', true) }}"></script>
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script src="{{ asset('js/success_transactions.js', true) }}"></script>
<script src="{{ asset('js/negative_balance.js', true) }}"></script>
<script src="{{ asset('js/mps_sessions.js', true) }}"></script>
<script src="{{ asset('js/local_sessions.js', true) }}"></script>
<script src="{{ asset('js/mps_transaction.js', true) }}"></script>
<script>
function sendReuqestByInterval(url, func, time = 60) {
    func(url);
    setInterval(() => {
        func(url);
    }, time * 1000);
}

// URLs
const URL_SUCCESS_TRANSACTIONS = "{{ env('APP_URL') }}/get-transaction-data";
const URL_NEGATIVE_BALANCE = "{{ env('APP_URL') }}/get-negative-balance";

const URL_MPS_FRONT = "{{ env('APP_URL') }}/get-som1";
const URL_MPS_BACK = "{{ env('APP_URL') }}/get-some2";
const URL_LOCAL_FRONT = "{{ env('APP_URL') }}/get-some3";
const URL_LOCAL_BACK = "{{ env('APP_URL') }}/get-some4";
const URL_TPS_MPS = "{{ env('APP_URL') }}/get-transaction";
/**
* Data: get successfull transactions data.
* Function name: sendRequestForTransactions.
* Time interval: 1 min
*/
sendReuqestByInterval(URL_SUCCESS_TRANSACTIONS, sendRequestForTransactions);

/**
* Data: get negative balance data.
* Function name: requestForNegativeBalance.
* Time interval: 10 min
*/
sendReuqestByInterval(URL_NEGATIVE_BALANCE, requestForNegativeBalance, 60);

/**
* Data: get top active session ips svfe data.
* Function name: requestForMpsFront.
* Time interval: 5 min
*/
sendReuqestByInterval(URL_MPS_FRONT, requestForMpsFront, 300);

/**
* Data: get top active session ips svbo data.
* Function name: requestForMpsBack.
* Time interval: 5 min
*/
sendReuqestByInterval(URL_MPS_BACK, requestForMpsBack, 300);

/**
* Data: get top active session svfe data.
* Function name: requestForSvfeFront.
* Time interval: 5 min
*/
sendReuqestByInterval(URL_LOCAL_FRONT, requestForSvfeFront, 300);

/**
* Data: get top active session svbo data.
* Function name: requestForSvboBack.
* Time interval: 5 min
*/
sendReuqestByInterval(URL_LOCAL_BACK, requestForSvboBack, 300);

/**
* Data: get ips transaction count data.
* Function name: getMpsFrontData.
* Time interval: 1 min
*/
sendReuqestByInterval(URL_TPS_MPS, getMpsFrontData, 60);
</script>
@endpush
