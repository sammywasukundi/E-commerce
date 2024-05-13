<?php require 'dbconnexion.php'; 

session_start();

if(isset($_GET['t'],$_GET['id_produit']) and !empty($_GET['t']) and !empty($_GET['id_produit'])){
    $getid = (int) $_GET['id_produit'];
    $gett = (int) $_GET['t'];

    $session_user = $_SESSION['ID_Utilisateur'];
    $check = $pdo->prepare('SELECT id_produit FROM produits WHERE id_produit = ?');
    $check->execute(array($getid));

    if($check->rowCount() == 1){
        if($gett == 1){

            $check_like = $pdo->prepare('SELECT id_like FROM likes WHERE id_produit =:id_produit and ID_Utilisateur =:ID_Utilisateur');
            $check_like->execute(array('id_produit' => $getid,'ID_Utilisateur' => $session_user));

            $delete = $pdo->prepare('DELETE FROM dislikes WHERE id_produit =:id_produit and ID_Utilisateur =:ID_Utilisateur');
            $delete->execute(array('id_produit' => $getid,'ID_Utilisateur' => $session_user));

            if($check_like->rowCount() == 1){
                $delete = $pdo->prepare('DELETE FROM likes WHERE id_produit =:id_produit and ID_Utilisateur =:ID_Utilisateur');
                $delete->execute(array('id_produit' => $getid,'ID_Utilisateur' => $session_user));
            }else{
                $ins = $pdo->prepare('INSERT INTO likes (id_produit,ID_Utilisateur) VALUES (:id_produit,:ID_Utilisateur)');
                $ins->execute(array('id_produit' => $getid,'ID_Utilisateur' => $session_user));                
            }


        }elseif($gett == 2){
            $check_like = $pdo->prepare('SELECT id_dislike FROM dislikes WHERE id_produit =:id_produit and ID_Utilisateur =:ID_Utilisateur');
            $check_like->execute(array('id_produit' => $getid,'ID_Utilisateur' => $session_user));

            $delete = $pdo->prepare('DELETE FROM likes WHERE id_produit =:id_produit and ID_Utilisateur =:ID_Utilisateur');
            $delete->execute(array('id_produit' => $getid,'ID_Utilisateur' => $session_user));

            if($check_like->rowCount() == 1){
                $delete = $pdo->prepare('DELETE FROM dislikes WHERE id_produit =:id_produit and ID_Utilisateur =:ID_Utilisateur');
                $delete->execute(array('id_produit' => $getid,'ID_Utilisateur' => $session_user));
            }else{
                $ins = $pdo->prepare('INSERT INTO dislikes (id_produit,ID_Utilisateur) VALUES (:id_produit,:ID_Utilisateur)');
                $ins->execute(array('id_produit' => $getid,'ID_Utilisateur' => $session_user));                
            }
        }
        header('Location: http://localhost/Food_delivery/pages/products.php?id_produit='.$getid);
    }else{
        exit('Erreur fatale, <a href="http://localhost/Food_delivery/pages/">Revenir à l\'accueil</a>');
    }
}else{
    exit('Erreur fatale, <a href="http://localhost/Food_delivery/pages/">Revenir à l\'accueil</a>');
}