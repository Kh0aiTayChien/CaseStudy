<?php


namespace App\Model;


class Watch
{
        private $id;
        private $watchname;
        private $brand;
        private $price;
        private $urlImage;


    public function __construct($watchname, $brand, $price)
    {
        $this->watchname = $watchname;
        $this->brand = $brand;
        $this->price = $price;
    }


    public function getId()
    {
        return $this->id;
    }


    public function setId($id)
    {
        $this->id = $id;
    }


    public function getwatchname()
    {
        return $this->watchname;
    }


    public function setwatchname($watchname)
    {
        $this->watchname = $watchname;
    }

    public function getbrand()
    {
        return $this->brand;
    }


    public function setbrand($brand)
    {
        $this->brand = $brand;
    }


    public function getprice()
    {
        return $this->price;
    }


    public function setprice($price)
    {
        $this->email = $price;
    }



    public function getUrlImage()
    {
        return $this->urlImage;
    }

    public function setUrlImage($urlImage): void
    {
        $this->urlImage = $urlImage;
    }


}