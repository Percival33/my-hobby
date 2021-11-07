document.addEventListener('DOMContentLoaded', () => {
    document.querySelector('#submit').onclick = () => {
        let sail = document.querySelectorAll('input[name="checkbox"]:checked');
        let color = document.querySelector('#color').value;
        let radio = document.querySelector('input[name="radio"]:checked').value;
        let len = document.querySelector('#range').value;
        let boat = document.querySelector('#text').value.toLowerCase();
        // for(let i = 0; i < sail.length; i++) {
        //     console.log(sail[i].value);
        // }
        // console.log(color);
        // console.log(radio);
        // console.log(len);
        // console.log(boat);

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

        document.querySelector('#dialog p').innerHTML = `${points}/0`;

        return false;
    };

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
        $("#submit").click(function () {
            $("#dialog").dialog("open");
        });
    });

});