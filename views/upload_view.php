<!DOCTYPE html>
<html lang="pl">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Quiz</title>
    <link rel="shortcut icon" href="static/img/favicon.ico" />
    <link rel="stylesheet" href="static/css/styles.css" />
    <link rel="stylesheet" href="static/css/jquery-ui.min.css" />
    <link rel="stylesheet" href="static/css/jquery-ui.structure.min.css" />
    <link rel="stylesheet" href="static/css/jquery-ui.theme.min.css" />
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
            <a href="index.php#sport">Żeglarstwo sportowe</a>
            <a href="index.php#hobby">Żeglarstwo turystyczne</a>
          </div>
        </div>
        <div class="sub-nav active"><a href="pictures.php">Inne</a></div>
        <div class="sub-nav"><a href="quiz.php">Quiz</a></div>
      </nav>
      <main>
        <label>
					<h3>Prześlij zdjęcie</h3>
        </label>
        <form action="../upload.php" method="post" enctype="multipart/form-data" >
            <input type="file" name="picture"/>
            <input type="submit" value="Wyślij"/>
        </form>
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
        <div>
          Icons made by
          <a href="https://www.flaticon.com/authors/arkinasi" title="Arkinasi"
            >Arkinasi</a
          >
          from
          <a href="https://www.flaticon.com/" title="Flaticon"
            >www.flaticon.com</a
          >
        </div>
        <a href="#">Powrót na górę</a>
      </footer>
    </div>
  </body>
</html>
