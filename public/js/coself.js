/**
 * Created by SKELETON on 01.06.2017.
 */
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

}).draw();

var xmlhttp = new XMLHttpRequest();
xmlhttp.onreadystatechange = function() {
    if (this.readyState !== 4 || this.status !== 200) {
        return;
    }

    var co = [];
    $.each(JSON.parse(this.responseText), function(key, value) {
        co.push(value.co);
    });

    gauge.value = co;
};

setInterval(function() {
    xmlhttp.open("GET", "cojsonnow", true);
    xmlhttp.send();
}, 1000);