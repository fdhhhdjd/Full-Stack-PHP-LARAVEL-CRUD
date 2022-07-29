@extends('welcome')
@section('content')
    <div class="col-md-4 m-auto border mt-3 p-2 border-info">
        <h2 class="text-center text-warning">Update Product </h2>
        <form action="{{ route('editproduct', $product['Id']) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-2">
                <label for="">Product Name</label>
                <input type="text" name="name" id="" value={{ $product['PName'] }} class="form-control">
            </div>
            <div class="mb-2">
                <label for="">Product Price</label>
                <input type="text" name="price" id="" value={{ $product['PPrice'] }} class="form-control">
            </div>
            <div class="mb-2">
                <label for="">Product Image</label>
            </div>
            <div class="mb-2">
                <input type="file" name="image" id="" class="form-control" onchange="previewFile(this);">
            </div>
            <div class="mb-2">
                <img src="{{ asset('') }}images/{{ $product['PImage'] }}" alt="" class="img-thumbnail"
                    id="previewImg">
            </div>
            <br>
            <button type="submit" class="btn btn-outline-warning rounded-pill modal-footer">
                <i class="fa-solid fa-pencil"></i>
            </button>
        </form>
    </div>
@endsection
