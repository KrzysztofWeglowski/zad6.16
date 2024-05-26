@extends('shered.html')
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">

<body>
@include('shered.nav')

<div class="container mt-5">
    <div class="row mb-3">
        <div class="col">
        <form action="{{ route('RepairVault.search') }}" method="GET" class="form-inline mb-2">
    @csrf
    <input type="search" name="search" class="form-control mr-2" placeholder="Szukaj...">
    <button type="submit" class="btn btn-danger mt-2" name="submit" value="search">Szukaj</button>
    <a href="{{ route('RepairVault.main') }}" class="btn btn-secondary ml-2 mt-2">Resetuj wyszukiwanie</a>
</form>

            @can('is-admin')
                <a href="{{ route('RepairVault.create') }}" class="btn btn-primary btn-block mb-2">Stwórz</a>
            @endcan
        </div>
    </div>

    <div class="row">
        @foreach($services as $service)
            <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                <div class="card h-100">
                    <img src="{{ asset('storage/images/' . $service->img) }}" class="card-img-top img-fluid" alt="{{ $service->name }}">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">{{ $service->name }}</h5>
                        <p class="card-text">{{ $service->description }}</p>
                        <p class="card-text">{{ $service->price }} zł</p>
                    </div>
                    <div class="card-footer">
                        @can('is-admin')
                            <a href="{{ route('RepairVault.edit', $service->id) }}" class="btn btn-primary btn-sm mb-1 btn-block">Edytuj</a>
                            <form action="{{ route('RepairVault.destroy', $service->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm btn-block">Usuń</button>
                            </form>
                        @endcan
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

@include('shered.footer')

</body>
</html>
