# Explication du code PHP/HTML

Ce code a pour but d'afficher un message et de colorer la page selon l'âge d'une
personne.

## Variables

Il y a une variable nommée `$age` qui est initialisée à `17`.

## Styles

Trois styles CSS sont définis :

1. **.red** : Donne un fond rouge.
2. **.yellow** : Donne un fond jaune.
3. **.font-color** : Définit la couleur du texte en vert.

## Logique et Affichage

1. La couleur de fond de la page (`<body>`) est déterminée par l'âge :
   - Si l'âge est de 18 ans ou plus, le fond est rouge.
   - Sinon, le fond est jaune.
   - Dans tous les cas, la couleur du texte est verte.

2. Un message est affiché selon l'âge :
   - Si l'âge est de 18 ans ou plus, le message "ok" est affiché.
   - Sinon, le message "NON" est affiché.

## Simplification avec la syntaxe courte et l'opérateur ternaire

Nous pouvons également simplifier le code en utilisant la syntaxe courte
`<?= ?>` et l'opérateur ternaire. Voici comment :

1. Pour la classe du `<body>` :

```php
<body class="font-color <?= ($age >= 18) ? 'red' : 'yellow' ?>">
```

2. Pour le message :

```php
<h1><?= ($age >= 18) ? 'ok' : 'NON' ?></h1>
```

Ces exemples démontrent comment condenser la logique conditionnelle pour rendre
le code plus lisible et épuré.
