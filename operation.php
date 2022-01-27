<?php
    require_once 'functions/account.inc.php';
    require_once  'functions/operation.inc.php';
?>

<html>
<head>
    <title>Operations bancaires</title>
    <link rel="stylesheet" href="yolo.css">
</head>
<body>

<div class="containerOperation">
    <form method="post" action="controllerOperation.php">
        <div class="formulaireOperation">

            <p>faire une operation</p>
            <input  type="nom" name="Nom" placeholder="Nom de l'operation" autocomplete="off" /><br />
            <input  type="montant" name="Montant" placeholder="Entrez un montant" autocomplete="off" /><br />
            <input  type="date" name="Date" placeholder="Entrez la date" autocomplete="off" /><br />

            <!-- a changer -->
            <select  type="categorie" name="Categorie" placeholder="Entrez votre catégorie" autocomplete="off" />
            <option  value="">--choix du type--</option>
            <option  value="alimentaire">Alimentaire</option>
            <option  value="vestimentaire">Vestimentaire</option>
            <option  value="loisir">Loisir</option>
            <option  value="transport">Transport</option>
            <option  value="logement">Logement</option>
            <option  value="autres">Autres</option>
            <option  value="virement">Virement</option>
            <option  value="depot">Dépôt</option>
            </select><br />
            <select type="compte" name="Compte" placeholder="Selectionnez votre compte" autocomplete="off"/>
                <option  value="">--choix du compte--</option>
                <?php foreach( getAccountList(1) as $account ): ?>
                    <option value="<?php echo $account['IDB']; ?>">
                        <?php echo $account['NOMcompte']; ?>
                    </option>
                <?php endforeach; ?>
            </select><br/>

            <input  type="submit" name="operationBtn" value="valider" />
        </div>
    </form>


</div>

</body>
</html>