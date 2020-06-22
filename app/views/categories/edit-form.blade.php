@extends('layouts.main')
@section('main-content')
<section class="content">
    <div class="container-fluid">
        <form action=" {{getClientURL('save-edit-category')}}" method="post" enctype="multipart/form-data">
        <input type="text" hidden name="id" id="" value="{{$model->id}}">
            <div class="row">
                <div class="col-md-6">
                    <div class="card card-primary">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="">Tên danh mục<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="cate_name" value="{{$model->cate_name}}">
                            </div>
                              <div class="form-group">
                                <label for="">Mô tả ngắn<span class="text-danger">*</span></label>
                                <textarea name="desc" id="" cols="50" rows="5" class="form-control">{{$model->desc}}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 d-flex justify-content-start">
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Sửa</button>&nbsp;
                        <a href="{{getClientURL('category')}}" class="btn btn-danger">Hủy</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>
@endsection