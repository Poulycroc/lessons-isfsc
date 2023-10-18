<?php
$prenom = 'Prénom';
$nom = 'Nom';

$prenomNom = "$prenom $nom";
$email = strtolower($prenom . '.' . $nom . '@email.com');
?>
<!DOCTYPE html> 
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Curriculum Vitae - <?php echo $prenomNom; ?></title>
</head>
<body>
  <h1>Curriculum Vitae</h1>
  <h2><?php echo $prenomNom; ?></h2>

  <img src="assets/img/thomas.jpeg" alt="<?php echo $prenomNom; ?>">

  <h3>Informations Personnelles</h3>
  <ul>
    <li><strong>Nom :</strong> <?php echo $prenom; ?></li>
    <li><strong>Prénom :</strong> <?php echo $nom; ?></li>
    <li><strong>Date de Naissance :</strong> 27 novembre 1991 (<?php echo date("Y") - 1991 ?> ans)</li>
    <li><address><strong>Adresse :</strong> 456, Avenue Virtuelle, 1000 Bruxelles, Belgique</address></li>
    <li><strong>Téléphone :</strong> <a href="tel:+32 2 34 56 78">+32 2 34 56 78</a></li>
    <li><strong>Email :</strong> <a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a></li>
  </ul>
  
  <?php require "formations.php"; ?>
  
  <h3>Expériences Professionnelles</h3>
  <ul>
    <li>Avril 2016 - Présent : Développeur Front-End, Société TechVision, Bruxelles
      <ul>
        <li>Conception et développement d'interfaces utilisateur pour des applications web et mobiles en utilisant HTML, CSS et JavaScript.</li>
        <li>Collaboration étroite avec les designers pour transformer des maquettes en interfaces interactives et conviviales.</li>
        <li>Expérience dans la mise en œuvre de projets Agile, avec des sprints et des réunions de planification et de rétrospective.</li>
        <li>Utilisation de frameworks tels que React et Vue.js pour créer des expériences utilisateur dynamiques et réactives.</li>
        <li>Intégration de services RESTful et utilisation de Git pour le contrôle de version.</li>
      </ul>
    </li>
    <li>Juin 2015 - Mars 2016 : Stagiaire en Développement Web, Startup WebCraft, Liège
      <ul>
        <li>Assistance dans la création d'une application web responsive utilisant les dernières technologies front-end.</li>
        <li>Participation à l'optimisation des performances du site et à l'assurance de sa compatibilité avec différents navigateurs.</li>
        <li>Contribution à la mise en place d'une méthodologie de développement Agile au sein de l'équipe.</li>
      </ul>
    </li>
  </ul>
  
  <?php require "skills.php"; ?>
  
  
  <h3>Langues</h3>
  <ul>
    <li>Français (courant)</li>
    <li>Anglais (avancé)</li>
    <li>Néerlandais (notions)</li>
  </ul>
  
  <h3>Centres d'Intérêt</h3>
  <ul>
    <li>Programmation créative</li>
    <li>Musique : Pratique de la guitare et de la composition musicale</li>
    <li>Randonnée : Exploration des magnifiques paysages naturels en Belgique et ailleurs</li>
  </ul>
</body>

</html>
