<?php
require "User.php";
$user = new User();

if (isset($_POST['action']) && $_POST['action'] == "view") {
    $table = '';
    $data = $user->index();
    if ($user->totalRows() > 0) {
        $table .= '<table class="table table-dark table-bordered" id="userTable">
        <thead>
            <tr>
                <th scope="col">First name</th>
                <th scope="col">Last name</th>
                <th scope="col">Email</th>
                <th class="text-center" scope="col">Action</th>
            </tr>
        </thead>
        <tbody>';
        foreach ($data as $value) {
            $table .= '<tr>
            <td>' . $value['first_name'] . '</td>
            <td>' . $value['last_name'] . '</td>
            <td>' . $value['email'] . '</td>
            <td class="text-center">
            <button class="btn btn-sm btn-info">edit</button>
            <button class="btn btn-sm btn-danger">delete</button>
        </td>
            </tr>';
        }
        $table .= '</tbody></table>';
        echo $table;
    } else {
        echo '<h3 class="text-center mt-5 text-info">No records found</h3>';
    }
}
