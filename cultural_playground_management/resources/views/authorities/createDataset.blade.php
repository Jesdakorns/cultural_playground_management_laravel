@extends('layouts.app')

@section('content')
<div class="content-wrapper">



    <!-- start content name -->
    <div class="page-header">
        <h3 class="page-title">
            <span class="page-title-icon bg-gradient-primary text-white mr-2">
                <i class="mdi mdi-home"></i>
            </span> เพิ่มชุดข้อมูล
        </h3>
    </div>
    <!-- end content name -->

    <!-- start alert submit -->
    @if (session('alertSubmit'))
    <div class="alert alert-{{ session('alertSubmit') }}" role="alert"> {{ session('showAlert') }} </div>
    @endif
    <!-- end alert submit -->
    <!-- start content -->
    <!-- <form id="selectall" name="selectall"  method="post"> -->
    {{ csrf_field() }}
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleSelectGender">เลือกเกม</label>
                        <select class="form-control" id="games" name="games">

                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>

        <div class="card-description">
            <div id="div1"></div>
            <p><code>* หมายเหตุ: กรุณาเลือกข้อมูลให้ครบทั้งหมด 8 ข้อมูล ก่อนทำการบันทึก</code></p>
        </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th> ลำดับ </th>
                                <th> รูปภาพ </th>
                                <th> ชื่อ </th>
                                <th> ดำเนินการ </th>
                            </tr>
                        </thead>
                    </table>
                    <hr />
                    <div class="mt-3">
                        <div class="template-demo">
                            <button type="submit" id="submit_add" class="btn btn-gradient-success btn-fw">บันทึก</button>
                            <button type="reset" class="btn btn-gradient-light btn-fw">ล้างข้อมูลที่เลือก</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- </form> -->


    <!-- end content -->
</div>

@endsection