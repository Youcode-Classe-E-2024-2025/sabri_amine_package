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
            width: 70%;
            margin: 20px auto;
            border-radius: 10px;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <?php include('./header/header.php') ?>
    <main>
        <?php
            $host = 'localhost';
            $dbname = 'gestion_packages';
            $user = 'root';
            $password = ''; 

            try {
                $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $password);
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                die("Erreur : " . $e->getMessage());
            }
        ?>

        <?php
            $sql = "SELECT 
                        a.Nom AS AuteurNom, 
                        p.Nom AS PackageNom, 
                        v.Num_Version AS VersionNum
                    FROM Auteur a
                    JOIN Package p ON a.ID_Auteur = p.ID_Auteur
                    JOIN Version v ON p.ID_Package = v.ID_Package";

            $stmt = $pdo->query($sql);
            $donnees = $stmt->fetchAll(PDO::FETCH_ASSOC);
        ?>

            <!-- <h1 style="text-align: center;">Liste des Auteurs, Packages et Versions</h1> -->
        <table>
            <thead>
                <tr>
                    <th>Auteur</th>
                    <th>Package</th>
                    <th>Version</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($donnees as $ligne): ?>
                    <tr>
                        <td><?= htmlspecialchars($ligne['AuteurNom']) ?></td>
                        <td><?= htmlspecialchars($ligne['PackageNom']) ?></td>
                        <td><?= htmlspecialchars($ligne['VersionNum']) ?></td>
                        <td class="flex gap-4">
                            <button><i class="bi bi-trash-fill "></i></button>
                            <button><i class="bi bi-pencil-square text-yellow-500"></i></button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </main>
    <?php include('./footer/footer.php') ?>
</body>
</html>