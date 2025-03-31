<?php
function getData()
{
    global $db;
    return $db->query("SELECT * FROM puzzels")->fetchAll();
}