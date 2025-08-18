</div>
<?php
array_unshift($JS_FILES, [
    DIR . 'js/navbar.js',
    _DIR_ . 'js/AjaxHandler/index.js'
]);
require_once global_file("footer");
