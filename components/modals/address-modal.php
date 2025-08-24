<div class="modal fade" id="saveAddressMdl" tabindex="-1" aria-labelledby="addAddressModalLabel" aria-hidden="true" data-callback="editAddressModalCB">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addAddressModalLabel"><span name="modalHeading">Add</span> Address</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="addressForm" action="profile" class="js-form" on-success="jdRefreshAndHideModal('userAddress','saveAddressMdl')">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="addressLine1" class="form-label">Address Line 1</label>
                        <input type="text" class="form-control" name="street_address" id="addressLine1" placeholder="Street address, P.O. box, etc." required>
                    </div>

                    <div class="form-group">
                        <label for="addressLine2" class="form-label">Address Line 2 (Optional)</label>
                        <input type="text" class="form-control" name="street_number" id="addressLine2" placeholder="Apartment, suite, unit, building, floor, etc.">
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="addressCity" class="form-label">City</label>
                                <input type="text" name="town_city" class="form-control" id="addressCity" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="addressState" class="form-label">State/Province</label>
                                <input type="text" name="state" class="form-control" id="addressState" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="addressZip" class="form-label">Zip/Postal Code</label>
                                <input type="text" name="postal_code" class="form-control" id="addressZip" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="addressCountry" class="form-label">Country</label>
                                <input type="text" name="country" class="form-control" name="country" id="addressCountry">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Address Type</label>
                        <div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="address_type" id="addressTypeHome" value="home" checked>
                                <label class="form-check-label" for="addressTypeHome">Home</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="address_type" id="addressTypeWork" value="work">
                                <label class="form-check-label" for="addressTypeWork">Work</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="address_type" id="addressTypeOther" value="other">
                                <label class="form-check-label" for="addressTypeOther">Other</label>
                            </div>
                        </div>
                    </div>
                    <?php __gcomp('map-selector'); ?>
                    <div class="form-check mt-3">
                        <input class="form-check-input" name="is_default" type="checkbox" id="defaultAddress" value="1">
                        <label class="form-check-label" for="defaultAddress">
                            Set as default address
                        </label>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="text" class="d-none" name="address_uid">
                    <input type="hidden" name="saveUserAddressData" value="true">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary" id="saveAddressBtn">Save Address</button>
                </div>
            </form>
        </div>
    </div>
</div>