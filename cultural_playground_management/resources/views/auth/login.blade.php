@extends('layouts.app')

@section('login')
<div class="container-scroller">
    <div class="page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth">
            <div class="row flex-grow">
                <div class="col-lg- mx-auto">
                    <div class="auth-form-light text-left p-5">
                        <div class="brand-logo text-center">
                           <img src="{{ URL::asset('assets/images/logo.png')}}" alt="logo" />
                        </div>

                        <h6 class="font-weight-light">กรุณาทำการเข้าสู่ระบบ</h6>
                      
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group">
                                <!-- <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus > -->
                                <input type="email" class="form-control form-control-lg  @error('email') is-invalid @enderror" id="email" name="email" placeholder="Email" onChange={this.handleChange} value="{{ old('email') }}" required autocomplete="email" autofocus />
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control form-control-lg" id="password" name="password" placeholder="Password" onChange={this.handleChange} />
                            </div>
                            <div class="mt-3">

                                <button type="submit" class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn">เข้าสู่ระบบ</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>

@endsection