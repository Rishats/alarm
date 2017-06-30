var xmlhttp = new XMLHttpRequest();
var co = [];
var cojson = [];
xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {

        var cojsonobj = JSON.parse(this.responseText); // Парсим данные с /json адреса


        $.each( cojsonobj, function( key, value ) {
            cojson.push(value);
        }); // Все данные с JSON

        function returntemperature() {
            for (var i = 0;i<cojson.length; i++) {
                co.push(cojson[i].co);
            } // Получаем температуру
            return co;
        }



        function comonitoringchanging() // Рисуем график и выводим данные с датчика температуры за последние 60 секунд
        {
            var comonitoringchangingdata = returntemperature();
            var ctx = document.getElementById("comonitoringchart1");
            var cmonitoring = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34,35,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50,51,52,53,54,55,56,57,58,59,60],
                    datasets: [{
                        label: 'Изменение CO на этой секунде',
                        data: comonitoringchangingdata,
                        borderColor: 'blue',
                        borderDash: [1],
                        pointBackgroundColor: 'red',

                    }]

                },
                options: {
                    animation : false
                }


            });


        }
        comonitoringchanging();



    }

};
xmlhttp.open("GET", "cojsonminute", true);
xmlhttp.send();
