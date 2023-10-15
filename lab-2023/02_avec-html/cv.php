<?php
$cv = [
    "nom" => "Martin",
    "prenom" => "Thomas",
    "date_naissance" => "15 mars 1992",
    "age" => 31,
    "adresse" => "456, Avenue Virtuelle, 1000 Bruxelles, Belgique",
    "telephone" => "+32 2 34 56 78",
    "email" => "thomas.martin@email.com",
    "formations" => [
        "2010-2014 : Bachelier en Informatique Appliquée, Haute École de Technologie de Liège",
        "2014-2016 : Master en Développement Web, Université de Bruxelles",
    ],
    "experiences" => [
        [
            "periode" => "Avril 2016 - Présent",
            "titre" => "Développeur Front-End",
            "entreprise" => "Société TechVision, Bruxelles",
            "missions" => [
                "Conception et développement d'interfaces utilisateur pour des applications web et mobiles en utilisant HTML, CSS et JavaScript.",
                "Collaboration étroite avec les designers pour transformer des maquettes en interfaces interactives et conviviales.",
                "Expérience dans la mise en œuvre de projets Agile, avec des sprints et des réunions de planification et de rétrospective.",
                "Utilisation de frameworks tels que React et Vue.js pour créer des expériences utilisateur dynamiques et réactives.",
                "Intégration de services RESTful et utilisation de Git pour le contrôle de version."
            ],
        ],
        [
            "periode" => "Juin 2015 - Mars 2016",
            "titre" => "Stagiaire en Développement Web",
            "entreprise" => "Startup WebCraft, Liège",
            "missions" => [
                "Assistance dans la création d'une application web responsive utilisant les dernières technologies front-end.",
                "Participation à l'optimisation des performances du site et à l'assurance de sa compatibilité avec différents navigateurs.",
                "Contribution à la mise en place d'une méthodologie de développement Agile au sein de l'équipe."
            ],
        ]
    ],
    "competences" => [
        "Développement Front-End (HTML, CSS, JavaScript)",
        "Frameworks et CMS : Bootstrap, jQuery, Wordpress",
        "Conception d'Interfaces Utilisateur (UI)",
        "Méthodologies Agile (Scrum)",
        "Contrôle de Version (Git)"
    ],
    "langues" => [
        "Français (courant)",
        "Anglais (avancé)",
        "Néerlandais (notions)"
    ],
    "interets" => [
        "Programmation créative",
        "Musique : Pratique de la guitare et de la composition musicale",
        "Randonnée : Exploration des magnifiques paysages naturels en Belgique et ailleurs"
    ]
];
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Curriculum Vitae - <?php echo $cv['prenom'] . ' ' . $cv['nom']; ?></title>
</head>
<body>
    <h1>Curriculum Vitae</h1>
    <h2><?php echo $cv['prenom'] . ' ' . $cv['nom']; ?></h2>

    <img src="assets/img/thomas.jpeg" alt="<?php echo $cv['prenom'] . ' ' . $cv['nom']; ?>">

    <h3>Informations Personnelles</h3>
    <ul>
        <li><strong>Nom :</strong> <?php echo $cv['nom']; ?></li>
        <li><strong>Prénom :</strong> <?php echo $cv['prenom']; ?></li>
        <li><strong>Date de Naissance :</strong> <?php echo $cv['date_naissance'] . ' (' . $cv['age'] . ' ans)'; ?></li>
        <li><address><strong>Adresse :</strong> <?php echo $cv['adresse']; ?></address></li>
        <li><strong>Téléphone :</strong> <a href="tel:<?php echo $cv['telephone']; ?>"><?php echo $cv['telephone']; ?></a></li>
        <li><strong>Email :</strong> <a href="mailto:<?php echo $cv['email']; ?>"><?php echo $cv['email']; ?></a></li>
    </ul>

    <h3>Formations</h3>
    <ul>
        <?php foreach($cv['formations'] as $formation): ?>
            <li><?php echo $formation; ?></li>
        <?php endforeach; ?>
    </ul>

    <h3>Expériences Professionnelles</h3>
    <ul>
        <?php foreach($cv['experiences'] as $experience): ?>
            <li>
                <?php echo $experience['periode'] . ' : ' . $experience['titre'] . ', ' . $experience['entreprise']; ?>
                <ul>
                    <?php foreach($experience['missions'] as $mission): ?>
                        <li><?php echo $mission; ?></li>
                    <?php endforeach; ?>
                </ul>
            </li>
        <?php endforeach; ?>
    </ul>

    <h3>Compétences</h3>
    <ul>
        <?php foreach($cv['competences'] as $competence): ?>
            <li><?php echo $competence; ?></li>
        <?php endforeach; ?>
    </ul>

    <h3>Langues</h3>
    <ul>
        <?php foreach($cv['langues'] as $langue): ?>
            <li><?php echo $langue; ?></li>
        <?php endforeach; ?>
    </ul>

    <h3>Centres d'Intérêt</h3>
    <ul>
        <?php foreach($cv['interets'] as $interet): ?>
            <li><?php echo $interet; ?></li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
