<?php
if (!defined('DIR')) define('DIR', './');
if (!defined('_DIR_')) define('_DIR_', DIR);
require_once _DIR_ . 'includes/inc/database.php';

define('GOOGLE_MAP_API_KEY', 'AIzaSyBOrKDmZxBbAC6YzHOytavSoIJZWaIm6eY');
define('GOOGLE_MAP_URL', 'https://maps.googleapis.com/maps/api/js?key=' . GOOGLE_MAP_API_KEY . '&libraries=places');
