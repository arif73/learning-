<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
    @if(session()->has('msg'))
        <div class="alert alert-success alert-dismissible notify">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-check"></i>Success Alert!</h4>
            {{ session('msg') }}
        </div>
@endif


    <table class="table table-striped">
  <thead>

    <tr>
      <th scope="col">#</th>
      <th scope="col">Avator</th>
      <th scope="col">Date</th>
      <th scope="col">Handle</th>
    </tr>
  </thead>
  <tbody>
    @foreach($file as $f)
    <tr>
      <th scope="row">{{$f->id}}</th>
      <td><img src="{{ asset('images/'.$f->avator)}}" class="img-fluid" alt="Responsive image"></td>
      <td>{{$f->date}}</td>
      <td><a href="{{route('user.delete',$f->id)}}"class="btn btn-danger" onclick="return confirm('Are you sure you want to delete?');" > 


                                        <i class="fa fa-trash">delete</i> 
                                    </a></td>
    </tr>
   @endforeach
  </tbody>
</table>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>