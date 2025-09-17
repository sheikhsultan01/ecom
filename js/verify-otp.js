// Callback for resend otp
ss.fn.cb.resendOtpCB = function ($form, res) {
    if (res.status == "success") {
        notify(res.data, res.status);
        return true;
    }
    notify(res.data, res.status);
}

$(document).ready(function () {
    let $inputs = $(".otp-input");

    // Handle typing
    $inputs.on("input", function () {
        let $this = $(this);
        let value = $this.val().replace(/\D/g, ""); // only digits

        if (value.length > 1) {
            // If user pasted multiple digits in one box, split them
            distributeValue($this, value);
            return;
        }

        $this.val(value); // keep only 1 digit

        if (value && $this.next(".otp-input").length) {
            $this.next(".otp-input").focus(); // move to next
        }

        updateOtpHidden();
    });

    // Handle backspace navigation
    $inputs.on("keydown", function (e) {
        let $this = $(this);
        if (e.key === "Backspace") {
            if ($this.val() === "" && $this.prev(".otp-input").length) {
                $this.prev(".otp-input").focus().val(""); // clear and move back
            }
        }
    });

    // Handle paste (CTRL+V or right-click paste)
    $inputs.on("paste", function (e) {
        e.preventDefault();
        let pasteData = (e.originalEvent.clipboardData || window.clipboardData).getData("text");
        pasteData = pasteData.replace(/\D/g, ""); // digits only
        if (!pasteData) return;

        distributeValue($(this), pasteData);
    });

    // Function: Distribute digits across inputs
    function distributeValue($startInput, value) {
        let startIndex = $inputs.index($startInput);
        for (let i = 0; i < value.length; i++) {
            if (startIndex + i < $inputs.length) {
                $inputs.eq(startIndex + i).val(value[i]);
            }
        }
        // Focus next empty input
        let nextEmpty = $inputs.filter(function () { return $(this).val() === ""; }).first();
        if (nextEmpty.length) nextEmpty.focus();
        else $inputs.last().focus();

        updateOtpHidden();
    }

    // Update hidden OTP field
    function updateOtpHidden() {
        let otp = "";
        $inputs.each(function () {
            otp += $(this).val();
        });
        $("#otpFull").val(otp);
    }

    // Ensure OTP is updated before submit
    $("#signinForm").on("submit", function () {
        updateOtpHidden();
    });
});
