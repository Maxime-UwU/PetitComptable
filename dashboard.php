<?php
//vérifie si le fichier a déjà été inclus
require_once 'functions/account.inc.php';
require_once 'functions/operation.inc.php';
?>

<html>
<head>
    <title>Acceuil</title>
    <link rel="stylesheet" href="yolo2.css">
</head>
<body>
<div class="container">
    <p>Ptit Comptable</p>

    <select type="compte" name="Compte" placeholder="Selectionnez votre compte" autocomplete="off"/>
    <option value="">--choix du compte--</option>
    <!--recuperation de IDB pour afficher les comptes -->
    <?php foreach (getAccountList(1) as $account): ?>
        <option value="<?php echo $account['IDB']; ?>">
            <?php echo "Compte : " . $account['NOMcompte'] . " provison : " . $account['Provision']; ?>
        </option>
    <?php endforeach; ?>
    </select>

    <button id="btnr" onclick="location.href='azerty.php';">
        sup
    </button>

    <input type="button" class="button_active" onclick="location.href='index.php';" value="Creation Compte Bancaire"/>
    <input type="button" class="button_active" onclick="location.href='Operation.php';" value="Creation Opération"/>


</div>
</body>
</html>