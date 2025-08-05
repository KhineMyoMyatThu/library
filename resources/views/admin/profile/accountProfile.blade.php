@extends('admin.layouts.master')

@section('content')

  <div class="container my-5 d-flex justify-content-center">
    <div class="card shadow" style="max-width: 600px; width: 100%;">
      <div class="card-body text-center">

        <!-- Profile Image -->
        <div class="row">
            <div class="col-5">
                <img src="{{ asset(Auth::user()->profile == null ? 'admin/img/undraw_profile.svg' : 'profile/'.Auth::user()->profile )}}" alt="Profile" class="rounded-circle" width="150" height="150">
                <!-- Profile Name and Edit Button -->
                     <h4 class="mt-3 mb-0">{{Auth::user()->name == null ? Auth::user()->nickname : Auth::user()->name}}</h4>
                    <div class="mt-2">
                        <a href="{{ route('profile#editAccount')}}" class="btn btn-info btn-sm">Edit</a>
                    </div>
            </div>
            <div class="col-7">
                <h5 class="mt-3 text-primary">Profile Information</h5>

                    <!-- Info List -->
                    <div class="row text-start mt-4">
                    <div class="col-6">
                        <div class="text-dark ">Email</div>
                        <div class="text-primary">{{ Auth::user()->email}}</div>
                    </div>
                    <div class="col-6">
                        <div class="text-dark ">Address</div>
                        <div class="text-primary">{{ Auth::user()->address == null ? '---' : Auth::user()->address}}</div>
                    </div>

                    <div class="col-12 mt-2">
                        <div class="text-dark ">Phone</div>
                        <div class="text-primary">{{ Auth::user()->phone == null? '---' :  Auth::user()->phone}}</div>
                    </div>
                    </div>
                    </div>
        </div>

      </div>
    </div>
  </div>


@endsection
