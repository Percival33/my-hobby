<!DOCTYPE html>
<html lang="pl">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Inne</title>
    <link rel="shortcut icon" href="static/img/favicon.ico" />
    <link rel="stylesheet" href="static/css/morphext.css" />
    <link rel="stylesheet" href="static/css/jquery-ui.theme.min.css" />
    <link rel="stylesheet" href="static/css/styles.css" />
  </head>

  <body>
    <div class="wrap">
      <header>
        <h1>Moje hobby - Żeglarstwo</h1>
      </header>
      <nav class="clearfix">
        <div class="sub-nav">
          <a href="index.php">Strona główna</a>
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
          <h3>Kliknij <a href="/login">tutaj</a> aby dodać własne zdjęcia!</h3>
        </section>
        <section>
          <div class="gallery">
            <ul>
            <?php 
              if($pictures) {
                foreach ($pictures as $img) {
                  echo '<img src="'."../images/".$img.'" alt="dupa"/><br />';
                }
              }
              else {
                echo 'Brak zdjęć do wyświetlenia. Dodaj aby wyświetlić.';
              }
            ?>
            </ul>
          </div>
        </section>
      </main>
      <footer>
        <p>Marcin Jarczewski &copy; Informatyka grupa 2 2021</p>
        <div class="attribution">
          Icons made by
          <a href="https://www.freepik.com" title="Freepik">Freepik</a> from
          <a href="https://www.flaticon.com/" title="Flaticon"
            >www.flaticon.com</a
          >
        </div>
        <a href="#">Powrót na górę</a>
      </footer>
    </div>
  </body>
</html>
