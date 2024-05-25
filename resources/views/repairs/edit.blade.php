<!-- repairs/edit.blade.php -->
@can('is-admin')
@include('shered.html')
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
<body>
@include('shered.nav')
<div class="container">
<h1>Edytuj Naprawę</h1>

<form method="POST" action="{{ route('repairs.update', $repair->id) }}" id="repairEditForm">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label for="device_client_name">Imię i nazwisko:</label>
        <input type="text" name="device[client][name]" id="device_client_name" value="{{ old('device.client.name', $repair->device->client->name) }}" class="form-control" required maxlength="255">
    </div>
    <div class="form-group">
        <label for="device_client_email">Email:</label>
        <input type="email" name="device[client][email]" id="device_client_email" value="{{ old('device.client.email', $repair->device->client->email) }}" class="form-control" required maxlength="255">
    </div>
    <div class="form-group">
        <label for="device_client_phone">Telefon:</label>
        <input type="number" name="device[client][phone]" id="device_client_phone" value="{{ old('device.client.phone', $repair->device->client->phone) }}" class="form-control" required min="100000000" max="999999999999999">
    </div>
    <div class="form-group">
        <label for="device_client_address">Adres:</label>
        <input type="text" name="device[client][address]" id="device_client_address" value="{{ old('device.client.address', $repair->device->client->address) }}" class="form-control" required maxlength="255">
    </div>

    <div class="form-group">
        <label for="device_brand">Marka:</label>
        <select name="device[brand]" id="device_brand" class="form-control" required>
            @foreach ($deviceBrands as $brand)
                <option value="{{ $brand }}" {{ old('device.brand', $repair->device->brand) == $brand ? 'selected' : '' }}>{{ $brand }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="device_model">Model:</label>
        <select name="device[model]" id="device_model" class="form-control" required>
            @foreach ($deviceModels as $model)
                <option value="{{ $model }}" {{ old('device.model', $repair->device->model) == $model ? 'selected' : '' }}>{{ $model }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="device_serial_number">Numer seryjny:</label>
        <input type="text" name="device[serial_number]" id="device_serial_number" value="{{ old('device.serial_number', $repair->device->serial_number) }}" class="form-control" required maxlength="255">
    </div>
    <div class="form-group">
        <label for="device_warranty_expiry_date">Koniec gwarancji:</label>
        <input type="date" name="device[warranty_expiry_date]" id="device_warranty_expiry_date" value="{{ old('device.warranty_expiry_date', $repair->device->warranty_expiry_date) }}" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="device_warranty_claim_number">Numer gwarancji:</label>
        <input type="text" name="device[warranty_claim_number]" id="device_warranty_claim_number" value="{{ old('device.warranty_claim_number', $repair->device->warranty_claim_number) }}" class="form-control" required maxlength="255">
    </div>
    <div class="form-group">
        <label for="device_warranty_provider">Dostawca gwarancji:</label>
        @foreach ($warrantyProviders as $provider)
            <div class="form-check">
                <input type="radio" name="device[warranty_provider]" id="device_warranty_provider_{{ $provider }}" value="{{ $provider }}" {{ old('device.warranty_provider', $repair->device->warranty_provider) == $provider ? 'checked' : '' }} required>
                <label for="device_warranty_provider_{{ $provider }}">{{ $provider }}</label>
            </div>
        @endforeach
    </div>

    <div class="form-group">
        <label for="description">Opis naprawy:</label>
        <input type="text" name="description" id="description" value="{{ old('description', $repair->description) }}" class="form-control" required maxlength="255">
    </div>
    <div class="form-group">
        <label for="repair_date">Data naprawy:</label>
        <input type="date" name="repair_date" id="repair_date" value="{{ old('repair_date', $repair->repair_date) }}" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="repair_cost">Koszt:</label>
        <input type="number" step="0.01" name="repair_cost" id="repair_cost" value="{{ old('repair_cost', $repair->repair_cost) }}" class="form-control" required min="0">
    </div>

    <button type="submit" class="btn btn-primary">Zaktualizuj</button>
</form>
</div>
@include('shered.footer')

<script>
    document.getElementById('repairEditForm').addEventListener('submit', function(event) {
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
