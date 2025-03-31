<?php
global $pdo;
session_start();

// Zorg dat het pad naar db.php klopt
include_once 'modules/database.php';

$user_id = $_SERVER['REMOTE_ADDR'];
$antwoord = strtolower(trim($_POST['answer'] ?? ''));

// Stap 1: Haal huidige level op
$stmt = $pdo->prepare("SELECT puzzle_level FROM escape_progress WHERE user_identifier = ?");
$stmt->execute([$user_id]);
$progress = $stmt->fetch();

$current_level = $progress['puzzle_level'] ?? 1;

// Stap 2: Antwoordenlijst t/m level 7
$antwoorden = [
    1 => ['hbo bachelor'],
    2 => ['den haag'],
    3 => ['software engineering', 'data science', 'cyber security', 'business it & management', 'technology innovation', 'infrastructure & security'],
    4 => ['40', '40 uur'],
    5 => ['projectmatig', 'projecten'],
    6 => ['ict international'],
    7 => ['havo', 'vwo', 'mbo 4']
];

// Stap 3: Check gewone puzzels (level 1–7)
if ($current_level <= 7 && isset($antwoorden[$current_level])) {
    if (in_array($antwoord, $antwoorden[$current_level])) {
        // Goed antwoord → update level
        $stmt = $pdo->prepare("UPDATE escape_progress SET puzzle_level = ? WHERE user_identifier = ?");
        $stmt->execute([$current_level + 1, $user_id]);
    }
}

// Stap 4: Check voorkeurvragen (level 8)
if ($current_level == 8 &&
    isset($_POST['q1']) && isset($_POST['q2']) &&
    isset($_POST['q3']) && isset($_POST['q4']) && isset($_POST['q5'])) {

    $_SESSION['q1'] = $_POST['q1'];
    $_SESSION['q2'] = $_POST['q2'];
    $_SESSION['q3'] = $_POST['q3'];
    $_SESSION['q4'] = $_POST['q4'];
    $_SESSION['q5'] = $_POST['q5'];

    $stmt = $pdo->prepare("UPDATE escape_progress SET puzzle_level = 9 WHERE user_identifier = ?");
    $stmt->execute([$user_id]);
}

// Stap 5: Ga terug naar game
header("Location: game.php");
exit;
?>
