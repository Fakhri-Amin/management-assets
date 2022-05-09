<?php

namespace App\Controllers;


class Pages extends BaseController
{

    public function index()
    {
        $data = [
            'title' => 'Management Assets | Beranda'
        ];

        return view('index', $data);
    }
}
