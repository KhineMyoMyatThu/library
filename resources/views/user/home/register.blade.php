@extends('user.layouts.master')

@section('content')
    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">

                    <div class="col-lg-8 offset-2">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                            </div>
                            <form class="user" method="POST" action="{{route('register')}}">
                                @csrf
                                <div class="form-group mb-3">

                                        <input type="text" class="form-control form-control-user" id="exampleFirstName"
                                            placeholder="Enter Name..." name="name" value="{{old('name')}}">
                                            @error('name')                                           <small class="text-danger">{{$message}}</small>
                                            @enderror



                                </div>
                                <div class="form-group mb-3">
                                    <input type="email" class="form-control form-control-user" id="exampleInputEmail"
                                        placeholder="Email Address" name="email" value="{{ old('email')}}">
                                    @error('email')
                                       <small class="text-danger">{{$message}}</small>
                                    @enderror

                                </div>
                                <div class="form-group row mb-3">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" class="form-control form-control-user"
                                            id="exampleInputPassword" placeholder="Password" name="password">

                                            @error('password')
                                       <small class="text-danger">{{$message}}</small>
                                    @enderror
                                    </div>
                                    <div class="col-sm-6 ">
                                        <input type="password" class="form-control form-control-user"
                                            id="exampleRepeatPassword" placeholder="Repeat Password"
                                            name="password_confirmation">

                                    </div>
                                </div>
                                <button type="submit" class="btn btn-dark hover-affect btn-user btn-block">
                                    Register Account
                                </button>
                            </form>
                            <hr>

                            <div class="text-center">
                                <a class="small a-link " href="{{route('login')}}">Already have an account? Login!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection
