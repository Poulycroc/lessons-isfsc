# Devoir n°01 - 23/10/2023

## Objectif de l'exercice

Mettez en pratique l'utilisation de la fonction `require` pour externaliser les sections "Expériences Professionnelles", "Langues", et "Centres d'Intérêt". Vous pouvez vous inspirer des exemples donnés dans [formations.php](https://github.com/Poulycroc/lessons-isfsc/blob/master/assignments-2023/23-10-2023/formations.php) et [skills.php](https://github.com/Poulycroc/lessons-isfsc/blob/master/assignments-2023/23-10-2023/skills.php).

### Exemple à suivre :

```html
<h3>Expériences Professionnelles</h3>
<ul>
<li>Avril 2016 - Présent : Développeur Front-End, Société TechVision, Bruxelles
  <ul>
    <li>Conception et développement d'interfaces utilisateur pour applications web et mobiles avec HTML, CSS et JavaScript.</li>
    <li>Collaboration avec les designers pour convertir des maquettes en interfaces interactives.</li>
    <li>Mise en œuvre de projets Agile : sprints, réunions de planification, etc.</li>
    <li>Utilisation de frameworks tels que React et Vue.js pour des interfaces dynamiques.</li>
    <li>Intégration de services RESTful et gestion de version avec Git.</li>
  </ul>
</li>
<li>Juin 2015 - Mars 2016 : Stagiaire en Développement Web, Startup WebCraft, Liège
  <ul>
    <li>Création d'une application web responsive avec les dernières technologies front-end.</li>
    <li>Optimisation des performances du site et garantie de compatibilité entre navigateurs.</li>
    <li>Contribution à l'adoption d'une méthodologie Agile au sein de l'équipe.</li>
  </ul>
</li>
</ul>
```

```php
<?php require "exp.php"; ?>
```

## Contraintes

1. Implémentez une logique pour ajuster automatiquement le titre de la section en fonction du nombre d'items : 
    - Si une seule expérience : "Expérience Professionnelle"
    - Si plusieurs : "Expériences Professionnelles"

2. Pour les sections telles que "Langues", n'affichez la section que si elle contient des éléments. Par exemple, si aucune langue n'est mentionnée, la section "Langues" ne devrait pas apparaître du tout. Appliquez cette condition à toutes les sections.

## Point supplémentaire

Dans le cadre de cet exercice, utilisez une boucle (`foreach`, `for` ou `while`) pour parcourir et afficher les différents éléments de chaque section, en suivant la méthode présentée dans les exemples [formations.php](https://github.com/Poulycroc/lessons-isfsc/blob/master/assignments-2023/23-10-2023/formations.php) et [skills.php](https://github.com/Poulycroc/lessons-isfsc/blob/master/assignments-2023/23-10-2023/skills.php).
