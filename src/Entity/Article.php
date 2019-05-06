<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ArticleRepository")
 */
class Article
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\Column(type="float")
     */
    private $prix;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $reference;

    /**
     * @ORM\Column(type="integer")
     */
    private $stock;

    /**
     * @ORM\Column(type="string")
     *
     */
    //@Assert\Image(
    //     *     mimeTypesMessage="Vérifier le format de votre fichier.",
    //     *     maxSize="1M", maxSizeMessage="Attention, votre fichier est trop lourd.")
    //ERREUR
    //The form's view data is expected to be an instance of class Symfony\Component\HttpFoundation\File\File,
    // but is a(n) string. You can avoid this error by setting the "data_class" option to null or by adding a view
    // transformer that transforms a(n) string to an instance of Symfony\Component\HttpFoundation\File\File.
    private $photo;

    /**
     * @ORM\Column(type="boolean")
     */
    private $promotion;

    /**
     * @ORM\Column(type="boolean")
     */
    private $coup_de_coeur;

    /**
     * @ORM\Column(type="boolean")
     */
    private $nouveaute;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $slug;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Categorie", inversedBy="article")
     * @ORM\JoinColumn(nullable=false)
     */
    private $categorie;


// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
//  Liaison ManyToMany avec Commande via CommandeArticle
    /**
     * @ORM\OneToMany(targetEntity="App\Entity\CommandeArticle", mappedBy="articles")
     */
    private $commande;

    /**
     * @ORM\Column(type="float")
     */
    private $poids;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date_peremption;

    /**
     * @ORM\Column(type="text")
     */
    private $ingredients;

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!


    public function __construct()
    {
        $this->commande = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getPrix(): ?float
    {
        return $this->prix;
    }

    public function setPrix(float $prix): self
    {
        $this->prix = $prix;

        return $this;
    }

    public function getReference(): ?string
    {
        return $this->reference;
    }

    public function setReference(?string $reference): self
    {
        $this->reference = $reference;

        return $this;
    }

    public function getStock(): ?int
    {
        return $this->stock;
    }

    public function setStock(int $stock): self
    {
        $this->stock = $stock;

        return $this;
    }

    public function getPhoto(): ?string
    {
        return $this->photo;
    }

    public function setPhoto(string $photo): self
    {
        $this->photo = $photo;

        return $this;
    }

    public function getPromotion(): ?bool
    {
        return $this->promotion;
    }

    public function setPromotion(bool $promotion): self
    {
        $this->promotion = $promotion;

        return $this;
    }

    public function getCoupDeCoeur(): ?bool
    {
        return $this->coup_de_coeur;
    }

    public function setCoupDeCoeur(bool $coup_de_coeur): self
    {
        $this->coup_de_coeur = $coup_de_coeur;

        return $this;
    }

    public function getNouveaute(): ?bool
    {
        return $this->nouveaute;
    }

    public function setNouveaute(bool $nouveaute): self
    {
        $this->nouveaute = $nouveaute;

        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): self
    {
        $this->slug = $slug;

        return $this;
    }

    public function getCategorie(): ?Categorie
    {
        return $this->categorie;
    }

    public function setCategorie(?Categorie $categorie): self
    {
        $this->categorie = $categorie;

        return $this;
    }

    /**
     * @return Collection|Commande[]
     */
    public function getCommande(): Collection
    {
        return $this->commande;
    }

    public function addCommande(Commande $commande): self
    {
        if (!$this->commande->contains($commande)) {
            $this->commande[] = $commande;
        }

        return $this;
    }

    public function removeCommande(Commande $commande): self
    {
        if ($this->commande->contains($commande)) {
            $this->commande->removeElement($commande);
        }

        return $this;
    }

    public function getPoids(): ?float
    {
        return $this->poids;
    }

    public function setPoids(float $poids): self
    {
        $this->poids = $poids;

        return $this;
    }

    public function getDatePeremption(): ?\DateTimeInterface
    {
        return $this->date_peremption;
    }

    public function setDatePeremption(\DateTimeInterface $date_peremption): self
    {
        $this->date_peremption = $date_peremption;

        return $this;
    }

    public function getIngredients(): ?string
    {
        return $this->ingredients;
    }

    public function setIngredients(string $ingredients): self
    {
        $this->ingredients = $ingredients;

        return $this;
    }

    /**
     * Ajouté par Saadatou, sinon
     * error: Object of class could not be converted to string
     */
    public function __toString()
    {
        return $this->nom;
    }


}
