<!-- resources/views/repairs/create.blade.php -->
@can('is-admin')
    

@extends('shered.html')

<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">

<body>

    @include('shered.nav')

    <h1>Stwórz Servis</h1>

    <form action="{{ route('RepairVault.store') }}" method="POST">
        @csrf

        <div class="form-group">
        <label for="name">Nazwa:</label>
        <input type="text" step="0.01" name="name" id="name"  class="form-control">
    </div>

    <div class="form-group">
        <label for="description">Opis:</label>
        <input type="text" step="0.01" name="description" id="description"  class="form-control">
    </div>

    <div class="form-group">
        <label for="price">koszt:</label>
        <input type="number" step="0.01" name="price" id="price"  class="form-control">
    </div>
   
    <div class="form-group">
        <label for="img">obraz:</label>
        <input type="text" step="0.01" name="img" id="img"  class="form-control">
    </div>


        
        <button type="submit" class="btn btn-primary">Create</button>
    </form>

    @include('shered.footer')

</body>
</html>
@endcan