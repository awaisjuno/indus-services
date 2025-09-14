<?php 

    include '../config/config.php';
    include '../temp/header.php';

?>

<style>
    /* Main container for content */
    .main-container {
      max-width: 1200px;
      margin: 100px auto 50px;
      padding: 0 20px;
      position: relative;
    }
    
    .form-content {
      display: flex;
      gap: 30px;
    }
    
    .form-column {
      flex: 1;
    }
    
    .price-column {
      width: 350px;
      flex-shrink: 0;
    }
    
    .service-form-container {
      background: white;
      border-radius: 12px;
      box-shadow: 0 5px 25px rgba(0, 0, 0, 0.1);
      padding: 30px;
    }
    
    .price-box {
      background: white;
      border-radius: 12px;
      box-shadow: 0 5px 25px rgba(0, 0, 0, 0.1);
      padding: 25px;
      position: sticky;
      top: 120px;
    }
    
    .price-title {
      font-weight: 700;
      margin-bottom: 20px;
      color: #333;
      padding-bottom: 15px;
      border-bottom: 2px solid #fdc411;
    }
    
    .price-item {
      display: flex;
      justify-content: space-between;
      margin-bottom: 12px;
      padding-bottom: 12px;
      border-bottom: 1px dashed #e9ecef;
    }
    
    .price-label {
      color: #6c757d;
    }
    
    .price-value {
      font-weight: 600;
      color: #333;
    }
    
    .price-total {
      display: flex;
      justify-content: space-between;
      margin-top: 20px;
      padding-top: 15px;
      border-top: 2px solid #fdc411;
      font-size: 1.2rem;
      font-weight: 700;
    }
    
    .price-note {
      margin-top: 15px;
      padding: 12px;
      background-color: #f8f9fa;
      border-radius: 8px;
      font-size: 0.85rem;
      color: #6c757d;
      text-align: center;
    }
    
    .form-title {
      color: #333;
      font-weight: 700;
      margin-bottom: 30px;
      position: relative;
      padding-bottom: 15px;
    }
    
    .form-title:after {
      content: '';
      position: absolute;
      bottom: 0;
      left: 0;
      width: 60px;
      height: 4px;
      background: #fdc411;
      border-radius: 2px;
    }
    
    .form-step {
      margin-bottom: 30px;
    }
    
    .step-title {
      font-weight: 600;
      margin-bottom: 15px;
      color: #444;
      font-size: 1.1rem;
    }
    
    .options-grid {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
      gap: 15px;
    }
    
    .option-card {
      border: 2px solid #e9ecef;
      border-radius: 8px;
      padding: 15px;
      cursor: pointer;
      transition: all 0.3s ease;
      text-align: center;
    }
    
    .option-card:hover {
      border-color: #fdc411;
      transform: translateY(-3px);
      box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
    }
    
    .option-card.selected {
      border-color: #fdc411;
      background-color: rgba(253, 196, 17, 0.1);
    }
    
    .option-card i {
      font-size: 2rem;
      color: #fdc411;
      margin-bottom: 10px;
    }
    
    .option-card h5 {
      margin: 0;
      font-weight: 600;
      color: #333;
    }
    
    .size-input {
      margin-top: 20px;
    }
    
    .size-input label {
      display: block;
      margin-bottom: 8px;
      font-weight: 500;
      color: #444;
    }
    
    .size-input input {
      width: 100%;
      padding: 12px 15px;
      border: 2px solid #e9ecef;
      border-radius: 8px;
      font-size: 1rem;
      transition: all 0.3s ease;
    }
    
    .size-input input:focus {
      border-color: #fdc411;
      outline: none;
    }
    
    .form-navigation {
      display: flex;
      justify-content: space-between;
      margin-top: 40px;
    }
    
    .btn-primary {
      background-color: #fdc411;
      border: none;
      color: #000;
      padding: 12px 25px;
      border-radius: 8px;
      font-weight: 600;
      transition: all 0.3s ease;
    }
    
    .btn-primary:hover {
      background-color: #e6b10a;
      color: #000;
    }
    
    .btn-outline {
      background-color: transparent;
      border: 2px solid #6c757d;
      color: #6c757d;
      padding: 10px 23px;
      border-radius: 8px;
      font-weight: 600;
      transition: all 0.3s ease;
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 8px;
    }
    
    .btn-outline:hover {
      background-color: #6c757d;
      color: white;
      text-decoration: none;
    }
    
    .btn-outline i {
      font-size: 1.1rem;
    }
    
    @media (max-width: 992px) {
      .form-content {
        flex-direction: column;
      }
      
      .price-column {
        width: 100%;
        order: -1;
        margin-bottom: 30px;
      }
      
      .price-box {
        position: static;
      }
    }
    
    @media (max-width: 768px) {
      .options-grid {
        grid-template-columns: 1fr 1fr;
      }
      
      .header-inner {
        padding: 0 15px;
      }
      
      .logo-container {
        border-right: none;
        padding-right: 0;
        margin-right: 0;
      }
    }
    
    @media (max-width: 576px) {
      .options-grid {
        grid-template-columns: 1fr;
      }
    }
</style>


  <div class="main-container">
    <div class="form-content">
      <div class="form-column">
        <div class="service-form-container">
          <h2 class="form-title">Premises Remodeling Service</h2>
          
          <form id="premises-service-form">
            <!-- Premises Type Selection -->
            <div class="form-step">
              <h3 class="step-title">What is your premises type?</h3>
              <div class="options-grid">
                <div class="option-card" data-value="apartment">
                  <i class="fas fa-building"></i>
                  <h5>Apartment</h5>
                </div>
                <div class="option-card" data-value="villa">
                  <i class="fas fa-home"></i>
                  <h5>Villa</h5>
                </div>
              </div>
              <input type="hidden" name="premises-type" id="premises-type" required>
            </div>
            
            <!-- Size Input (shown only for Villa) -->
            <div class="form-step" id="size-input-container" style="display: none;">
              <h3 class="step-title">What is the size of the villa?</h3>
              <div class="size-input">
                <label for="villa-size">Size in square feet</label>
                <input type="number" id="villa-size" name="villa-size" placeholder="Enter square footage" min="1">
              </div>
            </div>
            
            <!-- Remodeling Type Selection -->
            <div class="form-step">
              <h3 class="step-title">What area do you want to remodel?</h3>
              <div class="options-grid">
                <div class="option-card" data-value="bathroom">
                  <i class="fas fa-bath"></i>
                  <h5>Bathroom</h5>
                </div>
                <div class="option-card" data-value="kitchen">
                  <i class="fas fa-utensils"></i>
                  <h5>Kitchen</h5>
                </div>
                <div class="option-card" data-value="flooring">
                  <i class="fas fa-border-style"></i>
                  <h5>Flooring</h5>
                </div>
                <div class="option-card" data-value="masonry">
                  <i class="fas fa-hard-hat"></i>
                  <h5>Masonry Work</h5>
                </div>
                <div class="option-card" data-value="repair">
                  <i class="fas fa-tools"></i>
                  <h5>Minor Repair</h5>
                </div>
                <div class="option-card" data-value="gypsum">
                  <i class="fas fa-th-large"></i>
                  <h5>Gypsum Work</h5>
                </div>
              </div>
              <input type="hidden" name="remodel-type" id="remodel-type" required>
            </div>
            
            <!-- Form Navigation -->
            <div class="form-navigation">
              <button type="submit" class="btn-primary">Continue</button>
            </div>
          </form>
        </div>
      </div>
      
      <div class="price-column">
        <div class="price-box">
          <h3 class="price-title">Price Summary</h3>
          
          <div class="price-item">
            <span class="price-label">Base Price:</span>
            <span class="price-value" id="base-price">0 AED</span>
          </div>
          
          <div class="price-item">
            <span class="price-label">Size Adjustment:</span>
            <span class="price-value" id="size-price">+0 AED</span>
          </div>
          
          <div class="price-item">
            <span class="price-label">VAT (5%):</span>
            <span class="price-value" id="vat-price">+0 AED</span>
          </div>
          
          <div class="price-total">
            <span>Total Amount:</span>
            <span id="total-price">0 AED</span>
          </div>
          
          <div class="price-note">
            Final price may vary based on service requirements
          </div>
        </div>
      </div>
    </div>
  </div>

  <script>
    document.addEventListener("DOMContentLoaded", function() {
      // Pricing configuration for remodeling services
      const pricing = {
        apartment: { base: 500 },
        villa: { base: 800, sizeRate: 2 } // AED per square foot
      };
      
      const remodelMultipliers = {
        bathroom: 1.2,
        kitchen: 1.5,
        flooring: 1.0,
        masonry: 1.1,
        repair: 0.8,
        gypsum: 0.9
      };
      
      const vatRate = 0.05; // 5% VAT
      
      // Initialize prices
      updatePrices(0, 0, 0);
      
      // Option card selection
      const optionCards = document.querySelectorAll('.option-card');
      optionCards.forEach(card => {
        card.addEventListener('click', function() {
          // Remove selected class from siblings
          const siblings = this.parentElement.querySelectorAll('.option-card');
          siblings.forEach(sibling => sibling.classList.remove('selected'));
          
          // Add selected class to clicked card
          this.classList.add('selected');
          
          // Update the corresponding hidden input
          const inputId = this.closest('.form-step').querySelector('input[type="hidden"]').id;
          document.getElementById(inputId).value = this.getAttribute('data-value');
          
          // Show/hide size input based on premises type
          if (inputId === 'premises-type') {
            const premisesType = this.getAttribute('data-value');
            const sizeContainer = document.getElementById('size-input-container');
            
            if (premisesType === 'villa') {
              sizeContainer.style.display = 'block';
            } else {
              sizeContainer.style.display = 'none';
              document.getElementById('villa-size').value = '';
            }
          }
          
          // Update prices
          calculatePrices();
        });
      });
      
      // Villa size input change
      document.getElementById('villa-size').addEventListener('input', function() {
        calculatePrices();
      });
      
      // Calculate prices based on selections
      function calculatePrices() {
        const premisesType = document.getElementById('premises-type').value;
        const remodelType = document.getElementById('remodel-type').value;
        const villaSize = parseInt(document.getElementById('villa-size').value) || 0;
        
        if (premisesType && remodelType) {
          const remodelMultiplier = remodelMultipliers[remodelType] || 1.0;
          let basePrice = pricing[premisesType].base * remodelMultiplier;
          let sizePrice = 0;
          
          // Add size-based pricing for villas
          if (premisesType === 'villa' && villaSize > 0) {
            sizePrice = villaSize * pricing.villa.sizeRate;
          }
          
          const totalBeforeVat = basePrice + sizePrice;
          const vatPrice = totalBeforeVat * vatRate;
          const totalPrice = totalBeforeVat + vatPrice;
          
          updatePrices(basePrice, sizePrice, vatPrice, totalPrice);
        } else {
          updatePrices(0, 0, 0);
        }
      }
      
      // Update price display
      function updatePrices(base, size, vat, total = 0) {
        document.getElementById('base-price').textContent = base.toFixed(0) + ' AED';
        document.getElementById('size-price').textContent = '+ ' + size.toFixed(0) + ' AED';
        document.getElementById('vat-price').textContent = '+ ' + vat.toFixed(0) + ' AED';
        document.getElementById('total-price').textContent = total.toFixed(0) + ' AED';
      }
      
      // Form submission
      document.getElementById('premises-service-form').addEventListener('submit', function(e) {
        e.preventDefault();
        
        // Validate form
        const premisesType = document.getElementById('premises-type').value;
        const remodelType = document.getElementById('remodel-type').value;
        
        if (!premisesType || !remodelType) {
          alert('Please complete all sections before continuing.');
          return;
        }
        
        // Additional validation for villa size
        if (premisesType === 'villa') {
          const villaSize = document.getElementById('villa-size').value;
          if (!villaSize || villaSize <= 0) {
            alert('Please enter a valid size for your villa.');
            return;
          }
        }
        
        // Form is valid - in a real application, you would process the data here
        alert('Service request submitted!\n\nPremises Type: ' + premisesType + 
              '\nRemodel Type: ' + remodelType);
        
        // You would typically redirect or show the next step here
      });
    });
  </script>
  
  <?php include '../temp/footer.php';?>