@extends('admin.layouts.master')

@section('content')
<div class="container-fluid">
    <div class="">
        <h2>Book</h2>
    </div>

    <form action="{{ route('book#store')}}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="card shadow p-3">
            <div class="row">
                {{-- Profile Image Section --}}
                <div class="col-3">
                    <input type="hidden" name="oldImage" value="{{ $book->image ?? '' }}">

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

                {{--book Details Section --}}
                <div class="col">
                    {{-- Title  --}}
                    <div class="row mt-3">
                        <div class="col-2">Title</div>
                        <div class="col">
                            <input type="text"
                                   name="title"
                                   class="form-control @error('title') is-invalid @enderror"
                                   value="{{ old('title', $book->title ?? '') }}">

                            @error('title')
                                <small class="invalid-feedback">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    {{-- Description --}}
                    <div class="row mt-3">
                        <div class="col-2">Description</div>
                        <div class="col">
                            <textarea name="description"
                                      class="form-control @error('description') is-invalid @enderror"
                                      cols="30"
                                      rows="10"
                                      placeholder="Enter description..">{{ old('description', $book->description ?? '') }}</textarea>

                            @error('description')
                                <small class="invalid-feedback">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    {{-- Category --}}
                     <div class="row mt-3">

                        <div class="col-2">Category Name</div>
                        <div class="col">
                                                                <select name="categoryId" id="" class="form-control @error('categoryId') is-invalid @enderror">
                                        <option value="">Choose Category...</option>

                                        @foreach ($categories as $item)
                                            <option value="{{ $item->id }}" @if(old('categoryId') == $item->id) selected @endif>{{ $item->name}}</option>
                                        @endforeach
                                    </select>

                                    @error('categoryId')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                        </div>

                     </div>

                    {{-- Author --}}
                     <div class="row mt-3">

                        <div class="col-2">Author Name</div>
                        <div class="col">
                            <select name="authorId" id="" class="form-control @error('authorId') is-invalid @enderror">
                                <option value="">Choose Author...</option>

                                        @foreach ($authors as $item)
                                            <option value="{{ $item->id }}" @if(old('authorId') == $item->id) selected @endif>{{ $item->name}}</option>
                                        @endforeach
                                    </select>

                                    @error('authorId')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                        </div>

                     </div>



                     {{-- pdf path  --}}
                    <div class="row mt-3">

                        <div class="col-2">Book File</div>
                        <div class="col">
                           <input type="file"
                           name="pdfPath"
                           accept="application/pdf"
                           class="form-control @error('pdfPath') is-invalid @enderror"
                           >

                    @error('pdfPath')
                        <small class="invalid-feedback">{{ $message }}</small>
                    @enderror
                        </div>
                    </div>

                     {{-- release year  --}}
                    <div class="row mt-3">
                        <div class="col-2">Release Year</div>
                        <div class="col">
                            <input type="text"
                                   name="releaseYear"
                                   class="form-control @error('releaseYear') is-invalid @enderror"
                                   value="{{ old('releaseYear', $book->releaseYear ?? '') }}">

                            @error('releaseYear')
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
