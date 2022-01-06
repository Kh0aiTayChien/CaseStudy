<?php


namespace App\Model;

class WatchModel //CRUD with Database
{
    private $dbConnect;

    public function __construct()
    {
        $this->dbConnect = new DBConnect();
    }

    public function searchData($search)
    {
        try {
            $sql  = "SELECT * FROM `watchs` WHERE `watch_name` LIKE "."'%".$search."%"."'; ";
//            $sql="SELECT * From `products` WHERE `name` LIKE $search";
            $stmt = $this->dbConnect->connect()->query($sql);
            $stmt->execute();
            return $this->convertAllToObj($stmt->fetchAll());
        }catch (\PDOException $exception){
            die($exception->getMessage());
        }


    }
    //Lấy ra toàn bộ Watch
    public function getAll()
    {
        try {
            $sql = "SELECT * FROM `watchs` ORDER BY `id` DESC";
            $stmt = $this->dbConnect->connect()->query($sql);
            $stmt->execute();
            return $this->convertAllToObj($stmt->fetchAll());
        } catch (\PDOException $exception) {
            die($exception->getMessage());
        }

    }
    public function getOne($id)
    {
        try {
            $sql = "SELECT * FROM `watchs` WHERE `id` = $id";
            $stmt = $this->dbConnect->connect()->query($sql);
            $stmt->execute();
            return $this->convertAllToObj($stmt->fetchAll());
        } catch (\PDOException $exception) {
            die($exception->getMessage());
        }

    }

    //Lấy ra Watch theo id
    public function getById($id)
    {
        try {
            $sql = "SELECT * FROM `watchs` where `id`= $id";
            $stmt = $this->dbConnect->connect()->query($sql);
            $stmt->execute();
            return $this->convertToObject($stmt->fetch());
        } catch (\PDOException $exception) {
            die($exception->getMessage());
        }

    }

    //Tạo Watch
    public function create($request)
    {
//        var_dump($_FILES['fileToUpload']['name']);
//        die();
        $url = 'uploads/'.$_FILES['fileToUpload']['name'];
        try {
            $sql = "INSERT INTO `watchs`(`watch_name`,`brand`,`price`,`image`,`brand_id`) VALUES (?,?,?,?,?)";
            $stmt = $this->dbConnect->connect()->prepare($sql);
            $stmt->bindParam(1, $request['watch_name']);
            $stmt->bindParam(2, $request['brand']);
            $stmt->bindParam(3, $request['price']);
            $stmt->bindParam(4, $url);
            $stmt->bindParam(5, $request['brand_id']);
            $stmt->execute();
        } catch (\PDOException $exception) {
            echo $exception->getMessage();
        }

    }

    //Cập nhật thông tin Watch
    public function update($request)
    {
        $watch = $this->getById($_REQUEST['id']);
//        var_dump($_FILES['fileToUpload']['name']);
//        die();
        if ($_FILES['fileToUpload']['name'] == '') {
            $url = $watch->getUrlImage();
        } else {
            $url = 'uploads/'.$_FILES['fileToUpload']['name'];
        }

        try {
            $sql = "UPDATE `watchs` SET `watch_name`=?,`brand`=?,`price`=?,`image`=?,`brand_id`=? WHERE `id`=" . $request['id'];
            $stmt = $this->dbConnect->connect()->prepare($sql);
            $stmt->bindParam(1, $request['watch_name']);
            $stmt->bindParam(2, $request['brand']);
            $stmt->bindParam(3, $request['price']);
            $stmt->bindParam(4, $url);
            $stmt->bindParam(5, $request['brand_id']);
            $stmt->execute();
        } catch (\PDOException $exception) {
            echo $exception->getMessage();
        }
    }

    //Xoá Watch theo id
    public function delete($id)
    {
        $sql = "DELETE FROM `watchs` WHERE `id` = $id";
        $stmt = $this->dbConnect->connect()->query($sql);
        $stmt->execute();
    }

    public function convertToObject($data)
    {
        $watch = new Watch($data['watch_name'], $data['brand'], $data['price'], $data['brand_id']);
        $watch->setId($data['id']);
        if ($data['image'] == null) {
            $watch->setUrlImage('uploads/default/default-avatar.jpeg');
        } else {
            $watch->setUrlImage($data['image']);
        }
        return $watch;
    }

    public function convertAllToObj($data)
    {
        $objs = [];
        foreach ($data as $item) {
            $objs[] = $this->convertToObject($item);
        }
        return $objs;
    }
}