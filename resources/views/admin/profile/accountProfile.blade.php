@extends('admin.layouts.master')

@section('content')

  <div class="container my-5 d-flex justify-content-center">
    <div class="card shadow" style="max-width: 600px; width: 100%;">
      <div class="card-body text-center">

        <!-- Profile Image -->
        <div class="row">
            <div class="col-5">
                <img src="https://i.imgur.com/1Q9Z1Z1.jpg" alt="Profile" class="rounded-circle" width="150" height="150">
                <!-- Profile Name and Edit Button -->
                     <h4 class="mt-3 mb-0">Kanye West</h4>
                    <small class="text-muted">San Francisco, CA</small>
                    <button type="button" class="btn btn-light btn-sm rounded-circle position-absolute bottom-0 end-0" data-bs-toggle="tooltip" title="Update">
                        <i class="bi bi-upload"></i>
                    </button>

                    <div class="mt-2">
                        <button class="btn btn-info btn-sm">EDIT</button>
                    </div>
            </div>
            <div class="col-7">
                <h5 class="mt-3">Profile Information</h5>
                <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                    <!-- Info List -->
                    <div class="row text-start mt-4">
                    <div class="col-6">
                        <div class="text-muted small">Email</div>
                        <div>kanye@aweso.me</div>
                    </div>
                    <div class="col-6">
                        <div class="text-muted small">City</div>
                        <div>San Francisco</div>
                    </div>
                    <div class="col-6 mt-2">
                        <div class="text-muted small">State</div>
                        <div>CA</div>
                    </div>
                    <div class="col-6 mt-2">
                        <div class="text-muted small">Country</div>
                        <div>USA</div>
                    </div>
                    <div class="col-12 mt-2">
                        <div class="text-muted small">Phone</div>
                        <div>+1 (415) 655-17-10</div>
                    </div>
                    </div>
                        </div>
        </div>

      </div>
    </div>
  </div>


@endsection
