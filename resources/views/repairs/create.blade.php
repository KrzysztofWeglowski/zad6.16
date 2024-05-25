<!-- resources/views/repairs/create.blade.php -->
@can('is-admin')
    

@extends('shered.html')

<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">

<body>

    @include('shered.nav')
    <div class="container">
    <h1>Stwórz Naprawę</h1>

    <form action="{{ route('repairs.store') }}" method="POST" id="repairForm">
        @csrf

        <div class="form-group">
            <label for="client_name">Imię i nazwisko klienta</label>
            <input type="text" class="form-control" id="client_name" name="client_name" required maxlength="255">
        </div>

        <div class="form-group">
            <label for="client_email">Email klienta</label>
            <input type="email" class="form-control" id="client_email" name="client_email" required maxlength="255">
        </div>

        <div class="form-group">
            <label for="client_phone">Telefon klienta</label>
            <input type="number" class="form-control" id="client_phone" name="client_phone" required min="100000000" max="999999999999999">
        </div>

        <div class="form-group">
            <label for="client_address">Adres klienta</label>
            <input type="text" class="form-control" id="client_address" name="client_address" required maxlength="255">
        </div>

        <div class="form-group">
            <label for="device_model">Model urządzenia</label>
            <select class="form-control" id="device_model" name="device_model" required>
                @foreach (\App\Models\Device::distinct('model')->pluck('model') as $model)
                <option value="{{ $model }}">{{ $model }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="device_brand">Marka urządzenia</label>
            <select class="form-control" id="device_brand" name="device_brand" required>
                @foreach (\App\Models\Device::distinct('brand')->pluck('brand') as $brand)
                <option value="{{ $brand }}">{{ $brand }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="device_serial_number">Numer seryjny urządzenia</label>
            <input type="text" class="form-control" id="device_serial_number" name="device_serial_number" required maxlength="255">
        </div>

        <div class="form-group">
            <label for="device_warranty_expiry_date">Data wygaśnięcia gwarancji urządzenia</label>
            <input type="date" class="form-control" id="device_warranty_expiry_date" name="device_warranty_expiry_date" required>
        </div>

        <div class="form-group">
            <label for="device_warranty_provider">Dostawca gwarancji urządzenia</label>
            @foreach (\App\Models\Device::distinct('warranty_provider')->pluck('warranty_provider') as $provider)
            <div class="form-check">
                <input class="form-check-input" type="radio" name="device_warranty_provider" id="device_warranty_provider_{{ $provider }}" value="{{ $provider }}" required>
                <label class="form-check-label" for="device_warranty_provider_{{ $provider }}">
                    {{ $provider }}
                </label>
            </div>
            @endforeach
        </div>

        <div class="form-group">
            <label for="device_warranty_claim_number">Numer gwarancji urządzenia</label>
            <input type="text" class="form-control" id="device_warranty_claim_number" name="device_warranty_claim_number" required maxlength="255">
        </div>

        <div class="form-group">
            <label for="description">Opis</label>
            <input type="text" class="form-control" id="description" name="description" required maxlength="255">
        </div>

        <div class="form-group">
            <label for="repair_date">Data naprawy</label>
            <input type="date" class="form-control" id="repair_date" name="repair_date" required>
        </div>

        <div class="form-group">
            <label for="repair_cost">Koszt naprawy</label>
            <input type="number" class="form-control" id="repair_cost" name="repair_cost" required min="0" step="0.01">
        </div>

        <button type="submit" class="btn btn-primary">Stwórz</button>
    </form>
    </div>
    @include('shered.footer')

    <script>
        document.getElementById('repairForm').addEventListener('submit', function(event) {
            // Custom validation logic (if any) can go here
            if (!this.checkValidity()) {
                event.preventDefault();
                event.stopPropagation();
                alert('Proszę wypełnić wszystkie wymagane pola poprawnie.');
            }
            this.classList.add('was-validated');
        }, false);
    </script>

</body>
</html>
@endcan
