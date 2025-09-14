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
      
      .units-selector {
        flex-direction: column;
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
          <h2 class="form-title">Appliance Service Request</h2>
          
          <form id="appliance-service-form">
            <!-- Service Type Selection -->
            <div class="form-step">
              <h3 class="step-title">What service do you want for your Appliance?</h3>
              <div class="options-grid">
                <div class="option-card" data-value="repair">
                  <i class="fas fa-tools"></i>
                  <h5>Appliance Repair</h5>
                </div>
                <div class="option-card" data-value="installation">
                  <i class="fas fa-box-open"></i>
                  <h5>Appliance Installation</h5>
                </div>
                <div class="option-card" data-value="removal">
                  <i class="fas fa-trash-alt"></i>
                  <h5>Appliance Removal</h5>
                </div>
              </div>
              <input type="hidden" name="service-type" id="service-type" required>
            </div>
            
            <!-- Appliance Type Selection -->
            <div class="form-step">
              <h3 class="step-title">What best describes your Appliance?</h3>
              <div class="options-grid">
                <div class="option-card" data-value="cooker">
                  <i class="fas fa-fire"></i>
                  <h5>Cooker</h5>
                </div>
                <div class="option-card" data-value="fridge">
                  <i class="fas fa-ice-cream"></i>
                  <h5>Fridge</h5>
                </div>
                <div class="option-card" data-value="washing-machine">
                  <i class="fas fa-soap"></i>
                  <h5>Washing Machine</h5>
                </div>
                <div class="option-card" data-value="dish-washer">
                  <i class="fas fa-pump-soap"></i>
                  <h5>Dish Washer</h5>
                </div>
              </div>
              <input type="hidden" name="appliance-type" id="appliance-type" required>
            </div>
            
            <!-- Number of Units -->
            <div class="form-step">
              <h3 class="step-title">Select number of Appliance units that need service</h3>
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
            <span class="price-label">Service Fee:</span>
            <span class="price-value" id="service-price">+0 AED</span>
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
      // Pricing configuration for appliances
      const pricing = {
        repair: { base: 120, service: 60 },
        installation: { base: 100, service: 80 },
        removal: { base: 80, service: 40 }
      };
      
      const applianceMultipliers = {
        cooker: 1.0,
        fridge: 1.2,
        'washing-machine': 1.1,
        'dish-washer': 1.0
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
          
          // Update prices if service type or appliance type is selected
          if (inputId === 'service-type' || inputId === 'appliance-type') {
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
        const applianceType = document.getElementById('appliance-type').value;
        const units = parseInt(document.getElementById('units').value) || 0;
        
        if (serviceType && applianceType && units > 0) {
          const applianceMultiplier = applianceMultipliers[applianceType] || 1.0;
          const basePrice = pricing[serviceType].base * applianceMultiplier * units;
          const servicePrice = pricing[serviceType].service * applianceMultiplier * units;
          const vatPrice = (basePrice + servicePrice) * vatRate;
          const totalPrice = basePrice + servicePrice + vatPrice;
          
          updatePrices(basePrice, servicePrice, vatPrice, totalPrice);
        } else {
          updatePrices(0, 0, 0);
        }
      }
      
      // Update price display
      function updatePrices(base, service, vat, total = 0) {
        document.getElementById('base-price').textContent = base.toFixed(0) + ' AED';
        document.getElementById('service-price').textContent = '+ ' + service.toFixed(0) + ' AED';
        document.getElementById('vat-price').textContent = '+ ' + vat.toFixed(0) + ' AED';
        document.getElementById('total-price').textContent = total.toFixed(0) + ' AED';
      }
      
      // Form submission
      document.getElementById('appliance-service-form').addEventListener('submit', function(e) {
        e.preventDefault();
        
        // Validate form
        const serviceType = document.getElementById('service-type').value;
        const applianceType = document.getElementById('appliance-type').value;
        const units = document.getElementById('units').value;
        
        if (!serviceType || !applianceType || !units) {
          alert('Please complete all sections before continuing.');
          return;
        }
        
        // Form is valid - in a real application, you would process the data here
        alert('Service request submitted!\n\nService: ' + serviceType + 
              '\nAppliance Type: ' + applianceType + 
              '\nUnits: ' + units);
        
        // You would typically redirect or show the next step here
      });
    });
  </script>
  
  <?php include '../temp/footer.php';?>
