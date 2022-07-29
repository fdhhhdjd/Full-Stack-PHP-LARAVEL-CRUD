@extends('welcome')
@section('content')
    <!-- Button trigger modal -->
    <center>
        <button type="button" class="btn btn-outline-danger fw-bold fs-4 rounded-pill" data-bs-toggle="modal"
            data-bs-target="#staticBackdrop">
            <i class="fa-solid fa-circle-plus"></i>
        </button>

        <!-- Modal -->
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Add Records</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="insertData" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-2">
                                <input type="text" placeholder="Enter Product Name" name="pname" id=""
                                    class="form-control">
                            </div>
                            <div class="mb-2">
                                <input type="text" placeholder="Enter Product price" name="pprice" id=""
                                    class="form-control">
                            </div>
                            <div class="mb-2">
                                <input type="file" name="image" id="" class="form-control"
                                    onchange="previewFile(this);">
                            </div>
                            <div class="mb-2">
                                <img id="previewImg" src="{{ asset('images/avatar.jpg') }}"alt="Avatar" id=previewImg
                                    class="img-thumbnail">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">
                                    <i class="fa-solid fa-xmark"></i></button>
                                <button type="submit" class="btn btn-outline-success"><i
                                        class="fa-solid fa-plus"></i></button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </center>
    <div class="container">
        <table class="table mt-5">
            <thead class="bg-danger text-white fw-bold">
                <th> Id</th>
                <th>Product Name</th>
                <th>Product Price</th>
                <th>Product Image</th>
                <th>Update</th>
                <th>Delelte</th>
            </thead>

            <tbody class='text-danger bg-light fs'>

                <?php
                if(!$data->isEmpty()){
                ?>
                @foreach ($data as $item)
                    <tr>
                        <form action="updatedelete" method="get">
                            <td class='pt-5'>
                                <input type="hidden" name="id" value="{{ $item['Id'] }}">{{ $item['Id'] }}
                            </td>
                            <td class='pt-5'>
                                <input type="hidden" name="name" value="{{ $item['PName'] }}">
                                {{ $item['PName'] }}
                            </td>
                            <td class='pt-5'>
                                <input type="hidden" name="price" value="{{ $item['PPrice'] }}">
                                {{ $item['PPrice'] }}
                            </td>

                            <td>
                                <input type="hidden" name="image" value="{{ $item['PImage'] }}">
                                <img src="images/{{ $item['PImage'] }}" alt="" width="100px" height="100px">
                            </td>
                            <td class='pt-5'>
                                <a href="{{ route('updatedelete', $item['Id']) }}"
                                    class="btn btn-outline-danger rounded-pill">Update</a>
                            </td>
                            <td class='pt-5'>
                                <a href="{{ route('deleleproduct', $item['Id']) }}"
                                    class="btn btn-outline-danger rounded-pill">Delete</a>

                            </td>
                        </form>
                    </tr>
                @endforeach
                <?php
                } else{
                ?>
                <h1 class="text-center text-danger">Product Not Stock, 😥</h1>
                <?php  
                }
                    ?>
            </tbody>
        </table>
    </div>
@endsection
