@include('shered.html')
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">

<body>

@include('shered.nav')

<div class="container-fluid">
    @can('is-admin')
    
    <div class="container">
        <form class="form-inline my-2 my-lg-0" action="{{ route('repairs.index') }}" method="GET">
            <input class="form-control mr-sm-2" type="search" name="search" placeholder="Szukaj" aria-label="Szukaj">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Szukaj</button>
            <button class="btn btn-outline-secondary my-2 my-sm-0 ml-2" type="submit">Resetuj</button>
        </form>
        <div class="row">
            <div class="col-lg-12 mb-3 mt-3">
                <a href="{{ route('repairs.create') }}" class="btn btn-primary">Stwórz</a>
            </div>
            @foreach($repairs as $repair)
            <div class="col-lg-6 mb-3">
                <div class="card">
                    <div class="card-header text-white bg-secondary">
                        <h5 class="card-title">{{ $repair->device->client->name }}</h5>
                    </div>
                    <div class="card-body bg-light">
                        <p class="card-text">
                            <strong>Email:</strong> {{ $repair->device->client->email }}<br>
                            <strong>Telefon:</strong> {{ $repair->device->client->phone }}<br>
                            <strong>Adres:</strong> {{ $repair->device->client->address }}<br>
                            <strong>Marka:</strong> {{ $repair->device->brand }}<br>
                            <strong>Model:</strong> {{ $repair->device->model }}<br>
                            <strong>Numer seryjny:</strong> {{ $repair->device->serial_number }}<br>
                            <strong>Koniec gwarancji:</strong> {{ $repair->device->warranty_expiry_date }}<br>
                            <strong>Numer gwarancji:</strong> {{ $repair->device->warranty_claim_number }}<br>
                            <strong>Dostawca gwarancji:</strong> {{ $repair->device->warranty_provider }}<br>
                            <strong>Opis naprawy:</strong> {{ $repair->description }}<br>
                            <strong>Data naprawy:</strong> {{ $repair->repair_date }}<br>
                            <strong>Koszt:</strong> {{ $repair->repair_cost }}<br>
                        </p>
                        <p class="card-text">
                            <a href="{{ route('repairs.edit', $repair->id) }}" class="btn btn-primary btn-sm">Edytuj</a>
                            <form action="{{ route('repairs.destroy', $repair->id) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Usuń</button>
                            </form>
                        </p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    @else
    <div class="container">
        <a class="nav-link" href="{{ route('login') }}">Zaloguj się...</a>
    </div>
    @endcan
</div>

@include('shered.footer')

</body>

</html>
