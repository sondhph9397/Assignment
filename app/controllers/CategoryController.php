<?php
namespace App\Controllers;
use App\Models\Category;

class CategoryController extends BaseController{
    function index(){
        $categories = Category::all();
        return $this->render('categories.index',['categories'=>$categories]);
    }
    function addForm(){
        return $this->render('categories.add-form');
    }
    function saveAdd(){
        $data = $_POST;
        $model = new Category();
        //validate
        $name = $data['cate_name'];
        $desc = $data['desc'];
        $cate_nameerr = "";
        $descerr = "";
        if (strlen($name) == ""){
            $cate_nameerr = "Mời nhập tên loại sản phẩm";
        }
        $getByName = Category::where('cate_name', 'like', $name)->get();
        if ($cate_nameerr == "" && count($getByName) > 0) {
            $cate_nameerr = "Tên đã tồn tại, vui lòng nhập tên khác";
        }
        if (strlen($desc) == ""){
            $descerr = "Mời nhập mô tả";
        }
        if ($cate_nameerr . $descerr != ""){
            header("location: " . getClientURL('add-category',[
                'cate_nameerr'=>$cate_nameerr,
                'descerr'=> $descerr
                ]));
                die;
        }
        $model->fill($data);
        $model->save();
        header("location: " . getClientURL('category?msg=thêm thành công'));
    }
    function delete(){
        $id = isset($_GET['id']) ? $_GET['id'] : -1;
        Category::destroy($id);
        header("location: " . getClientURL('category?msg=xóa thành công'));
    }
    function editForm(){
        $id = isset($_GET['id']) ? $_GET['id'] : -1;
        $model = Category::find($id);
        if($model == null){
            header("location: " . getClientURL('category'));
        }
        $this->render('categories.edit-form',['model'=>$model]);
    }
    function saveEdit(){
        $id = isset($_POST['id']) ? $_POST['id'] : -1;
        $model = Category::find($id);
        if($model == null){
            header("location: " . getClientURL('category'));
        }
        $data = $_POST;
        $name = $data['cate_name'];
        $desc = $data['desc'];
        $cate_nameerr = "";
        $descerr = "";
        if (strlen($name) == ""){
            $cate_nameerr = "Mời nhập tên loại sản phẩm";
        }
        if (strlen($desc) == ""){
            $descerr = "Mời nhập mô tả";
        }
        if ($cate_nameerr . $descerr != ""){
            header("location: " . getClientURL('edit-category',[
                'id'=>$id,
                'cate_nameerr'=>$cate_nameerr,
                'descerr'=> $descerr
                ]));
                die;
        }
        $model->fill($data);
        $model->save();
        header("location: " . getClientURL('category?msg=sửa thành công'));
    }
}
?>
