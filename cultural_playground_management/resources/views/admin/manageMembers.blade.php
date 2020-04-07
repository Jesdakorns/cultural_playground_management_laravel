@extends('layouts.appadmin')

@section('content')
<div class="content-wrapper">



    <!-- start content name -->
    <div class="page-header">
        <h3 class="page-title">
            <span class="page-title-icon bg-gradient-primary text-white mr-2">
                <i class="mdi mdi-home"></i>
            </span> จัดการสมาชิก
        </h3>
    </div>

    <!-- start content -->
    {{ csrf_field() }}

    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="card-description">
                        <div id="div1"></div>
                        <button type="submit" id="submit_add" class="btn btn-gradient-info btn-fw" data-toggle="modal" data-target="#exampleModal">เพิ่มผู้ใช้งาน</button>
                    </div>
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th> ลำดับ </th>
                                <th> รูปภาพ </th>
                                <th> มิวเซียม </th>
                                <th> อีเมล </th>
                                <th> รหัสผ่าน </th>
                                <th> ดำเนินการ </th>
                            </tr>
                        </thead>
                    </table>


                </div>
            </div>
        </div>
    </div>
    <!-- </form> -->

</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">เพิ่มผู้ใช้งาน</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">


                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                    <div class="col-md-6">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                    <div class="col-md-6">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="museum" class="col-md-4 col-form-label text-md-right">{{ __('museum') }}</label>

                    <div class="col-md-6">
                      
                            <select class="form-control" id="museum_code">
                               
                            </select>
                    
                    </div>
                </div>
                <hr />
                <button type="submit" id="add_user" class="btn btn-gradient-success mr-2">บันทึก</button>

            </div>
        </div>
    </div>
</div>

<!-- Modal edit-->
<div class="modal fade" id="exampleModalEditUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">แก้ไขข้อมูลผู้ใช้งาน</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">


                <div class="form-group row">
                    <label for="edit_name" class="col-md-4 col-form-label text-md-right">{{ __('edit_Name') }}</label>

                    <div class="col-md-6">
                        <input id="edit_name" type="text" class="form-control @error('edit_name') is-invalid @enderror" edit_name="edit_name" value="{{ old('edit_name') }}" required autocomplete="edit_name" autofocus>

                        @error('edit_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="edit_email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                    <div class="col-md-6">
                        <input id="edit_email" type="email" class="form-control @error('edit_email') is-invalid @enderror" name="edit_email" value="{{ old('edit_email') }}" required autocomplete="edit_email">

                        @error('edit_email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="edit_password" class="col-md-4 col-form-label text-md-right">{{ __('edit_Password') }}</label>

                    <div class="col-md-6">
                        <input id="edit_password" type="password" class="form-control @error('edit_password') is-invalid @enderror" name="edit_password" required autocomplete="new-edit_password">

                        @error('edit_password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

            
                <div class="form-group row">
                    <label for="museum" class="col-md-4 col-form-label text-md-right">{{ __('museum') }}</label>

                    <div class="col-md-6">
                      
                            <select class="form-control" id="edit_museum_code">
                               
                            </select>
                    
                    </div>
                </div>
                <hr />
                <button type="submit" id="save_edit_user" value=""  class="btn btn-gradient-success mr-2">บันทึก</button>

            </div>
        </div>
    </div>
</div>
@endsection