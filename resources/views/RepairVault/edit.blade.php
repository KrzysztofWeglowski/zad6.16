<!-- repairs/edit.blade.php -->

@can('is-admin')
    @include('shered.html')
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
    <body>

    <h1>Edit Service</h1>

    <form method="POST" action="{{ route('RepairVault.update', $service->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" value="{{ old('name', $service->name) }}" class="form-control">
        </div>

        <div class="form-group">
            <label for="description">Description:</label>
            <input type="text" name="description" id="description" value="{{ old('description', $service->description) }}" class="form-control">
        </div>

        <div class="form-group">
            <label for="price">Price:</label>
            <input type="number" step="0.01" name="price" id="price" value="{{ old('price', $service->price) }}" class="form-control">
        </div>

        <div class="form-group">
            <label for="img">Image:</label>
            <input type="file" name="img" id="img" class="form-control">
            @if($service->img)
                <img src="{{ asset('storage/images/'. $service->img) }}" alt="Service Image" width="100">
            @endif
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>

    </body>
@endcan