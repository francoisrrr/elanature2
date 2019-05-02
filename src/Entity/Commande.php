<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/*
 * --------------------------------------------------------
 * GENERALITES
 * --------------------------------------------------------
 * La classe Commande reçoit $articles passés
 * dans le panier via la vue.
 * La commande est enregistrée en bdd lorsque l'utilisateur
 * complète un CommandeFormStep1 en précisant notamment :
 * - $livraison
 * - $paiement
 * - $code_reduction
 * - $quantite
 */

/*
 * --------------------------------------------------------
 * NOTES
 * --------------------------------------------------------
 *  # Prévoir une vue avec l'icône du panier dans
 *  "_menu.html.twig" ou dans un "_header.html.twig" à créer.
 *  La vue doit avoir accés à la quantité totale d'articles via
 *  la fonction calculQuantite($article, $articles)
 *
 *  # Il faudra une quantité pour chaque article donc l'integer
 *  $quantite ne convient pas. Une solution consiste à ajouter/supprimer
 *  n fois les $article dans $articles. Une fonction de comptage$
 *  permettra d'obtenir les quantités.
 *
 */

/**
 * @ORM\Entity(repositoryClass="App\Repository\CommandeRepository")
 */
class Commande
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

//    /**
//     * @ORM\Column(type="integer")
//     */
//    private $quantite;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date_commande;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $code_reduction;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $livraison;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $paiement;



// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
//  Liaison ManyToMany avec Article via CommandeArticle

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\CommandeArticle", mappedBy="commande")
     */
    private $articles;

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!


    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Membre", inversedBy="commandes")
     * @ORM\JoinColumn(nullable=false)
     */
    private $membre;

    public function __construct()
    {
        $this->articles = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

//    public function getQuantite(): ?int
//    {
//        return $this->quantite;
//    }
//
//    public function setQuantite(int $quantite): self
//    {
//        $this->quantite = $quantite;
//
//        return $this;
//    }

    public function getDateCommande(): ?\DateTimeInterface
    {
        return $this->date_commande;
    }

    public function setDateCommande(\DateTimeInterface $date_commande): self
    {
        $this->date_commande = $date_commande;

        return $this;
    }

    public function getCodeReduction(): ?string
    {
        return $this->code_reduction;
    }

    public function setCodeReduction(?string $code_reduction): self
    {
        $this->code_reduction = $code_reduction;

        return $this;
    }

    public function getLivraison(): ?string
    {
        return $this->livraison;
    }

    public function setLivraison(string $livraison): self
    {
        $this->livraison = $livraison;

        return $this;
    }

    public function getPaiement(): ?string
    {
        return $this->paiement;
    }

    public function setPaiement(string $paiement): self
    {
        $this->paiement = $paiement;

        return $this;
    }

    /**
     * @return Collection|Article[]
     */
    public function getArticles(): Collection
    {
        return $this->articles;
    }

    public function addArticle(Article $article): self
    {
        if (!$this->articles->contains($article)) {
            $this->articles[] = $article;
            $article->addCommande($this);
        }

        return $this;
    }

    public function removeArticle(Article $article): self
    {
        if ($this->articles->contains($article)) {
            $this->articles->removeElement($article);
            $article->removeCommande($this);
        }

        return $this;
    }

    public function getMembre(): ?Membre
    {
        return $this->membre;
    }

    public function setMembre(?Membre $membre): self
    {
        $this->membre = $membre;

        return $this;
    }
}
