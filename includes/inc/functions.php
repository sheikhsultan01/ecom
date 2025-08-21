<?php
function _post_param($key, $default = false)
{
    return isset($_POST[$key]) ? $_POST[$key] : $default;
}

function _get_param($key, $default = false)
{
    return isset($_GET[$key]) ? $_GET[$key] : $default;
}

function error($data = "Something went wrong!", $opt = [])
{
    $return = [
        'status' => 'error',
        'data' => $data
    ];
    if (isset($opt['redirect'])) {
        $return['redirect'] = $opt['redirect'];
    }
    return json_encode($return);
}

function success($data = "Data Saved Successfully!", $opt = [])
{
    $return = [
        'status' => 'success',
        'data' => $data
    ];
    if (isset($opt['redirect'])) {
        $return['redirect'] = $opt['redirect'];
    }
    return json_encode($return);
}

function returnSuccess($data = "Data Saved Successfully!", $opt = [])
{
    echo success($data, $opt);
    exit;
}

function returnError($data, $opt = [])
{
    echo error($data, $opt);
    exit;
}

function REQUEST($type, $key, $opt = [])
{
    $type = strtolower($type);

    switch ($type) {
        case 'post':
            if (isset($_POST[$key])) {
                return $_POST[$key];
            }
            break;

        case 'get':
            if (isset($_GET[$key])) {
                return $_GET[$key];
            }
            break;
    }
    if ($opt !== null && !empty($opt)) {
        return arr_val($opt, 'default');
    }
    returnError($key . ' is required');
}

function _POST($key, $default = false)
{
    return REQUEST('post', $key, $default);
}

function _GET($key, $default = false)
{
    return REQUEST('get', $key) ?? $default;
}

function getRandom($limit = 15)
{
    $characters = array_merge(range('a', 'z'), range('A', 'Z'), range(0, 9));
    shuffle($characters);

    $randomString = '';
    for ($i = 0; $i < $limit; $i++) {
        $randomString .= $characters[array_rand($characters)];
    }

    return $randomString;
}


function upload_image($targetDir, $file)
{
    if (!is_dir($targetDir)) {
        mkdir($targetDir, 0755, true);
    }

    $extension = pathinfo($file['name'], PATHINFO_EXTENSION);

    if (!in_array(strtolower($extension), ALLOWED_IMAGE_EXTENSIONS)) {
        returnError("Invalid file type. Only images are allowed.");
    }

    $randomName = getRandom() . '.' . $extension;
    $targetPath = $targetDir . $randomName;

    if (!move_uploaded_file($file['tmp_name'], $targetPath)) {
        returnError("Image upload failed.");
    }

    return $randomName;
}

function merge_url(...$parts)
{
    $first = rtrim(array_shift($parts), "/\\");
    $middle = array_map(fn ($p) => trim($p, "/\\"), $parts);

    $url = $first . '/' . implode('/', $middle);
    if (!empty($parts) && preg_match('/[\/\\\\]$/', end($parts))) {
        $url .= '/';
    }
    return $url;
}


function arr_val($array, $key, $default = false)
{
    return isset($array[$key]) ? $array[$key] : $default;
}

function global_file($filename)
{
    $filename = rtrim($filename, '.php') . ".php";
    return _DIR_ . "components/global/" . $filename;
}

// Merge url or paths
function merge_path(...$paths)
{
    $url = '';
    foreach ($paths as $path) {
        $path = trim($path);
        $path = trim($path, '/');
        if (strlen($path))
            $url .= "/$path";
    }
    $url = trim($url, '/');
    return $url;
}
// return main site url
function _url(...$paths)
{
    if (count($paths) === 1) {
        if (strpos($paths[0], 'http') === 0)
            return $paths[0];
    }
    $url = SITE_URL;
    foreach ($paths as $path) {
        $url = merge_path($url, $path);
    }
    return $url;
}
// rtrim with whole word
function _rtrim($str, $word)
{
    $str = preg_replace('/(' . $word . ')$/', '', $str);
    return $str;
}
// CSS & JS file
function assets_file($file, $type, $attach_path = null)
{
    if (is_array($file)) {
        // Multiple files
        foreach ($file as $single_file) {
            assets_file($single_file, $type, $attach_path);
        }
        return true;
    }
    // Single file
    if (
        !strstr($file, 'http') &&
        !strstr($file, '//') &&
        !strstr($file, './')
    ) {
        $file = _rtrim($file, ".$type") . ".$type";
        $file .= ASSETS_V;
        $attach_path = is_null($attach_path) ? '' : $attach_path;
        $file = merge_path($attach_path, $file);
    } else if (strstr($file, './')) {
        $file .= ASSETS_V;
    }
    if ($type === 'css') {
        echo "
        <link rel='stylesheet' href='$file'>";
    } elseif ($type === 'js') {
        echo "
            <script src='$file'></script>";
    }
}

// Check if action is already done
function _is($type)
{
    global $db;
    $data = $db->select_one("meta_data", "id", [
        "meta_key" => "sql_scripts",
        "meta_value" => $type
    ]);
    if ($data) return false;
    $db->insert('meta_data', [
        'meta_key' => 'sql_scripts',
        'meta_value' => $type
    ]);
    return true;
}

function skeleton($type, $config)
{
    $html = '';
    if ($type === 'table') {
        $columns = arr_val($config, 'columns', 1);
        $rows = arr_val($config, 'rows', 3);
        for ($i = 0; $i < $rows; $i++) {
            $html .= '<tr>
                    <td colspan="' . $columns . '">
                        <p jd-data></p>
                    </td>
                </tr>';
        }
    }
    return $html;
}

function redirectTo($url)
{
    echo '<script>location.assign("' . $url . '");</script>';
    die();
}

// Check if user login
function login_user($data)
{
    global $db;
    $key = $data['session_key'];
    $user_table = $data['user_table'];
    $user_id = arr_val($_SESSION, $key);
    if (!$user_id)
        return null;
    $user = $db->select_one($user_table, 'id,uid,name,fname,lname,phone,email,is_admin,is_seller', ['id' => $user_id]);
    if (!$user) {
        unset($_SESSION[$key]);
        return null;
    }
    return $user;
}
// Check if is admin
function is_admin()
{
    if (!LOGGED_IN_USER) return false;
    $admin = LOGGED_IN_USER['is_admin'] == 1 ? true : false;
    return $admin;
}
function is_seller()
{
    if (!LOGGED_IN_USER) return false;
    $seller = LOGGED_IN_USER['is_seller'] == 1 ? true : false;
    return $seller;
}
