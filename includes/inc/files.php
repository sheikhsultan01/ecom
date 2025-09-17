<?php
// Attach .php extension if not exists
function attach_php_extension(&$path)
{
    if (pathinfo($path, PATHINFO_EXTENSION) !== 'php') {
        $path .= '.php';
    }
}
// Require component file
function include_file($path, $props = [], $children = null)
{
    extract($props);
    if ($children) {
        if ($children instanceof Closure) {
            ob_start();
            $children();
            $childrenContent = ob_get_clean();
        } else {
            $childrenContent = $children;
        }
    }
    attach_php_extension($path);
    include $path;
}
// component file
function _comp($file, $props = [], $children = null)
{
    include_file(DIR . 'components/' . $file, $props, $children);
}
// Main component file
function __comp($file, $props = [], $children = null)
{
    include_file(_DIR_ . 'components/' . $file, $props, $children);
}
// global component file
function __gcomp($file, $props = [], $children = null)
{
    include_file(_DIR_ . 'components/global/' . $file, $props, $children);
}
// Functions file
function __fn($file)
{
    attach_php_extension($file);
    require_once(_DIR_ . 'includes/Functions/' . $file);
}
