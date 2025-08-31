<?php
// Get current url
function get_current_url()
{
    $url = "http";
    if (isset($_SERVER["HTTPS"]) && $_SERVER["HTTPS"] == "on") {
        $url .= "s";
    }
    $url .= "://";
    $url .= $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"];
    return $url;
}

// Get slug from url 
function extract_slug_from_URL($url)
{
    $urlParts = parse_url($url);
    $path = $urlParts['path'];
    $path = trim($path, '/');
    $slug = basename($path);

    return $slug;
}

// Get uid from slug 
function extract_id_from_slug($slug)
{
    $slug = trim($slug, '-');
    $slugParts = explode('-', $slug);
    $id = end($slugParts);
    return $id;
}

// Page Url
function page_url($page)
{
    return merge_url(SITE_URL, $page);
}
