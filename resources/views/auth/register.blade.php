<form method="POST" action="{{ route('register') }}">
    @csrf
    <label for="name">Name</label>
    <input type="text" name="name" required>
    <br>
    <label for="email">Email</label>
    <input type="email" name="email" required>
    <br>
    <label for="password">Password</label>
    <input type="password" name="password" required>
    <br>
    <label for="password_confirmation">Confirm Password</label>
    <input type="password" name="password_confirmation" required>
    <br>
    <button type="submit">Register</button>
</form>