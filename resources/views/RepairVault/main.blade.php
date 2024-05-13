@include('shered.html')
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
<body>


@include('shered.nav')






<div class="container">
@foreach($services as $service)
        @if($loop->index % 4 == 0)
            <div class="row">
        @endif
            <div class="col border">
                <img src="{{ asset('storage/img/' .$service->img) }}" alt="zbita szybka" width="250px" height="250px">
               
                <h2>{{ $service->name }}</h2>
                <p>{{ $service->description }}</p>
                <p>{{ $service->price }} zł</p>
                @can('is-admin') 
               <p> <a href="{{ route('RepairVault.edit', $service->id) }}" class="btn btn-primary btn-sm">Edit</a></p>
               <p> <form action="{{ route('RepairVault.destroy', $service->id) }}" method="POST" >
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
            
                </p>
                @endcan
            </div>
        @if($loop->index % 4 == 3 || $loop->last)
            </div>
        @endif
    @endforeach
    @can('is-admin') 
<a href="{{ route('RepairVault.create') }}" class="btn btn-primary">Create</a>
@endcan
</div>



@include('shered.footer')


</body>
</html>
