<?php


namespace App\Controller;
use App\Model\AccountModel;

class AccountController
{
    protected $accountModel;

    public function __construct()
    {
        $this->accountModel = new AccountModel();
    }

    public function showAllAccount()
    {
        $accounts = $this->accountModel->getAll();
        include_once '../View/backend/account/listaccount.php';
    }

    public function createAccount()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            include_once 'app/View/backend/account/createaccount.php';
        } else {


            $this->accountModel->create($_REQUEST);
            header('location:indexaccount.php');
        }
    }

    public function deleteAccount()
    {
        $id = $_REQUEST['id'];
        $this->accountModel->delete($id);
        header('location:indexaccount.php');
    }


    public function updateAccount()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $id = $_REQUEST['id'];
            $watch= $this->accountModel->getById($id);
            include_once 'app/View/backend/watch/updateaccount.php';
        } else {

            $this->accountModel->update($_REQUEST);
            header('location:indexaccount.php');
        }
    }
}