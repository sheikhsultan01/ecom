<!-- Back to Top Button -->
<button class="back-to-top">
    <i class="hgi hgi-stroke hgi-arrow-up-02"></i>
</button>
<?php
@define('INCLUDE_FOOTER', true);
// Footer
if (INCLUDE_FOOTER)
    require_once 'components/footer.php';
require_once global_file("footer");
?>