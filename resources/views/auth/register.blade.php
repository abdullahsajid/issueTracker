@extends('layout.app')
@section('content')
<link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}"/>
<div class="main">
<section class="signup !bg-[#161A1D]">
            <div class=" !bg-[#161A1D]" style="border:1px solid #111;">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title text-white">Sign up</h2>
                        <form action="{{ route('register') }}" method="post" class="register-form" id="register-form">
                            @csrf
                            
                            <div class="form-group">
                                <label for="username" style="position: absolute;left: 0;top: 50%;"><i class="zmdi zmdi-account material-icons-name text-white ml-1"></i></label>
                                <input type="text" name="name" id="username" placeholder="Your Name"style="padding-left:20px;"
                                class="bg-[#22272B] text-white"/>
                                @if($errors->has('name'))
                                    <span class='text-danger'>{{ $errors->first('name') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="useremail" style="position: absolute;left: 0;top: 50%;"><i class="zmdi zmdi-email text-white ml-1"></i></label>
                                <input type="email" name="email" id="useremail" placeholder="Your Email"style="padding-left:20px;"
                                class="bg-[#22272B] text-white"/>
                                @if($errors->has('email'))
                                    <span class="text-danger">{{ $errors->first('email')}}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="userpass" style="position: absolute;left: 0;top: 50%;"><i class="zmdi zmdi-lock text-white ml-1"></i></label>
                                <input type="password" name="password" id="userpass" placeholder="Password"style="padding-left:20px;"
                                class="bg-[#22272B] text-white"/>
                                @if($errors->has('password'))
                                    <span class="text-danger">{{ $errors->first('password') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="re-pass" style="position: absolute;left: 0;top: 50%;"><i class="zmdi zmdi-lock-outline text-white ml-1"></i></label>
                                <input type="password" name="password_confirmation" id="re_pass" placeholder="Repeat your password"style="padding-left:20px;"
                                class="bg-[#22272B] text-white"/>
                                @if($errors->has('password_confirmation'))
                                    <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
                                @endif
                            </div>
                            <!-- <div class="form-group">
                                <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" />
                                <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree all statements in  <a href="#" class="term-service">Terms of service</a></label>
                            </div> -->
                            <div class="form-group form-button">
                                <button type="submit" name="signup" id="signup" class="form-submit !bg-[#111]">Register</button>
                            </div>
                        </form>
                    </div>
                    <div class="signup-image">
                        <figure><img src="images/signup-image.png" alt="sing up image"></figure>
                        <a href="{{route('login')}}" class="signup-image-link text-white">I am already member</a>
                    </div>
                </div>
            </div>
        </section>
</div>
@endsection
