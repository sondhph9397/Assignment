<?php

namespace App\Controllers;

use App\Models\Role;
use App\Models\User;

class UserController extends BaseController
{
    function index()
    {
        $users = User::all();
        
        return $this->render('users.index', ['users' => $users]);
    }
    function addForm()
    {   $roles = Role::all();
        return $this->render('users.add-form',['roles'=>$roles]);
    }
    function saveAdd()
    {
        $data = $_POST;
        $model = new User();
        
        // $model->avatar = uploadImage($_FILES['image'], "public/uploads/users");
        //validate
        $file = $_FILES['image'];
        $model->avatar = uploadImage($file, "public/uploads/users");
        $name = $data['name'];
        $email = $data['email'];
        $password = $data['password'];
        $role = $data['role'];

        $nameerr = "";
        $fileerr = "";
        $emailerr = "";
        $passworderr = "";
        $roleerr = "";

        if (strlen($name) < 2 || strlen($name) > 191) {
            $nameerr = "Yêu cầu nhập lại tên";
        }
        $getByName = User::where('name', 'like', $name)->get();
        if ($nameerr == "" && count($getByName) > 0) {
            $nameerr = "Tên đã tồn tại, vui lòng nhập tên khác";
        }
        if (strlen($email) == 0) {
            $emailerr = "Yêu cầu nhập email";
        }
        if ($emailerr == "" && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailerr = "Yêu cầu nhập đúng định dạng email";
        }
        $getByEmail = User::where('email', 'like', $email)->get();
        if ($emailerr == "" && count($getByEmail) > 0) {
            $emailerr = "Email đã tồn tại, vui lòng nhập email khác";
        }
        if (strlen($password) < 6) {
            $passworderr = "Yêu cầu nhập mật khẩu lớn hơn 6 ký tự";
        }
        if(strlen($role) == ""){
            $roleerr = "Nhập quyền";
        }
        if ($nameerr . $fileerr . $emailerr . $passworderr . $roleerr != "") {
            header('location:' . getClientURL('add-user', [
                    'nameerr' => $nameerr,
                    'fileerr' => $fileerr,
                    'emailerr' => $emailerr,
                    'passworderr' => $passworderr,
                    'roleerr' => $roleerr,
                ]));
            die;
        }
        $data['password'] = password_hash($password, PASSWORD_DEFAULT);

        $model->fill($data);
        $model->save();
        header("location: " . getClientURL('user?msg=Thêm thành công'));
    }
    function editForm()
    {
        $id = isset($_GET['id']) ? $_GET['id'] : -1;
        $role = Role::all();
        $model = User::find($id);
        if ($model == null) {
            header("location: " . getClientURL('user'));
        }
        $this->render('users.edit-form', ['model' => $model,'roles'=>$role]);
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
        //validate
        $file = $_FILES['image'];
        $newImage = uploadImage($file, "public/uploads/users");
        $data = $_POST;
        $name = $data['name'];
        $email = $data['email'];

        $nameerr = "";
        $fileerr = "";
        $emailerr = "";

        if (strlen($name) < 2 || strlen($name) > 191) {
            $nameerr = "Yêu cầu nhập lại tên";
        }
        if ($newImage != null) {
            $model->avatar = $newImage;
            if ($fileerr == "" && $file['type'] != "image/jpeg"
                                && $file['type'] != "image/png") {
                $fileerr = "Yêu cầu nhập ảnh đúng định dạng (jpg-jpeg-png)";
            }
        }
        if (strlen($email) == 0) {
            $emailerr = "Yêu cầu nhập email";
        }
        if ($emailerr == "" && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailerr = "Yêu cầu nhập đúng định dạng email";
        }
        if ($nameerr . $emailerr . $fileerr != "") {
            header('location:' . getClientUrl('edit-user', [
                    'id' => $id,
                    'nameerr' => $nameerr,
                    'fileerr' => $fileerr,
                    'emailerr' => $emailerr
                ]));
            die;
        }

        $model->fill($data);
        $model->save();
        header("location: " . getClientURL('user?msg=sửa thành công'));
    }
    function delete()
    {
        $id = isset($_GET['id']) ? $_GET['id'] : -1;
        User::destroy($id);
        header("location: " . getClientURL('user?msg=Xóa thành công'));
    }
}
