<!DOCTYPE html>
<html>
<head>
    <title>Edit Student</title>
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
    <h1>Edit Student</h1>

    @if($errors->any())
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ route('students.update', $student->id) }}" method="POST">
        @csrf
        @method('PUT')
        <input type="text" name="studentNumber" value="{{ old('studentNumber', $student->studentNumber) }}" required>
        <input type="text" name="lname" value="{{ old('lname', $student->lname) }}" required>
        <input type="text" name="fname" value="{{ old('fname', $student->fname) }}" required>
        <input type="text" name="mi" value="{{ old('mi', $student->mi) }}">
        <input type="email" name="email" value="{{ old('email', $student->email) }}">
        <input type="text" name="contactNumber" value="{{ old('contactNumber', $student->contactNumber) }}">
        <button type="submit">Update</button>
    </form>
</div>

</body>
</html>