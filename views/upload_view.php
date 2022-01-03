<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Przesyłanie zdjęcia</title>
    <link rel="shortcut icon" href=".static/img/favicon.ico"/>
    <link rel="stylesheet" href="static/css/styles.css"/>
    <link rel="stylesheet" href="static/css/gallery.css"/>
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
            echo '<h3 style="text-align: center"><a class="active-link link" href="/upload">Dodaj zdjęcie</a>';
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
            <?php
            if(isset($message)) {
                foreach($message as $mes) {
                    print "<h4 class=" . "error" . ">" . $mes . "</h4>";
                }
            }
            echo '<a class="return-link link" href="/pictures">Wróć do galerii zdjęć</a>';
            ?>
        </section>

        <form action="/upload" method="post" enctype="multipart/form-data">
            <label for="author">
                <p>Autor</p>
            </label>
            <input type="text" name="author" required/>
            <label for="title">
                <p>Tytuł zdjęcia</p>
            </label>
            <input type="text" name="title" required/>
            <label for="watermark">
                <p>Znak wodny</p>
            </label>
            <input type="text" name="watermark" required/>
            <label for="alt">
                <p>Napis gdy nie uda się wyświetlić zdjęcia poprawnie</p>
            </label>
            <input type="text" name="alt" required/>
            <label for="picture">
                <p>Załącz zdjęcie</p>
            </label>
            <input type="file" name="picture" required/>

            <?php
                include "privacy_view.php";
            ?>

            <br/>
            <input type="submit" value="Wyślij"/>
        </form>
    </main>
    <?php
    include 'footer.php'
    ?>
</div>
</body>
</html>
