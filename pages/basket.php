<?php
    include 'home.php';

    if(isset($_POST['panier']['qte'])){
        foreach ($_SESSION['panier'] as $product_id => $qte) {
            $_SESSION['panier'][$product_id] = $_POST['panier']['qte'][$product_id];
        }
        recalculer();
    }

    function recalculer(){
        $_SESSION['panier'] = $_POST['panier']['qte'];
    }

    // delete products
    if(isset($_GET['del'])){
        $id_del = $_GET['del'];
        unset($_SESSION['panier'][$id_del]);
    }
    
?>


<?php
    // $select = 'SELECT p.quantite, pr.nom, pr.prix, pr.img_produit
    //             FROM panier p INNER JOIN
    //             produits pr ON p.produit_id = pr.id_produit';
    // try{

    //     $show = $pdo->prepare($select);
    //     $show->execute();

    $total = 0; // Initialisation du total
     
?>
<div class="p-4 sm:ml-64">
    <div class="p-4 border-none rounded-lg dark:border-gray-700 mt-8">
        <form action="basket.php" method="post">
            
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 mt-14">
                
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <?= require 'model/message.php'; ?>
                    <tr>
                        <th scope="col" class="px-6 py-3"></th>
                        <th scope="col" class="px-6 py-3">Product name</th>
                        <th scope="col" class="px-6 py-3">Quantity</th>
                        <th scope="col" class="px-6 py-3">Price</th>
                        <th scope="col" class="px-6 py-3 text">Action</th>
                    </tr>
                </thead>
                <?php 
                    $ids = array_keys($_SESSION['panier']);
                    if(empty($ids)){
                        $_SESSION['message'] = 'Votre panier est vide !';
                        // header('Location:basket.php');
                        // exit(0);
                    }else{
                        // $selects = $pdo->prepare('SELECT p.quantite, pr.nom, pr.prix, pr.img_produit
                        // FROM panier p INNER JOIN
                        // produits pr ON p.produit_id = pr.id_produit WHERE pr.id_produit IN ('.implode(',',$ids).')');
                        $selects = $pdo->prepare('SELECT * FROM produits WHERE id_produit IN ('.implode(',',$ids).')');

                        $selects->execute($ids);
                        foreach ($selects as $select) :
                        $total += $select['prix'] * $_SESSION['panier'][$select['id_produit']];

                ?>
                <tbody>

                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            <img src="img_produits/<?= $select['img_produit']; ?>" class="w-14 h-12 object-cover" alt="">
                        </th>
                        <td class="px-6 py-4"><?= $select['nom']; ?></td>
                        <td class="px-6 py-4">
                            <input class="w-14 border-0 focus:ring-0" type="text" value="<?= $_SESSION['panier'][$select['id_produit']] ?>" name="panier[qte][<?= $select['id_produit']; ?>]">
                        </td>
                        <td class="px-6 py-4"><?= $select['prix'].' '; ?>$</td>
                        <td class="px-6 py-4">
                            <a href="basket.php?del=<?= $select['id_produit'] ?>">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                                </svg>   
                            </a>
                        </td>    
                    </tr>
                    <?php 
                        endforeach;
                            // Ajout du prix du produit au total
                        //}
                    }
                    ?>
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white"></th>
                        <td class="px-6 py-4"></td>
                        <td class="px-6 py-4">
                            <button type="submit">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-9 h-9 text-gray-600 hover:text-gray-800">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0 3.181 3.183a8.25 8.25 0 0 0 13.803-3.7M4.031 9.865a8.25 8.25 0 0 1 13.803-3.7l3.181 3.182m0-4.991v4.99" />
                                </svg>
                            </button>
                        </td>
                        <td class="px-6 py-4 font-bold">
                            Total : <?= $total; ?>$ <!-- Affichage du total -->
                        </td>
                        <td class="px-6 py-4"></td>
                    </tr>
                </tbody>
            </table>
        </form>
    </div>
</div>
<?php require 'footer.php'; ?>
