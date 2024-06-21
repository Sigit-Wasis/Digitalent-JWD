document.addEventListener("DOMContentLoaded", function() {
    const links = document.querySelectorAll('.nav-link');

    links.forEach((link) => {
        link.addEventListener('click', function(event) {
            event.preventDefault();
            
            // Menghapus kelas 'link-primary' dari semua link
            links.forEach((link) => {
                link.classList.remove('link-primary');
            });

            // Menambahkan kelas 'link-primary' hanya pada link yang diklik
            this.classList.add('link-primary');

            const targetId = this.getAttribute('href').substring(1);
            const targetElement = document.getElementById(targetId);

            if (targetElement) {
                const offsetTop = targetElement.offsetTop;
                window.scrollTo({
                    top: offsetTop,
                    behavior: 'smooth'
                });
            }
        });
    });
});