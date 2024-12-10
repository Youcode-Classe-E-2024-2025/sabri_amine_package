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
            <div class="flex justify-end pr-24">
                <button class="p-2 px-6 rounded-lg bg-yellow-300 text-white">
                    Ajouté Auteur
                </button>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Auteur</th>
                        <th>Package</th>
                        <th>Version</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($donnees as $ligne): ?>
                        <tr>
                            <td><?= $ligne['id_auteur']?></td>
                            <td><?= $ligne['AuteurNom']?></td>
                            <td><?= $ligne['PackageNom'] ?></td>
                            <td><?= $ligne['VersionNum'] ?></td>
                            <td class="flex gap-4 justify-center">
                                <button><i class="bi bi-trash-fill "></i></button>
                                <button><i class="bi bi-pencil-square text-yellow-500"></i></button>
                            </td>
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
                                <button><i class="bi bi-trash-fill "></i></button>
                                <button><i class="bi bi-pencil-square text-yellow-500"></i></button>
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
                                <button><i class="bi bi-trash-fill "></i></button>
                                <button><i class="bi bi-pencil-square text-yellow-500"></i></button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </section>
        <section>
            <!-- formulaire Auteur -->
            <div class="formAuteur bg-white shadow-lg rounded-lg p-6 pt-2 w-fit  mx-auto border-2 border-gray-200">
                <div class="flex justify-end mr-[-12px] cursor-pointer"><i class="bi bi-x-lg"></i></div>
                <form action="controller.php" method="post" class="space-y-4">
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
                        <button type="submit" 
                            class="px-6 py-2 bg-yellow-500 text-white rounded-md outline-none">
                            Ajouter Auteur
                        </button>
                    </div>
                </form>
            </div>
            <!-- formulaire package -->
            <?php
                $sql = "SELECT * FROM Auteur";
                $donnees = $pdo->query($sql);
            ?>
            <div class="formPackage bg-white shadow-lg rounded-lg p-6 pt-2 w-fit  mx-auto border-2 border-gray-200">
                <div class="flex justify-end mr-[-12px] cursor-pointer"><i class="bi bi-x-lg"></i></div>
                <form action="controller.php" method="post" class="space-y-4">
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
                        <button type="submit" 
                            class="px-6 py-2 bg-yellow-500 text-white rounded-md outline-none">
                            Ajouter Package
                        </button>
                    </div>
                </form>
            </div>
            <!-- formulaire Version -->
            <?php
                $sql = "SELECT * FROM package";
                $donnees = $pdo->query($sql);
            ?>
            <div class="formPackage bg-white shadow-lg rounded-lg p-6 pt-2 w-fit  mx-auto border-2 border-gray-200">
                <div class="flex justify-end mr-[-12px] cursor-pointer"><i class="bi bi-x-lg"></i></div>
                <form action="controller.php" method="post" class="space-y-4">
                    <div>
                        <label for="nom" class=" text-sm font-medium text-gray-700">Version:</label>
                        <input type="text" id="nom" name="nom" 
                            class="mt-1 block  w-[200px] px-4 py-2 text-gray-700 bg-gray-50 border border-gray-300 rounded-md outline-none" 
                            placeholder="Nom de l'auteur" required>
                    </div>
                    <div>
                        <label for="id_auteur" class="block text-sm font-medium text-gray-700">Auteur :</label>
                        <select id="id_auteur" name="id_auteur" 
                                class="mt-1 block w-full px-4 py-2 text-gray-700 bg-gray-50 border border-gray-300 rounded-md outline-none" 
                                required>
                                <option value="" disabled selected>Choisissez un auteur</option>
                                <?php foreach ($donnees as $auteur): ?>
                                    <option value="<?php echo $auteur['id_package']; ?>"><?php echo $auteur['nom']; ?></option>
                                <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="text-center">
                        <button type="submit" 
                            class="px-6 py-2 bg-yellow-500 text-white rounded-md outline-none">
                            Ajouter Package
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