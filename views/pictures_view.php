<!DOCTYPE html>
<html lang="pl">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Galeria zdjęć</title>
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
                    echo '<a class="profile-link" href="/profile">' . get_user_login($_SESSION['user']) . '</a>';
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
          <div class="gallery">
              <?php
              if(!empty($pictures)) {
                  echo '<a class="link" href="/saved">Pokaż zapisane zdjęcia</a>';
                  echo '<a class="link" href="/search">Szukaj zdjęć</a>';
                  echo '<form method="post" action="/pictures?page=' . $page_number . '">';
                  echo '<input type="submit" value="Zapisz wybrane zdjęcia"/>';
                  include "pictures_additionals/picture_gallery_view.php";
                  echo '</form>';
                  include "pictures_additionals/pagination_view.php";
                 }
                 else {
                     echo 'Brak zdjęć do wyświetlenia. Dodaj zdjęcia do wyświetlenia.';
                 }
              ?>
          </div>
        </section>
      </main>
        <?php
        include 'footer.php'
        ?>
    </div>
  </body>
</html>
