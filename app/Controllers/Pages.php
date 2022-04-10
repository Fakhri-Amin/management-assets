<?php

namespace App\Controllers;


class Pages extends BaseController
{

    public function index()
    {
        $data = [
            'title' => 'home'
        ];

        return view('index', $data);
    }
}
