@extends('layouts.main')
@section('title-content')
Sản phẩm
@endsection
@section('main-content')
<div class="container">
<table class= table table-striped>
<thead>
<th>mã danh mục</th>
<th>Tên danh mục</th>
<th>Mô tả ngắn</th>
<th>
<a href="{{getClientURL('add-category')}}">Thêm</a>
</th>
</thead>
<tbody>
    @foreach ($categories as $cate)
<tr>
<td>{{$cate->id }}</td>
<td>{{$cate->cate_name}}</td>
<td>{{$cate->desc}}</td>
<td>
<a href="{{getClientURL('edit-category',['id'=>$cate->id])}}">Sửa</a>
</td>
<td>
<a class="btn-remove" href="{{getClientURL('remove-category',['id'=>$cate->id])}}">Xóa</a>
</td>
</tr>
     @endforeach
</tbody>
</table></div>
@endsection