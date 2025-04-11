<!DOCTYPE html>
<html lang="en">
<head>
  <title>Products</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>
<body>

<div class="container">
<h2><a href="{{ route('product.db')}}" class="btn btn-info">Database Records</a></h2>
<h2>Products</h2>
  <table class="table">
    <thead>
      <tr>
        <th>Name</th>
        <th>Description</th>
        <th>Price</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($products as $product)
        <tr>
            <td>{{ $product['title'] }}</td>
            <td>{{ $product['description'] }}</td>
            <td>{{ $product['price'] }}</td>
            <td>
                <a class="btn btn-primary add-to-db" data-name='{{ $product['title'] }}' data-description='{{ $product['description'] }}' data-price='{{ $product['price'] }}' data-url='{{ route('product.store')}}'>Add to database</a>
            </td>
          </tr>
        @endforeach
    </tbody>
  </table>
</div>

</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script>
    $(document).on('click', '.add-to-db', function () {
        let name = $(this).attr("data-name");
        let description = $(this).attr("data-description");
        let price = $(this).attr("data-price");
        let url = $(this).attr("data-url");
        var token = '{!! csrf_token() !!}';
        $.ajax({
            url: url,
            data: {
                name: name,
                description: description,
                price: price,
                "_token": token
            },
            type: 'post',
            dataType: 'JSON',
            success: function (data) {
                alert('Product added successfully');
            }
        });


    });
</script>
</html>
