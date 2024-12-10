const links = document.querySelectorAll(".link");
    links.forEach((link) => {
        link.addEventListener('click', function () {
            links.forEach((l) => l.classList.remove('text-red-500'));
            link.classList.add('text-red-500');
        });
    });