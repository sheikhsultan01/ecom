<?php
// Error Reporting
mysqli_report(MYSQLI_REPORT_ERROR & ~MYSQLI_REPORT_STRICT);
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(ENV == 'local' ? 1 : 0);

// Assets
$CSS_FILES = [];
$JS_FILES = [];
define('ASSETS_V', "?v=" . (ENV === 'prod' ? '1.0.0' : time()));
define('ALLOWED_IMAGE_EXTENSIONS', ['jpg', 'jpeg', 'png', 'gif', 'webp']);
define('CURRENCY', '$');
