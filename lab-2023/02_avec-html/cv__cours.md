### Étape 1 : Créer un fichier PHP

Renommez le fichier contenant le CV de `.html` à `.php`. Par exemple : `cv.php`.

### Étape 2 : Création d'un tableau associatif pour les données

Au-dessus de la structure HTML, créez un tableau associatif contenant les
données de CV.

```php
<?php
$cv = [
    "nom" => "Martin",
    "prenom" => "Thomas",
    "date_naissance" => "15 mars 1992",
    "age" => 31,
    "adresse" => "456, Avenue Virtuelle, 1000 Bruxelles, Belgique",
    // ... (continuez pour les autres champs)
];
?>
```

### Étape 3 : Remplacer les données statiques par les valeurs du tableau

Partout où vous voyez les données de CV dans le code HTML, remplacez-les par les
valeurs du tableau associatif. Utilisez la syntaxe
`<?php echo $cv['nom_du_champ']; ?>`.

Exemple:

```php
<h2><?php echo $cv['prenom'] . ' ' . $cv['nom']; ?></h2>
```

### Étape 4 : Gérer les listes de manière dynamique

Pour les listes, comme "Formations" ou "Expériences professionnelles", nous
pouvons créer des sous-tableaux.

```php
<?php
$cv = [
    // ... autres champs ...
    "formations" => [
        "2010-2014 : Bachelier en Informatique Appliquée, Haute École de Technologie de Liège",
        "2014-2016 : Master en Développement Web, Université de Bruxelles",
    ],
];
?>
```

Pour l'afficher, utilisez une boucle :

```php
<h3>Formations</h3>
<ul>
<?php foreach($cv['formations'] as $formation): ?>
    <li><?php echo $formation; ?></li>
<?php endforeach; ?>
</ul>
```

### Étape 5 : Optimisation

Vous pouvez étendre la structure du tableau pour être encore plus détaillée, par
exemple :

```php
<?php
$cv['experiences'] = [
    [
        "periode" => "Avril 2016 - Présent",
        "titre" => "Développeur Front-End",
        "entreprise" => "Société TechVision, Bruxelles",
        "missions" => [
            "Conception et développement d'interfaces ...",
            "Collaboration étroite avec les designers ...",
            // ...
        ],
    ],
];
?>
```

Et pour afficher :

```php
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
```

### Résumé

En utilisant PHP, nous avons transformé un CV en HTML statique en un CV
dynamique où les données sont stockées dans un tableau associatif. Cette
approche rend la mise à jour des informations plus simple et flexible. Vous
pouvez même étendre cette logique pour extraire les données d'une base de
données ou d'un autre format de stockage.

N'oubliez pas de configurer un serveur local (comme XAMPP, WAMP, MAMP) ou un
serveur en ligne pour exécuter votre fichier PHP.
