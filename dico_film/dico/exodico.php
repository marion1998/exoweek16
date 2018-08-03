<?php
    $string = file_get_contents("dictionnaire.txt", FILE_USE_INCLUDE_PATH);
    $dico = explode("\n", $string );

    echo "Il y a " . sizeof($dico) . " mots dans ce dico" . "<br>";
?>

<?php 

    $length = 0;

    foreach($dico as $mot) {
        if (strlen($mot) == 15 ) {
            $length++;
        }
     }

     echo "Il y a " . $length . " mots qui font 15 caractères" . "<br>"; 
?>

<?php
    foreach($dico as $mot) {
        if (stristr($mot, "w")) {
            $w++; 
        }
    }

    echo "Il y a " . $w . " mots qui contiennent la lettre W" . "<br>" ; 
?>

<?php

    $q = 0;

    foreach($dico as $mot) {
        if (substr($mot, -1) == "q") {
            $q++;
        }
    }

    echo "Il y a " . $q . " mots qui terminent par la lettre Q"
?>