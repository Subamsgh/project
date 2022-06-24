<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous" />
    <script src="https://code.jquery.com/jquery-3.6.0.js"
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <title>Ajax</title>
</head>

<body>
    <div class="row text-center">
        <div class="col-3">
            <h4>HOME</h4>
        </div>
        <div class="col-3">
            <h4>ABOUT</h4>
        </div>
        <div class="col-3">
            <h4>CONTACT</h4>
        </div>
        <div class="col-3">
            <h4>SERVICE</h4>
        </div>
    </div>

    <div class="container my-4">
        <h4 class="text-center text-danger">PHP WITH AJAX</h4>
    </div>
    <div class="container my-2">
        <h3 class="text-center">
            <button class="btn btn-success" id="load-button">Load Data</button>
        </h3>
    </div>

    <div class="container my-4">
        <table class="table text-center table-dark" id="table-data"></table>
    </div>

    <script type="text/javascript">
    $(document).ready(function() {
        $("#load-button").on("click", function(e) {
            $.ajax({
                url: "ajax-load.php",
                type: "POST",
                success: function(data) {
                    $("#table-data").html(data);
                },
            });
        });
    });
    </script>
</body>

</html>