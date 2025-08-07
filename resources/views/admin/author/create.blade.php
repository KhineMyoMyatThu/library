@extends('admin.layouts.master')

@section('content')
 <div class="container-fluid">
    <div class="">
        <h2>Author</h2>
    </div>
      <form action="{{ route('profile#updateAccount')}}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="card shadow p-3">
            <div class="row">
                <div class="col-3">
                    <input type="hidden" name="oldImage">

                    <img src="{{ asset('admin/img/open-book-icon-free-vector.jpg' )}}" alt="" class="img-thumbnail img-profile" id="output" >

                    <input type="file" name="image" src="" alt="" class="form-control @error('image') is-invalid  @enderror" onchange="loadFile(event)">

                    @error('image')
                    <small class="invalid-feedback">{{$message}}</small>
                    @enderror
                </div>


                <div class="col">
                    <div class="row mt-3">
                        <div class="col-2">Name</div>
                        <div class="col">
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="">

                            @error('name')
                            <small class="invalid-feedback">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                    <option value="">Choose Category...</option>

                                        @foreach ($categories as $item)
                                            <option value="{{ $item->id }}" @if(old('categoryId') == $item->id) selected @endif>{{ $item->name}}</option>
                                        @endforeach
                                    </select>

                      <div class="row mt-3">
                        <div class="col-2">Category Name:</div>
                        <div class="col">
                             <input type="text" name="email" class="form-control @error('categoryId') is-invalid @enderror" id="" placeholder="Enter Category...">
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
 </div>


@endsection
