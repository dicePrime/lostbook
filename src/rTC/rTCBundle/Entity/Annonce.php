<?php

namespace rTC\rTCBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

use \Doctrine\Common\Collections\ArrayCollection;
use rTC\rTCUserBundle\Entity\Utilisateur;

/**
 * Annonce
 *
 * @ORM\Table(name="annonce")
 * @ORM\Entity(repositoryClass="rTC\rTCBundle\Repository\AnnonceRepository")
 */
class Annonce {

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var boolean
     * 
     * @ORM\Column(name="perdu",type="boolean",options={"default:0"})
     */
    protected $perdu;

    /**
     * @var string
     *
     * @ORM\Column(name="date_debut", type="datetime")
     */
    protected $dateDebut;

    /**
     * @var string
     *
     * @ORM\Column(name="date_fin", type="datetime")
     */
    protected $dateFin;

    /**
     * @var string
     *
     * @ORM\Column(name="region", type="string", nullable=true)
     */
    protected $region;

    /**
     * @var string
     *
     * @ORM\Column(name="ville", type="string",nullable=true)
     */
    protected $ville;

    /**
     * @var string
     *
     * @ORM\Column(name="etat", type="string",options={"defaults:0"})
     */
    protected $etat;

    /**
     * @var datetime
     *
     * @ORM\Column(name="date_creation", type="datetime")
     */
    protected $dateCreation;

    /**
     * Des noms éventuellement, que la personne qui fait l'annonce peut lister
     * ça peut être par exemple des noms qui figurent sur la pièce d'identité
     * @var string
     * @ORM\Column(name="motsCles",type="string",nullable=true)
     */
    protected $motsCles;

    /**
     * Celui qui fait l'annonce a la possibilité de faire un commentaire,
     * celui-ci sera affiché sur les détails de l'annonce.
     * @var string
     * @ORM\Column(name="commentaire",type="string")
     */
    protected $commentaire;

    /**
     * @var
     * @ORM\Column(name="titre",type="string")
     */
    protected $titre;
    
    /**
     * Cette variable stocke le nom de l'image principale
     * on connait le chemin dans le quel on va chercher l'image, en fonction
     * de l'identifiant de celle-ci
     * @var
     * @ORM\Column(name="image_principale",type="string")
     */
    protected $imagePrincipale;


    /**
     * @ORM\OneToMany(targetEntity="MediaAnnonce", mappedBy="annonce")
     */
    protected $medias;

    /**
     * @ORM\ManyToOne(targetEntity="Espace", inversedBy="annonces")
     * @ORM\JoinColumn(name="espace_id", referencedColumnName="id")
     */
    protected $espace;

    /**
     * @ORM\ManyToOne(targetEntity="rTC\rTCUserBundle\Entity\Utilisateur", inversedBy="annonces")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    protected $utilisateur;

    /**
     * @ORM\ManyToOne(targetEntity="Categorie", inversedBy="annonces")
     * @ORM\JoinColumn(name="categorie_id", referencedColumnName="id")
     */
    protected $categorie;

    public function __construct() {
        $this->medias = new ArrayCollection();
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId() {
        return $this->id;
    }


    /**
     * Set dateDebut
     *
     * @param string $dateDebut
     * @return Annonce
     */
    public function setDateDebut($dateDebut) {
        $this->dateDebut = $dateDebut;

        return $this;
    }

    /**
     * Get dateDebut
     *
     * @return string 
     */
    public function getDateDebut() {
        return $this->dateDebut;
    }

    /**
     * Set dateFin
     *
     * @param string $dateFin
     * @return Annonce
     */
    public function setDateFin($dateFin) {
        $this->dateFin = $dateFin;

        return $this;
    }

    /**
     * Get dateFin
     *
     * @return string 
     */
    public function getDateFin() {
        return $this->dateFin;
    }

    /**
     * Set region
     *
     * @param string $region
     * @return Annonce
     */
    public function setRegion($region) {
        $this->region = $region;

        return $this;
    }

    /**
     * Get region
     *
     * @return string 
     */
    public function getRegion() {
        return $this->region;
    }

    /**
     * Set ville
     *
     * @param string $ville
     * @return Annonce
     */
    public function setVille($ville) {
        $this->ville = $ville;

        return $this;
    }

    /**
     * Get ville
     *
     * @return string 
     */
    public function getVille() {
        return $this->ville;
    }

    /**
     * Set etat
     *
     * @param string $etat
     * @return Annonce
     */
    public function setEtat($etat) {
        $this->etat = $etat;

        return $this;
    }

    /**
     * Get etat
     *
     * @return string 
     */
    public function getEtat() {
        return $this->etat;
    }

    /**
     * Set dateCreation
     *
     * @param string $dateCreation
     * @return Annonce
     */
    public function setDateCreation($dateCreation) {
        $this->dateCreation = $dateCreation;

        return $this;
    }

    /**
     * Get dateCreation
     *
     * @return string 
     */
    public function getDateCreation() {
        return $this->dateCreation;
    }

  

    /**
     * Set categorie
     *
     * @param string $categorie
     * @return Annonce
     */
    public function setCategorie($categorie) {
        $this->categorie = $categorie;

        return $this;
    }

    /**
     * Get categorie
     *
     * @return string 
     */
    public function getCategorie() {
        return $this->categorie;
    }

    /**
     * Set commentaire
     *
     * @param string $commentaire
     * @return Annonce
     */
    public function setCommentaire($commentaire) {
        $this->commentaire = $commentaire;

        return $this;
    }

    /**
     * Get commentaire
     *
     * @return string 
     */
    public function getCommentaire() {
        return $this->commentaire;
    }

    /**
     * Set espace
     * @param \rTC\rTCBundle\Entity\Espace $espace
     * @return Annonce
     */
    public function setEspace(\rTC\rTCBundle\Entity\Espace $espace = null) {
        $this->espace = $espace;

        return $this;
    }

    /**
     * Get espace
     *
     * @return \rTC\rTCBundle\Entity\Espace 
     */
    public function getEspace() {
        return $this->espace;
    }

    /**
     * Set utilisateur
     *
     * @param \rTC\rTCBundle\Entity\Utilisateur $utilisateur
     * @return Annonce
     */
    public function setUtilisateur(Utilisateur $utilisateur = null) {
        $this->utilisateur = $utilisateur;

        return $this;
    }

    /**
     * Get utilisateur
     *
     * @return \rTC\rTCBundle\Entity\Utilisateur 
     */
    public function getUtilisateur() {
        return $this->utilisateur;
    }

    /**
     * Set perdu
     *
     * @param boolean $perdu
     * @return Annonce
     */
    public function setPerdu($perdu) {
        $this->perdu = $perdu;

        return $this;
    }

    /**
     * Get perdu
     *
     * @return boolean 
     */
    public function getPerdu() {
        return $this->perdu;
    }

    /**
     * Set motsCles
     *
     * @param string $motsCles
     * @return Annonce
     */
    public function setMotsCles($motsCles) {
        $this->motsCles = $motsCles;

        return $this;
    }

    /**
     * Get motsCles
     *
     * @return string 
     */
    public function getMotsCles() {
        return $this->motsCles;
    }

    /**
     * Set titre
     *
     * @param string $titre
     * @return Annonce
     */
    public function setTitre($titre) {
        $this->titre = $titre;

        return $this;
    }

    /**
     * Get titre
     *
     * @return string 
     */
    public function getTitre() {
        return $this->titre;
    }



    /**
     * Add medias
     *
     * @param \rTC\rTCBundle\Entity\MediaAnnonce $medias
     * @return Annonce
     */
    public function addMedia(\rTC\rTCBundle\Entity\MediaAnnonce $medias)
    {
        $this->medias[] = $medias;

        return $this;
    }

    /**
     * Remove medias
     *
     * @param \rTC\rTCBundle\Entity\MediaAnnonce $medias
     */
    public function removeMedia(\rTC\rTCBundle\Entity\MediaAnnonce $medias)
    {
        $this->medias->removeElement($medias);
    }

    /**
     * Get medias
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getMedias()
    {
        return $this->medias;
    }

    public function setMedias($medias)
    {
        $this->medias = $medias;
    }
    
    function getImagePrincipale() {
        return $this->imagePrincipale;
    }

    function setImagePrincipale($imagePrincipale) {
        $this->imagePrincipale = $imagePrincipale;
    }


}
