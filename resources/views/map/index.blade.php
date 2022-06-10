@extends('layouts.main')
@push('styles')
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css', true) }}"/>
    <link rel="stylesheet" href="{{ asset('css/main.css', true) }}"/>
    <link rel="stylesheet" href="{{ asset('css/media.css', true) }}"/>
@endpush

@section('content')
<div class="map-view">
    <div id="map"></div>
</div>
@endsection

@push('end_scripts')
<script src="{{ asset('js/jquery.min.js', true) }}"></script>
<script src="{{ asset('js/slick.min.js', true) }}"></script>
<script src="{{ asset('js/bootstrap.min.js', true) }}"></script>

<script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU&amp;apikey=24d5cf83-b7b2-40a5-b037-0170bbb4ca67"
            type="text/javascript"></script>
    <script src="{{ asset('js/calculateArea.min.js', true) }}" type="text/javascript"></script>
    <script src="{{ asset('js/polylabel.min.js', true) }}" type="text/javascript"></script>
    <script>
        var myYandexMap, pane, objectManager, options, placemark;
        var marker = [];
        const URL = "{{ env('APP_URL') }}/get-map-data";

		(function () {
            ymaps.ready(init);
            sendReuqestEveryDay(86400000);

            function init() {
                handleWithRequest(URL)
            }

            function sendReuqestEveryDay(counterTime) {
                setInterval(() => {
                    if (myYandexMap) {
                        myYandexMap.destroy();
                    }
                    handleWithRequest(URL, 0)
                }, counterTime);
            }

            function handleWithRequest(URL, time = 0) {
                $.ajax({
                    url: URL,
                    type: 'get',
                    success: function (res) {
                        marker = [];
                        res.data.forEach(element => {
                            marker.push({
                                cords: [element.lat, element.long],
                                count: element.trans_count
                            })
                        });

                        setTimeout(() => {
                            initMap();
                        }, time)
                    },
                    error: function (err) {
                        console.log(err);
                    }
                });
            }

            function initMap() {
                myYandexMap = null;

                createMap();

                makePane();

                makeObjectManager();

                insertMarkers();
            }

            function createMap() {
                myYandexMap = new ymaps.Map('map', {
                    center: [50, 20],
                    zoom: 2,
                    type: null,
                    controls: ['zoomControl']
                }, {
                    minZoom: 3
                });
                myYandexMap.controls.get('zoomControl').options.set({size: 'small'});
            }

            function makePane() {
                pane = new ymaps.pane.StaticPane(myYandexMap, {
                    zIndex: 100, css: {
                        width: '100%', height: '100%', backgroundColor: '#000'
                    }
                });

                myYandexMap.panes.append('greyBackground', pane);
            }

            function makeObjectManager() {
                objectManager = new ymaps.ObjectManager();
                ymaps.borders.load('001', {
                    lang: 'ru',
                    quality: 2
                }).then(function (result) {
                    options = {
                        labelDefaults: 'dark',
                        fillColor: '#595959',
                        strokeColor: '#000',
                        openHintOnHover: false,
                        labelTextSize: {'3_6': 12, '7_18': 14},
                        cursor: 'grab',
                        labelDotCursor: 'pointer',
                        labelPermissibleInaccuracyOfVisibility: 4
                    };
                    objectManager.add(result.features.map(function (feature) {
                        feature.id = feature.properties.iso3166;
                        feature.properties.regionName = feature.properties.iso3166;
                        feature.options = options;
                        return feature;
                    }));
                });
            }

            function insertMarkers() {
                for (let key = 0; key < marker.length; key++) {
                    placemark = new ymaps.Placemark(marker[key].cords, {}, {
                        iconLayout: ymaps.templateLayoutFactory.createClass(`
                            <div class="placemark_layout_container">
                                <div class="circle_layout">
                                    <img src="img/uzcard-icon.png" alt="Icon">

                                    <div class="icon-tooltip">
                                        ${marker[key].count}
                                    </div>
                                </div>
                            </div>
                        `),
                        iconImageHref: 'img/uzcard-icon.png',
                        iconImageSize: [51, 48],
                    })

                    myYandexMap.geoObjects.add(objectManager).add(placemark);
                }
            }
        })();

	</script>
@endpush
