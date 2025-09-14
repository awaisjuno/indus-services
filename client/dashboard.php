    <?php

        session_start();
        include '../config/config.php';
        include '../config/session.php';
        include 'temp.php';
    
    ?>
                <div class="welcome-banner">
                    <div class="welcome-text">
                        <h1>Welcome back, <?= $row['first_name']?>!</h1>
                        <p>You have 3 upcoming services scheduled this month</p>
                    </div>
                    <a href="<?= base_url()?>" class="btn">Book New Service</a>
                </div>

                <div class="page-title">
                    <h2>Dashboard Overview</h2>
                    <div class="date-filter">
                        <i class="fas fa-calendar-alt"></i>
                        <select>
                            <option>This Week</option>
                            <option selected>This Month</option>
                            <option>Last Month</option>
                            <option>This Year</option>
                        </select>
                    </div>
                </div>

                <!-- NEW Dashboard Overview -->
                <div class="dashboard-overview">
                    <div class="stats-grid">
                        <div class="stat-card">
                            <div class="stat-header">
                                <div class="stat-icon">
                                    <i class="fas fa-calendar-check"></i>
                                </div>
                                <span class="stat-trend trend-up">+12%</span>
                            </div>
                            <div class="stat-value">12</div>
                            <div class="stat-label">Total Bookings</div>
                        </div>
                        
                        <div class="stat-card">
                            <div class="stat-header">
                                <div class="stat-icon">
                                    <i class="fas fa-clock"></i>
                                </div>
                                <span class="stat-trend trend-up">+5%</span>
                            </div>
                            <div class="stat-value">3</div>
                            <div class="stat-label">Upcoming Services</div>
                        </div>
                        
                        <div class="stat-card">
                            <div class="stat-header">
                                <div class="stat-icon">
                                    <i class="fas fa-star"></i>
                                </div>
                                <span class="stat-trend trend-up">+8%</span>
                            </div>
                            <div class="stat-value">8</div>
                            <div class="stat-label">Reviews Written</div>
                        </div>
                        
                        <div class="stat-card">
                            <div class="stat-header">
                                <div class="stat-icon">
                                    <i class="fas fa-tag"></i>
                                </div>
                                <span class="stat-trend trend-down">-2%</span>
                            </div>
                            <div class="stat-value">2</div>
                            <div class="stat-label">Active Promotions</div>
                        </div>
                    </div>
                    
                    <div class="quick-stats">
                        <h3 style="margin-bottom: 20px; color: var(--dark);">Service Stats</h3>
                        <div class="stats-visual">
                            <div class="stat-item">
                                <div class="stat-info">
                                    <div class="stat-color color-1"></div>
                                    <div class="stat-title">Completed</div>
                                </div>
                                <div class="stat-percentage">65%</div>
                            </div>
                            <div class="stat-item">
                                <div class="stat-info">
                                    <div class="stat-color color-2"></div>
                                    <div class="stat-title">Scheduled</div>
                                </div>
                                <div class="stat-percentage">25%</div>
                            </div>
                            <div class="stat-item">
                                <div class="stat-info">
                                    <div class="stat-color color-3"></div>
                                    <div class="stat-title">Canceled</div>
                                </div>
                                <div class="stat-percentage">7%</div>
                            </div>
                            <div class="stat-item">
                                <div class="stat-info">
                                    <div class="stat-color color-4"></div>
                                    <div class="stat-title">Rescheduled</div>
                                </div>
                                <div class="stat-percentage">3%</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Activity Timeline -->
                <div class="activity-timeline">
                    <h3 style="margin-bottom: 20px; color: var(--dark);">Recent Activity</h3>
                    
                    <div class="timeline-item">
                        <div class="timeline-marker"></div>
                        <div class="timeline-content">
                            <div class="timeline-date">Today, 10:30 AM</div>
                            <div class="timeline-text">Your plumbing service request has been confirmed</div>
                            <span class="timeline-status status-confirmed">Confirmed</span>
                        </div>
                    </div>
                    
                    <div class="timeline-item">
                        <div class="timeline-marker"></div>
                        <div class="timeline-content">
                            <div class="timeline-date">Yesterday, 4:15 PM</div>
                            <div class="timeline-text">You rated your electrical service 5 stars</div>
                            <span class="timeline-status status-confirmed">Completed</span>
                        </div>
                    </div>
                    
                    <div class="timeline-item">
                        <div class="timeline-marker"></div>
                        <div class="timeline-content">
                            <div class="timeline-date">Oct 14, 2023</div>
                            <div class="timeline-text">Your AC service has been rescheduled to Oct 20</div>
                            <span class="timeline-status status-pending">Rescheduled</span>
                        </div>
                    </div>
                    
                    <div class="timeline-item">
                        <div class="timeline-marker"></div>
                        <div class="timeline-content">
                            <div class="timeline-date">Oct 12, 2023</div>
                            <div class="timeline-text">You booked a new cleaning service</div>
                            <span class="timeline-status status-confirmed">Booked</span>
                        </div>
                    </div>
                </div>

                <!-- Upcoming Services -->
                <div class="services-container">
                    <div class="section-title">
                        <h3>Upcoming Services</h3>
                        <a href="#">View All</a>
                    </div>
                    
                    <div class="service-item">
                        <div class="service-icon">
                            <i class="fas fa-faucet"></i>
                        </div>
                        <div class="service-info">
                            <h4>Plumbing Repair</h4>
                            <p>Tomorrow, 10:00 AM - 12:00 PM</p>
                        </div>
                        <span class="service-status status-confirmed">Confirmed</span>
                    </div>
                    
                    <div class="service-item">
                        <div class="service-icon">
                            <i class="fas fa-air-conditioner"></i>
                        </div>
                        <div class="service-info">
                            <h4>AC Servicing</h4>
                            <p>Oct 20, 2023 · 2:00 PM - 4:00 PM</p>
                        </div>
                        <span class="service-status status-confirmed">Confirmed</span>
                    </div>
                    
                    <div class="service-item">
                        <div class="service-icon">
                            <i class="fas fa-bolt"></i>
                        </div>
                        <div class="service-info">
                            <h4>Electrical Wiring</h4>
                            <p>Oct 25, 2023 · 11:00 AM - 1:00 PM</p>
                        </div>
                        <span class="service-status status-pending">Pending</span>
                    </div>
                    
                    
<?php include 'footer.php';?>