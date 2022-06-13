<?php

namespace App\Controllers;

use App\Models\ModelUserList;
use \Myth\Auth\Authorization\GroupModel;

class User_list extends BaseController
{
    protected $userListModel, $groupModel, $db, $builder;

    public function __construct()
    {
        $this->userListModel = new ModelUserList();
        $this->groupModel = new GroupModel();
        $this->menu = "User List";
        $this->db = \Config\Database::connect();
        $this->builder = $this->db->table('users', 'auth_groups');
    }

    // menampilkan semua data
    public function index()
    {
        // $users = new \Myth\Auth\Models\UserModel();
        // $this->builder->select('users.id as userid, username, email, name, auth_groups.id as roleid');
        $this->builder->select('users.id as userid, username, email, name, auth_groups.id as roleid');
        $this->builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
        $this->builder->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');
        $query = $this->builder->get();

        $data = [
            'title' => 'Daftar ' . $this->menu,
            'menu' => $this->menu,
            'datas' => $this->userListModel->getData(),
            'users' => $query->getResult()
        ];


        return view('user_list/index', $data);
    }

    // edit data
    public function edit($id = 0)
    {
        $this->builder->select('users.id as userid, username, email, name, auth_groups.name as rolename');
        $this->builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
        $this->builder->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');
        $this->builder->where('users.id', $id);
        $query = $this->builder->get();

        $data = [
            'title' => 'Form Edit Data ' . $this->menu,
            'menu' => $this->menu,
            'validation' => \Config\Services::validation(),
            'data' => $this->userListModel->getData($id),
            // 'users' => $query->getResult(),
            'user' => $query->getRow(),
            'all_users' => $this->groupModel->getAllGroupId()
        ];
        return view('user_list/edit', $data);
    }

    public function update($id = 0)
    {
        $userId = $id;
        // $groupId = $this->request->getVar('role');
        $groupId = $this->request->getVar('role');

        $this->groupModel->removeUserFromAllGroups(intval($userId));

        $this->groupModel->addUserToGroup(intval($userId), intval($groupId));

        $this->userListModel->save([
            'id' => $id,
            'username'  => $this->request->getVar('username'),
            'email'  => $this->request->getVar('email'),
        ]);

        // lakukan flash data saat data ditambah
        session()->setFlashdata('message', 'Berhasil mengedit data!');
        return redirect()->to('/user_list');
    }

    public function delete($id)
    {
        $this->userListModel->delete($id);
        $this->groupModel->removeUserFromAllGroups(intval($id));
        session()->setFlashdata('message', 'Berhasil menghapus data!');
        return redirect()->to('/user_list');
    }
}
