<?php 
$age = 17;
?> 
<html>
<style>
.red {
background-color: red;
}
.yellow {
background-color: yellow;
}
.font-color {
color: green ;
}
</style>
<body 
class="font-color <?php if ($age >= 18) {echo 'red';} else { echo 'yellow'; }?>"
>
<ul>

<?php if ($age >= 18) { ?>
<h1>ok</h1>
<?php } else { ?>
<h1>NON</h1>
<?php } ?>
</ul>
</body>
</html>
