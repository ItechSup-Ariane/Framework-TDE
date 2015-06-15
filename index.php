<?php
ini_set('display_errors', 1);

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
/* * **********************  */
/* 			Form			 */
/* * **********************  */
/**
 * 	Use this command to generate a new form
 * 	$form = new \ItechSup\Form('mon_form');
 * 	$form is the variable name
 * 	mon_form is the form name
 */
$form = new \ItechSup\Form('mon_form');

/* * **********************  */
/* 		addWiget			 */
/* * **********************  */
/**
 * 	Function addWiget :
 * 	use this function to add new widget on your form.
 * 	$form->addWidget(
 * 		type de widget et ces paramètres
 * 		nom du groupe, par défaut appartenance à aucun groupe
 * 	);
 */
/* * **********************  */
/* 		Inputs simples		 */
/* * **********************  */
/**
 * 	Inputs
 * 	Mandatory settings
 * 		
 * 	Paramètres obligatoires
 * 		nom de l'élément
 * 		label de l'élément
 * 	
 * 	Paramètres optionnels
 * 		tableau d'éléments
 * 			placeholder : affichage informatif au sein de l'input
 * 			required : spécifie si l'élément est requis (obligatoire)
 * 			id : permet de spécifier un identifiant en particulier, si non renseigné, l'élément est identifié par son nom
 * 			default : permet de spécifier une valeur par défaut
 */
$form->addWidget(new \ItechSup\Widgets\InputText('nom', 'Saisis ton nom', array('placeholder' => 'Nom', 'required' => 1, 'id' => 'id_nom2')), 'Mon compte');
$form->addWidget(new \ItechSup\Widgets\InputText('prenom', 'Saisis ton prénom', array('placeholder' => 'Prénom')), 'Mon compte');
$form->addWidget(new \ItechSup\Widgets\InputText\InputMail('mail', 'Saisis ton mail', array('placeholder' => 'example@mail.com')), 'Mon compte');
$form->addWidget(new \ItechSup\Widgets\InputText\InputPassword('password', 'Saisis ton mot de passe'), 'Mon compte');
$form->addWidget(new \ItechSup\Widgets\InputTel('telephone', 'Saisis ton téléphone', array('required' => 1)), 'Mon compte');
$form->addWidget(new \ItechSup\Widgets\InputText\InputCp('cp', 'Saisis ton code postal'), 'Mon compte');
$form->addWidget(new \ItechSup\Widgets\InputText('ville', 'Saisis ta ville'), 'Mon compte');
$form->addWidget(new \ItechSup\Widgets\InputTextarea('commentaire', 'Laisse un commentaire'), 'Mon compte');
$form->addWidget(new \ItechSup\Widgets\InputInt('corne', 'Saisis le nombre de cornes', array('default' => 1)), 'Ma licorne');

/* * **********************  */
/* 		Inputs listes		 */
/* * **********************  */
/*
  Paramètres obligatoires
  nom de l'élément
  label de l'élément
  tableau contenant les différentes valeurs
  Liste "simple"
  clé de l'élément
  valeur affiché de l'élement
  Liste "groupe"
  tableaux contenant les groupes
  clé de l'élément
  valeur affiché de l'élement

  Paramètres optionnels
  tableau d'éléments
  required : spécifie si l'élément est requis (obligatoire)
  id : permet de spécifier un identifiant en particulier, si non renseigné, l'élément est identifié par son nom
 */
// Listes "simples"
$form->addWidget(new \ItechSup\Widgets\InputList\InputSelect('age', 'Choisis l\'âge de ta licorne', array('' => 'Choisissez', '0-9' => '0-9 ans', '10-19' => '10-19 ans', '20-29' => '20-29 ans', '30-39' => '30-39 ans', '40-49' => '40-49 ans', '50+' => '50 ans et plus'), array('requis' => 1)), 'Ma licorne');
$form->addWidget(new \ItechSup\Widgets\InputList\InputSelect('couleur', 'Choisis la couleur', array('Claire' => array('blanc' => 'Blanc', 'jaune' => 'Jaune', 'rose' => 'Rose'), 'Foncée' => array('noir' => 'Noir', 'marron' => 'Marron', 'violet' => 'Violet'))), 'Ma licorne');
$form->addWidget(new \ItechSup\Widgets\InputList\InputRadio('sexe', 'Choisis le sexe de ta licorne', array('h' => 'Masculin', 'f' => 'Féminin'), array('required' => 1)), 'Ma licorne');
$form->addWidget(new \ItechSup\Widgets\InputList\InputCheckBox('decorations', 'Choisis les décorations', array('papillons' => 'Papillons', 'arcenciel' => 'Arc-en-ciel', 'etoiles' => 'Etoiles')), 'Ma licorne');
// Listes "groupes"
$form->addWidget(new \ItechSup\Widgets\InputList\InputSelect('heure', 'Quel est le tempérament de ta licorne <br />(plusieurs choix possibles)', array('joueuse' => 'Joueuse', 'coquine' => 'Coquine', 'timide' => 'Timide'), array('multiple' => true)), 'Ma licorne');
$form->addWidget(new \ItechSup\Widgets\InputList\InputSelect('jeux', 'A quoi joue ta licorne', array('Ballon' => array('foot' => 'Football', 'rugby' => 'Rugby'), 'Autre' => array('cachecache' => 'Cache-cache', 'soleil' => '1-2-3 Soleil')), array('multiple' => true)), 'Ma licorne');
$form->addWidget(new \ItechSup\Widgets\InputList\InputRadio('type_joueur', 'Choisis son apétit', array('Gourmande' => array('g1' => 'Mange tout le temps', 'g2' => 'Mange beaucoup'), 'Normale' => array('n1' => 'Mange à l\'heure des repas', 'n2' => 'Mange que le soir'))), 'Ma licorne');
$form->addWidget(new \ItechSup\Widgets\InputList\InputCheckBox('materiel', 'Choisis son équipement', array('Corps' => array('selle' => 'Selle', 'brides' => 'Brides', 'eperons' => 'Eperons'), 'Tête' => array('casque' => 'Casque', 'visiere' => 'Visière', 'lunettes' => 'Lunettes de soleil'))), 'Ma licorne');

/* * **********************  */
/* 			Boutons			 */
/* * **********************  */
/*
  Paramètres obligatoires
  nom de l'élément
  label de l'élément
  type de bouton (submit, reset)
 */
$form->addWidget(new \ItechSup\Widgets\InputButton('submit_form', 'Envoyer', 'submit'), 'Envoi');
$form->addWidget(new \ItechSup\Widgets\InputButton('reset_form', 'Vider', 'reset'), 'Envoi');

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
    if ($form->validate()) {
        $affichage_post = true;
    }
    /*
      if ($form->validate2()){
      $affichage_post = true;
      }
     */
}
/* else {
  // On rempli le formulaire par défaut
  $data = array(
  'nom' => 'Duchêne',
  'prenom' => 'Thomas',
  'mail' => 'thomas@lepamplemousse.fr',
  'telephone' => '+33(6).56.20.72.35',
  'cp' => '44000',
  'ville' => 'Nantes',
  'commentaire' => 'pas de commentaire',
  'age' => '10-19',
  'sexe' => 'f',
  'couleur' => 'rose'
  );
  $form->bind($data);
  } */
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
            <?php
            if ($affichage_post == true) {
                echo '<div id="resultat"><pre>';
                print_r($_POST);
                echo '</pre></div>';
            }            
            echo $form->render(); 
            ?>
        </div>
    </body>
</html>