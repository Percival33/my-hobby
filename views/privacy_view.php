<?php

if (isset($_SESSION['user'])) {
        echo '<label for="privacy"><p>Ustaw prywatność zdjęcia</p></label>';
        echo '<div class="privacy" name="privacy">';

        echo '<label for="private"><p>prywatne</p></label>';
        echo '<input type="radio" name="private" value="true" required>';

        echo '<label for="public"><p>publiczne</p></label>';
        echo '<input type="radio" name="private" value="false" required checked>';

        echo '</div>';
}

?>
