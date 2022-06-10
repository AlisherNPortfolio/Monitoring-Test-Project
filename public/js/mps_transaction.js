let options2 = {
    colors: ["#07ec67", "#217243"],

    chart: {
        width: '100%',
        height: 130,
        type: "area",
        zoom: {
            enabled: false
        },
        colors: '#fff',

    },
    dataLabels: {
        enabled: false
    },
    grid: {
        position: 'front'
    },
    series: [
        {
            name: "MPS Front",
            data: []
        }
    ],
    fill: {
        type: "true",
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

let ipsChartContainer = null;

function getMpsFrontData(url) {
    $.ajax({
        url: url,
        type: 'get',
        success: (res) => {
            console.log('mps front', res)
            generateIpsTransactionData(res.data);
        },
        error: (err) => {
            console.log(err);
        }
    });
}

function generateIpsTransactionData(data) {
    let series = [],
        categories = [],
        element = document.querySelector("#chart2");

        data.forEach(v => {
            series.push(v.tps);
            categories.push(v.hh);
        });
        options2.series[0].data = series;
        options2.xaxis.categories = categories;

        element.innerHTML = "";

        if (ipsChartContainer) {
            ipsChartContainer.updateSeries([{
                name: "MPS Front",
                data: series
            }]);

            ipsChartContainer.updateOptions({
                xaxis: {
                    categories: categories
                }
            })
        } else {
            ipsChartContainer = new ApexCharts(element, options2);
            ipsChartContainer.render();
        }

        $("#tps_mps_count").html(series[series.length - 1]);
}
