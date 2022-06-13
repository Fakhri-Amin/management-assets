<?php

namespace App\Controllers;

use App\Models\ModelUserType;
use \Myth\Auth\Authorization\GroupModel;

class User_type extends BaseController
{
    protected $userTypeModel, $groupModel, $db, $builder;

    public function __construct()
    {
        $this->userTypeModel = new ModelUserType();
        $this->groupModel = new GroupModel();
        $this->menu = "User Type";
    }

    // menampilkan semua data
    public function index()
    {
        $data = [
            'title' => $this->menu,
            'menu' => $this->menu,
            'datas' => $this->userTypeModel->getData(),
        ];

        return view('user_type/index', $data);
    }

    // edit data
    public function edit($id = 0)
    {
        $data = [
            'title' => 'Form Edit Data ' . $this->menu,
            'menu' => $this->menu,
            'validation' => \Config\Services::validation(),
            'data' => $this->userTypeModel->getData($id),
        ];
        return view('user_type/edit', $data);
    }

    public function update($id = 0)
    {
        $this->userTypeModel->save([
            'id' => $id,
            'description'  => $this->request->getVar('description'),
        ]);

        // lakukan flash data saat data ditambah
        session()->setFlashdata('message', 'Berhasil mengedit data!');
        return redirect()->to('/user_type');
    }

    public function delete($id)
    {
        $this->userTypeModel->delete($id);
        session()->setFlashdata('message', 'Berhasil menghapus data!');
        return redirect()->to('/user_type');
    }
}
