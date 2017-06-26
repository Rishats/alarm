/**
 * Created by SKELETON on 01.06.2017.
 */

    var xmlhttp = new XMLHttpRequest();
    var temperature = [];
    var temperaturejson = [];
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {

            var temperaturejsonobj = JSON.parse(this.responseText); // Парсим данные с /json адреса

            $.each( temperaturejsonobj, function( key, value ) {
                temperaturejson.push(value);
            }); // Все данные с JSON

            function returntemperature() {
                for (var i = 0;i<temperaturejson.length; i++) {
                    temperature.push(temperaturejson[i].temperature);
                } // Получаем температуру
                return temperature;
            }


            var gauge = new LinearGauge({ renderTo: 'canvas-id', value: 0 });

            gauge.update({
                minValue: 0,
                maxValue: 50,
                animation: false,
                width: 500,
                height: 500,
                majorTicks: [
                    "0",
                    "10",
                    "20",
                    "30",
                    "40",
                    "50"

                ],

            });



// (2)
            function temperaturechanging(now) {
                // change the value at runtime
                gauge.value = now;
            }
            var tnow = returntemperature();
            temperaturechanging(tnow);
            console.log(tnow);

            gauge = null;
            temperaturejsonobj = null;
            tnow = null;
        }

        temperature = [];
        temperaturejson = [];
    };

setInterval(function() {
    xmlhttp.open("GET", "temperaturejsonnow", true);
    xmlhttp.send();
}, 1000);
