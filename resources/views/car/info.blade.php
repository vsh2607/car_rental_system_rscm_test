@extends('adminlte::page')

@section('title', 'Info Car')

@section('content_header')
    <h1>Car Info</h1>
@stop

@include('base')
@section('content')

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
        <div class="card-header">Car Info</div>
        <div class="card-body">

            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="car_brand">Car Brand</label>
                        <input type="text" class="form-control" name="car_brand" id="car_brand"
                            placeholder="Input The Car Brand" disabled value="{{ $car->car_merk }}">
                    </div>
                    <div class="form-group">
                        <label for="car_model">Car Model</label>
                        <input type="text" class="form-control" name="car_model" id="car_model"
                            placeholder="Input The Car Model" disabled value="{{ $car->car_model }}">
                    </div>

                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="car_plate_number">Car Plate Number</label>
                        <input type="text" class="form-control" name="car_plate_number" id="car_plate_number"
                            placeholder="Input The Car Plate Number" disabled value="{{ $car->car_plate_number }}">
                    </div>
                    <div class="form-group">
                        <label for="car_rental_price">Car Price</label>
                        <input type="text" class="form-control" name="car_rental_price" id="car_rental_price"
                            placeholder="Input The Car Rental Price" disabled value="Rp. {{  number_format($car->car_rental_price, 2, '.', ',')}}">
                    </div>

                </div>
            </div>




        </div>

        <div class="card-footer">
            {{-- <button class="btn btn-warning" type="submit">Change Data</button> --}}
            <a href="{{ url('car/' . $car->id . '/edit') }}" class="btn btn-warning"><i class="fas fa-edit"></i></a>
            <a href="{{ url('car/' . $car->id . '/delete') }}" class="btn btn-danger"><i class="fas fa-times"></i></a>
            <a href="{{ url('car/') }}" class="btn btn-secondary">Back</a>
        </div>
    </div>
@stop
