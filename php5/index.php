<?php
require_once('includes/appIncludes.php');

$action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$ctlr = filter_input(INPUT_POST, 'ctlr', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
}
if ($ctlr == NULL) {
    $ctlr = filter_input(INPUT_GET, 'ctlr', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
}

switch ($ctlr) {
    case 'product':
        $controller = new ProductController();
        break;

    default:
        $controller = new DefaultController();
}

$controller->run($action);
