<!DOCTYPE html>
<html lang="pl">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Moje hobby</title>
    <link rel="shortcut icon" href="static/img/favicon.ico" />
    <link rel="stylesheet" href="static/css/styles.css" />
  </head>

  <body>
    <div class="wrap">
      <header>
        <h1>Moje hobby - Żeglarstwo</h1>
      </header>
      <nav class="clearfix">
        <div class="sub-nav">
          <a class="active" href="/">Strona główna</a>
          <div class="sub-nav-alt">
            <a href="/#sport">Żeglarstwo sportowe</a>
            <a href="/#hobby">Żeglarstwo turystyczne</a>
          </div>
        </div>
        <div class="sub-nav"><a href="/pictures">Galeria zdjęć</a></div>
        <div class="sub-nav"><a href="/quiz">Quiz</a></div>
      </nav>
      <main>
        <section>
          <h3>Czym jest żeglarstwo?</h3>
          <p>
            <strong>Żeglarstwo</strong> – dyscyplina sportów wodnych, rodzaj
            turystyki lub rekreacji, a także forma szkoleń – zarówno dla
            późniejszych marynarzy, oficerów i kapitanów jednostek, jak i jako
            tzw. szkoła charakterów dla młodzieży. Żeglarstwo uprawiane jest na
            jednostkach pływających napędzanych siłą wiatru za pośrednictwem
            żagli.
            <a href="https://pl.wikipedia.org/wiki/%C5%BBeglarstwo"
              ><em>Wikipedia</em></a
            >
          </p>

          <p class="center">Żeglarstwo dzieli się na dwa główne rodzaje:</p>

          <ul>
            <li>
              <img src="static/img/arrow-left.svg" alt="left arrow" />
              <a href="#sport">sportowe</a>
              <svg class="left">
                <rect
                  width="100%"
                  height="5px"
                  style="fill: rgba(191, 44, 56, 0.5)"
                />
              </svg>
            </li>
            <li>
              <img src="static/img/arrow-right.svg" alt="right arrow" />
              <a href="#hobby">turystyczne</a>
              <svg class="right">
                <rect
                  width="100%"
                  height="5px"
                  style="fill: rgba(191, 44, 56, 0.5)"
                />
              </svg>
            </li>
          </ul>
        </section>

        <section>
          <h3 id="sport">Żeglarstwo sportowe</h3>
          <p>
            Skupia się na rywalizacji w zawodach, zwanych regatami, łodzi o
            podobnych parametrach. Zawody te polegają na przeprowadzeniu serii
            wyścigów, w których przynawane są punkty, zgodnie z zajętym miejscem
            w każdym biegu. Ten, kto ma sumarycznie najmniej punktów - wygrywa.
            Zawodnicy pływają po określonej trasie, przestrzegając licznych
            przepisów regatowych. Nie respektowanie ich, może skutkować karą do
            wykonania w trakcie wyścigu, bądź dyskwalifikacją z danego biegu.
            Wyróżnia się wiele klas jachtów sportowych. Od łódek dla
            najmłodszych np. Optymist po łódki olimpijskie lub nawet większe
            jednostki.
          </p>
          <div class="img-set1">
            <div>
              <img src="static/img/regaty.jpg" alt="zdjęcie z startu w regatach" />
              <p>Start wyścigu na regatach</p>
            </div>
            <div>
              <img src="static/img/trasa.jpg" alt="zdjęcie trasy regatowej" />
              <p>Przykładowa trasa regatowa</p>
            </div>
            <div>
              <img src="static/img/jury.jpg" alt="zdjęcie jury na regatach" />
              <p>Motorówka komisji sędziowskiej</p>
            </div>
            <div>
              <img src="static/img/optimist.jpg" alt="optimist" />
              <p>Łódka klasy Optymist</p>
            </div>
            <div>
              <img src="static/img/49er.jpg" alt="49er" />
              <p>Łódka klasy 49er</p>
            </div>
            <div>
              <img
                src="static/img/sailgp.jpg"
                alt="jachty klasy F50 na regatach SailGP"
              />
              <p>Jacht klasy F50 na regatach z cyklu SailGP</p>
            </div>
          </div>
        </section>

        <section>
          <h3 id="hobby">Żeglarstwo turystyczne</h3>
          <p>
            W jachtach turystycznych, w przeciwieństwie do sportowych, dużą
            uwagę przykłada się do wygody i komfortu żeglugi w każdych
            warunkach. Na jachcie panują waruntki zbliżone do mieszkalnych,
            ponieważ zazwyczaj jest tam kuchnia gazowa, lodówka, zlew,
            oświetlenie i gniazdka elektryczne oraz rozkładane materace do
            spania. Na nowszych jednostkach spotyka się również ogrzewanie.
            Ponadto, w bezwietrznych warunkach, korzysta się z zamontowanych
            silników spalinowych. Łódki turystyczne mogą pomieścić od 4 aż do 10
            osób na pokładzie.
          </p>
          <div class="img-set2">
            <div>
              <img src="static/img/antila_wnetrze.jpg" alt="zdjęcie wnętrza jachtu" />
              <p>Zdjęcie wnętrza jachtu</p>
            </div>
            <div>
              <img src="static/img/antila.jpg" alt="zdjęcie antili" />
              <p>Zdjęcie Antili 33</p>
            </div>
          </div>
        </section>
      </main>
        <?php
        include 'footer.php'
        ?>
    </div>
  </body>
</html>

