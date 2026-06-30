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
// print_r($categories);