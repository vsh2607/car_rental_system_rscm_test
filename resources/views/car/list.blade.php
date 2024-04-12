@extends('adminlte::page')

@section('title', 'List Car')

@section('content_header')
    <h1>List car</h1>
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
        <div class="card-header">
            <a href="{{ url('car/add') }}" class="btn btn-success float-right">Add Car</a>
        </div>
        <div class="card-body">
            <table class="table" id="car-table">
                <thead>
                    <tr>
                        <th>No. </th>
                        <th>Brand</th>
                        <th>Model</th>
                        <th>Plate Number</th>
                        <th>Price</th>
                        <th>Availability</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($car_list as $key => $car)
                        <tr>
                            <td>{{ ++$key }}</td>
                            <td>{{ $car->car_merk }}</td>
                            <td>{{ $car->car_model }}</td>
                            <td>{{ $car->car_plate_number }}</td>
                            <td>Rp. {{  number_format($car->car_rental_price, 2, '.', ',')}}</td>
                            <td><p class="{{ $car->car_availability == 1 ? "text-success" : "text-danger" }}">{{ $car->car_availability == 1 ? "Available" : "Not Available" }}</p></td>
                            <td>
                                <a href="{{ url('car/' . $car->id . '/info') }}" class="btn btn-info"><i
                                        class="fas fa-info"></i></a>
                                <a href="{{ url('car/' . $car->id . '/edit') }}" class="btn btn-warning"><i
                                        class="fas fa-edit"></i></a>
                                <a href="{{ url('car/' . $car->id . '/delete') }}" class="btn btn-danger"><i
                                        class="fas fa-times"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop
