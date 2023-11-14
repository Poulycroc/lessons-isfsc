# Integration CV

Dans ce cours nous allons intégrer le contenu pour notre `cv`, l'idée serait de partir de du `html` que vous avez pu faire dans votre cours de **FrontEnd** avec votre style et autre élément que vous avez pu intégrer

Pour ma part je vais simplement vous montrer comment intégrer le contenu histoire de le rendre dynamique et pourquoi pas vous permettre de le publier en ligne.

Je vais commencer par récuperer le `html` a [cette adresse](https://github.com/gregholvoet/EMU2-FE-Fwks/blob/main/cv/cv.html)

<details>
<summary><b>Création de notre nouveau Projet Wordpress</b></summary>

1. On commence a connaitre maintenant mais... on va commencer par télécharger une nouvelle [version de wordpress](https://wordpress.org/download/) et l'ajouter dans notre dossier `htdocs` habituel<br><img src="./.screenshots/Screenshot 2023-11-12 at 12.47.13.png" alt="creation cv project in htdocs" />
2. On met en place déjà une nouvelle base de données<br/><img src="./.screenshots/Screenshot 2023-11-12 at 12.52.47.png" alt="db creation for cv" />
3. On configure notre installation **WordPress** avec les infos de notre base de donnée, si évidement on ne sait pas comment faire je vous propose de vous rendre dans [ce cours](https://github.com/Poulycroc/lessons-isfsc/blob/master/courses/04__premier-sitewordpress.md)<br/><img src="./.screenshots/Screenshot 2023-11-12 at 12.56.02.png" />
4. Création de notre dossier pour le **Theme WordPress**<br/><img src="./.screenshots/Screenshot 2023-11-12 at 12.59.23.png" />
5. On ajoute nos premiers fichiers, comme d'habitude `index.php` (dans le quel on peut déjà mettre le contenu `html`), `style.css`, `footer.php` et `header.php`<br>Pour ceux qui ne savent pas de quoi on parle ici je vous propose de suivre [le cours pour créer son premier theme wordpress](https://github.com/Poulycroc/lessons-isfsc/blob/master/courses/05__premier-template-custom.md)<br>pour ceux qui aurait envie de gagner un peu de temps j'ai ajouté dans [scriptServer](https://github.com/Poulycroc/lessons-isfsc/tree/master/scriptServer/theme-wp-starter) un dossier "starter" pour démarrer facilement un nouveau theme<br><img src="./.screenshots/Screenshot 2023-11-12 at 13.09.23.png" />
6. On ajoute le theme dans notre wordpress... <br><img src="./.screenshots/Screenshot 2023-11-12 at 13.07.55.png" />
7. On devrait donc avoir ça<br><img src="./.screenshots/Screenshot 2023-11-12 at 13.09.02.png" />
</details>

## Maintenant que notre theme créé on va pouvoir s'occuper du contenu

On va découper notre développement en plusieurs sections, les "Posts types" et "Nos informations personnelle"

Créer des types de publication personnalisés ("custom post types") dans WordPress est une excellente manière d'organiser et de présenter des données spécifiques, telles que les formations, les langues maîtrisées et d'autres éléments dans un CV. Voici une approche pour intégrer ces éléments dans votre projet WordPress :

<hr>
<details>
<summary>Introduction aux "custom posts types"</summary>

#### 1. Planification et Structure

Avant de commencer, planifiez la structure de vos types de publication personnalisés. Pour un CV, vous pourriez avoir besoin de types tels que `Formations`, `Expériences Professionnelles`, `Compétences`, `Langues`, etc. Chaque type aura ses propres champs et caractéristiques.

#### 2. Création des Custom Post Types

Vous pouvez créer des types de publication personnalisés de deux manières :

- **Manuellement** : En ajoutant du code dans le fichier `functions.php` de votre thème. Utilisez la fonction [`register_post_type()`](https://developer.wordpress.org/reference/functions/register_post_type/) pour définir vos types de publication personnalisés.
- **Avec un plugin** : Des plugins comme [Custom Post Type UI](https://wordpress.org/plugins/custom-post-type-ui/) permettent de créer des types de publication personnalisés sans écrire de code.

#### 3. Ajout de Champs Personnalisés

Pour ajouter des champs personnalisés (par exemple, l'année de formation, l'institution, etc.), vous pouvez :

- Utiliser la fonction [`add_meta_box()`](https://developer.wordpress.org/reference/functions/add_meta_box/) dans `functions.php`.
- Employer un plugin comme [Advanced Custom Fields (ACF)](https://www.advancedcustomfields.com/) pour une gestion plus intuitive des champs personnalisés (j'en parle dans [ce cours](https://github.com/Poulycroc/lessons-isfsc/blob/master/courses/10__advanced_custom_post_type.md) si vous êtes intéressé).

#### 4. Affichage des Données

Une fois que vos types de publication personnalisés et leurs champs sont en place, vous devrez modifier les fichiers de votre thème pour afficher ces données. Utilisez des fonctions comme `get_posts()` ou une [WP_Query](https://developer.wordpress.org/reference/classes/wp_query/) personnalisée pour récupérer et afficher les données dans vos templates.

`WP_Query` est une classe puissante dans WordPress qui permet de créer des requêtes personnalisées pour récupérer des posts (articles, pages, et types de publication personnalisés) en fonction de critères spécifiques. Comprendre et utiliser `WP_Query` est crucial pour afficher des contenus dynamiques sur votre site WordPress.

```php
$args = array(
    'post_type' => 'votre_type_de_publication', // Remplacez par votre type de publication personnalisé
    'posts_per_page' => 10 // Nombre de posts à afficher
);
$query = new WP_Query($args);
```

#### 5. Intégration avec le HTML existant

Intégrez les données WordPress dans le HTML que vous avez déjà préparé. Assurez-vous que votre HTML est structuré de manière à faciliter l'intégration des boucles WordPress et des fonctions pour afficher les données des types de publication personnalisés.

#### 6. Style et Mise en Page

Appliquez vos styles CSS pour que la présentation des données sur le CV soit en accord avec votre design global. Si vous avez utilisé des frameworks ou des bibliothèques CSS dans votre projet FrontEnd, assurez-vous qu'ils sont bien intégrés dans votre thème WordPress.

#### Ressources et Documentation

- **Documentation WordPress** : Consultez la documentation officielle de WordPress pour des détails techniques sur la création de types de publication personnalisés et l'ajout de champs personnalisés.
- **Tutoriels en ligne** : Il existe de nombreux tutoriels en ligne pour vous guider à travers chaque étape du processus.

En suivant ces étapes, vous pourrez créer un système dynamique et personnalisé pour présenter un CV sur un site WordPress.
</details>
<hr>

### 1. Création des Custom Post Types (CPT)

Pour créer des **CPT** tout va se passer dans le fichier `functions.php` de votre thème. 

#### Exemple de code pour un CPT "Formations":

```php
<?php
// code qu'on a écrit avant

function create_posttypes() {
    register_post_type('formations', [
        'labels' => [
            'name' => __( 'Formations' ),
            'singular_name' => __( 'Formation' )
        ],
        'public' => true,
        'has_archive' => true,
        'rewrite' => ['slug' => 'formations'],
        'show_in_rest' => true,
    ]);
}
add_action('init', 'create_posttypes');
```

Ce code crée un type de publication personnalisé nommé "Formations". Vous pouvez répéter ce processus pour d'autres sections comme "Expériences Professionnelles", "Langues", etc.

##### Conseils pour Nommer les CPT
1. **Bref** et Descriptif : Choisissez un nom qui est à la fois court et descriptif de ce que le CPT représente.
2. **Utiliser** des Abbréviations : Si le nom est trop long, utilisez des abréviations ou des initiales.
3. **Respecter** les Conventions de Nom : Utilisez des underscores pour séparer les mots (par exemple, exp_pro au lieu de exppro).

##### Petite explication du code:

```php
create_posttypes();
```
Ici `create_posttypes` est donc une [function](http://www.phpdebutant.org/article41.php) qu'on peut nommer comme on le desire qui va nous permettre d'initialiser des **Custom Posts Types**, on pourra donc ajouter autant de custom post types qu'on le désire dans notre function "create_posttypes", la function `add_action` elle va nous permettre d'ajouter les différents **CPT** a notre theme *WordPress* 

<details>
<summary>Explications du Code pour la Fonction `register_post_type`</summary>

Dans la fonction `register_post_type`, certains paramètres sont essentiels :

1. **'labels'** : 
   - **'name'** : Le nom au pluriel du type de publication personnalisé, tel qu'il apparaîtra dans le menu d'administration.
   - **'singular_name'** : Le nom au singulier du type de publication personnalisé.

2. **'public'** : 
   - Détermine si le type de publication est visible dans l'interface d'administration de WordPress. 
   - Si `true`, le type de publication est visible et accessible dans l'interface d'administration.

3. **'has_archive'** : 
   - Permet de créer une page d'archive pour le type de publication. 
   - Si `true`, WordPress crée automatiquement une page d'archive qui listera tous les posts de ce type.

4. **'rewrite'** : 
   - Gère la réécriture d'URL pour le type de publication.
   - `'slug'` spécifie la partie de l'URL qui représente le type de publication personnalisé. Par exemple, pour les formations, l'URL serait quelque chose comme `votresite.com/formations/`.

5. **'show_in_rest'** :
   - Active le support pour l'éditeur de blocs (Gutenberg) et l'API REST de WordPress.
   - Utile pour les éditeurs modernes et les applications utilisant l'API REST de WordPress.
</details>

### 2. On vérifie que notre CPT soit bien ajouté

Dans notre `back office` on devrait voir s'afficher un nouveau menu sur la gauche nommé "Formations"<br><img src="./.screenshots/Screenshot 2023-11-12 at 14.07.02.png" /> 

### 3. Affichage des Données

Dans vos fichiers de thème (ici `index.php`), utilisez une boucle WordPress pour afficher les informations des CPT.

```php
<?php
$formationsList = new WP_Query([
    'post_type' => 'formations',
    'posts_per_page' => -1
]);
?>

<?php while ( $formationsList->have_posts() ) : $formationsList->the_post(); ?>
    <li>notre formation</li>
<?php endwhile; ?>
```

- **`new WP_Query`** : Crée une nouvelle instance de WP_Query, qui est une requête personnalisée pour récupérer des posts de WordPress.
- **`post_type => 'formations'`** : Spécifie le type de publication à récupérer, dans ce cas, vos CPT "Formations".
- **`posts_per_page => -1`** : Indique de récupérer tous les posts de ce type. `-1` signifie qu'il n'y a pas de limite au nombre de posts à afficher.
- **La boucle** : Pour chaque post récupéré, WordPress exécute le code à l'intérieur de la boucle. Ici, `the_post();` prépare les données du post pour l'affichage.

le code original pour ma partie "Formations"
```html
<h3>Formations</h3>
<ul>
    <li>2010-2014 : Bachelier en Informatique Appliquée, Haute École de Technologie de Liège</li>
    <li>2014-2016 : Master en Développement Web, Université de Bruxelles</li>
</ul>
```

Le code de ma section "Formations" pour le moment
```php
<h3>Formations</h3>
<?php
$formationsList = new WP_Query([
    'post_type' => 'formations',
    'posts_per_page' => -1
]);
?>
<ul>
    <?php while ( $formationsList->have_posts() ) : $formationsList->the_post(); ?>
        <li><?php the_title(); ?></li>
    <?php endwhile; ?>
</ul>
```

Dans mon back office je vais ajouter mes différentes formations.<br><img src="./.screenshots/Screenshot 2023-11-12 at 14.31.25.png" /><br>je ne vais ajouter que les *titres* de mes formations pour l'instant on verra comment ajouter les dates juste après je devrais avoir ça dans mon backoffice<br><img src="./.screenshots/Screenshot 2023-11-12 at 14.31.01.png" /><br/>actuelement ça devrait ressembler a ça<br/><img src="./.screenshots/Screenshot 2023-11-12 at 14.35.20.png" />


On peut évidement ajouter une conditions dans le cas ou l'on a pas de "formations" a afficher:
```php
<?php
    $formationsList = new WP_Query([
        'post_type' => 'formations',
        'posts_per_page' => -1
    ]);
?>
<?php if ($formationsList->have_posts()): ?>
    <h3>Formations</h3>
    <ul>
        <?php while ($formationsList->have_posts()): $formationsList->the_post(); ?>
            <li>
                <?php the_title(); ?>
            </li>
        <?php endwhile; ?>
    </ul>
<?php endif; ?>
```
> **_NOTE:_** On pense évidement a déclarer la **variable** `$formationsList` avant la condition 


## Les autre liste..

On a donc notre première liste qui s'affiche, on va pouvoir de même pour les autres a savoir **Langues**, **Compétences** et **Centre d'intérêt** (libre a vous d'ajouter d'autres éléments) pour ça rien de plus facile, dans notre fichier `functions.php` on va simplement ajouter a l'intérieur de notre function `create_posttypes()` le code suivant (pour `competences` par exemple)

```php
// Compétences
register_post_type('competences', [
    'labels' => [
        'name' => __( 'Compétences' ),
        'singular_name' => __( 'Compétence' )
    ],
    'public' => true,
    'has_archive' => true,
    'rewrite' => ['slug' => 'competences'],
]);
```

ce qui devrait nous donner un fichier `functions.php` qui ressemble a ça:
```php
<?php
function create_posttypes() {
    // Formations
    register_post_type('formations', [
        'labels' => [
            'name' => __( 'Formations' ),
            'singular_name' => __( 'Formation' )
        ],
        'public' => true,
        'has_archive' => true,
        'rewrite' => ['slug' => 'formations'],
        'show_in_rest' => true,
    ]);

    // Compétences
    register_post_type('competences', [
        'labels' => [
            'name' => __( 'Compétences' ),
            'singular_name' => __( 'Compétence' )
        ],
        'public' => true,
        'has_archive' => true,
        'rewrite' => ['slug' => 'competences'],
    ]);
}
add_action('init', 'create_posttypes');
```

et donc pour sur le fichier `index.php` on garde la même logique que précédement

```php
<h3>Compétences</h3>
<?php
    $competencesList = new WP_Query([
        'post_type' => 'competences',
        'posts_per_page' => -1
    ]);
?>
<ul>
    <?php while ($competencesList->have_posts()) : $competencesList->the_post(); ?>
        <li><?php the_title(); ?></li>
    <?php endwhile; ?>
</ul>
```

> **_NOTE:_** Notez que pour garder mon code le plus claire possible je prends bien le temps de nommer ma variable `$competencesList` ce qui me permet de voir en un coup d'œuil que c'est une "liste de compétence"

A vous de jouer pour la suite...



## Ajouter des champs personnalisés

Pour ajouter des dates de début et de fin à vos formations dans le cadre des types de publication personnalisés (Custom Post Types) dans WordPress, vous devrez suivre plusieurs étapes. Ces étapes incluent la création des champs personnalisés pour les dates, la sauvegarde de ces champs, et l'affichage de ces informations dans votre thème. 

### 1. Ajout des Meta Boxes pour les Dates

Vous pouvez étendre la fonction `add_your_fields_meta_box` pour inclure des champs pour les dates de début et de fin.

```php
function add_your_fields_meta_box() {
    add_meta_box(
        'your_fields_meta_box', // $id
        'Détails de la Formation', // $title
        'show_your_fields_meta_box', // $callback
        'formations', // $screen
        'normal', // $context
        'high' // $priority
    );
}
add_action('add_meta_boxes', 'add_your_fields_meta_box');

function show_your_fields_meta_box($post) {
    // Récupérer les valeurs existantes
    $start_date = get_post_meta($post->ID, 'start_date', true);
    $end_date = get_post_meta($post->ID, 'end_date', true);

    // Afficher les champs pour les dates
    echo '<label for="start_date">Date de début:</label>';
    echo '<input type="date" id="start_date" name="start_date" value="'.esc_attr($start_date).'"><br><br>';
    
    echo '<label for="end_date">Date de fin:</label>';
    echo '<input type="date" id="end_date" name="end_date" value="'.esc_attr($end_date).'"><br><br>';
}
```

### 2. Sauvegarde des Données des Champs Personnalisés

Ensuite, vous devez vous assurer que les données saisies dans ces champs sont correctement sauvegardées lorsque le post est enregistré.

```php
function save_your_fields_meta($post_id) {
    if (array_key_exists('start_date', $_POST)) {
        update_post_meta(
            $post_id,
            'start_date',
            $_POST['start_date']
        );
    }
    if (array_key_exists('end_date', $_POST)) {
        update_post_meta(
            $post_id,
            'end_date',
            $_POST['end_date']
        );
    }
}
add_action('save_post', 'save_your_fields_meta');
```

### 3. Affichage des Dates dans le Thème

Enfin, modifiez votre boucle WordPress pour afficher ces dates. Voici comment vous pourriez ajuster votre code HTML :

```php
<h3>Formations</h3>
<ul>
<?php
$formationsList = new WP_Query([
    'post_type' => 'formations',
    'posts_per_page' => -1
]);
while ( $formationsList->have_posts() ) : $formationsList->the_post();
    $start_date = get_post_meta(get_the_ID(), 'start_date', true);
    $end_date = get_post_meta(get_the_ID(), 'end_date', true);
    ?>
    <li>
        <?php if($start_date && $end_date): ?>
            <?php echo $start_date; ?> - <?php echo $end_date; ?> : 
        <?php endif; ?>
        <?php the_title(); ?>
    </li>
<?php endwhile; ?>
</ul>
```

Dans ce code, les dates de début et de fin sont récupérées pour chaque formation et affichées à côté du titre de la formation. Assurez-vous d'ajouter des conditions pour gérer les cas où les dates ne sont pas définies.

En ajoutant ces étapes à votre cours, vous fournirez aux apprenants un guide complet sur la gestion des dates dans les types de publication personnalisés, ce qui est une compétence très utile dans le développement WordPress.
