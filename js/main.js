document.addEventListener('DOMContentLoaded', () => {
    document.querySelector('#submit').onclick = () => {
        let sail = document.querySelectorAll('input[name="checkbox"]:checked');
        console.log(sail.length);
        for(let i = 0; i < sail.length; i++) {
            console.log(sail[i].value);
        }
        // let color = document.querySelector('#color').value;
        // let radio = document.querySelector('input[name="radio"]:checked').value; 
        // let len = document.querySelector('#range').value;
        // let boat = document.querySelector('#text').value;
        // console.log(color);
        // console.log(radio);
        // console.log(len);
        // // console.log(sail);
        // console.log(boat);

        return false;
    };  
});