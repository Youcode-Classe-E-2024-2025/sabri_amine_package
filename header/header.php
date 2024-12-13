    <header class="flex justify-between items-center pr-10 pl-10  shadow-lg">
        <div class="text-xl font-bold">
            <img src="../assets/images/logo_js.png" alt="img js not found" width = "60px">
        </div>

        <div class="space-x-4 flex justify-center">
            <?php
                session_start();
                if (isset($_SESSION['nom']) && isset($_SESSION['prenom'])) {
                    echo "<h1>" . $_SESSION['nom'] . " " . $_SESSION['prenom'] . "</h1>";
                } else {
                    echo "";
                }
            ?>
            <form action="" method="POST">
                <button type="submit" name="logout" class="bg-gray-700 text-white px-4 py-1 rounded hover:bg-gray-500">Logout</button>
            </form>
        </div>
    </header>
    <?php
    // Vérifier si le bouton logout a été cliqué
    if (isset($_POST['logout'])) {
        // Démarrer la session
        session_start();
        
        // Détruire toutes les variables de session
        session_unset();
        
        // Détruire la session
        session_destroy();
        
        // Redirection vers la page de connexion
        header("Location: ../login/login.php");
        exit;
    }
?>