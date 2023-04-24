<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Campus</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
    <div class="modal fade" id="add_post_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Add New Campus</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="#" method="POST" enctype="multipart/form-data" id="add_post_form" novalidate>
                    <div class="modal-body p-5">
                        <div class="mb-3">
                            <label>Code</label>
                            <input type="text" name="code" class="form-control" placeholder="Title" maxlength="3" required>
                            <div class="invalid-feedback">Code title is required!</div>
                        </div>
                        <div class="mb-3">
                            <label>Campus Name</label>
                            <input type="text" name="campus_name" class="form-control" placeholder="Campus Name" required>
                            <div class="invalid-feedback">Campus Nme is required!</div>
                        </div>
                        <div class="mb-3">
                            <label>Location</label>
                            <input type="text" name="location" class="form-control" placeholder="Body" required></input>
                            <div class="invalid-feedback">location is required!</div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" id="add_post_btn">Add Campus</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="edit_post_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Edit Post</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="#" method="POST" enctype="multipart/form-data" id="edit_post_form" novalidate>
                    <input type="hidden" name="id" id="pid">
                    <div class="modal-body p-5">
                        <div class="mb-3">
                            <label>Code</label>
                            <input type="text" name="code" class="form-control" placeholder="Title" maxlength="3" required>
                            <div class="invalid-feedback">Code title is required!</div>
                        </div>
                        <div class="mb-3">
                            <label>Campus Name</label>
                            <input type="text" name="campusName" class="form-control" placeholder="Category" required>
                            <div class="invalid-feedback">Campus Nme is required!</div>
                        </div>
                        <div class="mb-3">
                            <label>Location</label>
                            <input type="text" name="location" class="form-control" placeholder="Body" required></input>
                            <div class="invalid-feedback">location is required!</div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" id="edit_post_btn">Update Post</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="detail_post_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Details of Post</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h3 id="detail_post_code" class="mt-3"></h3>
                    <h5 id="detail_post_campus_name"></h5>
                    <p id="detail_post_location"></p>
                    <p id="detail_post_create_at" class="fst-italic"></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="table">
            <div class="row my-4">
                <div class="col-lg-12">
                    <div class="table shadow">
                        <div class=" d-flex justify-content-between align-items-center mb-2">
                            <div class="text-secondary fw-bold fs-3">All Campus</div>
                            <h1 class="text-bold text-center text-uppercase">Campus</h1>
                            <button class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#add_post_modal">Add New Post</button>
                        </div>
                        <div class="table">
                            <div class="row" id="show_posts">
                                <h1 class="text-center text-secondary my-5">Campus Loading..</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(function() {
            $("#add_post_form").submit(function(e) {
                e.preventDefault();
                const formData = new FormData(this);
                if (!this.checkValidity()) {
                    e.preventDefault();
                    $(this).addClass('was-validated');
                } else {
                    $("#add_post_btn").text("Adding...");
                    $.ajax({
                        url: '<?= base_url('campus/add') ?>',
                        method: 'post',
                        data: formData,
                        contentType: false,
                        cache: false,
                        processData: false,
                        dataType: 'json',
                        success: function(response) {
                            if (response.error) {

                            } else {
                                $("#add_post_modal").modal('hide');
                                $("#add_post_form")[0].reset();
                                $("#add_post_form").removeClass('was-validated');
                                Swal.fire(
                                    'Added',
                                    response.message,
                                    'success'
                                );
                                fetchAllcampus();
                            }
                            $("#add_post_btn").text("Add Post");
                        }
                    });
                }
            });
            $(document).delegate('.post_edit_btn', 'click', function(e) {
                e.preventDefault();
                const id = $(this).attr('id');
                $.ajax({
                    url: '<?= base_url('campus/edit') ?>/' + id,
                    method: 'get',
                    success: function(response) {
                        $("#id").val(response.message.id);
                        $("#code").val(response.message.code);
                        $("#campus_name").val(response.message.name);
                        $("#locaiton").val(response.message.location);
                        $("#create_at").val(response.message.created_at);
                    }
                });
            });
            $("#edit_post_form").submit(function(e) {
                e.preventDefault();
                const formData = new FormData(this);
                if (!this.checkValidity()) {
                    e.preventDefault();
                    $(this).addClass('was-validated');
                } else {
                    $("#edit_post_btn").text("Updating...");
                    $.ajax({
                        url: '<?= base_url('campus/edit') ?>',
                        method: 'post',
                        data: formData,
                        contentType: false,
                        cache: false,
                        processData: false,
                        dataType: 'json',
                        success: function(response) {
                            $("#edit_post_modal").modal();
                            Swal.fire(
                                'Updated',
                                response.message,
                                'success'
                            );
                            fetchAllPosts();
                            $("#edit_post_btn").text("Update Post");
                        }
                    });
                }
            });
            $(document).delegate('.post_delete_btn', 'click', function(e) {
                e.preventDefault();
                const id = $(this).attr('id');
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: '<?= base_url('campus/delete') ?>/' + id,
                            method: 'get',
                            success: function(response) {
                                Swal.fire(
                                    'Deleted!',
                                    response.message,
                                    'success'
                                )
                                fetchAllcampus();
                            }
                        });
                    }
                })
            });
            $(document).delegate('.post_detail_btn', 'click', function(e) {
                e.preventDefault();
                const id = $(this).attr('id');
                $.ajax({
                    url: '<?= base_url('campus/detail') ?>/' + id,
                    method: 'get',
                    dataType: 'json',
                    success: function(response) {
                        $("#detail_post_code").text(response.message.title);
                        $("#detail_post_campus_name").text(response.message.category);
                        $("#detail_post_location").text(response.message.body);
                        $("#detail_post_create_at").text(response.message.created_at);
                    }
                });
            });
            fetchAllcampus();

            function fetchAllcampus() {
                $.ajax({
                    url: '<?= base_url('campus/fetch') ?>',
                    method: 'get',
                    success: function(response) {
                        $("#show_posts").html(response.message);
                    }
                });
            }
        });
    </script>

</body>

</html>