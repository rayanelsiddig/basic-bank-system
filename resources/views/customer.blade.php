@extends('layouts.app')

@section('content')
<div class="mb-5">
    <h2>Customers List</h2>
    <p>Exch your money in a secure way. </p>
</div>

<div class="row">

    @foreach($customer as $data)

    <div class="col-md-6">
        <div class="card mb-3 shadow " style="max-width: 540px;">
            <div class="row no-gutters">
                <div class="col-md-3">
                    <img src="/icons-user.jpg" class="card-img" alt="...">
                </div>
                <div class="col-md-9">
                    <div class="card-body">

                        <h5 class="card-title">{{$data->name}}</h5>
                        <p class="card-text"><i class="fa-solid fa-money-bill-1-wave mr-2"></i>{{number_format($data->current_balance,2)}}</p>

                        <p class="card-text"> <i class="fa-solid fa-phone mr-2"></i>{{$data->phone}}</p>
                        <p class="card-text "><i class="fa-solid fa-envelope mr-2"></i>{{$data->email}}</p>
                        <!-- <p class="card-text "><i class="fa-solid fa-location-dot mr-2"></i>{{$data->address}}</p> -->
                        <a class="btn btn-info" href="{{ url('customer-detail/'.$data->id) }}"><i class="fa-solid fa-clock-rotate-left mr-2"></i>Transaction history</a>
                        <a class="btn btn-danger" href="{{ url('transfer/'.$data->id) }}"> <i class="fa-solid fa-money-bill-transfer mr-2"></i>Transfer </a>

                    </div>
                </div>
            </div>
        </div>
    </div>

    @endforeach
</div>
{{ $customer->links() }}

@endsection