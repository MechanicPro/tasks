<?php

namespace App\Models;

use App\Core\SimpleImage;

class Task
{
    protected $userName;
    protected $userEmail;
    protected $text;
    protected $image;
    protected $status;

    public function __construct($text, $username, $useremail, $status = 0)
    {
        $this->text = $text;
        $this->image = $this->imageProcessing();
        $this->username = $username;
        $this->useremail = $useremail;
        $this->status = $status;
    }

    public function getImage()
    {
        return $this->image;
    }

    public function getText()
    {
        return $this->text;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function getUseremail()
    {
        return $this->useremail;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function imageProcessing()
    {
        $uploaddir = 'public/uploads/';
        $uploadfile = $uploaddir . basename($_FILES['image']['name']);
        $imageFileType = pathinfo($uploadfile, PATHINFO_EXTENSION);

        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif") {
            throw new \Exception("Sorry, only JPG, JPEG, PNG & GIF files are allowed.", 1);
        }

        $image = new SimpleImage();
        $image->load($uploadfile);
        $image->resize(320, 240);
        $image->save($uploadfile);

        return $uploadfile;
    }
}
