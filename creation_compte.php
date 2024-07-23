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
            <div class="flex justify-center gap-5 border border-blue-600 w-fit m-auto rounded-2xl">
                <div class="bg-gradient-to-br to-blue-800 from-blue-950 p-10 rounded-l-2xl">
                    <img class="w-24" src="assets/images/logo.png">
                    <div class="p-10 mt-32 pr-3 text-blue-300">
                        <h1 class="text-2xl">Academia Payment</h1>
                        <h2 class="text-xl">Page d'inscription</h2>
                    </div>
                </div>
                <form class="space-y-5 p-5" action="" method="post">
                    <header class="flex justify-center text-2xl">Créer Votre Compte</header>
                    <?php

use function PHPSTORM_META\map;

                    include "php/config.php";

                    if(isset($_POST['submit'])){
                        $nom = $_POST['nom'];
                        $postnom = $_POST['postnom'];
                        $prenom = $_POST['prenom'];
                        $filiere = $_POST['filiere'];
                        $promotion = $_POST['promotion'];
                        $faculte = $_POST['faculte'];
                        $matricule = $_POST['matricule'];
                        $motdepasse = sha1($_POST['motdepasse']);

                        //vérification du matricule

                        $verify_query = mysqli_query($con,"SELECT matricule FROM users WHERE matricule='$matricule'");

                        if(mysqli_num_rows($verify_query) !=0){
                            $message = "<div class=' text-center text-red-600'><p><i>Le matricule est déjà utilisé</i></p></div>";
                            echo $message;
                        }
                        else{
                            mysqli_query($con,"INSERT INTO users(nom,postnom,prenom,filiere,promotion,faculte,matricule,motdepasse) VALUES('$nom','$postnom','$prenom','$filiere','$promotion','$faculte','$matricule','$motdepasse')") or die("Insertion des données échouée");

                            $message = "<div class=' text-center text-blue-600'><p><i>Enrégistrement Réussi !</i></p></div>";
                            echo $message;

                            echo "<a href='index.php' class=' flex justify-center text-center text-blue-600 p-3 rounded-lg mt-10'>Connexion</a>";

                        }
                    }
                    
                    ?>
                    <div class="flex gap-5 justify-center">
                        <div>
                            <input class="p-3 border border-gray-400" type="text" name="nom" placeholder="Nom" required>
                        </div>
                        <div>
                            <input class="p-3 border border-gray-400" type="text" name="postnom" placeholder="Post-nom" required>
                        </div>    
                    </div>
                    <div class="flex gap-5 justify-center">
                        <div>
                            <input class="p-3 border border-gray-400" type="text" name="prenom" placeholder="Prénom" required>
                        </div>
                        <div>
                            <input class="p-3 border border-gray-400" type="text" name="filiere" placeholder="Filière" required>
                        </div>    
                    </div>
                    <div class="flex gap-5 justify-center">
                        <select name="promotion" required>
                            <option>BAC 1</option>
                            <option>BAC 2</option>
                            <option>BAC 3</option>
                            <option>BAC 4</option>
                        </select>
                        <select name="faculte" required>
                            <option>Sc Informatiques</option>
                            <option>Sc Info & Télécom</option>
                            <option>Ecole d'architecture</option>
                            <option>Droit</option>
                            <option>Lettre et Sc Sociales</option>
                            <option>Théologie</option>
                            <option>Economie</option>
                            <option>Polytechniques</option>
                        </select>
                    </div>
                    <div class="flex gap-5 justify-center">
                        <div>
                            <input class="p-3 border border-gray-400" type="number" name="matricule" placeholder="Matricule" required>
                        </div>
                        <div>
                            <input class="p-3 border border-gray-400" type="password" name="motdepasse" placeholder="Mot de Passe" required>
                        </div>    
                    </div>
                    <div class="flex justify-center">
                        <input class="text-white bg-blue-600 p-5 rounded-lg w-full" type="submit" name="submit" value="Enrégistrer">
                    </div>
                    <div class="flex justify-center">
                        <p>Vous avez déjà un compte ? <a class="text-blue-600" href="index.php">Connectez Vous</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>