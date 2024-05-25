@can('is-admin')
@extends('shered.html')

<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">

<body>
    @include('shered.nav')

    <div class="container">
        <h1>Stwórz Serwis</h1>

        <form action="{{ route('RepairVault.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="name">Nazwa:</label>
                <input type="text" name="name" id="name" class="form-control">
            </div>

            <div class="form-group">
                <label for="description">Opis:</label>
                <input type="text" name="description" id="description" class="form-control">
            </div>

            <div class="form-group">
                <label for="price">Koszt:</label>
                <input type="number" name="price" id="price" class="form-control">
            </div>

            <div class="form-group">
                <label for="img">Obraz:</label>
                <input type="file" name="img" id="img" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary">Utwórz</button>
        </form>
    </div>

    @include('shered.footer')
</body>
</html>
@endcan
