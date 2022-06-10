const BORDER = 6800,
      LIMIT = 4000,
      ELEMENT = '#chart4',
      COUNT_ELEMENT = '#otpBepTotal',
      BORDER_ELEMENT = '#otpBepGood';
let options4 = {
    colors: [],
    chart: {
        width: "100%",
        height:180,
        type: "area",
        zoom: {
            enabled: false
        }
    },
    dataLabels: {
        enabled: false
    },
    grid: {
        position: 'front'
    },
    series: [
        {
            name: "Negative Balance",
            data: []
        }
    ],
    fill: {
        type: "gradient",
        gradient: {
            shadeIntensity: 1,
            opacityFrom: 0.7,
            opacityTo: 0.0,
            stops: [0, 90, 100]
        }
    },
    xaxis: {
        categories: [],
        labels: {
            style: {
                colors: '#8c8c8c',
                fontSize: '14px',
                fontFamily: 'sf-text-semibold',
                fontWeight: 600,
                cssClass: 'apexcharts-xaxis-label',
            },
        },

    },
};

let chartNegativeBalance = null;

function requestForNegativeBalance(url) {
    $.ajax({
        url: url,
        type: 'get',
        success: (res) => {
            if (res && res.data && res.data.length) {
                negativeBalanceData(options4, res);
            } else {
                console.log('Data not received');
            }
        },
        error: (err) => {
            console.log(err);
        }
    });
}

function negativeBalanceData(configData, data) {
    const result = generateNegativeBalanceData(data),
          element = document.querySelector(ELEMENT);
    let colors = "#757575";
    
    if (result.total[result.total.length - 1] >= result.border) {
        colors = "#f23d5b";
    }

    configData.colors.push(colors);
    configData.series[0].data = result.total;
    configData.xaxis.categories = result.time;

    element.innerHTML = "";
    if (chartNegativeBalance) {
        chartNegativeBalance.updateSeries([{
            name: 'Negative Balance',
            data: result.total
        }]);

        chartNegativeBalance.updateOptions({
            xaxis: {
                categories: result.time
            }
        })
    } else {
        chartNegativeBalance = new ApexCharts(element, configData);
        chartNegativeBalance.render();
    }
    $(COUNT_ELEMENT).html(result.total[result.total.length - 1]);
    $(BORDER_ELEMENT).html(BORDER);
}

function generateNegativeBalanceData(data) {
    let total = [],
        time = [];
    Object.values(data.data).forEach(v => {
        total.push(v.count);
        time.push(v.full_time);
    });
    
    return {'total': total, 'time': time, 'border': LIMIT};
}
