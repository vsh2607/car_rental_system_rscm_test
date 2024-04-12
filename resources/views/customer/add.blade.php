@extends('adminlte::page')

@section('title', 'Add Customer')

@section('content_header')
    <h1>Add Customer</h1>
@stop

@include('base')

@section('content')
    <form action="/customer/add" method="POST">

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
                <div class="card-header">Add New Customer</div>
                <div class="card-body">

                    @csrf
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="customer_name">Customer name</label>
                                <input type="text" class="form-control" name="customer_name" id="customer_name"
                                    placeholder="Input The Customer Name" required>
                            </div>
                            <div class="form-group">
                                <label for="customer_address">Customer Address</label>
                                <input type="text" class="form-control" name="customer_address" id="customer_address"
                                    placeholder="Input The Customer Address" required>
                            </div>

                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="customer_telp_number">Customer Telp Number</label>
                                <input type="number" class="form-control" name="customer_telp_number"
                                    id="customer_telp_number" placeholder="Input The Customer Telp Number" required>
                            </div>
                            <div class="form-group">
                                <label for="customer_sim_number">Customer SIM Number</label>
                                <input type="text" class="form-control" name="customer_sim_number"
                                    id="customer_sim_number" placeholder="Input The Customer SIM Number" required>
                            </div>

                        </div>
                    </div>




                </div>

                <div class="card-footer">
                    <button class="btn btn-success" type="submit">Save</button>
                    <a href="{{ url('customer/') }}" class="btn btn-secondary">Back</a>
                </div>
            </div>
    </form>
@stop
