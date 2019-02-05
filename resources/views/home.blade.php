@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                 <div class="card-header">Dashboard</div>


                <div class="card-body">
                    @if (session('msg'))
                        <div class="alert alert-success" role="alert">
                            {{ session('msg') }}
                        </div>
                    @endif

                <form action="{{route('store')}}" method="post">
                        @csrf
                  <div class="form-group">
                    <label for="exampleInputEmail1">Loan Amount</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Amount" name="loan_amount" required="">
                  </div>
                  <div class="form-group">
                    <label for="exampleFormControlSelect1">Purpose</label>
                    <select class="form-control" id="exampleFormControlSelect1" name="purpose">
                      <option>Car Loan</option>
                      <option>Home loan</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="exampleFormControlSelect2">Term</label>
                    <select class="form-control" id="exampleFormControlSelect2" name="term">
                      <option>1</option>
                      <option>2</option>
                    </select>
                  </div>
                  <div class="form-group">
                  <input type="date" name="sday" required="">
                  </div>
                  <button type="submit" class="btn btn-primary">Submit</button>

                    
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
