ymaps.ready(init);

function init() {

    var myMap = new ymaps.Map("map", {
            center: [55.76, 37.64],
            zoom: 3,
        }, {
            searchControlProvider: 'yandex#search'
        }),

    // Создаем геообъект с типом геометрии "Точка".
        myGeoObject = new ymaps.GeoObject({
              preset: 'islands#blackStretchyIcon',
        });
        myMap.behaviors.disable('scrollZoom');
    myMap.geoObjects
        .add(myGeoObject)

        .add(new ymaps.Placemark([65.687086, 67.529789], {
                balloonContent: '<strong>crocodile\'s nose</strong> color',
                iconCaption: 'Really, really long but super interesting text'
        }, {
            // iconLayout: 'default#image',
            // iconImageHref: 'img/marker.png',
            iconImageSize: [50, 60],
             preset: 'islands#greenDotIconWithCaption'
        }))
        .add(new ymaps.Placemark([ 0.334873, 32.567497], {
                balloonContent: '<strong>this is Ugada university and reyting 772 in top 1000</strong>',
                iconCaption: 'this is Ugada university and reyting 772 in top 1000'
        }, {
            // iconLayout: 'default#image',
            // iconImageHref: 'img/marker.png',
            iconImageSize: [50, 60],
             preset: 'islands#greenDotIconWithCaption'
        }))

}















