<?php
    session_start();
    include 'dbconnexion.php';
    if(isset($_POST['submit_connexion'])){

        if(isset($_POST['first_name_user'],$_POST['password_user'])){
            if($_POST['first_name_user'] != '' && $_POST['password_user'] != ''){
                $first_name_user = $_POST['first_name_user'];
                $password_user = md5($_POST['password_user']);

                $select=$pdo->prepare('SELECT * FROM utilisateurs WHERE first_name_user = :first_name_user AND password_user = :password_user');
                $select->execute(array(
                    'first_name_user' => $first_name_user,
                    'password_user' => $password_user
                ));
                $result = $select->fetch();
                if($result){
                        $_SESSION['ID_Utilisateur'] = $result['ID_Utilisateur'];
                        $_SESSION['email_user'] = $result['email_user'];
                        $_SESSION['first_name_user'] = $result['first_name_user'];
                        $_SESSION['last_name_user'] = $result['last_name_user'];
                        $_SESSION['address_user'] = $result['address_user'];
                        $_SESSION['password_user'] = $result['password_user'];
                        $_SESSION['phone_user'] = $result['phone_user'];
                        $_SESSION['profil_user'] = $result['profil_user'];
                        $_SESSION['role'] = $result['role'];
                        header('Location:products.php');
                        exit;                        

                }else{

                    $_SESSION['message'] = 'Mauvais identifiant ou mot de passe !';
                    header('Location:index.php');
                    exit(0);
                }


            }
            else{
                $_SESSION['message'] = 'Veuillez compléter tous les champs';
                header('Location:index.php');
                exit(0);
            }
        }

    }
?>
