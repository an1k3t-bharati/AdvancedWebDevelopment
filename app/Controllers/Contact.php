<?php

namespace App\Controllers;

use App\Models\ContactModel;

class Contact extends BaseController
{
    public function index()
    {
        return view('pages/contactus');
    }

    public function submit()
    {
        $session = session();
        $model = new ContactModel();

        $name = $this->request->getPost('name');
        $email = $this->request->getPost('email');
        $message = $this->request->getPost('message');

        if ($name && $email && $message) {
            // Save to database
            $model->save([
                'name' => $name,
                'email' => $email,
                'message' => $message,
            ]);

            $session->setFlashdata('success', 'Your message has been sent and saved. Thank you!');
        } else {
            $session->setFlashdata('error', ' Please fill in all fields.');
        }

        return redirect()->to('/contactus');
    }
}
