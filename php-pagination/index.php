<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Ajax With Pagination</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous" />
    <script src="https://code.jquery.com/jquery-3.6.0.js"
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
</head>

<body>
    <div class="row">
        <div class="col-md-12">
            <h1 class="text-danger text-bg-primary text-center">PHP & AJAX WITH PAGINATION</h1>
        </div>
        <div class="col-md-12">
            <div class="container">
                <table class="table table-success" id="table-data"></table>
            </div>
        </div>
        <div class="col-md-12">
            <div class="container ">
                <nav aria-label="Page navigation example">
                    <ul class="pagination">

                    </ul>
                </nav>
            </div>
        </div>
    </div>





    <script>
    $(document).ready(function() {
        //LOAD TABLE CODE START//
        function loadtable(page) {
            $.ajax({
                url: "ajax-load.php",
                type: "POST",
                data: {
                    page_no: page
                },
                success: function(data) {
                    $("#table-data").html(data);
                },
            });
        };
        loadtable(); //LOADTABLE FUNCTION CALL//
        //LOADTABLE CODE END//
        //PAGINATION CODE START//
        $(document).on("click", "#pagination a", function(e) {
            e.preventDefault();
            var pageId = $(this).attr("id"); //here inside the attr("id")=> of anchor tag
            loadtable(pageId);
        })
        //PAGINATION CODE START//
    });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>
</body>

</html>