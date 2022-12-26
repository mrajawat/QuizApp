<?php 
include "./dbconnection.php";

$query = "select * from question";
$total_question = mysqli_num_rows(mysqli_query($conn,$query));
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>QuizApp</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<style>
    .px-3{
        margin: 13% auto;
    }
    .px-3 a{
        color: black;
    }
</style>

<body class="d-flex h-100 text-center text-bg-dark" data-new-gr-c-s-check-loaded="8.904.0" data-gr-ext-installed="">

    <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
        <header class="mb-auto">
            <div>
                <h3 class="float-md-start mb-0">QuizApp</h3>
            </div>
        </header>

        <main class="px-3">
            <h1>Start you quiz</h1>
            <p class="lead">There is total <strong><?php echo $total_question ?></strong> questions, Tap on button to start your quiz now BEST OF LUCK</p>
            <p class="lead">
                <a href="userDashboard.php?n=1" class="btn btn-lg btn-secondary fw-bold border-white bg-blue">Start Quiz</a>
            </p>
        </main>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>
</html>