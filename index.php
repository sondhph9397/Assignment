<?php
$url = isset($_GET['url']) ? $_GET['url'] : '/';
require_once './commons/util.php';
require_once './vendor/autoload.php';
require_once './commons/database.php';

use App\Controllers\HomeController;
use App\Controllers\ProductController;
use App\Controllers\CategoryController;
use App\Controllers\UserController;

switch ($url) {
    case '/':
        $ctr = new HomeController();
        $ctr->index();
        break;
    case 'product':
        $ctr = new ProductController();
        $ctr->index();
        break;
    case 'add-product':
        $ctr = new ProductController();
        $ctr->addForm();
        break;
    case 'remove-product':
        $ctr = new ProductController();
        $ctr->delete();
        break;
    case 'edit-product':
        $ctr = new ProductController();
        $ctr->editForm();
        break;
    case 'save-add-product':
        $ctr = new ProductController();
        $ctr->saveAdd();
        break;
    case 'save-edit-product':
        $ctr = new ProductController();
        $ctr->saveEdit();
        break;
        //Categories
    case 'category':
        $ctr = new CategoryController();
        $ctr->index();
        break;
    case 'add-category':
        $ctr = new CategoryController();
        $ctr->addForm();
        break;
    case 'save-add-category':
        $ctr = new CategoryController();
        $ctr->saveAdd();
        break;
    case 'remove-category':
        $ctr = new CategoryController();
        $ctr->delete();
        break;
    case 'edit-category':
        $ctr = new CategoryController();
        $ctr->editForm();
        break;
    case 'save-edit-category':
        $ctr = new CategoryController();
        $ctr->saveEdit();
        break;
        //user
    case 'user':
        $ctr = new UserController();
        $ctr->index();
        break;
    case 'add-user':
        $ctr = new UserController();
        $ctr->addForm();
        break;
    case 'save-add-user':
        $ctr = new UserController();
        $ctr->saveAdd();
        break;
    case 'edit-user':
        $ctr = new UserController();
        $ctr->editForm();
        break;
    case 'save-edit-user':
        $ctr = new UserController();
        $ctr->saveEdit();
        break;
    case 'remove-user':
        $ctr = new UserController();
        $ctr->delete();
        break;
    default:
        echo "Duong dan khong ton tai !!!!!";
        break;
}
