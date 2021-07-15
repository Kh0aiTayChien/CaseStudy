<?php


namespace App\Model;


class AccountModel
{
    private $Acc_DBConnect;

    public function __construct()
    {
        $this->Acc_DBConnect = new Acc_DBConnect();
    }

    //Lấy ra toàn bộ acc
    public function getAll()
    {
        try {
            $sql = "SELECT * FROM `member` ORDER BY `id` DESC";
            $stmt = $this->Acc_DBConnect->connect()->query($sql);
            $stmt->execute();
            return $this->convertAllToObj($stmt->fetchAll());
        } catch (\PDOException $exception) {
            die($exception->getMessage());
        }

    }

    //Lấy ra acc theo id
    public function getById($id)
    {
        try {
            $sql = "SELECT * FROM `member` where `id`= $id";
            $stmt = $this->Acc_DBConnect->connect()->query($sql);
            $stmt->execute();
            return $this->convertToObject($stmt->fetch());
        } catch (\PDOException $exception) {
            die($exception->getMessage());
        }

    }

//    Tạo acc
    public function create($request)
    {
        try {
            $sql = "INSERT INTO `member`(`username`,`password`,) VALUES (?,?)";
            $stmt = $this->Acc_DBConnect->connect()->prepare($sql);
            $stmt->bindParam(1, $request['username']);
            $stmt->bindParam(2, $request['password']);
            $stmt->execute();
        } catch (\PDOException $exception) {
            echo $exception->getMessage();
        }

    }

    //Cập nhật thông tin acc
    public function update($request)
    {
        $account = $this->getById($_REQUEST['id']);

        try {
            $sql = "UPDATE `member` SET `username`=?,`password`=? WHERE `id`=" . $request['id'];
            $stmt = $this->Acc_DBConnect->connect()->prepare($sql);
            $stmt->bindParam(1, $request['username']);
            $stmt->bindParam(2, $request['password']);
            $stmt->execute();
        } catch (\PDOException $exception) {
            echo $exception->getMessage();
        }
    }

    //Xoá account theo id
    public function delete($id)
    {
        $sql = "DELETE FROM `member` WHERE `id` = $id";
        $stmt = $this->Acc_DBConnect->connect()->query($sql);
        $stmt->execute();
    }

    public function convertToObject($data)
    {
        $account = new Account($data['username'] , $data['password']);
        $account->setId($data['id']);

        return $account;
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