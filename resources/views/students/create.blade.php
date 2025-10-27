<!DOCTYPE html>
<html>
<head>
    <title>Add Student</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

<nav class="navbar">
    <h2>Student Manager</h2>
    <div class="nav-links">
        <a href="{{ route('students.index') }}">Home</a>
        <a href="{{ route('students.create') }}">Add Student</a>
    </div>
</nav>

<div class="form-box">
    <h1>Add New Student</h1>

    @if($errors->any())
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ route('students.store') }}" method="POST">
        @csrf
        <input type="text" name="studentNumber" placeholder="Student Number" value="{{ old('studentNumber') }}" required>
        <input type="text" name="lname" placeholder="Last Name" value="{{ old('lname') }}" required>
        <input type="text" name="fname" placeholder="First Name" value="{{ old('fname') }}" required>
        <input type="text" name="mi" placeholder="MI" value="{{ old('mi') }}">
        <input type="email" name="email" placeholder="Email" value="{{ old('email') }}">
        <input type="text" name="contactNumber" placeholder="Contact Number" value="{{ old('contactNumber') }}">
        <button type="submit">Save</button>
    </form>
</div>

</body>
</html>