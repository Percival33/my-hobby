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

    // function getLocalResults() {
    //     const obj = JSON.parse(localStorage.getItem('results'));
    //     return obj;
    // }

    getSessionResults = () => { // should always return an array
        const obj = JSON.parse(sessionStorage.getItem('results'));
        // console.log(`${JSON.parse(obj)} obj`);
        if (obj === null)
            return JSON.parse(JSON.stringify({
                "results": Array(0)
            })).results;
        return obj.results;
    }

    // function setLocalResults(data) {
    //     localStorage.setItem('results', JSON.stringify(data));
    // }

    setSessionResults = (data) => { // gets an array
        sessionStorage.setItem('results', JSON.stringify({
            "results": data
        }));
    }

    document.querySelector('#quiz').onclick = () => {};

    document.querySelector('#results-session button').onclick = () => {
        console.log('==================================================');
        const paragraps = document.querySelectorAll('#results-session div p');
        console.log(paragraps.length);
        console.log(getSessionResults().length);

        if (paragraps.length === 0 && getSessionResults().length === 0) {
            addParagrapgh('#results-session div', 'Brak wyników. Rozwiąż quiz!');
        } else if(getSessionResults().length > 0) {
            let div = document.querySelector('#results-session div');
            for (let i = 0; i < paragraps.length; i++) {
                div.removeChild(div.childNodes[i]);
            }
            const results = getSessionResults();
            for (let i = 0; i < results.length; i++) {
                // console.log(`i = ${i} session res = ${results[i]}`);
                addParagrapgh('#results-session div', results[i]);
            }
        }
    };

    // document.querySelector('#results-local button').onclick = () => {
    //     // console.log('==================================================');
    //     if (document.querySelector('#results-local div p') === null) {
    //         addParagrapgh('#results-local div');
    //     } else {
    //         const results = getLocalResults();
    //         for (let i = 0; i < results.length; i++) {
    //             console.log(`i = ${i} local res = ${results[i]}`);
    //         }
    //     }
    // }
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
                console.log(points);


                // if (!localStorage.getItem('results')) {
                //     let obj = {
                //         "results": [points]
                //     }
                //     localStorage.setItem('results', JSON.stringify(obj));
                // } else {
                //     const results = getLocalResults();
                //     // console.log(obj);
                //     results.push(points);
                //     setLocalResults(results);

                // }
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