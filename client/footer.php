                </div>

<div class="footer">
    <p>© <script>document.write(new Date().getFullYear());</script> Indus Services - User Panel. All rights reserved.</p>
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
            
            // Notification bell click
            const notificationBell = document.querySelector('.notification-bell');
            notificationBell.addEventListener('click', function() {
                alert('You have 3 unread notifications');
            });
            
            // Date filter change
            const dateFilter = document.querySelector('.date-filter select');
            dateFilter.addEventListener('change', function() {
                alert('Filtering data for: ' + this.value);
            });
            
            console.log('User panel loaded successfully');
        });
    </script>
</body>
</html>