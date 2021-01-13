<!DOCTYPE html>
<html lang="en">

<head>
  <title>
    Pets
  </title>
  <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Pets</title>
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
    <p class="success">Add new Pet</p>
    <form action="{{ route('pets.store') }}" method="POST">
      @csrf

      <div class="form-group">
        <label for="name">Pet Name:</label><br>
        <input class="form-control" type="text" name="name" placeholder="Pet name">
        @error('name')
          <span class="validation-error">{{ $message }}</span>
        @enderror
      </div>

      <div class="form-group">
        <label for="category">Pet Category</label> <br>
        <input class="form-control" type="text" name="category" placeholder="Pet category" style="width: 100%">
        @error('category')
          <span class="validation-error">{{ $message }}</span>
        @enderror
      </div>

      <div class="form-group">
        <label for="color">Pet Color</label><br>
        <input class="form-control" type="text" name="color" placeholder="Pet color">
        @error('color')
          <span class="validation-error">{{ $message }}</span>
        @enderror
      </div>

      <div class="form-group">
        <label for="color">Pet Owner</label><br>
        <select class="form-control" name="customer_id" id="customer_id">
          <option value="">--Select owner--</option>
          @foreach ($customers as $customer)
            <option value="{{ $customer->id }}">{{ $customer->first_name }}</option>
          @endforeach
        </select>
        @error('color')
          <span class="validation-error">{{ $message }}</span>
        @enderror
      </div>

      <div class="form-group">
        <button class="btn btn-primary">Save</button>
      </div>

      <hr>
      
    </form>
    @if (count($pets) > 0)
      <table>        
        <p class="success">All Pets</p>
        <tr>
          <th>#</th>
          <th>Pet Name:</th>
          <th>Color:</th>
          <th>Actions</th>
        </tr>
        @foreach ($pets as $key=>$pet)
          <tr>
            <td>{{ ++$key }}</td>
            <td>{{ $pet->name }}</td>
            <td>{{ $pet->color }}</td>
            <td>
              <a class="btn btn-primary btn-sm" href="{{ route('pets.show', $pet) }}">View</a>
              <a class="btn btn-info btn-sm" href="{{ route('pets.edit', $pet) }}">Edit</a>
              <form action="{{ route('pets.destroy', $pet) }}" method="post" style="float-right">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger btn-sm" type="submit">Delete</button>
              </form>              
            </td>
          </tr>
        @endforeach
      </table>
      @else
      <p class="danger">No pets found in the database</p>
    @endif
  </div>

  <script src="/js/app.js"></script>
</body>

</html>