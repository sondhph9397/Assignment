<?php
namespace App\Controllers;
use App\Models\Product;
use App\Models\Category;
use App\Models\User;
class HomeController extends BaseController{
    public function index(){
        $products = Product::all();
        $category = Category::all();
        $users = User::all();
        return $this->render('home.dashboard',
        ['products'=>$products,'categories'=>$category,'users'=>$users]);
    }
}
?>