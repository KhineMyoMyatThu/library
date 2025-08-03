@extends('admin.layouts.master')

@section('content')
 <div class="container-fluid">
     <div class="">
        <a href="{{ route('profile#account')}}" class="btn btn-sm btn-dark ">Back</a>
    </div>

   <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card shadow">
          <div class="card-body">
            <h3 class="text-center text-primary mb-3">Password Reset</h3>
            <p class="text-center">Enter your new password for your Slack account.</p>

            <form action="{{ route('profile#updatePassword')}}" method="POST">
                @csrf
              <div class="my-2">
                <label for="name">Name</label>
                <input type="text" name="name" id="">
                @error('oldPassword')
                <small class="text-center">{{$message}}</small>
                @enderror
              </div>
              <div class="my-2">
                  <label for="newPassword" class="form-label text-dark">New Password</label>
                <input type="password" class="form-control @error ('newPassword') is-invalid @enderror" name="newPassword" placeholder="Enter new password">
                     @error('newPassword')
                <small class="text-center">{{$message}}</small>
                @enderror


              <div class="my-2">
                  <label for="newPassword" class="form-label text-dark">Confirm Password</label>
                <input type="password" class="form-control @error ('confirmPassword') is-invalid @enderror" name="confirmPassword"  placeholder="Confirm new password">
                     @error('confirmPassword')
                <small class="text-center">{{$message}}</small>
                @enderror
              </div>

              <button type="submit" class="btn btn-dark w-100">Change my password</button>
            </form>

          </div>
        </div>
      </div>
    </div>
 </div>
@endsection
