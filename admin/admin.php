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
                <span id="package" class='link cursor-pointer'>Packages</span>/
                <span id="version" class='link cursor-pointer'>Version</span>
            </div>
        </section>
        <?php include("../conx.php");?>
        <section class="All">
            <?php
                $sql = "SELECT 
                            a.id_auteur,
                            a.Nom AS AuteurNom, 
                            p.NomP AS PackageNom, 
                            v.Num_Version AS VersionNum
                        FROM Auteur a
                        JOIN Package p ON a.ID_Auteur = p.ID_Auteur
                        JOIN Version v ON p.ID_Package = v.ID_Package";

                $donnees = $con->query($sql);
                // $donnees = $stmt->fetchAll(PDO::FETCH_ASSOC);
            ?>
            <div class="flex justify-end pr-24">
                <p class="p-2 px-6 rounded-lg bg-white-300 text-white">
                    .
                </p>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Auteur</th>
                        <th>Package</th>
                        <th>Version</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($donnees as $ligne): ?>
                        <tr>
                            <td><?= $ligne['id_auteur']?></td>
                            <td><?= $ligne['AuteurNom']?></td>
                            <td><?= $ligne['PackageNom'] ?></td>
                            <td><?= $ligne['VersionNum'] ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </section>

        <section class= "Auteurs hidden">
            <?php
                $sql = "SELECT * FROM Auteur";
                $donnees = $con->query($sql);
            ?>
            <?php
                if ($_SERVER['REQUEST_METHOD'] == "POST") {
                    if (isset($_POST['delete_auteur'])) {
                        $id_auteur = $_POST['id_auteur'];
                        
                        $sql = "DELETE FROM Auteur WHERE id_Auteur = ?";
                        $stmt = $con->prepare($sql);
                        $stmt->bind_param('i', $id_auteur); 
                        $stmt->execute();
                        $stmt->close();
                    }
                }
            ?>
            <div class="flex justify-end pr-24">
                <button class="ajouteAuteur p-2 px-6 rounded-lg bg-yellow-300 text-white">
                    Ajouté Auteur
                </button>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Auteur</th>
                        <th>Description</th>
                        <th>Date Creation</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($donnees as $ligne): ?>
                        <tr>
                            <td><?= $ligne['id_Auteur']?></td>
                            <td><?= $ligne['nom']?></td>
                            <td><?= $ligne['description'] ?></td>
                            <td><?= $ligne['date_Creation'] ?></td>
                            <td class="flex gap-4 justify-center">
                                <form action="admin.php" method="POST">
                                    <input type="hidden" name="id_auteur" value="<?= $ligne['id_Auteur'] ?>">
                                    <button type="submit" name="delete_auteur" class="bi bi-trash-fill"></button>
                                </form>
                                <a href="controller.php?id=<?= $ligne['id_Auteur'] ?>">
                                    <i class="bi bi-pencil-square text-yellow-500 iconUpdateAuteur"></i>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </section>

        <section class= "Packages hidden">
            <?php
                $sql = "SELECT 
                        p.id_package as idPackage,
                        p.nomP as nomPackage,
                        p.descriptionP as descPackage,
                        p.date_creation as datePackage,
                        a.nom as nomAuteur
                        FROM auteur a
                        JOIN Package p ON a.id_auteur = p.id_auteur";
                $donnees = $con->query($sql);
            ?>
            <?php
                if ($_SERVER['REQUEST_METHOD'] == "POST") {
                    if (isset($_POST['delete_package'])) {
                        $id_package = $_POST['id_package'];
                        
                        $sql = "DELETE FROM Package WHERE id_package = ?";
                        $stmt = $con->prepare($sql);
                        $stmt->bind_param('i', $id_package);  // 'i' pour entier
                        $stmt->execute();
                        $stmt->close();
                    }
                }
            ?>

            <div class="flex justify-end pr-24">
                <button class="ajoutePackage p-2 px-6 rounded-lg bg-yellow-300 text-white">
                    Ajouté Packages
                </button>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nom</th>
                        <th>Description</th>
                        <th>Date Creation</th>
                        <th>Auteur</th>
                        <th>Action</th>
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
                            <td class="flex gap-4 justify-center">
                                <form action="admin.php" method="POST">
                                    <input type="hidden" name="id_package" value="<?= $ligne['idPackage'] ?>">
                                    <button type="submit" name="delete_package" class="bi bi-trash-fill"></button>
                                </form>
                                <a href="controller.php?id=<?= $ligne['idPackage'] ?>">
                                    <i class="bi bi-pencil-square text-yellow-500 iconUpdatePackage"></i>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </section>

        <section class= "Version hidden">
            <?php
                $sql = "SELECT 
                        v.id_version as idVersion,
                        v.num_version as numVersion,
                        p.nomP as nomPackage
                        FROM package p
                        JOIN version v ON v.id_package = v.id_package";
                $donnees = $con->query($sql);
            ?>
            <?php
                if ($_SERVER['REQUEST_METHOD'] == "POST") {
                    if (isset($_POST['delete_version'])) {
                        $id_version = $_POST['id_version'];
                        
                        $sql = "DELETE FROM version WHERE id_version = ?";
                        $stmt = $con->prepare($sql);
                        $stmt->bind_param('i', $id_version);  // 'i' pour entier
                        $stmt->execute();
                        $stmt->close();
                    }
                }
            ?>

            <div class="flex justify-end pr-24">
                <button class="ajouteVersion p-2 px-6 rounded-lg bg-yellow-300 text-white">
                    Ajouté Version
                </button>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Verion</th>
                        <th>Nom_Package</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($donnees as $ligne): ?>
                        <tr>
                            <td><?= $ligne['idVersion']?></td>
                            <td><?= $ligne['numVersion']?></td>
                            <td><?= $ligne['nomPackage'] ?></td>
                            <td class="flex gap-4 justify-center">
                                <form action="admin.php" method="POST">
                                    <input type="hidden" name="id_version" value="<?= $ligne['idVersion'] ?>">
                                    <button type="submit" name="delete_version" class="bi bi-trash-fill"></button>
                                </form>
                                <button><i class="bi bi-pencil-square text-yellow-500"></i></button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </section>
        <section>
        <?php
            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                if (isset($_POST['submit_auteur'])) {
                    $auteur = $_POST["nom"];
                    $description = $_POST["description"];
                    
                    $sql = "INSERT INTO auteur (nom, description) VALUES (?, ?)";
                    $stmt = $con->prepare($sql);
                    $stmt->bind_param('ss', $auteur, $description);
                    $stmt->execute();
                    $stmt->close();
                }
            }
        ?>

            <!-- formulaire Auteur -->
            <div class="formAuteur w-full  fixed top-0 pt-[15%] pl-[40%] h-full backdrop-blur-md" style="display:none">
                <form action="admin.php" method="post" class="space-y-4 w-fit bg-white border-2 border-gray-200 shadow-lg rounded-lg p-6 pt-2">
                    <div class="flex justify-end mr-[-12px] cursor-pointer"><i class="bi bi-x-lg closeAuteur"></i></div>
                    <div>
                        <label for="nom" class=" text-sm font-medium text-gray-700">Auteur :</label>
                        <input type="text" id="nom" name="nom" 
                            class="mt-1 block  w-[200px] px-4 py-2 text-gray-700 bg-gray-50 border border-gray-300 rounded-md outline-none" 
                            placeholder="Nom de l'auteur" required>
                    </div>
                    <div>
                        <label for="description" class=" text-sm font-medium text-gray-700">Description :</label>
                        <textarea id="description" name="description" 
                            class="mt-1 block  px-4 py-2 text-gray-700 bg-gray-50 border border-gray-300 rounded-md  outline-none" 
                            placeholder="Une brève description" rows="1" required></textarea>
                    </div>
                    <div class="text-center">
                        <button type="submit" name="submit_auteur" 
                                class="px-6 py-2 bg-yellow-500 text-white rounded-md outline-none">
                            Ajouter Auteur
                        </button>
                    </div>
                </form>
            </div>
            <!-- formulaire package -->
            <?php
                $sql = "SELECT * FROM Auteur";
                $donnees = $con->query($sql);
            ?>
            <?php
                if ($_SERVER['REQUEST_METHOD'] == "POST") {
                    if (isset($_POST['submit_package'])) {
                        $package = $_POST["nom"];
                        $description = $_POST["description"];
                        $id_auteur = $_POST["id_auteur"];
                        
                        $sql = "INSERT INTO package (nomP, descriptionP, id_auteur) VALUES (?, ?, ?)";
                        $stmt = $con->prepare($sql);
                        $stmt->bind_param('sss', $package, $description, $id_auteur);
                        $stmt->execute();
                        $stmt->close();
                    }
                }
            ?>
            <div class="formPackage w-full  fixed top-0 pt-[15%] pl-[40%] h-full backdrop-blur-md" style="display:none">
                <form action="admin.php" method="post" class="space-y-2 w-fit bg-white border-2 border-gray-200 shadow-lg rounded-lg p-6 pt-2">
                    <div class="flex justify-end mr-[-12px] cursor-pointer"><i class="bi bi-x-lg closePackage"></i></div>
                    <div>
                        <label for="nom" class=" text-sm font-medium text-gray-700">Package:</label>
                        <input type="text" id="nom" name="nom" 
                            class="mt-1 block  w-[200px] px-4 py-2 text-gray-700 bg-gray-50 border border-gray-300 rounded-md outline-none" 
                            placeholder="Nom de l'auteur" required>
                    </div>
                    <div>
                        <label for="description" class=" text-sm font-medium text-gray-700">Description :</label>
                        <textarea id="description" name="description" 
                            class="mt-1 block  px-4 py-2 text-gray-700 bg-gray-50 border border-gray-300 rounded-md  outline-none" 
                            placeholder="Une brève description" rows="1" required></textarea>
                    </div>
                    <div>
                        <label for="id_auteur" class="block text-sm font-medium text-gray-700">Auteur :</label>
                        <select id="id_auteur" name="id_auteur" 
                                class="mt-1 block w-full px-4 py-2 text-gray-700 bg-gray-50 border border-gray-300 rounded-md outline-none" 
                                required>
                                <option value="" disabled selected>Choisissez un auteur</option>
                                <?php foreach ($donnees as $auteur): ?>
                                    <option value="<?php echo $auteur['id_Auteur']; ?>"><?php echo $auteur['nom']; ?></option>
                                <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="text-center">
                        <button type="submit" name="submit_package" 
                                class="px-6 py-2 bg-yellow-500 text-white rounded-md outline-none">
                            Ajouter Package
                        </button>
                    </div>
                </form>
            </div>
            <!-- formulaire Version -->
            <?php
                $sql = "SELECT * FROM package";
                $donnees = $con->query($sql);
            ?>
            <?php
                if ($_SERVER['REQUEST_METHOD'] == "POST") {
                    if (isset($_POST['submit_version'])) {
                        $version = $_POST["nom"];
                        $id_package = $_POST["id_package"];
                        
                        $sql = "INSERT INTO version (num_version, id_package) VALUES (?, ?)";
                        $stmt = $con->prepare($sql);
                        $stmt->bind_param('si', $version, $id_package); 
                        $stmt->execute();
                        $stmt->close();
                    }
                }
            ?>

            <div class="formVersion w-full  fixed top-0 pt-[15%] pl-[40%] h-full backdrop-blur-md" style="display:none" >
                <form action="admin.php" method="post" class="space-y-2 w-fit bg-white border-2 border-gray-200 shadow-lg rounded-lg p-6 pt-2">
                    <div class="flex justify-end mr-[-12px] cursor-pointer"><i class="bi bi-x-lg closeVersion"></i></div>
                    <div>
                        <label for="nom" class=" text-sm font-medium text-gray-700">Version:</label>
                        <input type="text" id="nom" name="nom" 
                            class="mt-1 block  w-[200px] px-4 py-2 text-gray-700 bg-gray-50 border border-gray-300 rounded-md outline-none" 
                            placeholder="Nom de l'auteur" required>
                    </div>
                    <div>
                        <label for="id_auteur" class="block text-sm font-medium text-gray-700">Packages :</label>
                        <select id="id_package" name="id_package" 
                                class="mt-1 block w-full px-4 py-2 text-gray-700 bg-gray-50 border border-gray-300 rounded-md outline-none" 
                                required>
                                <option value="" disabled selected>Choisissez un auteur</option>
                                <?php foreach ($donnees as $auteur): ?>
                                    <option value="<?php echo $auteur['id_package']; ?>"><?php echo $auteur['nomP']; ?></option>
                                <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="text-center">
                        <button type="submit" name="submit_version"
                            class="px-6 py-2 bg-yellow-500 text-white rounded-md outline-none">
                            Ajouter Version
                        </button>
                    </div>
                </form>
            </div>

        </section>
    </main>
    <?php include('../footer/footer.php') ?>
    <script src="../assets/js/script.js"></script>
</body>
</html>