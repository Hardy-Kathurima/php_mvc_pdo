<?php

?>


<?php include "templates/header.php"; ?>

<div class="container">
    <div class="user-data my-5">
        <table class="table" id="myTable">
            <thead>
                <tr>
                    <th scope="col">First name</th>
                    <th scope="col">Last name</th>
                    <th scope="col">Email</th>
                    <th class="text-center" scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>

                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                    <td class="text-center">
                        <button class="btn btn-sm btn-info">edit</button>
                        <button class="btn btn-sm btn-danger">delete</button>
                    </td>
                </tr>
                <tr>

                    <td>Jacob</td>
                    <td>Thornton</td>
                    <td>@fat</td>
                    <td class="text-center">
                        <button class="btn btn-sm btn-info">edit</button>
                        <button class="btn btn-sm btn-danger">delete</button>
                    </td>
                </tr>
                <tr>

                    <td>Larry</td>
                    <td>the Bird</td>
                    <td>@twitter</td>
                    <td class="text-center">
                        <button class="btn btn-sm btn-info">edit</button>
                        <button class="btn btn-sm btn-danger">delete</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>


<?php include "templates/footer.php"; ?>