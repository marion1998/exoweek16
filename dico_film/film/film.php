<?php
    $string = file_get_contents("films.json", FILE_USE_INCLUDE_PATH);
    $brut = json_decode($string, true);
    $top = $brut["feed"]["entry"]; # liste de films
?>

<?php  
echo "<h3> Le top10 des films </h3>";
    for ($film = 0; $film < 10; $film++) {
        echo $film+1 . ". " . $top[$film]["im:name"]["label"] . "<br>" . "<hr>" ;
    }
?>

<?php 
echo "<h3> Quel est le classement du film « Gravity » ? </h3>";
        foreach($top as $key => $film) {
          if ($film["im:name"]["label"] == "Gravity"){
              echo '<h4> Le placement de "Gravity" est la place : </h4>' .  $key . " de la liste"  . "<br>" . "<hr>";
          }
        }
?>

<?php
echo "<h3> Quel est le réalisateur du film « The LEGO Movie » ? </h3>";
    foreach($top as $film) {
        if ($film["im:name"]["label"] == "The LEGO Movie"){
            echo 'Le réalisateur du film "The LEGO Movie" est  ' . $film["im:artist"]["label"] . "<br>" . "<hr>" ;
        }
    }
?>

<?php

    $i = 1;

echo "<h3> Combien de films sont sortis avant 2000 ? </h3>";
    foreach($top as $film) {
        if (substr($film["im:releaseDate"]["label"], 0, 4) < 2000) {
            echo  $i++ . ". " . $film["im:name"]["label"] . "<br>" . " Date de sortie : " .  $film["im:releaseDate"]["attributes"]["label"] . "<br>";
        }
    }
?>

<?php

$date = [];
echo "<hr>" . "<h3> Quel est le film le plus récent ? </h3>";
foreach($top as $key => $film){
    array_push($date, strtotime($film["im:releaseDate"]["label"]));
}
max($date);
$index_key = array_keys($date, max($date));
    echo "Le film le plus récent est : " . ($top[$index_key[0]]["im:name"]["label"]);

echo "<h3> Quel est le film le plus vieux ? </h3>";

foreach($top as $key => $film){
    array_push($date, strtotime($film["im:releaseDate"]["label"]));
}
min($date);
$index_key = array_keys($date, min($date));
    echo "Le film le plus vieux est : " . ($top[$index_key[0]]["im:name"]["label"]);

?>

<?php  
    echo "<hr>" . "<h3> Quelle est la catégorie de films la plus représentée ? </h3>";

$category = [];

foreach($top as $film){
    array_push($category, $film["category"]["attributes"]["label"]);
}
$category_count = array_count_values($category);
$index_key = array_keys($category_count, max($category_count));
print_r("La categorie de film la plus représentée est : " . $index_key[0] . ". Elle apparait " . max($category_count) . " fois.") ;
?>

<?php
echo "<hr>" . "<h3> Quel est le réalisateur le plus présent dans le top100 ? </h3>";

$artist = [];

foreach($top as $film){
    array_push($artist, $film["im:artist"]["label"]);
}
$artist_count = array_count_values($artist);
$index_key = array_keys($artist_count, max($artist_count));
print_r("Le realisateur qui est le plus présent dans le top 100 est : " . $index_key[0] . ". Il apparait " .  max($artist_count) . " fois.");
?>

<?php
    echo "<hr>" . "<h3> Combien cela coûterait-il d'acheter le top10 sur iTunes ? </h3>";

    $price = 0;

    for ($i = 0; $i < 10; $i++){

        // $top[$i] + $price["im:price"]["label"];
        $price = $price + $top[$i]["im:price"]["label"] ;
        print_r("price : ");
        print_r($price);
        print_r("<br>");
        print_r("film prix : ");
        print_r($top[$i]["im:price"]["label"]);
        print_r("<br>");
    }

    echo "<h3> De le louer ? </h3>";
?>
