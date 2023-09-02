{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <title>Students Table List</title>
</head>
<body> --}}
    @extends('layout')

    @section('header')
        <h2>List of Students</h2>
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{$message}}</p>
            </div>
        @endif
    @endsection

    @section('content')
        <div class="container">
            
            <div class="container">
                <table class="table table-striped ">
                    <thead>
                        <tr>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Gender</th>
                            <th>Age</th>
                            <th>Birthday</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($students as $student)
                            <tr>
                                <td>{{ $student->first_name }}</td>
                                <td>{{ $student->last_name }}</td>
                                <td>{{ $student->gender }}</td>
                                <td>{{ $student->age }}</td>
                                <td>{{ $student->birthday }}</td>
                                <td>{{ $student->email }}</td>
                                <td>{{ $student->address }}</td>
                                <td>
                                    <form action="{{route('destroy', $student->id)}}" method="POST">
                                        {{-- Show Button --}}
                                        <a href="{{route('show', $student->id)}}" class="btn btn-warning" type="submit"><i class="bi bi-eye"></i></a>
                                        {{-- Edit Button --}}
                                        <a href="{{route('edit', $student->id)}}" class="btn btn-success" type="submit"><i class="bi bi-pencil-square"></i></a>
                                        {{-- Delete Button --}}
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger" type="submit"><i class="bi bi-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <a class="btn btn-success" href="{{route('students.create')}}">Add Students</a>
            </div>
        </div>
    @endsection
    

    <!-- Bootstrap Script -->
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>
</html> --}}