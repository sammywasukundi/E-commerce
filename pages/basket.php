<?php
    include 'home.php';
    
?>


<?php
    $select = 'SELECT p.quantite, pr.nom, pr.prix, pr.img_produit
                FROM panier p INNER JOIN
                produits pr ON p.produit_id = pr.id_produit';
    try{

        $show = $pdo->prepare($select);
        $show->execute();

        $total = 0; // Initialisation du total

?>
<div class="p-4 sm:ml-64">
    <div class="p-4 border-none rounded-lg dark:border-gray-700 mt-8">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 mt-14">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3"></th>
                <th scope="col" class="px-6 py-3">Product name</th>
                <th scope="col" class="px-6 py-3">Quantity</th>
                <th scope="col" class="px-6 py-3">Price</th>
                <th scope="col" class="px-6 py-3 text">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
                //include 'model/request_delete.php';
                    if($show->rowCount() > 0) {
                        while($row = $show->fetch()) {
                            ?>
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    <img src="img_produits/<?= $row['img_produit']; ?>" class="w-14 h-12 object-cover" alt="">
                                </th>
                                <td class="px-6 py-4"><?= $row['nom']; ?></td>
                                <td class="px-6 py-4"><?= $row['quantite']; ?></td>
                                <td class="px-6 py-4"><?= $row['prix']; ?></td>
                                <td class="px-6 py-4">
                                    <button class="font-medium rounded-lg text-sm px-5 py-2.5" type="submit">
                                        <a href="#">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 hover:text-red-400">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                            </svg>   
                                        </a>
                                    </button>
                                </td>    
                            </tr>
                            <?php 
                            // Ajout du prix du produit au total
                            $total += $row['prix'] * $row['quantite'];
                        }
                    }
                    else{
                        echo "<script> alert('aucune donnée trouvée !'); </script>";
                    }
                }
                catch(PDOException $e) {
                    echo "Erreur lors de l'exécution de la requête : " . $e->getMessage();
                }
            ?>
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white"></th>
                <td class="px-6 py-4"></td>
                <td class="px-6 py-4"></td>
                <td class="px-6 py-4 font-bold">
                    Total : <?= $total; ?> <!-- Affichage du total -->
                </td>
                <td class="px-6 py-4"></td>
            </tr>
        </tbody>
    </table>
    </div>
</div>
