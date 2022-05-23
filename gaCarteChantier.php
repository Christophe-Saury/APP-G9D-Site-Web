<!DOCTYPE html>
<html>


<?php
    $db = new PDO('mysql:host=localhost;dbname=projet;charset=utf8','root','');
    $identifiant = 22; // Identifiant visiteur
    $hour = time(); // Heure actuelle
    $hour2 = date('H:i:s',$hour -3600); // Heure d'avant
    $day = date('Y-m-d'); // date du jour
    $seuilFreq = 160; // Seuil de signalisation "stress"
    $periodeMesure = 60; // Intervalle de temps entre chaque mesure (en s)

    $dateExemple = '2022-01-01'; // Test de date
    $heureExemple = '15:00:00'; // Test d'horaire


    $np = $db -> prepare('SELECT nom, prenom FROM utilisateur WHERE (id_utilisateur = :id_utilisateur);');
    $np ->  execute(['id_utilisateur' => $identifiant]);
    $np2 = $np -> fetchAll();
    foreach($np2 as $np3) {
        $nom = $np3[0];
        $prenom = $np3[1];
    }
?>


<head>
	<title>Page d'affichage des résultats Administrateur Gestionnaire - Carte Chantier</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="gaCarteChantier.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
</head>


<body>
	<div class="corps">
		<div class="corpsGauche" style="flex-direction: 1;">
			<ul class="corpsGaucheHaut">
				<li class="corpsGaucheHautUtilisateur">Administrateur</li>
                <li class="identifiant"><?php echo "$nom $prenom"?></li>                  
			</ul>
			<ul class="corpsGaucheBas">
				<li><a href="index.php">Capteurs cardiaques</a></li>
				<li><a href="gaCapteursFixes.php">Postes de travail</a></li>
				<li><a href="gaCarteChantier.php">Carte chantier</a></li>
			</ul>
		</div>

		<div class="corpsCentral"  style="flex-direction: 10;"> 
            <header>
                <div class="localisation">
                    Localisation
                </div>
                <div class="Température capteur">
                    <ul>
                        <li>Température : </li>
                        <li>Valeur</li>
                        <i class="material-icons" style="font-size: 30px;">thermostat</i>
                    </ul>
                </div>
                <div class="CO2 capteur">
                    <ul>
                        <li>CO2 :</li>
                        <li>Valeur</li>
                        <i class="material-icons" style="font-size: 30px; color: orange;">co2</i>
                    </ul>
                </div>
                <div class="Humidité capteur">
                    <ul>
                        <li>Humidité :</li>
                        <li>Valeur</li>
                        <i class="material-icons" style="font-size: 30px; color: orange;">water_drop</i>
                    </ul>
                </div>
                <div class="Bruit capteur">
                    <ul>
                        <li>Bruit :</li>
                        <li>Valeur</li>
                        <i class="material-icons" style="font-size: 30px; color: red;">equalizer</i>
                    </ul>
                </div>
            </header>
            <div class="corpsCentral">
                <div class="corpsCentralCarte">
                    <img src=https://www.bati-solar.fr/wp-content/uploads/2018/10/nos-maisons-plans-chatellerault-poitiers-plans-des-maisons-dhabitation-plans-des-maisons.jpg style="width : 100%;opacity: 0.5;" alt="CarteChantier" usemap="#CarteChantier1">
                    <map name="CarteChantier1">
                        <area shape="rect" coords="0 0 410 310" alt="Chambre 1" href="#chambre1.htm">
                        <area shape="rect" coords="0 310 310 690" alt="Garage" href="#garage.htm">
                        <area shape="rect" coords="310 310 780 680" alt="Salon" href="#salon.htm">
                        <area shape="rect" coords="410 0 770 310" alt="Terrasse" href="#terrasse.htm">
                        <area shape="rect" coords="770 0 1200 460" alt="Chambres23" href="#chambres23.htm">
                        <area shape="rect" coords="770 460 1200 690" alt="Cuisine" href="#cuisine.htm">
                    </map>                
                </div>
                <div class="corpsDroit">
		            <button>Cuisine</button>
			        <button>Chambre 1</button>
                    <button>Garage</button>
			        <button>Séjour</button>
		        </div>	
            </div>
        </div>	
	</div>
	


</body>

</html>