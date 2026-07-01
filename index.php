<?php
$categories = [

        0 => ['nom'=>'Alimentaire','code'=>'1234','produits'=>[

                            0 =>['nom'=>'Huile','reference'=>'KM34','prix'=>'1200','quantite'=>'100',],
                            1 =>['nom'=>'Sucre','reference'=>'KM25','prix'=>'600','quantite'=>'50',]
                                                             ]
            ],
            
        1 => ['nom'=>'Hygyene','code'=>'2864','produits'=>[]]

];
// print_r($categories);

foreach($categories as $categorie){
if(count($categorie['produits'])==0){
    echo $categorie['nom']."\n";
}

}


do {
$isNomExist = false;
$nomCategorie =readline("Entrer un nom: ");
if(empty($nomCategorie)){
    echo "Le champ ne doit pas etre vide \n";
    $isNomExist  = true;
}
foreach ($categories as $key => $categorie) {
    if($categorie['nom'] === $nomCategorie){
        echo "Ce nom de categorie existe deja \n";
       $isNomExist = true;
    }
     
}
} while ($isNomExist);

do {
$isCodeExist = false;
$codeCategorie =readline("Entrer un code: ");
if(empty($codeCategorie)){
    echo "Le champ ne doit pas etre vide \n";
    $isCodeExist  =true;
}
foreach ($categories as $key => $categorie) {
    if($categorie['code'] === $codeCategorie){
        echo "Ce code de categorie existe deja \n";
       $isCodeExist = true;
    }
     
}
} while ($isCodeExist);
$categorie=['nom'=>$nomCategorie,'code'=>$codeCategorie,'produits'=>[]];
array_push($categories,$categorie);

print_r($categories);

 $categorieExiste =  false;
          $code = readline("saisir le code :");
             foreach ($categories as $index => $categorie ) {
               if (($categorie['code']) === $code) {
                    $categorieExiste = true;
                    break;
         }
       } 

if ($categorieExiste) {

do {
    $isNomExist = false;
    $nomProduit =readline("Entrer un nom: ");
    if(empty($nomProduit)){
        echo "Le champ ne doit pas etre vide \n";
        $isNomExist  = true;
    }
    foreach ($categories as $key => $categorie) {
           foreach ($categorie['produits'] as $produit) {
    if ($produit['nom'] === $nomProduit) {
        echo "Ce nom de produit existe deja \n";
        $isNomExist = true;
        break;
    }
}
        
    }
} while ($isNomExist);

do {
    $isRefExist = false;
    $reference =readline("Entrer un reference: ");
    if(empty($reference)){
        echo "Le champ ne doit pas etre vide \n";
        $isRefExist  = true;
    }
    foreach ($categories as $key => $categorie) {
           foreach ($categorie['produits'] as $produit) {
    if ($produit['reference'] === $reference) {
        echo "Cette référence de produit existe deja \n";
        $isRefExist = true;
        break;
    }
    }
        
    }
} while ($isRefExist);

do{
    $prix = (int)readline("Entrer le prix: ");
    if($prix < 0){
        echo "Le prix doit etre positive \n";
    }

}while($prix < 0);

do{
    $quantite = (int)readline("Entrer le quantite: ");
    if($quantite < 0){
        echo "La quantite doit etre positive \n";
    }

}while($quantite < 0);

        $produit =   [
                    'nom' => $nomProduit,
                    'reference' => $reference,
                    'prix' => $prix,
                    'quantite' => $quantite
                  ] ;
          $categories[$index]["produits"][] = $produit;
       }else {
          echo " désolé , la categorie n'existe pas \n";
       }


       print_r($categories);

do {
$isNomExist = false;
$nomCategorie =readline("Entrer un nom: ");
if(empty($nomCategorie)){
    echo "Le champ ne doit pas etre vide \n";
    $isNomExist  = true;
}
foreach ($categories as $key => $categorie) {
    if($categorie['nom'] === $nomCategorie){
        echo "Ce nom de categorie existe deja \n";
       $isNomExist = true;
    }
     
}
} while ($isNomExist);

do {
$isCodeExist = false;
$codeCategorie =readline("Entrer un code: ");
if(empty($codeCategorie)){
    echo "Le champ ne doit pas etre vide \n";
    $isCodeExist  =true;
}
foreach ($categories as $key => $categorie) {
    if($categorie['code'] === $codeCategorie){
        echo "Ce code de categorie existe deja \n";
       $isCodeExist = true;
    }
     
}
} while ($isCodeExist);

$produits = [];

 do {

 do {
    $isNomExist = false;
    $nomProduit =readline("Entrer un nom: ");
    if(empty($nomProduit)){
        echo "Le champ ne doit pas etre vide \n";
        $isNomExist  = true;
    }
    foreach ($categories as $key => $categorie) {
           foreach ($categorie['produits'] as $produit) {
    if ($produit['nom'] === $nomProduit) {
        echo "Ce nom de produit existe deja \n";
        $isNomExist = true;
        break;
    }
}
        
    }
} while ($isNomExist);

do {
    $isRefExist = false;
    $reference =readline("Entrer un reference: ");
    if(empty($reference)){
        echo "Le champ ne doit pas etre vide \n";
        $isRefExist  = true;
    }
    foreach ($categories as $key => $categorie) {
           foreach ($categorie['produits'] as $produit) {
    if ($produit['reference'] === $reference) {
        echo "Cette référence de produit existe deja \n";
        $isRefExist = true;
        break;
    }
    }
        
    }
} while ($isRefExist);

do{
    $prix = (int)readline("Entrer le prix: ");
    if($prix < 0){
        echo "Le prix doit etre positive \n";
    }

}while($prix < 0);

do{
    $quantite = (int)readline("Entrer le quantite: ");
    if($quantite < 0){
        echo "La quantite doit etre positive \n";
    }

}while($quantite < 0);

         $produit =   [
                    'nom' => $nomProduit,
                    'reference' => $reference,
                    'prix' => $prix,
                    'quantite' => $quantite
                  ];
          $produits[]= $produit;

          $choix = strtolower(readline(" voulez vous continuer  oui/non "));
          
     } while ($choix === "oui");

     $categorie  =   [
         'nom' => $nomCategorie,
            'code' => $code,
            'produits' =>  $produits 
         ];

         $categories[] = $categorie;

         print_r($categories);