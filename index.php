<?php

    include('appmvc.php');
    $mavar = new Maclasse();
    echo $mavar -> Getmonattribut();
    $mavar -> Setmonattribut(5);
    echo "Oui";
    echo $mavar -> Getmonattribut();

?>