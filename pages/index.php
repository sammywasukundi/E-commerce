<?php
    //session_start();
    include 'model/request_select.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link href="/dist/output.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.css"  rel="stylesheet" />
    <script src="https://unpkg.com/scrollreveal"></script>
</head>

<body>

    <?php include 'model/message.php'; ?> 
    <div class="block items-center justify-center mx-auto h-screen">
        <div class="flex items-center justify-center mx-auto mt-10" id="logo">
            <img class="rounded-full object-cover w-24 min-h-screen" src="../assets/images/splash.png" alt="">
            <p class="flex self-center text-2xl font-extrabold sm:text-2xl whitespace-nowrap dark:text-white text-yellow-700 decoration-1 " style="color: rgb(51, 50, 45);
                    text-shadow: -1px -1px 1px rgba(225, 164, 10, 0.2), 
                                 1px 1px 1px rgba(219, 153, 9, 0.6);"><span style="color: rgb(232, 147, 10);
                    text-shadow: -1px -1px 1px rgba(231, 229, 225, 0.2), 
                                 1px 1px 1px rgba(237, 235, 231, 0.6);">Food-</span>Hub</p>
        </div>
        <div class="grid md:grid-cols-2 items-center justify-center  mx-auto max-w-xl mt-10">
            <div class="md:block hidden w-full" id="image">
                <img class="object-cover" src="../assets/images/melogin.png" alt="">
            </div>
            <div id="form">
                <form method="post">
                    <div class="relative z-0 w-full mb-5 group" >
                        <input type="text" name="first_name_user" id="floating_email"
                            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-gray-500 focus:outline-none focus:ring-0 focus:border-yellow-600 peer"
                            placeholder=" "/>
                        <label for="floating_email"
                            class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-yellow-600 peer-focus:dark:text-yellow-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">First name</label>
                    </div>
                    <div class="relative z-0 w-full mb-5 group">
                        <input type="password" name="password_user" id="floating_password"
                            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                            placeholder=" "/>
                        <label for="floating_password"
                            class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Password</label>
                    </div>
                    <div class="mt-10 space-y-5">
                        <button type="submit" name="submit_connexion" class="w-full block bg-current text-gray-500 border-gray-400 hover:shadow-inner transform border-2 hover:scale-110 hover:border-gray-700 px-5 py-2 rounded-md font-semibold dark:bg-blue-300">Se connecter</button>
                        <p class="flex justify-between text-sm font-light text-gray-500 dark:text-gray-400">
                            You don't have an account ? <a href="inscription.php" class="font-medium hover:text-gray-600 dark:text-primary-500 text-gray-500">Inscrivez-vous</a>
                        </p>
                    </div>
                </form>
            </div>
        </div>        
    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.js"></script>
    <script src="js/dom.js"></script>

</body>

</html>