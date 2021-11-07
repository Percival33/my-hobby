// DODAC ANIMACJE W STYLES.CSS !!!!!!!!!!!!!
// ========================================================================================

// jesli JS jest wylaczony to wywietl brak dostepu do wynikow, wlacz JS
// ========================================================================================
// ingerencja w CSS 
// zaznaczenie najlepszego wyniku !!!
// ========================================================================================
// createChild
// jak nacisne, to pokaza mi sie wszystkie wyniki z localStorage, kazdy w innym kontenerze (p lub div)
// jak nacisne, to pokaza mi sie wszystkie wyniki z SessionStorage, kazdy w innym kontenerze (p lub div)
// ========================================================================================
// Inne -> pod tabela więcej zdjęć z Jquery TABS
// bez JS wyswietlanie zdjeć w borderach tak jak na stronie głównej

document.addEventListener('DOMContentLoaded', () => {

    function addParagrapgh(where) {
        let p = document.createElement("P");
        p.innerHTML = "Brak wyników. Rozwiąż quiz!"
        let div = document.querySelector(where);
        div.appendChild(p);
    }

    document.querySelector('#quiz').onclick = () => {};
    document.querySelector('#results-session button').onclick = () => {
        console.log('==================================================');
        let results = localStorage.getItem("results");
        console.log(`session results = ${results}`);
        if (document.querySelector('#results-session div p') === null) {
            addParagrapgh('#results-session div');
        } else {
            results = JSON.parse(results);
            for (let i = 0; i < results.length; i++) {
                console.log(`i = ${i} session res = ${results[i]}`);
            }
        }
    };



    document.querySelector('#results-local button').onclick = () => {
        console.log('==================================================');
        // document.querySelector('#results-local').style.height = "100%";
        let results = localStorage.getItem("results");
        console.log(`local results = ${results}`);
        if (document.querySelector('#results-local div p') === null) {
            addParagrapgh('#results-local div');
        } else {
            results = JSON.parse(results);
            for (let i = 0; i < results.length; i++) {
                console.log(`i = ${i} local res = ${results[i]}`);
            }
        }
    }
});

$(document).ready(function () {
    $("#dialog").dialog({
        autoOpen: false,
        buttons: {
            'Zamknij': function () {
                $(this).dialog("close");
            },
            'Zapisz wynik': function() {
                const points = $(this).data('points');
                console.log(points);
                const results = localStorage.getItem("results");
                console.log(results);
                // localStorage.setItem("results", JSON.stringify(myJSON));
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
        if (boat === 'omega')
            points++;

        // console.log(points);
        $("#dialog-result").text(`${points}/7`);
        $("#dialog").data('points', points).dialog("open");
        return false;
    });
});