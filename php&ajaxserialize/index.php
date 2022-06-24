<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Serialize in Ajax</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous" />
    <script src="https://code.jquery.com/jquery-3.6.0.js"
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

    <style>
    .q {
        width: 102%;
        text-indent: 35%;
    }

    .errorMessage {
        background: orange;
        color: black;
        border-radius: 5%;
    }

    .successMessage {
        background: greenyellow;
        color: black;
        border: 1px solid red;
    }

    .processMessage {
        background: skyblue;
        color: black;
        border: 1px solid red;
    }
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center bg-danger text-bg-primary my-2">
                <h1>PHP AND AJAX SERIALIZE FORM</h1>
            </div>
        </div>
        <div id="table-data">
            <form action="" id="submit-form">
                <table style="margin: 5% auto">
                    <tbody>
                        <tr>
                            <td><label for="">Name &nbsp;&nbsp;</label></td>
                            <td><input type="text" name="fullname" id="fullname" /></td>
                        </tr>
                        <tr>
                            <td><label for="">Age</label></td>
                            <td><input type="number" name="age" id="age" /></td>
                        </tr>
                        <tr>
                            <td><label for="">Gender</label></td>
                            <td>
                                <input type="radio" name="gender" id="" value="male" checked />Male
                                <input type="radio" name="gender" id="" value="female" />Female
                            </td>
                        </tr>
                        <tr>
                            <td><label for="">Country</label></td>
                            <td>
                                <select name="country" id="" class="q">
                                    <option value="ind">India</option>
                                    <option value="pak">Pakistan</option>
                                    <option value="sri" selected>Srilanka</option>
                                    <option value="jap">Japan</option>
                                    <option value="eng">England</option>
                                    <option value="ame">America</option>
                                    <option value="can">Canada</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>
                                <input type="button" value="Submit" id="submit" name="submit" class="" />
                            </td>
                        </tr>
                    </tbody>
                </table>
            </form>
        </div>
        <div id="response" class="text-center"></div>
    </div>
    <script>
    $(document).ready(function() {
        $("#submit").click(function() {
            var name = $("#fullname").val();
            var age = $("#age").val();
            if (name == "" || age == "" || !$('input:radio[name=gender]').is(":checked")) {
                $("#response").fadeIn();
                $("#response").removeClass("successMessage").addClass("errorMessage").html(
                    "All Fieds Are Requied");
            } else {
                // $("#response").html($("#submit-form").serialize());
                $.ajax({
                    url: "save-form.php",
                    type: "POST",
                    data: $("#submit-form").serialize(),
                    //beforeSend code start & ye jab tak data load nhi ho jata tb tak ye chalta hai
                    beforeSend: function() {
                        $("#response").fadeIn();
                        $("#response").removeClass("successMessage errorMessage").addClass(
                            "processMessage").html(
                            "Loading...");
                    },
                    //beforeesnd code end
                    success: function(data) {
                        $("#submit-form").trigger("reset");
                        $("#response").fadeIn();
                        $("#response").removeClass("errorMessage").addClass(
                            "successMessage").html(data);
                        setTimeout(function() {
                            $("#response").fadeOut("slow");
                        }, 5000);
                    }

                });
            }
        })
    });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>
</body>

</html>