@extends('shered.html')

<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">

<body>
    @include('shered.nav')
    <div class="container">
        <h1>Stwórz Naprawę</h1>

        <form action="{{ route('repairs.store') }}" method="POST" id="repairForm" novalidate>
            @csrf

            <div class="form-group">
                <label for="client_name">Imię i nazwisko klienta</label>
                <input type="text" class="form-control @error('client_name') is-invalid @enderror" id="client_name" name="client_name" required maxlength="255" value="{{ old('client_name') }}">
                @error('client_name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="client_email">Email klienta</label>
                <input type="email" class="form-control @error('client_email') is-invalid @enderror" id="client_email" name="client_email" required maxlength="255" value="{{ old('client_email') }}">
                @error('client_email')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="client_phone">Telefon klienta</label>
                <input type="number" class="form-control @error('client_phone') is-invalid @enderror" id="client_phone" name="client_phone" required min="100000000" max="999999999999999" value="{{ old('client_phone') }}">
                @error('client_phone')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="client_address">Adres klienta</label>
                <input type="text" class="form-control @error('client_address') is-invalid @enderror" id="client_address" name="client_address" required maxlength="255" value="{{ old('client_address') }}">
                @error('client_address')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="device_model">Model urządzenia</label>
                <select class="form-control @error('device_model') is-invalid @enderror" id="device_model" name="device_model" required>
                    @foreach (\App\Models\Device::distinct('model')->pluck('model') as $model)
                        <option value="{{ $model }}" {{ old('device_model') == $model ? 'selected' : '' }}>{{ $model }}</option>
                    @endforeach
                </select>
                @error('device_model')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="device_brand">Marka urządzenia</label>
                <select class="form-control @error('device_brand') is-invalid @enderror" id="device_brand" name="device_brand" required>
                    @foreach (\App\Models\Device::distinct('brand')->pluck('brand') as $brand)
                        <option value="{{ $brand }}" {{ old('device_brand') == $brand ? 'selected' : '' }}>{{ $brand }}</option>
                    @endforeach
                </select>
                @error('device_brand')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="device_serial_number">Numer seryjny urządzenia</label>
                <input type="text" class="form-control @error('device_serial_number') is-invalid @enderror" id="device_serial_number" name="device_serial_number" required maxlength="255" value="{{ old('device_serial_number') }}">
                @error('device_serial_number')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="device_warranty_expiry_date">Data wygaśnięcia gwarancji urządzenia</label>
                <input type="date" class="form-control @error('device_warranty_expiry_date') is-invalid @enderror" id="device_warranty_expiry_date" name="device_warranty_expiry_date" required value="{{ old('device_warranty_expiry_date') }}">
                @error('device_warranty_expiry_date')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="device_warranty_provider">Dostawca gwarancji urządzenia</label>
                @foreach (\App\Models\Device::distinct('warranty_provider')->pluck('warranty_provider') as $provider)
                    <div class="form-check">
                        <input class="form-check-input @error('device_warranty_provider') is-invalid @enderror" type="radio" name="device_warranty_provider" id="device_warranty_provider_{{ $provider }}" value="{{ $provider }}" required {{ old('device_warranty_provider') == $provider ? 'checked' : '' }}>
                        <label class="form-check-label" for="device_warranty_provider_{{ $provider }}">
                            {{ $provider }}
                        </label>
                    </div>
                @endforeach
                @error('device_warranty_provider')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="device_warranty_claim_number">Numer gwarancji urządzenia</label>
                <input type="text" class="form-control @error('device_warranty_claim_number') is-invalid @enderror" id="device_warranty_claim_number" name="device_warranty_claim_number" required maxlength="255" value="{{ old('device_warranty_claim_number') }}">
                @error('device_warranty_claim_number')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="description">Opis</label>
                <input type="text" class="form-control @error('description') is-invalid @enderror" id="description" name="description" required maxlength="255" value="{{ old('description') }}">
                @error('description')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="repair_date">Data naprawy</label>
                <input type="date" class="form-control @error('repair_date') is-invalid @enderror" id="repair_date" name="repair_date" required value="{{ old('repair_date') }}">
                @error('repair_date')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="repair_cost">Koszt naprawy</label>
                <input type="number" class="form-control @error('repair_cost') is-invalid @enderror" id="repair_cost" name="repair_cost" required min="0" step="0.01" value="{{ old('repair_cost') }}">
                @error('repair_cost')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Stwórz</button>
        </form>
    </div>
    @include('shered.footer')

</body>
</html>
