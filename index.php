<?php
ini_set('display_errors',1);

spl_autoload_register(function ($class) {

    // project-specific namespace prefix
    $prefix = 'ItechSup\\';

    // base directory for the namespace prefix
    $base_dir = __DIR__ . '/Class/';

    // does the class use the namespace prefix?
    $len = strlen($prefix);
    if (strncmp($prefix, $class, $len) !== 0) {
        // no, move to the next registered autoloader
        return;
    }

    // get the relative class name
    $relative_class = substr($class, $len);

    // replace the namespace prefix with the base directory, replace namespace
    // separators with directory separators in the relative class name, append
    // with .php
    $file = $base_dir . str_replace('\\', '/', $relative_class) . '.php';

    // if the file exists, require it
    if (file_exists($file)) {
        require $file;
    }
});

// Génération du formulaire
$form = new \ItechSup\Form('mon_form');
$form->addWidget(new \ItechSup\Widgets\InputText('nom','Saisissez votre nom', array('placeholder'=>'Nom','required'=>1, 'id'=>'id_nom2')));
$form->addWidget(new \ItechSup\Widgets\InputText('prenom','Saisissez votre prénom', array('placeholder'=>'Prénom')));
$form->addWidget(new \ItechSup\Widgets\InputText\InputMail('mail','Saisissez votre mail', array('placeholder'=>'example@mail.com')));
$form->addWidget(new \ItechSup\Widgets\InputText\InputPassword('password','Saisissez votre mot de passe'));
$form->addWidget(new \ItechSup\Widgets\InputTel('telephone','Saisissez votre téléphone',array('required'=>1)));
$form->addWidget(new \ItechSup\Widgets\InputText\InputCp('cp', 'Saisissez votre code postal'));
$form->addWidget(new \ItechSup\Widgets\InputText('ville', 'Saisissez votre ville'));
$form->addWidget(new \ItechSup\Widgets\InputTextarea('commentaire','Saisissez votre commentaire'));
$form->addWidget(new \ItechSup\Widgets\InputSelect('age','Choisissez votre âge',array(''=>'Choisissez','0-9'=>'0-9 ans','10-19'=>'10-19 ans','20-29'=>'20-29 ans','30-39'=>'30-39 ans','40-49'=>'40-49 ans','50+'=>'50 ans et plus'),array('requis'=>1)));
$form->addWidget(new \ItechSup\Widgets\InputSelect('heure','Choisissez votre heure (plusieurs choix possibles)',array('0-3'=>'moins de 3h','4-6'=>'de 3 à 6h','7+'=>'plus de 6h'),array('multiple'=>true)));
$form->addWidget(new \ItechSup\Widgets\InputInt('enfant','Saisissez le nombre d\'enfants',array('default'=>0)));
$form->addWidget(new \ItechSup\Widgets\InputRadio('sexe','Choisissez votre sexe',array('h'=>'Masculin','f'=>'Féminin'),array('required'=>1)));
$form->addWidget(new \ItechSup\Widgets\InputCheckBox('vehicule','Choisissez votre véhicule',array('moto'=>'Moto','velo'=>'vélo', 'voiture'=>'voiture')));
$form->addWidget(new \ItechSup\Widgets\InputButton('submit_form', 'Envoyer', 'submit'));

/*
// Vérification du couple CP - Ville
function verif_correspondance_couple($cp, $ville){
    // Variables pour test 
    $verif_cp_ville['44000'] = 'Nantes';
    $verif_cp_ville['44470'] = 'CARQUEFOU';
    
    if ($cp->getValue()== NULL) {
        $cp->setLibelle('<br /><b style="color: red;">Le code postal doit être renseigné pour vérifier la correspondance.</b>');
    }
    else if (empty($verif_cp_ville[$cp->getValue()])) {
        $cp->setLibelle('<br /><b style="color: red;">Ce code postal n\'existe pas dans notre base.</b>');
    }
    else if ($ville->getValue()== NULL) {
        $ville->setLibelle('<br /><b style="color: red;">La ville doit être renseignée pour vérifier la correspondance.</b>');
    }
    else if ( strtoupper($verif_cp_ville[$cp->getValue()]) != strtoupper($ville->getValue())) {
        $cp->setLibelle('<br /><b style="color: red;">Le couple Code postal - Ville ne correspond pas.</b>');
        $ville->setLibelle('<br /><b style="color: red;">Le couple Code postal - Ville ne correspond pas.</b>');
    }
}

// Vérification des correspondances
function verif_correspondance($value1, $value2){
    
    if ($value1->getValue() != $value2->getValue()) {
        $value1->setCode(1);
        $value2->setCode(1);
        $value1->setLibelle('<br /><b style="color: red;">Les deux champs ne correspondent pas.</b>');
        $value2->setLibelle('<br /><b style="color: red;">Les deux champs ne correspondent pas.</b>');
    }
}
*/

// Traitement du $_POST
if (!empty($_POST)) {
	
	// Affectation des valeurs
	$form->bind($_POST);

	// On vérifie si les données sont valides
	if ($form->validate()){
		$affichage_post = true;
	}
}
else {
	// On rempli le formulaire par défaut
	$data = array(
		'nom' => 'Duchêne',
		'prenom' => 'Thomas',
		'mail' => 'thomas@lepamplemousse.fr',
		'telephone' => '+33(6).56.20.72.35',
		'cp' => '44000',
		'ville' => 'Nantes',
		'commentaire' => 'pas de commentaire',
		'age' => '30-39',
		'sexe' => 'h',
		'vehicule' => array('moto'=>true,'voiture'=>true),
		'submit_form' => 'Envoyer'
	);
	$form->bind($data);
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Mon formulaire</title>
		<link rel="stylesheet" type="text/css" href="style.css" />
		<link href="http://fonts.googleapis.com/css?family=Indie+Flower" rel="stylesheet" type="text/css" />
    </head>
    <body>
		<div id="wrapper">
			<h1>Mon formulaire</h1>
			<?php echo $form->render(); ?>
			<?php 
				if ($affichage_post == true) {
					echo '<pre>';
					print_r($_POST);
					echo '</pre>';
				}
			?>
		</div>
    </body>
</html>