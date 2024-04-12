@extends('adminlte::page')

@section('title', 'List Customer')

@section('content_header')
    <h1>List Customer</h1>
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
            <a href="{{ url('customer/add') }}" class="btn btn-success float-right">Add Customer</a>
        </div>
        <div class="card-body">
            <table class="table" id="customer-table">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Name</th>
                        <th>Address</th>
                        <th>Telp. Number</th>
                        <th>SIM. Number</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($customer_list as $key=>$customer)
                        <tr>
                            <td>{{ ++$key }}</td>
                            <td>{{ $customer->customer_name }}</td>
                            <td>{{ $customer->customer_address }}</td>
                            <td>{{ $customer->customer_no_telp }}</td>
                            <td>{{ $customer->customer_sim_num }}</td>
                            <td>
                                <a href="{{ url('customer/' . $customer->id . '/info') }}" class="btn btn-info"><i
                                        class="fas fa-info"></i></a>
                                <a href="{{ url('customer/' . $customer->id . '/edit') }}" class="btn btn-warning"><i
                                        class="fas fa-edit"></i></a>
                                <a href="{{ url('customer/' . $customer->id . '/delete') }}" class="btn btn-danger"><i
                                        class="fas fa-times"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop
