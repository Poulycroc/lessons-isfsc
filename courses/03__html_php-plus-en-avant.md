# Intégration du PHP - plus en avant

[Voir Github Version](https://github.com/Poulycroc/lessons-isfsc/blob/master/courses/03__html_php-plus-en-avant.md)

## L'intégration
Plusieurs solution pour afficher du `php`
```php
<h1>Bienvenue <?php echo $name; ?><h1>
// ou
<?php echo '<h1>Bienvenue' . $name . '</h1>'; ?>
// ou
<?php echo "<h1>Bienvenue $name</h1>"; ?>

// ou plus avancé
<h1>Bienvenue <?= $name; ?><h1>
```

## Les boucles dans un fichier php

Pour faciliter l'écriture de code `php` dans notre `html` on va écrire notre code légèrement différement 

dans un premier temps faisons un `Array`
```php
<?php
$eleves = [
  [
    'prenom' => 'Jhon',
    'nom' => 'Doe'
  ],
  [
    'prenom' => 'Luke',
    'nom' => 'Skywalker'
  ],
  [
    'prenom' => 'Elvis',
    'nom' => 'Presley'
  ],
];
```

Ensuite, plutôt que d'écrire.
```php
<ol>
  <?php 
    foreach($eleves as $eleve) {
      echo '<li><b>' . $eleve['nom'] . '</b> ' . $eleve['prenom'] . '</li>';
    }
  ?>
</ol>
```
on va préférer écrire 
```php
<ol>
  <?php foreach($eleves as $eleve): ?>
    <li><b><?php echo $eleve['nom']; ?></b> <?php echo $eleve['prenom']; ?></li>
  <?php endforeach; ?>
</ol>
```
Pour se retourner avec ce résultat<br/>
<img src="https://raw.githubusercontent.com/Poulycroc/lessons-isfsc/master/courses/.screenshots/Screenshot 2022-10-23 at 16.36.06.png" />

#### On peut évidement appliquer le même concept pour les conditions
```php
<p>Mon super contenu</p>
<?php if ($check === "c'est vrai"): ?>
  <a href="lienversautrechose.php">Autre chose</a>
<?php endif; ?>
```

## Include et require en PHP 

### Le but ?
[source](https://www.alsacreations.com/article/lire/254-le-point-sur-la-fonction-include-php.html)


L'intérêt est de pouvoir "inclure" automatiquement des fichiers communs à l'ensemble du site, ou à une partie spécifique de celui-ci. Il s'agit souvent de code HTML, mais cela fonctionne avec tout type de texte (CSS, JavaScript, etc). Note : ces structures ne sont pas des fonctions à proprement parler, même si on peut les utiliser comme telles grâce à la souplesse du langage PHP.

<ul>
	<li>
		<a href="http://php.net/manual/fr/function.require.php">require</a>&nbsp;: inclut le contenu d'un autre fichier appelé, et provoque une erreur bloquante s'il est indisponible</li>
	<li>
		<a href="http://php.net/manual/fr/function.require-once.php">require_once</a>&nbsp;: La même chose que require, mais ne le fait qu'une seule fois au total dans le même document, si require a déjà été appelé précédemment avec le même nom de fichier.</li>
	<li>
		<a href="http://php.net/manual/fr/function.include.php">include</a>&nbsp;:&nbsp;Inclut le contenu d'un autre fichier appelé, mais ne génère pas d'erreur bloquante s'il est indisponible.</li>
	<li>
		<a href="http://php.net/manual/fr/function.include-once.php">include_once</a>&nbsp;: La même chose que include, mais ne le fait qu'une seule fois au total dans le même document si require a déjà été appelé précédemment avec le même nom de fichier.</li>
</ul>

#### Usage
Pour inclure un fichier dans un autre en utilisant PHP, on utilise l'instruction require (ou include), suivie d'un espace puis du nom du fichier appelé, entre guillemets simples ' ou doubles ".

```php
// fichier1.php
<?php require "fichier2.html"; ?>
```

- il est utilisé pour inclure le contenu d'un fichier HTML (ou d'autres types de fichiers) dans une page PHP. Cela signifie que le contenu du fichier fichier2.html sera inséré à l'endroit où cette ligne de code est placée.

Dans quels cas de figure peut-on avoir besoin de mutualiser le code entre différents fichiers ? Pour toutes les parties qui se répètent sur un site !

<ul>
	<li>En-tête de page</li>
	<li>Pied de page</li>
	<li>Menu de navigation</li>
	<li>Barre contextuelle</li>
	<li>Paramètres communs PHP (par exemple connexion à MySQL, variables de configuration, chaînes de texte...)</li>
</ul>

Plus simplement, voici l'exemple représenté de manière visuelle :

<img src="https://www.alsacreations.com/xmedia/doc/original/php-require.png" />


#### Exemple d’utilisation

```php
// header.php
<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="utf-8">
<title>Alsacréations vous conseille de manger des kiwis</title>
<link rel="stylesheet" href="styles.css">
</head>
<body>
<header>
  <h1>Titre commun à tout le site</h1>
  <nav>
    <ul>
      <li><a href="index.php">Accueil</a></li>
      <li><a href="contact.php">Contact</a></li>
    </ul>
  </nav>
</header>
```

```php
// footer.php
<footer>
  <p>Mangez des kiwis, ça vous réussit !<br>
  Mais rassurez-vous, une pomme, ça va aussi !</p>
</footer>
</body>
</html>

```
```php
// index.php
<?php require 'header.php'; ?>

<p>Bienvenue sur la page d'accueil !</p>

<?php require 'footer.php'; ?>
```

```php
// contact.php
<?php require 'header.php'; ?>

<p>Ceci est le formulaire de contact</p>
<form>
  <!-- ... -->
</form>

<?php require 'footer.php'; ?>
```

## navigation dans notre application 
Si mon projet se présente comme ceci :<br>
<img alt="projet avec plusieurs pages" src="https://raw.githubusercontent.com/Poulycroc/lessons-isfsc/master/courses/.screenshots/Screenshot 2022-10-23 at 17.14.41.png" />

et que j'ai envie de naviguer entre mes différentes pages...

```php
<a href="/index.php">Home</a>
<a href="/about.php">About</a>
<a href="/contact.php">Contact</a>
```

## Les 'super' variables

#### Récupérer l'url de la page
```php
<?php 
  if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') { 
    $url = "https"; 
  } else {
    $url = "http"; 
  }
  // Ajoutez // à l'URL.
  $url .= "://"; 
    
  // Ajoutez l'hôte (nom de domaine, IP) à l'URL.
  $url .= $_SERVER['HTTP_HOST']; 
    
  // Ajouter l'emplacement de la ressource demandée à l'URL.
  $url .= $_SERVER['REQUEST_URI']; 
      
  // Afficher l'URL.
  echo $url; 
?>
```

Si je veux savoir sur quelle page je suis afin de mettre en "active" un lien, par exemple.
```php
<a href="/index.php" class="link <?php if ($_SERVER['SCRIPT_NAME'] === '/index.php'): ?>active<?php endif; ?>">Home</a>
<a href="/about.php" class="link <?php if ($_SERVER['SCRIPT_NAME'] === '/about.php'): ?>active<?php endif; ?>">About</a>
<a href="/contact.php" class="link <?php if ($_SERVER['SCRIPT_NAME'] === '/contact.php'): ?>active<?php endif; ?>">Contact</a>

```

Si je veux récupérer les paramètres de requête (query), je peux...
```php
// www.mysite.com/category/subcategory?q=myquery
<?php echo $_GET['q']; // retournera: myquery ?>
```
