<?php
include "./dbconnection.php";

session_start();

if (!isset($_SESSION['score'])) {
    $_SESSION['score'] = 0;
}
if ($_POST) {
    $query = "select * from question";
    $total_questions = mysqli_num_rows(mysqli_query($conn, $query));

    $number = $_POST['number'];

    $selected_choice = $_POST['option'];

    $next = $number + 1;


    $query = "select * from options where question_number =$number AND is_correct = 1";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);

    $correct_choice = $row['id'];

    //increase score if choice is correct
    if ($selected_choice == $correct_choice) {
        $_SESSION['score']++;
    }
    //redirect to next question
    if ($number == $total_questions) {
        header("location: final.php");
    } else {
        header("location: userDashboard.php?n=" . $next);
    }
}
