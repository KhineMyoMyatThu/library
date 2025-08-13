@extends('admin.layouts.master')

@section('content')
<div class="container-fluid">
    <div class="">
        <h2>Author</h2>
    </div>

    <form action="{{ route('author#store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="card shadow p-3">
            <div class="row">
                {{-- Profile Image Section --}}
                <div class="col-3">
                    <input type="hidden" name="oldImage" value="{{ $author->image ?? '' }}">

                    <img src="{{ asset('admin/img/open-book-icon-free-vector.jpg') }}"
                         alt="Author Image"
                         class="img-thumbnail img-profile"
                         id="output">

                    <input type="file"
                           name="image"
                           class="form-control @error('image') is-invalid @enderror"
                           onchange="loadFile(event)">

                    @error('image')
                        <small class="invalid-feedback">{{ $message }}</small>
                    @enderror
                </div>

                {{-- Author Details Section --}}
                <div class="col">
                    {{-- Name --}}
                    <div class="row mt-3">
                        <div class="col-2">Name</div>
                        <div class="col">
                            <input type="text"
                                   name="name"
                                   class="form-control @error('name') is-invalid @enderror"
                                   value="{{ old('name', $author->name ?? '') }}">

                            @error('name')
                                <small class="invalid-feedback">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    {{-- Biography --}}
                    <div class="row mt-3">
                        <div class="col-2">About</div>
                        <div class="col">
                            <textarea name="biography"
                                      class="form-control @error('biography') is-invalid @enderror"
                                      cols="30"
                                      rows="10"
                                      placeholder="Enter biography..">{{ old('biography', $author->biography ?? '') }}</textarea>

                            @error('biography')
                                <small class="invalid-feedback">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    {{-- Submit --}}
                    <div class="row mt-3">
                        <div class="col-2"></div>
                        <div class="col">
                            <input type="submit" value="Create" class="btn btn-dark text-white">
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </form>
</div>
@endsection
