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
            text-align:center;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <?php include('../header/header.php') ?>
    <main>
        <section>
            <div class="pl-56 mt-10">
                <span id="home" class='link text-yellow-500 cursor-pointer' >Home</span> / 
                <span id="auteur" class='link cursor-pointer'>Auteurs</span> / 
                <span id="package" class='link cursor-pointer'>Packages</span>
            </div>
        </section>
        <?php include("../conx.php");?>
        <section class="All">
            <?php
                $sql = "SELECT 
                            a.id_auteur,
                            a.Nom AS AuteurNom, 
                            p.Nom AS PackageNom, 
                            v.Num_Version AS VersionNum
                        FROM Auteur a
                        JOIN Package p ON a.ID_Auteur = p.ID_Auteur
                        JOIN Version v ON p.ID_Package = v.ID_Package";

                $donnees = $pdo->query($sql);
                // $donnees = $stmt->fetchAll(PDO::FETCH_ASSOC);
            ?>
            <table>
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Auteur</th>
                        <th>Package</th>
                        <th>Version</th>
                        <!-- <th>Action</th> -->
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($donnees as $ligne): ?>
                        <tr>
                            <td><?= $ligne['id_auteur']?></td>
                            <td><?= $ligne['AuteurNom']?></td>
                            <td><?= $ligne['PackageNom'] ?></td>
                            <td><?= $ligne['VersionNum'] ?></td>
                            <!-- <td class="flex gap-4">
                                <button><i class="bi bi-trash-fill "></i></button>
                                <button><i class="bi bi-pencil-square text-yellow-500"></i></button>
                            </td> -->
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </section>

        <section class= "Auteurs hidden">
            <?php
                $sql = "SELECT * FROM Auteur";
                $donnees = $pdo->query($sql);
            ?>
            <table>
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Auteur</th>
                        <th>Description</th>
                        <th>Date Creation</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($donnees as $ligne): ?>
                        <tr>
                            <td><?= $ligne['id_Auteur']?></td>
                            <td><?= $ligne['nom']?></td>
                            <td><?= $ligne['description'] ?></td>
                            <td><?= $ligne['date_Creation'] ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </section>

        <section class= "Packages hidden">
            <?php
                $sql = "SELECT 
                        p.id_package as idPackage,
                        p.nom as nomPackage,
                        p.description as descPackage,
                        p.date_creation as datePackage,
                        a.nom as nomAuteur
                        FROM auteur a
                        JOIN Package p ON a.id_auteur = p.id_auteur";
                $donnees = $pdo->query($sql);
            ?>
            <table>
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nom</th>
                        <th>Description</th>
                        <th>Date Creation</th>
                        <th>Auteur</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($donnees as $ligne): ?>
                        <tr>
                            <td><?= $ligne['idPackage']?></td>
                            <td><?= $ligne['nomPackage']?></td>
                            <td><?= $ligne['descPackage'] ?></td>
                            <td><?= $ligne['datePackage'] ?></td>
                            <td><?= $ligne['nomAuteur'] ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </section>
        
    </main>
    <?php include('../footer/footer.php') ?>
    <script src="../assets/js/script.js"></script>
</body>
</html>