<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile - GreenShop</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Cropper.js CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-color: #28a745;
            --primary-dark: #218838;
            --primary-light: #48c774;
            --primary-very-light: #e6f7ec;
            --text-color: #333333;
            --text-muted: #6c757d;
            --border-radius: 10px;
            --box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            --transition: all 0.3s ease;
        }

        body {
            font-family: 'Poppins', sans-serif;
            color: var(--text-color);
            background-color: #f8f9fa;
        }

        .navbar {
            background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .navbar-brand {
            font-weight: 600;
            color: white;
        }

        .btn-primary {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
            transition: var(--transition);
        }

        .btn-primary:hover {
            background-color: var(--primary-dark);
            border-color: var(--primary-dark);
            transform: translateY(-2px);
        }

        .btn-outline-primary {
            color: var(--primary-color);
            border-color: var(--primary-color);
            transition: var(--transition);
        }

        .btn-outline-primary:hover {
            background-color: var(--primary-color);
            color: white;
            transform: translateY(-2px);
        }

        .profile-container {
            max-width: 1200px;
            margin: 30px auto;
        }

        .profile-header {
            background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
            border-radius: var(--border-radius);
            padding: 30px;
            color: white;
            position: relative;
            margin-bottom: 30px;
            box-shadow: var(--box-shadow);
        }

        .profile-avatar-container {
            position: relative;
            width: 150px;
            height: 150px;
            margin: 0 auto 20px;
        }

        .profile-avatar {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            object-fit: cover;
            border: 5px solid rgba(255, 255, 255, 0.3);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
            transition: var(--transition);
        }

        .avatar-upload-btn {
            position: absolute;
            bottom: 0;
            right: 0;
            width: 40px;
            height: 40px;
            background-color: var(--primary-light);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: var(--transition);
            border: 2px solid white;
        }

        .avatar-upload-btn:hover {
            background-color: white;
            color: var(--primary-color);
            transform: scale(1.1);
        }

        .profile-info h3 {
            margin-bottom: 5px;
            font-weight: 600;
        }

        .profile-info p {
            opacity: 0.8;
            margin-bottom: 0;
        }

        .profile-tabs {
            background-color: white;
            border-radius: var(--border-radius);
            box-shadow: var(--box-shadow);
            overflow: hidden;
        }

        .nav-tabs {
            background-color: var(--primary-very-light);
            border-bottom: none;
            padding: 0 15px;
        }

        .nav-tabs .nav-link {
            border: none;
            color: var(--text-color);
            font-weight: 500;
            padding: 15px 20px;
            transition: var(--transition);
            border-radius: 0;
            margin-right: 5px;
        }

        .nav-tabs .nav-link.active {
            color: var(--primary-color);
            background-color: white;
            border-top: 3px solid var(--primary-color);
        }

        .nav-tabs .nav-link:hover:not(.active) {
            background-color: rgba(40, 167, 69, 0.05);
            color: var(--primary-color);
        }

        .tab-content {
            padding: 30px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-label {
            font-weight: 500;
            margin-bottom: 8px;
            color: var(--text-color);
        }

        .form-control {
            border-radius: 8px;
            padding: 10px 15px;
            border: 1px solid #dee2e6;
            transition: var(--transition);
        }

        .form-control:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.25rem rgba(40, 167, 69, 0.25);
        }

        .form-text {
            font-size: 0.85rem;
            color: var(--text-muted);
        }

        .card {
            border: none;
            border-radius: var(--border-radius);
            box-shadow: var(--box-shadow);
            overflow: hidden;
            transition: var(--transition);
            height: 100%;
        }

        .card:hover {
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            transform: translateY(-5px);
        }

        .card-header {
            background-color: var(--primary-very-light);
            border-bottom: none;
            padding: 15px 20px;
            font-weight: 600;
            color: var(--primary-dark);
        }

        .card-body {
            padding: 20px;
        }

        .address-card {
            border: 1px solid #dee2e6;
            border-radius: var(--border-radius);
            padding: 15px;
            margin-bottom: 15px;
            transition: var(--transition);
            position: relative;
        }

        .address-card:hover {
            border-color: var(--primary-color);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        }

        .address-actions {
            position: absolute;
            top: 15px;
            right: 15px;
        }

        .address-type {
            display: inline-block;
            padding: 2px 10px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 500;
            margin-bottom: 10px;
        }

        .address-type.home {
            background-color: #e7f6fd;
            color: #0099e5;
        }

        .address-type.work {
            background-color: #fdf4e7;
            color: #f8971d;
        }

        .address-type.other {
            background-color: #efe7fd;
            color: #9c52ff;
        }

        .map-container {
            height: 300px;
            border-radius: var(--border-radius);
            overflow: hidden;
            margin-bottom: 20px;
            box-shadow: var(--box-shadow);
        }

        #map {
            height: 100%;
            width: 100%;
        }

        .btn-floating {
            position: fixed;
            bottom: 30px;
            right: 30px;
            width: 60px;
            height: 60px;
            border-radius: 50%;
            background-color: var(--primary-color);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            transition: var(--transition);
            z-index: 1000;
        }

        .btn-floating:hover {
            background-color: var(--primary-dark);
            transform: scale(1.1);
        }

        /* Modal styles */
        .modal-content {
            border-radius: var(--border-radius);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            border: none;
        }

        .modal-header {
            background-color: var(--primary-very-light);
            border-bottom: none;
        }

        .modal-title {
            color: var(--primary-dark);
            font-weight: 600;
        }

        .modal-footer {
            border-top: none;
        }

        /* Image cropper styles */
        .img-container {
            max-height: 400px;
            margin-bottom: 20px;
        }

        .cropper-container {
            margin: 0 auto;
        }

        /* Password strength meter */
        .password-strength-meter {
            height: 5px;
            background-color: #e9ecef;
            border-radius: 5px;
            margin-top: 5px;
            margin-bottom: 10px;
            overflow: hidden;
        }

        .password-strength-meter div {
            height: 100%;
            width: 0;
            transition: width 0.5s ease;
        }

        .strength-weak {
            background-color: #dc3545;
        }

        .strength-medium {
            background-color: #ffc107;
        }

        .strength-strong {
            background-color: var(--primary-color);
        }

        /* Success notification */
        .notification {
            position: fixed;
            top: 20px;
            right: 20px;
            background-color: var(--primary-color);
            color: white;
            padding: 15px 20px;
            border-radius: var(--border-radius);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            transform: translateX(150%);
            transition: transform 0.3s ease;
            z-index: 1100;
            display: flex;
            align-items: center;
        }

        .notification.show {
            transform: translateX(0);
        }

        .notification i {
            margin-right: 10px;
            font-size: 1.2rem;
        }

        /* Responsive styles */
        @media (max-width: 768px) {
            .profile-header {
                padding: 20px;
                text-align: center;
            }

            .nav-tabs .nav-link {
                padding: 10px 15px;
                font-size: 0.9rem;
            }

            .tab-content {
                padding: 20px;
            }

            .btn-floating {
                bottom: 20px;
                right: 20px;
                width: 50px;
                height: 50px;
                font-size: 1.2rem;
            }
        }
    </style>
</head>

<body>
    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="index.html">
                <i class="bi bi-leaf me-2"></i>GreenShop
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.html">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="products.html">Shop</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="about.html">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact.html">Contact</a>
                    </li>
                </ul>
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="profile.html">
                            <i class="bi bi-person-circle me-1"></i> My Profile
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="cart.html">
                            <i class="bi bi-cart me-1"></i> Cart
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container profile-container">
        <!-- Profile Header -->
        <div class="profile-header">
            <div class="row align-items-center">
                <div class="col-md-4 text-center text-md-start">
                    <div class="profile-avatar-container">
                        <img src="https://via.placeholder.com/150" alt="User Avatar" class="profile-avatar" id="profileAvatar">
                        <div class="avatar-upload-btn" id="uploadAvatarBtn">
                            <i class="bi bi-camera"></i>
                        </div>
                    </div>
                </div>
                <div class="col-md-8 text-center text-md-start mt-3 mt-md-0">
                    <div class="profile-info">
                        <h3>John Doe</h3>
                        <p>john.doe@example.com</p>
                        <p><i class="bi bi-geo-alt me-1"></i> New York, USA</p>
                        <p><small>Member since: January 2023</small></p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Profile Tabs -->
        <div class="profile-tabs">
            <ul class="nav nav-tabs" id="profileTabs" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="personal-tab" data-bs-toggle="tab" data-bs-target="#personal" type="button" role="tab" aria-controls="personal" aria-selected="true">
                        <i class="bi bi-person me-2"></i>Personal Details
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="address-tab" data-bs-toggle="tab" data-bs-target="#address" type="button" role="tab" aria-controls="address" aria-selected="false">
                        <i class="bi bi-geo me-2"></i>Addresses
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="security-tab" data-bs-toggle="tab" data-bs-target="#security" type="button" role="tab" aria-controls="security" aria-selected="false">
                        <i class="bi bi-shield-lock me-2"></i>Security
                    </button>
                </li>
            </ul>

            <div class="tab-content" id="profileTabsContent">
                <!-- Personal Details Tab -->
                <div class="tab-pane fade show active" id="personal" role="tabpanel" aria-labelledby="personal-tab">
                    <form id="personalDetailsForm">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="firstName" class="form-label">First Name</label>
                                    <input type="text" class="form-control" id="firstName" value="John">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="lastName" class="form-label">Last Name</label>
                                    <input type="text" class="form-control" id="lastName" value="Doe">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email" class="form-label">Email Address</label>
                                    <input type="email" class="form-control" id="email" value="john.doe@example.com" readonly>
                                    <div class="form-text">Email address cannot be changed</div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="phone" class="form-label">Phone Number</label>
                                    <input type="tel" class="form-control" id="phone" value="+1 (123) 456-7890">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="birthDate" class="form-label">Date of Birth</label>
                                    <input type="date" class="form-control" id="birthDate" value="1990-01-15">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Gender</label>
                                    <div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="gender" id="genderMale" value="male" checked>
                                            <label class="form-check-label" for="genderMale">Male</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="gender" id="genderFemale" value="female">
                                            <label class="form-check-label" for="genderFemale">Female</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="gender" id="genderOther" value="other">
                                            <label class="form-check-label" for="genderOther">Other</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="bio" class="form-label">Bio (Optional)</label>
                            <textarea class="form-control" id="bio" rows="3" placeholder="Tell us about yourself...">I'm passionate about eco-friendly products and sustainable living.</textarea>
                        </div>

                        <div class="text-end mt-4">
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-check-circle me-2"></i>Save Changes
                            </button>
                        </div>
                    </form>
                </div>

                <!-- Addresses Tab -->
                <div class="tab-pane fade" id="address" role="tabpanel" aria-labelledby="address-tab">
                    <div class="row mb-4">
                        <div class="col-md-8">
                            <h5>Your Saved Addresses</h5>
                        </div>
                        <div class="col-md-4 text-md-end">
                            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addAddressModal">
                                <i class="bi bi-plus-circle me-2"></i>Add New Address
                            </button>
                        </div>
                    </div>

                    <div class="address-list">
                        <!-- Address 1 -->
                        <div class="address-card">
                            <span class="address-type home">Home</span>
                            <div class="address-actions">
                                <button class="btn btn-sm btn-outline-primary me-1" data-bs-toggle="modal" data-bs-target="#editAddressModal">
                                    <i class="bi bi-pencil"></i>
                                </button>
                                <button class="btn btn-sm btn-outline-danger">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </div>
                            <h6>John Doe</h6>
                            <p class="mb-1">123 Main Street, Apt 4B</p>
                            <p class="mb-1">New York, NY 10001</p>
                            <p class="mb-0">United States</p>
                            <p class="mb-0">Phone: +1 (123) 456-7890</p>
                        </div>

                        <!-- Address 2 -->
                        <div class="address-card">
                            <span class="address-type work">Work</span>
                            <div class="address-actions">
                                <button class="btn btn-sm btn-outline-primary me-1" data-bs-toggle="modal" data-bs-target="#editAddressModal">
                                    <i class="bi bi-pencil"></i>
                                </button>
                                <button class="btn btn-sm btn-outline-danger">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </div>
                            <h6>John Doe</h6>
                            <p class="mb-1">456 Business Ave, Floor 8</p>
                            <p class="mb-1">New York, NY 10022</p>
                            <p class="mb-0">United States</p>
                            <p class="mb-0">Phone: +1 (123) 456-7890</p>
                        </div>
                    </div>
                </div>

                <!-- Security Tab -->
                <div class="tab-pane fade" id="security" role="tabpanel" aria-labelledby="security-tab">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card h-100">
                                <div class="card-header">
                                    <i class="bi bi-key me-2"></i>Change Password
                                </div>
                                <div class="card-body">
                                    <form id="passwordChangeForm">
                                        <div class="form-group">
                                            <label for="currentPassword" class="form-label">Current Password</label>
                                            <div class="input-group">
                                                <input type="password" class="form-control" id="currentPassword" required>
                                                <button class="btn btn-outline-secondary toggle-password" type="button" data-target="currentPassword">
                                                    <i class="bi bi-eye"></i>
                                                </button>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="newPassword" class="form-label">New Password</label>
                                            <div class="input-group">
                                                <input type="password" class="form-control" id="newPassword" required>
                                                <button class="btn btn-outline-secondary toggle-password" type="button" data-target="newPassword">
                                                    <i class="bi bi-eye"></i>
                                                </button>
                                            </div>
                                            <div class="password-strength-meter mt-2">
                                                <div id="passwordStrength"></div>
                                            </div>
                                            <div class="form-text" id="passwordFeedback">Password must be at least 8 characters long</div>
                                        </div>

                                        <div class="form-group">
                                            <label for="confirmPassword" class="form-label">Confirm Password</label>
                                            <div class="input-group">
                                                <input type="password" class="form-control" id="confirmPassword" required>
                                                <button class="btn btn-outline-secondary toggle-password" type="button" data-target="confirmPassword">
                                                    <i class="bi bi-eye"></i>
                                                </button>
                                            </div>
                                            <div class="form-text" id="confirmPasswordFeedback"></div>
                                        </div>

                                        <div class="text-end mt-4">
                                            <button type="submit" class="btn btn-primary">
                                                <i class="bi bi-check-circle me-2"></i>Update Password
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 mt-4 mt-md-0">
                            <div class="card h-100">
                                <div class="card-header">
                                    <i class="bi bi-shield-check me-2"></i>Account Security
                                </div>
                                <div class="card-body">
                                    <div class="mb-4">
                                        <div class="d-flex justify-content-between align-items-center mb-2">
                                            <h6 class="mb-0">Two-Factor Authentication</h6>
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" id="twoFactorToggle">
                                            </div>
                                        </div>
                                        <p class="form-text">Add an extra layer of security to your account by enabling two-factor authentication.</p>
                                    </div>

                                    <div class="mb-4">
                                        <div class="d-flex justify-content-between align-items-center mb-2">
                                            <h6 class="mb-0">Login Notifications</h6>
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" id="loginNotificationToggle" checked>
                                            </div>
                                        </div>
                                        <p class="form-text">Receive email notifications when someone logs into your account.</p>
                                    </div>

                                    <div>
                                        <h6>Recent Login Activity</h6>
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item px-0">
                                                <div class="d-flex justify-content-between">
                                                    <div>
                                                        <i class="bi bi-laptop me-2"></i>
                                                        <span>Windows PC - Chrome</span>
                                                    </div>
                                                    <div class="text-muted">Today, 10:30 AM</div>
                                                </div>
                                                <small class="text-muted">New York, United States</small>
                                            </li>
                                            <li class="list-group-item px-0">
                                                <div class="d-flex justify-content-between">
                                                    <div>
                                                        <i class="bi bi-phone me-2"></i>
                                                        <span>iPhone - Safari</span>
                                                    </div>
                                                    <div class="text-muted">Yesterday, 6:45 PM</div>
                                                </div>
                                                <small class="text-muted">New York, United States</small>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Add/Edit Address Modal -->
    <div class="modal fade" id="addAddressModal" tabindex="-1" aria-labelledby="addAddressModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addAddressModalLabel">Add New Address</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="addressForm">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="addressName" class="form-label">Full Name</label>
                                    <input type="text" class="form-control" id="addressName" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="addressPhone" class="form-label">Phone Number</label>
                                    <input type="tel" class="form-control" id="addressPhone" required>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="addressLine1" class="form-label">Address Line 1</label>
                            <input type="text" class="form-control" id="addressLine1" placeholder="Street address, P.O. box, etc." required>
                        </div>

                        <div class="form-group">
                            <label for="addressLine2" class="form-label">Address Line 2 (Optional)</label>
                            <input type="text" class="form-control" id="addressLine2" placeholder="Apartment, suite, unit, building, floor, etc.">
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="addressCity" class="form-label">City</label>
                                    <input type="text" class="form-control" id="addressCity" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="addressState" class="form-label">State/Province</label>
                                    <input type="text" class="form-control" id="addressState" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="addressZip" class="form-label">Zip/Postal Code</label>
                                    <input type="text" class="form-control" id="addressZip" required>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="addressCountry" class="form-label">Country</label>
                            <select class="form-select" id="addressCountry" required>
                                <option value="">Select Country</option>
                                <option value="US" selected>United States</option>
                                <option value="CA">Canada</option>
                                <option value="UK">United Kingdom</option>
                                <option value="AU">Australia</option>
                                <!-- More countries can be added -->
                            </select>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Address Type</label>
                            <div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="addressType" id="addressTypeHome" value="home" checked>
                                    <label class="form-check-label" for="addressTypeHome">Home</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="addressType" id="addressTypeWork" value="work">
                                    <label class="form-check-label" for="addressTypeWork">Work</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="addressType" id="addressTypeOther" value="other">
                                    <label class="form-check-label" for="addressTypeOther">Other</label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group mt-4">
                            <label class="form-label">Pin Location on Map</label>
                            <div class="map-container">
                                <div id="map"></div>
                            </div>
                            <div class="form-text">Drag the marker to adjust your exact location</div>

                            <input type="hidden" id="addressLatitude" name="latitude">
                            <input type="hidden" id="addressLongitude" name="longitude">
                        </div>

                        <div class="form-check mt-3">
                            <input class="form-check-input" type="checkbox" id="defaultAddress">
                            <label class="form-check-label" for="defaultAddress">
                                Set as default address
                            </label>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" id="saveAddressBtn">Save Address</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Profile Picture Upload/Crop Modal -->
    <div class="modal fade" id="avatarModal" tabindex="-1" aria-labelledby="avatarModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="avatarModalLabel">Update Profile Picture</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="text-center mb-4">
                        <input type="file" class="d-none" id="avatarUpload" accept="image/*">
                        <button class="btn btn-outline-primary" id="selectImageBtn">
                            <i class="bi bi-upload me-2"></i>Select Image
                        </button>
                    </div>

                    <div class="img-container d-none">
                        <img id="avatarImage" src="" alt="Avatar to crop">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary d-none" id="cropImageBtn">Crop & Save</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Success Notification -->
    <div class="notification" id="successNotification">
        <i class="bi bi-check-circle"></i>
        <span id="notificationText">Changes saved successfully!</span>
    </div>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Cropper.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.js"></script>
    <!-- Google Maps API -->
    <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places"></script>

    <script>
        $(document).ready(function() {
            // Initialize variables
            let cropper;
            let map;
            let marker;

            // Initialize Google Map
            function initMap() {
                // Default coordinates (New York City)
                const defaultLocation = {
                    lat: 40.7128,
                    lng: -74.0060
                };

                // Create map centered at default location
                map = new google.maps.Map(document.getElementById("map"), {
                    center: defaultLocation,
                    zoom: 12,
                    mapTypeControl: false,
                    streetViewControl: false,
                    fullscreenControl: false
                });

                // Create draggable marker
                marker = new google.maps.Marker({
                    position: defaultLocation,
                    map: map,
                    draggable: true,
                    animation: google.maps.Animation.DROP
                });

                // Update hidden inputs when marker is dragged
                google.maps.event.addListener(marker, 'dragend', function() {
                    const position = marker.getPosition();
                    $('#addressLatitude').val(position.lat());
                    $('#addressLongitude').val(position.lng());

                    // Reverse geocode to get address
                    const geocoder = new google.maps.Geocoder();
                    geocoder.geocode({
                        'location': position
                    }, function(results, status) {
                        if (status === 'OK' && results[0]) {
                            updateAddressFields(results[0]);
                        }
                    });
                });

                // Search box for location
                const input = document.getElementById('addressLine1');
                const searchBox = new google.maps.places.Autocomplete(input);

                // Update map when a place is selected
                searchBox.addListener('place_changed', function() {
                    const place = searchBox.getPlace();

                    if (!place.geometry) {
                        return;
                    }

                    // Update map and marker
                    map.setCenter(place.geometry.location);
                    marker.setPosition(place.geometry.location);

                    // Update hidden inputs
                    $('#addressLatitude').val(place.geometry.location.lat());
                    $('#addressLongitude').val(place.geometry.location.lng());

                    // Fill address fields
                    updateAddressFields(place);
                });
            }

            // Update address fields from Google Maps result
            function updateAddressFields(place) {
                for (const component of place.address_components) {
                    const componentType = component.types[0];

                    switch (componentType) {
                        case "street_number":
                            // We combine street number and route later
                            break;
                        case "route":
                            $('#addressLine1').val(component.long_name);
                            break;
                        case "locality":
                            $('#addressCity').val(component.long_name);
                            break;
                        case "administrative_area_level_1":
                            $('#addressState').val(component.short_name);
                            break;
                        case "postal_code":
                            $('#addressZip').val(component.short_name);
                            break;
                        case "country":
                            $('#addressCountry').val(component.short_name);
                            break;
                    }
                }
            }

            // Initialize map when the modal opens
            $('#addAddressModal').on('shown.bs.modal', function() {
                initMap();

                // Use geolocation if available
                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(function(position) {
                        const pos = {
                            lat: position.coords.latitude,
                            lng: position.coords.longitude
                        };

                        map.setCenter(pos);
                        marker.setPosition(pos);

                        // Update hidden inputs
                        $('#addressLatitude').val(pos.lat);
                        $('#addressLongitude').val(pos.lng);

                        // Reverse geocode to get address
                        const geocoder = new google.maps.Geocoder();
                        geocoder.geocode({
                            'location': pos
                        }, function(results, status) {
                            if (status === 'OK' && results[0]) {
                                updateAddressFields(results[0]);
                            }
                        });
                    });
                }
            });

            // Open avatar upload modal
            $('#uploadAvatarBtn').click(function() {
                $('#avatarModal').modal('show');
            });

            // Trigger file input when select button is clicked
            $('#selectImageBtn').click(function() {
                $('#avatarUpload').click();
            });

            // Handle file selection
            $('#avatarUpload').change(function() {
                const file = this.files[0];

                if (file) {
                    const reader = new FileReader();

                    reader.onload = function(e) {
                        // Display image in the modal
                        $('#avatarImage').attr('src', e.target.result);
                        $('.img-container').removeClass('d-none');
                        $('#cropImageBtn').removeClass('d-none');
                        $('#selectImageBtn').text('Change Image');

                        // Initialize cropper
                        if (cropper) {
                            cropper.destroy();
                        }

                        cropper = new Cropper(document.getElementById('avatarImage'), {
                            aspectRatio: 1,
                            viewMode: 1,
                            dragMode: 'move',
                            autoCropArea: 0.8,
                            restore: false,
                            guides: true,
                            center: true,
                            highlight: false,
                            cropBoxMovable: true,
                            cropBoxResizable: true,
                            toggleDragModeOnDblclick: false
                        });
                    };

                    reader.readAsDataURL(file);
                }
            });

            // Handle image cropping
            $('#cropImageBtn').click(function() {
                if (cropper) {
                    // Get cropped canvas
                    const canvas = cropper.getCroppedCanvas({
                        width: 300,
                        height: 300
                    });

                    // Convert to data URL
                    const croppedImageUrl = canvas.toDataURL('image/jpeg');

                    // Update profile image
                    $('#profileAvatar').attr('src', croppedImageUrl);

                    // In a real application, you would upload this to your server
                    // using AJAX or form submission

                    // Show success notification
                    showNotification('Profile picture updated successfully!');

                    // Close modal
                    $('#avatarModal').modal('hide');
                }
            });

            // Handle form submissions
            $('#personalDetailsForm').submit(function(e) {
                e.preventDefault();
                // In a real application, you would submit this to your server
                // using AJAX or form submission

                // Show success notification
                showNotification('Personal details updated successfully!');
            });

            $('#passwordChangeForm').submit(function(e) {
                e.preventDefault();

                // Validate password
                const currentPassword = $('#currentPassword').val();
                const newPassword = $('#newPassword').val();
                const confirmPassword = $('#confirmPassword').val();

                // Check if new password and confirm password match
                if (newPassword !== confirmPassword) {
                    $('#confirmPasswordFeedback').text('Passwords do not match').addClass('text-danger');
                    return;
                }

                // In a real application, you would submit this to your server
                // using AJAX or form submission

                // Show success notification
                showNotification('Password updated successfully!');

                // Reset form
                this.reset();
                $('#passwordStrength').css('width', '0');
                $('#passwordFeedback').text('Password must be at least 8 characters long');
                $('#confirmPasswordFeedback').text('');
            });

            // Handle address form submission
            $('#saveAddressBtn').click(function() {
                // In a real application, you would submit this to your server
                // using AJAX or form submission

                // Show success notification
                showNotification('Address saved successfully!');

                // Close modal
                $('#addAddressModal').modal('hide');
            });

            // Password strength meter
            $('#newPassword').on('input', function() {
                const password = $(this).val();
                let strength = 0;
                let feedback = '';

                if (password.length < 8) {
                    feedback = 'Password must be at least 8 characters long';
                } else {
                    // Calculate password strength
                    strength += password.length * 4;
                    strength += (password.match(/[a-z]/) ? 10 : 0);
                    strength += (password.match(/[A-Z]/) ? 10 : 0);
                    strength += (password.match(/[0-9]/) ? 10 : 0);
                    strength += (password.match(/[^a-zA-Z0-9]/) ? 10 : 0);

                    // Cap strength at 100
                    strength = Math.min(100, strength);

                    if (strength < 40) {
                        feedback = 'Weak password. Add uppercase letters, numbers, or symbols.';
                        $('#passwordStrength').removeClass().addClass('strength-weak');
                    } else if (strength < 70) {
                        feedback = 'Medium strength password. Add more variety for better security.';
                        $('#passwordStrength').removeClass().addClass('strength-medium');
                    } else {
                        feedback = 'Strong password. Good job!';
                        $('#passwordStrength').removeClass().addClass('strength-strong');
                    }
                }

                // Update UI
                $('#passwordStrength').css('width', strength + '%');
                $('#passwordFeedback').text(feedback);

                // Check if confirm password matches
                const confirmPassword = $('#confirmPassword').val();
                if (confirmPassword && confirmPassword !== password) {
                    $('#confirmPasswordFeedback').text('Passwords do not match').addClass('text-danger');
                } else if (confirmPassword) {
                    $('#confirmPasswordFeedback').text('Passwords match').removeClass('text-danger').addClass('text-success');
                }
            });

            // Check if confirm password matches
            $('#confirmPassword').on('input', function() {
                const password = $('#newPassword').val();
                const confirmPassword = $(this).val();

                if (confirmPassword !== password) {
                    $('#confirmPasswordFeedback').text('Passwords do not match').addClass('text-danger').removeClass('text-success');
                } else {
                    $('#confirmPasswordFeedback').text('Passwords match').removeClass('text-danger').addClass('text-success');
                }
            });

            // Toggle password visibility
            $('.toggle-password').click(function() {
                const targetId = $(this).data('target');
                const target = $('#' + targetId);
                const icon = $(this).find('i');

                if (target.attr('type') === 'password') {
                    target.attr('type', 'text');
                    icon.removeClass('bi-eye').addClass('bi-eye-slash');
                } else {
                    target.attr('type', 'password');
                    icon.removeClass('bi-eye-slash').addClass('bi-eye');
                }
            });

            // Show notification
            function showNotification(message) {
                $('#notificationText').text(message);
                $('#successNotification').addClass('show');

                setTimeout(function() {
                    $('#successNotification').removeClass('show');
                }, 3000);
            }
        });
    </script>
</body>

</html>