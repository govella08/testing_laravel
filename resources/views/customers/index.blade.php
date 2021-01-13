<!DOCTYPE html>
<html lang="en">

<head>
  <title>
    Customers
  </title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="/imgs/weather.png">
  <link rel="stylesheet" href="{{asset('css/styles.css')}}">
</head>

<body>
  <div class="main-content">
    <h1>Pets Care</h1>
    <header>
      <div class="navbar">
        <a href="{{ route('pets.index') }}">Pets</a>
        <a href="{{ route('customers.index') }}">Customers</a>
        <a href="{{ route('employees.index') }}">Employees</a>
        <a href="/about">About</a>
        <a href="help">Help</a>
      </div>
    </header>
    @if (session('status'))
      <div class="alert-success">
        {{ session('status') }}
      </div>
    @endif
    <p class="success">Add new Customer</p>
    <form action="{{ route('customers.store') }}" method="POST">
      @csrf

      <div class="form-group">
        <label for="first_name">First Name:</label><br>
        <input class="form-control" type="text" name="first_name" placeholder="Customer first_name" value="{{ old('first_name') }}">
        @error('first_name')
          <span class="validation-error">{{ $message }}</span>
        @enderror
      </div>

      <div class="form-group">
        <label for="last_name">Last Name:</label><br>
        <input class="form-control" type="text" name="last_name" placeholder="Customer last_name">
        @error('last_name')
          <span class="validation-error">{{ $message }}</span>
        @enderror
      </div>

      <div class="form-group">
        <label for="phone">Phone</label> <br>
        <input class="form-control" type="text" name="phone" placeholder="Phone number" style="width: 100%">
        @error('phone')
          <span class="validation-error">{{ $message }}</span>
        @enderror
      </div>

      <div class="form-group">
        <button class="btn btn-primary">Save</button>
      </div>

      <hr>
      
    </form>
    @if (count($customers) > 0)
      <table>        
        <p class="success">All customers</p>
        <tr>
          <th>#</th>
          <th>First Name:</th>
          <th>Last Name:</th>
          <th>Phone</th>
          <th>Actions</th>
        </tr>
        @foreach ($customers as $key=>$customer)
          <tr>
            <td>{{ ++$key }}</td>
            <td>{{ $customer->first_name }}</td>
            <td>{{ $customer->last_name }}</td>
            <td>{{ $customer->phone }}</td>
            <td>
              <a class="btn btn-primary btn-sm" href="{{ route('customers.show', $customer) }}">View</a>
              <a class="btn btn-info btn-sm" href="{{ route('customers.edit', $customer) }}">Edit</a>
              <form action="{{ route('customers.destroy', $customer) }}" method="post" style="float-right">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger btn-sm" type="submit">Delete</button>
              </form>              
            </td>
          </tr>
        @endforeach
      </table>
      @else
      <p class="danger">No customers found in the database</p>
    @endif
  </div>

  <script src="/js/app.js"></script>
</body>

</html>