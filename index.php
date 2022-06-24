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
    <style>
    .alert,
    #modal {
        display: none;
    }

    #modal {
        background: rgba(0, 0, 0, 0.7);
        position: fixed;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        z-index: 100;
    }

    #modal-form {
        background: #fff;
        width: 30%;
        position: relative;
        top: 20%;
        left: calc(50%-15%);
        padding: 15px;
        border-radius: 4px;
        margin-left: 35%;
    }

    #close-btn {
        background: red;
        color: white;
        width: 30px;
        height: 30px;
        text-align: center;
        border-radius: 50%;
        position: absolute;
        cursor: pointer;
        top: 3%;
        right: 3%;
        line-height: 30px;
    }

    #search {
        /* border: none; */
        border-radius: 15%;
        text-indent: 35%;
        width: 24%;
        background-color: #cddc397a;
    }

    body {
        background: #a3a1a1;

    }

    #fname,
    #lname {
        text-indent: 5%;
    }
    </style>
</head>

<body>
    <div class="container-fluid text-center bg-dark text-light">
        <!-- NAVIGATION BAR START -->
        <div class="row ">
            <div class="col-md-3">
                <h4>HOME</h4>
            </div>
            <div class="col-md-3">
                <h4>ABOUT</h4>
            </div>
            <div class="col-md-3">
                <h4>CONTACT</h4>
            </div>
            <div class="col-md-3">
                <h4>SERVICE</h4>
            </div>
        </div>
        <!-- NAVIGATION BAR END -->
    </div>
    <div class="container">
        <!-- HEADING START -->
        <div class="row my-4 bg-warning">
            <div class="col-md-12">
                <h1 class="text-center text-danger">CRUD SITE WITH PHP & AJAX</h1>
            </div>
        </div>
        <!-- HEADING END -->
        <!-- ALERT BOX START -->
        <div class="alert alert-danger text-center alert-dismissible fade show" id="error-message" role="alert"></div>
        <div class="alert alert-success text-center alert-dismissible fade show" id="success-message" role="alert">
        </div>
        <!-- ALERT BOX END -->
        <!-- MODAL CODE START -->
        <div id="modal">
            <div id="modal-form">
                <h2>Edit Form</h2>
                <div class="row">
                    <div class="col-md-12">
                        <table cellpadding="0" width="100%">
                        </table>
                        <div id="close-btn">X</div>
                    </div>
                </div>
            </div>
        </div>
        <!-- MODAL CODE END-->
        <!-- FORM START -->
        <div class="row my-4">
            <div class="col-md-12">
                <form id="addForm">
                    <div class="row">
                        <div class="col text-center">
                            <label for="">First Name</label>
                            <input type="text" name="fname" id="fname" placeholder="Enter First Name" />
                        </div>
                        <div class="col text-center">
                            <label for="">Last Name</label>
                            <input type="text" name="lname" id="lname" placeholder="Enter Last Name" />
                        </div>
                        <div class="col text-center">
                            <input type="submit" value="Submit" id="save-button" />
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- FORM END -->
        <!-- SEARCH BOX CODE START -->
        <div class="row text-center">
            <div class="col-md-12">
                <!-- <label for="">Search</label> -->
                <input type="search" name="isearch" id="search" placeholder="Search" autocomplete="off" class="">
            </div>
        </div>
        <!-- SEARCH BOX CODE END -->
        <!-- TABLE CONTENT CODING START -->
        <div class="row my-4">
            <div class="col-md-12">
                <table class="table text-center table-success" id="table-data">
            </div>
        </div>
    </div>
    </div>


    <!-- TABLE CONTENT CODING END -->
    <script type="text/javascript">
    $(document).ready(function() {
        //LOAD TABLE CODE START//
        function loadtable() {
            $.ajax({
                url: "ajax-load.php",
                type: "POST",
                success: function(data) {
                    $("#table-data").html(data);
                },
            });
        }
        loadtable();
        //LOAD TABLE CODE END//

        //INSERT NEW RECORD CODE START//
        $("#save-button").on("click", function(e) {
            e.preventDefault();
            var fname = $("#fname").val();
            var lname = $("#lname").val();
            if (fname == "" || lname == "") {
                $("#error-message").html("All Fields Are Required").slideDown(3000);
                $("#success-message").slideUp(3000);
            } else {
                $.ajax({
                    url: "ajax-insert.php",
                    type: "POST",
                    data: {
                        first_name: fname,
                        last_name: lname,
                    },
                    success: function(data) {
                        if (data == 1) {
                            loadtable();
                            $("#addForm").trigger(
                                "reset"
                            ); //With the help Of This Function after adding the data in table form fields become empty
                            $("#success-message").html(
                                    "Record Inserted Successfully")
                                .slideDown().fadeOut(3000);
                            $("#error-message").slideUp(3000);
                        } else {
                            $("#error-message").html("cant't save record")
                                .slideDown();
                            $("#success-message").slideUp(3000);
                        }
                    },
                });
            }
        });
        //INSERT NEW RECORD CODE END//

        //DELETE START//
        $(document).on("click", ".delete-btn", function() {
            if (confirm("DO You Really Want To Delete The Data")) {
                var student_id = $(this).data("id");
                var element = this;
                $.ajax({
                    url: "ajax-delete.php",
                    type: "POST",
                    data: {
                        id: student_id,
                    },
                    success: function(data) {
                        if (data == 1) {
                            $(element).closest("tr").fadeOut(3000);
                            $("#success-message").html(
                                    "Record Deleted Successfully")
                                .slideDown();
                            $("#error-message").slideUp(3000);
                        } else {
                            $("#error-message").html("isn't deleted").slideDown(3000);
                            $("#success-message").slideUp(3000);
                        }
                    },
                });
            }
        });
        //DELETE END//
        //SHOW MODAL BOX CODE START//
        $(document).on("click", ".edit-btn", function() {
            $("#modal").show();
            var studentId = $(this).data("id");
            $.ajax({
                url: "load-edit-form.php",
                type: "POST",
                data: {
                    id: studentId
                },
                success: function(data) {
                    $("#modal-form table").html(data);
                }
            })

        })
        //SHOW MODAL BOX CODE END//
        //HIDE MODAL BOX CODE START//
        $("#close-btn").on("click", function() {
            $("#modal").hide(3000);
        });
        //HIDE MODAL CODE END//


        //SAVE UPDATE FORM CODE START//
        $(document).on("click", "#edit-submit", function() {
            var studentId = $("#sno-id").val();
            var fname = $("#edit-fname").val();
            var lname = $("#edit-lname").val();
            $.ajax({
                url: "ajax-update-form.php",
                type: "POST",
                data: {
                    id: studentId,
                    sname: fname,
                    ename: lname
                },
                success: function(data) {
                    if (data == 1) {
                        $("#modal").hide(3000);
                        loadtable();
                        $("#success-message").html("Record Updated Successfully")
                            .slideDown(3000).fadeOut(3000);

                    }
                }
            });
        });
        //SAVE UPDATE FORM CODE END//
        //LIVE SEARCH CODE START//
        $("#search").on("keyup", function() {
            var searchTerm = $(this).val();
            $.ajax({
                url: "ajax-live-search.php",
                type: "post",
                data: {
                    search: searchTerm
                },
                success: function(data) {
                    $("#table-data").html(data);
                }
            });
        });
        //LIVE SEARCH CODE END//
    });
    </script>


</body>


</html>