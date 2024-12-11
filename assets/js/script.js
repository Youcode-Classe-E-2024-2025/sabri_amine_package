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
    const version = document.querySelector("#version");
    const sectionAll = document.querySelector(".All");
    const sectionAuteur = document.querySelector(".Auteurs");
    const sectionPackage = document.querySelector(".Packages");
    const sectionVersion = document.querySelector(".Version");

    home.addEventListener("click",function(){
        sectionAll.classList.remove("hidden");
        sectionAuteur.classList.add("hidden");
        sectionPackage.classList.add("hidden");
        sectionVersion.classList.add("hidden");
    })
    auteur.addEventListener("click",function(){
        sectionAuteur.classList.remove("hidden");
        sectionAll.classList.add("hidden");
        sectionPackage.classList.add("hidden");
        sectionVersion.classList.add("hidden");
    })
    package.addEventListener("click",function(){
        sectionPackage.classList.remove("hidden");
        sectionAuteur.classList.add("hidden");
        sectionAll.classList.add("hidden");
        sectionVersion.classList.add("hidden");
    })
    version.addEventListener("click",function(){
        sectionVersion.classList.remove("hidden");
        sectionPackage.classList.add("hidden");
        sectionAuteur.classList.add("hidden");
        sectionAll.classList.add("hidden");
    })





    const formAuteur = document.querySelector(".formAuteur");
    const formPackage = document.querySelector(".formPackage");
    const formVersion = document.querySelector(".formVersion");
    const ajouteAuteur = document.querySelector(".ajouteAuteur");
    const ajoutePackage = document.querySelector(".ajoutePackage");
    const ajouteVersion = document.querySelector(".ajouteVersion");
    const closeAuteur = document.querySelector(".closeAuteur");
    const closePackage = document.querySelector(".closePackage");
    const closeVersion = document.querySelector(".closeVersion");

    ajouteAuteur.addEventListener('click',function(){
        formAuteur.style.display = "block"
    })
    closeAuteur.addEventListener('click',function(){
        formAuteur.style.display = "none"
    })

    ajoutePackage.addEventListener('click',function(){
        formPackage.style.display = "block"
    })
    closePackage.addEventListener('click',function(){
        formPackage.style.display = "none"
    })
    ajouteVersion.addEventListener('click',function(){
        formVersion.style.display = "block"
    })
    closeVersion.addEventListener('click',function(){
        formVersion.style.display = "none"
    })

