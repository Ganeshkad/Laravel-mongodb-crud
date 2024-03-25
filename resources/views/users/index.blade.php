<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Users</title>
  </head>
  <body>
  <section class="container mt-5">
    @if(session('success'))
    <div class="alert alert-success">{{session('success')}}</div> 
    @endif
    <div class="card">
    <div class="card-header">
    <h5>Users Details<a href="{{ route('user.create') }}" class="btn btn-primary float-right">Create User</a></h5>
    </div>
    </div>
    <table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Action
      </th>
    </tr>
  </thead>
  <tbody>
        @foreach($data as $key => $val)
        <tr>
        <th scope="row">{{++$key}}</th>
        <td>{{ $val->name }}</td>
        <td>{{ $val->email }}</td>
        <td> 
        <a href="{{ route('user.edit',$val->_id) }}" class="btn btn-secondary">Edit
        </a>
        <a href="{{ route('user.show',$val->_id) }}" class="btn btn-danger">Delete
        </a>
        </td>
        @endforeach
        </tr>
</tbody>
</table>
  </section>





    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>