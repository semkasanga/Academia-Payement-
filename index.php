<?php

session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="dist/style.css">
    <link rel="stylesheet" href="assets/fontawesome-free-6.5.1-web/css/all.css">
    <title>Academia Payment / Création Compte</title>
</head>
<body>
    <div>
        <div class="mt-28">
            <div class="border border-blue-600 w-fit m-auto rounded-2xl">
                <form class="space-y-5 p-5" action="" method="post">
                    <header class="flex justify-center text-2xl">Connexion</header>
                    <?php
                    
                    include "php/config.php";

                    if(isset($_POST['submit'])){
                        $matricule = mysqli_real_escape_string($con,$_POST['matricule']);
                        $motdepasse = mysqli_real_escape_string($con,sha1($_POST['motdepasse']));
                        $_SESSION['id'] = $verify_query['id'];


                        //vérification du matricule et mot de passe

                        $verify_query = mysqli_query($con,"SELECT matricule FROM users WHERE matricule='$matricule' AND motdepasse='$motdepasse'");

                        if(mysqli_num_rows($verify_query) !=1){
                            $message = "<div class=' text-center text-red-600'><p><i>Matricule ou mot de passe incorrect</i></p></div>";
                            echo $message;
                        }
                        else{
                            if(isset($_SESSION['valid']));{
                                header("Location: accueil.php");
                            }
                        }
                    }

                    ?>
                    <div class="space-y-5">
                        <div class="flex justify-center">
                            <input class="p-3 border border-gray-400" type="number" name="matricule" placeholder="Matricule" required>
                        </div>
                        <div class="flex justify-center">
                            <input class="p-3 border border-gray-400" type="password" name="motdepasse" placeholder="Mot de Passe" required>
                        </div>    
                    </div>
                    <div class="flex justify-center">
                        <input class="text-white bg-blue-600 p-5 rounded-lg w-full" type="submit" name="submit" value="Connexion">
                    </div>
                    <div class="flex justify-center">
                        <p>Vous n'avez pas un compte ? <a class="text-blue-600" href="creation_compte.php">Créer</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>