<?php


namespace App\Controller;

use App\Model\WatchModel;

class WatchController
{
    protected $watchModel;

    public function __construct()
    {
        $this->watchModel = new WatchModel();
    }

    public function showAllWatch()
    {
        $watchs = $this->watchModel->getAll();
        include_once 'app/View/backend/watch/list.php';
    }

    public function createWatch()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            include_once 'app/View/backend/watch/create.php';
        } else {
//            var_dump(basename($_FILES["fileToUpload"]["name"]));
//          die();
            $this->uploadImage();
            $this->watchModel->create($_REQUEST);
            header('location:indexwatch.php');
        }
    }

    public function deleteWatch()
    {
        $id = $_REQUEST['id'];
        $this->watchModel->delete($id);
        header('location:indexwatch.php');
    }
    public function seeWatch()
    {
        $watchs = $this->watchModel->getAll();
        include_once 'app/View/backend/watch/showlist.php';
    }
    public function seeWatchdetail()
    {
        $watchs = $this->watchModel->getOne();
        include_once 'app/View/backend/watch/orderdetail.php';
    }
    public function updateWatch()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $id = $_REQUEST['id'];
            $watch= $this->watchModel->getById($id);
            include_once 'app/View/backend/watch/update.php';
        } else {
//            var_dump($_REQUEST['fileToUpload']);
//            die();
            if($_REQUEST['fileToUpload'] !== ''){
                $this->uploadImage();
            }
            $this->watchModel->update($_REQUEST);
            header('location:indexwatch.php');
        }
    }

    public function uploadImage()
    {
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
        if (isset($_POST["submit"])) {
            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
            if ($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                echo "File is not an image.";
                $uploadOk = 0;
            }
        }

// Check if file already exists
        if (file_exists($target_file)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
        }

// Check file size
//        if ($_FILES["fileToUpload"]["size"] > 500000) {
//            echo "Sorry, your file is too large.";
//            $uploadOk = 0;
//        }

// Allow certain file formats
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif") {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }

// Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                echo "The file " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " has been uploaded.";
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    }
    public function search()
    {
        $search = $_REQUEST['search'];
        $watchs = $this->watchModel->searchData($search);
        include_once "../View/backend/layouts/header.php" ;

    }
}