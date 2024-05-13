<!-- resources/views/repairs/create.blade.php -->
@can('is-admin')
    

@extends('shered.html')

<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">

<body>

    @include('shered.nav')

    <h1>Stwórz Repair</h1>

    <form action="{{ route('repairs.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="client_name">clienta Imie i nazwisko</label>
            <input type="text" class="form-control" id="client_name" name="client_name">
        </div>

        <div class="form-group">
            <label for="client_email">clienta email</label>
            <input type="email" class="form-control" id="client_email" name="client_email">
        </div>

        <div class="form-group">
            <label for="client_phone">clienta Telefon</label>
            <input type="text" class="form-control" id="client_phone" name="client_phone">
        </div>

        <div class="form-group">
            <label for="client_address">clienta Adres</label>
            <input type="text" class="form-control" id="client_address" name="client_address">
        </div>



        <div class="form-group">
            <label for="device_model">Urzadzenie Model</label>
            <input type="text" class="form-control" id="device_model" name="device_model">
        </div>

        <div class="form-group">
            <label for="device_brand">Urzadzenie Marka</label>
            <input type="text" class="form-control" id="device_brand" name="device_brand">
        </div>

        <div class="form-group">
            <label for="device_serial_number">Urzadzenie Numer Seryjny</label>
            <input type="text" class="form-control" id="device_serial_number" name="device_serial_number">
        </div>

        <div class="form-group">
            <label for="device_warranty_expiry_date">Urzadzenie Wygaśnięcie gwarancji</label>
            <input type="date" class="form-control" id="device_warranty_expiry_date" name="device_warranty_expiry_date">
        </div>

        <div class="form-group">
            <label for="device_warranty_provider">Urzadzenie Dostawca gwarancji</label>
            <input type="text" class="form-control" id="device_warranty_provider" name="device_warranty_provider">
        </div>

        <div class="form-group">
            <label for="device_warranty_claim_number">Urzadzenie Numer gwarancji</label>
            <input type="text" class="form-control" id="device_warranty_claim_number" name="device_warranty_claim_number">
        </div>

        <div class="form-group">
            <label for="description">Opis</label>
            <input type="text" class="form-control" id="description" name="description">
        </div>

        <div class="form-group">
        <label for="repair_date">Data naprawy</label>
        <input type="date" class="form-control" id="repair_date" name="repair_date">
        </div>

        <div class="form-group">
        <label for="repair_cost">Koszt naprawy</label>
        <input type="number" class="form-control" id="repair_cost" name="repair_cost">
        </div>

        <button type="submit" class="btn btn-primary">Create</button>
    </form>

    @include('shered.footer')

</body>
</html>
@endcan