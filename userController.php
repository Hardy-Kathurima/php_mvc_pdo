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
            <a class="btn btn-sm btn-info infoBtn" href="#" id="' . $value['id'] . '" data-toggle="modal" data-target="#infoModal">details</a>
            <a class="btn btn-sm btn-primary editBtn" href="#" id="' . $value['id'] . '" data-toggle="modal" data-target="#editModal">edit</a>
            <a class="btn btn-sm btn-danger delBtn" href="#" id="' . $value['id'] . '">delete</a>
        </td>
            </tr>';
        }
        $table .= '</tbody></table>';
        echo $table;
    } else {
        echo '<h3 class="text-center mt-5 text-info">No records found</h3>';
    }
}

if (isset($_POST["action"]) && $_POST["action"] == "insert") {
    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
    $email = $_POST["email"];

    $user->insert($firstName, $lastName, $email);
}

if (isset($_POST["user_id"])) {
    $user_id = $_POST["user_id"];

    $userData = $user->getUserById($user_id);

    echo json_encode($userData);
}

if (isset($_POST['action']) && $_POST['action'] == "edit") {
    $id = $_POST["id"];
    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
    $email = $_POST["email"];

    $user->update($id, $firstName, $lastName, $email);
}

if (isset($_POST["delete_id"])) {
    $id = $_POST["delete_id"];
    $user->delete($id);
}
if (isset($_POST["info_id"])) {
    $id = $_POST["info_id"];
    $userInfo = $user->getUserById($id);

    echo json_encode($userInfo);
}
