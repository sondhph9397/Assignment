<?php

namespace App\Controllers;

use App\Models\User;

class UserController extends BaseController
{
    function index()
    {
        $users = User::all();
        return $this->render('users.index', ['users' => $users]);
    }
    function addForm()
    {
        return $this->render('users.add-form');
    }
    function saveAdd()
    {
        $data = $_POST;
        $model = new User();
        $model->avatar = uploadImage($_FILES['image'], "public/uploads/users");
        $model->fill($data);
        $model->save();
        header("location: " . getClientURL('user'));
    }
    function editForm()
    {
        $id = isset($_GET['id']) ? $_GET['id'] : -1;
        $model = User::find($id);
        if ($model == null) {
            header("location: " . getClientURL('user'));
        }
        $this->render('users.edit-form', ['model' => $model]);
    }
    function saveEdit()
    {
        $id = isset($_POST['id']) ? $_POST['id'] : -1;
        $model = User::find($id);
        if ($model == null) {
            header("location: " . getClientURL('user'));
        }
        $newImage = uploadImage($_FILES['image'], "public/uploads/users");
        if ($newImage != null) {
            $model->avatar = $newImage;
        }
        $data = $_POST;
        $model->fill($data);
        $model->save();
        header("location: " . getClientURL('user'));
    }
    function delete()
    {
        $id = isset($_GET['id']) ? $_GET['id'] : -1;
        User::destroy($id);
        header("location: " . getClientURL('user'));
    }
}
