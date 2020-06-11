<?php require_once('./PHP/initialize.php'); ?>
<?php if (!isset($_SESSION['set'])) {
	header("Location:login.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Results</title>

    <style>
        table {
            border-collapse: collapse;
            width: 95%;
            color: #588c7e;
            font-family: monospace;
            font-size: 15px;
            text-align: left;
            margin: 2.5% 0 0 2.5%;
        }

        th {
            background-color: #3d3d29;
            color: white;
            padding: 20px;
            /* font-size */
            text-align: center;

        }

        tr {
            background-color: #f2f2f2;
            text-align: center;
            padding: 20px;
        }

        td {
            height: 30px;
            padding: 20px;
        }

        .container-table {
            font-family: sans-serif;
            border-collapse: collapse;
            margin: 25px 25px;
            font-size: 0.9em;
            min-width: 400px;
            border-radius: 5px 5px 5px 5px;
            overflow: hidden;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
            padding: 10px 10px 10px 10px;
        }

        .container-table th {
            padding: 10px;
            /* text-align: center; */
            background-color: #114720;
            color: #ffffff;
            text-align: left;
            font-weight: bold;
        }

        .container-table th,
        .container-table td {
            padding: 12px 15px;
            text-align: left;
        }

        .container-table tr {
            /* border-bottom: 1px solid #dddddd; */
        }

        .container-table tr:nth-of-type(even) {
            background-color: #f3f3f3;
        }

        .container-table tr:last-of-type {
            border-bottom: 2px solid #114720;
        }

        .container-table tr {
            font-weight: bold;
            color: #114720;
        }


        .searchbar {
            border: 1px solid=000000;
            font-size: 16px;
            padding: 10px;
            outline: none;
            width: 250px;
        }

        .searchbtn {
            border: 1px solid=000000;
            font-size: 16px;
            padding: 10px;
            background: #f1d829;
            font-weight: bold;
            cursor: pointer;
            outline: none;
        }

        h1 {
            color: red;
            margin: 5px 5px 5px 5px;
        }
    </style>
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all">
    <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Web application integrated to the AVI system which is developed for automatic vehicle number plate recognition" />
    <script type="application/x-javascript">
        addEventListener("load", function() {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <script src="js/jquery-1.8.3.min.js"></script>
    <!---- start-smoth-scrolling---->
    <script type="text/javascript" src="js/move-top.js"></script>
    <script type="text/javascript" src="js/easing.js"></script>
    <script type="text/javascript">
        jQuery(document).ready(function($) {
            $(".scroll").click(function(event) {
                event.preventDefault();
                $('html,body').animate({
                    scrollTop: $(this.hash).offset().top
                }, 1200);
            });
        });
    </script>

    <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all">
    <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Web application integrated to the AVI system which is developed for automatic vehicle number plate recognition" />
    <script type="application/x-javascript">
        addEventListener("load", function() {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <script src="js/jquery-1.8.3.min.js"></script>
    <!---- start-smoth-scrolling---->
    <script type="text/javascript" src="js/move-top.js"></script>
    <script type="text/javascript" src="js/easing.js"></script>
    <script type="text/javascript">
        jQuery(document).ready(function($) {
            $(".scroll").click(function(event) {
                event.preventDefault();
                $('html,body').animate({
                    scrollTop: $(this.hash).offset().top
                }, 1200);
            });
        });
    </script>
</head>

<body>
    <div style="background-color: #DEDAC8" class="header">
        <div class="container">
            <div class="header-top">
                <div class="logo">
                    <a href="homePage.php">
                        <img alt="AVI" src="images/4.png" width="70px" height="70px" style="margin-top:-20px">
                    </a>
                </div>
                <div class="top-menu">
                    <span class="menu"><img src="images/nav.png" alt="" /> </span>
                    <ul>
                        <li><a href="homePage.php">Home</a></li>
                        <li><a href="viewBlockedVehicles.php">Blacklisted Vehicles</a></li>
                        <li><a href="viewReleasedVehicles.php">Released Vehicles</a></li>
                        <li><a href="viewAdminList.php" class="active">Admin List</a></li>
                        <li><a href="viewGeneralUserList.php">General Users</a></li>
                        <li><a href="LogOut.php">Logout</a></li>
                    </ul>
                </div>

                <!--script-nav-->/
                <script>
                    $("span.menu").click(function() {
                        $(".top-menu ul").slideToggle("slow", function() {});
                    });
                </script>
                <div class="clearfix"></div>
            </div>
        </div>
        <!-- Slider-starts-Here -->
        <script src="js/responsiveslides.min.js"></script>
        <script>
            $(function() {
                $("#slider").responsiveSlides({
                    auto: true,
                    nav: false,
                    speed: 500,
                    namespace: "callbacks",
                    pager: true,
                });
            });
        </script>
        <div style="background-color: white" class="banner">

            <div class="bnr2">
            </div>
            <h1 style="margin: 25px 15px 25px 35px; color: #114720; font-family: sans-serif;">Search Results</h1>
            <div>
                <table class="container-table">
                    <tr>
                        <th>Admin</th>
                        <th>Branch</th>
                        <th>Registration No</th>
                        <th style='text-align: center;'>Status</th>
                        <th style='text-align: center;'>Edit</th>
                        <th style='text-align: center;'>Remove</th>
                    </tr>
                    <?php
                    if ($_SESSION['set'] = true) {
                        $searchedAdmins = $_SESSION['searchedAdmins'];
                        if (sizeof($searchedAdmins) == 0) {
                            echo "<h4 style='margin-left : 50px'; font-color : #002d24;>No Results Were Found.</h4>";
                        }
                        foreach ($searchedAdmins as $searchedadmin){
                            $fullName=$searchedadmin['name'];
                            $adminID=$searchedadmin['adminID'];
                            $branch=$searchedadmin['branchName'];
                            $regNo=$searchedadmin['regNo'];
                            if ($searchedadmin['isActive']=='1'){
                                $isActive="Active";
                            }else{
                                $isActive="Inactive";
                            }
                            echo "<tr  style='border: 1px #3d3d29; color: #114720; font-weight: bold;'>
                            <form class=\"box\" action=\"./PHP/manager.php\" method=\"post\">
                                <input type='hidden' name='name' value=". $fullName . ">
                                <input type='hidden' name='branch' value=". $branch . ">
                                <input type='hidden' name='regNo' value=". $regNo . ">
                                <td style='#3d3d29; padding:0.5%;'>".$fullName."</td>
                                <td style='#3d3d29; padding:0.5%;'>".$branch."</td>
                                <td style='padding:0.5%;'>".$regNo."</td>
                                <td style='text-align: center;'>".$isActive."</td>
                                <td style='text-align: center;'>" .  '<button name="edit_admin" type="submit" value="'.$adminID .'" >Edit Details</button>'.  "</td>
                                <td style='text-align: center;'>" .  '<button name="remove_admin" type="submit" value="'.$adminID .'" >Change State</button>'.  "</td>
                
                                </form>
                            </tr>";
                    }
                        echo "</table>";
                    }
                    ?>
            </div>