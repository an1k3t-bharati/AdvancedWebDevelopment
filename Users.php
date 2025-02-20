<?php
namespace App\Controllers;
class Users extends BaseController{
    public function login(){
        return view('users/login.php');
    }

    public function logout(){
        return view('users/logout.php');
    }
}