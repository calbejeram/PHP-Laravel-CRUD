{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <title>Add Students</title>
</head>
<body> --}}
    @extends('layout')

    @section('header')
        <h1>Add new Student</h1>
        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Errors Encountered</strong>
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    @endsection

    @section('content')
        <div class="container" style="height: 100vh">
            
            <div class="row">
                <form action="{{route('students.store')}}" method="POST">
                    @csrf
                    <fieldset>
                        <div class="mb-3">
                            <label for="firstName">First Name:</label>
                            <input type="text" name="first_name" id="first_name" placeholder="e.g. Juan" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="lastName">Last Name:</label>
                            <input type="text" name="last_name" id="last_name" placeholder="e.g. Tamad" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="gender">Gender:</label>
                            <select name="gender" id="gender" class="form-select">
                                <option value="" readonly>Select your Gender</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="age">Age:</label>
                            <input type="number" name="age" id="age" placeholder="e.g. 23" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="birthday">Birthday:</label>
                            <input type="date" name="birthday" id="birthday" placeholder="e.g. 00/00/00" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="email">Email:</label>
                            <input type="email" name="email" id="email" placeholder="e.g. youremail@email.com" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="address">Address:</label>
                            <input type="text" name="address" id="address" placeholder="e.g. House/Province/City/Brgy/Flr, Unit." class="form-control">
                        </div>
                        <button class="btn btn-success" type="submit">Add Student</button>
                    </fieldset>
                </form>
            </div>
        </div>
    @endsection
    

    <!-- Bootstrap Script -->
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>
</html> --}}