@extends('adminlte::page')

@section('title', 'Rent Car')

@section('content_header')
    <h1>Add Car Rent</h1>
@stop

@include('base')

@section('content')
    <form action="/rent/add" method="POST">
        @csrf
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


        <div class="row mt-5">
            <div class="col-12 rent-available">
                <div class="card">
                    <div class="card-header">Available Car</div>
                    <div class="card-body">
                        <table class="table" id="car-table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Brand</th>
                                    <th>Model</th>
                                    <th>Price</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($available_cars as $key => $car)

                                    <tr>
                                        <td>{{ ++$key }}</td>
                                        <td data-data1="{{ $car->id }}" >{{ $car->car_merk }}</td>
                                        <td>{{ $car->car_model }}</td>
                                        <td data-data1 = "{{ $car->car_rental_price }}">Rp. {{  number_format($car->car_rental_price, 2, '.', ',')}}</td>
                                        <td>
                                            <button class="btn btn-warning btn-sm btn-pick" type="button">Pick Car</button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>


                </div>
            </div>
            <div class="col-4 rent-column" style="display: none">
                <div class="card">
                    <div class="card-header">Rent Car</div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="rent_car_brand">Car Brand</label>
                            <input type="text" class="rent_car_brand form-control" name="rent_car_brand" readonly required>
                            <input type="hidden" class="rent_car_id" name="rent_car_id" readonly>
                            <input type="hidden" class="rent_car_price" readonly>

                        </div>

                        <div class="form-group">
                            <label for="rent_customer">Customer</label>
                            <select name="rent_customer" id="rent_customer" class=" form-control" required>
                                <option selected>Choose Customer</option>
                                @foreach ($customers as $customer)
                                    <option value="{{ $customer->id }}">{{ $customer->customer_name }}</option>
                                @endforeach

                            </select>
                        </div>

                        <div class="form-group">
                            <label for="rent_start_date">Rent Date</label>
                            <input type="date" class="rent_start_date form-control dt" name="rent_start_date" required>
                        </div>
                        <div class="form-group">
                            <label for="rent_return_date">Return Date</label>
                            <input type="date" class="rent_return_date form-control dt" name="rent_return_date" required>
                        </div>
                        <div class="form-group">
                            <label for="rent_total_price">Total Price</label>
                            <input type="text" class="rent_total_price form-control" name="rent_total_price" required readonly>
                        </div>
                    </div>

                    <div class="card-footer">
                        <button class="btn btn-success float-right">Rent</button>
                    </div>
                </div>

            </div>
        </div>



    </form>
@stop


