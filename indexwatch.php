<?php

//die(__DIR__.'/vendor/autoload.php');
require __DIR__ . '/vendor/autoload.php';
use App\Controller;

$dbconnect = new \App\Model\DBConnect();
$controller = new Controller\WatchController();

if (isset($_REQUEST['find'])){
    $controller->search();
}
$page = isset($_REQUEST['page']) ? $_REQUEST['page'] : null;
include_once 'app/View/backend/layouts/header.php';



try {
    switch ($page){
        case 'watch-list':
            $controller->showAllWatch();
            break;
        case 'create-watch':
            $controller->createWatch();
            break;
        case 'delete-watch':
            $controller->deleteWatch();
            break;
        case 'update-watch':
            $controller->updateWatch();
            break;
        default:
            $controller->showAllWatch();
    }
} catch (Exception $exception) {
    echo $exception->getMessage();
}
include_once 'app/View/backend/layouts/footer.php';
