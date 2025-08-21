<?php
$files = [
    'bootstrap.min.css',
    'hugeicons-font/hugeicons-font.css',
    'sweetalert.min.css',
    'custom.css',
    'notify.css',
    DIR . 'css/style.css',
];
assets_file($files, 'css', _DIR_ . "css");
?>
<?php $CSS_FILES = isset($CSS_FILES) ? $CSS_FILES : []; ?>