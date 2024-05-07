<?php

    include 'dbconnexion.php';
    if(isset($_GET['id_produit'])){

        $delete = $_GET['id'];
        $requete = $pdo->prepare('DELETE p
                                    FROM panier p
                                    INNER JOIN produits pr ON p.produit_id = pr.id_produit
                                    WHERE  id = ?'
                                );
        // Ajoutez des conditions si nécessaire (par exemple, WHERE ...)
        $requete->execute(array(
            $delete
        ));
        if($requete){
            echo 'product deleted successfuly';
            header('Location : basket.php');
            exit(0);
        }
        else{
            echo 'echec de suppression';
            header('Location : basket.php');
            exit(0);
        }
    }

?>