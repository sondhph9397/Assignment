@extends('layouts.main')
@section('title-content')
Sản phẩm
@endsection
@section('main-content')
<div class="container">
<table class= table table-striped>
<thead>
<th>Ma SP</th>
<th>Tên SP</th>
<th>Ảnh</th>
<th>Danh mục</th>
<th>Giá tiền</th>
<th>
<a href="{{getClientURL('add-product')}}">Thêm</a>
</th>
</thead>
<tbody>
    @foreach ($products as $item)
<tr>
<td>{{$item->id }}</td>
<td>{{$item->name}}</td>
<td><img src="{{BASE_URL. $item->image}}" alt="" width="200px"></td>
<td>{{$item->cate_id}}</td>
<td>{{$item->price}}</td>
<td>
<a href="{{getClientURL('edit-product',['id'=>$item->id])}}">Sửa</a>
</td>
<td>
<a href="{{getClientURL('remove-product',['id'=>$item->id])}}">Xóa</a>
</td>
</tr>
     @endforeach
</tbody>
</table></div>
@endsection