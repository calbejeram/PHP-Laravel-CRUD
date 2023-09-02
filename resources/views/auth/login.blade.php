@extends('auth.layout')
@section('content')
    <div class="container w-50">
        <div class="card">
            <div class="card-header">
                <h1>User Login</h1>
            </div>
            <div class="card-body">
                <form action="{{ route('authenticate') }}" method="POST">
                    @csrf
                    <fieldset>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email:</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="e.g. juantamad@gmail.com">
                            @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password:</label>
                            <input type="password" name="password" id="password" class="form-control" placeholder="Enter your password">
                            @if ($errors->has('password'))
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                            @endif
                        </div>
                        <button class="btn btn-success" type="submit">Login</button>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
@endsection