let options9 = {
    colors:[],
    chart: {
        height: 120,
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
    series: [],
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

let options10 = {
    colors:[],
    chart: {
        height: 120,
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
    series: [],
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

// const localChartContainer = {};

function requestForSvfeFront(url) {
    $.ajax({
        url: url,
        type: 'get',
        success: (res) => {
            if (res && res.data && res.data.length) {
                renderFrontData(res, "#chart9", options9);
            } else {
                console.log('Data not received');
            }
        },
        error: (err) => {
            console.log(err);
        }
    });
}

function requestForSvboBack(url) {
    $.ajax({
        url: url,
        type: 'get',
        success: (res) => {
            if (res && res.data && res.data.length) {
                renderFrontData(res, "#chart10", options10);
            } else {
                console.log('Data not received');
            }
        },
        error: (err) => {
            console.log(err);
        }
    });
}