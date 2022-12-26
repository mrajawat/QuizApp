<?php
session_start();
include '../dbconnection.php';
if (isset($_POST['submit'])) {
    include "../dbconnection.php";

    $question_no = $_POST['question_no'];
    $question = $_POST['question'];
    $correct_option = $_POST['correct_option'];
    $option = array();
    $option[1] = $_POST['option1'];
    $option[2] = $_POST['option2'];
    $option[3] = $_POST['option3'];
    $option[4] = $_POST['option4'];
    $que = "insert into question(question_number,question) values($question_no,'$question')";

    $query_run = mysqli_query($conn, $que);
  

    if ($query_run) {
        foreach ($option as $key => $value) {
            if ($value != " ") {
                if ($correct_option == $key) {
                    $is_correct = 1;
                } else {    
                    $is_correct = 0;
                }

                $query = "insert into options values(null,$question_no,$is_correct,'$value')";
                $insert_row = mysqli_query($conn, $query);

                if ($insert_row) {
                    continue;
                } else {
                    die("2nd query for choice could not be executed");
                }
            }
        }
        $message = "Question hasbenn added successfully";
    }
   
}
$query = "select * from question";
$questions = mysqli_query($conn, $query);
$total = mysqli_num_rows($questions);
$next = $total + 1;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

</head>
<style>
    .jumbotron {
        padding: 2%;

    }

    .jumbotron h1 {
        float: left;
    }

    .jumbotron a {
        float: right;
        margin-right: 10%;
    }
</style>

<body>
    <div class="jumbotron">
        <h1 class="display-5 titlename">Welcome <?php echo $_SESSION['Sname'] ?></h1>
        <?php if(isset($message)){echo "<h4>".$message."</h4>";} ?>
        <a href="logout.php">Logout</a>
    </div>
    <div class="container">
        <form class="" method="POST" action="Dashboard.php">
            <div class="col-2">
                <label for="questionno" class="form-label">Question Number</label>
                <input type="number" name="question_no" value="<?php echo $next ?>" class="form-control">
            </div>
            <div class="col-md-12">
                <label for="question" class="form-label">Enter Question</label>
                <input type="text" name="question" class="form-control">
            </div>
            <div class="row g-3 options">
                <div class="col-md-6">
                    <label for="option1" class="form-label">option1</label>
                    <input type="text" name="option1" class="form-control">
                </div>
                <div class="col-md-6">
                    <label for="option2" class="form-label">option2</label>
                    <input type="text" name="option2" class="form-control">
                </div>
                <div class="col-md-6">
                    <label for="option3" class="form-label">option3</label>
                    <input type="text" name="option3" class="form-control">
                </div>
                <div class="col-md-6">
                    <label for="option4" class="form-label">option4</label>
                    <input type="text" name="option4" class="form-control">
                </div>
            </div>
            <div class="col-md-2">
                <label for="correctoption" class="form-label">correct option</label>
                <input type="number" name="correct_option" class="form-control">
            </div>
            <div class="col-12">
                <input type="submit" name="submit" class="btn btn-primary" value="Add">

            </div>
        </form>
    </div>





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>

</html>