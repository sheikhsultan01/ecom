<!-- Back to Top Button -->
<button class="back-to-top">
    <i class="hgi hgi-stroke hgi-arrow-up-02"></i>
</button>
<?php
@define('INCLUDE_FOOTER', true);
// Footer
if (INCLUDE_FOOTER)
    require_once 'components/footer.php';

array_unshift($JS_FILES, [
    _DIR_ . 'js/navbar.js',
    _DIR_ . 'js/AjaxHandler/index.js'
]);
require_once global_file("footer");
?>