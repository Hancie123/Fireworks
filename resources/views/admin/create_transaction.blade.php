@include('layouts.adminnav')
@push('title')
<title>Fire Wins | Create Transactions</title>

<link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css" />


<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.7.1/css/buttons.dataTables.min.css">
<script src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.print.min.js"></script>


<div class="main-panel">
    <div class="content-wrapper">
        <h3><b>Create Transaction</b></h3><br>



        <div class="container border p-4 w3-round">
            <a href="#" class="btn btn-primary "><i class='bx bx-plus'>Create Customer </i></a><br>


            <form method="post" action="{{url('/admin/payments/create')}}" class="mt-4">
                @csrf

                <input type="hidden" value="{{Session::get('User_ID')}}" name="User_ID" type="text">
                <input type="hidden" value="<?php echo date('Y-m-d'); ?>" name="date" type="text">



                <div class="row">
                    <div class="col-sm-4">
                        <label>Customer Name <sup class="text-danger fw-bold">*</sup></label>
                        <select class="select2 form-control" name="room_id">
                            @foreach($customers as $customer)
                            <option value=" {{ $customer->customer_id }}">{{ $customer->customer_name }}</option>
                            @endforeach
                        </select>
                    </div>


                    <div class="col-sm-4">
                        <label>Game Name <sup class="text-danger fw-bold">*</sup></label>
                        <select class="select2 form-control" name="room_id">
                            @foreach($games as $game)
                            <option value=" {{ $game->product_id }}">{{ $game->product_name }}</option>
                            @endforeach
                        </select>
                    </div>


                    <div class="col-sm-4">
                        <label>Type<sup class="text-danger fw-bold">*</sup></label>
                        <select class="select2 form-control" name="room_id">
                            <option value=" Redeem">Redeem</option>
                            <option value="Recharge">Recharge</option>


                        </select>
                    </div>
                </div>

                <br>
                <div class="row">
                    <div class="col-sm-4">
                        <label>Payment Method<sup class="text-danger fw-bold">*</sup></label>
                        <select class="select2 form-control" name="room_id">
                            @foreach($payments as $payment)
                            <option value="{{ $payment->payment_id }}">{{ $payment->payment_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-sm-4">
                        <label>Transaction ID/Cash Identifier</label>
                        <input class="w3-input w3-border w3-round" name="email" type="email"
                            placeholder="Cash Identifier">
                    </div>
                    <div class="col-sm-4">
                        <label>Sender/Receiver ID</label>
                        <input class="w3-input w3-border w3-round" name="email" type="text"
                            placeholder="Sender $CashTag">
                    </div>
                </div>

                <br>
                <div class="row">
                    <div class="col-sm-4">
                        <label>Note<sup class="text-danger fw-bold">*</sup></label>
                        <input class="w3-input w3-border w3-round" name="email" type="text" placeholder="Short Note">
                    </div>

                    <div class="col-sm-4">
                        <label><i class="bi bi-cash"></i> Cash<sup class="text-danger fw-bold">*</sup></label>
                        <input class="w3-input w3-border w3-round" name="email" type="text" placeholder="Short Note">
                    </div>

                    <div class="col-sm-4">
                        <label><i class="bi bi-currency-dollar"></i> Credit<sup
                                class="text-danger fw-bold">*</sup></label>
                        <input class="w3-input w3-border w3-round" name="email" type="text" placeholder="Short Note">
                    </div>
                </div>


                <br> <br>

                <button type="submit" class="btn btn-primary mb-2">Create</button><br>


                @if(Session::has('success'))
                <div class="alert alert-success w3-display-bottommiddle">
                    <strong>Success!</strong> {{Session::get('success')}}
                </div>
                @endif
                @if(Session::has('fail'))
                <div class="alert alert-danger w3-display-bottommiddle">
                    <strong>Fail!</strong> {{Session::get('fail')}}
                </div>
                @endif
            </form>

        </div>
        <br><br>


    </div>
</div>
</div>

<style>
.select2-container .select2-selection--single {
    height: calc(2.25rem + 2px) !important;

}
</style>


<script>
$(document).ready(function() {
    $('.select2').select2({
        placeholder: 'Select an option'
    });
});
</script>

<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>





</body>

</html>