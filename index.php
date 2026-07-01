<?php
$categories = [

        0 => ['nom'=>'Alimentaire','code'=>'1234','produits'=>[

                            0 =>['nom'=>'Huile','reference'=>'KM34','prix'=>'1200','quantite'=>'100',],
                            1 =>['nom'=>'Sucre','reference'=>'KM25','prix'=>'600','quantite'=>'50',]
                                                             ]
            ],
            
        1 => ['nom'=>'Hygyene','code'=>'2864','produits'=>[]]

];

function afficheCategorieSansProduit(array $categories): void{
    foreach ($categories as  $categorie ) {
        if (empty($categorie["produits"])) {
            echo $categorie["nom"]."\n";
        }
    }
 }
 afficheCategorieSansProduit($categories);

 