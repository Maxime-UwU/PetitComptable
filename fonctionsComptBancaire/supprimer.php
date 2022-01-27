<?php

$db = db_connect();

$ReqSupp = $db->prepare('DELETE FROM Compte_Bancaire');