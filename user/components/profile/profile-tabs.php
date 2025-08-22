<div class="profile-tabs mb-4">
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
            <form action="profile" class="js-form" id="personalDetailsForm" data-callback="updateProfileCB">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="firstName" class="form-label">First Name</label>
                            <input type="text" name="fname" class="form-control" id="firstName" placeholder="First Name..." value="<?= LOGGED_IN_USER['fname'] ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="lastName" class="form-label">Last Name</label>
                            <input type="text" name="lname" class="form-control" id="lastName" placeholder="Last Name..." value="<?= LOGGED_IN_USER['lname'] ?>">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="email" class="form-label">Email Address</label>
                            <input type="email" class="form-control" id="email" value="<?= LOGGED_IN_USER['email'] ?>" readonly>
                            <div class="form-text">Email address cannot be changed</div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="phone" class="form-label">Phone Number</label>
                            <input type="tel" name="phone" class="form-control" id="phone" placeholder="+1 (123) 456-7890" value="<?= LOGGED_IN_USER['phone'] ?>">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="birthDate" class="form-label">Date of Birth</label>
                            <input type="date" name="date_of_birth" class="form-control" id="birthDate" value="<?= LOGGED_IN_USER['date_of_birth'] != null ? LOGGED_IN_USER['date_of_birth'] : '2000-01-01' ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Gender</label>
                            <div>
                                <?php $gender = [
                                    'genderMale' => [
                                        'name' => 'Male',
                                        'value' => 'male'
                                    ],
                                    'genderFemale' => [
                                        'name' => 'Female',
                                        'value' => 'female'
                                    ],
                                    'genderOther' => [
                                        'name' => 'Other',
                                        'value' => 'other'
                                    ]
                                ];
                                foreach ($gender as $key => $value) {
                                    $is_checked = LOGGED_IN_USER['gender'] == $value['value'] ? 'checked' : '';
                                ?>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="gender" id="<?= $key ?>" value="<?= $value['value'] ?>" <?= $is_checked ?>>
                                        <label class="form-check-label" for="<?= $key ?>"><?= $value['name'] ?></label>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="bio" class="form-label">Bio (Optional)</label>
                    <textarea class="form-control" name="bio" id="bio" rows="3" placeholder="Tell us about yourself..."><?= LOGGED_IN_USER['bio'] ?></textarea>
                </div>

                <div class="text-end mt-4">
                    <input type="hidden" name="updateUserProfile" value="true">
                    <input type="hidden" name="uid" value="<?= LOGGED_IN_USER['uid'] ?>">
                    <button type="submit" class="btn btn-primary">
                        <i class="hgi hgi-stroke hgi-checkmark-circle-01 me-2"></i>
                        Save Changes
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
                        <i class="hgi hgi-stroke hgi-add-01 me-2"></i>
                        Add New Address
                    </button>
                </div>
            </div>

            <div class="address-list">
                <!-- Address 1 -->
                <div class="address-card">
                    <span class="address-type home">Home</span>
                    <div class="address-actions">
                        <button class="btn btn-sm btn-outline-primary me-1" data-bs-toggle="modal" data-bs-target="#editAddressModal">
                            <i class="hgi hgi-stroke hgi-pen-01"></i>
                        </button>
                        <button class="btn btn-sm btn-outline-danger">
                            <i class="hgi hgi-stroke hgi-delete-02"></i>
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
                            <i class="hgi hgi-stroke hgi-pen-01"></i>
                        </button>
                        <button class="btn btn-sm btn-outline-danger">
                            <i class="hgi hgi-stroke hgi-delete-02"></i>
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
                                        <button class="btn btn-outline-secondary password-toggle" type="button" data-target="currentPassword">
                                            <i class="hgi-stroke hgi-view" data-target="currentPassword"></i>
                                        </button>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="newPassword" class="form-label">New Password</label>
                                    <div class="input-group">
                                        <input type="password" class="form-control" id="newPassword" required>
                                        <button class="btn btn-outline-secondary password-toggle" type="button" data-target="newPassword">
                                            <i class="hgi-stroke hgi-view" data-target="newPassword"></i>
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
                                        <button class="btn btn-outline-secondary password-toggle" type="button" data-target="confirmPassword">
                                            <i class="hgi-stroke hgi-view" data-target="confirmPassword"></i>
                                        </button>
                                    </div>
                                    <div class="form-text" id="confirmPasswordFeedback"></div>
                                </div>

                                <div class="text-end mt-4">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="hgi hgi-stroke hgi-checkmark-circle-01 me-2"></i>
                                        Update Password
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