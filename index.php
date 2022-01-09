<?php
require "User.php";

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDO | MVC</title>
    <link rel="stylesheet" href="./public/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.11.3/datatables.min.css" />
</head>
<style>
    .preloader {
        background: #ffffff url(public/images/spinner.gif) no-repeat center;
        height: 100vh;
        width: 100%;
        position: fixed;
        z-index: 100;
    }
</style>

<body>
    <div class="preloader" id="preloader">

    </div>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Manage users</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-item nav-link active" href="#">Home <span class="sr-only">(current)</span></a>
                <a class="nav-item nav-link" href="#">About</a>
                <a class="nav-item nav-link" href="#">Contact</a>

            </div>
        </div>
    </nav>

    <!-- Add user Modal -->
    <div class="modal fade" id="insertModal" tabindex="-1" role="dialog" aria-labelledby="insertModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="insertModalLabel">Add a new user</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="insert-form">
                        <label for="firstName">First Name</label>
                        <div class="form-group">
                            <input type="text" name="firstName" id="firstName" class="form-control" pattern="^[a-zA-Z]{3,}$" title="first name should be one word" required>
                        </div>
                        <label for="lastName">Last Name</label>
                        <div class="form-group">
                            <input type="text" name="lastName" id="lastName" class="form-control" pattern="^[a-zA-Z]{3,}$" title="last name should be one word" required>
                        </div>
                        <label for="email">Email</label>
                        <div class="form-group">
                            <input type="email" name="email" id="email" class="form-control" required>
                        </div>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <input type="submit" value="save user" id="insert" class="btn btn-primary">
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- end insert modal -->
    <!-- edit user Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit user</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="edit-form">
                        <input type="hidden" name="id" id="id" value="">
                        <label for="firstName">First Name</label>
                        <div class="form-group">
                            <input type="text" name="firstName" id="firstName" class="form-control" pattern="^[a-zA-Z]{3,}$" title="first name should be one word" value="" required>
                        </div>
                        <label for="lastName">Last Name</label>
                        <div class="form-group">
                            <input type="text" name="lastName" id="lastName" class="form-control" pattern="^[a-zA-Z]{3,}$" title="last name should be one word" value="" required>
                        </div>
                        <label for="email">Email</label>
                        <div class="form-group">
                            <input type="email" name="email" id="email" class="form-control" value="" required>
                        </div>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <input type="submit" value="update details" id="update" class="btn btn-primary">
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- end edit modal -->

    <!-- info modal -->
    <div class="modal fade" id="infoModal" tabindex="-1" role="dialog" aria-labelledby="infoModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-center" id="infoModalLabel">User Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p class="user_first"></p>
                    <p class="user_last"></p>
                    <p class="user_email"></p>
                </div>
            </div>
        </div>
    </div>
    <!-- end info modal -->

    <div class="container">
        <!-- insert toast -->
        <div class="toast bg-success text-white insert-toast" role="alert" aria-live="assertive" aria-atomic="true" style="position: absolute;top:0;right:0;z-index:1;">
            <div class="toast-header">


                <small><?php echo "Added at " . date("h:i:sa"); ?></small>
                <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="toast-body">
                user added successfully
            </div>
        </div>

        <!-- end insert toast -->

        <!-- update toast -->
        <div class="toast bg-success text-white update-toast" role="alert" aria-live="assertive" aria-atomic="true" style="position: absolute;top:0;right:0;z-index:1;">
            <div class="toast-header">


                <small><?php echo "Updated at " . date("h:i:sa"); ?></small>
                <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="toast-body">
                user updated successfully
            </div>
        </div>
        <!-- end update toast -->
        <h2 class="text-center my-2">PDO MVC - USER MANAGEMENT</h2>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#insertModal">
            Add user
        </button>

        <div class=" my-4" id="displayUser">


        </div>
    </div>


    <footer>
        <div class="text-center">
            <i>Hardy inc</i> &copy; 2015 <?= (date('Y') > 2013 ? ' - ' . date('Y') : '') ?>
        </div>
    </footer>
    <script src="./public/jquery-3.4.1.min.js"></script>
    <script src="./public/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.11.3/datatables.min.js"></script>
    <script>
        var loader = document.getElementById("preloader");
        window.addEventListener("load", function() {
            loader.style.display = "none";
        });
        $(document).ready(function() {



            displayUsers();

            function displayUsers() {
                $.ajax({
                    url: "userController.php",
                    type: "POST",
                    data: {
                        action: "view"
                    },
                    success: function(response) {
                        $("#displayUser").html(response);
                        $('#userTable').DataTable({
                            order: [0, 'desc']
                        });
                    }
                });
            }
            $("#insert").click(function(e) {
                if ($("#insert-form")[0].checkValidity()) {
                    e.preventDefault();
                    $.ajax({
                        url: "userController.php",
                        type: "POST",
                        data: $("#insert-form").serialize() + "&action=insert",
                        success: function(response) {
                            $("#insertModal").modal("hide");
                            $("#insert-form")[0].reset();
                            displayUsers();

                            $(".insert-toast").toast({
                                delay: 3000
                            });
                            $(".insert-toast").toast('show');


                        }
                    });
                }

            });

            $("body").on("click", ".editBtn", function(e) {
                e.preventDefault();
                var user_id = $(this).attr("id");
                $.ajax({
                    url: "userController.php",
                    type: "POST",
                    data: {
                        user_id: user_id
                    },
                    success: function(response) {
                        data = JSON.parse(response);
                        $("#id").val(data.id);
                        $(" #editModal #firstName").val(data.first_name);
                        $(" #editModal #lastName").val(data.last_name);
                        $(" #editModal #email").val(data.email);
                    }
                });
            })
            $("#update").click(function(e) {
                if ($("#edit-form")[0].checkValidity()) {
                    e.preventDefault();
                    $.ajax({
                        url: "userController.php",
                        type: "POST",
                        data: $("#edit-form").serialize() + "&action=edit",
                        success: function(response) {
                            $("#editModal").modal("hide");
                            $("#edit-form")[0].reset();
                            displayUsers();
                            $(".update-toast").toast({
                                delay: 3000
                            });
                            $('.update-toast').toast('show');
                        }
                    });
                }

            });
            $("body").on("click", ".delBtn", function(e) {
                e.preventDefault();
                delete_id = $(this).attr("id");
                if (confirm("Are you sure?")) {
                    $.ajax({
                        url: "userController.php",
                        type: "POST",
                        data: {
                            delete_id: delete_id
                        },
                        success: function(response) {
                            displayUsers();
                        }
                    });
                }
                return false;
            });
            $("body").on("click", ".infoBtn", function(e) {
                e.preventDefault();
                info_id = $(this).attr("id");
                $.ajax({
                    url: "userController.php",
                    type: "POST",
                    data: {
                        info_id: info_id
                    },
                    success: function(response) {
                        info = JSON.parse(response);
                        $(".user_first").text(`First Name :  ${info.first_name}`);
                        $(".user_last").text(`Last Name :  ${info.last_name}`);
                        $(".user_email").text(`Email :  ${info.email}`);
                    }
                });
            });
        });
    </script>

</body>

</html>