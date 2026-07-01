<?php

$categories = [
    [
        'nom' => 'Alimentaire',
        'code' => '1234',
        'produits' => [
            ['nom' => 'Huile', 'reference' => 'KM34', 'prix' => '1200', 'quantite' => '100'],
            ['nom' => 'Sucre', 'reference' => 'KM25', 'prix' => '600', 'quantite' => '50'],
        ],
    ],
    [
        'nom' => 'Hygyene',
        'code' => '2864',
        'produits' => [],
    ],
];

function saisieChaine(string $message): string
{
    do {
        $value = readline($message);
        $value = trim($value);
        if ($value === '') {
            echo "Le champ ne doit pas etre vide \n";
        }
    } while ($value === '');

    return $value;
}

function chaisiInt(string $message): int
{
    do {
        $value = (int) readline($message);
        if ($value < 0) {
            echo "La valeur doit etre positive \n";
        }
    } while ($value < 0);

    return $value;
}

function categorieExist(array $categories, string $key, string $value): bool
{
    foreach ($categories as $categorie) {
        if ($categorie[$key] === $value) {
            return true;
        }
    }

    return false;
}

function produitExist(array $categories, string $key, string $value): bool
{
    foreach ($categories as $categorie) {
        foreach ($categorie['produits'] as $produit) {
            if ($produit[$key] === $value) {
                return true;
            }
        }
    }

    return false;
}

function trouverCategoCode(array $categories, string $code): ?int
{
    foreach ($categories as $index => $categorie) {
        if ($categorie['code'] === $code) {
            return $index;
        }
    }

    return null;
}

function ajouterCategorie(array &$categories, string $nom, string $code): void
{
    $categories[] = [
        'nom' => $nom,
        'code' => $code,
        'produits' => [],
    ];
}

function ajouterProduitCate(array &$categories, int $categoryIndex, array $produit): void
{
    $categories[$categoryIndex]['produits'][] = $produit;
}

function afficheNomCategorie(array $categories): void
{
    foreach ($categories as $categorie) {
        if (count($categorie['produits']) === 0) {
            echo $categorie['nom'] . "\n";
        }
    }
}

function nomCategoUnique(array $categories): string
{
    do {
        $nom = saisieChaine("Entrer un nom: ");
        if (categorieExist($categories, 'nom', $nom)) {
            echo "Ce nom de categorie existe deja \n";
            $nom = '';
        }
    } while ($nom === '');

    return $nom;
}

function codeCategorieUnique(array $categories): string
{
    do {
        $code = saisieChaine("Entrer un code: ");
        if (categorieExist($categories, 'code', $code)) {
            echo "Ce code de categorie existe deja \n";
            $code = '';
        }
    } while ($code === '');

    return $code;
}

function nomProduitUnique(array $categories): string
{
    do {
        $nom = saisieChaine("Entrer un nom: ");
        if (produitExist($categories, 'nom', $nom)) {
            echo "Ce nom de produit existe deja \n";
            $nom = '';
        }
    } while ($nom === '');

    return $nom;
}

function referenceUnique(array $categories): string
{
    do {
        $reference = saisieChaine("Entrer un reference: ");
        if (produitExist($categories, 'reference', $reference)) {
            echo "Cette reference de produit existe deja \n";
            $reference = '';
        }
    } while ($reference === '');

    return $reference;
}

function creerCategoProduits(array $categories): array
{
    $nomProduit = nomProduitUnique($categories);
    $reference = referenceUnique($categories);
    $prix = chaisiInt("Entrer le prix: ");
    $quantite = chaisiInt("Entrer le quantite: ");

    return [
        'nom' => $nomProduit,
        'reference' => $reference,
        'prix' => $prix,
        'quantite' => $quantite,
    ];
}

afficheNomCategorie($categories);

$nomCategorie = nomCategoUnique($categories);
$codeCategorie = codeCategorieUnique($categories);
ajouterCategorie($categories, $nomCategorie, $codeCategorie);

print_r($categories);

$code = saisieChaine("saisir le code :");
$categoryIndex = trouverCategoCode($categories, $code);

if ($categoryIndex !== null) {
    $produit = creerCategoProduits($categories);
    ajouterProduitCate($categories, $categoryIndex, $produit);
} else {
    echo "désolé , la categorie n'existe pas \n";
}

print_r($categories);

 