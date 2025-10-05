<?php 
    session_start();
    include 'config/config.php';
    include 'config/load-header.php';
    include 'temp/header.php';
?>

    <!-- Hero Section -->
    <section class="payment-hero">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8 mx-auto text-center">
                    <h1 class="display-4 fw-bold text-white mb-4">PAYMENT POLICY</h1>
                    <p class="lead text-white mb-0">Clear and transparent payment procedures for your peace of mind</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Main Content Section -->
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <!-- Modes of Payment Section -->
                    <div class="mb-5">
                        <h2 class="section-title">Modes of Payment</h2>
                        <div class="policy-card">
                            <div class="policy-icon">
                                <i class="fas fa-credit-card"></i>
                            </div>
                            <p>The Site accepts payment by cash or through Visa or Mastercard debit and credit cards for its products and services. Services booked via the Site are also governed by the terms and conditions of respective merchant service providers.</p>
                        </div>
                    </div>

                    <!-- Paying for Services Section -->
                    <div class="mb-5">
                        <h2 class="section-title">Paying for Services</h2>
                        
                        <!-- Payment Deduction -->
                        <div class="policy-card">
                            <div class="policy-icon">
                                <i class="fas fa-money-bill-wave"></i>
                            </div>
                            <h4>Payment Deduction</h4>
                            <p>Users are charged once our service partner has confirmed that the service has been delivered. The Company will not seek the confirmation from the user that the service has been delivered before processing a payment.</p>
                        </div>
                        
                        <!-- Multi-Currency Priced Transaction -->
                        <div class="policy-card">
                            <div class="policy-icon">
                                <i class="fas fa-globe"></i>
                            </div>
                            <h4>Multi-Currency Priced Transaction</h4>
                            <p>The displayed price and currency selected by you, will be the same price and currency charged to the Card and printed on the Transaction Receipt. Where VAT or optional extras apply, the transaction amount will be shown to the user as "Total to pay".</p>
                        </div>
                        
                        <!-- Payment Confirmation -->
                        <div class="policy-card">
                            <div class="policy-icon">
                                <i class="fas fa-check-circle"></i>
                            </div>
                            <h4>Payment Confirmation</h4>
                            <p>The Site user will receive payment confirmation by email on the email address given at the time of order, through a notification sent in an app, or both. The confirmation will be sent after the payment has been processed as soon as practically possible.</p>
                        </div>
                        
                        <!-- Payment Refunds -->
                        <div class="policy-card">
                            <div class="policy-icon">
                                <i class="fas fa-undo-alt"></i>
                            </div>
                            <h4>Payment Refunds</h4>
                            <p>Should the Company, based on the delivery confirmation of our service partner, charge a user whereas the service was in fact not delivered, the Company will refund the full amount to the user. It is the responsibility of the User to bring such cases to the attention of the Company by emailing <a href="mailto:Support@indusservices.ae" class="contact-link">Support@indusservices.ae</a> within 24 hours of the due date of the scheduled service.</p>
                            <p>Any other refunds including those listed above will be made as credits to the users registered account on Indusservices or onto the original mode of payment, as may be deemed appropriate by the Company.</p>
                        </div>
                    </div>

                    <!-- Administrative Charges Section -->
                    <div class="mb-5">
                        <h2 class="section-title">Administrative Charges</h2>
                        <div class="policy-card">
                            <div class="policy-icon">
                                <i class="fas fa-file-invoice-dollar"></i>
                            </div>
                            <p>Users who book services on the Site can manage their Services through the website or mobile apps. It is possible to change the dates, time or the specific requirements of any given service, provided it is done so reasonably in advance before the start of the booked service.</p>
                            <p>Failure to provide sufficient notice when cancelling or changing services may result in administrative fees being charged to the user. These fees are governed by the Cancellations Policy and maybe amended from time to time.</p>
                            <p>By booking the services on the Site you agree to abide by these policies and agree to pay any applicable charges. The Company reserves the right to use any legal means it may have at its disposal to recover such charges or to deny further use of the Site's Services to the user, as it may deem necessary.</p>
                        </div>
                    </div>

                    <!-- Cancellations Policy Section -->
                    <div class="mb-5">
                        <h2 class="section-title">Cancellations Policy</h2>
                        
                        <!-- Highlight Box for Important Information -->
                        <div class="highlight-box">
                            <h5><i class="fas fa-exclamation-circle me-2"></i>Important Information</h5>
                            <p class="mb-0">Administrative charges apply for late cancellations, changes, or no-shows as defined below.</p>
                        </div>
                        
                        <!-- Late Cancellations & Changes -->
                        <div class="policy-card">
                            <div class="policy-icon">
                                <i class="fas fa-clock"></i>
                            </div>
                            <h4>Late Cancellations & Changes</h4>
                            <p>For late cancellations or change requests (late is defined as less than 24 hours before the start of the service);</p>
                            <p class="mb-0"><strong>OR</strong></p>
                        </div>
                        
                        <!-- No Shows -->
                        <div class="policy-card">
                            <div class="policy-icon">
                                <i class="fas fa-user-times"></i>
                            </div>
                            <h4>No Shows</h4>
                            <p>Where a customer was not present to avail the scheduled service and as a consequence the service was not delivered;</p>
                            <p>In such cases Administrative charges will apply. Such charges will depend on the type of service which was scheduled.</p>
                        </div>
                        
                        <!-- Payment of Charges -->
                        <div class="policy-card">
                            <div class="policy-icon">
                                <i class="fas fa-hand-holding-usd"></i>
                            </div>
                            <h4>Payment of Charges</h4>
                            <p>Any applicable administrative charges will be communicated to the Customer at the time when the request for cancellation or changes is made.</p>
                            <p>Charges are deducted at the time of cancellation in case of a late cancellation and for late changes at the time of completion of the delivery of the service.</p>
                            <p>Charges for No Shows are applied once the Company is notified by its partner suppliers.</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <?php include 'temp/footer.php';?>