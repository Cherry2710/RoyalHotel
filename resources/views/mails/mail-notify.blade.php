<body>
  <div>
    <h2>{{ $data['type'] }}</h2>
    <p>Royal Hotel respectfully greet,</p>
    <p><b>{{ $data['thanks'] }}</b></p>
    
    <p>Your booking: </p>
    <p>{{ $data['hotelname'] }}</p>
    <p>{{ $data['address'] }}</p>
    <p>{{ $data['typename'] }}</p>
    <p>{{ $data['price'] }}</p>
    <p>{{ $data['quantity'] }}</p>
    <p>{{ $data['arrival'] }}</p>
    <p>{{ $data['duration'] }}</p>
    <p>{{ $data['total'] }}</p>
    <p>{{ $data['payment_method'] }}</p>
  </div>
</body>
