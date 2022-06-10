let options1 = {
    colors: [],
    chart: {
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
            name: "TPS Local",
            data: []
        }
    ],
    fill: {
        type: "true",
    },
    xaxis: {
        categories: [
            
        ],
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

let options5 = {
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
            name: "Total",
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
        categories: [

        ],
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

let options6 = {
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
            name: "POS total",
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
        categories: [

        ],
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

let options7 = {
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
            name: "EPOS total",
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
        categories: [

        ],
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

let options11 = {
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
            name: "ATM total",
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
        categories: [

        ],
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

let chartData = {
    chart1: {
        total: "tps",
        good: null,
        chart: "#chart1",
        configData: options1,
        color: "#3696F6",
        name: "TPS Local"
    },
    chart5: {
        total: "total",
        good: "totalGood",
        chart: "#chart5",
        configData: options5,
        name: "Total"
    },
    chart6: {
        total: "pos_total",
        good: "pos_good",
        chart: "#chart6",
        configData: options6,
        name: "POS total"
    },
    chart7: {
        total: "epos_total",
        good: "epos_good",
        chart: "#chart7",
        configData: options7,
        name: "EPOS total"
    },
    chart11: {
        total: "atm_total",
        good: "atm_good",
        chart: "#chart11",
        configData: options11,
        name: "ATM total"
    },
}

const chartContainer = {};

function generateData(data) {
        let result = {},
            otpBepTotal = [],
            otpBepGood = [];
            otpBepTime = [];

            pos_total = [];
            pos_good = [];

            epos_total = [];
            epos_good = [];

            atm_total = [];
            atm_good = [],
            tps = [];

        data.forEach(element => {
            otpBepTotal.push(element.total);
            otpBepGood.push(element.total - element.good);
            otpBepTime.push(element.hh);

            pos_total.push((element.pos_good + element.pos_err));
            pos_good.push(element.pos_err);

            epos_total.push((element.epos_good + element.epos_err));
            epos_good.push(element.epos_err);

            atm_total.push((element.atm_good + element.atm_err));
            atm_good.push(element.atm_err);

            tps.push(element.tps);
        });

        result.time = otpBepTime;

        result.otpBepTotal = otpBepTotal;
        result.otpBepGood = otpBepGood;

        result.total = otpBepTotal;
        result.totalGood = otpBepGood;

        result.pos_total = pos_total;
        result.pos_good = pos_good;

        result.epos_total = epos_total;
        result.epos_good = epos_good;

        result.atm_total = atm_total;
        result.atm_good = atm_good;
        result.tps = tps;

        return result;
    }


function createTransactionChart(selector, data, totalId, goodId, goodData, seriesName) {
    let element = document.querySelector(selector);
    element.innerHTML = "",
    totalData = data.series[0].data;

    if (chartContainer[selector]) {
        chartContainer[selector].updateSeries([{
            name: seriesName,
            data: totalData
        }]);
        chartContainer[selector].updateOptions({
            xaxis: {
                categories: data.xaxis.categories
            }
        })
    } else {
        let chart = new ApexCharts(element, data);
        chartContainer[selector] = chart;
        chart.render();
    }
    $(totalId).html(totalData[totalData.length - 1]);
    if (goodId) {
        $(goodId).html(goodData[goodData.length - 1]);
    }
}

function renderChart(configData, data, dataNames, chartId) {
    let totalId = '#' + dataNames.total,
        goodId = dataNames.good ? '#' + dataNames.good : null;
    let color = dataNames.color ? dataNames.color : getStatusColor(data[dataNames.total], data[dataNames.good]);
    
    configData.colors.push(color);
    configData.series[0].data = data[dataNames.total];
    configData.xaxis.categories = data.time;
    createTransactionChart(chartId, configData, totalId, goodId, data[dataNames.good], dataNames.name);
}

function sendRequestForTransactions(url, method = 'get') {
    $.ajax({
        url: url,
        type: method,
        success: (res) => {
            manageWithData(res.data);
        },
        error: (err) => {
            console.log(err);
        }
    });
    }
function manageWithData(data) {
    let gData = generateData(data);
    let dataNames = null;
    
    Object.values(chartData).forEach(val => {
        dataNames = {total: val.total, good: val.good, name: val.name};
        if (val.color) {
            dataNames['color'] = val.color;
        }
        renderChart(val.configData, gData, dataNames, val.chart);
    });
    console.log('Chart updated')
}