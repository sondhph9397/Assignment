<?php

namespace App\Controllers;

use Illuminate\Support\Facades\DB;

use App\Models\Product;
use App\Models\Category;

class ProductController extends BaseController
{
    function index()
    {
        $products = Product::all();
        // $product = DB::table('products')->paginate(15);
        // return view('products.index', ['products' => $product]);
        return $this->render('products.index', ['products' => $products]);

    }
    function addForm()
    {
        $cates = Category::all();
        return $this->render('products.add-form', [
            'cates' => $cates
        ]);
    }
    public function saveAdd()
    {
        $data = $_POST;
        $model = new Product();
        //upload ảnh.
        // $model->image = uploadImage($_FILES['image'], "public/uploads/products");

        //validate
        $name = $data['name'];
        $price = $data['price'];
        $file = $_FILES['image'];
        $model->image = uploadImage($file, "public/uploads/products");
        $star = $data['star'];
        $short_desc = $data['short_desc'];
        $detail = $data['detail'];

        $nameerr = "";
        $fileerr = "";
        $starerr = "";
        $priceerr = "";
        $descerr = "";
        $detailerr = "";

        if (strlen($name) < 2 || strlen($name) > 191) {
            $nameerr = "Yêu cầu nhập tên ít nhất 2 kí tự";
        }
        if (strlen($name) == "") {
            $nameerr = "Yêu cầu nhập tên";
        }
        $getByName = Product::where('name', 'like', $name)->get();
        if ($nameerr == "" && count($getByName) > 0) {
            $nameerr = "Tên đã tồn tại, vui lòng nhập tên khác";
        }
        if(strlen($short_desc) == ""){
            $descerr = "Yêu cầu nhập thông tin";
        }
        if (strlen($file) < 0){
            $fileerr = "Yêu cầu nhập ảnh";
        }
        if (strlen($short_desc) < 2 || strlen($short_desc) > 191) {
            $descerr = "Yêu cầu nhập thông tin ít nhất 2 kí tự";
        }
        if(strlen($star) == ""){
            $starerr = "Yêu cầu đánh giá";
        }
        if(strlen($price)==""){
            $priceerr = "Yêu cầu nhập giá";
        }
        if ($price < 0){
            $priceerr = "xin mời nhập số dương";
        }
        if(strlen($detail)==""){
            $detailerr = "Yêu cầu nhập thông tin";
        }
        if (strlen($detail) < 2 || strlen($detail) > 191) {
            $detailerr = "Yêu cầu nhập thông tin ít nhất 2 kí tự";
        }

        if ($nameerr . $fileerr . $starerr . $priceerr . $descerr . $detailerr  != "") {
            header('location:' . getClientURL('add-product', [
                'nameerr' => $nameerr,
                'fileerr' => $fileerr,
                'starerr' => $starerr,
                'priceerr' => $priceerr,
                'descerr' => $descerr,
                'detailerr' => $detailerr
            ]));
            die;
        }
        $model->fill($data);
        $model->save();
        header("location: " . getClientURL('product?msg=Thêm thành công'));
    }
    function delete()
    {
        // lấy tham số id từ đường dẫn xuống.
        $id = isset($_GET['id']) ? $_GET['id'] : -1;
        // thực hiện xóa sản phẩm dựa vào id
        Product::destroy($id);
        // trở về trang danh sách sản phẩm
        header("location:" . getClientURL('product?msg=xóa thành công'));
    }
    public function editForm()
    {
        $id = isset($_GET['id']) ? $_GET['id'] : -1;
        $cates = Category::all();
        $model = Product::find($id);
        if ($model == null) {
            header('location:' . getClientURL('product'));
        }
        $this->render('products.edit-form', ['cates' => $cates, 'model' => $model]);
    }
    function saveEdit()
    {
        $id = isset($_POST['id']) ? $_POST['id'] : -1;
        $model = Product::find($id);
        if ($model == null) {
            header("location: " . getClientURL('product'));
        }
        $newImage = uploadImage($_FILES['image'], "public/uploads/products");
        if ($newImage != null) {
            $model->image = $newImage;
        }
        $data = $_POST;
        //validate
        $name = $data['name'];
        $short_desc = $data['short_desc'];
        $detail = $data['detail'];

        $nameerr = "";
        $descerr = "";
        $detailerr = "";

        if (strlen($name) < 2 || strlen($name) > 191) {
            $nameerr = "Yêu cầu nhập tên ít nhất 2 kí tự";
        }
        if (strlen($name) == "") {
            $nameerr = "Yêu cầu nhập tên";
        }
        if(strlen($short_desc) == ""){
            $descerr = "Yêu cầu nhập thông tin";
        }
        if(strlen($detail)==""){
            $detailerr = "Yêu cầu nhập thông tin";
        }
        if ($nameerr. $descerr . $detailerr  != "") {
            header('location:' . getClientURL('edit-product', [
                'id' => $id,
                'nameerr' => $nameerr,
                'descerr' => $descerr,
                'detailerr' => $detailerr
            ]));
            die;
        }
        $model->fill($data);
        $model->save();
        header("location: " .  getClientURL('product?msg=Sửa thành công'));
    }
}
