<?php
if (!extension_loaded('pdo_mysql')) {
    echo "EL DRIVER NO HI ÉS";
} else {
    echo "EL DRIVER ESTÀ INSTAL·LAT CORRECTAMENT!";
}
?>