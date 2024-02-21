<?php
abstract class Personne
{
    // Propriétés protégées pour stocker les données d'une personne
    protected $numero;
    protected $nom;
    protected $prenom;
    protected $heuresup;
    protected $salairhoraire;
    
    // Constructeur pour initialiser les propriétés de la personne
    public function __construct($num, $nom, $prenom, $hs, $sh)
    {
        $this->numero = $num;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->heuresup = $hs;
        $this->salairhoraire = $sh;
    }
    
    // Méthode magique pour accéder aux propriétés (getters)
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
    
    // Méthode abstraite pour calculer le salaire (doit être implémentée dans les classes filles)
    abstract public function calculsalaire();
    
    // Méthode magique pour convertir l'objet en chaîne de caractères
    public function __toString()
    {
        // Concaténer les propriétés pour former une chaîne représentant la personne
        return $this->numero . '' . $this->nom . '' . strtoupper($this->prenom) . '' . $this->heuresup . '' . $this->salairhoraire;
    }
}
