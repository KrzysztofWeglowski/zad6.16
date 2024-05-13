

@include('shered.html')
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
<body>

@include('shered.nav')
@can('is-admin') 
<div class="container">
  <div class="row">
    @foreach($repairs as $repair)
    <div class="col-md-6 mb-3">
      <div class="card">
        <div class="card-header text-white bg-secondary">
          <h5 class="card-title ">Imie nazwisko: {{ $repair->device->client->name }}</h5>
        </div>
        <div class="card-body bg-light">
          <p class="card-text">
            
            <strong>Email:</strong> {{ $repair->device->client->email }}<br>
            <strong>Phone:</strong> {{ $repair->device->client->phone }}<br>
            <strong>Address:</strong> {{ $repair->device->client->address }}<br>
            <strong>Marka:</strong> {{ $repair->device->brand }}<br>
            <strong>Model:</strong> {{ $repair->device->model }}<br>
            <strong>Serial Number:</strong> {{ $repair->device->serial_number }}<br>
            <strong>Koniec gwarancji:</strong> {{ $repair->device->warranty_expiry_date }}<br>
            <strong>Numer gwarancji:</strong> {{ $repair->device->warranty_claim_number }}<br>
            <strong>Dostawca gwarancji:</strong> {{ $repair->device->warranty_provider }}<br>
            <strong>Opis naprawy:</strong> {{ $repair->description }}<br>
            <strong>Data naprawy:</strong> {{ $repair->repair_date }}<br>
            <strong>Koszt:</strong> {{ $repair->repair_cost }}<br>
          </p>
          <p class="card-text">
            <a href="{{ route('repairs.edit', $repair->id) }}" class="btn btn-primary btn-sm">Edit</a>
            <form action="{{ route('repairs.destroy', $repair->id) }}" method="POST" style="display: inline-block;">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-danger btn-sm">Delete</button>
            </form>
          </p>
        </div>
      </div>
    </div>
    @endforeach
  </div>


  <a href="{{ route('repairs.create') }}" class="btn btn-primary">Create</a>
</div>

@else

<a class="nav-link" href="{{ route('login') }}">Zaloguj się...</a>

@endcan



@include('shered.footer')

</body>
</html>

