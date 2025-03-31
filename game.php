<?php
global $pdo;
session_start();
require 'modules/database.php';

$user_id = $_SERVER['REMOTE_ADDR'];

// Check progress
$stmt = $pdo->prepare("SELECT puzzle_level FROM escape_progress WHERE user_identifier = ?");
$stmt->execute([$user_id]);
$progress = $stmt->fetch();

if (!$progress) {
    $stmt = $pdo->prepare("INSERT INTO escape_progress (user_identifier, puzzle_level) VALUES (?, 1)");
    $stmt->execute([$user_id]);
    $puzzle_level = 1;
} else {
    $puzzle_level = $progress['puzzle_level'];
}

// Puzzelvragen (1 t/m 7)
$puzzels = [
    1 => "Wat voor soort opleiding is HBO-ICT aan De Haagse Hogeschool?",
    2 => "In welke stad wordt de opleiding HBO-ICT aangeboden?",
    3 => "Noem één mogelijke afstudeerrichting binnen HBO-ICT.",
    4 => "Hoeveel uur per week besteed je gemiddeld aan de studie HBO-ICT?",
    5 => "Op welke manier werk je vaak samen tijdens de opleiding?",
    6 => "Hoe heet de Engelstalige variant van de opleiding HBO-ICT?",
    7 => "Welke vooropleiding heb je minimaal nodig om HBO-ICT te mogen volgen?",
    8 => "Laatste stap! Beantwoord deze voorkeurvragen voor een persoonlijk studieadvies:"
];
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Escape Room - HBO-ICT</title>
    <style>
        body {
            margin: 0;
            font-family: 'Courier New', Courier, monospace;
            background: #f0f4fa;
            color: #1a1a1a;
        }
        .container {
            max-width: 700px;
            margin: 60px auto;
            padding: 30px;
            background: white;
            border-radius: 15px;
            box-shadow: 0 0 20px rgba(0, 0, 50, 0.1);
            animation: fadeIn 0.6s ease-in-out;
        }
        h1 {
            color: #002b5c;
            text-align: center;
        }
        p {
            font-size: 18px;
        }
        form {
            margin-top: 20px;
        }
        input[type="text"], input[type="submit"] {
            font-size: 16px;
            padding: 10px;
            width: 100%;
            margin-bottom: 15px;
            border-radius: 8px;
            border: 1px solid #ccc;
        }
        input[type="submit"] {
            background: #004d99;
            color: white;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background: #0066cc;
        }
        label {
            display: block;
            margin: 8px 0;
        }
        @keyframes fadeIn {
            from {opacity: 0; transform: translateY(20px);}
            to {opacity: 1; transform: translateY(0);}
        }
        .advies {
            background: #e0f0ff;
            border-left: 5px solid #004d99;
            padding: 20px;
            border-radius: 10px;
            margin-top: 20px;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>🎮 Escape Room: HBO-ICT</h1>

    <?php if ($puzzle_level <= 7): ?>
        <p><strong>Level <?= $puzzle_level ?>:</strong> <?= $puzzels[$puzzle_level] ?></p>
        <form action="check_answer.php" method="POST">
            <input type="text" name="answer" placeholder="Jouw antwoord" required>
            <input type="submit" value="Controleer">
        </form>

    <?php elseif ($puzzle_level == 8): ?>
        <p><strong><?= $puzzels[8] ?></strong></p>
        <form action="check_answer.php" method="POST">
            <p>1. Waar werk je het liefst mee?</p>
            <label><input type="radio" name="q1" value="mensen" required> Mensen</label>
            <label><input type="radio" name="q1" value="data"> Data</label>
            <label><input type="radio" name="q1" value="code"> Code</label>
            <label><input type="radio" name="q1" value="security"> Veiligheidssystemen</label>

            <p>2. Wat vind jij het leukst om te doen?</p>
            <label><input type="radio" name="q2" value="support" required> Problemen van gebruikers oplossen</label>
            <label><input type="radio" name="q2" value="analyse"> Patronen ontdekken in data</label>
            <label><input type="radio" name="q2" value="bouwen"> Software bouwen</label>
            <label><input type="radio" name="q2" value="beveiligen"> Systemen beveiligen</label>

            <p>3. Werk je liever...</p>
            <label><input type="radio" name="q3" value="alleen" required> Alleen</label>
            <label><input type="radio" name="q3" value="team"> In teamverband</label>
            <label><input type="radio" name="q3" value="afwisselend"> Wisselend</label>

            <p>4. Wat spreekt jou het meest aan?</p>
            <label><input type="radio" name="q4" value="apps" required> Apps en websites ontwikkelen</label>
            <label><input type="radio" name="q4" value="ai"> Slimme algoritmes en AI</label>
            <label><input type="radio" name="q4" value="infra"> Netwerken en infrastructuur</label>
            <label><input type="radio" name="q4" value="visualiseren"> Data visualiseren</label>

            <p>5. Je krijgt een ICT-opdracht. Wat doe je als eerste?</p>
            <label><input type="radio" name="q5" value="bouwen" required> Gelijk iets bouwen</label>
            <label><input type="radio" name="q5" value="structuur"> Eerst een plan maken</label>
            <label><input type="radio" name="q5" value="vragen"> Overleggen met team</label>
            <label><input type="radio" name="q5" value="testen"> Testen hoe systemen reageren</label>

            <input type="submit" value="🎓 Bekijk mijn studieadvies">
        </form>

    <?php elseif ($puzzle_level == 9): ?>
        <?php
        $q1 = $_SESSION['q1'] ?? '';
        $q2 = $_SESSION['q2'] ?? '';
        $q3 = $_SESSION['q3'] ?? '';
        $q4 = $_SESSION['q4'] ?? '';
        $q5 = $_SESSION['q5'] ?? '';
        $advies = "Software Engineering";

        if ($q1 === 'security' || $q2 === 'beveiligen' || $q4 === 'infra') {
            $advies = "Cyber Security";
        } elseif ($q1 === 'data' || $q2 === 'analyse' || $q4 === 'visualiseren') {
            $advies = "Data Science";
        } elseif ($q1 === 'code' || $q2 === 'bouwen' || $q4 === 'apps') {
            $advies = "Software Engineering";
        } elseif ($q1 === 'mensen' || $q2 === 'support' || $q3 === 'team') {
            $advies = "Business IT & Management";
        } elseif ($q4 === 'ai') {
            $advies = "Technology Innovation";
        }
        ?>
        <div class="advies">
            <h2>🎉 Je hebt de Escape Room gehaald!</h2>
            <p><strong>🎓 Jouw aanbevolen richting is:</strong> <?= $advies ?></p>
            <p>Bedankt voor het spelen van de Escape Room!</p>
        </div>
        <form action="reset.php" method="POST">
            <input type="submit" value="🔄 Opnieuw spelen">
        </form>
    <?php endif; ?>
</div>
</body>
</html>
