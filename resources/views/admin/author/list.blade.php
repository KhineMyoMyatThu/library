@extends('admin.layouts.master')

@section('content')
    <div class="container-fluid">
           <div class="">
               <h2>Author</h2>
    </div>

        <div class="row ">
            <div class="col">


                <div class="card-body">


                  @if ($authors->count() !=0)
                  <div class="card-body shadow">
                      <table class="table table-hover shadow-sm">
                             <thead class="bg-dark">
                            <tr>
                                <th class="text-white">ID</th>
                                <th class="text-white">Profile</th>
                                <th class="text-white">Name</th>
                                <th class="text-white">Biography</th>
                                <th class="text-white">Date</th>
                                <th class="text-white"></th>

                            </tr>
                        </thead>
                         @foreach ($authors as $item)
                            <tr>
                            <td>{{$item->id}}</td>
                            <td class="col-1"><img src="{{ asset('author/'.$item->image)}}" alt="" class="img-thumbnail rounded shadow-sm" style="100px"></td>
                            <td>{{ $item->name}}</td>
                            <td>{{ $item->biography}}</td>
                            <td>{{$item->created_at->format('j-F-Y')}}</td>
                            <td>
                                <a href="" class="btn btn-sm btn-warning mx-2"><i class="fa-pen-to-square fa-solid mr-2"></i>Update</a>

                                <a href="" class="btn btn-sm btn-danger"><i class="fa-trash fa-solid mr-2"></i>Delete</a>
                            </td>
                        </tr>
                     @endforeach
                    </table>
                  </div>

                    <span class="text-dark d-flex justify-content-center">{{ $authors->links()}}</span>
                    @else
                    <div class="alert alert-dark text-center">
                        <i class="fa-solid fa-triangle-exclamation"></i>
                        <span class="ml-2">စာရေးသူအချက်အလက် မရှိပါ</span>
                    </div>
                    @endif
                </div>
            </div>

        </div>
    </div>
@endsection
