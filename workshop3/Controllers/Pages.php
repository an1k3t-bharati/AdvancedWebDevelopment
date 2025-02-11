<?php

namespace App\Controllers;

class Pages extends BaseController
{
    public function index()
    {
        return view('welcome_message');
    }

    public function view(string $page = 'home')
    {
        if (! is_file(APPPATH . 'Views/Pages/' . $page . '.php')) {
            // Whoops, we don't have a page for that!
            throw new PageNotFoundException($page);
        }

        $data['title'] = ucfirst($page); // Capitalize the first letter

        return view('Templates/header', $data)
            . view('Pages/' . $page)
            . view('Templates/footer');
    }
}