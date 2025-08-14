@extends('admin.layouts.master')

@section('content')
 <div class="container-fluid">
     <div class="my-3">
        <a href="{{ route('author#list')}}" class="btn btn-sm btn-dark ">Back</a>
    </div>

    <form action="{{ route('author#update',$author->id)}}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="card shadow p-3">
            <div class="row">
                <div class="col-3">
                    <input type="hidden" name="oldImage">

<input type="hidden" name="id" value="{{ $author->id }}">

                    <img src="{{ asset($author->image == null ? 'admin/img/open-book-icon-free-vector.jpg' : 'author/'.$author->image )}}" alt="" class="img-thumbnail img-profile" id="output" >

                    <input type="file" name="image" src="" alt="" class="form-control @error('image') is-invalid  @enderror" onchange="loadFile(event)">

                    @error('image')
                    <small class="invalid-feedback">{{$message}}</small>
                    @enderror
                </div>


                <div class="col">
                    <div class="row mt-3">
                        <div class="col-2">Name</div>
                        <div class="col">
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Enter name.." id="" value="{{ old('name', $author->name)}}">

                            @error('name')
                            <small class="invalid-feedback">{{$message}}</small>
                            @enderror
                        </div>
                    </div>

                      <div class="row mt-3">
                        <div class="col-2">Biography</div>
                        <div class="col">
                             <textarea type="text" name="biography" class="form-control @error('biography') is-invalid @enderror" id="" placeholder="Enter biography..." >{{old('biography', $author->biography)}}</textarea>
                            @error('biography')
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
