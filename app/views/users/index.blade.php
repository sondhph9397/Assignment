@extends('layouts.main')
@section('title-content')
Sản phẩm
@endsection
@section('main-content')
<div class="container">
<table class= table table-striped>
<thead>
<th>STT</th>
<th>Tên người dùng</th>
<th>email</th>
<th>Quyền</th>
<th colspan="2">
<a href="{{getClientURL('add-user')}}">Thêm</a>
</th>
</thead>
<tbody>
    @foreach ($users as $us)
<tr>
<td>{{$us->id }}</td>
<td>{{$us->name}}</td>
<td>{{$us->email}}</td>
<td>{{$us->getCateName->name}}</td>
<td>
<a href="{{getClientURL('edit-user',['id'=>$us->id])}}">Sửa</a>
</td>
<td>
<a class="btn-remove" href="{{getClientURL('remove-user',['id'=>$us->id])}}">Xóa</a>
</td>
</tr>
     @endforeach
</tbody>
</table></div>
@endsection