<?php
if (isset($_REQUEST['cod'])) {
    $codigo = $_REQUEST['cod'];

    if ($codigo == 1) {
        echo "My Melody - Descripción de My Melody.";
    } elseif ($codigo == 2) {
        echo "Kuromi - Descripción de Kuromi.";
    } elseif ($codigo == 3) {
        echo "Hello Kitty - Descripción de Hello Kitty.";
    } elseif ($codigo == 4) {
        echo "Cinnamoroll - Descripción de Cinnamoroll.";
    } elseif ($codigo == 5) {
        echo "Keroppi - Descripción de Keroppi.";
    } else {
        echo "Código no reconocido.";
    }
} else {
    echo "Código no proporcionado.";
}
?>
