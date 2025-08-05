@extends('admin.layouts.master')

@section('content')
 <div class="container-fluid">
     <div class="my-3">
        <a href="{{ route('profile#account')}}" class="btn btn-sm btn-dark ">Back</a>
    </div>

    <form action="{{ route('profile#updateAccount')}}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="card shadow p-3">
            <div class="row">
                <div class="col-3">
                    <input type="hidden" name="oldImage">

                    <img src="{{ asset('admin/img/undraw_profile.svg')}}" alt="" class="img-thumbnail img-profile" id="output" >
                    <input type="file" name="image" src="" alt="" class="form-control @error('image') is-invalid  @enderror">

                    @error('image')
                    <small class="invalid-feedback">{{$message}}</small>
                    @enderror
                </div>


                <div class="col">
                    <div class="row mt-3">
                        <div class="col-2">Name</div>
                        <div class="col">
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Enter name.." id="" value="{{ old('name', Auth::user()->name)}}">

                            @error('name')
                            <small class="invalid-feedback">{{$message}}</small>
                            @enderror
                        </div>
                    </div>

                      <div class="row mt-3">
                        <div class="col-2">Email</div>
                        <div class="col">
                             <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" id="" placeholder="Enter Email..." value="{{old('email', Auth::user()->email)}}">
                            @error('email')
                            <small class="invalid-feedback">{{$message}}</small>
                            @enderror
                        </div>
                    </div>

                      <div class="row mt-3">
                        <div class="col-2">Phone</div>
                        <div class="col">
                            <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" placeholder="Enter phone.." id="" value="{{old('phone', Auth::user()->phone)}}">
                            @error('phone')
                            <small class="invalid-feedback">{{$message}}</small>
                            @enderror
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-2">Address</div>
                        <div class="col">
                            <input type="text" name="address" class="form-control @error('address') is-invalid @enderror" id="" placeholder="Enter Address.." value="{{old('address', Auth::user()->address)}}">

                            @error('address')
                            <small class="invalid-feedback">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-2"></div>
                        <div class="col">
                          <input type="submit" value="Update" class="btn btn-dark text-white">
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </form>
 </div>
@endsection
