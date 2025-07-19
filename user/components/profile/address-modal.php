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