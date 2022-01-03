<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Galeria zdjęć - edycja zdjęcia</title>
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
            <?php
            if(isset($_SESSION['message'])) {
                foreach ($_SESSION['message'] as $msg) {
                    echo '<h4 class="message">' . $msg . '</h4>';
                }
                $_SESSION['message'] = [];
            }
            ?>
            <form action="/edit" method="post">
            <label for="author">
                    <p>Autor</p>
                </label>
                <?php
                    echo '<input type="text" name="author" value="' . $img['author'] . '" required/>';
                ?>
                <label for="title">
                    <p>Tytuł zdjęcia</p>
                </label>
                <?php
                    echo '<input type="text" name="title" value="' . $img['title'] . '" required/>';
                ?>
                <label for="alt">
                    <p>Napis gdy nie uda się wyświetlić zdjęcia poprawnie</p>
                </label>
                <?php
                    echo '<input type="hidden" name="id" value="' . $img['_id'] . '" readonly/>';
                ?>
                <?php
                    echo '<input type="text" name="alt" value="' . $img['alt'] . '" required/>';

                    include "privacy_view.php";
                ?>
                <input type="submit" value="Zapisz"/>
            </form>
        </section>
    </main>
    <?php
    include 'footer.php'
    ?>
</div>
</body>
</html>
