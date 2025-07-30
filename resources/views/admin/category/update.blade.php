@extends('admin.layouts.master')

@section('content')
<div class="container-fluid">
    <div class="">
        <a href="{{ route('category#list')}}" class="btn btn-sm btn-dark ">Back</a>
    </div>

    <div class="row">
        <div class="col-7 offset-3">
            <form action="{{ route('category#update', $category->id)}}" method="POST">
                @csrf
                <div class="card shadow">
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="categoryName" class="form-label">Category</label>
                            <input type="text" name="categoryName" id="" class="form-control  @error('categoryName') is-invalid @enderror" placeholder="Enter your category.." value="{{ old('categoryName',$category->name)}}" >

                            @error('categoryName')
                            <small class="invalid-feedback">{{ $message}}</small>
                            @enderror

                        </div>

                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-dark">Update</button>
                    </div>
            </form>
        </div>
    </div>
</div>

@endsection
