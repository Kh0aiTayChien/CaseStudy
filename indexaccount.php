<?php

//die(__DIR__.'/vendor/autoload.php');
require __DIR__ . '/vendor/autoload.php';

use App\Controller;

$dbconnect = new \App\Model\Acc_DBConnect();
$controller = new Controller\AccountController();
$page = isset($_REQUEST['page']) ? $_REQUEST['page'] : null;
include_once 'app/View/backend/layouts/header.php';
try {
    switch ($page){
        case 'account-list':
            $controller->showAllAccount();
            break;
        case 'create-account':
            $controller->createAccount();
            break;
        case 'delete-account':
            $controller->deleteAccount();
            break;
        case 'update-account':
            $controller->updateAccount();
            break;
        default:
            $controller->showAllAccount();
    }
} catch (Exception $exception) {
    echo $exception->getMessage();
}
include_once 'app/View/backend/layouts/footer.php';

