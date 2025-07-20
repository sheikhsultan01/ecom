<?php
require_once 'includes/db.php';
$page_name = 'Customers';

$CSS_FILES = [
    'customers.css'
];

require_once 'includes/head.php';
?>

<div class="container-fluid">
    <div class="row">
        <!-- Main Content -->
        <div class="col-lg-12">
            <!-- Page Header -->
            <div class="d-flex justify-content-between align-items-center flex-wrap mb-4">
                <div>
                    <h2 class="mb-1">Customer Analytics</h2>
                    <p class="text-muted mb-0">Understand your customers and optimize your marketing strategies</p>
                </div>
                <div class="d-flex mt-3 mt-md-0">
                    <div class="input-group me-2" style="max-width: 300px;">
                        <input type="text" class="form-control date-range-picker" id="dateRange" value="Jun 01, 2023 - Jun 30, 2023">
                        <span class="input-group-text bg-white">
                            <i class="fas fa-calendar-alt"></i>
                        </span>
                    </div>
                    <button class="btn btn-filter">
                        <i class="fas fa-download me-2"></i> Export
                    </button>
                </div>
            </div>

            <!-- Customer Analytics Tabs -->
            <ul class="nav nav-pills analytics-tab" id="customerTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="overview-tab" data-bs-toggle="pill" data-bs-target="#overview" type="button" role="tab">Overview</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="segments-tab" data-bs-toggle="pill" data-bs-target="#segments" type="button" role="tab">Segments</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="behavior-tab" data-bs-toggle="pill" data-bs-target="#behavior" type="button" role="tab">Behavior</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="journey-tab" data-bs-toggle="pill" data-bs-target="#journey" type="button" role="tab">Customer Journey</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="details-tab" data-bs-toggle="pill" data-bs-target="#details" type="button" role="tab">Customer Details</button>
                </li>
            </ul>

            <!-- Tab Content -->
            <div class="tab-content" id="customerTabContent">
                <!-- Overview Tab -->
                <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview-tab">
                    <!-- Key Metrics -->
                    <div class="row">
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="metric-card">
                                <div class="metric-icon metric-primary">
                                    <i class="fas fa-users"></i>
                                </div>
                                <h3 class="metric-value">1,248</h3>
                                <p class="metric-label">Total Customers</p>
                                <div class="metric-trend trend-up">
                                    <i class="fas fa-arrow-up me-1"></i>15.2% vs last month
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="metric-card">
                                <div class="metric-icon metric-blue">
                                    <i class="fas fa-user-plus"></i>
                                </div>
                                <h3 class="metric-value">138</h3>
                                <p class="metric-label">New Customers</p>
                                <div class="metric-trend trend-up">
                                    <i class="fas fa-arrow-up me-1"></i>10.4% vs last month
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="metric-card">
                                <div class="metric-icon metric-orange">
                                    <i class="fas fa-sync-alt"></i>
                                </div>
                                <h3 class="metric-value">68%</h3>
                                <p class="metric-label">Retention Rate</p>
                                <div class="metric-trend trend-up">
                                    <i class="fas fa-arrow-up me-1"></i>5.2% vs last month
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="metric-card">
                                <div class="metric-icon metric-purple">
                                    <i class="fas fa-dollar-sign"></i>
                                </div>
                                <h3 class="metric-value">$142</h3>
                                <p class="metric-label">Avg. Customer Value</p>
                                <div class="metric-trend trend-up">
                                    <i class="fas fa-arrow-up me-1"></i>8.7% vs last month
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Customer Growth Chart -->
                    <div class="analytics-card mb-4">
                        <div class="card-body">
                            <div class="analytics-header">
                                <h5 class="analytics-title">Customer Growth</h5>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-outline-filter active">Daily</button>
                                    <button type="button" class="btn btn-outline-filter">Weekly</button>
                                    <button type="button" class="btn btn-outline-filter">Monthly</button>
                                </div>
                            </div>
                            <div class="chart-container">
                                <canvas id="customerGrowthChart"></canvas>
                            </div>
                            <div class="d-flex flex-wrap">
                                <div class="legend-item">
                                    <div class="legend-color" style="background-color: #228B22;"></div>
                                    <span class="legend-label">New Customers</span>
                                </div>
                                <div class="legend-item">
                                    <div class="legend-color" style="background-color: #2F80ED;"></div>
                                    <span class="legend-label">Returning Customers</span>
                                </div>
                                <div class="legend-item">
                                    <div class="legend-color" style="background-color: #FF9800;"></div>
                                    <span class="legend-label">Total Customers</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Customer Segments and Demographics -->
                    <div class="row mb-4">
                        <div class="col-lg-8">
                            <div class="analytics-card">
                                <div class="card-body">
                                    <div class="analytics-header">
                                        <h5 class="analytics-title">Customer Segments</h5>
                                        <div class="dropdown filter-dropdown">
                                            <button class="btn btn-outline-filter dropdown-toggle" type="button" id="segmentDropdown" data-bs-toggle="dropdown">
                                                By Purchase Frequency
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="segmentDropdown">
                                                <li><a class="dropdown-item active" href="#">By Purchase Frequency</a></li>
                                                <li><a class="dropdown-item" href="#">By Spend Amount</a></li>
                                                <li><a class="dropdown-item" href="#">By Product Category</a></li>
                                                <li><a class="dropdown-item" href="#">By Acquisition Source</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="chart-container">
                                        <canvas id="customerSegmentsChart"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="analytics-card">
                                <div class="card-body">
                                    <h5 class="analytics-title mb-4">Demographics</h5>
                                    <div class="mb-4">
                                        <h6 class="mb-3">Age Distribution</h6>
                                        <div class="mb-3">
                                            <div class="d-flex justify-content-between mb-1">
                                                <span class="comparison-label">18-24</span>
                                                <span class="comparison-value">15%</span>
                                            </div>
                                            <div class="progress comparison-progress">
                                                <div class="progress-bar bg-success" role="progressbar" style="width: 15%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <div class="d-flex justify-content-between mb-1">
                                                <span class="comparison-label">25-34</span>
                                                <span class="comparison-value">32%</span>
                                            </div>
                                            <div class="progress comparison-progress">
                                                <div class="progress-bar bg-success" role="progressbar" style="width: 32%" aria-valuenow="32" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <div class="d-flex justify-content-between mb-1">
                                                <span class="comparison-label">35-44</span>
                                                <span class="comparison-value">28%</span>
                                            </div>
                                            <div class="progress comparison-progress">
                                                <div class="progress-bar bg-success" role="progressbar" style="width: 28%" aria-valuenow="28" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <div class="d-flex justify-content-between mb-1">
                                                <span class="comparison-label">45-54</span>
                                                <span class="comparison-value">18%</span>
                                            </div>
                                            <div class="progress comparison-progress">
                                                <div class="progress-bar bg-success" role="progressbar" style="width: 18%" aria-valuenow="18" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="d-flex justify-content-between mb-1">
                                                <span class="comparison-label">55+</span>
                                                <span class="comparison-value">7%</span>
                                            </div>
                                            <div class="progress comparison-progress">
                                                <div class="progress-bar bg-success" role="progressbar" style="width: 7%" aria-valuenow="7" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <h6 class="mb-3">Gender Distribution</h6>
                                        <div class="chart-container-sm">
                                            <canvas id="genderChart"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Customer Insights -->
                    <div class="row mb-4">
                        <div class="col-12">
                            <h5 class="mb-3">Customer Insights</h5>
                        </div>
                        <div class="col-lg-4">
                            <div class="insights-card">
                                <div class="d-flex">
                                    <div class="insights-icon insights-positive">
                                        <i class="fas fa-user-check"></i>
                                    </div>
                                    <div>
                                        <h6 class="insights-title">Loyal Customer Growth</h6>
                                        <p class="insights-text">Your loyal customer segment has grown by 22% this month. Consider launching a VIP rewards program.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="insights-card">
                                <div class="d-flex">
                                    <div class="insights-icon insights-warning">
                                        <i class="fas fa-user-clock"></i>
                                    </div>
                                    <div>
                                        <h6 class="insights-title">At-Risk Customers</h6>
                                        <p class="insights-text">42 customers haven't made a purchase in over 60 days. Send them a special offer to re-engage them.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="insights-card">
                                <div class="d-flex">
                                    <div class="insights-icon insights-info">
                                        <i class="fas fa-lightbulb"></i>
                                    </div>
                                    <div>
                                        <h6 class="insights-title">Cross-Sell Opportunity</h6>
                                        <p class="insights-text">Customers who buy "Organic Green Tea" are 3x more likely to purchase "Bamboo Tea Infuser" as well.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Top Customers -->
                    <div class="analytics-card mb-4">
                        <div class="card-body">
                            <div class="analytics-header">
                                <h5 class="analytics-title">Top Customers</h5>
                                <div class="search-container">
                                    <i class="fas fa-search search-icon"></i>
                                    <input type="text" class="search-input" placeholder="Search customers...">
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table analytics-table">
                                    <thead>
                                        <tr>
                                            <th>Customer</th>
                                            <th>Orders</th>
                                            <th>Total Spent</th>
                                            <th>Last Purchase</th>
                                            <th>Segment</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="customer-avatar me-2">
                                                        EM
                                                    </div>
                                                    <div>
                                                        <p class="customer-name">Emma Mitchell</p>
                                                        <p class="customer-email">emma.m@example.com</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>24</td>
                                            <td>$1,842</td>
                                            <td>Jun 28, 2023</td>
                                            <td><span class="badge-segment">VIP</span></td>
                                            <td><span class="badge-status badge-active">Active</span></td>
                                            <td>
                                                <div class="dropdown">
                                                    <button class="btn btn-sm btn-outline-filter dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                                        Actions
                                                    </button>
                                                    <ul class="dropdown-menu dropdown-menu-end">
                                                        <li><a class="dropdown-item" href="#"><i class="fas fa-eye me-2"></i>View Details</a></li>
                                                        <li><a class="dropdown-item" href="#"><i class="fas fa-envelope me-2"></i>Send Email</a></li>
                                                        <li><a class="dropdown-item" href="#"><i class="fas fa-tag me-2"></i>Add Tag</a></li>
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="customer-avatar me-2">
                                                        JD
                                                    </div>
                                                    <div>
                                                        <p class="customer-name">James Davis</p>
                                                        <p class="customer-email">james.d@example.com</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>18</td>
                                            <td>$1,560</td>
                                            <td>Jun 25, 2023</td>
                                            <td><span class="badge-segment">VIP</span></td>
                                            <td><span class="badge-status badge-active">Active</span></td>
                                            <td>
                                                <div class="dropdown">
                                                    <button class="btn btn-sm btn-outline-filter dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                                        Actions
                                                    </button>
                                                    <ul class="dropdown-menu dropdown-menu-end">
                                                        <li><a class="dropdown-item" href="#"><i class="fas fa-eye me-2"></i>View Details</a></li>
                                                        <li><a class="dropdown-item" href="#"><i class="fas fa-envelope me-2"></i>Send Email</a></li>
                                                        <li><a class="dropdown-item" href="#"><i class="fas fa-tag me-2"></i>Add Tag</a></li>
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="customer-avatar me-2">
                                                        SL
                                                    </div>
                                                    <div>
                                                        <p class="customer-name">Sarah Lee</p>
                                                        <p class="customer-email">sarah.l@example.com</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>15</td>
                                            <td>$1,245</td>
                                            <td>Jun 22, 2023</td>
                                            <td><span class="badge-segment">Regular</span></td>
                                            <td><span class="badge-status badge-active">Active</span></td>
                                            <td>
                                                <div class="dropdown">
                                                    <button class="btn btn-sm btn-outline-filter dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                                        Actions
                                                    </button>
                                                    <ul class="dropdown-menu dropdown-menu-end">
                                                        <li><a class="dropdown-item" href="#"><i class="fas fa-eye me-2"></i>View Details</a></li>
                                                        <li><a class="dropdown-item" href="#"><i class="fas fa-envelope me-2"></i>Send Email</a></li>
                                                        <li><a class="dropdown-item" href="#"><i class="fas fa-tag me-2"></i>Add Tag</a></li>
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="customer-avatar me-2">
                                                        RJ
                                                    </div>
                                                    <div>
                                                        <p class="customer-name">Robert Johnson</p>
                                                        <p class="customer-email">robert.j@example.com</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>12</td>
                                            <td>$980</td>
                                            <td>Jun 10, 2023</td>
                                            <td><span class="badge-segment">Regular</span></td>
                                            <td><span class="badge-status badge-risk">At Risk</span></td>
                                            <td>
                                                <div class="dropdown">
                                                    <button class="btn btn-sm btn-outline-filter dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                                        Actions
                                                    </button>
                                                    <ul class="dropdown-menu dropdown-menu-end">
                                                        <li><a class="dropdown-item" href="#"><i class="fas fa-eye me-2"></i>View Details</a></li>
                                                        <li><a class="dropdown-item" href="#"><i class="fas fa-envelope me-2"></i>Send Email</a></li>
                                                        <li><a class="dropdown-item" href="#"><i class="fas fa-tag me-2"></i>Add Tag</a></li>
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="customer-avatar me-2">
                                                        AW
                                                    </div>
                                                    <div>
                                                        <p class="customer-name">Amanda Wilson</p>
                                                        <p class="customer-email">amanda.w@example.com</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>8</td>
                                            <td>$720</td>
                                            <td>May 28, 2023</td>
                                            <td><span class="badge-segment">Occasional</span></td>
                                            <td><span class="badge-status badge-inactive">Inactive</span></td>
                                            <td>
                                                <div class="dropdown">
                                                    <button class="btn btn-sm btn-outline-filter dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                                        Actions
                                                    </button>
                                                    <ul class="dropdown-menu dropdown-menu-end">
                                                        <li><a class="dropdown-item" href="#"><i class="fas fa-eye me-2"></i>View Details</a></li>
                                                        <li><a class="dropdown-item" href="#"><i class="fas fa-envelope me-2"></i>Send Email</a></li>
                                                        <li><a class="dropdown-item" href="#"><i class="fas fa-tag me-2"></i>Add Tag</a></li>
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="d-flex justify-content-between align-items-center mt-4">
                                <div>
                                    <p class="text-muted mb-0">Showing 5 of 1,248 customers</p>
                                </div>
                                <nav aria-label="Page navigation">
                                    <ul class="pagination mb-0">
                                        <li class="page-item disabled">
                                            <a class="page-link" href="#" aria-label="Previous">
                                                <span aria-hidden="true">&laquo;</span>
                                            </a>
                                        </li>
                                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                                        <li class="page-item">
                                            <a class="page-link" href="#" aria-label="Next">
                                                <span aria-hidden="true">&raquo;</span>
                                            </a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>

                    <!-- Customer Acquisition and Retention -->
                    <div class="row">
                        <div class="col-lg-6 mb-4">
                            <div class="analytics-card">
                                <div class="card-body">
                                    <div class="analytics-header">
                                        <h5 class="analytics-title">Customer Acquisition</h5>
                                        <div class="dropdown filter-dropdown">
                                            <button class="btn btn-outline-filter dropdown-toggle" type="button" id="acquisitionDropdown" data-bs-toggle="dropdown">
                                                Last 30 Days
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="acquisitionDropdown">
                                                <li><a class="dropdown-item active" href="#">Last 30 Days</a></li>
                                                <li><a class="dropdown-item" href="#">Last 90 Days</a></li>
                                                <li><a class="dropdown-item" href="#">Last 6 Months</a></li>
                                                <li><a class="dropdown-item" href="#">This Year</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="chart-container">
                                        <canvas id="acquisitionChart"></canvas>
                                    </div>
                                    <div class="mt-3">
                                        <div class="d-flex justify-content-between align-items-center mb-3">
                                            <div class="d-flex align-items-center">
                                                <div class="legend-color me-2" style="background-color: #228B22;"></div>
                                                <span>Organic Search</span>
                                            </div>
                                            <div>
                                                <span class="fw-bold">42 customers</span>
                                                <span class="ms-2 trend-up"><i class="fas fa-arrow-up"></i> 15%</span>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-between align-items-center mb-3">
                                            <div class="d-flex align-items-center">
                                                <div class="legend-color me-2" style="background-color: #4CAF50;"></div>
                                                <span>Social Media</span>
                                            </div>
                                            <div>
                                                <span class="fw-bold">38 customers</span>
                                                <span class="ms-2 trend-up"><i class="fas fa-arrow-up"></i> 22%</span>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-between align-items-center mb-3">
                                            <div class="d-flex align-items-center">
                                                <div class="legend-color me-2" style="background-color: #8BC34A;"></div>
                                                <span>Referral</span>
                                            </div>
                                            <div>
                                                <span class="fw-bold">25 customers</span>
                                                <span class="ms-2 trend-up"><i class="fas fa-arrow-up"></i> 8%</span>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="d-flex align-items-center">
                                                <div class="legend-color me-2" style="background-color: #CDDC39;"></div>
                                                <span>Email</span>
                                            </div>
                                            <div>
                                                <span class="fw-bold">18 customers</span>
                                                <span class="ms-2 trend-down"><i class="fas fa-arrow-down"></i> 5%</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 mb-4">
                            <div class="analytics-card">
                                <div class="card-body">
                                    <div class="analytics-header">
                                        <h5 class="analytics-title">Customer Retention</h5>
                                        <div class="dropdown filter-dropdown">
                                            <button class="btn btn-outline-filter dropdown-toggle" type="button" id="retentionDropdown" data-bs-toggle="dropdown">
                                                Last 30 Days
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="retentionDropdown">
                                                <li><a class="dropdown-item active" href="#">Last 30 Days</a></li>
                                                <li><a class="dropdown-item" href="#">Last 90 Days</a></li>
                                                <li><a class="dropdown-item" href="#">Last 6 Months</a></li>
                                                <li><a class="dropdown-item" href="#">This Year</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="chart-container">
                                        <canvas id="retentionChart"></canvas>
                                    </div>
                                    <div class="mt-3">
                                        <div class="d-flex justify-content-between mb-2">
                                            <span class="comparison-label">Retention Rate</span>
                                            <span class="comparison-value">68% <span class="trend-up"><i class="fas fa-arrow-up"></i> 5.2%</span></span>
                                        </div>
                                        <div class="progress comparison-progress mb-4">
                                            <div class="progress-bar bg-success" role="progressbar" style="width: 68%" aria-valuenow="68" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>

                                        <div class="d-flex justify-content-between mb-2">
                                            <span class="comparison-label">Churn Rate</span>
                                            <span class="comparison-value">12% <span class="trend-down"><i class="fas fa-arrow-down"></i> 2.8%</span></span>
                                        </div>
                                        <div class="progress comparison-progress">
                                            <div class="progress-bar bg-danger" role="progressbar" style="width: 12%" aria-valuenow="12" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Segments Tab -->
                <div class="tab-pane fade" id="segments" role="tabpanel" aria-labelledby="segments-tab">
                    <div class="row mb-4">
                        <div class="col-12 mb-4">
                            <div class="analytics-card">
                                <div class="card-body">
                                    <div class="analytics-header">
                                        <h5 class="analytics-title">Customer Segmentation Overview</h5>
                                        <div class="dropdown filter-dropdown">
                                            <button class="btn btn-outline-filter dropdown-toggle" type="button" id="segmentOverviewDropdown" data-bs-toggle="dropdown">
                                                By Purchase Behavior
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="segmentOverviewDropdown">
                                                <li><a class="dropdown-item active" href="#">By Purchase Behavior</a></li>
                                                <li><a class="dropdown-item" href="#">By Spend Amount</a></li>
                                                <li><a class="dropdown-item" href="#">By Product Category</a></li>
                                                <li><a class="dropdown-item" href="#">By Acquisition Source</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="chart-container">
                                        <canvas id="segmentOverviewChart"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6 mb-4">
                            <div class="segment-card">
                                <div class="segment-icon" style="background: var(--primary-gradient);">
                                    <i class="fas fa-crown"></i>
                                </div>
                                <h5 class="segment-title">VIP Customers</h5>
                                <h3 class="segment-value">187</h3>
                                <p class="segment-text">High-value customers who purchase frequently and spend the most.</p>
                                <div class="segment-stats">
                                    <div class="segment-stat">
                                        <p class="segment-stat-value">$320</p>
                                        <p class="segment-stat-label">Avg. Order</p>
                                    </div>
                                    <div class="segment-stat">
                                        <p class="segment-stat-value">15%</p>
                                        <p class="segment-stat-label">of Customers</p>
                                    </div>
                                    <div class="segment-stat">
                                        <p class="segment-stat-value">42%</p>
                                        <p class="segment-stat-label">of Revenue</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6 mb-4">
                            <div class="segment-card">
                                <div class="segment-icon" style="background: linear-gradient(135deg, #56CCF2 0%, #2F80ED 100%);">
                                    <i class="fas fa-user-check"></i>
                                </div>
                                <h5 class="segment-title">Regular Customers</h5>
                                <h3 class="segment-value">436</h3>
                                <p class="segment-text">Consistent customers who purchase regularly but at moderate values.</p>
                                <div class="segment-stats">
                                    <div class="segment-stat">
                                        <p class="segment-stat-value">$145</p>
                                        <p class="segment-stat-label">Avg. Order</p>
                                    </div>
                                    <div class="segment-stat">
                                        <p class="segment-stat-value">35%</p>
                                        <p class="segment-stat-label">of Customers</p>
                                    </div>
                                    <div class="segment-stat">
                                        <p class="segment-stat-value">38%</p>
                                        <p class="segment-stat-label">of Revenue</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6 mb-4">
                            <div class="segment-card">
                                <div class="segment-icon" style="background: linear-gradient(135deg, #FF9966 0%, #FF5E62 100%);">
                                    <i class="fas fa-user-clock"></i>
                                </div>
                                <h5 class="segment-title">Occasional Buyers</h5>
                                <h3 class="segment-value">375</h3>
                                <p class="segment-text">Customers who purchase infrequently or only during sales/promotions.</p>
                                <div class="segment-stats">
                                    <div class="segment-stat">
                                        <p class="segment-stat-value">$85</p>
                                        <p class="segment-stat-label">Avg. Order</p>
                                    </div>
                                    <div class="segment-stat">
                                        <p class="segment-stat-value">30%</p>
                                        <p class="segment-stat-label">of Customers</p>
                                    </div>
                                    <div class="segment-stat">
                                        <p class="segment-stat-value">15%</p>
                                        <p class="segment-stat-label">of Revenue</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6 mb-4">
                            <div class="segment-card">
                                <div class="segment-icon" style="background: linear-gradient(135deg, #8E2DE2 0%, #4A00E0 100%);">
                                    <i class="fas fa-user-plus"></i>
                                </div>
                                <h5 class="segment-title">New Customers</h5>
                                <h3 class="segment-value">250</h3>
                                <p class="segment-text">Recently acquired customers who have made their first purchase.</p>
                                <div class="segment-stats">
                                    <div class="segment-stat">
                                        <p class="segment-stat-value">$72</p>
                                        <p class="segment-stat-label">Avg. Order</p>
                                    </div>
                                    <div class="segment-stat">
                                        <p class="segment-stat-value">20%</p>
                                        <p class="segment-stat-label">of Customers</p>
                                    </div>
                                    <div class="segment-stat">
                                        <p class="segment-stat-value">5%</p>
                                        <p class="segment-stat-label">of Revenue</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6 mb-4">
                            <div class="analytics-card">
                                <div class="card-body">
                                    <div class="analytics-header">
                                        <h5 class="analytics-title">Segment Performance</h5>
                                        <div class="dropdown filter-dropdown">
                                            <button class="btn btn-outline-filter dropdown-toggle" type="button" id="segmentPerfDropdown" data-bs-toggle="dropdown">
                                                Last 30 Days
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="segmentPerfDropdown">
                                                <li><a class="dropdown-item active" href="#">Last 30 Days</a></li>
                                                <li><a class="dropdown-item" href="#">Last 90 Days</a></li>
                                                <li><a class="dropdown-item" href="#">Last 6 Months</a></li>
                                                <li><a class="dropdown-item" href="#">This Year</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="chart-container">
                                        <canvas id="segmentPerformanceChart"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6 mb-4">
                            <div class="analytics-card">
                                <div class="card-body">
                                    <div class="analytics-header">
                                        <h5 class="analytics-title">Segment Growth</h5>
                                        <div class="dropdown filter-dropdown">
                                            <button class="btn btn-outline-filter dropdown-toggle" type="button" id="segmentGrowthDropdown" data-bs-toggle="dropdown">
                                                Last 6 Months
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="segmentGrowthDropdown">
                                                <li><a class="dropdown-item" href="#">Last 30 Days</a></li>
                                                <li><a class="dropdown-item" href="#">Last 90 Days</a></li>
                                                <li><a class="dropdown-item active" href="#">Last 6 Months</a></li>
                                                <li><a class="dropdown-item" href="#">This Year</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="chart-container">
                                        <canvas id="segmentGrowthChart"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 mb-4">
                            <div class="analytics-card">
                                <div class="card-body">
                                    <div class="analytics-header">
                                        <h5 class="analytics-title">Segment Recommendations</h5>
                                        <button class="btn btn-filter">
                                            <i class="fas fa-play me-2"></i> Run Campaign
                                        </button>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table analytics-table">
                                            <thead>
                                                <tr>
                                                    <th>Segment</th>
                                                    <th>Size</th>
                                                    <th>Opportunity</th>
                                                    <th>Recommended Action</th>
                                                    <th>Potential Impact</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <div class="customer-avatar me-2" style="background: var(--primary-gradient);">
                                                                <i class="fas fa-crown"></i>
                                                            </div>
                                                            <div>
                                                                <p class="customer-name">VIP Customers</p>
                                                                <p class="customer-email">High value, frequent buyers</p>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>187</td>
                                                    <td>Loyalty & Retention</td>
                                                    <td>Launch exclusive VIP rewards program with early access to new products</td>
                                                    <td><span class="trend-up"><i class="fas fa-arrow-up me-1"></i>15% Revenue</span></td>
                                                    <td>
                                                        <button class="btn btn-sm btn-outline-filter">Create Campaign</button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <div class="customer-avatar me-2" style="background: linear-gradient(135deg, #FF9966 0%, #FF5E62 100%);">
                                                                <i class="fas fa-user-clock"></i>
                                                            </div>
                                                            <div>
                                                                <p class="customer-name">Occasional Buyers</p>
                                                                <p class="customer-email">Infrequent purchasers</p>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>375</td>
                                                    <td>Frequency Increase</td>
                                                    <td>Send personalized offers based on past purchases with limited-time discounts</td>
                                                    <td><span class="trend-up"><i class="fas fa-arrow-up me-1"></i>22% Frequency</span></td>
                                                    <td>
                                                        <button class="btn btn-sm btn-outline-filter">Create Campaign</button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <div class="customer-avatar me-2" style="background: linear-gradient(135deg, #8E2DE2 0%, #4A00E0 100%);">
                                                                <i class="fas fa-user-plus"></i>
                                                            </div>
                                                            <div>
                                                                <p class="customer-name">New Customers</p>
                                                                <p class="customer-email">First-time buyers</p>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>250</td>
                                                    <td>Conversion to Regular</td>
                                                    <td>Welcome series with educational content and second purchase incentive</td>
                                                    <td><span class="trend-up"><i class="fas fa-arrow-up me-1"></i>35% Retention</span></td>
                                                    <td>
                                                        <button class="btn btn-sm btn-outline-filter">Create Campaign</button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <div class="customer-avatar me-2" style="background: #F44336;">
                                                                <i class="fas fa-user-slash"></i>
                                                            </div>
                                                            <div>
                                                                <p class="customer-name">At-Risk Customers</p>
                                                                <p class="customer-email">No purchase in 60+ days</p>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>42</td>
                                                    <td>Re-engagement</td>
                                                    <td>Win-back campaign with special "We Miss You" discount and new product highlights</td>
                                                    <td><span class="trend-up"><i class="fas fa-arrow-up me-1"></i>18% Recovery</span></td>
                                                    <td>
                                                        <button class="btn btn-sm btn-outline-filter">Create Campaign</button>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Behavior Tab -->
                <div class="tab-pane fade" id="behavior" role="tabpanel" aria-labelledby="behavior-tab">
                    <div class="row mb-4">
                        <div class="col-lg-6 mb-4">
                            <div class="analytics-card">
                                <div class="card-body">
                                    <div class="analytics-header">
                                        <h5 class="analytics-title">Purchase Frequency</h5>
                                        <div class="dropdown filter-dropdown">
                                            <button class="btn btn-outline-filter dropdown-toggle" type="button" id="freqDropdown" data-bs-toggle="dropdown">
                                                Last 6 Months
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="freqDropdown">
                                                <li><a class="dropdown-item" href="#">Last 30 Days</a></li>
                                                <li><a class="dropdown-item" href="#">Last 90 Days</a></li>
                                                <li><a class="dropdown-item active" href="#">Last 6 Months</a></li>
                                                <li><a class="dropdown-item" href="#">This Year</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="chart-container">
                                        <canvas id="purchaseFrequencyChart"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6 mb-4">
                            <div class="analytics-card">
                                <div class="card-body">
                                    <div class="analytics-header">
                                        <h5 class="analytics-title">Average Order Value</h5>
                                        <div class="dropdown filter-dropdown">
                                            <button class="btn btn-outline-filter dropdown-toggle" type="button" id="aovDropdown" data-bs-toggle="dropdown">
                                                Last 6 Months
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="aovDropdown">
                                                <li><a class="dropdown-item" href="#">Last 30 Days</a></li>
                                                <li><a class="dropdown-item" href="#">Last 90 Days</a></li>
                                                <li><a class="dropdown-item active" href="#">Last 6 Months</a></li>
                                                <li><a class="dropdown-item" href="#">This Year</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="chart-container">
                                        <canvas id="aovChart"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 mb-4">
                            <div class="analytics-card">
                                <div class="card-body">
                                    <div class="analytics-header">
                                        <h5 class="analytics-title">Product Category Preferences</h5>
                                        <div class="dropdown filter-dropdown">
                                            <button class="btn btn-outline-filter dropdown-toggle" type="button" id="categoryPrefDropdown" data-bs-toggle="dropdown">
                                                All Segments
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="categoryPrefDropdown">
                                                <li><a class="dropdown-item active" href="#">All Segments</a></li>
                                                <li><a class="dropdown-item" href="#">VIP Customers</a></li>
                                                <li><a class="dropdown-item" href="#">Regular Customers</a></li>
                                                <li><a class="dropdown-item" href="#">Occasional Buyers</a></li>
                                                <li><a class="dropdown-item" href="#">New Customers</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="chart-container">
                                        <canvas id="categoryPreferencesChart"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6 mb-4">
                            <div class="analytics-card">
                                <div class="card-body">
                                    <div class="analytics-header">
                                        <h5 class="analytics-title">Purchase Time Patterns</h5>
                                        <div class="dropdown filter-dropdown">
                                            <button class="btn btn-outline-filter dropdown-toggle" type="button" id="timePatternDropdown" data-bs-toggle="dropdown">
                                                Last 30 Days
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="timePatternDropdown">
                                                <li><a class="dropdown-item active" href="#">Last 30 Days</a></li>
                                                <li><a class="dropdown-item" href="#">Last 90 Days</a></li>
                                                <li><a class="dropdown-item" href="#">Last 6 Months</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="chart-container">
                                        <canvas id="timePatternChart"></canvas>
                                    </div>
                                    <div class="mt-3">
                                        <h6 class="mb-2">Key Insights:</h6>
                                        <ul class="mb-0">
                                            <li>Peak shopping hours: 12-2 PM and 7-9 PM</li>
                                            <li>Weekends show 35% higher order volume</li>
                                            <li>VIP customers shop more in evenings (6-10 PM)</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6 mb-4">
                            <div class="analytics-card">
                                <div class="card-body">
                                    <div class="analytics-header">
                                        <h5 class="analytics-title">Device & Platform Usage</h5>
                                        <div class="dropdown filter-dropdown">
                                            <button class="btn btn-outline-filter dropdown-toggle" type="button" id="deviceDropdown" data-bs-toggle="dropdown">
                                                Last 30 Days
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="deviceDropdown">
                                                <li><a class="dropdown-item active" href="#">Last 30 Days</a></li>
                                                <li><a class="dropdown-item" href="#">Last 90 Days</a></li>
                                                <li><a class="dropdown-item" href="#">Last 6 Months</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h6 class="mb-3 text-center">Device Type</h6>
                                            <div class="chart-container-sm">
                                                <canvas id="deviceChart"></canvas>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <h6 class="mb-3 text-center">Platform</h6>
                                            <div class="chart-container-sm">
                                                <canvas id="platformChart"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-3">
                                        <h6 class="mb-2">Key Insights:</h6>
                                        <ul class="mb-0">
                                            <li>Mobile conversion rate is 15% lower than desktop</li>
                                            <li>iOS users spend 22% more per order than Android users</li>
                                            <li>Desktop users browse 2.5x more products per session</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 mb-4">
                            <div class="analytics-card">
                                <div class="card-body">
                                    <div class="analytics-header">
                                        <h5 class="analytics-title">Product Affinity Analysis</h5>
                                        <div class="dropdown filter-dropdown">
                                            <button class="btn btn-outline-filter dropdown-toggle" type="button" id="affinityDropdown" data-bs-toggle="dropdown">
                                                Top Products
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="affinityDropdown">
                                                <li><a class="dropdown-item active" href="#">Top Products</a></li>
                                                <li><a class="dropdown-item" href="#">By Category</a></li>
                                                <li><a class="dropdown-item" href="#">New Arrivals</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table analytics-table">
                                            <thead>
                                                <tr>
                                                    <th>Primary Product</th>
                                                    <th>Frequently Bought With</th>
                                                    <th>Affinity Score</th>
                                                    <th>Conversion Rate</th>
                                                    <th>Recommended Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <div class="product-img me-2">
                                                                <i class="fas fa-leaf"></i>
                                                            </div>
                                                            <div>
                                                                <p class="product-name">Organic Green Tea</p>
                                                                <p class="product-category">Beverages</p>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>Bamboo Tea Infuser</td>
                                                    <td>0.85 (High)</td>
                                                    <td>42%</td>
                                                    <td>Bundle products with 10% discount</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <div class="product-img me-2">
                                                                <i class="fas fa-tint"></i>
                                                            </div>
                                                            <div>
                                                                <p class="product-name">Bamboo Water Bottle</p>
                                                                <p class="product-category">Accessories</p>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>Stainless Steel Straw Set</td>
                                                    <td>0.78 (High)</td>
                                                    <td>38%</td>
                                                    <td>Create "Eco Essentials" bundle</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <div class="product-img me-2">
                                                                <i class="fas fa-seedling"></i>
                                                            </div>
                                                            <div>
                                                                <p class="product-name">Organic Coconut Oil</p>
                                                                <p class="product-category">Health</p>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>Organic Shea Butter</td>
                                                    <td>0.72 (Medium)</td>
                                                    <td>35%</td>
                                                    <td>Cross-sell on product pages</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <div class="product-img me-2">
                                                                <i class="fas fa-soap"></i>
                                                            </div>
                                                            <div>
                                                                <p class="product-name">Eco-friendly Dish Soap</p>
                                                                <p class="product-category">Home</p>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>Bamboo Dish Brush</td>
                                                    <td>0.68 (Medium)</td>
                                                    <td>32%</td>
                                                    <td>Add as recommended product</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Customer Journey Tab -->
                <div class="tab-pane fade" id="journey" role="tabpanel" aria-labelledby="journey-tab">
                    <div class="row mb-4">
                        <div class="col-12 mb-4">
                            <div class="customer-journey-card">
                                <div class="analytics-header">
                                    <h5 class="analytics-title">Customer Journey Map</h5>
                                    <div class="dropdown filter-dropdown">
                                        <button class="btn btn-outline-filter dropdown-toggle" type="button" id="journeyDropdown" data-bs-toggle="dropdown">
                                            Average Customer
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="journeyDropdown">
                                            <li><a class="dropdown-item active" href="#">Average Customer</a></li>
                                            <li><a class="dropdown-item" href="#">VIP Customers</a></li>
                                            <li><a class="dropdown-item" href="#">New Customers</a></li>
                                            <li><a class="dropdown-item" href="#">At-Risk Customers</a></li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="journey-step">
                                    <div class="journey-icon">
                                        <i class="fas fa-search"></i>
                                    </div>
                                    <div class="journey-content">
                                        <h6 class="journey-title">Discovery</h6>
                                        <p class="journey-text">Customer discovers your store through search engines, social media, or referrals</p>
                                        <div class="d-flex flex-wrap mt-2">
                                            <span class="journey-stat me-3">
                                                <i class="fas fa-users me-1"></i> 12,450 visitors
                                            </span>
                                            <span class="journey-stat">
                                                <i class="fas fa-chart-line me-1"></i> 3.2% conversion
                                            </span>
                                        </div>
                                    </div>
                                </div>

                                <div class="journey-step">
                                    <div class="journey-icon">
                                        <i class="fas fa-shopping-cart"></i>
                                    </div>
                                    <div class="journey-content">
                                        <h6 class="journey-title">First Purchase</h6>
                                        <p class="journey-text">Customer makes their first purchase, typically a lower-priced item or popular product</p>
                                        <div class="d-flex flex-wrap mt-2">
                                            <span class="journey-stat me-3">
                                                <i class="fas fa-dollar-sign me-1"></i> $72 avg. value
                                            </span>
                                            <span class="journey-stat">
                                                <i class="fas fa-box me-1"></i> 1.8 items per order
                                            </span>
                                        </div>
                                    </div>
                                </div>

                                <div class="journey-step">
                                    <div class="journey-icon">
                                        <i class="fas fa-envelope"></i>
                                    </div>
                                    <div class="journey-content">
                                        <h6 class="journey-title">Post-Purchase Engagement</h6>
                                        <p class="journey-text">Customer receives order confirmation, shipping updates, and follow-up emails</p>
                                        <div class="d-flex flex-wrap mt-2">
                                            <span class="journey-stat me-3">
                                                <i class="fas fa-envelope-open me-1"></i> 68% open rate
                                            </span>
                                            <span class="journey-stat">
                                                <i class="fas fa-mouse-pointer me-1"></i> 12% click rate
                                            </span>
                                        </div>
                                    </div>
                                </div>

                                <div class="journey-step">
                                    <div class="journey-icon">
                                        <i class="fas fa-redo"></i>
                                    </div>
                                    <div class="journey-content">
                                        <h6 class="journey-title">Return Visit</h6>
                                        <p class="journey-text">Customer returns to browse more products, often after receiving marketing emails</p>
                                        <div class="d-flex flex-wrap mt-2">
                                            <span class="journey-stat me-3">
                                                <i class="fas fa-calendar-alt me-1"></i> 18 days avg. time
                                            </span>
                                            <span class="journey-stat">
                                                <i class="fas fa-percentage me-1"></i> 42% return rate
                                            </span>
                                        </div>
                                    </div>
                                </div>

                                <div class="journey-step">
                                    <div class="journey-icon">
                                        <i class="fas fa-sync"></i>
                                    </div>
                                    <div class="journey-content">
                                        <h6 class="journey-title">Repeat Purchase</h6>
                                        <p class="journey-text">Customer makes additional purchases, often exploring new product categories</p>
                                        <div class="d-flex flex-wrap mt-2">
                                            <span class="journey-stat me-3">
                                                <i class="fas fa-dollar-sign me-1"></i> $95 avg. value
                                            </span>
                                            <span class="journey-stat">
                                                <i class="fas fa-box me-1"></i> 2.4 items per order
                                            </span>
                                        </div>
                                    </div>
                                </div>

                                <div class="journey-step">
                                    <div class="journey-icon">
                                        <i class="fas fa-heart"></i>
                                    </div>
                                    <div class="journey-content">
                                        <h6 class="journey-title">Loyalty & Advocacy</h6>
                                        <p class="journey-text">Customer becomes a regular shopper and may refer friends and family</p>
                                        <div class="d-flex flex-wrap mt-2">
                                            <span class="journey-stat me-3">
                                                <i class="fas fa-user-check me-1"></i> 28% become loyal
                                            </span>
                                            <span class="journey-stat">
                                                <i class="fas fa-share-alt me-1"></i> 15% refer others
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6 mb-4">
                            <div class="analytics-card">
                                <div class="card-body">
                                    <div class="analytics-header">
                                        <h5 class="analytics-title">Conversion Funnel</h5>
                                        <div class="dropdown filter-dropdown">
                                            <button class="btn btn-outline-filter dropdown-toggle" type="button" id="funnelDropdown" data-bs-toggle="dropdown">
                                                Last 30 Days
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="funnelDropdown">
                                                <li><a class="dropdown-item active" href="#">Last 30 Days</a></li>
                                                <li><a class="dropdown-item" href="#">Last 90 Days</a></li>
                                                <li><a class="dropdown-item" href="#">Last 6 Months</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="chart-container">
                                        <canvas id="conversionFunnelChart"></canvas>
                                    </div>
                                    <div class="mt-3">
                                        <h6 class="mb-2">Funnel Analysis:</h6>
                                        <ul class="mb-0">
                                            <li>Cart abandonment rate: 68% (5% improvement)</li>
                                            <li>Checkout completion: 75% (3% improvement)</li>
                                            <li>Overall conversion: 3.2% (0.4% improvement)</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6 mb-4">
                            <div class="analytics-card">
                                <div class="card-body">
                                    <div class="analytics-header">
                                        <h5 class="analytics-title">Customer Lifecycle</h5>
                                        <div class="dropdown filter-dropdown">
                                            <button class="btn btn-outline-filter dropdown-toggle" type="button" id="lifecycleDropdown" data-bs-toggle="dropdown">
                                                All Segments
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="lifecycleDropdown">
                                                <li><a class="dropdown-item active" href="#">All Segments</a></li>
                                                <li><a class="dropdown-item" href="#">VIP Customers</a></li>
                                                <li><a class="dropdown-item" href="#">Regular Customers</a></li>
                                                <li><a class="dropdown-item" href="#">Occasional Buyers</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="chart-container">
                                        <canvas id="lifecycleChart"></canvas>
                                    </div>
                                    <div class="mt-3">
                                        <div class="d-flex justify-content-between align-items-center mb-3">
                                            <div class="d-flex align-items-center">
                                                <div class="legend-color me-2" style="background-color: #228B22;"></div>
                                                <span>New (0-30 days)</span>
                                            </div>
                                            <div>
                                                <span class="fw-bold">250 customers</span>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-between align-items-center mb-3">
                                            <div class="d-flex align-items-center">
                                                <div class="legend-color me-2" style="background-color: #4CAF50;"></div>
                                                <span>Growing (31-90 days)</span>
                                            </div>
                                            <div>
                                                <span class="fw-bold">185 customers</span>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-between align-items-center mb-3">
                                            <div class="d-flex align-items-center">
                                                <div class="legend-color me-2" style="background-color: #8BC34A;"></div>
                                                <span>Established (91-180 days)</span>
                                            </div>
                                            <div>
                                                <span class="fw-bold">320 customers</span>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="d-flex align-items-center">
                                                <div class="legend-color me-2" style="background-color: #CDDC39;"></div>
                                                <span>Loyal (180+ days)</span>
                                            </div>
                                            <div>
                                                <span class="fw-bold">493 customers</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 mb-4">
                            <div class="analytics-card">
                                <div class="card-body">
                                    <div class="analytics-header">
                                        <h5 class="analytics-title">Touchpoint Effectiveness</h5>
                                        <div class="dropdown filter-dropdown">
                                            <button class="btn btn-outline-filter dropdown-toggle" type="button" id="touchpointDropdown" data-bs-toggle="dropdown">
                                                Last 30 Days
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="touchpointDropdown">
                                                <li><a class="dropdown-item active" href="#">Last 30 Days</a></li>
                                                <li><a class="dropdown-item" href="#">Last 90 Days</a></li>
                                                <li><a class="dropdown-item" href="#">Last 6 Months</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table analytics-table">
                                            <thead>
                                                <tr>
                                                    <th>Touchpoint</th>
                                                    <th>Reach</th>
                                                    <th>Engagement</th>
                                                    <th>Conversion</th>
                                                    <th>ROI</th>
                                                    <th>Trend</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <div class="customer-avatar me-2" style="background: linear-gradient(135deg, #4CAF50 0%, #8BC34A 100%);">
                                                                <i class="fas fa-envelope"></i>
                                                            </div>
                                                            <div>
                                                                <p class="customer-name">Email Marketing</p>
                                                                <p class="customer-email">Newsletters & Promotions</p>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>68% open rate</td>
                                                    <td>12% click rate</td>
                                                    <td>4.8% conversion</td>
                                                    <td>485%</td>
                                                    <td><span class="trend-up"><i class="fas fa-arrow-up me-1"></i>12%</span></td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <div class="customer-avatar me-2" style="background: linear-gradient(135deg, #2196F3 0%, #03A9F4 100%);">
                                                                <i class="fab fa-instagram"></i>
                                                            </div>
                                                            <div>
                                                                <p class="customer-name">Social Media</p>
                                                                <p class="customer-email">Instagram & Facebook</p>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>15,240 impressions</td>
                                                    <td>3.5% engagement</td>
                                                    <td>2.1% conversion</td>
                                                    <td>320%</td>
                                                    <td><span class="trend-up"><i class="fas fa-arrow-up me-1"></i>18%</span></td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <div class="customer-avatar me-2" style="background: linear-gradient(135deg, #FF9800 0%, #FFC107 100%);">
                                                                <i class="fas fa-search"></i>
                                                            </div>
                                                            <div>
                                                                <p class="customer-name">Search Ads</p>
                                                                <p class="customer-email">Google & Bing</p>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>8,750 clicks</td>
                                                    <td>2.8% CTR</td>
                                                    <td>3.2% conversion</td>
                                                    <td>275%</td>
                                                    <td><span class="trend-up"><i class="fas fa-arrow-up me-1"></i>5%</span></td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <div class="customer-avatar me-2" style="background: linear-gradient(135deg, #9C27B0 0%, #BA68C8 100%);">
                                                                <i class="fas fa-mobile-alt"></i>
                                                            </div>
                                                            <div>
                                                                <p class="customer-name">SMS Marketing</p>
                                                                <p class="customer-email">Text Promotions</p>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>98% delivery rate</td>
                                                    <td>15% response rate</td>
                                                    <td>6.5% conversion</td>
                                                    <td>520%</td>
                                                    <td><span class="trend-up"><i class="fas fa-arrow-up me-1"></i>22%</span></td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <div class="customer-avatar me-2" style="background: linear-gradient(135deg, #F44336 0%, #FF5722 100%);">
                                                                <i class="fas fa-bullhorn"></i>
                                                            </div>
                                                            <div>
                                                                <p class="customer-name">Retargeting</p>
                                                                <p class="customer-email">Display & Social</p>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>95% delivery rate</td>
                                                    <td>18% response rate</td>
                                                    <td>8.2% conversion</td>
                                                    <td>630%</td>
                                                    <td><span class="trend-up"><i class="fas fa-arrow-up me-1"></i>28%</span></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once 'includes/foot.php'; ?>