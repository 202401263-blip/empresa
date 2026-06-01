// Estilos mejorados para el sidebar interactivo
document.addEventListener('DOMContentLoaded', function() {
    // Mejorar la interactividad de los bloques del sidebar
    const sidebarBlocks = document.querySelectorAll('.sidebar-block');
    
    sidebarBlocks.forEach(block => {
        const header = block.querySelector('.block-header');
        const collapse = block.querySelector('.collapse');
        
        if (header && collapse) {
            // Animación suave al expandir/contraer
            header.addEventListener('click', function(e) {
                // Evitar comportamiento por defecto de Bootstrap
                e.preventDefault();
                
                const isExpanded = collapse.classList.contains('show');
                
                // Animar altura
                if (isExpanded) {
                    collapse.style.maxHeight = collapse.scrollHeight + 'px';
                    setTimeout(() => {
                        collapse.style.maxHeight = '0px';
                    }, 10);
                } else {
                    collapse.style.maxHeight = collapse.scrollHeight + 'px';
                    collapse.addEventListener('transitionend', function() {
                        collapse.style.maxHeight = 'none';
                    }, { once: true });
                }
            });
        }
    });

    // Highlight dinámico del bloque activo
    const sidebarLinks = document.querySelectorAll('.sidebar-block .nav-link');
    
    sidebarLinks.forEach(link => {
        link.addEventListener('mouseenter', function() {
            this.style.transition = 'all 0.2s ease';
        });
    });

    // Scroll automático al elemento activo
    const activeLink = document.querySelector('.sidebar-block .nav-link.active-link');
    if (activeLink) {
        const activeBlock = activeLink.closest('.sidebar-block');
        if (activeBlock) {
            activeBlock.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
        }
    }
});

// Función para expandir todos los bloques (opcional)
function expandAllBlocks() {
    document.querySelectorAll('.sidebar-block .collapse').forEach(collapse => {
        collapse.classList.add('show');
    });
}

// Función para contraer todos los bloques (opcional)
function collapseAllBlocks() {
    document.querySelectorAll('.sidebar-block .collapse').forEach(collapse => {
        collapse.classList.remove('show');
    });
}
