<html>
<head>
    <title>Formulaire en PHP/MySQL</title>
    <link rel="stylesheet" href="yolo.css">
</head>
<body>
<div class="container">
<form method="post" action="controller.php">
    <div class="formulaire">

        <p>Création d'un compte bancaire</p>
        <input  type="name" name="Nom" placeholder="Entrez votre nom" autocomplete="off" /><br />
        <input  type="provision" name="Provision" placeholder="Entrez votre Provision" autocomplete="off" /><br />
        <select  type="type" name="Type" placeholder="Entrer votre Type" autocomplete="off" />
            <option  value="">--choix du type--</option>
            <option  value="courant">courant</option>
            <option  value="epargne">epargne</option>
            <option  value="compte joint">compte joint</option>
        </select><br />
        <input  type="devise" name="Devise" placeholder="Entrez votre Devise" autocomplete="off" /><br />
        <input  type="submit" name="creationCompteBtn" value="valider" />
    </div>

</div>
</body>
</html>