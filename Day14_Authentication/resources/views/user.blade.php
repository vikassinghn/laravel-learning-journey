<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Users Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-5 mt-5">
                <div class="card">
                    <div class="card-header">
                        <h3>Users Page</h3>
                    </div>
                    <div class="card-body">
                        Hello, Users!
                        <a href="{{ route('logout') }}" class="btn btn-danger">Logout</a>
                    </div>  
                </div>
            </div>
        </div>
    </div>
</body>
</html>
