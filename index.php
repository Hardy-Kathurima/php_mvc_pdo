<?php
require "User.php";

?>


<?php include "templates/header.php"; ?>

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
                        <input type="text" name="firstName" id="firstName" class="form-control" required>
                    </div>
                    <label for="lastName">Last Name</label>
                    <div class="form-group">
                        <input type="text" name="lastName" id="lastName" class="form-control" required>
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

<!-- sucess message -->
<div class="modal fade " id="messageModal" tabindex="-1" role="dialog" aria-labelledby="messageModalLabel" aria-hidden="true">
    <div class="modal-dialog mr-0 modal-sm" role="document">
        <div class="modal-content bg-success">
            <div class="modal-body text-center text-white">
                <p>user added successfully</p>
            </div>
        </div>
    </div>
</div>
<!-- end success modal -->
<div class="container">
    <h2 class="text-center my-4">PDO MVC - USER MANAGEMENT</h2>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#insertModal">
        Add user
    </button>
    <center>

    </center>
    <div class=" my-4" id="displayUser">

    </div>
</div>


<?php include "templates/footer.php"; ?>