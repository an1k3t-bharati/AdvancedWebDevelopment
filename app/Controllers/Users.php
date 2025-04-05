<?php

namespace App\Controllers;

use App\Models\UserModel;

class Users extends BaseController
{
    public function register()
    {
        return view('users/register');
    }

    public function processRegister()
    {
        $session = session();
        $model = new UserModel();

        $firstName = $this->request->getPost('first_name');
        $lastName = $this->request->getPost('last_name');
        $dob = $this->request->getPost('dob');
        $email = $this->request->getPost('email');
        $confirmEmail = $this->request->getPost('confirm_email');
        $password = $this->request->getPost('password');
        $confirmPassword = $this->request->getPost('confirm_password');

        // Validation
        if ($email !== $confirmEmail) {
            $session->setFlashdata('error', 'Emails do not match.');
            return redirect()->to('/user/register');
        }
        if ($password !== $confirmPassword) {
            $session->setFlashdata('error', 'Passwords do not match.');
            return redirect()->to('/user/register');
        }

        if ($model->where('email', $email)->first()) {
            $session->setFlashdata('error', 'Email is already registered.');
            return redirect()->to('/user/register');
        }

    
        $model->save([
            'first_name' => $firstName,
            'last_name' => $lastName,
            'dob' => $dob,
            'email' => $email,
            'password' => password_hash($password, PASSWORD_DEFAULT),
        ]);

        $session->setFlashdata('success', 'Registration successful. Please login.');
        return redirect()->to('/user/login');
    }

    public function login()
    {
        return view('users/login');
    }

    public function processLogin()
    {
        $session = session();
        $model = new UserModel();

        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $user = $model->where('email', $email)->first();

        if ($user && password_verify($password, $user['password'])) {
            // Store user session
            $session->set([
                'user_id' => $user['id'],
                'user_name' => $user['first_name'],
                'isLoggedIn' => true,
            ]);
            return redirect()->to('/');
        } else {
            $session->setFlashdata('error', 'Invalid email or password.');
            return redirect()->to('/user/login');
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/');
    }
}
