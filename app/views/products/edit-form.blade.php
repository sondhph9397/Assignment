@extends('layouts.main')
@section('main-content')
<section class="content">
    <div class="container-fluid">
        <form action=" {{getClientURL('save-edit-product')}}" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-6">
                    <div class="card card-primary">
                        <div class="card-body">
                            <div class="form-group">
                                <input type="text" name="id" hidden id="" value="{{$model->id}}">
                                <label for="">Tên sản phẩm<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="name" value="{{$model->name}}">
                                <label for="" class="error">
                                    {{isset($_GET['nameerr']) ? $_GET['nameerr'] : "" }}</label>
                            </div>
                            <div class="form-group">
                                <label for="">Danh mục<span class="text-danger">*</span></label>
                                <select name="cate_id" id="" class="form-control">
                                    @foreach ($cates as $ca)
                                    <option value="{{$ca->id}}" @if($ca->id==$model->cate_id)
                                        selected
                                        @endif
                                        >{{ $ca->cate_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Ảnh</label>
                                <input type="file" name="image" value="" class="form-control"><img width="200px"
                                    src="{{$model->image}}" alt="">
                            </div>
                            <div class="form-group">
                                <label for="">Giá<span class="text-danger">*</span></label>
                                <input type="number" min="0" class="form-control" value="{{$model->price}}"
                                    name="price">
                            </div>
                            <div class="form-group">
                                <label for="">Sao<span class="text-danger">*</span></label>
                                <input type="number" max="5" min="0" class="form-control" value="{{$model->star}}"
                                    name="star">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card card-primary">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="">Mô tả ngắn<span class="text-danger">*</span></label>
                                <textarea name="short_desc" id="" cols="50" rows="5"
                                    class="form-control">{{$model->short_desc}}</textarea>
                                <label for="" class="error">
                                    {{isset($_GET['descerr']) ? $_GET['descerr'] : "" }}</label>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="">Chi tiết<span class="text-danger">*</span></label>
                                <textarea name="detail" id="" cols="50" rows="5"
                                    class="form-control">{{$model->detail}}</textarea>
                                <label for="" class="error">
                                    {{isset($_GET['detailerr']) ? $_GET['detailerr'] : "" }}</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 d-flex justify-content-start">
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Sửa</button>&nbsp;
                        <a href="{{getClientURL('product')}}" class="btn btn-danger">Hủy</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>
@endsection