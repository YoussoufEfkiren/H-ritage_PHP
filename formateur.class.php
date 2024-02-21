<?php 
// Inclusion du fichier 'personne.class.php' qui contient la définition de la classe abstraite 'Personne'
require_once 'personne.class.php';

// Définition de la classe 'Formateur' héritant de la classe abstraite 'Personne'
class Formateur extends Personne{
    // Propriétés privées spécifiques à la classe 'Formateur'
    private $salairefix;
    private $niveau;

    // Constructeur de la classe 'Formateur', prenant des paramètres supplémentaires spécifiques à un formateur
    public function __construct($num, $nom, $prenom, $hs, $sh,$sf,$niv)
    {
        // Appel du constructeur de la classe parente pour initialiser les propriétés héritées
        parent::__construct($num, $nom, $prenom, $hs, $sh);
        // Initialisation des propriétés spécifiques au formateur
        $this->salairefix = $sf;
        $this->niveau = $niv;
    }

    // Méthode magique pour accéder aux propriétés de l'objet
    public function __get($attr)
    {
        // Vérifier si la propriété existe, sinon afficher un message d'erreur
        if (property_exists($this, $attr)) {
            return $this->$attr;
        }
        else
        {
            // Affiche un message si la propriété n'existe pas
            echo "l'attribut < ".$attr." > n'existe pas.";
        }
    }

    // Implémentation de la méthode abstraite 'calculsalaire()' pour calculer le salaire du formateur
    public function calculsalaire()
    {
        // Calcul du salaire basé sur le salaire fixe et le salaire horaire
        return ($this->heuresup * $this->salairhoraire)+$this->salairefix;
    }
    // Méthode magique pour convertir l'objet en représentation de chaîne de caractères
    public function __toString()
    {
        // Concaténation des propriétés de l'objet pour former une représentation en chaîne de caractères
        return $this->numero . ' ' . $this->nom . ' ' . strtoupper($this->prenom) . ' ' . $this->heuresup . ' ' . $this->salairhoraire;
    }
}
?>
