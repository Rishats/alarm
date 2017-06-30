/**
 * Created by SKELETON on 31.05.2017.
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



        function temperaturemonitoringchanging() // Рисуем график и выводим данные с датчика температуры за последние 60 секунд
        {
            var temperaturemonitoringchangingdata = returntemperature();
            var ctx = document.getElementById("temperaturemonitoringchart1");
            var tmonitoring = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34,35,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50,51,52,53,54,55,56,57,58,59,60],
                    datasets: [{
                        label: 'Изменение температуры на этой секунде',
                        data: temperaturemonitoringchangingdata,
                        borderColor: 'yellow',
                        borderDash: [1],
                        pointBackgroundColor: 'white',

                    }]

                },
                options: {
                    animation : false
                }


            });


        }
        temperaturemonitoringchanging();



    }

};

xmlhttp.open("GET", "temperaturejsonminute", true);
xmlhttp.send();


