@extends('layout.app')
@section('content')
<link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}"/>
<div class="main">
<section class="sign-in !bg-[#161A1D]">
            <div class=" !bg-[#161A1D] !p-0 !m-0" style="border:1px solid #111;">
                <div class="signin-content">
                    <div class="signin-image">
                        <figure><img src="{{asset('images/signin-image.png')}}" alt="sing up image"></figure>
                        <a href="#" class="signup-image-link text-white">Create an account</a>
                    </div>

                    <div class="signin-form">
                        <h2 class="form-title text-white">Sign in</h2>
                        <form action="{{route('login')}}" method="post" class="register-form" id="login-form">
                            @csrf
                            <div class="form-group">
                                <label for="your_name" style="position: absolute;left: 0;top: 50%;"><i class="zmdi zmdi-account material-icons-name text-white ml-1"></i></label>
                                <input type="email" name="email" id="your_name" placeholder="Your Name" class="bg-[#22272B] text-white"
                                style="padding-left:20px;"/>
                                @if($errors->has('email'))
                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="your_pass" style="position: absolute;left: 0;top: 50%;"><i class="zmdi zmdi-lock text-white ml-1"></i></label>
                                <input type="password" name="password" id="your_pass" placeholder="Password"class="bg-[#22272B] text-white"
                                 style="padding-left:20px;"/>
                                @if($errors->has('password'))
                                    <span class="text-danger">{{ $errors->first('password')}}</span>
                                @endif
                            </div>
                            
                            <div class="form-group form-button">
                                <button type="submit" name="signin" id="signin" class="form-submit !bg-[#111]">Log in</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
</section>
</div>
@endsection
