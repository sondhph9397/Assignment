@extends('layouts.main')
@section('title-content')
Dashboard
@endsection
@section('main-content')
<div class="content">
    <div class="row">
    <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-primary">
                <div class="inner">
                    <h3>{{count($users)}}</h3>
                    <p>Người dùng</p>
                </div>
                <div class="icon">
                <i class="fas fa-users"></i>
                </div>
                <a href="user" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-primary">
                <div class="inner">
                    <h3>{{count($products)}}</h3>
                    <p>Sản phẩm</p>
                </div>
                <div class="icon">
                <i class="fas fa-box-open"></i>
                </div>
                <a href="product" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{count($categories)}}</h3>
                    <p>Loại sản phẩm</p>
                </div>
                <div class="icon">
                <i class="fas fa-boxes"></i>
                </div>
                <a href="category" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>
</div>
@endsection