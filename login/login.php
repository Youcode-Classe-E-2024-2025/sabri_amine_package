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
    <section class="pl-12 pt-4">
        <img src="../assets/images/logo_js.png" alt="img js not found" width = "100px">
    </section>
    <?php
        session_start();
        require '../conx.php'; 

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $email = $_POST['email'];
            $password = $_POST['password'];

            // Préparer la requête avec MySQLi
            $query = $con->prepare("SELECT * FROM users WHERE email = ?");
            $query->bind_param("s", $email);
            $query->execute();
            $result = $query->get_result();
            $user = $result->fetch_assoc();

            if ($user && password_verify($password, $user['password'])) {
                // Stocker l'utilisateur dans la session
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['role'] = $user['role'];

                // Redirection en fonction du rôle
                if ($user['role'] === 'admin') {
                    header("Location: ../admin/admin.php");
                } else {
                    header("Location: ../user/index.php");
                }
                exit;
            } else {
                $error = "Email ou mot de passe incorrect.";
            }
        }
        ?>

    <section class="flex justify-center items-center mt-16 ">
        <div class="bg-white p-8 rounded-[12px] shadow-lg  border-2 border-gray-100 w-96">
            <h2 class="text-2xl  text-center font-bold mb-5 ">Se connecter</h2>
            <form action="" method="POST">
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email :</label>
                    <input type="text" name="email" id="email" placeholder="Entrez votre email" class="w-full p-3 border border-gray-300 rounded-md outline-none " required>
                </div>
                <div class="mb-6">
                    <label for="password" class="block text-sm font-medium text-gray-700">Mot de passe :</label>
                    <input type="password" name="password" id="password" placeholder="Entrez votre mot de passe" class="w-full p-3 border border-gray-300 rounded-md outline-none " required>
                </div>
                <div class="flex justify-center">
                    <input type="submit" value="Se connecter" class="w-[150px] py-3 bg-yellow-500 text-white font-semibold rounded-md hover:bg-yellow-600 outline-none ">
                </div>
            </form>
        </div>
    </section>

</body>
</html>