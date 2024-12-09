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
    <section class="flex justify-center items-center mt-24 ">
    <div class="bg-white p-8 rounded-[12px] shadow-lg  border-2 border-gray-100 w-96">
        <h2 class="text-2xl  text-center font-bold mb-5 ">Se connecter</h2>
        <form action="" method="POST">
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Email :</label>
                <input type="email" name="email" id="email" placeholder="Entrez votre email" class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>
            <div class="mb-6">
                <label for="password" class="block text-sm font-medium text-gray-700">Mot de passe :</label>
                <input type="password" name="password" id="password" placeholder="Entrez votre mot de passe" class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>
            <div class="flex justify-center">
                <input type="submit" value="Se connecter" class="w-[150px] py-3 bg-yellow-500 text-white font-semibold rounded-md hover:bg-yellow-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
        </form>
    </div>
</section>

</body>
</html>