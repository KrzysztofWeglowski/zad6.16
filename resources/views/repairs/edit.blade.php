<!-- repairs/edit.blade.php -->
@can('is-admin')
@include('shered.html')
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
<body>

<h1>Edytuj Repair</h1>

<form method="POST" action="{{ route('repairs.update', $repair->id) }}">
    @csrf
    @method('PUT')

    <div class="form-group">
    <label for="device_client_name">Imie nazwisko:</label>
    <input type="text" name="device[client][name]" id="device_client_name" value="{{ old('device.client.name', $repair->device->client->name) }}" class="form-control">
</div>
<div class="form-group">
    <label for="device_client_email">Email:</label>
    <input type="email" name="device[client][email]" id="device_client_email" value="{{ old('device.client.email', $repair->device->client->email) }}" class="form-control">
</div>

<div class="form-group">
    <label for="device_client_phone">phone</label>
    <input type="tel" name="device[client][phone]" id="device_client_phone" value="{{ old('device.client.phone', $repair->device->client->phone) }}" class="form-control">
</div>

<div class="form-group">
    <label for="device_client_address">adress:</label>
    <input type="tel" name="device[client][address]" id="device_client_address" value="{{ old('device.client.address', $repair->device->client->address) }}" class="form-control">
</div>



<div class="form-group">
        <label for="device_brand">marka:</label>
        <input type="text" name="device[brand]" id="device_brand" value="{{ old('device.brand', $repair->device->brand) }}" class="form-control">
    </div>

    <div class="form-group">
        <label for="device_model">model:</label>
        <input type="text" name="device[model]" id="device_model" value="{{ old('device.model', $repair->device->model) }}" class="form-control">
    </div>



    <div class="form-group">
    <label for="device_serial_number">numer seryjny:</label>
    <input type="text" name="device[serial_number]" id="device_serial_number" value="{{ old('device.serial_number', $repair->device->serial_number) }}" class="form-control">
</div>

<div class="form-group">
    <label for="device_warranty_expiry_date">Koniec gwarancji:</label>
    <input type="date" name="device[warranty_expiry_date]" id="device_warranty_expiry_date" value="{{ old('device.warranty_expiry_date', $repair->device->warranty_expiry_date) }}" class="form-control">
</div>

<div class="form-group">
    <label for="device_warranty_claim_number">numer gwarancji:</label>
    <input type="text" name="device[warranty_claim_number]" id="device_warranty_claim_number" value="{{ old('device.warranty_claim_number', $repair->device->warranty_claim_number) }}" class="form-control">
</div>


<div class="form-group">
    <label for="device_warranty_provider">Dostawca gwarancji</label>
    <input type="text" name="device[warranty_provider]" id="device_warranty_provider" value="{{ old('device.warranty_provider', $repair->device->warranty_provider) }}" class="form-control">
</div>





<div class="form-group">
        <label for="description">opis naprawy:</label>
        <input type="text" name="description" id="description" value="{{ old('description', $repair->description) }}" class="form-control">
    </div>

    <div class="form-group">
        <label for="repair_date">data naprawy:</label>
        <input type="date" name="repair_date" id="repair_date" value="{{ old('repair_date', $repair->repair_date) }}" class="form-control">
    </div>

    <div class="form-group">
        <label for="repair_cost">koszt:</label>
        <input type="number" step="0.01" name="repair_cost" id="repair_cost" value="{{ old('repair_cost', $repair->repair_cost) }}" class="form-control">
    </div>



    <button type="submit" class="btn btn-primary">Update</button>
</form>

</body>
</html>
@endcan