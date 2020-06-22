@extends('layouts.main')
@section('main-content')
<section class="content">
    <div class="container-fluid">
        <form action=" {{getClientURL('save-add-user')}}" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-6">
                    <div class="card card-primary">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="">Tên Người dùng<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="name">
                                <label for="" class="error">{{isset($_GET['nameerr']) ? $_GET['nameerr'] : ""}}</label>
                            </div>
                            <div class="form-group">
                                <label for="">email<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="email">
                                <label for="" class="error">{{isset($_GET['emailerr']) ? $_GET['emailerr'] : ""}}</label>
                            </div>
                            <div class="form-group">
                                <label for="">Mât khẩu<span class="text-danger">*</span></label>
                                <input type="password" class="form-control" name="password">
                                <label for="" class="error">{{isset($_GET['passworderr']) ? $_GET['passworderr'] : ""}}</label>
                            </div>
                            <div class="form-group">
                                <label for="">Ảnh<span class="text-danger">*</span></label>
                                <input type="file" class="form-control" name="image">
                                <label for="" class="error">{{isset($_GET['fileerr']) ? $_GET['fileerr'] : ""}}</label>
                            </div>
                          
                            <div class="form-group">
                                <label for="">Quyền<span class="text-danger">*</span></label>
                                <select class="form-control" name="role" id="">
                                    <option value="">1</option>
                                    <option value="">2</option>
                                    <option value="">3</option>
                                </select>
                                <label for="" class="error">{{isset($_GET['roleerr']) ? $_GET['roleerr'] : ""}}</label>
                            </div>
                              
                        </div>
                    </div>
                </div>
                <div class="col-md-12 d-flex justify-content-start">
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Tạo</button>&nbsp;
                        <a href="{{getClientURL('user')}}" class="btn btn-danger">Hủy</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>
@endsection