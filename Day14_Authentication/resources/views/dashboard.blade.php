<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <div class="container">
        <div class="row">
            <div class="col-6 mb-3">
                <h3>Welcome, {{ Auth::user()->name }}</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <a href="{{ route('inner') }}" class="btn btn-primary">Go to Inner Page</a>
                <a href="{{ route('logout') }}" class="btn btn-danger">Logout</a>
            </div>
        </div>
    </div>
</body>
</html>
