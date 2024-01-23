<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reset Password</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<style>
    body {
        background: #d3d3d3;
    }
    .main {
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .form {
        background: #ffffff;
        width: 25vw;
        padding: 50px 30px;
    }
</style>

<body>
    <div class="main">
        <div class="form text-center">
            <h5>Update Your Password</h5>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if(session()->has('status'))
                <div class="alert alert-success">
                    {{ session()->get('status') }}
                </div>
            @endif

            <form action="{{ route('reset-password') }}" method="post">
                @csrf
                <input type="hidden" name="token" value="{{ request()->token }}">
                <div class="input-group mb-3">
                    <input type="text" id="email" name="email" class="form-control" value="{{ $email }}" readonly>
                </div>
                <div class="input-group mb-3">
                    <input type="password" id="password" name="password" class="form-control" placeholder="Password">
                </div>
                <div class="input-group mb-3">
                    <input type="password" id="password_confirmation" name="confirmation_password" class="form-control" placeholder="Password Confirmation">
                </div>
                <div class="row">
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary btn-block">Update Password</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
</html>