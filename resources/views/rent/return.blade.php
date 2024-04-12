@extends('adminlte::page')

@section('title', 'List Rented Car')

@section('content_header')
    <h1>List Rented Car</h1>
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
        </div>
        <div class="card-body">
            <table class="table" id="customer-table">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Car Brand</th>
                        <th>Customer</th>
                        <th>Customer Telp Number</th>
                        <th>Rent Date</th>
                        <th>Rent Duration</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($rents as $key => $rent)
                        <tr>
                            @php

                                $startDate =  \Carbon\Carbon::parse($rent->rent_rentdate);
                                $endDate =  \Carbon\Carbon::parse($rent->rent_returndate);
                                $diffInDays = $startDate->diffInDays($endDate);

                            @endphp
                            <td>{{ ++$key }}</td>
                            <td>{{ $rent->car->car_merk }}</td>
                            <td>{{ $rent->customer->customer_name }}</td>
                            <td>{{ $rent->customer->customer_no_telp }}</td>
                            <td>{{ $rent->rent_rentdate }}</td>
                            <td data-data1="{{ $rent->rent_total_price }}" data-data2="{{ $rent->id }}">{{ $diffInDays }} days</td>
                            <td>
                                <button class="btn btn-warning btn-return">Return</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop
