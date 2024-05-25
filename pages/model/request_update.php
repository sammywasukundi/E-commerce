<?php
    include 'dbconnexion.php';


    if (isset($_POST['submit_update'])) {
        $prod_id = $_GET['id_produit'];
        $name = htmlspecialchars($_POST['nom']);
        $price = htmlspecialchars($_POST['prix']);
        $description = htmlspecialchars($_POST['description']);


        $query = $pdo->prepare("UPDATE produits SET nom=?,prix=?,description=? WHERE id_produit=?");
        $query->execute(array($name, $price, $description, $prod_id));
        if ($query) {
            $_SESSION['message'] = 'product updated successfully';
            // header('Location: http://localhost/Food_delivery/pages/products.php?id_produit='.$getid);
            // header('Location:index.php');
            // exit(0);
        } else {
            $_SESSION['message'] = 'product not updated';
            // header('Location:index.php');
            // exit(0);
        }
    }

?>