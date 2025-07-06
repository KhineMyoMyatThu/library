@extends('admin.layouts.master')

@section('content')

                <div class="container">
                    <div class=" d-flex justify-content-between my-2">
                        <a href=""> <button class=" btn btn-sm btn-secondary  "> User List</button> </a>
                        <div class="">
                            <form action="" method="get">

                                <div class="input-group">
                                    <input type="text" name="searchKey" value="" class=" form-control"
                                        placeholder="Enter Search Key...">
                                    <button type="submit" class=" btn bg-dark text-white"> <i
                                            class="fa-solid fa-magnifying-glass"></i> </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <table class="table table-hover shadow-sm ">
                                <thead class="bg-primary text-white">
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Address</th>
                                        <th>Phone</th>
                                        <th>Role</th>
                                        <th>Created Date</th>
                                        <th> Platform</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td><span class="btn btn-sm bg-danger text-white rounded shadow-sm"></span></td>

                                        <td></td>
                                        <td>

                                        </td>
                                        <td>

                                        </td>
                                    </tr>

                                </tbody>
                            </table>

                            <span class=" d-flex justify-content-end"></span>

                        </div>
                    </div>
                </div>
@endsection
