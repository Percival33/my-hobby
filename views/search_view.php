<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Wyszukiwarka zdjęć</title>
    <link rel="shortcut icon" href="static/img/favicon.ico" />
    <link rel="stylesheet" href="static/css/morphext.css" />
    <link rel="stylesheet" href="static/css/jquery-ui.theme.min.css" />
    <link rel="stylesheet" href="static/css/styles.css" />
    <link rel="stylesheet" href="static/css/gallery.css" />
</head>

<body>
<div class="wrap">
    <header>
        <h1>Moje hobby - Żeglarstwo</h1>
    </header>
    <nav class="clearfix">
        <div class="sub-nav">
            <a href="/">Strona główna</a>
            <div class="sub-nav-alt">
                <a href="/#sport">Żeglarstwo sportowe</a>
                <a href="/#hobby">Żeglarstwo turystyczne</a>
            </div>
        </div>
        <div class="sub-nav active"><a href="/pictures">Galeria zdjęć</a></div>
        <div class="sub-nav"><a href="/quiz">Quiz</a></div>
    </nav>
    <main>
        <section>
            <?php
            echo '<h3 style="text-align: center"><a class="link" href="/upload">Dodaj zdjęcie</a>';
            if(!empty($_SESSION['user'])) {
                echo '<a class="link" href="/logout">Wyloguj się</a>';
                echo '<a class="profile-link link" href="/profile">' . get_user_login($_SESSION['user']) . '</a>';
            }
            else {
                echo '<a class="link" href="/login">Zaloguj się</a>';
                echo '<a class="link" href="/register">Zarejestruj się</a></h3>';
            }
            ?>
        </section>
        <section>
            <a class="return-link link" href="/pictures">Wróć do galerii zdjęć</a>
            <label for="search">
                Wpisz tytuł zdjęcia, aby je wyszukać:
            </label>
            <input name="search" type="text" onkeyup="showResult(this.value)"/>
            <div id="results" class="gallery">
<!--                include "search_additionals/search_list_view.php";-->
<!--                tutaj bedzie kod, do wyswietlania odpowiednich miniaturek-->
            </div>
        </section>
    </main>
    <?php
    include 'footer.php'
    ?>
</div>
<script>
    function showResult(str) {
        if (str.length==0) {
            document.getElementById("results").innerHTML="";
            return;
        }

        // readyState Holds the status of the XMLHttpRequest.
        //    0: request not initialized
        //    1: server connection established
        //    2: request received
        //    3: processing request
        //    4: request finished and response is ready

        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("results").innerHTML = this.responseText;
            }
        }

        xhttp.open("POST", "/search", true);
        xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhttp.send("title="+str);
    }
</script>
</body>
</html>
