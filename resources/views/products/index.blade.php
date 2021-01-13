<!DOCTYPE html>
<html lang="en">

<head>
  <title>
    Products
  </title>
  <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    <link rel="icon" href="/imgs/weather.png">
    <link rel="stylesheet" href="{{asset('css/styles.css')}}">
</head>

<body>
  <div class="main-content">
    <h1>Products</h1>
    <header>
      <div class="navbar">
        <a href="/">Products</a>
        <a href="/about">About</a>
        <a href="help">Help</a>
      </div>
    </header>
    <form action="">
      <div class="form-group">
        <label for="name">Product Name:</label><br>
        <input type="text" placeholder="Product name">
      </div>
      <div class="form-group">
        <label for="price">Product Price</label> <br>
        <input type="number" placeholder="Product price">
      </div>
      <div class="form-group">
        <label for="quantity">Product Quantity</label><br>
        <input type="number" placeholder="Product quantity">
      </div>
      <div class="form-group">
        <button>Save</button>
      </div>
    </form>
    @if (count($products) > 0)
      <table>
        <tr>
          <th>#</th>
          <th>Product Name:</th>
          <th>Product Price:</th>
          <th>Product Quantity:</th>
          <th>Actions</th>
        </tr>
        @foreach ($products as $key=>$product)
          <tr>
            <td>{{ ++$key }}</td>
            <td>{{ $product->name }}</td>
            <td>{{ $product->price }}</td>
            <td>{{ $product->quantity }}</td>
            <td>
              <a href="{{ route('products.show', $product) }}">View</a>
            </td>
          </tr>
        @endforeach
      </table>
      @else
      <p class="danger">No products found in the database</p>
    @endif
  </div>

  <script src="/js/app.js"></script>
</body>

</html>