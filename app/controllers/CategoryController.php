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
        $model->fill($data);
        $model->save();
        header("location: " . getClientURL('category'));
    }
    function delete(){
        $id = isset($_GET['id']) ? $_GET['id'] : -1;
        Category::destroy($id);
        header("location: " . getClientURL('category'));
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
        $model->fill($data);
        $model->save();
        header("location: " . getClientURL('category'));
    }
}
?>
