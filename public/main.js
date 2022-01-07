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
    $("#insert").click(function (e) {
        if ($("#insert-form")[0].checkValidity()) {
            e.preventDefault();
            $.ajax({
                url: "userController.php",
                type: "POST",
                data: $("#insert-form").serialize() + "&action=insert",
                success: function (response) {
                    $("#insertModal").modal("hide");
                    $("#insert-form")[0].reset();
                    displayUsers();
                    $("#messageModal").modal({
                        show: true,
                        backdrop: false
                    });
                    setTimeout(() => {
                        $("#messageModal").modal("hide");
                    }, 3000);

                }
            });
        }

    });
});