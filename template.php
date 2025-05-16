<?php
class Template{

    private $sortie;

    public function __construct($fichier) {
        $this -> sortie = file_get_content($fichier);
    }

    public function getSortie()
    {
        return $this -> sortie;
    }
}
?>