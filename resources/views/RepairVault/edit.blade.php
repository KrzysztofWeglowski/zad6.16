@can('is-admin')
@extends('shered.html')

<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">

<body>
    @include('shered.nav')

    <div class="container">
        <h1>Edytuj Serwis</h1>

        <form method="POST" action="{{ route('RepairVault.update', $service->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Nazwa:</label>
                <input type="text" name="name" id="name" value="{{ old('name', $service->name) }}" class="form-control">
            </div>

            <div class="form-group">
                <label for="description">Opis:</label>
                <input type="text" name="description" id="description" value="{{ old('description', $service->description) }}" class="form-control">
            </div>

            <div class="form-group">
                <label for="price">Koszt:</label>
                <input type="number" name="price" id="price" value="{{ old('price', $service->price) }}" class="form-control">
            </div>

            <div class="form-group">
                <label for="img">Obraz:</label>
                <input type="file" name="img" id="img" class="form-control">
                @if($service->img)
                    <img src="{{ asset('storage/images/' . $service->img) }}" alt="Obraz usługi" width="100">
                @endif
            </div>

            <button type="submit" class="btn btn-primary">Zaktualizuj</button>
        </form>
    </div>

    @include('shered.footer')
</body>
</html>
@endcan
