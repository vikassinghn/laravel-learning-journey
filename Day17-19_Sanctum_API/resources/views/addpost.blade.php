<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Laravel Sanctum with jQuery Ajax</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-8 bg-primary text-white mb-4">
                <h1>Create Post</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-8">
                <form id="addForm">
                    <input type="text" id="title" class="form-control mb-3" placeholder="Title">

                    <textarea id="description" class="form-control mb-3" placeholder="Description"></textarea>

                    <input type="file" id="image" class="form-control mb-3">

                    <input type="submit" class="btn btn-primary">

                    <a href="/allposts" class="btn btn-secondary">Back</a>
                </form>
            </div>
        </div>
    </div>
    <script>
        var addform = document.querySelector("#addForm");

        addform.onsubmit = async (e) => {
            e.preventDefault();

            const token = localStorage.getItem('api_token');

            const title = document.querySelector("#title").value;
            const description = document.querySelector("#description").value;
            const image = document.querySelector("#image").files[0];

            var formData = new FormData();
            formData.append('title', title);
            formData.append('description', description);
            formData.append('image', image);

            let response = await fetch('/api/posts', {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'Authorization': `Bearer ${token}`
                    }
                })
                .then(response => response.json())
                .then(data => {
                    console.log(data);
                    window.location.href = "http://localhost:8000/allposts";
                });
        }
    </script>
</body>

</html>
