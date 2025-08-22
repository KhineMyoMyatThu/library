@extends('admin.layouts.master')

@section('content')
 <div class="container-fluid">
     <div class="my-3">
        <a href="{{ route('book#list')}}" class="btn btn-sm btn-dark ">Back</a>
    </div>

    <form action="{{ route('book#update',$book->id)}}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="card shadow p-3">
            <div class="row">
                <div class="col-3">
                    <input type="hidden" name="oldImage">
                    <input type="hidden" name="id" value="{{ $book->id }}">

                    <img src="{{ asset($book->image ? 'author/'.$book->image : 'admin/img/open-book-icon-free-vector.jpg') }}" alt="" class="img-thumbnail img-profile" id="output" >

                    <input type="file" name="image" src="" alt="" class="form-control @error('image') is-invalid  @enderror" onchange="loadFile(event)">

                    @error('image')
                    <small class="invalid-feedback">{{$message}}</small>
                    @enderror
                </div>


                <div class="col">
                    <div class="row mt-3">
                        <div class="col-2">Title</div>
                        <div class="col">
                            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" placeholder="Enter title.." id="" value="{{ old('title', $book->title)}}">

                            @error('title')
                            <small class="invalid-feedback">{{$message}}</small>
                            @enderror
                        </div>
                    </div>

                      <div class="row mt-3">
                        <div class="col-2">description</div>
                        <div class="col">
                             <textarea type="text" name="description" class="form-control @error('description') is-invalid @enderror" id="" placeholder="Enter description..." >{{old('description', $book->description)}}</textarea>
                            @error('description')
                            <small class="invalid-feedback">{{$message}}</small>
                            @enderror
                        </div>
                    </div>

                     <div class="row mt-3">
                        <div class="col-2">Category Name</div>
                        <div class="col">
                            <input type="text" name="category_name" class="form-control @error('category_name') is-invalid @enderror" placeholder="Enter category_name.." id="" value="{{ old('category_name', $book->category_name)}}">

                            @error('category_name')
                            <small class="invalid-feedback">{{$message}}</small>
                            @enderror
                        </div>
                    </div>

                     <div class="row mt-3">
                        <div class="col-2">Author Name</div>
                        <div class="col">
                            <input type="text" name="author_name" class="form-control @error('author_name') is-invalid @enderror" placeholder="Enter author_name.." id="" value="{{ old('author_name', $book->author_name)}}">

                            @error('author_name')
                            <small class="invalid-feedback">{{$message}}</small>
                            @enderror
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-2">Book File</div>
                        <div class="col">
                           <input type="file"
                           name="pdfPath"
                           accept="application/pdf"
                           class="form-control @error('pdfPath') is-invalid @enderror"
                           value="{{ old('pdfPath', $book->pdf_path) }}"
                           >

                    @error('pdfPath')
                        <small class="invalid-feedback">{{ $message }}</small>
                    @enderror
                        </div>
                    </div>


                     <div class="row mt-3">
                        <div class="col-2">Release Year</div>
                        <div class="col">
                            <input type="text" name="releaseYear" class="form-control @error('releaseYear') is-invalid @enderror" placeholder="Enter releaseYear.." id="" value="{{ old('releaseYear', $book->release_year)}}">

                            @error('releaseYear')
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
