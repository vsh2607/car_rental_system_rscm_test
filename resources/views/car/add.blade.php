@extends('adminlte::page')

@section('title', 'Add Car')

@section('content_header')
    <h1>Add Car</h1>
@stop

@include('base')

@section('content')
    <form action="/car/add" method="POST">

         @if ($errors->any())
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ $error }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endforeach
            @endif

            @if (session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif


            <div class="card mt-5">
                <div class="card-header">Add New Car</div>
                <div class="card-body">

                    @csrf
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="car_brand">Car Brand</label>
                                <input type="text" class="form-control" name="car_brand" id="car_brand"
                                    placeholder="Input The Car Brand" required>
                            </div>
                            <div class="form-group">
                                <label for="car_model">Car Model</label>
                                <input type="text" class="form-control" name="car_model" id="car_model"
                                    placeholder="Input The Car Model" required>
                            </div>

                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="car_plate_number">Car Plate Number</label>
                                <input type="text" class="form-control" name="car_plate_number"
                                    id="car_plate_number" placeholder="Input The Car Plate Number" required>
                            </div>
                            <div class="form-group">
                                <label for="car_rental_price">Car Price</label>
                                <input type="number" class="form-control" name="car_rental_price"
                                    id="car_rental_price" placeholder="Input The Car Rental Price" required>
                            </div>

                        </div>
                    </div>




                </div>

                <div class="card-footer">
                    <button class="btn btn-success" type="submit">Save</button>
                    <a href="{{ url('car/') }}" class="btn btn-secondary">Back</a>
                </div>
            </div>
    </form>
@stop
