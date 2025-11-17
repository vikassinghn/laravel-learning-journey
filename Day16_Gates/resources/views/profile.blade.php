<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
    <div class="card mt-4">
        <div class="card-header">
            <h3>Profile</h3>
        </div>
        <div class="card-body">
            <table class="table">
                <tr>
                    <td>Name</td>
                    <td>{{ $user->name }}</td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td>{{ $user->email }}</td>
                </tr>
                <tr>
                    <td>Age</td>
                    <td>{{ $user->age }}</td>
                </tr>
            </table>
            <a href="{{ route('dashboard') }}" class="btn btn-secondary">Back</a>
        </div>
    </div>
    </div>
</body>
</html>