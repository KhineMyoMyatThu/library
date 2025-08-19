@extends('admin.layouts.master')

@section('content')
    <div class="container-fluid">
           <div class="">
               <h2>Books</h2>
    </div>

        <div class="row ">
            <div class="col">


                <div class="card-body">


                  @if ($books->count() !=0)
                  <div class="card-body shadow">
                      <table class="table table-hover shadow-sm">
                             <thead class="bg-dark">
                            <tr>
                                <th class="text-white">ID</th>
                                <th class="text-white">Image</th>
                                <th class="text-white">Title</th>
                                <th class="text-white">Description</th>
                                <th class="text-white">Category Name</th>
                                <th class="text-white">Author Name</th>
                                <th class="text-white">Book file</th>
                                <th class="text-white">Release Year</th>
                                <th class="text-white">Date</th>
                                <th class="text-white"></th>

                            </tr>
                        </thead>
                         @foreach ($books as $item)
                            <tr>
                            <td>{{$item->id}}</td>
                            <td class=""><img src="{{ asset('book/'.$item->image)}}" alt="" class="img-thumbnail rounded shadow-sm" style="width: 100px;heigt:100px" ></td>
                            <td>{{ $item->title}}</td>
                            <td>{{ Str::limit($item->description, 12, '...') }}</td>
                            <td>{{ $item->category_name}}</td>
                            <td>{{ $item->author_name}}</td>
                            <td>{{ Str::limit($item->pdf_path, 10, '...') }}</td>
                            <td>{{ $item->release_year}}</td>
                            <td>{{$item->book_created_at->format('j-F-Y')}}</td>
                            <td >
                                <div class="d-flex">
                                    <a href="" class="btn btn-sm btn-warning mr-2">
                                        <i class="fa-pen-to-square fa-solid "></i>
                                        </a>

                                <a href="" class="btn btn-sm btn-danger ">
                                    <i class="fa-trash fa-solid "></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                     @endforeach
                    </table>
                  </div>

                    {{-- <span class="text-dark d-flex justify-content-center">{{ $books->links()}}</span> --}}
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
