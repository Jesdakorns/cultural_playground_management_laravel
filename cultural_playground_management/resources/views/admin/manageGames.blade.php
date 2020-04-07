@extends('layouts.appadmin')

@section('content')
<div class="content-wrapper">



    <!-- start content name -->
    <div class="page-header">
        <h3 class="page-title">
            <span class="page-title-icon bg-gradient-primary text-white mr-2">
                <i class="mdi mdi-home"></i>
            </span> จัดการเกม
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
                        <button type="submit" id="submit_add" class="btn btn-gradient-info btn-fw" data-toggle="modal" data-target="#exampleModal">เพิ่มเกม</button>
                    </div>
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th> ลำดับ </th>
                                <th> ไอดี </th>
                                <th> ชื่อ </th>
                                <th> ที่อยู่ </th>
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
                <h5 class="modal-title" id="exampleModalLabel">เพิ่มเกม</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

           

                <div class="form-group row">
                    <label for="game_name" class="col-md-4 col-form-label text-md-right">{{ __('ชื่อเกม') }}</label>

                    <div class="col-md-6">
                        <input id="game_name" type="text" class="form-control @error('game_name') is-invalid @enderror" game_name="game_name" value="{{ old('game_name') }}" required autocomplete="game_name" autofocus>

                        @error('game_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="game_address" class="col-md-4 col-form-label text-md-right">{{ __('ที่อยู่เกม') }}</label>

                    <div class="col-md-6">
                        <input id="game_address" type="text" class="form-control @error('game_address') is-invalid @enderror" name="game_address" value="{{ old('game_address') }}" required autocomplete="game_address">

                        @error('game_address')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>


                <hr />
                <button type="submit" id="add_game" class="btn btn-gradient-success mr-2">บันทึก</button>

            </div>
        </div>
    </div>
</div>

<!-- Modal edit -->
<div class="modal fade" id="exampleModalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">แก้ไขเกม</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="form-group row">
                    <label for="edit_game_id" class="col-md-4 col-form-label text-md-right">{{ __('ไอดี') }}</label>

                    <div class="col-md-6">
         
                        <input id="edit_game_id" type="text" class="form-control @error('edit_game_id') is-invalid @enderror" edit_game_id="edit_game_id" value="{{ old('edit_game_id') }}" required autocomplete="edit_game_id" autofocus >

                        @error('edit_game_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="edit_game_name" class="col-md-4 col-form-label text-md-right">{{ __('ชื่อเกม') }}</label>

                    <div class="col-md-6">
                        <input id="edit_game_name" type="text" class="form-control @error('edit_game_name') is-invalid @enderror" edit_game_name="edit_game_name" value="{{ old('edit_game_name') }}" required autocomplete="edit_game_name" autofocus>

                        @error('edit_game_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="edit_game_address" class="col-md-4 col-form-label text-md-right">{{ __('ที่อยู่เกม') }}</label>

                    <div class="col-md-6">
                        <input id="edit_game_address" type="text" class="form-control @error('edit_game_address') is-invalid @enderror" name="edit_game_address" value="{{ old('edit_game_address') }}" required autocomplete="edit_game_address">

                        @error('edit_game_address')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>


                <hr />
                <button type="submit" id="save_edit_game" value="" class="btn btn-gradient-success mr-2">บันทึก</button>

            </div>
        </div>
    </div>
</div>
@endsection