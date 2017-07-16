/**
 * Created by SKELETON on 01.06.2017.
 */

var gauge = new LinearGauge({
    renderTo: 'canvas-id',
    value: 0,
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
}).draw();
var xmlhttp = new XMLHttpRequest();
xmlhttp.onreadystatechange = function() {
    if (this.readyState !== 4 || this.status !== 200) {
        return;
    }

    var temperature = [];
    $.each(JSON.parse(this.responseText), function(key, value) {
        temperature.push(value.temperature);
    });

    gauge.value = temperature;
};

setInterval(function() {
    xmlhttp.open("GET", "temperaturejsonnow", true);
    xmlhttp.send();
}, 1000);
