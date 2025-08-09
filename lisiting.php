<?php 
include 'config/config.php';
include 'temp/header.php';

// Fetch all active and non-deleted categories
$sql = "SELECT * FROM category WHERE is_active = '1' AND is_delete = '0'";
$result = mysqli_query($con, $sql);
?>

<style>
.services-page {
    padding: 40px 0;
}

.page-title {
    text-align: center;
    margin-bottom: 40px;
    color: #333;
}

.category-section {
    margin-bottom: 40px;
}

.category-title {
    font-size: 1.8rem;
    margin-bottom: 20px;
    padding-bottom: 10px;
    border-bottom: 2px solid var(--primary);
}

.services-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
    gap: 20px;
}

.service-box {
    background: white;
    border-radius: 8px;
    box-shadow: 0 3px 10px rgba(0,0,0,0.1);
    padding: 20px;
    transition: transform 0.3s ease;
}

.service-box:hover {
    transform: translateY(-5px);
}

.service-name {
    font-size: 1.2rem;
    margin-bottom: 15px;
    color: var(--secondary);
}

.add-to-cart-btn {
    background: var(--primary);
    color: var(--secondary);
    border: none;
    padding: 8px 15px;
    border-radius: 5px;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s;
    width: 100%;
}

.add-to-cart-btn:hover {
    background: #f5c23d;
}

.cart-container {
    position: fixed;
    bottom: 20px;
    right: 20px;
    background: white;
    border-radius: 8px;
    box-shadow: 0 3px 15px rgba(0,0,0,0.2);
    padding: 15px;
    width: 300px;
    z-index: 1000;
}

.cart-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 10px;
}

.cart-items {
    max-height: 300px;
    overflow-y: auto;
}

.cart-item {
    display: flex;
    justify-content: space-between;
    padding: 8px 0;
    border-bottom: 1px solid #eee;
}

.checkout-btn {
    background: var(--secondary);
    color: white;
    border: none;
    padding: 10px;
    border-radius: 5px;
    width: 100%;
    margin-top: 15px;
    cursor: pointer;
    font-weight: 600;
}

.cart-count {
    background: var(--primary);
    color: var(--secondary);
    border-radius: 50%;
    width: 20px;
    height: 20px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    font-size: 12px;
    margin-left: 5px;
}

/* Responsive */
@media (max-width: 768px) {
    .services-grid {
        grid-template-columns: 1fr;
    }
    
    .cart-container {
        width: calc(100% - 40px);
    }
}
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
                                <a href="<?= base_url()?>proccess.php?id=<?= $row['sub_id']?>" class="add-to-cart-btn">
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