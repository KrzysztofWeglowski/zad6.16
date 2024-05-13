<!-- repairs/edit.blade.php -->
@can('is-admin')
@include('shered.html')
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
<body>

<h1>Edytuj Servis</h1>

<form method="POST" action="{{ route('RepairVault.update', $service->id) }}">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label for="name">Nazwa:</label>
        <input type="text" step="0.01" name="name" id="name" value="{{ old('name', $service->name) }}" class="form-control">
    </div>

    <div class="form-group">
        <label for="description">Opis:</label>
        <input type="text" step="0.01" name="description" id="description" value="{{ old('description', $service->description) }}" class="form-control">
    </div>

    <div class="form-group">
        <label for="price">koszt:</label>
        <input type="number" step="0.01" name="price" id="price" value="{{ old('price', $service->price) }}" class="form-control">
    </div>
   
    <div class="form-group">
        <label for="img">obraz:</label>
        <input type="text" step="0.01" name="img" id="img" value="{{ old('img', $service->img) }}" class="form-control">
    </div>

    <button type="submit" class="btn btn-primary">Update</button>
</form>

</body>
</html>
@endcan