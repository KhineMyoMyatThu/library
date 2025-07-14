@extends('user.layouts.master')


@section('content')

  <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-8 offset-2">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                    </div>
                                    <form class="user" method="POST" action="{{route('login')}}">
                                        @csrf
                                        <div class="form-group mb-3">
                                            <input type="email" class="form-control form-control-user"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="Enter Email Address..." name="email" value="{{ old('email')}}">
                                                @error('email')
                                                    <small class="text-danger">{{$message}}</small>
                                                @enderror

                                        </div>
                                        <div class="form-group mb-3" >
                                            <input type="password" class="form-control form-control-user"
                                                id="exampleInputPassword" placeholder="Password" name="password"
                                                value="">
                                            @error('password')
                                               <small class="text-danger">{{$message}}</small>
                                            @enderror

                                        </div>

                                        <button type="submit" class="btn btn-dark hover-affect btn-user btn-block">
                                            Login
                                        </button>
                                        <hr>
                                        <a href="{{ url('/auth/google/redirect')}}" class="btn btn-google btn-user bg-dark   text-white btn-block">
                                            <i class="fab fa-google fa-fw"></i> Login with Google
                                        </a>
                                        <a href="{{url('/auth/github/redirect')}}" class="btn btn-facebook btn-user bg-dark text-white btn-block">
                                            <i class="fa-brands fa-github fa-fw"></i> Login with Github
                                        </a>
                                    </form>
                                    <hr>

                                    <div class="text-center">
                                        <a class="small a-link" href="{{route('register')}}">Create an Account!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>
@endsection
