
    <script>
        function toggleSubmenu(id) {
            event.preventDefault();
            const submenu = document.getElementById(id);
            submenu.classList.toggle('active');
            
            // Toggle chevron icon
            const icon = event.target.querySelector('.fa-chevron-down') || 
                         event.target.parentElement.querySelector('.fa-chevron-down');
            icon.classList.toggle('fa-chevron-down');
            icon.classList.toggle('fa-chevron-up');
        }
    </script>
</body>
</html>