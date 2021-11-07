document.addEventListener('DOMContentLoaded', () => {
    // jesli JS jest wylaczony to wywietl brak dostepu do wynikow, wlacz JS
    document.querySelector('#results-local').onclick(function(p) {
        // jak nacisne, to pokaza mi sie wszystkie wyniki z localStorage, kazdy w innym kontenerze (p lub div)
    });
    document.querySelector('#results-local').onclick(function(p) {
        // jak nacisne, to pokaza mi sie wszystkie wyniki z SessionStorage, kazdy w innym kontenerze (p lub div)
    });
});

$(document).ready(function () {
    $(function () {
        $("#dialog").dialog({
            autoOpen: false,
            buttons: {
                'Zamknij': function () {
                    $(this).dialog("close");
                },
                'Zapisz wynik': function () {
                    $(this).dialog("close");
                }
            }
        });
        $("#submit").click(function (e) {
            let sail = document.querySelectorAll('input[name="checkbox"]:checked');
            let color = document.querySelector('#color').value;
            let radio = document.querySelector('input[name="radio"]:checked').value;
            let len = document.querySelector('#range').value;
            let boat = document.querySelector('#text').value.toLowerCase();

            let points = 0;

            if (color === 'white')
                points++;
            if (radio === 'Bakburta')
                points++;
            if (len === 7.5)
                points++;
            if (sail.includes('fok'))
                points++;
            if (sail.includes('spinaker'))
                points++;
            if (sail.includes('grot'))
                points++;

            $('#dialog p').text = (`${points}/0`);
            e.preventDefault();
            $("#dialog").dialog("open");
        });
    });
});