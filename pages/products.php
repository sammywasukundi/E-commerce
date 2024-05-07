<?php
include 'home.php';

// var_dump(array());
if (!isset($_SESSION['ID_Utilisateur'])) {
    header('Location: index.php');
    exit(0);
}
?>


<div class="p-4 sm:ml-64">
    <div class="rounded-lg dark:border-gray-700 p-4">
        <div class="grid lg:grid-cols-3 md:grid-cols-2 mt-14 gap-4 mb-4">
            <?php
            $select_product = 'SELECT * FROM produits';
            $show_product = $pdo->prepare($select_product);
            $show_product->execute();

            if ($show_product->rowCount() > 0) {
                while ($row = $show_product->fetch()) {

                    ?>
                    <div class="flex items-center justify-center mt-10 min-h-screen rounded" id="produit1">
                        <div
                            class="mx-auto max-w-xs bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                            <button type="submit" data-modal-target="large-modal" data-modal-toggle="large-modal">
                                <img class="p-8 rounded-t-lg" src="img_produits/<?= $row['img_produit']; ?>"
                                    alt="product image" />
                            </button>
                            <div class="px-5 pb-5">
                                <div class="px-5 pb-5">
                                    <div class="flex items-center mt-2.5 mb-5 space-x-4">
                                        <div class="flex items-center space-x-1 rtl:space-x-reverse">
                                            <a href="#">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                    stroke-width="1.5" stroke="currentColor"
                                                    class="w-6 h-6 hover:text-yellow-400 hover:border-none">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M6.633 10.25c.806 0 1.533-.446 2.031-1.08a9.041 9.041 0 0 1 2.861-2.4c.723-.384 1.35-.956 1.653-1.715a4.498 4.498 0 0 0 .322-1.672V2.75a.75.75 0 0 1 .75-.75 2.25 2.25 0 0 1 2.25 2.25c0 1.152-.26 2.243-.723 3.218-.266.558.107 1.282.725 1.282m0 0h3.126c1.026 0 1.945.694 2.054 1.715.045.422.068.85.068 1.285a11.95 11.95 0 0 1-2.649 7.521c-.388.482-.987.729-1.605.729H13.48c-.483 0-.964-.078-1.423-.23l-3.114-1.04a4.501 4.501 0 0 0-1.423-.23H5.904m10.598-9.75H14.25M5.904 18.5c.083.205.173.405.27.602.197.4-.078.898-.523.898h-.908c-.889 0-1.713-.518-1.972-1.368a12 12 0 0 1-.521-3.507c0-1.553.295-3.036.831-4.398C3.387 9.953 4.167 9.5 5 9.5h1.053c.472 0 .745.556.5.96a8.958 8.958 0 0 0-1.302 4.665c0 1.194.232 2.333.654 3.375Z" />
                                                </svg>
                                            </a>
                                        </div>
                                        <?php
                                        //$likes = $DB->query('SELECT id FROM likes WHERE id_article=?',array($product->id));
                                        //$likes = $product->rowCount();
                                        //foreach ($likes as $like):
                                        ?>
                                        <span
                                            class="bg-blue-100 text-blue-800 text-xs font-semibold px-2.5 py-0.5 rounded dark:bg-blue-200 dark:text-blue-800 ms-3"><?= '( 1 )' ?></span>
                                        <?php
                                        //endforeach
                                        ?>
                                        <div class="flex items-center space-x-1 rtl:space-x-reverse">
                                            <a href="#">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                    stroke-width="1.5" stroke="currentColor"
                                                    class="w-6 h-6 hover:text-yellow-400 hover:border-none">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M7.498 15.25H4.372c-1.026 0-1.945-.694-2.054-1.715a12.137 12.137 0 0 1-.068-1.285c0-2.848.992-5.464 2.649-7.521C5.287 4.247 5.886 4 6.504 4h4.016a4.5 4.5 0 0 1 1.423.23l3.114 1.04a4.5 4.5 0 0 0 1.423.23h1.294M7.498 15.25c.618 0 .991.724.725 1.282A7.471 7.471 0 0 0 7.5 19.75 2.25 2.25 0 0 0 9.75 22a.75.75 0 0 0 .75-.75v-.633c0-.573.11-1.14.322-1.672.304-.76.93-1.33 1.653-1.715a9.04 9.04 0 0 0 2.86-2.4c.498-.634 1.226-1.08 2.032-1.08h.384m-10.253 1.5H9.7m8.075-9.75c.01.05.027.1.05.148.593 1.2.925 2.55.925 3.977 0 1.487-.36 2.89-.999 4.125m.023-8.25c-.076-.365.183-.75.575-.75h.908c.889 0 1.713.518 1.972 1.368.339 1.11.521 2.287.521 3.507 0 1.553-.295 3.036-.831 4.398-.306.774-1.086 1.227-1.918 1.227h-1.053c-.472 0-.745-.556-.5-.96a8.95 8.95 0 0 0 .303-.54" />
                                                </svg>
                                            </a>
                                        </div>
                                        <?php

                                        //$dislikes = $DB->query('SELECT id FROM dislikes WHERE id_article=?',array($dislike->id));
                                        //$dislikes = $dislike->rowCount();
                                        //foreach ($dislikes as $dislike):
                                        ?>
                                        <span
                                            class="bg-blue-100 text-blue-800 text-xs font-semibold px-2.5 py-0.5 rounded dark:bg-blue-200 dark:text-blue-800 ms-3"><?= '( 1 )' ?></span>
                                        <?php
                                        //endforeach
                                        ?>
                                    </div>
                                </div>
                                <div class="flex items-center justify-between">
                                    <span
                                        class="text-xl font-semibold text-gray-600"><?= $row['nom'] . ' ' . number_format($row['prix'], 2, '.', ' '); ?>$</span>
                                    <a href="Add_to_cart.php?id_produit=<?= $row['id_produit'] ?>"
                                        class=" focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center text-gray-600 hover:text-gray-800">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-10 h-10">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                                        </svg>

                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                }
            }
            ?>
        </div>
    </div>
</div>

<?php
if (isset($_SESSION['ID_Utilisateur'])) {
    if ($_SESSION['role'] == 'admin') {

        include 'ajout_produit.php';
        ?>


        <!-- Modal toggle -->
        <!-- <button data-modal-target="crud-modal" data-modal-toggle="crud-modal" class="fixed right-6 bottom-6 group z-50 items-center text-gray-700 space-x-1 hover:text-gray-900 font-medium text-sm px-5 py-2.5 mr-2 mb-2" type="button">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-10 h-10">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
        </svg>
    </button> -->

        <!-- Main modal -->
        <!-- <div id="crud-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-md max-h-full">
             Modal content 
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                 Modal header 
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                        Create New Product
                    </h3>
                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="crud-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                 Modal body 
                <form class="p-4 md:p-5" action="" method="post" enctype="multipart/form-data">
                    <div class="grid gap-4 mb-4 grid-cols-2">    
                        <div class="col-span-2">
                            <label for="nom" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                            <input type="text" name="nom" id="nom" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Type product name" required="">
                        </div>
                        <div class="col-span-2">
                            <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Product Description</label>
                            <textarea name="description" id="description" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Write product description here"></textarea>                    
                        </div>
                        <div class="col-span-2">
                            <label for="prix" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Price</label>
                            <input type="number" name="prix" id="prix" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="$2999" required="">
                        </div>
                        <div class="col-span-2 sm:col-span-1">
                            <label class="space-x-2 rounded-lg cursor-pointer bg-white dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-inherit dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                <svg data-tooltip-target="tooltip-light" class="mb-2 w-12 h-12 justify-center mx-auto text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 001.5-1.5V6a1.5 1.5 0 00-1.5-1.5H3.75A1.5 1.5 0 002.25 6v12a1.5 1.5 0 001.5 1.5zm10.5-11.25h.008v.008h-.008V8.25zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                                </svg> 
                                <input name="img_produit" type="file" class="hidden" />
                            </label>
                        </div>
                        <div class="col-span-2 sm:col-span-1">
                            <button type="submit" name="submit_product" class="text-black bg-yellow-100 hover:bg-yellow-200 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 mb-8">Add product</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>  -->


        <!-- Large Modal -->
        <div id="large-modal" tabindex="-1"
            class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative w-full max-w-4xl max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <!-- Modal header -->
                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                        <h3 class="text-xl font-medium text-gray-900 dark:text-white">
                            Voir plus des details
                        </h3>
                        <button type="button"
                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                            data-modal-hide="large-modal">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <?php
                        $id_produit = $_GET['id_produit'];
                        $select_product = "SELECT * FROM produits WHERE id_produit =$id_produit ";
                        $show_product = $pdo->prepare($select_product);
                        $show_product->execute();

                        if ($show_product->rowCount() > 0) {
                            while ($row = $show_product->fetch()) {

                    ?>
                    <div class="grid lg:grid-cols-3 md:grid-cols-2 mt-4 gap-2 md:p-4 sm:p-4 mx-auto max-w-full">
                        <img class="p-2 rounded-t-lg" src="img_produits/<?= $row['img_produit']; ?>" alt="product image" />
                        <img class="p-2 rounded-t-lg" src="img_produits/<?= $row['img_produit']; ?>" alt="product image" />
                        <img class="p-2 rounded-t-lg" src="img_produits/<?= $row['img_produit']; ?>" alt="product image" />
                    </div>
                    <h5 class="text-sm font-semibold tracking-tight text-gray-900 dark:text-white">
                        <?= $row['description']; ?>
                    </h5>
                    <?php
                            }
                        }
                    ?>
                </div>
            </div>
        </div>
        <?php

    }
}
?>