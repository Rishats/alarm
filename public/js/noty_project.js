var xmlhttps = new XMLHttpRequest();
xmlhttps.onreadystatechange = function() {
    if (this.readyState !== 4 || this.status !== 200) {
        return;
    }
    var noty = [];
    var notyjsonobj = JSON.parse(this.responseText); // Парсим данные с /json адреса

    $.each( notyjsonobj, function( key, value ) {
        noty.push(value);
    }); // Все данные с JSON
    console.log(noty[0]);
    console.log(noty[1]);
    if(noty[0] >= 550)
    {
        {
            new Noty({
                type: 'warning',
                layout: 'topRight',
                theme: 'nest',
                text: 'CO в воздухе привысила норму!',
                timeout: 5000,
                progressBar: true,
                closeWith: ['click', 'button'],
                animation: {
                    open: 'noty_effects_open',
                    close: 'noty_effects_close'
                },
                id: false,
                force: false,
                killer: false,
                queue: 'global',
                container: false,
                buttons: [],
                sounds: {
                    sources: ['wav/warning.wav'],
                    volume: 1,
                    conditions: []
                },
                titleCount: {
                    conditions: []
                },
                modal: false
            }).show()

            var sound = new Howl({
                src: ['wav/warning.wav']
            });

            sound.play(); // Включение звука
        }
    }
    if(noty[1] >= 32)
    {
        {
            new Noty({
                type: 'warning',
                layout: 'topRight',
                theme: 'nest',
                text: 'Температура привысила норму!',
                timeout: 5000,
                progressBar: true,
                closeWith: ['click', 'button'],
                animation: {
                    open: 'noty_effects_open',
                    close: 'noty_effects_close'
                },
                id: false,
                force: false,
                killer: false,
                queue: 'global',
                container: false,
                buttons: [],
                sounds: {
                    sources: ['wav/warning.wav'],
                    volume: 1,
                    conditions: []
                },
                titleCount: {
                    conditions: []
                },
                modal: false
            }).show()

            var sound = new Howl({
                src: ['wav/warning.wav']
            });

            sound.play(); // Включение звука
        }
    }
};

setInterval(function() {
    xmlhttps.open("GET", "notyjsonnow");
    xmlhttps.send();
}, 1000);
