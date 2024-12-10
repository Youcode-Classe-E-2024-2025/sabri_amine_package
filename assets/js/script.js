const links = document.querySelectorAll(".link");
    links.forEach((link) => {
        link.addEventListener('click', function () {
            links.forEach((l) => l.classList.remove('text-yellow-500'));
            link.classList.add('text-yellow-500');
        });
    });


    const home = document.querySelector("#home");
    const auteur = document.querySelector("#auteur");
    const package = document.querySelector("#package");
    const sectionAll = document.querySelector(".All");
    const sectionAuteur = document.querySelector(".Auteurs");
    const sectionPackage = document.querySelector(".Packages");

    home.addEventListener("click",function(){
        sectionAll.classList.remove("hidden");
        sectionAuteur.classList.add("hidden");
        sectionPackage.classList.add("hidden");
    })
    auteur.addEventListener("click",function(){
        sectionAuteur.classList.remove("hidden");
        sectionAll.classList.add("hidden");
        sectionPackage.classList.add("hidden");
    })
    package.addEventListener("click",function(){
        sectionPackage.classList.remove("hidden");
        sectionAuteur.classList.add("hidden");
        sectionAll.classList.add("hidden");
    })