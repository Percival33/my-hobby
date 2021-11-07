// DODAC ANIMACJE W STYLES.CSS !!!!!!!!!!!!!
// ========================================================================================

// jesli JS jest wylaczony to wywietl brak dostepu do wynikow, wlacz JS
// ========================================================================================
// ingerencja w CSS 
// zaznaczenie najlepszego wyniku !!!
// ========================================================================================
// createChild OK
// jak nacisne, to pokaza mi sie wszystkie wyniki z localStorage, kazdy w innym kontenerze (p lub div)
// jak nacisne, to pokaza mi sie wszystkie wyniki z SessionStorage, kazdy w innym kontenerze (p lub div)
// ========================================================================================
// Inne -> pod tabela więcej zdjęć z Jquery TABS
// bez JS wyswietlanie zdjeć w borderach tak jak na stronie głównej

document.addEventListener('DOMContentLoaded', () => {
    document.querySelector('#results-local').onclick;
    document.querySelector('#results-local').onclick;
});

$(document).ready(function () {
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
    $("#submit").click(function () {
        // console.log('==========================================');
        let sail = [];
        $("input:checkbox[name=checkbox]:checked").each(function () {
            sail.push($(this).val());
        });
        let color = $('#color').val();
        let radio = $('input[name="radio"]:checked').val();
        let len = $('#range').val();
        let boat = $('#XD')[0].value.toLowerCase();

        // console.log(`boat = ${boat}`);
        // console.log(`radio = ${radio}`);
        // console.log(`len = ${len}`);

        let points = 0;

        if (color === 'white') {
            points++;
        }
        if (radio === 'bakburta') {
            points++;
        }
        if (len == 7.5) {
            points++;
        }
        if (sail.includes('fok')) {
            points++;
        }
        if (sail.includes('spinaker')) {
            points++;
        }
        if (sail.includes('grot')) {
            points++;
        }
        if(boat === 'omega')
            points++;

        console.log(points);

        $("#dialog-result").text(`${points}/7`);
        $("#dialog").dialog("open");
        return false;
    });
});