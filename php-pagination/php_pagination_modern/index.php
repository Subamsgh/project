<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous" />
    <script src="https://code.jquery.com/jquery-3.6.0.js"
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <title>php-Ajax</title>
</head>

<body>
    <div class="container my-4">
        <div class="jumbotron">
            <h1>PHP AND AJAX WITH MODERN USE OF PAGINATION</h1>
            <hr />
            <p class="lead">
                IN THIS WEBPAGE WE ARE TRYING TO LEARN HOW TO MAKE PAGINATION THAT'S
                ARE MOSTLY USED IN E-COMMERCE WEBSITE
            </p>
        </div>
        <div class="row">
            <div class="col-md-12">
                <table border='1' id="loaddata" id="tabledata" width="100%">
                    <tr>
                        <th class="text-center">Sno</th>
                        <th class="text-center">Name</th>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <script>
    $(document).ready(function() {
        function loadtable(page) {
            $.ajax({
                url: "ajax-modern-pagination.php",
                type: "POST",
                data: {
                    page_no: page
                },
                success: function(data) {
                    if (data) {
                        $("#pagination").remove();
                        $("#loaddata").append(data);
                    } else {
                        $("#ajax-btn").html("Finshed!!");
                        $("#ajax-btn").prop("disabled", true);
                    }
                }
            });
        }
        loadtable();
        $(document).on("click", "#ajax-btn", function() {
            $("#ajax-btn").html("Loading...");
            var pid = $(this).data("id");
            loadtable(pid);
        });
    });
    </script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script> -->
</body>

</html>