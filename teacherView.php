<!DOCTYPE html>
<html lang="en">

<head>
    <style class="vjs-styles-defaults">
        .video-js {
            width: 300px;
            height: 150px;
        }

        .vjs-fluid {
            padding-top: 56.25%
        }
    </style>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">
    <title>QLMS</title>
    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/carousel/">
    <!-- Bootstrap core CSS -->
    <link href="https://getbootstrap.com/docs/4.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/starter-template/">
    <!-- Custom styles for this template -->
    <link href="https://getbootstrap.com/docs/4.0/examples/carousel/carousel.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="./CSS/styles.css">



</head>


<body cz-shortcut-listen="true">
    <?php include "./components/Header.html" ?>
    <?php include "./handleTeacherUploadAssignment.php"?>
    <!-- <?php include "./teacherLectureUpload.php"?> -->

    <!-- *******************view Lecture****************************-->
    <div id="uploadLectureModal" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg" role="content">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title ">Upload Lectures</h4>
                    <button type="button" class="close" data-dismiss="modal" id="modal-button">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="row row-content ">
                        <div class="col-12 col-md-10 offset-1">
                            <div>
                                <h3>Lectures</h3>
                            </div>



                            <!-- <form method="POST" action="addUser.php"> -->
                            <div class=" container">
                                <div class="row">
                                    <?php
                                    // $title = 'Web Develop';

                                    if (isset($_GET["data"])) {
                                        $data = $_GET["data"];
                                    } else {
                                    }
                                    $con =  new mysqli("localhost", "root", "", "learning_management_system");
                                    $query = " SELECT * FROM lecture where CourseCode = $data ";
                                    $result = mysqli_query($con, $query);


                                    // $quariy = $mysqli->query("select * from course ");
                                    ?>


                                    <form method="POST" enctype="multipart/form-data">

                                        <input class="col-12" type="text" name="LectureNo" value="" placeholder="Lecture No  ">
                                        <input type="hidden" name="CourseCode" value="<?php echo $row['CourseCode'] ?>">
                                        <input class="col-12" type="text" name="LectureTopic" value="" placeholder="Lecture Topic">
                                        <input type="hidden" name="UploadTime" value="<?php  echo date_default_timezone_get() ?>">
                                        <input class="col-12" type="file" name="myfile"><br>

                                        
                                        <input type="hidden" name="TeacherID" value="<?php echo unserialize($_SESSION['teach']) ?>">

                                        <button class="  button btn-bg btn-primary" type="submit" name="upload">upload</button>
                                    </form>
                                </div>

                            </div>

                        </div>
                    </div>
                    <div class="form-row">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!------------------------------------------------------------------------------------------------------>
    <!-- *******************view Assignments****************************-->
    <div id="uploadAssignmentModal" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg" role="content">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title ">Upload Assignments</h4>
                    <button type="button" class="close" data-dismiss="modal" id="modal-button">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="row row-content ">
                        <div class="col-12 col-md-10 offset-1">
                            <div>
                                <h3>Assignments</h3>
                            </div>



                            <!-- <form method="POST" action="addUser.php"> -->
                            <div class=" container">
                                <div class="row">
                                    <?php
                                    // $title = 'Web Develop';

                                    if (isset($_GET["data"])) {
                                        $data = $_GET["data"];
                                    } else {
                                    }
                                    $con =  new mysqli("localhost", "root", "", "learning_management_system");
                                    $query = " SELECT * FROM assignment where CourseCode = $data ";
                                    $result = mysqli_query($con, $query);
                                    // $row = mysqli_fetch_array($result);




                                    // $quariy = $mysqli->query("select * from course ");
                                    ?>


                                    <form method="POST" enctype="multipart/form-data">

                                        <input class="col-12" type="text" name="AssignmentNo" value="" placeholder="Assignment No  ">
                                        <input type="hidden" name="CourseCode" value="<?php echo $data ?>">
                                        <input class="col-12" type="text" name="AssignmentTopic" value="" placeholder="Assignment Topic  ">
                                        <input type="hidden" name="UploadTime" value="">
                                        <input class="col-12" type="datetime-local" id="DueTime" name="DueTime" placeholder="Enter Deadline">
                                        <input class="col-12" type="file" name="myfile"><br>

                                        
                                        <input type="hidden" name="TeacherID" value="<?php echo unserialize($_SESSION['teach']) ?>">

                                        <button class="  button btn-bg btn-primary" type="submit" name="upload">upload</button>
                                    </form>
                                </div>

                            </div>

                        </div>
                    </div>
                    <div class="form-row">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--####################################################################################################-->

    <main role="main">
        <!-- Marketing messaging and featurettes ================================================== -->
        <!-- Wrap the rest of the page in another container to center all the content. -->
        <!-- Three columns of text below the carousel -->
        <div class="about-header">
            <div class="col-lg-12 text-center">
                <h1>Actions</h1>
                <hr style="background-color: #eee;
            border: 0 none;
            color: #eee;
            height: 1px;
            margin-bottom: 10px;">
                </hr>
            </div>
        </div>




        <div class="row row-content ">

            <div class="col-12 col-md-5 offset-2">
                <!-- <div>
                    <h3>Software Construction</h3>
                </div>-->
                <form>
                    <div class="row form-group">

                        <div class="col-12 col-md-6">
                            <a href="#"> <button id="uploadLec" data-dismiss="modal" data-toggle="modal" href="#uploadLectureModal" type="button" style="height: 150px; width: 100%;" class="btn btn-dark ">Click here to <br>Upload Lecture</button></a>
                        </div>
                    </div>



                </form>

            </div>

            <div class="col-12 col-md-5 ">
                <!-- <div>
                    <h3>Analysis and Design </h3>
                </div>-->
                <form>
                    <div class="row form-group">

                        <div class="col-12 col-md-6">
                            <button type="button" id="uploadAss" data-dismiss="modal" data-toggle="modal" href="#uploadAssignmentModal" style="height: 150px; width: 100%;" class="btn btn-warning">Click
                                here to <br> upload Assignment </button>
                        </div>
                    </div>
                </form>

            </div>
        </div>

        <!-- ******************************************************** next row -->

    </main>
    <?php include "./components/Footer.html" ?>
</body>

<!-- Bootstrap core JavaScript ================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js " integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN " crossorigin="anonymous "></script>
<script>
    window.jQuery || document.write('<script src="https://getbootstrap.com/docs/4.0/assets/js/vendor/jquery-slim.min.js "><\/script>')
</script>
<script src="https://getbootstrap.com/docs/4.0/assets/js/vendor/popper.min.js "></script>
<script src="https://getbootstrap.com/docs/4.0/dist/js/bootstrap.min.js "></script>
<!-- Just to make our placeholder images work. Don't actually copy the next line! -->
<script src="https://getbootstrap.com/docs/4.0/assets/js/vendor/holder.min.js "></script> <svg xmlns="http://www.w3.org/2000/svg " width="500 " height="500 " viewBox="0 0 500 500 " preserveAspectRatio="none " style="display: none; visibility: hidden;
                                position: absolute; top: -100%; left: -100%; ">
    <defs>
        <style type="text/css "></style>
    </defs><text x="0 " y="25 " style="font-weight:bold;font-size:25pt;font-family:Arial, Helvetica, Open Sans, sans-serif ">500x500</text>
</svg>


<script src="./JS/scripts.js"></script>


</html>