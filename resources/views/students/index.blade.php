<!DOCTYPE html>
<html>
<head>
    <title>Students List</title>
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

<div class="list-box">
    <h1>Students List</h1>

    @if(session('success'))
        <p class="success-message">{{ session('success') }}</p>
    @endif

    <ul class="student-list">
        @foreach($students as $student)
            <li class="student-item">
                <span class="student-info">{{ $student->studentNumber }} - {{ $student->lname }}, {{ $student->fname }}</span>
                <div class="actions">
                    <a href="{{ route('students.edit', $student->id) }}" class="btn btn-edit">Edit</a>
                    <form action="{{ route('students.destroy', $student->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-delete" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </div>
            </li>
        @endforeach
    </ul>
</div>

</body>
</html>