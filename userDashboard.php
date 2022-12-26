<?php
session_start();
include './dbconnection.php';

$number = $_GET['n'];

//get question
$query = "select * from question where question_number = $number";
$result = mysqli_query($conn, $query);
$question = mysqli_fetch_assoc($result);

//get options
$query = "select * from options where question_number = $number";
$choices = mysqli_query($conn, $query);

//get total questions
$query = "select * from question";
$total_question = mysqli_num_rows(mysqli_query($conn, $query));


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
        margin-bottom: 10%;

    }

    .jumbotron h1 {
        float: left;
    }

    .jumbotron a {
        float: right;
        margin-right: 10%;
        text-decoration: none;
        color: #fff;
        font-weight: bold;
        border-bottom: 2px solid #fff;
    }
    .options{
        background-color: transparent;
        color: #fff;
        border-bottom: #fff;
    }
</style>

<body class=" text-bg-dark">
    <div class="jumbotron">
        <h1 class="display-5 titlename">Welcome to Quiz Game</h1>
        <a href="logout.php">Logout</a>
    </div>
    <div class="container">
        <div class="col-4">
            <label for="value3" class="form-label">Question <?php echo $number ?> / <?php echo $total_question ?></label><br>
            <label for="value4" class="form-label"><?php echo $question['question']; ?></label>
        </div>
        <form action="process.php" method="POST">
            <ul class="list-group choices col-md-6 ">
                <?php
                while ($row = mysqli_fetch_assoc($choices)) {
                ?>
                    <li class="list-group-item options"><input type="radio" name="option" value="<?php echo $row['id'] ?>"> <?php echo $row['choice'] ?></li>
                <?php
                }
                ?>
            </ul>
            <input type="hidden" name="number" value="<?php echo $number; ?>">
            <input type="submit" class="btn btn-secondary" name="submit" value="submit">
        </form>
    </div>







    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>

</html>