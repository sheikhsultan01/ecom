<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seller Central - Customer Analytics</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-gradient: linear-gradient(135deg, #2E8B57 0%, #228B22 50%, #32CD32 100%);
            --secondary-gradient: linear-gradient(135deg, #90EE90 0%, #98FB98 100%);
            --accent-color: #228B22;
            --text-dark: #2F4F4F;
            --text-light: #6B8E6B;
            --card-shadow: 0 8px 30px rgba(34, 139, 34, 0.15);
            --hover-shadow: 0 15px 40px rgba(34, 139, 34, 0.25);
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fa;
            color: var(--text-dark);
        }

        .navbar {
            background: var(--primary-gradient);
            box-shadow: var(--card-shadow);
        }

        .navbar-brand {
            font-weight: 700;
            color: white;
        }

        .nav-link {
            color: white !important;
            font-weight: 500;
            transition: all 0.3s;
            padding: 0.75rem 1rem;
            border-radius: 8px;
        }

        .nav-link:hover,
        .nav-link.active {
            background-color: rgba(255, 255, 255, 0.15);
            transform: translateY(-2px);
        }

        .sidebar {
            background: white;
            border-radius: 15px;
            box-shadow: var(--card-shadow);
            padding: 1.5rem;
            height: calc(100vh - 6rem);
            position: sticky;
            top: 1.5rem;
            transition: all 0.3s ease;
        }

        .sidebar-link {
            display: flex;
            align-items: center;
            padding: 0.75rem 1rem;
            color: var(--text-dark);
            border-radius: 10px;
            margin-bottom: 0.5rem;
            transition: all 0.3s;
            text-decoration: none;
        }

        .sidebar-link:hover,
        .sidebar-link.active {
            background: var(--secondary-gradient);
            color: var(--accent-color);
            transform: translateX(5px);
        }

        .sidebar-link i {
            margin-right: 10px;
            width: 20px;
            text-align: center;
        }

        .sidebar-heading {
            font-size: 0.8rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: var(--text-light);
            margin: 1.5rem 0 0.5rem;
            padding-left: 1rem;
        }

        .analytics-card {
            border-radius: 15px;
            border: none;
            transition: all 0.3s;
            box-shadow: var(--card-shadow);
            overflow: hidden;
            height: 100%;
            margin-bottom: 1.5rem;
        }

        .analytics-card:hover {
            transform: translateY(-5px);
            box-shadow: var(--hover-shadow);
        }

        .analytics-card .card-body {
            padding: 1.5rem;
        }

        .analytics-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
        }

        .analytics-title {
            font-weight: 600;
            margin-bottom: 0;
            color: var(--text-dark);
        }

        .chart-container {
            position: relative;
            height: 300px;
            margin-bottom: 1rem;
        }

        .chart-container-sm {
            height: 220px;
        }

        .filter-dropdown .dropdown-menu {
            border-radius: 10px;
            box-shadow: var(--card-shadow);
            border: none;
            padding: 0.5rem;
        }

        .filter-dropdown .dropdown-item {
            border-radius: 8px;
            padding: 0.5rem 1rem;
        }

        .filter-dropdown .dropdown-item:hover {
            background-color: #f1f1f1;
        }

        .filter-dropdown .dropdown-item.active {
            background: var(--secondary-gradient);
            color: var(--text-dark);
        }

        .btn-filter {
            background: var(--primary-gradient);
            border: none;
            border-radius: 10px;
            padding: 0.75rem 1.5rem;
            color: white;
            font-weight: 500;
            transition: all 0.3s;
        }

        .btn-filter:hover {
            box-shadow: var(--hover-shadow);
            transform: translateY(-2px);
            color: white;
        }

        .btn-outline-filter {
            background: transparent;
            border: 1px solid var(--accent-color);
            border-radius: 10px;
            padding: 0.75rem 1.5rem;
            color: var(--accent-color);
            font-weight: 500;
            transition: all 0.3s;
        }

        .btn-outline-filter:hover {
            background: var(--secondary-gradient);
            color: var(--accent-color);
            transform: translateY(-2px);
        }

        .date-range-picker {
            border-radius: 10px;
            border: 1px solid #e0e0e0;
            padding: 0.75rem 1rem;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            width: 100%;
        }

        .metric-card {
            background: white;
            border-radius: 15px;
            padding: 1.5rem;
            box-shadow: var(--card-shadow);
            transition: all 0.3s;
            height: 100%;
        }

        .metric-card:hover {
            transform: translateY(-5px);
            box-shadow: var(--hover-shadow);
        }

        .metric-icon {
            width: 50px;
            height: 50px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            color: white;
            margin-bottom: 1rem;
        }

        .metric-primary {
            background: var(--primary-gradient);
        }

        .metric-blue {
            background: linear-gradient(135deg, #56CCF2 0%, #2F80ED 100%);
        }

        .metric-orange {
            background: linear-gradient(135deg, #FF9966 0%, #FF5E62 100%);
        }

        .metric-purple {
            background: linear-gradient(135deg, #8E2DE2 0%, #4A00E0 100%);
        }

        .metric-value {
            font-size: 1.8rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
        }

        .metric-label {
            color: var(--text-light);
            font-size: 0.9rem;
            margin-bottom: 0;
        }

        .metric-trend {
            font-size: 0.85rem;
            font-weight: 600;
            display: flex;
            align-items: center;
            margin-top: 0.5rem;
        }

        .trend-up {
            color: #4CAF50;
        }

        .trend-down {
            color: #F44336;
        }

        .comparison-label {
            font-size: 0.8rem;
            color: var(--text-light);
        }

        .comparison-value {
            font-size: 1rem;
            font-weight: 600;
        }

        .comparison-progress {
            height: 6px;
            border-radius: 3px;
            margin-bottom: 1rem;
        }

        .table-responsive {
            border-radius: 15px;
            overflow: hidden;
        }

        .analytics-table {
            margin-bottom: 0;
        }

        .analytics-table th {
            background: var(--secondary-gradient);
            color: var(--text-dark);
            font-weight: 600;
            border: none;
            padding: 1rem;
        }

        .analytics-table td {
            padding: 1rem;
            vertical-align: middle;
            border-color: #f1f1f1;
        }

        .customer-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: var(--secondary-gradient);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--accent-color);
            font-size: 1rem;
            font-weight: 600;
        }

        .customer-name {
            font-weight: 600;
            margin-bottom: 0;
        }

        .customer-email {
            font-size: 0.8rem;
            color: var(--text-light);
            margin-bottom: 0;
        }

        .user-profile {
            display: flex;
            align-items: center;
        }

        .user-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.2);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 600;
            margin-right: 10px;
        }

        .user-name {
            color: white;
            font-weight: 600;
            margin-bottom: 0;
            font-size: 0.9rem;
        }

        .user-role {
            color: rgba(255, 255, 255, 0.8);
            font-size: 0.75rem;
            margin-bottom: 0;
        }

        .notification-badge {
            position: absolute;
            top: 0;
            right: 0;
            background-color: #FF5E62;
            color: white;
            border-radius: 50%;
            width: 18px;
            height: 18px;
            font-size: 0.7rem;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .analytics-tab {
            border: none;
            margin-bottom: 1.5rem;
        }

        .analytics-tab .nav-link {
            color: var(--text-light) !important;
            border: none;
            border-radius: 10px;
            padding: 0.75rem 1.5rem;
            margin-right: 0.5rem;
            font-weight: 500;
            transition: all 0.3s;
        }

        .analytics-tab .nav-link.active {
            background: var(--primary-gradient);
            color: white !important;
            box-shadow: var(--card-shadow);
        }

        .analytics-tab .nav-link:hover:not(.active) {
            background-color: rgba(34, 139, 34, 0.1);
            color: var(--accent-color) !important;
        }

        .legend-item {
            display: flex;
            align-items: center;
            margin-right: 1.5rem;
            margin-bottom: 0.5rem;
        }

        .legend-color {
            width: 12px;
            height: 12px;
            border-radius: 50%;
            margin-right: 0.5rem;
        }

        .legend-label {
            font-size: 0.85rem;
            color: var(--text-light);
        }

        .insights-card {
            background: white;
            border-radius: 15px;
            padding: 1.5rem;
            box-shadow: var(--card-shadow);
            margin-bottom: 1.5rem;
            transition: all 0.3s;
        }

        .insights-card:hover {
            transform: translateY(-5px);
            box-shadow: var(--hover-shadow);
        }

        .insights-icon {
            width: 40px;
            height: 40px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
            color: white;
            margin-right: 1rem;
        }

        .insights-title {
            font-weight: 600;
            margin-bottom: 0.25rem;
        }

        .insights-text {
            color: var(--text-light);
            font-size: 0.9rem;
            margin-bottom: 0;
        }

        .insights-positive {
            background: linear-gradient(135deg, #4CAF50 0%, #8BC34A 100%);
        }

        .insights-warning {
            background: linear-gradient(135deg, #FF9800 0%, #FFC107 100%);
        }

        .insights-info {
            background: linear-gradient(135deg, #2196F3 0%, #03A9F4 100%);
        }

        .segment-card {
            background: white;
            border-radius: 15px;
            padding: 1.5rem;
            box-shadow: var(--card-shadow);
            transition: all 0.3s;
            height: 100%;
            display: flex;
            flex-direction: column;
        }

        .segment-card:hover {
            transform: translateY(-5px);
            box-shadow: var(--hover-shadow);
        }

        .segment-icon {
            width: 60px;
            height: 60px;
            border-radius: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.8rem;
            color: white;
            margin-bottom: 1.5rem;
        }

        .segment-title {
            font-weight: 600;
            font-size: 1.2rem;
            margin-bottom: 0.5rem;
        }

        .segment-value {
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
            color: var(--accent-color);
        }

        .segment-text {
            color: var(--text-light);
            font-size: 0.9rem;
            margin-bottom: 1rem;
            flex-grow: 1;
        }

        .segment-stats {
            display: flex;
            justify-content: space-between;
            padding-top: 1rem;
            border-top: 1px solid #f1f1f1;
        }

        .segment-stat {
            text-align: center;
        }

        .segment-stat-value {
            font-weight: 600;
            font-size: 1.1rem;
            margin-bottom: 0.25rem;
        }

        .segment-stat-label {
            font-size: 0.8rem;
            color: var(--text-light);
        }

        .customer-journey-card {
            background: white;
            border-radius: 15px;
            padding: 1.5rem;
            box-shadow: var(--card-shadow);
            transition: all 0.3s;
        }

        .customer-journey-card:hover {
            transform: translateY(-5px);
            box-shadow: var(--hover-shadow);
        }

        .journey-step {
            display: flex;
            align-items: center;
            position: relative;
            padding-bottom: 2rem;
        }

        .journey-step:last-child {
            padding-bottom: 0;
        }

        .journey-step:not(:last-child)::after {
            content: '';
            position: absolute;
            top: 40px;
            left: 20px;
            height: calc(100% - 40px);
            width: 2px;
            background: linear-gradient(to bottom, var(--accent-color), #e0e0e0);
        }

        .journey-icon {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: var(--primary-gradient);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1rem;
            margin-right: 1rem;
            z-index: 1;
        }

        .journey-content {
            flex-grow: 1;
        }

        .journey-title {
            font-weight: 600;
            margin-bottom: 0.25rem;
        }

        .journey-text {
            color: var(--text-light);
            font-size: 0.9rem;
            margin-bottom: 0;
        }

        .journey-stat {
            background: #f8f9fa;
            border-radius: 10px;
            padding: 0.5rem 1rem;
            font-weight: 600;
            font-size: 0.9rem;
            color: var(--accent-color);
        }

        .badge-segment {
            background: var(--secondary-gradient);
            color: var(--accent-color);
            font-weight: 500;
            padding: 0.35rem 0.75rem;
            border-radius: 20px;
            font-size: 0.75rem;
        }

        .badge-status {
            font-weight: 500;
            padding: 0.35rem 0.75rem;
            border-radius: 20px;
            font-size: 0.75rem;
        }

        .badge-active {
            background-color: rgba(76, 175, 80, 0.15);
            color: #4CAF50;
        }

        .badge-inactive {
            background-color: rgba(158, 158, 158, 0.15);
            color: #9E9E9E;
        }

        .badge-risk {
            background-color: rgba(244, 67, 54, 0.15);
            color: #F44336;
        }

        .customer-detail-card {
            background: white;
            border-radius: 15px;
            box-shadow: var(--card-shadow);
            transition: all 0.3s;
            overflow: hidden;
        }

        .customer-detail-card:hover {
            transform: translateY(-5px);
            box-shadow: var(--hover-shadow);
        }

        .customer-detail-header {
            background: var(--primary-gradient);
            padding: 2rem;
            color: white;
            text-align: center;
        }

        .customer-detail-avatar {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.2);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2.5rem;
            color: white;
            margin: 0 auto 1rem;
            border: 4px solid rgba(255, 255, 255, 0.5);
        }

        .customer-detail-name {
            font-size: 1.5rem;
            font-weight: 600;
            margin-bottom: 0.25rem;
        }

        .customer-detail-email {
            font-size: 0.9rem;
            opacity: 0.9;
            margin-bottom: 1rem;
        }

        .customer-detail-stats {
            display: flex;
            justify-content: center;
            gap: 2rem;
        }

        .customer-detail-stat {
            text-align: center;
        }

        .customer-detail-stat-value {
            font-size: 1.5rem;
            font-weight: 600;
            margin-bottom: 0.25rem;
        }

        .customer-detail-stat-label {
            font-size: 0.8rem;
            opacity: 0.9;
        }

        .customer-detail-body {
            padding: 2rem;
        }

        .customer-detail-section {
            margin-bottom: 2rem;
        }

        .customer-detail-section:last-child {
            margin-bottom: 0;
        }

        .customer-detail-section-title {
            font-weight: 600;
            margin-bottom: 1rem;
            display: flex;
            align-items: center;
        }

        .customer-detail-section-title i {
            margin-right: 0.5rem;
            color: var(--accent-color);
        }

        .customer-detail-info {
            display: flex;
            flex-wrap: wrap;
            gap: 1.5rem;
        }

        .customer-detail-info-item {
            flex: 1 0 calc(50% - 1.5rem);
            min-width: 200px;
        }

        .customer-detail-info-label {
            font-size: 0.8rem;
            color: var(--text-light);
            margin-bottom: 0.25rem;
        }

        .customer-detail-info-value {
            font-weight: 500;
        }

        .customer-detail-orders {
            margin-top: 1rem;
        }

        .customer-detail-order {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1rem;
            border-radius: 10px;
            background-color: #f8f9fa;
            margin-bottom: 0.75rem;
        }

        .customer-detail-order:last-child {
            margin-bottom: 0;
        }

        .customer-detail-order-info {
            flex-grow: 1;
        }

        .customer-detail-order-id {
            font-weight: 600;
            margin-bottom: 0.25rem;
        }

        .customer-detail-order-date {
            font-size: 0.8rem;
            color: var(--text-light);
        }

        .customer-detail-order-amount {
            font-weight: 600;
            color: var(--accent-color);
        }

        .customer-detail-order-status {
            font-size: 0.8rem;
            padding: 0.25rem 0.75rem;
            border-radius: 20px;
            margin-left: 1rem;
        }

        .status-delivered {
            background-color: rgba(76, 175, 80, 0.15);
            color: #4CAF50;
        }

        .status-processing {
            background-color: rgba(33, 150, 243, 0.15);
            color: #2196F3;
        }

        .status-cancelled {
            background-color: rgba(244, 67, 54, 0.15);
            color: #F44336;
        }

        .customer-detail-actions {
            display: flex;
            gap: 1rem;
            margin-top: 2rem;
        }

        .btn-customer-action {
            flex: 1;
            text-align: center;
            padding: 0.75rem;
            border-radius: 10px;
            font-weight: 500;
            transition: all 0.3s;
        }

        .btn-primary-action {
            background: var(--primary-gradient);
            color: white;
            border: none;
        }

        .btn-primary-action:hover {
            box-shadow: var(--hover-shadow);
            transform: translateY(-2px);
            color: white;
        }

        .btn-secondary-action {
            background: transparent;
            color: var(--accent-color);
            border: 1px solid var(--accent-color);
        }

        .btn-secondary-action:hover {
            background: var(--secondary-gradient);
            transform: translateY(-2px);
        }

        .customer-tags {
            display: flex;
            flex-wrap: wrap;
            gap: 0.5rem;
            margin-top: 0.5rem;
        }

        .customer-tag {
            background-color: rgba(34, 139, 34, 0.1);
            color: var(--accent-color);
            font-size: 0.75rem;
            padding: 0.25rem 0.75rem;
            border-radius: 20px;
            display: inline-flex;
            align-items: center;
        }

        .customer-tag i {
            font-size: 0.7rem;
            margin-left: 0.5rem;
            cursor: pointer;
        }

        .activity-timeline {
            position: relative;
            padding-left: 30px;
        }

        .activity-item {
            position: relative;
            padding-bottom: 1.5rem;
        }

        .activity-item:last-child {
            padding-bottom: 0;
        }

        .activity-item::before {
            content: '';
            position: absolute;
            left: -30px;
            top: 0;
            width: 12px;
            height: 12px;
            border-radius: 50%;
            background: var(--accent-color);
            z-index: 1;
        }

        .activity-item:not(:last-child)::after {
            content: '';
            position: absolute;
            left: -24px;
            top: 12px;
            width: 1px;
            height: calc(100% - 12px);
            background-color: #e0e0e0;
        }

        .activity-time {
            font-size: 0.8rem;
            color: var(--text-light);
            margin-bottom: 0.25rem;
        }

        .activity-title {
            font-weight: 600;
            margin-bottom: 0.25rem;
        }

        .activity-text {
            font-size: 0.9rem;
            color: var(--text-dark);
        }

        .search-input {
            border-radius: 10px;
            border: 1px solid #e0e0e0;
            padding: 0.75rem 1rem;
            padding-left: 3rem;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            width: 100%;
        }

        .search-icon {
            position: absolute;
            left: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: var(--text-light);
        }

        .search-container {
            position: relative;
            max-width: 400px;
        }

        @media (max-width: 992px) {
            .sidebar {
                height: auto;
                position: static;
                margin-bottom: 1.5rem;
            }

            .chart-container {
                height: 250px;
            }

            .chart-container-sm {
                height: 200px;
            }

            .analytics-tab .nav-link {
                padding: 0.5rem 1rem;
                font-size: 0.9rem;
            }

            .customer-detail-info-item {
                flex: 1 0 100%;
            }
        }

        @media (max-width: 768px) {
            .analytics-header {
                flex-direction: column;
                align-items: flex-start;
            }

            .analytics-header .btn-group,
            .analytics-header .search-container {
                margin-top: 1rem;
                width: 100%;
            }

            .chart-container {
                height: 220px;
            }

            .chart-container-sm {
                height: 180px;
            }

            .analytics-tab {
                overflow-x: auto;
                flex-wrap: nowrap;
                padding-bottom: 5px;
            }

            .analytics-tab .nav-item {
                flex-shrink: 0;
            }

            .customer-detail-stats {
                flex-direction: column;
                gap: 1rem;
            }
        }

        @media (max-width: 576px) {
            .chart-container {
                height: 200px;
            }

            .chart-container-sm {
                height: 160px;
            }

            .metric-value {
                font-size: 1.5rem;
            }

            .analytics-card .card-body {
                padding: 1rem;
            }

            .segment-icon {
                width: 50px;
                height: 50px;
                font-size: 1.5rem;
            }

            .segment-title {
                font-size: 1.1rem;
            }

            .segment-value {
                font-size: 1.6rem;
            }

            .customer-detail-header {
                padding: 1.5rem;
            }

            .customer-detail-avatar {
                width: 80px;
                height: 80px;
                font-size: 2rem;
            }

            .customer-detail-body {
                padding: 1.5rem;
            }

            .customer-detail-actions {
                flex-direction: column;
            }
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark mb-4">
        <div class="container-fluid px-4">
            <a class="navbar-brand" href="#">
                <i class="fas fa-leaf me-2"></i>
                GreenCart Seller
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto me-4">
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="fas fa-tachometer-alt me-1"></i> Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="fas fa-shopping-cart me-1"></i> Orders
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="fas fa-box me-1"></i> Products
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="#">
                            <i class="fas fa-chart-line me-1"></i> Analytics
                        </a>
                    </li>
                </ul>
                <div class="d-flex align-items-center">
                    <div class="position-relative me-3">
                        <a href="#" class="nav-link p-0">
                            <i class="fas fa-bell fs-5"></i>
                            <span class="notification-badge">3</span>
                        </a>
                    </div>
                    <div class="user-profile">
                        <div class="user-avatar">JS</div>
                        <div>
                            <p class="user-name">John Smith</p>
                            <p class="user-role">Store Owner</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <div class="container-fluid px-4">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-lg-2 mb-4">
                <div class="sidebar">
                    <a href="#" class="sidebar-link">
                        <i class="fas fa-tachometer-alt"></i> Dashboard
                    </a>
                    <a href="#" class="sidebar-link">
                        <i class="fas fa-shopping-cart"></i> Orders
                    </a>
                    <a href="#" class="sidebar-link">
                        <i class="fas fa-box"></i> Products
                    </a>
                    <a href="#" class="sidebar-link active">
                        <i class="fas fa-users"></i> Customers
                    </a>
                    <a href="#" class="sidebar-link">
                        <i class="fas fa-chart-line"></i> Analytics
                    </a>
                    <a href="#" class="sidebar-link">
                        <i class="fas fa-tag"></i> Marketing
                    </a>

                    <div class="sidebar-heading">Settings</div>
                    <a href="#" class="sidebar-link">
                        <i class="fas fa-store"></i> Store Settings
                    </a>
                    <a href="#" class="sidebar-link">
                        <i class="fas fa-credit-card"></i> Payments
                    </a>
                    <a href="#" class="sidebar-link">
                        <i class="fas fa-truck"></i> Shipping
                    </a>
                    <a href="#" class="sidebar-link">
                        <i class="fas fa-cog"></i> Account Settings
                    </a>

                    <div class="mt-auto pt-4">
                        <a href="#" class="sidebar-link text-danger">
                            <i class="fas fa-sign-out-alt"></i> Logout
                        </a>
                    </div>
                </div>
            </div>

            <!-- Main Content -->
            <div class="col-lg-10">
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
</body>

</html>