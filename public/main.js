$(document).ready(function () {

    displayUsers();
    function displayUsers() {
        $.ajax({
            url: "userController.php",
            type: "POST",
            data: {
                action: "view"
            },
            success: function (response) {
                $("#displayUser").html(response);
                $('#userTable').DataTable({
                    order: [0, 'desc']
                });
            }
        });
    }
});