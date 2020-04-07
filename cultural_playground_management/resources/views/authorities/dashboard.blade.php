@extends('layouts.app')

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
    <!-- end content name -->
    <!-- start content -->
    <div class="row">
        <div class="col-md-4 stretch-card grid-margin">
            <div class="card bg-gradient-danger card-img-holder text-white">
                <div class="card-body remake">
                    <img src="{{ asset('assets/images/dashboard/circle.svg')}}" class="card-img-absolute" alt="circle-image" />
                    <h3 class="font-weight-normal mb-3">
                        จำนวนข้อมูล
                    </h3>
                    <h1 class="mb-5" id="item_count">0</h1>
                </div>
            </div>
        </div>

        <div class="col-md-4 stretch-card grid-margin">
            <div class="card bg-gradient-info card-img-holder text-white">
                <div class="card-body remake">
                    <img src="{{ asset('assets/images/dashboard/circle.svg')}}" class="card-img-absolute" alt="circle-image" />
                    <h3 class="font-weight-normal mb-3">Matching Game</h3>
                    <h1 class="mb-5" id="matching_count">0</h1>
                </div>
            </div>
        </div>
        <div class="col-md-4 stretch-card grid-margin">
            <div class="card bg-gradient-success card-img-holder text-white">
                <div class="card-body remake">
                    <img src="{{ asset('assets/images/dashboard/circle.svg')}}" class="card-img-absolute" alt="circle-image" />
                    <h3 class="font-weight-normal mb-3">Puzzle Game</h3>
                    <h1 class="mb-5" id="puzzle_count">0</h1>
                </div>
            </div>
        </div>
        <div class="col-md-4 stretch-card grid-margin">
            <div class="card bg-gradient-warning card-img-holder text-white">
                <div class="card-body remake">
                    <img src="{{ asset('assets/images/dashboard/circle.svg')}}" class="card-img-absolute" alt="circle-image" />
                    <h3 class="font-weight-normal mb-3">Quiz Game</h3>
                    <h1 class="mb-5" id="quiz_count">0</h1>
                </div>
            </div>
        </div>
        <div class="col-md-4 stretch-card grid-margin">
            <div class="card bg-gradient-primary card-img-holder text-white">
                <div class="card-body remake">
                    <img src="{{ asset('assets/images/dashboard/circle.svg')}}" class="card-img-absolute" alt="circle-image" />
                    <h3 class="font-weight-normal mb-3">Mole Game</h3>
                    <h1 class="mb-5" id="mole_count">0</h1>
                </div>
            </div>
        </div>
        <div class="col-md-4 stretch-card grid-margin">
            <div class="card bg-gradient-dark card-img-holder text-white">
                <div class="card-body remake">
                    <img src="{{ asset('assets/images/dashboard/circle.svg')}}" class="card-img-absolute" alt="circle-image" />
                    <h3 class="font-weight-normal mb-3">Cosmos Game</h3>
                    <h1 class="mb-5" id="cosmos_count">0</h1>
                </div>
            </div>
        </div>
    </div>
    <!-- end content -->
</div>
@endsection