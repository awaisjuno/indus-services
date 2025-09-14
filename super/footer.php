                <div class="footer">
                    <p>© 2023 Indus Services - Super Admin Panel. All rights reserved.</p>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Simple JavaScript for interactive elements
        document.addEventListener('DOMContentLoaded', function() {
            // Menu item active state
            const menuItems = document.querySelectorAll('.menu-item');
            menuItems.forEach(item => {
                item.addEventListener('click', function() {
                    menuItems.forEach(i => i.classList.remove('active'));
                    this.classList.add('active');
                });
            });
            
            // Example chart initialization would go here
            console.log('Admin panel loaded successfully');
        });
    </script>
</body>
</html>