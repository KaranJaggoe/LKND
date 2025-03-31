<?php
global $pdo;
include_once 'modules/database.php';

$user_id = $_SERVER['REMOTE_ADDR'];
$stmt = $pdo->prepare("DELETE FROM escape_progress WHERE user_identifier = ?");
$stmt->execute([$user_id]);
session_start();
session_destroy();
header("Location: game.php");
exit;
?>
