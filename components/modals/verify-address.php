<div class="modal fade" id="mdlVerifyAddress" tabindex="-1" aria-labelledby="verifyAddressModal" aria-hidden="true" data-callback="showAddressCB">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="verifyAddressModal">Confirm Your Address</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="verifyAddressForm" action="order" class="js-form" on-success="jdRefreshAndHideModal('cartItems','mdlVerifyAddress')">
                <div class="modal-body">
                    <div class="user-info mb-3">
                        <h6>Name: <?= LOGGED_IN_USER['name'] ?></h6>
                        <span>Phone: <?= LOGGED_IN_USER['phone'] ?></span>
                    </div>
                    <div class="address-list"></div>
                </div>
                <div class="modal-footer">
                    <input type="text" class="d-none order-total-amount" name="amount">
                    <input type="hidden" name="placeUserOrder" value="true">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary" id="saveAddressBtn">
                        <i class="hgi hgi-stroke hgi-floppy-disk"></i>
                        Confirm & Continue
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>