<?php 

    include '../config/config.php';
    include '../temp/header.php';
    
    

?>


<style>
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
    
    .units-selector {
      display: flex;
      flex-wrap: wrap;
      gap: 10px;
    }
    
    .unit-option {
      flex: 1;
      min-width: 100px;
      text-align: center;
    }
    
    .unit-btn {
      width: 100%;
      padding: 12px;
      border: 2px solid #e9ecef;
      border-radius: 8px;
      background: white;
      cursor: pointer;
      transition: all 0.3s ease;
      font-weight: 500;
    }
    
    .unit-btn:hover {
      border-color: #fdc411;
    }
    
    .unit-btn.selected {
      border-color: #fdc411;
      background-color: rgba(253, 196, 17, 0.1);
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
    }
    
    .btn-outline:hover {
      background-color: #6c757d;
      color: white;
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
        grid-template-columns: 1fr;
      }
      
      .units-selector {
        flex-direction: column;
      }
    }
</style>


  <div class="main-container">
    <div class="form-content">
      <div class="form-column">
        <div class="service-form-container">
          <h2 class="form-title">AC Service Request</h2>
          
          <form id="ac-service-form">
            <!-- Service Type Selection -->
            <div class="form-step">
              <h3 class="step-title">What service do you want for your AC?</h3>
              <div class="options-grid">
                <div class="option-card" data-value="cleaning">
                  <i class="fas fa-broom"></i>
                  <h5>AC Cleaning</h5>
                </div>
                <div class="option-card" data-value="repair">
                  <i class="fas fa-tools"></i>
                  <h5>AC Repair</h5>
                </div>
                <div class="option-card" data-value="installation">
                  <i class="fas fa-box-open"></i>
                  <h5>AC Installation</h5>
                </div>
              </div>
              <input type="hidden" name="service-type" id="service-type" required>
            </div>
            
            <!-- AC Type Selection -->
            <div class="form-step">
              <h3 class="step-title">What best describes your AC?</h3>
              <div class="options-grid">
                <div class="option-card" data-value="split">
                  <i class="fas fa-air-conditioner"></i>
                  <h5>Split AC</h5>
                </div>
                <div class="option-card" data-value="window">
                  <i class="fas fa-window-maximize"></i>
                  <h5>Window AC</h5>
                </div>
                <div class="option-card" data-value="central">
                  <i class="fas fa-fan"></i>
                  <h5>Central AC (Duct)</h5>
                </div>
              </div>
              <input type="hidden" name="ac-type" id="ac-type" required>
            </div>
            
            <!-- Number of Units -->
            <div class="form-step">
              <h3 class="step-title">Select number of AC units that need service</h3>
              <div class="units-selector">
                <div class="unit-option">
                  <button type="button" class="unit-btn" data-value="1">1 Unit</button>
                </div>
                <div class="unit-option">
                  <button type="button" class="unit-btn" data-value="2">2 Units</button>
                </div>
                <div class="unit-option">
                  <button type="button" class="unit-btn" data-value="3">3 Units</button>
                </div>
                <div class="unit-option">
                  <button type="button" class="unit-btn" data-value="4">4 Units</button>
                </div>
              </div>
              <input type="hidden" name="units" id="units" required>
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
            <span class="price-label">Duration (2 hours):</span>
            <span class="price-value" id="duration-price">+0 AED</span>
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
      // Pricing configuration
      const pricing = {
        cleaning: { base: 100, duration: 80 },
        repair: { base: 150, duration: 120 },
        installation: { base: 200, duration: 160 }
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
          
          // Update prices if service type is selected
          if (inputId === 'service-type') {
            calculatePrices();
          }
        });
      });
      
      // Unit button selection
      const unitButtons = document.querySelectorAll('.unit-btn');
      unitButtons.forEach(button => {
        button.addEventListener('click', function() {
          // Remove selected class from siblings
          const siblings = this.closest('.units-selector').querySelectorAll('.unit-btn');
          siblings.forEach(sibling => sibling.classList.remove('selected'));
          
          // Add selected class to clicked button
          this.classList.add('selected');
          
          // Update the hidden input
          document.getElementById('units').value = this.getAttribute('data-value');
          
          // Update prices
          calculatePrices();
        });
      });
      
      // Calculate prices based on selections
      function calculatePrices() {
        const serviceType = document.getElementById('service-type').value;
        const units = parseInt(document.getElementById('units').value) || 0;
        
        if (serviceType && units > 0) {
          const basePrice = pricing[serviceType].base * units;
          const durationPrice = pricing[serviceType].duration * units;
          const vatPrice = (basePrice + durationPrice) * vatRate;
          const totalPrice = basePrice + durationPrice + vatPrice;
          
          updatePrices(basePrice, durationPrice, vatPrice, totalPrice);
        } else {
          updatePrices(0, 0, 0);
        }
      }
      
      // Update price display
      function updatePrices(base, duration, vat, total = 0) {
        document.getElementById('base-price').textContent = base + ' AED';
        document.getElementById('duration-price').textContent = '+ ' + duration + ' AED';
        document.getElementById('vat-price').textContent = '+ ' + vat.toFixed(0) + ' AED';
        document.getElementById('total-price').textContent = total.toFixed(0) + ' AED';
      }
      
      // Form submission
      document.getElementById('ac-service-form').addEventListener('submit', function(e) {
        e.preventDefault();
        
        // Validate form
        const serviceType = document.getElementById('service-type').value;
        const acType = document.getElementById('ac-type').value;
        const units = document.getElementById('units').value;
        
        if (!serviceType || !acType || !units) {
          alert('Please complete all sections before continuing.');
          return;
        }
        
        // Form is valid - in a real application, you would process the data here
        alert('Service request submitted!\n\nService: ' + serviceType + 
              '\nAC Type: ' + acType + 
              '\nUnits: ' + units);
        
        // You would typically redirect or show the next step here
      });
    });
  </script>
  
  
  <?php include '../temp/footer.php';?>