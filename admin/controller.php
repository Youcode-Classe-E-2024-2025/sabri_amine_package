<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>
<section>
        <?php
            include('../conx.php');
        ?>
        <?php 
            $id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

            if ($id > 0) {
                $sql = "SELECT * FROM auteur WHERE id_Auteur = $id";
                $result = mysqli_query($con, $sql);
                $row = mysqli_fetch_assoc($result);
                if (!$row) {
                    echo "Auteur not found!";
                }
                if (isset($_POST['Update_auteur'])) {
                    $nom = $_POST['nom'];
                    $description = $_POST['description'];

                    // Simple update query
                    $updateSql = "UPDATE auteur SET nom = '$nom', description = '$description' WHERE id_Auteur = $id";
                    if (mysqli_query($con, $updateSql)) {
                        header('Location: admin.php');
                        echo "Auteur updated successfully!";
                    } else {
                        echo "Error updating auteur.";
                    }
                }
            }
        ?>

        <div class="formUpdateAuteur w-full fixed top-0 pt-[15%] pl-[40%] h-full backdrop-blur-md" >
            <form action="" method="post" class="space-y-4 w-fit bg-white border-2 border-gray-200 shadow-lg rounded-lg p-6 pt-2">
                <div class="flex justify-end mr-[-12px] cursor-pointer">
                    <i class="bi bi-x-lg closeAuteur"></i>
                </div>
                <div>
                    <label for="nom" class="text-sm font-medium text-gray-700">Auteur :</label>
                    <input type="text" id="nom" name="nom" value="<?php echo htmlspecialchars($row['nom'] ?? ''); ?>"
                        class="mt-1 block w-[200px] px-4 py-2 text-gray-700 bg-gray-50 border border-gray-300 rounded-md outline-none" 
                        placeholder="Nom de l'auteur" required>
                </div>
                <div>
                    <label for="description" class="text-sm font-medium text-gray-700">Description :</label>
                    <textarea id="description" name="description" 
                        class="mt-1 block px-4 py-2 text-gray-700 bg-gray-50 border border-gray-300 rounded-md outline-none" 
                        placeholder="Une brève description" rows="1" required><?php echo htmlspecialchars($row['description'] ?? ''); ?></textarea>
                </div>
                <div class="text-center">
                    <button type="submit" name="Update_auteur" 
                            class="px-6 py-2 bg-yellow-500 text-white rounded-md outline-none">
                        Update Auteur
                    </button>
                </div>
            </form>
        </div>
</section>

</body>
</html>
