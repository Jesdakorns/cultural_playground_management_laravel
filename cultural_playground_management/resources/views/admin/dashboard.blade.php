@extends('layouts.appadmin')

@section('content')
<div class="content-wrapper">



    <!-- start content name -->
    <div class="page-header">
        <h3 class="page-title">
            <span class="page-title-icon bg-gradient-primary text-white mr-2">
                <i class="mdi mdi-home"></i>
            </span> หน้าหลัก
        </h3>
    </div>


    <div class="row">


        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                <div class="card-description">
                <h4 class="card-title">รายชื่อผู้ใช้งาน</h4>
                    </div>
              <hr>
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th> ลำดับ </th>
                                <th> รูปภาพ </th>
                                <th> ชื่อ </th>
                                <th> อีเมล </th>
                                <th> รหัสผ่าน </th>
                            </tr>
                        </thead>
                    </table>


                </div>
            </div>
        </div>


      
    </div>

</div>
@endsection