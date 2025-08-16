<?php 
include 'config/config.php';
include 'temp/header.php';

// Fetch all active and non-deleted categories
$sql = "SELECT * FROM category WHERE is_active = '1' AND is_delete = '0'";
$result = mysqli_query($con, $sql);
?>

<style>
:root {
    --primary: #f85d23; /* Your brand orange color */
    --secondary: #333; /* Dark text color */
    --light: #f8f9fa; /* Light background */
    --dark: #212529; /* Dark background */
    --gray: #6c757d; /* Gray text */
}

.services-page {
    padding: 60px 0;
    background-color: #f8f9fa;
}

.page-title {
    text-align: center;
    margin-bottom: 50px;
    color: var(--secondary);
    font-size: 2.5rem;
    font-weight: 700;
    position: relative;
}

.page-title:after {
    content: '';
    display: block;
    width: 80px;
    height: 4px;
    background: var(--primary);
    margin: 15px auto 0;
}

.category-section {
    margin-bottom: 50px;
    background: white;
    padding: 30px;
    border-radius: 10px;
    box-shadow: 0 5px 15px rgba(0,0,0,0.05);
}

.category-title {
    font-size: 1.8rem;
    margin-bottom: 25px;
    padding-bottom: 10px;
    border-bottom: 2px solid var(--primary);
    color: var(--secondary);
    font-weight: 600;
}

.services-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
    gap: 25px;
}

.service-box {
    background: white;
    border-radius: 10px;
    box-shadow: 0 5px 15px rgba(0,0,0,0.05);
    padding: 25px;
    transition: all 0.3s ease;
    border: 1px solid #eee;
}

.service-box:hover {
    transform: translateY(-10px);
    box-shadow: 0 10px 25px rgba(248, 93, 35, 0.15);
    border-color: rgba(248, 93, 35, 0.3);
}

.service-name {
    font-size: 1.3rem;
    margin-bottom: 20px;
    color: var(--secondary);
    font-weight: 600;
    min-height: 60px;
}

.add-to-cart-btn {
    background: var(--primary);
    color: white;
    border: none;
    padding: 12px 20px;
    border-radius: 6px;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s;
    width: 100%;
    text-align: center;
    text-decoration: none;
    display: block;
    font-size: 1rem;
}

.add-to-cart-btn:hover {
    background: #e04e1a; /* Slightly darker shade of your orange */
    color: white;
    transform: translateY(-2px);
}

.cart-container {
    position: fixed;
    bottom: 30px;
    right: 30px;
    background: white;
    border-radius: 10px;
    box-shadow: 0 5px 25px rgba(0,0,0,0.15);
    padding: 20px;
    width: 350px;
    z-index: 1000;
    border: 1px solid #eee;
}

.cart-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 15px;
    padding-bottom: 10px;
    border-bottom: 2px solid var(--primary);
}

.cart-items {
    max-height: 300px;
    overflow-y: auto;
    padding-right: 10px;
}

.cart-item {
    display: flex;
    justify-content: space-between;
    padding: 12px 0;
    border-bottom: 1px solid #eee;
    align-items: center;
}

.checkout-btn {
    background: var(--primary);
    color: white;
    border: none;
    padding: 12px;
    border-radius: 6px;
    width: 100%;
    margin-top: 20px;
    cursor: pointer;
    font-weight: 600;
    transition: all 0.3s;
    text-transform: uppercase;
    letter-spacing: 1px;
}

.checkout-btn:hover {
    background: #e04e1a;
    transform: translateY(-2px);
}

.cart-count {
    background: var(--primary);
    color: white;
    border-radius: 50%;
    width: 24px;
    height: 24px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    font-size: 13px;
    margin-left: 8px;
    font-weight: 600;
}

/* Empty state */
.no-services {
    text-align: center;
    color: var(--gray);
    padding: 30px;
    background: #f8f9fa;
    border-radius: 8px;
}

/* Responsive */
@media (max-width: 768px) {
    .services-grid {
        grid-template-columns: 1fr;
    }
    
    .cart-container {
        width: calc(100% - 40px);
        right: 20px;
        bottom: 20px;
    }
    
    .page-title {
        font-size: 2rem;
    }
    
    .category-section {
        padding: 20px;
    }
}

/* Animation */
@keyframes fadeIn {
    from { opacity: 0; transform: translateY(10px); }
    to { opacity: 1; transform: translateY(0); }
}

.service-box {
    animation: fadeIn 0.5s ease forwards;
}

.service-box:nth-child(1) { animation-delay: 0.1s; }
.service-box:nth-child(2) { animation-delay: 0.2s; }
.service-box:nth-child(3) { animation-delay: 0.3s; }
.service-box:nth-child(4) { animation-delay: 0.4s; }
</style>

<div class="services-page">
    <div class="container">
        <h1 class="page-title">Our Services</h1>
        
        <?php while($category = mysqli_fetch_assoc($result)): ?>
            <?php 
            // Fetch subcategories for this category
            $cat_id = $category['category_id'];
            $sub_sql = "SELECT * FROM sub_category WHERE category_id = '$cat_id' AND is_active = '1' AND is_delete = '0'";
            $sub_result = mysqli_query($con, $sub_sql);
            ?>
            
            <div class="category-section">
                <h2 class="category-title"><?= htmlspecialchars($category['category_name']) ?></h2>
                
                <?php if (mysqli_num_rows($sub_result) > 0): ?>
                    <div class="services-grid">
                        <?php while($sub = mysqli_fetch_assoc($sub_result)): ?>
                            <div class="service-box">
                                <h3 class="service-name"><?= htmlspecialchars($sub['sub_category']) ?></h3>
                                <a href="<?= base_url()?>proccess.php?id=<?= $sub['sub_id']?>" class="add-to-cart-btn">
                                    Get Service
                                </a>

                            </div>
                        <?php endwhile; ?>
                    </div>
                <?php else: ?>
                    <p>No services available in this category</p>
                <?php endif; ?>
            </div>
        <?php endwhile; ?>
    </div>
</div>

<?php include 'temp/footer.php'; ?>