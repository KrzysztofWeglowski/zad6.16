@include('shered.html')
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
<body>


@include('shered.nav')



<div class="container mt-5">

    <div class="row mb-3">
        <div class="col">
        @can('is-admin')
            
      
            <a href="{{ route('RepairVault.create') }}" class="btn btn-primary">Create</a>
            @endcan
        </div>
        <div class="col-auto">
            <form action="{{ route('RepairVault.search') }}" method="GET" class="form-inline">
                @csrf
                <input type="search" name="search" class="form-control mr-2" placeholder="Search...">
                <button type="submit" class="btn btn-danger">Search</button>
                <button type="submit" class="btn btn-danger ml-2" name="reset" value="">Reset search</button>
            </form>
        </div>
    </div>

    <div class="row">
        @foreach($services as $service)
            <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                <div class="card h-100">
                    <img src="{{ asset('storage/images/' .$service->img) }}" class="card-img-top" alt="zbita szybka">
                    <div class="card-body">
                        <h5 class="card-title">{{ $service->name }}</h5>
                        <p class="card-text">{{ $service->description }}</p>
                        <p class="card-text">{{ $service->price }} zł</p>
                    </div>
                    <div class="card-footer">
                        @can('is-admin') 
                            <a href="{{ route('RepairVault.edit', $service->id) }}" class="btn btn-primary btn-sm mr-1">Edit</a>
                            <form action="{{ route('RepairVault.destroy', $service->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        @endcan
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

@include('shered.footer')


</body>
</html>
