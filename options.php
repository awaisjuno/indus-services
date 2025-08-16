<?php
include 'config/config.php';
include 'temp/header.php';

$slug = mysqli_real_escape_string($con, $_GET['slug']);
$subCategoryName = ucwords(str_replace('-', ' ', $slug));

$sel = "SELECT * FROM sub_category WHERE sub_category='$subCategoryName'";
$run = mysqli_query($con, $sel);

$row = mysqli_fetch_assoc($run);

$title = $row['sub_category'];

?>

<style>
    /* Form Input Styling Fixes */
.form-group {
    margin-bottom: 1.5rem;
    width: 100%;
}

.form-group label {
    display: block;
    margin-bottom: 0.5rem;
    font-weight: 600;
    color: var(--heading-color);
    font-size: 0.95rem;
}

.form-group select,
.form-group input[type="text"],
.form-group input[type="number"],
.form-group input[type="datetime-local"],
.form-group textarea {
    width: 100%;
    padding: 0.75rem 1rem;
    border: 1px solid #ddd;
    border-radius: 8px;
    font-size: 1rem;
    font-family: var(--default-font);
    transition: all 0.3s ease;
    background-color: var(--background-color);
    box-sizing: border-box; /* Ensures padding doesn't affect width */
}

/* Fix for datetime-local input */
.form-group input[type="datetime-local"] {
    padding: 0.7rem 1rem; /* Slightly adjusted padding */
}

/* Textarea specific styling */
.form-group textarea {
    min-height: 120px;
    resize: vertical;
}

/* Checkbox group alignment fix */
.checkbox-group {
    display: flex;
    align-items: center;
    gap: 0.75rem;
    margin-top: 0.5rem;
}

.checkbox-group input[type="checkbox"] {
    width: auto;
    margin: 0;
    transform: scale(1.2); /* Slightly larger checkbox */
}

.checkbox-group label {
    margin-bottom: 0;
    font-weight: normal;
    cursor: pointer;
}

/* Focus states for all inputs */
.form-group select:focus,
.form-group input:focus,
.form-group textarea:focus {
    border-color: var(--accent-color);
    box-shadow: 0 0 0 3px rgba(253, 196, 17, 0.2);
    outline: none;
}

/* Number input arrows styling */
.form-group input[type="number"]::-webkit-inner-spin-button,
.form-group input[type="number"]::-webkit-outer-spin-button {
    -webkit-appearance: none;
    margin: 0;
}

.form-group input[type="number"] {
    -moz-appearance: textfield;
}

/* Select dropdown arrow styling */
.form-group select {
    appearance: none;
    background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3e%3cpolyline points='6 9 12 15 18 9'%3e%3c/polyline%3e%3c/svg%3e");
    background-repeat: no-repeat;
    background-position: right 1rem center;
    background-size: 1em;
}

/* Responsive adjustments */
@media (max-width: 768px) {
    .form-group select,
    .form-group input,
    .form-group textarea {
        padding: 0.65rem 0.9rem;
        font-size: 0.95rem;
    }
    
    .checkbox-group {
        gap: 0.5rem;
    }
}

/* Animation for dynamic fields */
.form-field {
    display: none;
    margin-bottom: 1.5rem;
    animation: fadeIn 0.3s ease;
}

@keyframes fadeIn {
    from { opacity: 0; transform: translateY(-10px); }
    to { opacity: 1; transform: translateY(0); }
}
</style>


<div class="container">
    <h1>Book <?php echo htmlspecialchars($title); ?> Service</h1>
    <p class="service-description">Professional <?php echo htmlspecialchars($title); ?> services at your convenience.</p>
    
    <div class="booking-container">
        <div class="booking-card">
            <h2>Service Details</h2>
            <form id="bookingForm" method="POST" action="process_booking.php">
                <input type="hidden" name="service" value="<?php echo htmlspecialchars($title); ?>">
                
                <div class="form-group">
                    <label for="service">Service Type</label>
                    <select id="service" name="service_type" required>
                        <option value="">Select Service</option>
                        <option value="Maid Service" data-price="35" data-price-with-materials="45">Maid Service (Hourly)</option>
                        <option value="Carpentry" data-hourly-price="77.96" data-vat="true" data-cash="5">Carpentry</option>
                        <option value="Handyman" data-hourly-price="77.96" data-vat="true" data-cash="5">Handyman</option>
                        <option value="Electrical" data-hourly-price="77.96" data-vat="true" data-cash="5">Electrical</option>
                        <option value="Plumbing" data-hourly-price="77.96" data-vat="true" data-cash="5">Plumbing</option>
                        <option value="AC Installation (1 ton)" data-fixed-price="400">AC Installation (1 ton)</option>
                        <option value="AC Installation (1.5 ton)" data-fixed-price="375">AC Installation (1.5 ton)</option>
                        <option value="AC Installation (2.5 ton / 3 ton)" data-fixed-price="425">AC Installation (2.5 ton / 3 ton)</option>
                        <option value="AC Removing" data-fixed-price="150">AC Removing</option>
                        <option value="AC Cleaning - Slip" data-fixed-price="130">AC Cleaning - Slip</option>
                        <option value="AC Cleaning - Duct" data-fixed-price="350">AC Cleaning - Duct</option>
                        <option value="Smart Lock Installation" data-fixed-price="400">Smart Lock Installation</option>
                        <option value="Water Heater Installation" data-fixed-price="225">Water Heater Installation</option>
                        <option value="Door Bell Installation" data-fixed-price="130">Door Bell Installation</option>
                        <!-- Add other services with appropriate data attributes -->
                    </select>
                </div>
                
                <!-- Price display container -->
                <div id="price-display" class="price-display" style="display: none;">
                    <h4>Estimated Cost</h4>
                    <div id="price-details"></div>
                </div>
                
                <!-- Dynamic fields will appear here -->
                <div id="num_cleaners" class="form-field">
                    <label for="num_cleaners_input">Number of Cleaners</label>
                    <input type="number" id="num_cleaners_input" class="form-control" name="num_cleaners" min="1" max="10" value="1">
                </div>
                
                <div id="num_workers" class="form-field">
                    <label for="num_workers_input">Number of Workers</label>
                    <input type="number" id="num_workers_input" class="form-control" name="num_workers" min="1" max="10" value="1">
                </div>
                
                <div id="add_materials" class="form-field">
                    <div class="checkbox-group">
                        <input type="checkbox" id="add_materials_input" class="form-control" name="add_materials">
                        <label for="add_materials_input">We'll bring cleaning materials (+10 AED)</label>
                    </div>
                </div>
                
                <div id="duration" class="form-field">
                    <label for="duration_input">Duration (hours)</label>
                    <input type="number" id="duration_input" class="form-control" name="duration" min="1" max="8" value="1">
                </div>
                
                <div id="start_time" class="form-field">
                    <label for="start_time_input">Start Date & Time</label>
                    <input type="datetime-local" class="form-control" id="start_time_input" name="start_time" required>
                </div>
                
                <div id="notes" class="form-field">
                    <label for="notes_input">Additional Notes</label>
                    <textarea id="notes_input" class="form-control" name="notes" rows="4"></textarea>
                </div>
                
                <button type="submit" class="btn">Book Now</button>
            </form>
        </div>
        
        <div class="service-highlights">
            <!-- Your existing highlights content -->
        </div>
    </div>
</div>

<script>
const serviceInputs = {
    "Maid Service": ["num_cleaners", "add_materials", "duration", "start_time", "notes"],
    "Deep Cleaning": ["start_time", "notes"],
    "Pest Control": ["start_time", "notes"],
    "Carpentry": ["num_workers", "duration", "start_time", "notes"],
    "Handyman": ["num_workers", "duration", "start_time", "notes"],
    "Electrical": ["num_workers", "duration", "start_time", "notes"],
    "Plumbing": ["num_workers", "duration", "start_time", "notes"],
    "Painting": ["start_time", "notes"],
    "AC Maintenance & Cleaning": ["start_time", "notes"],
    "Appliance Repair & Installation": ["start_time", "notes"],
    "Remodeling & Maintenance": ["num_workers", "duration", "start_time", "notes"],
    "Garden Maintenance": ["num_workers", "duration", "start_time", "notes"],
    "Movers & Packers": ["num_workers", "start_time", "notes"],
    "One Item Move": ["start_time", "notes"],
    "Storage (Temperature control)": ["start_time", "notes"],
    "Junk Removal": ["num_workers", "start_time", "notes"],
    "AC Installation (1 ton)": ["start_time", "notes"],
    "AC Installation (1.5 ton)": ["start_time", "notes"],
    "AC Installation (2.5 ton / 3 ton)": ["start_time", "notes"],
    "AC Removing": ["start_time", "notes"],
    "AC Cleaning - Slip": ["start_time", "notes"],
    "AC Cleaning - Duct": ["start_time", "notes"],
    "Smart Lock Installation": ["start_time", "notes"],
    "Water Heater Installation": ["start_time", "notes"],
    "Door Bell Installation": ["start_time", "notes"]
};

const quotationServices = [
    "Deep Cleaning", "Pest Control", "Painting", 
    "AC Maintenance & Cleaning", "Appliance Repair & Installation",
    "Movers & Packers", "One Item Move", "Storage (Temperature control)",
    "Junk Removal", "Sofa Cleaning", "Carpet Cleaning"
];

document.getElementById('service').addEventListener('change', function() {
    const selectedService = this.value;
    const selectedOption = this.options[this.selectedIndex];
    
    // Hide all fields first
    document.querySelectorAll('.form-field').forEach(f => f.style.display = 'none');
    document.getElementById('price-display').style.display = 'none';
    
    // Show relevant fields
    if (serviceInputs[selectedService]) {
        serviceInputs[selectedService].forEach(id => {
            document.getElementById(id).style.display = 'block';
        });
    }
    
    // Show price information if available
    if (quotationServices.includes(selectedService)) {
        showQuotationNotice();
    } 
    else if (selectedOption.dataset.fixedPrice) {
        showFixedPrice(selectedOption.dataset.fixedPrice);
    } 
    else if (selectedOption.dataset.hourlyPrice) {
        showHourlyPrice(
            parseFloat(selectedOption.dataset.hourlyPrice),
            selectedOption.dataset.vat === "true",
            selectedOption.dataset.cash ? parseInt(selectedOption.dataset.cash) : 0
        );
    } 
    else if (selectedOption.dataset.price) {
        showMaidServicePrice(
            parseFloat(selectedOption.dataset.price),
            selectedOption.dataset.priceWithMaterials ? parseFloat(selectedOption.dataset.priceWithMaterials) : 0
        );
    }
});

function showQuotationNotice() {
    const priceDisplay = document.getElementById('price-display');
    priceDisplay.style.display = 'block';
    document.getElementById('price-details').innerHTML = `
        <p class="quotation-notice">This service requires a quotation. Our team will contact you with a customized price.</p>
    `;
}

function showFixedPrice(price) {
    const priceDisplay = document.getElementById('price-display');
    priceDisplay.style.display = 'block';
    document.getElementById('price-details').innerHTML = `
        <div class="price-line">
            <span>Fixed Price:</span>
            <span>${price} AED</span>
        </div>
        <div class="total-price">
            <span>Total:</span>
            <span>${price} AED</span>
        </div>
    `;
}

function showHourlyPrice(hourlyRate, hasVat, cashFee) {
    const priceDisplay = document.getElementById('price-display');
    priceDisplay.style.display = 'block';
    
    let priceHTML = `
        <div class="price-line">
            <span>Hourly Rate (per worker):</span>
            <span>${hourlyRate.toFixed(2)} AED</span>
        </div>`;
    
    if (hasVat) {
        priceHTML += `
        <div class="price-line">
            <span>VAT (5%):</span>
            <span>${(hourlyRate * 0.05).toFixed(2)} AED</span>
        </div>`;
    }
    
    if (cashFee > 0) {
        priceHTML += `
        <div class="price-line">
            <span>Cash Payment Fee:</span>
            <span>${cashFee} AED</span>
        </div>`;
    }
    
    priceHTML += `
        <div class="price-line">
            <span>Maximum 3 hours at this rate</span>
            <span></span>
        </div>
        <div class="quotation-notice">
            Longer jobs require a quotation
        </div>`;
    
    document.getElementById('price-details').innerHTML = priceHTML;
}

function showMaidServicePrice(basePrice, priceWithMaterials) {
    const priceDisplay = document.getElementById('price-display');
    priceDisplay.style.display = 'block';
    
    document.getElementById('price-details').innerHTML = `
        <div class="price-line">
            <span>Base Rate (per hour):</span>
            <span>${basePrice} AED</span>
        </div>
        <div class="price-line">
            <span>With Materials (per hour):</span>
            <span>${priceWithMaterials} AED</span>
        </div>
        <div class="quotation-notice">
            Price will be calculated based on duration and cleaners
        </div>
    `;
}

// Calculate dynamic prices when inputs change
document.getElementById('duration')?.addEventListener('input', updateDynamicPrice);
document.getElementById('num_cleaners')?.addEventListener('input', updateDynamicPrice);
document.getElementById('num_workers')?.addEventListener('input', updateDynamicPrice);
document.getElementById('add_materials')?.addEventListener('change', updateDynamicPrice);

function updateDynamicPrice() {
    const serviceSelect = document.getElementById('service');
    const selectedService = serviceSelect.value;
    const selectedOption = serviceSelect.options[serviceSelect.selectedIndex];
    
    if (selectedService === "Maid Service") {
        const duration = parseInt(document.getElementById('duration_input').value) || 1;
        const cleaners = parseInt(document.getElementById('num_cleaners_input').value) || 1;
        const withMaterials = document.getElementById('add_materials_input').checked;
        const rate = withMaterials ? 
            parseFloat(selectedOption.dataset.priceWithMaterials) : 
            parseFloat(selectedOption.dataset.price);
        
        const total = rate * duration * cleaners;
        
        document.getElementById('price-details').innerHTML = `
            <div class="price-line">
                <span>Rate (per cleaner per hour):</span>
                <span>${rate} AED</span>
            </div>
            <div class="price-line">
                <span>Number of Cleaners:</span>
                <span>${cleaners}</span>
            </div>
            <div class="price-line">
                <span>Duration:</span>
                <span>${duration} hours</span>
            </div>
            <div class="total-price">
                <span>Estimated Total:</span>
                <span>${total} AED</span>
            </div>
        `;
    }
    else if (["Carpentry", "Handyman", "Electrical", "Plumbing"].includes(selectedService)) {
        const duration = parseInt(document.getElementById('duration_input').value) || 1;
        const workers = parseInt(document.getElementById('num_workers_input').value) || 1;
        const hourlyRate = parseFloat(selectedOption.dataset.hourlyPrice);
        const hasVat = selectedOption.dataset.vat === "true";
        const cashFee = selectedOption.dataset.cash ? parseInt(selectedOption.dataset.cash) : 0;
        
        let subtotal = hourlyRate * duration * workers;
        let vat = hasVat ? subtotal * 0.05 : 0;
        let total = subtotal + vat + (cashFee > 0 ? cashFee : 0);
        
        let priceHTML = `
            <div class="price-line">
                <span>Hourly Rate (per worker):</span>
                <span>${hourlyRate.toFixed(2)} AED</span>
            </div>
            <div class="price-line">
                <span>Number of Workers:</span>
                <span>${workers}</span>
            </div>
            <div class="price-line">
                <span>Duration:</span>
                <span>${duration} hours</span>
            </div>`;
        
        if (hasVat) {
            priceHTML += `
            <div class="price-line">
                <span>VAT (5%):</span>
                <span>${vat.toFixed(2)} AED</span>
            </div>`;
        }
        
        if (cashFee > 0) {
            priceHTML += `
            <div class="price-line">
                <span>Cash Payment Fee:</span>
                <span>${cashFee} AED</span>
            </div>`;
        }
        
        if (duration > 3) {
            priceHTML += `
            <div class="quotation-notice">
                For jobs longer than 3 hours, please contact us for a quotation
            </div>`;
        }
        
        priceHTML += `
            <div class="total-price">
                <span>Estimated Total:</span>
                <span>${total.toFixed(2)} AED</span>
            </div>`;
        
        document.getElementById('price-details').innerHTML = priceHTML;
    }
}
</script>

<?php include 'temp/footer.php';?>