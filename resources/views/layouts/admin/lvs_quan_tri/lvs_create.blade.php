extends('_layout.admins.master')
@section('title','Them moi admin')
@section('content-body')
    <div class="container">
        <div class="row ">
           <div class="col">
                <form action="{{route('admin-lvs_.createsubmitQT')}}" method="post">
                    @csrf
                    <div class="card">
                        <div class="card-header">
                            <h2>Thêm Mới Admin </h2>
                        </div>
                    </div>
                    <div class="card-body container-fruid">
                        <div class="mb-3 row">
                            <label for="id" class="col-sm-2 col-form-label">id: </label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="id" name="id">
                            </div>
                          </div>
                        <div class="mb-3 row">
                            <label for="lvs_TaiKhoan" class="col-sm-2 col-form-label">Tài Khoản:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="lvs_TaiKhoan" name="lvs_TaiKhoan">
                            </div>
                          </div>
                        <div class="mb-3 row">
                            <label for="lvs_MatKhau" class="col-sm-2 col-form-label">Mật Khẩu:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="lvs_MatKhau" name="lvs_MatKhau">
                            </div>
                          </div>
                          <div class="mb-3 row">
                            <label for="lvs_TrangThai" class="col-sm-2 col-form-label">Trạng Thái:</label>
                            <div class="col-sm-10">
                                <div class="form-check form-check-inline">
                                    <input 
                                        type="radio" 
                                        class="form-check-input" 
                                        id="lvs_TrangThai1" 
                                        name="lvs_TrangThai" 
                                        value="1" 
                                        checked 
                                    />
                                    <label for="lvs_TrangThai1" class="form-check-label">Hiển Thị</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input 
                                        type="radio" 
                                        class="form-check-input" 
                                        id="lvs_TrangThai0" 
                                        name="lvs_TrangThai" 
                                        value="0" 
                                    />
                                    <label for="lvs_TrangThai0" class="form-check-label">Khóa</label>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <div class="card-footer">
                        <button  class="btn btn-success">Ghi Lại </button>
                        <a href="{{route('lvs_-admins-listQT')}}" class="btn btn-success">Quạy lại</a>
                    </div>
                </form>
           </div>
        </div>
    </div>
@endsection