<?php  

    include 'model/dbconnexion.php';

    if(!isset($_SESSION)){
        session_start();
    }
    if(!isset($_SESSION['resto_management'])){

        $_SESSION['resto_management'] = array();
    }

    if(isset($_GET['id'])){
        $id = $_GET['id'];
    
        // Exécuter la requête SQL
        $readOne = $pdo->query("SELECT * FROM panier WHERE id='$id_produit'");
        
        // Vérifier si la requête a réussi
        if($readOne === false){
            // Afficher les informations sur l'erreur
            print_r($pdo->errorInfo());
            die("Une erreur s'est produite lors de l'exécution de la requête.");
        }
    
        // Vérifier le nombre de lignes retournées
        if($readOne->rowCount() == 0){
            die("Cet article n'existe pas.");
        }
   
    
    
        if(isset($_SESSION['panier'][$id])){

            $_SESSION['panier'][$id]++;
        }
        else{
            $_SESSION['panier'][$id] = 1;
            header('Location : home.php');
        }
    }
?>