// ingerencja w CSS 
// zaznaczenie najlepszego wyniku !!!

document.addEventListener('DOMContentLoaded', () => {

    addParagrapgh = (where, text) => {
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

    // document.querySelector('#quiz').onclick = () => {};

    document.querySelector('#results-session button').onclick = () => {
        console.log('==================================================');
        const paragraps = document.querySelectorAll('#results-session div p');

        if (paragraps.length === 0 && getSessionResults().length === 0) {
            addParagrapgh('#results-session div', 'Brak wyników w tej sesji. Rozwiąż quiz!');
        } else if (getSessionResults().length > 0) {
            let div = document.querySelector('#results-session div');
            while (div.firstChild) {
                div.removeChild(div.firstChild);
            }
            const results = getSessionResults();
            let max = -1;
            for(let i = 0; i < results.length; i++) {
                if(results[i] > max) {
                    max = results[i];
                }
                addParagrapgh('#results-session div', `Próba nr ${i+1}: ${results[i]}/7 punktów`);
            }

            const p = document.querySelectorAll('#results-session div p');
            for(let i = 0; i < p.length; i++) {
                p[i].style.borderBottom = "1px solid #022931";
                if(results[i] == max) {
                    p[i].style.backgroundColor = "#036873";
                    p[i].style.color = "#f2f2f2";
                }
            }
        }
    };

    document.querySelector('#results-local button').onclick = () => {
        console.log('==================================================');
        const paragraps = document.querySelectorAll('#results-local div p');
        
        if (paragraps.length === 0 && getLocalResults().length === 0) {
            addParagrapgh('#results-local div', 'Brak wyników. Rozwiąż quiz i zapisz swój wynik!');
        } else if (getLocalResults().length > 0) {
            let div = document.querySelector('#results-local div');
            while (div.firstChild) {
                div.removeChild(div.firstChild);
            }
            const results = getLocalResults();
            let max = -1;
            for (let i = 0; i < results.length; i++) {
                if(results[i] > max) {
                    max = results[i];
                }
                addParagrapgh('#results-local div', `Próba nr ${i+1}: ${results[i]}/7 punktów`);
            }
            const p = document.querySelectorAll('#results-local div p');
            for(let i = 0; i < p.length; i++) {
                p[i].style.borderBottom = "1px solid #022931";
                if(results[i] == max) {
                    p[i].style.backgroundColor = "#036873";
                    p[i].style.color = "#f2f2f2";
                }
            }
            // console.log(`local ${max}`);
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
                let arr = getSessionResults();

                // console.log(arr);
                arr.push(points);
                setSessionResults(arr);

                let arr2 = getLocalResults();

                // console.log(arr);
                arr2.push(points);
                setLocalResults(arr2);

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