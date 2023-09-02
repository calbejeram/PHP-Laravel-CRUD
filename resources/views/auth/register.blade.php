@extends('auth.layout')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h1>Registration Form</h1>
            </div>
            <div class="card-body">
                <form action="{{ route('store') }}" method="POST">
                    @csrf
                    <fieldset>
                        <div class="mb-3">
                            <label for="name" class="form-label">Name:</label>
                            <input type="text" name="name" id="name" class="form-control" placeholder="e.g. Juan Tamad">
                            @if ($errors->has('name'))
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email:</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="e.g. juantamad@gmail.com">
                            @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password:</label>
                            <input type="password" name="password" id="password" class="form-control" placeholder="Create a strong password">
                            @if ($errors->has('password'))
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="confirmPassword" class="form-label">Confirm Password:</label>
                            <input type="password" name="password_confirmation" id="confirmPassword" class="form-control" placeholder="Confirm your Password">
                        </div>
                        <button class="btn btn-success" type="submit">Create Account</button>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
@endsection