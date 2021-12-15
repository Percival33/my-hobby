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
        <div class="sub-nav"><a href="pictures.php">Inne</a></div>
        <div class="sub-nav active"><a href="quiz.php">Quiz</a></div>
      </nav>
      <main>
        <section id="quiz">
          <h3>Sprawdź swoją wiedzę o żeglarstwie!</h3>
          <form>
            <div class="select">
              <h4 class="question">Jaki kolor mają żagle?</h4>
              <div>
                <select name="select" id="color">
                  <option value="empty">--------</option>
                  <option value="black">czarny</option>
                  <option value="white">biały</option>
                  <option value="yellow">żółty</option>
                  <option value="red">czerwony</option>
                </select>
              </div>
            </div>
            <div id="input-radio">
              <h4 class="question">Lewa burta jachtu to:</h4>
              <div>
                <input
                  type="radio"
                  name="radio"
                  id="radio1"
                  value="Sterburta"
                />
                <label for="radio1">Sterburta</label>
              </div>
              <div>
                <input type="radio" name="radio" id="radio2" value="Sztag" />
                <label for="radio2">Sztag</label>
              </div>
              <div>
                <input type="radio" name="radio" id="radio3" value="bakburta" />
                <label for="radio3">Bakburta</label>
              </div>
              <div>
                <input
                  style="display: none"
                  type="radio"
                  name="radio"
                  value="empty"
                  checked
                />
              </div>
            </div>
            <div class="input-range">
              <h4 class="question">
                Jaka jest maksymalna długość jachtu, którym można pływać bez
                patentu? (3 - 11)
              </h4>
              <input
                type="range"
                id="range"
                name="range"
                min="3"
                max="11"
                step="0.5"
                oninput="num.value = this.value"
              />
              <output id="num">7</output>
            </div>
            <div id="input-checkbox">
              <h4 class="question">Które z tych nazw to nazwy żagli?</h4>
              <div>
                <input
                  type="checkbox"
                  id="checkbox1"
                  name="checkbox"
                  value="fok"
                />
                <label for="checkbox1">fok</label>
              </div>
              <div>
                <input
                  type="checkbox"
                  id="checkbox2"
                  name="checkbox"
                  value="achterdek"
                />
                <label for="checkbox2">achterdek</label>
              </div>
              <div>
                <input
                  type="checkbox"
                  id="checkbox3"
                  name="checkbox"
                  value="spinaker"
                />
                <label for="checkbox3">spinaker</label>
              </div>
              <div>
                <input
                  type="checkbox"
                  id="checkbox4"
                  name="checkbox"
                  value="grot"
                />
                <label for="checkbox4">grot</label>
              </div>
              <div>
                <input
                  type="checkbox"
                  id="checkbox5"
                  name="checkbox"
                  value="rumpel"
                />
                <label for="checkbox5">rumpel</label>
              </div>
            </div>
            <div class="input-text">
              <h4 class="question">
                Która z tych łódek jest większa? Omega czy Laser?
              </h4>
              <div>
                <input type="text" id="XD" />
              </div>
            </div>
            <div class="clearfix">
              <input
                class="btn"
                id="submit"
                type="submit"
                value="Sprawdź odpowiedzi"
              />
              <input class="btn reset" type="reset" value="Usuń odpowiedzi" />
            </div>
          </form>
        </section>
        <div id="dialog" title="Twój wynik">
          <p>Twój wynik to:</p>
          <p id="dialog-result">
            Aby sprawdzić odpowiedzi i wyświetlać wyniki włącz obsługę
            Javascript
          </p>
        </div>
        <section id="results-session">
          <h3>
            Twoje wyniki
            <button class="arrow">
              <img src="static/img/refresh.png" alt="arrow" />
            </button>
            <button class="btn-result">Zaznacz najlepszy wynik</button>
          </h3>
          <div></div>
        </section>
        <section id="results-local">
          <h3>
            Twoje zapisane wyniki
            <button class="arrow">
              <img src="static/img/refresh.png" alt="arrow" />
            </button>
            <button class="btn-result">Zaznacz najlepszy wynik</button>
          </h3>
          <div></div>
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
    <script
      src="https://code.jquery.com/jquery-3.6.0.min.js"
      integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
      crossorigin="anonymous"
    ></script>
    <script
      src="https://code.jquery.com/ui/1.13.0/jquery-ui.min.js"
      integrity="sha256-hlKLmzaRlE8SCJC1Kw8zoUbU8BxA+8kR3gseuKfMjxA="
      crossorigin="anonymous"
    ></script>
    <script src="static/js/quiz.js"></script>
  </body>
</html>
