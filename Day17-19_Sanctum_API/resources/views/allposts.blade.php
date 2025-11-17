<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel Sanctum with jQuery Ajax</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-8 bg-primary text-white mb-4">
                <h1>All Posts</h1>
            </div>
        </div>
        <div class="row mb-4">
            <div class="col-8">
                <a href="/addpost" class="btn btn-sm btn-primary">Add New</a>
                {{-- <a href="/updatepost" class="btn btn-sm btn-primary">Update</a> --}}
                <button class="btn btn-sm btn-danger" id="logoutBtn">Logout</button>
            </div>
        </div>
        <div class="row">
            <div class="col-8">
                <div id="postsContainer">

                </div>
            </div>
        </div>
    </div>

    <!-- Update Post Modal -->
    <div class="modal fade" id="updatePostModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="updatePostLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fs-5" id="updatePostLabel">Update Post</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="updateform">
                    <div class="modal-body">
                        <input type="hidden" id="postId" class="form-control" value="">
                        <b>Title</b><input type="text" id="postTitle" class="form-control" value="">
                        <b>Description</b><input type="text" id="postBody" class="form-control" value="">
                        <img id="showImage" width="150px">
                        <p>Upload Image</p><input type="file" id="postImage" class="form-control">

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <input type="submit" value="Save changes" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Single Post Modal -->
    <div class="modal fade" id="singlePostModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="singlePostLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fs-5" id="singlePostLabel">Single Post</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous">
    </script>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script>
        document.querySelector("#logoutBtn").addEventListener('click', function() {
            const token = localStorage.getItem('api_token');

            fetch('/api/logout', {
                    method: 'POST',
                    headers: {
                        'Authorization': `Bearer ${token}`,
                    }
                })
                .then(response => response.json())
                .then(data => {
                    console.log(data);
                    window.location.href = "http://localhost:8000/";
                });
        });

        function loadData() {
    const token = localStorage.getItem('api_token');

    fetch('/api/posts', {
        method: 'GET',
        headers: {
            'Authorization': `Bearer ${token}`,
        }
    })
    .then(response => response.json())
    .then(data => {
        console.log(data); // Debugging
        const allpost = data.data; // ✅ your posts array
        const postsContainer = document.querySelector("#postsContainer");

        if (!Array.isArray(allpost) || allpost.length === 0) {
            postsContainer.innerHTML = `<p class="text-danger">No posts found.</p>`;
            return;
        }

        let tabledata = `
            <table class="table table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>Image</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>View</th>
                        <th>Update</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
        `;

        allpost.forEach(post => {
            tabledata += `
                <tr>
                    <td><img src="/uploads/${post.image ?? 'noimage.png'}" width="150px"></td>
                    <td><h6>${post.title}</h6></td>
                    <td><p>${post.description ?? ''}</p></td>
                    <td><button type="button" class="btn btn-sm btn-primary" data-bs-postid="${post.id}" data-bs-toggle="modal" data-bs-target="#singlePostModal">View</button></td>
                    <td><button type="button" class="btn btn-sm btn-warning" data-bs-postid="${post.id}" data-bs-toggle="modal" data-bs-target="#updatePostModal">Update</button></td>
                    <td><button onclick="deletePost(${post.id})" class="btn btn-sm btn-danger">Delete</button></td>
                </tr>
            `;
        });

        tabledata += `
                </tbody>
            </table>
        `;

        postsContainer.innerHTML = tabledata;
    })
    .catch(err => console.error('Error loading posts:', err));
}


        loadData();

        //Open Single Modal
        var singleModal = document.querySelector("#singlePostModal");

        if (singleModal) {
            singleModal.addEventListener('show.bs.modal', event => {

                const button = event.relatedTarget

                const modalBody = document.querySelector("#singlePostModal .modal-body");

                modalBody.innerHTML = "";

                const id = button.getAttribute('data-bs-postid');
                console.log(id);

                const token = localStorage.getItem('api_token');

                fetch(`/api/posts/${id}`, {
                        method: 'GET',
                        headers: {
                            'Authorization': `Bearer ${token}`,
                            'Content-Type': 'application/json'
                        }
                    })
                    .then(response => response.json())
                    .then(data => {
                        const post = data.data.post[0];



                        modalBody.innerHTML = `
                            Title : ${post.title}
                            <br>
                            Description : ${post.description}
                            <br>
                            <img width="150px" src="http://localhost:8000/uploads/${post.image}" />
                        `;

                    });

            })
        }

        //Update Post Modal
        var updateModal = document.querySelector("#updatePostModal");

        if (updateModal) {
            updateModal.addEventListener('show.bs.modal', event => {

                const button = event.relatedTarget

                //const modalBody = document.querySelector("#singlePostModal .modal-body");

                //modalBody.innerHTML = "";

                const id = button.getAttribute('data-bs-postid');
                console.log(id);

                const token = localStorage.getItem('api_token');

                fetch(`/api/posts/${id}`, {
                        method: 'GET',
                        headers: {
                            'Authorization': `Bearer ${token}`,
                            'Content-Type': 'application/json'
                        }
                    })
                    .then(response => response.json())
                    .then(data => {
                        const post = data.data.post[0];

                        document.querySelector("#postId").value = post.id;
                        document.querySelector("#postTitle").value = post.title;
                        document.querySelector("#postBody").value = post.description;
                        document.querySelector("#showImage").src = `/uploads/${post.image}`;
                    });
            })
        }

        //Update Post
        var updateform = document.querySelector("#updateform");

        updateform.onsubmit = async (e) => {
            e.preventDefault();

            const token = localStorage.getItem('api_token');

            const postId = document.querySelector("#postId").value;
            const title = document.querySelector("#postTitle").value;
            const description = document.querySelector("#postBody").value;

            var formData = new FormData();
            formData.append('id', postId);
            formData.append('title', title);
            formData.append('description', description);

            if (!document.querySelector("#postImage").files[0] == "") {
                const image = document.querySelector("#postImage").files[0];
                formData.append('image', image);
            }
            let response = await fetch(`/api/posts/${postId}`, {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'Authorization': `Bearer ${token}`,
                        'X-HTTP-Method-Override': 'PUT'
                    }
                })
                .then(response => response.json())
                .then(data => {
                    console.log(data);
                    window.location.href = "http://localhost:8000/allposts";
                });
        }

        //Delete Post
        async function deletePost(postId){
            const token = localStorage.getItem('api_token');

            let response = await fetch(`/api/posts/${postId}`, {
                    method: 'DELETE',
                    headers: {
                        'Authorization': `Bearer ${token}`,
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
