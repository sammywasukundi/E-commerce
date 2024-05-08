<?php  

    include 'model/dbconnexion.php';

    if(!isset($_SESSION)){
        session_start();
    }
    if(!isset($_SESSION['panier'])){

        $_SESSION['panier'] = array();
    }
    //echo $_GET['id_produit'];

    if(isset($_GET['id_produit'])){
        $id = $_GET['id_produit'];
    
        // Exécuter la requête SQL
        $readOne = $pdo->query("SELECT * FROM produits WHERE id_produit=$id");
        
        if(empty($readOne->fetch(PDO::FETCH_ASSOC))){
            die("Cet article n'existe pas.");
        }
    

   
    
    
        if(isset($_SESSION['panier'][$id])){

            $_SESSION['panier'][$id]++;
        }
        else{
            $_SESSION['panier'][$id] = 1;

        }
        header("Location: " . $_SERVER['PHP_SELF']);
        exit;
    }
?>