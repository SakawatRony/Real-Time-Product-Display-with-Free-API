<!DOCTYPE html>
<html lang="en">
<head>
  <title>Product Records</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2><a href="{{ route('product')}}" class="btn btn-info">API Products</a></h2>
        <h2>Database Products</h2>
          <table class="table">
            <thead>
              <tr>
                <th>Name</th>
                <th>Description</th>
                <th>Price</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody id="records">
                @foreach ($products as $product)
                <tr>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->description }}</td>
                    <td>{{ $product->price }}</td>
                    <td>
                        <a class="btn btn-primary">Update</a>
                    </td>
                  </tr>
                @endforeach
            </tbody>
          </table>
        </div>
</body>
<script src="https://js.pusher.com/8.4.0/pusher.min.js"></script>
  <script>

    // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;

    var pusher = new Pusher('1692509c71879cd62b80', {
      cluster: 'ap2'
    });

    var channel = pusher.subscribe('my-channel');
    channel.bind('my-event', function(data) {
      let html = '<tbody id="records">';
      $.each(data, function(i,v) {
        console.log(v.length);
        for(let i = 0; i < v.length; i++) {
            if(typeof v[i].name != 'undefined') {
                console.log(v[i].name, "efe" );
                html += `<tr id="records">
                    <td>${ v[i].name }</td>
                    <td>${ v[i].description }</td>
                    <td>${ v[i].price }</td>
                    <td>
                        <a class="btn btn-primary">Update</a>
                    </td>
                  </tr>`;
            }

        }
      });
       html += '</tbody>';
      $('#records').replaceWith(html);

    });
  </script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  </html>
