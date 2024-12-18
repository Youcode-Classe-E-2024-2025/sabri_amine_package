<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../assets/src/output.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Document</title>
</head>
<body>
<?php 
    include('../conx.php');

    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $email = $_POST['email'];
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT); 
        $role = 'user';
        
        $query = $con->prepare("INSERT INTO users (nom, prenom, email, password, role) VALUES (?, ?, ?, ?, ?)");

        if ($query) {
            $query->bind_param("sssss", $nom, $prenom, $email, $password, $role);

            if ($query->execute()) {
                header("Location: ../login/login.php");
                exit;
            } else {
                $error = "Erreur lors de l'inscription. Veuillez réessayer.";
            }
        } else {
            $error = "Erreur dans la préparation de la requête SQL.";
        }
    }
?>

    <section class="pl-12 pt-4">
        <img src="../assets/images/logo_js.png" alt="img js not found" width = "100px">
    </section>
    <section class="flex justify-center items-center mt-16 ">
        <div class="bg-white p-8 rounded-[12px] shadow-lg  border-2 border-gray-100 w-96">
            <h2 class="text-2xl  text-center font-bold mb-5 ">Inscription</h2>
            <?php if (!empty($error)) echo "<p style='color:red;'>$error</p>"; ?>
            <form action="" method="POST">
                <div class= "grid grid-cols-2 gap-3">
                    <div class="mb-4">
                        <label for="nom" class="block text-sm font-medium text-gray-700">Nom :</label>
                        <input type="text" name="nom" id="nom" placeholder="Entrez votre nom" class="w-full p-3 border border-gray-300 rounded-md outline-none" required>
                    </div>
                    <div class="mb-4">
                        <label for="prenom" class="block text-sm font-medium text-gray-700">Prenom :</label>
                        <input type="text" name="prenom" id="prenom" placeholder="Entrez votre prenom" class="w-full p-3 border border-gray-300 rounded-md outline-none" required>
                    </div>
                </div>
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email :</label>
                    <input type="text" name="email" id="email" placeholder="Entrez votre email" class="w-full p-3 border border-gray-300 rounded-md outline-none" required>
                </div>
                <div class="mb-6">
                    <label for="password" class="block text-sm font-medium text-gray-700">Mot de passe :</label>
                    <input type="password" name="password" id="password" placeholder="Entrez votre mot de passe" class="w-full p-3 border border-gray-300 rounded-md outline-none" required>
                </div>
                <div class="flex justify-center">
                    <input type="submit" value="S'inscrire" class="w-[150px] py-3 bg-yellow-500 text-white font-semibold rounded-md hover:bg-yellow-600 outline-none">
                </div>
                <div class="flex justify-center">
                    Already have an account ?<a href="../login/login.php" class= "text-gray-500"><u>Sign In</u></a>
                </div>
            </form>
        </div>
    </section>

</body>
</html>