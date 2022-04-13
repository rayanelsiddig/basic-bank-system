@extends('layouts.app')

@section('content')
<div class="row">
  <div class="col-md-6">
    <h3>Recipient list</h3>
    <p>Select customer to transfer money. </p>
    @foreach($customer as $data)


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
            <button type="button" class="btn btn-danger transfer-button" role="button" data-receiver_current_balance-input="{{$data->current_balance}}" data-sender_balance-input="{{$sender_balance}}" data-sender_id-input="{{$sender_id}}" data-receiver_id-input="{{$data->id}}" data-toggle="modal" data-target="#form">
              <i class="fa-solid fa-arrow-right-to-bracket mr-2"></i>Enter Amount
            </button>
          </div>
        </div>
      </div>

    </div>
    @endforeach
    {{ $customer->links() }}
  </div>

  <div class="col-md-6 position-sticky">
    <h3>Sender Info</h3>
    <p>Current customer</p>
    <div class="card mb-3 shadow " style="max-width: 540px;">
      <div class="row no-gutters">
        <div class="col-md-3">
          <img src="/icons-user.jpg" class="card-img" alt="...">
        </div>
        <div class="col-md-9">

          <div class="card-body ">

            <h5 class="card-title">{{$sender_data->name}} </h5>
            <p class="card-text"><i class="fa-solid fa-money-bill-1-wave mr-2"></i> {{number_format($sender_data->current_balance,2)}}</p>

            <p class="card-text"> <i class="fa-solid fa-phone mr-2"></i>{{$sender_data->phone}}</p>
            <p class="card-text "><i class="fa-solid fa-envelope mr-2"></i>{{$sender_data->email}}</p>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>

<div class="modal fade" id="form" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header border-bottom-0">
        <h5 class="modal-title" id="exampleModalLabel">Exchange Money</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <form action="{{ route('transfer.store') }}">
          {{csrf_field()}}
          <div class="modal-body">
            <div class="form-group">
              <label for="Amount"> Amount</label>
              <input type="number" class="form-control" oninput="calcAmount();" id="amount" name="transfer_amount" placeholder="Enter amount">
            </div>
            <input type="hidden" name="receiver_before_transfer_amount" id="receiver_current_balance">
            <input type="hidden" name="sender_before_transfer_amount" id="sender_balance" value="">
            <input type="hidden" name="sender_id" id="sender_id" value="">
            <input type="hidden" id="receiver_id" name="receiver_id" value="">
            <input type="hidden" id="sender_new_balance" name="sender_after_transfer_amount" value="">
            <input type="hidden" id="receiver_new_balance" name="receiver_after_transfer_amount" value="">
          </div>
          <div class="modal-footer border-top-0 d-flex justify-content-center">
            <button type="submit" class="btn btn-success">Exchange</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<script>
  $('.transfer-button').on('click', function() {
    $('#sender_balance').val($(this).data('sender_balance-input'));
    $('#receiver_current_balance').val($(this).data('receiver_current_balance-input'));
    $('#sender_id').val($(this).data('sender_id-input'));
    $('#receiver_id').val($(this).data('receiver_id-input'));
  });

  function calcAmount() {

    var sender_balance = document.getElementById("sender_balance").value;
    var receiver_current_balance = document.getElementById("receiver_current_balance").value;
    var amount = document.getElementById("amount").value;

    sender_balance = parseFloat(sender_balance.replace(/\,/g, ''));
    receiver_current_balance = parseFloat(receiver_current_balance.replace(/\,/g, ''));
    amount = parseFloat(amount.replace(/\,/g, ''));

    if (sender_balance == '0.00') {
      swal("", "Operation failed you, please recharge your account!", "error");
      // swal("", "Operation failed you exceed your balance!", "error");
      document.getElementById("amount").value = ""
      document.getElementById("sender_new_balance").value = ""
      document.getElementById("receiver_new_balance").value = ""

    } else if (sender_balance < amount) {
      swal("", "Operation failed you exceed your balance!", "error");
      document.getElementById("amount").value = ""
      document.getElementById("sender_new_balance").value = ""
      document.getElementById("receiver_new_balance").value = ""

    } else {
      var receiver_new_balance = receiver_current_balance + amount;
      var sender_new_balance = sender_balance - amount;

      document.getElementById("sender_new_balance").value = sender_new_balance;
      document.getElementById("receiver_new_balance").value = receiver_new_balance;
    }
  }
</script>
@endsection