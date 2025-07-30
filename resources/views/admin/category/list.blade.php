@extends('admin.layouts.master')

@section('content')
    <div class="container-fluid">
        <div class="">
            <h3>Category List</h3>
        </div>

        <div class="row ">
            <div class="col">
                <div class="card-body shadow ">
                    <form action="{{ route('category#create')}}" method="POST" >
                        @csrf
                        <div class="row ">
                            <div class="col-md-10">
                                  <input type="text" name="categoryName" class="form-control @error('categoryName') is-invalid @enderror " placeholder="Enter category name..." >

                                  @error('categoryName')
                                    <small class="invalid-feedback">{{ $message}}</small>
                                @enderror
                            </div>

                            <div class="col-md-2">
                        <input type="submit" value="Create" class=" btn btn-dark hover-affect ">

                            </div>
                        </div>

                    </form>
                </div>

                <div class="card-body">


                  @if ($categories->count() !=0)
                      <table class="table table-hover shadow-sm">
                             <thead class="bg-dark">
                            <tr>
                                <th class="text-white">ID</th>
                                <th class="text-white">Name</th>
                                <th class="text-white">Date</th>
                                <th class="text-white"></th>

                            </tr>
                        </thead>
                         @foreach ($categories as $item)
                            <tr>
                            <td>{{$item->id}}</td>
                            <td>{{ $item->name}}</td>
                            <td>{{$item->created_at->format('j-F-Y')}}</td>
                            <td>
                                <a href="{{ route('category#updatePage',$item->id)}}" class="btn btn-sm btn-warning mx-2"><i class="fa-pen-to-square fa-solid mr-2"></i>Update</a>

                                <a href="{{ route('category#delete',$item->id)}}" class="btn btn-sm btn-danger"><i class="fa-trash fa-solid mr-2"></i>Delete</a>
                            </td>
                        </tr>
                     @endforeach
                    </table>
                    <span class="text-dark d-flex justify-content-center">{{ $categories->links()}}</span>
                    @else
                    <div class="alert alert-dark text-center">
                        <i class="fa-solid fa-triangle-exclamation"></i>
                        <span class="ml-2">အမျိုးအစား မရှိပါ။</span>
                    </div>
                    @endif
                </div>
            </div>

        </div>
    </div>
@endsection
