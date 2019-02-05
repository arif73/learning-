@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                  

                  <h3>Loan Amount:{{$loan->amount}}</h3> 
                  <h3>Interest Rate:{{$loan->interest_rate}}</h3>
                  <h3>Purpose:{{$loan->purpose}}</h3>
                  <h3>Monthly Payment:{{$loan->monthly_payment}}</h3>
                  <h3>Start Date:{{$loan->sday}}</h3>
                  <h3>Total Interest paid:{{$loan->total_interest_paid}}</h3>
                  <h3>Last Payment:{{date("F Y", strtotime($loan->last_payment))}}</h3>


                  
                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection