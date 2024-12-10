<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/src/output.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <title>Document</title>
    <style>
        table {
            width: 60%;
            margin: 20px auto;
            border-radius: 10px;
        }
        th, td{
            padding: 8px;
            text-align: "center";
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <?php include('./header/header.php') ?>
    <main>
        <section>
            <div class="pl-56 mt-10">
                <a href="#" class='link text-red-500' >Home</a> / 
                <a href="#" class='link'>Auteurs</a> / 
                <a href="#" class='link'>Packages</a>
            </div>
        </section>
        <?php include("conx.php");?>

        <?php
            $sql = "SELECT 
                        a.Nom AS AuteurNom, 
                        p.Nom AS PackageNom, 
                        v.Num_Version AS VersionNum
                    FROM Auteur a
                    JOIN Package p ON a.ID_Auteur = p.ID_Auteur
                    JOIN Version v ON p.ID_Package = v.ID_Package";

            $donnees = $pdo->query($sql);
            // $donnees = $stmt->fetchAll(PDO::FETCH_ASSOC);
        ?>

            <!-- <h1 style="text-align: center;">Liste des Auteurs, Packages et Versions</h1> -->
        <table>
            <thead>
                <tr>
                    <th>Auteur</th>
                    <th>Package</th>
                    <th>Version</th>
                    <!-- <th>Action</th> -->
                </tr>
            </thead>
            <tbody>
                <?php foreach ($donnees as $ligne): ?>
                    <tr>
                        <td class="text-center"><?= $ligne['AuteurNom']?></td>
                        <td class="text-center"><?= $ligne['PackageNom'] ?></td>
                        <td class="text-center"><?= $ligne['VersionNum'] ?></td>
                        <!-- <td class="flex gap-4">
                            <button><i class="bi bi-trash-fill "></i></button>
                            <button><i class="bi bi-pencil-square text-yellow-500"></i></button>
                        </td> -->
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </main>
    <?php include('./footer/footer.php') ?>
    <script src="./assets/js/script.js">
    // const links = document.querySelectorAll(".link");
    // links.forEach((link) => {
    //     link.addEventListener('click', function () {
    //         links.forEach((l) => l.classList.remove('text-red-500'));
    //         link.classList.add('text-red-500');
    //     });
    // });
</script>
</body>
</html>