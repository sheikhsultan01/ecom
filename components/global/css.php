<?php
$files = [
    'bootstrap.min.css',
    'hugeicons-font/hugeicons-font.css',
    'sweetalert.min.css',
    "slimselect.min.css",
    'custom.css',
    'notify.css',
];
assets_file($files, 'css', _DIR_ . "css");
assets_file('css/style.css', 'css');
?>
<?php $CSS_FILES = isset($CSS_FILES) ? $CSS_FILES : []; ?>