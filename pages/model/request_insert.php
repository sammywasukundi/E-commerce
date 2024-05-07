<!-- insertion utilisateur -->
<?php

    //session_start();
    include 'dbconnexion.php';
    //include 'message.php';
    if(isset($_POST['submit_user'])){
        if(isset($_POST['email_user'],$_POST['password_user'],$_POST['repeat_password_user'],$_POST['first_name_user'],$_POST['last_name_user'],$_POST['phone_user'],$_POST['address_user'])){
            if($_POST['email_user'] != '' && $_POST['password_user'] != '' && $_POST['repeat_password_user'] != '' && $_POST['first_name_user'] != '' && $_POST['last_name_user'] != '' && $_POST['phone_user'] != '' && $_POST['address_user'] != ''){
                $email_user = $_POST['email_user'];
                $password_user = md5($_POST['password_user']);
                $repeat_password_user = $_POST['repeat_password_user'];
                $first_name_user = $_POST['first_name_user'];
                $last_name_user = $_POST['last_name_user'];
                $phone_user = $_POST['phone_user'];
                $address_user = $_POST['address_user'];

                if(  $_POST['repeat_password_user'] != $_POST['password_user']){
                    $_SESSION['message'] = 'Veuillez tapez le meme mot de passe';
                }
                else{
                    if(isset($_FILES['profil_user']) AND $_FILES['profil_user']['error'] == 0){
                        if($_FILES['profil_user']['size'] < 5000000)
                        {
                            $nom_fichier = pathinfo($_FILES['profil_user']['name']);
                            $recup_extension =  $nom_fichier['extension'];
                            $extensions =array('png','jpg','JPG','jpeg');
                            if(in_array($recup_extension,$extensions)){
                                if(move_uploaded_file($_FILES['profil_user']['tmp_name'],'profil_users/'.basename($_FILES['profil_user']['name'])))
                                {
                                    							

                                    $insert = $pdo->prepare("INSERT INTO utilisateurs(email_user,password_user,first_name_user,last_name_user,phone_user,address_user,profil_user) VALUES(:email_user,:password_user,:first_name_user,:last_name_user,:phone_user,:address_user,:profil_user)");
                                    $insert->execute(array(
                                        'email_user' => $email_user,
                                        'password_user' => $password_user,
                                        'first_name_user' => $first_name_user,
                                        'last_name_user' => $last_name_user,
                                        'phone_user' => $phone_user,
                                        'address_user' => $address_user,
                                        'profil_user' => $_FILES['profil_user']['name']
                                    ));                            
                                    if($insert){
                                        $_SESSION['message'] = 'Connectez-vous ';
                                        header('Location:index.php');
                                        exit(0);
                                    }
                                    else{
                                        $_SESSION['message'] = "échec d'enregistrement";
                                        header('Location:inscription.php');
                                        exit(0);
                                    }                   
                                }
                            }else{
                                $_SESSION['message'] = 'extension non autorisée';
                            }
                        }else
                        {
                            $_SESSION['message'] = 'Fichier volumineux';

                        }
                    }
                }
            }
            else{
                $_SESSION['message'] = 'Veuillez completer tous les champs';
                header('Location:inscription.php');
                exit(0);
            }
        }
    }

    // insert product
    if(isset($_POST['submit_product'])){
        if(isset($_POST['nom'],$_POST['description'],$_POST['prix'])){
            if($_POST['nom'] != '' and $_POST['description'] != '' and $_POST['prix'] != ''){
                $product_name=$_POST['nom'];
                $product_description=$_POST['description'];
                $product_price=$_POST['prix'];

                if(isset($_FILES['img_produit']) AND $_FILES['img_produit']['error'] == 0){
                    if($_FILES['img_produit']['size'] < 5000000)
                    {
                        $nom_fichier = pathinfo($_FILES['img_produit']['name']);
                        $recup_extension =  $nom_fichier['extension'];
                        $extensions =array('png','jpg','JPG','jpeg');
                        if(in_array($recup_extension,$extensions)){
                            if(move_uploaded_file($_FILES['img_produit']['tmp_name'],'img_produits/'.basename($_FILES['img_produit']['name'])))
                            {
                                                            

                                $insert_product = $pdo->prepare("INSERT INTO produits(nom,description,prix,img_produit) VALUES(:nom,:description,:prix,:img_produit)");
                                $insert_product->execute(array(
                                    'nom' => $product_name,
                                    'description' => $product_description,
                                    'prix' => $product_price,
                                    'img_produit' => $_FILES['img_produit']['name']
                                ));                            
                                if($insert_product){
                                    // $_SESSION['message'] = 'produit ajouté avec succès ';
                                    // exit(0);
                                    echo "<script>
                                    alert('produit ajouté avec succès'); 
                                    </script>"; 
                                    exit(0); 
                                }
                                else{
                                    // $_SESSION['message'] = "échec d'enregistrement";
                                    // exit(0);
                                    echo "<script>
                                    alert('échec d'enregistrement'); 
                                    </script>";
                                }                   
                            }
                        }else{
                            //$_SESSION['message'] = 'extension non autorisée';
                            echo "<script>
                            alert('extension non autorisée'); 
                            </script>";
                        }
                    }else
                    {
                        //$_SESSION['message'] = 'Fichier volumineux';
                        echo "<script>
                            alert('Fichier volumineux'); 
                            </script>";
                    }
                }
            }

        }
    }
?>