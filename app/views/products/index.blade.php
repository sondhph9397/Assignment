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
<th>Loại sản phẩm</th>
<th>Đánh giá</th>
<th>Giá tiền</th>
<th colspan="2">
<a href="{{getClientURL('add-product')}}">Thêm</a>
</th>
</thead>
<tbody>
    @foreach ($products as $item)
<tr>
<td>{{$item->id }}</td>
<td>{{$item->name}}</td>
<td>{{$item->getCateName->cate_name}}</td>
<td>{{$item->star}} <i class="fas fa-star"></i> </td>
<td>{{$item->price}}</td>
<td>
<a href="{{getClientURL('edit-product',['id'=>$item->id])}}">Sửa</a>
</td>
<td>
<a class="btn-remove" href="{{getClientURL('remove-product',['id'=>$item->id])}}">Xóa</a>
</td>
</tr>
     @endforeach
</tbody>
</table></div>
@endsection