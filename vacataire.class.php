<?php
// Inclusion du fichier 'personne.class.php' qui contient la définition de la classe abstraite 'Personne'
require_once 'personne.class.php';

// Définition de la classe Vacataire qui étend la classe Personne
class Vacataire extends Personne{
    private $Diplome; // Propriété privée pour stocker le diplôme du vacataire
    
    // Constructeur de la classe Vacataire
    public function __construct($num, $nom, $prenom, $hs, $sh, $diplome)
    {
        parent::__construct($num, $nom, $prenom, $hs, $sh); // Appel du constructeur de la classe parente
        $this->Diplome = $diplome; // Initialisation de la propriété Diplome
    }
    
    // Méthode magique __get pour accéder aux propriétés
    public function __get($attr)
    {
        if (property_exists($this, $attr)) {
            return $this->$attr;
        } else {
            // Affiche un message si la propriété n'existe pas
            echo "l'attribut < ".$attr." > n'existe pas."; 
        }
    }
    
    // Méthode pour calculer le salaire
    public function calculsalaire()
    {
        return $this->heuresup * $this->salairhoraire;
    }
    
    // Méthode magique __toString pour obtenir une représentation textuelle de l'objet
    public function __toString()
    {
        return $this->numero . '' . $this->nom . '' . strtoupper($this->prenom) . '' . $this->heuresup . '' . $this->salairhoraire . '' . $this->Diplome;
    }
}

?>
