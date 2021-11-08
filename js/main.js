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

    function addParagrapgh(where, text) {
        let p = document.createElement("P");
        p.innerHTML = text;
        let div = document.querySelector(where);
        div.appendChild(p);
    }

    getLocalResults = () => {
        const obj = JSON.parse(localStorage.getItem('results'));
        // console.log(`${JSON.parse(obj)} obj`);
        if (obj === null)
            return JSON.parse(JSON.stringify({
                "results": Array(0)
            })).results;
        return obj.results;
    }

    getSessionResults = () => { // should always return an array
        const obj = JSON.parse(sessionStorage.getItem('results'));
        // console.log(`${JSON.parse(obj)} obj`);
        if (obj === null)
            return JSON.parse(JSON.stringify({
                "results": Array(0)
            })).results;
        return obj.results;
    }

    setLocalResults = (data) => {
        localStorage.setItem('results', JSON.stringify({
            "results": data
        }));
    }

    setSessionResults = (data) => { // gets an array
        sessionStorage.setItem('results', JSON.stringify({
            "results": data
        }));
    }

    document.querySelector('#quiz').onclick = () => {};

    document.querySelector('#results-session button').onclick = () => {
        console.log('==================================================');
        const paragraps = document.querySelectorAll('#results-session div p');
    
        if (paragraps.length === 0 && getSessionResults().length === 0) {
            addParagrapgh('#results-session div', 'Brak wyników. Rozwiąż quiz!');
        } else if(getSessionResults().length > 0) {
            let div = document.querySelector('#results-session div');
            while(div.firstChild) {
                div.removeChild(div.firstChild);
            }
            const results = getSessionResults();
            for (let i = 0; i < results.length; i++) {
                // console.log(`i = ${i} session res = ${results[i]}`);
                addParagrapgh('#results-session div', results[i]);
            }
        }
    };

    document.querySelector('#results-local button').onclick = () => {
        // console.log('==================================================');
        const paragraps = document.querySelectorAll('#results-local div p');
    
        if (paragraps.length === 0 && getLocalResults().length === 0) {
            addParagrapgh('#results-local div', 'Brak wyników. Rozwiąż quiz i zapisz swój wynik!');
        } else if(getLocalResults().length > 0) {
            let div = document.querySelector('#results-local div');
            while(div.firstChild) {
                div.removeChild(div.firstChild);
            }
            const results = getLocalResults();
            for (let i = 0; i < results.length; i++) {
                // console.log(`i = ${i} session res = ${results[i]}`);
                addParagrapgh('#results-local div', results[i]);
            }
        }
    }
});

$(document).ready(function () {
    $("#dialog").dialog({
        autoOpen: false,
        buttons: {
            'Zamknij': function () {
                const points = $(this).data('points');
                let arr = getSessionResults();

                console.log(arr);
                arr.push(points);
                setSessionResults(arr);

                $(this).dialog("close");
            },
            'Zapisz wynik': function () {
                const points = $(this).data('points');
                let arr = getLocalResults();

                console.log(arr);
                arr.push(points);
                setLocalResults(arr);

                $(this).dialog("close");
            }
        }
    });
    $("#submit").click(function () {
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