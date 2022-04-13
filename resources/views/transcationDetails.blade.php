@extends('layouts.app')

@section('content')
<h3> All Transaction History </h3>

       
        <div class="card mb-3 shadow p-5 " >
            <h4>Sending history</h4>
        <table class="table table-borderless table-hover datatables" id="dataTable-1">
            <thead>
                <tr>
                    <td>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="all2">
                            <label class="custom-control-label" for="all2"></label>
                        </div>
                    </td>
                    <th>Sender Name</th>
                    <th>Receiver Name</th>
                    <th>Transferred Amount</th>
                    <th>Sender current balance</th>
                    <th> Receiver current balance</th>
                    <th>Transcation Date</th>


                </tr>
            </thead>
            <tbody>
            @foreach($data as $d)
           
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
                        <p class="mb-0 text-muted"><strong>{{$d->receiver_name}}</strong></p>
                    </td>
                    <td>
                        <p class="mb-0 text-muted"> {{number_format($d->transfer_amount,2)}}</p>
                    </td>
                    <td>
                        <p class="mb-0 text-muted"> {{number_format($d->sender_after_transfer_amount,2)}}</p>
                    </td>
                    <td>
                        <p class="mb-0 text-muted"> {{number_format($d->receiver_after_transfer_amount,2)}}</p>
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