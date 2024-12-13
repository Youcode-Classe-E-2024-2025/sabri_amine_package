    <header class="flex justify-between items-center pr-10 pl-10  shadow-lg">
        <div class="text-xl font-bold">
            <img src="../assets/images/logo_js.png" alt="img js not found" width = "60px">
        </div>

        <div class="space-x-4 flex justify-center items-center">
            <?php
                session_start();
                if (isset($_SESSION['nom']) && isset($_SESSION['prenom'])) {
                    echo "<h1 class=\"border-2 border-yellow-500 text-white rounded-lg p-[2px] pl-10 pr-10  bg-yellow-500\">" . $_SESSION['nom'] . " " . $_SESSION['prenom'] . "</h1>";

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
    if (isset($_POST['logout'])) {
        session_start();
        session_unset();
        session_destroy();
        header("Location: ../login/login.php");
        exit;
    }
?>