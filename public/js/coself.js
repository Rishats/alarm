/**
 * Created by SKELETON on 01.06.2017.
 */

var xmlhttp = new XMLHttpRequest();
var co = [];
var cojson = [];
xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {

        var cojsonobj = JSON.parse(this.responseText); // Парсим данные с /json адреса

        $.each( cojsonobj, function( key, value ) {
            cojson.push(value);
        }); // Все данные с JSON

        function returnco() {
            for (var i = 0;i<cojson.length; i++) {
                co.push(cojson[i].co);
            } // Получаем температуру
            return co;
        }


        // initialize gauge with value on construction
        var gauge = new RadialGauge({ renderTo: 'scripted-gauge', value: 0 });

        gauge.update({
            minValue: 0,
            maxValue: 1000,
            animation: false,
            width: 500,
            height: 500,
            majorTicks: [
                "0",
                "50",
                "100",
                "150",
                "200",
                "250",
                "300",
                "350",
                "400",
                "450",
                "500",
                "550",
                "600",
                "650",
                "700",
                "750",
                "800",
                "850",
                "900",
                "950",
                "1000",

            ],
            highlights: [
                {
                    "from": 550,
                    "to": 1000,
                    "color": "rgba(200, 50, 50, .75)"
                }
            ],
            title: 'Датчик газа',

        });


// (2)
        function cochanging(now) {
            // change the value at runtime
            gauge.value = now;
        }
        var tnow = returnco();
        cochanging(tnow);
        console.log(tnow);

        gauge = null;
        cojsonobj = null;
        tnow = null;
    }

    co = [];
    cojson = [];
};

setInterval(function() {
    xmlhttp.open("GET", "cojsonnow", true);
    xmlhttp.send();
}, 1000);
