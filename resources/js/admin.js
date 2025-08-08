        const menuToggle = document.getElementById('menuToggle');
        const sidebar = document.getElementById('sidebar');
        const mainContent = document.getElementById('mainContent');
        const sidebarOverlay = document.getElementById('sidebarOverlay');

        let sidebarOpen = window.innerWidth > 768;

        function toggleSidebar() {
            sidebarOpen = !sidebarOpen;
            
            if (window.innerWidth <= 768) {
                // Mobile behavior
                sidebar.classList.toggle('active');
                sidebarOverlay.classList.toggle('active');
                document.body.style.overflow = sidebarOpen ? 'hidden' : 'auto';
            } else {
                // Desktop behavior
                sidebar.classList.toggle('collapsed');
                mainContent.classList.toggle('expanded');
            }

            // Animate menu toggle icon
            const icon = menuToggle.querySelector('i');
            if (sidebarOpen && window.innerWidth > 768) {
                icon.style.transform = 'rotate(90deg)';
            } else {
                icon.style.transform = 'rotate(0deg)';
            }
        }

        // Event listeners
        menuToggle.addEventListener('click', toggleSidebar);
        sidebarOverlay.addEventListener('click', toggleSidebar);

        // Handle window resize
        window.addEventListener('resize', () => {
            if (window.innerWidth <= 768) {
                console.log('tse');
                sidebar.classList.remove('collapsed');
                mainContent.classList.remove('expanded');
                if (!sidebar.classList.contains('active')) {
                                    console.log('tse');

                    document.body.style.overflow = 'auto';
                }
            } else {

                sidebar.classList.remove('active');
                sidebarOverlay.classList.remove('active');
                document.body.style.overflow = 'auto';
                
                if (!sidebarOpen) {
                    sidebar.classList.add('collapsed');
                    mainContent.classList.add('expanded');
                }
            }
        });


    

        document.addEventListener("DOMContentLoaded", function () {
    const navLinks = document.querySelectorAll('.nav-link');
    const mainContent = document.getElementById('mainContent');
    const currentPath = window.location.pathname;

    // 1. Set active class based on current URL path
    navLinks.forEach(link => {
        const linkHref = link.getAttribute('href');

        if (linkHref && currentPath.startsWith(linkHref)) {
            // Bersihkan semua dulu
            navLinks.forEach(l => l.classList.remove('active'));
            link.classList.add('active');
        }

        // 2. Tambahkan fade-out sebelum redirect
        link.addEventListener('click', (e) => {
            const isSamePath = window.location.pathname === linkHref;

            if (!linkHref || linkHref === '#' || isSamePath) return;

            e.preventDefault();

            // Bersihkan semua active
            navLinks.forEach(l => l.classList.remove('active'));
            link.classList.add('active');

            // Jalankan animasi dan redirect
            mainContent.classList.add('fade-out');

            setTimeout(() => {
                window.location.href = linkHref;
            }, 400); // match with CSS transition time
        });
    });

    // Optional: AJAX load handler if needed
    const kandidatBtn = document.querySelector('[data-nama="tambahkandidat"]');
    if (kandidatBtn) {
        kandidatBtn.addEventListener("click", function (e) {
            e.preventDefault();
            fetch("/admin/kandidat/form")
                .then(response => {
                    if (!response.ok) throw new Error("Network error");
                    return response.text();
                })
                .then(html => {
                    const parser = new DOMParser();
                    const doc = parser.parseFromString(html, 'text/html');
                    const content = doc.querySelector('#mainContent');
                    if (content) {
                        mainContent.classList.add('fade-out');

                        setTimeout(() => {
                            mainContent.innerHTML = content.innerHTML;
                            mainContent.classList.remove('fade-out');
                        }, 300);
                    }
                })
                .catch(err => console.error(err));
        });
    }
});


        document.addEventListener("DOMContentLoaded", function () {
    const kandidatBtn = document.getElementById("loadKandidat");
    const mainContent = document.getElementById("mainContent");

    if (kandidatBtn && mainContent) {
        kandidatBtn.addEventListener("click", function (e) {
            // e.preventDefault(); // prevent default #kandidat behavior
            fetch("/admin/kandidat/form")
                .then(response => {
                    if (!response.ok) {
                        throw new Error("Network response was not ok");
                    }
                    return response.text();
                })
                .then(html => {
                    const parser = new DOMParser();
                    const doc = parser.parseFromString(html, 'text/html');
                    const content = doc.querySelector('#mainContent');
                    if (content) {
                        mainContent.innerHTML = content.innerHTML;
                    }
                })
                .catch(error => {
                    console.error("Error fetching Kandidat content:", error);
                });
        });
    }
});
