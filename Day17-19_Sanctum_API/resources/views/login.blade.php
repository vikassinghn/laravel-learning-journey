<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel Sanctum with jQuery Ajax</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-4">
                <div class="card">
                    <div class="card-header">
                        <h2>Login</h2>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <input type="email" id="email" class="form-control" placeholder="Email">
                        </div>
                        <div class="mb-3">
                            <input type="password" id="password" class="form-control" placeholder="Password">
                        </div>
                        <button id="loginButton" class="btn btn-primary">Login</button>
                    </div>
                    <div class="card-footer"></div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
   <script>
    $(document).ready(function(){
        $("#loginButton").on('click',function(){
            const email = $("#email").val();
            const password = $("#password").val();

            $.ajax({
                url : '/api/login', // OR '/your_project/public/api/login' if XAMPP
                type: 'POST',
                contentType: 'application/json',
                data: JSON.stringify({
                    email : email,
                    password : password,
                }),
                success : function(response){
                    console.log("✅ Login successful:", response);
                    
                    localStorage.setItem('api_token', response.token);
                    window.location.href ="/allposts";
                },
                error : function(xhr){
                    console.error("❌ Error:", xhr.status, xhr.responseText);
                }
            });
        });
    });
</script>

</body>
</html>