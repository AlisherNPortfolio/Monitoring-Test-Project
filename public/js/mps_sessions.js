let options3 = {
    colors:['#f2994a', '#437fd3', '#339c60', '#f23d5b'],
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
    series: [
        
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
            "12:00",
            "12:05",
            "12:10",
            "12:15",
            "12:20",
            "12:25",
            "12:30",
            "12:35",
            "12:40",
            "12:45",
            "12:50",
            "12:55",
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

let options8 = {
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

const mpsChartContainer = {};

function requestForMpsFront(url) {
    $.ajax({
        url: url,
        type: 'get',
        success: (res) => {
            if (res && res.data && res.data.length) {
                renderFrontData(res, "#chart3", options3);
            } else {
                console.log('Data not received');
            }
        },
        error: (err) => {
            console.log(err);
        }
    });
}
function requestForMpsBack(url) {
    $.ajax({
        url: url,
        type: 'get',
        success: (res) => {
            if (res && res.data && res.data.length) {
                renderFrontData(res, "#chart8", options8);
            } else {
                console.log('Data not received');
            }
        },
        error: (err) => {
            console.log(err);
        }
    });
}
function renderFrontData(data, selector, options) {
    let generatedData = generateFrontData(data.data),
        element = document.querySelector(selector);
    options.series = [];
    options.colors = [];
    options.xaxis.categories = [];

    Object.values(generatedData.data).forEach(v => {
        options.series.push({
            name: v.name,
            data: v.data
        });
        options.colors.push(v.color);
    });

    options.xaxis.categories = generatedData.time;
    // generateTime(generatedData.time);

    element.innerHTML = "";
    if (mpsChartContainer[selector]) {
        mpsChartContainer[selector].updateSeries(options.series);
        mpsChartContainer[selector].updateOptions({
            xaxis: {
                categories: options.xaxis.categories
            }
        })
    } else {
        let chart = new ApexCharts(element, options);
        mpsChartContainer[selector] = chart;
        chart.render();
    }
}

function generateFrontData(data) {
    let apps = [],
        commits = [],
        concurrencies = [],
        configurations = [],
        cpus = [],
        networks = [],
        others = [],
        systems = [],
        users = [],
        times = [];

    data.forEach(v => {
        apps.push(v.application);
        commits.push(v.commit);
        concurrencies.push(v.concurrency);
        configurations.push(v.configuration);
        cpus.push(v.cpu);
        networks.push(v.network);
        others.push(v.other);
        systems.push(v.system);
        users.push(v.user_io);
        let time = new Date(v.tm),
            minute = time.getMinutes();
        if (minute < 10) {
            minute = "0" + String(minute);
        }
        
        times.push(time.getHours() + ":" + minute);
    });

    return {
        data: {
            apps: {name: 'Application', color: '#BB6BD9', data: apps},
            commits: {name: 'Commit', color: '#6FCF97', data: commits},
            concurrencies: {name: 'Concurrency', color: '#9B2D30', data: concurrencies},
            configurations: {name: 'Configuration', color: '#2F80ED', data: configurations},
            cpus: {name: 'CPU Used', color: '#219653', data: cpus},
            networks: {name: 'Network', color: '#219653', data: networks},
            others: {name: 'Other', color: '#F23D5B', data: others},
            systems: {name: 'System I/O', color: '#DDE8ED', data: systems},
            users: {name: 'User I/O', color: '#F2C94C', data: users}
        },
        time: times
    };
}