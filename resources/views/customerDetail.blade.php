@extends('layouts.app')

@section('content')
<h3>Transaction History Details</h3>


<div class="card mb-3 shadow p-5 ">
    <h4>Sending History</h4>
    <table class="table table-borderless table-hover datatables" id="dataTable-1">
        <thead>
            <tr>
                <td>
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="all2">
                        <label class="custom-control-label" for="all2"></label>
                    </div>
                </td>
                <th>Receiver Name</th>
                <th>Transferred Amount</th>
                <th>Transcation Date</th>

            </tr>
        </thead>
        <tbody>
            @foreach($sendMoney as $d)

            <tr>
                <td>
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="2474">
                        <label class="custom-control-label" for="2474"></label>
                    </div>
                </td>
                <td>
                    <p class="mb-0 text-muted"><strong>{{$d->receiver_name}}</strong></p>
                </td>
                <td>
                    <p class="mb-0 text-muted"> {{number_format($d->transfer_amount,2)}}</p>
                </td>
                <td>
                    <p class="mb-0 text-muted">{{$d->transfer_date}}</p>
                </td>

            </tr>
            @endforeach

        </tbody>
    </table>


</div>
<div class="card mb-3 shadow p-5 ">
    <h4>Receiving History</h4>
    <table class="table table-borderless table-hover datatables" id="dataTable-2">
        <thead>
            <tr>
                <td>
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="all3">
                        <label class="custom-control-label" for="all2"></label>
                    </div>
                </td>
                <th>Sender Name</th>
                <th>Received Amount</th>
                <th>Transcation Date</th>

            </tr>
        </thead>
        <tbody>
            @foreach($reciveMoney as $d)

            <tr>
                <td>
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="2474">
                        <label class="custom-control-label" for="2474"></label>
                    </div>
                </td>
                <td>
                    <p class="mb-0 text-muted"><strong>{{$d->sender_name}}</strong></p>
                </td>
                <td>
                    <p class="mb-0 text-muted"> {{number_format($d->transfer_amount,2)}}</p>
                </td>
                <td>
                    <p class="mb-0 text-muted">{{$d->transfer_date}}</p>
                </td>

            </tr>
            @endforeach

        </tbody>
    </table>


</div>
@endsection