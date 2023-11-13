# Espace membre

Un espace membre est une zone d'un site web réservée aux utilisateurs enregistrés. Dans un site WordPress, l'espace membre est généralement accessible en s'identifiant avec un nom d'utilisateur et un mot de passe. Les utilisateurs qui ont accès à l'espace membre peuvent avoir accès à des fonctionnalités supplémentaires, telles que des pages ou des articles exclusifs, des forums de discussion, des téléchargements de fichiers, etc. L'espace membre peut également être utilisé pour gérer les paramètres de compte de l'utilisateur, tels que les informations de contact et les préférences de notification. En général, l'espace membre permet aux utilisateurs de se connecter au site et d'interagir avec d'autres utilisateurs enregistrés.


Pour que vos utilisateurs puissent créer du contenu sur votre site il va donc faloir faire un espace membre et ensuite créer des formulaire pour qu'ils puissent entrer leurs informations

## Avec plugins

### Client portal
[site officiel](https://fr.wordpress.org/plugins/client-portal/)
[source video](https://www.youtube.com/watch?v=xj2QvdVC9y8)


### Wp Members
[site officiel](https://rocketgeek.com/plugins/wp-members/#:~:text=WP%2DMembers%E2%84%A2%20is%20a,premium%20content%20sites%2C%20and%20more!)
[source video](https://www.youtube.com/watch?v=kU9UWpEWiho)

## Permettre a l'utilisateur de poster des articles ou autres

[Ce tuto](https://www.wpbeginner.com/wp-tutorials/how-to-allow-users-to-submit-posts-to-your-wordpress-site/) est très pratique pour ça mais il utilise WpForms qui permet de générer des formulaire pour que vos utilisateur puisse envoyer des données sur votre application je vous conseil aussi de suivre [la vidéo](https://www.youtube.com/watch?v=gCZ0ffQUs_0)


## Sans plugins

1. Créez une page de connexion et une page d'inscription en utilisant les modèles de page de WordPress. Assurez-vous de configurer les formulaires de connexion et d'inscription correctement en utilisant les shortcodes de **WordPress**.
2. Créez une page protégée par mot de passe en utilisant le modèle de page protégée par mot de passe de **WordPress**. Cette page sera accessible uniquement aux utilisateurs inscrits.
3. Créez un rôle d'utilisateur personnalisé pour les membres de votre espace membre en utilisant la fonctionnalité de rôles d'utilisateur de **WordPress**. Assignez ce rôle aux utilisateurs qui sont inscrits à votre espace membre.
4. Utilisez la fonctionnalité de gestion des utilisateurs de **WordPress** pour gérer les utilisateurs de votre espace membre. Vous pouvez utiliser cette fonctionnalité pour ajouter ou supprimer des utilisateurs, changer leur mot de passe, etc.
5. Utilisez les shortcodes de **WordPress** pour afficher du contenu uniquement aux utilisateurs qui sont connectés. Vous pouvez utiliser cette technique pour afficher du contenu spécifique aux utilisateurs de votre espace membre sur différentes pages de votre site.

<details>
<summary>1. Page de connection avec son formulaire</summary>

1. Ajouter une formulaire de connexion.
2. Protéger la page (si on est déjà connecté, on a pas envie de se re-connecter encore).

<details>
<summary>
Page login
</summary>

Pour cette page, on va utiliser le formulaire de connexion de base de WordPress,
dans `page--login.php`.

```php
<?php
/* Template Name: login-new */ 
if (is_user_logged_in()) {
  // si je suis déjà connecté je suis redirigé vers la page home
  wp_redirect( home_url('/') );
	exit;
}

get_header();
// attention c'est important de faire les redirection avant le header sinon la redirection ne marche pas
?>

<div class="container">
  
  <form action="<?php echo esc_url( site_url( 'wp-login.php', 'login_post' ) ); ?>" method="post">
		<label for="log">Nom d\'utilisateur ou adresse e-mail</label>
		<input type="text" name="log" id="log" value="<?php echo esc_attr( $user_login ); ?>">
		
    <label for="pwd">Mot de passe</label>
		<input type="password" name="pwd" id="pwd">
		
    <input type="submit" name="submit" value="Se connecter">
		<input type="hidden" name="redirect_to" value="<?php echo esc_url( home_url('/') ); ?>">
	</form>

</div>

<?php get_footer(); ?>
```

évidement je n'ai mis aucun design dans ce formulaire mais il fonctionne.<br> 
Voici quelque points important :

1. `<?php echo esc_url( site_url( 'wp-login.php', 'login_post' ) ); ?>` Envoi vos données vers le formulaire de connection de wordpress, il ne doit donc pas être changé.
2. `name="pwd"` Nom de l'input de mon password est une donnée importante.
3. `<input type="hidden" name="redirect_to" value="<?php echo esc_url( home_url('/') ); ?>">` indique au formulaire de **WordPress** la page sur la quel vous voulez que votre membre soit redirigé après sa connection.

</details>

<details>
<summary>
Page registration
</summary>

Ici on va devoir créer notre formulaire dans la page `page--register.php` et un peu de code dans `functions.php`.

Dans `page--register.php` :
```php
<?php
/* Template Name: RegistrationPage */
if (is_user_logged_in()) {
  wp_redirect( home_url('/') );
	exit;
}

get_header();
// attention c'est important de faire les redirection avant le header sinon la redirection ne marche pas
?>

<form method="post" name="myForm">
  User <input type="text"  name="uname" />
  Email  <input id="email" type="text" name="uemail" />
  Password  <input type="password"  name="upass" />
  <input type="submit" value="Submit" />
</form>

<?php get_footer(); ?>
```

Dans `functions.php` :
```php
function create_account(){
	//You may need some data validation here
	$user = ( isset($_POST['uname']) ? $_POST['uname'] : '' );
	$pass = ( isset($_POST['upass']) ? $_POST['upass'] : '' );
	$email = ( isset($_POST['uemail']) ? $_POST['uemail'] : '' );

	if ( !username_exists( $user )  && !email_exists( $email ) ) {
		$user_login = wp_slash( $user );
		$user_email = wp_slash( $email );
		$user_pass = $pass;

		$userdata = compact('user_login', 'user_email', 'user_pass');
		$user_id = wp_insert_user($userdata);

		if( !is_wp_error($user_id) ) {
			// user has been created
			$user = new WP_User( $user_id );
			$user->set_role( 'contributor' ); // type d'user que je veux a ce moment la 
			// redirection après connexion
			wp_redirect(esc_url(home_url('/')));
			exit;
		} else {
			//$user_id is a WP_Error object. Manage the error
		}
	}
}
add_action('init', 'create_account');
```

</details>



<details>
<summary>
Notre première page privée
</summary>

```php
<?php
/* Template Name: memberPage */
if (!is_user_logged_in()) { // je vérifie si je suis connecté
  wp_redirect( home_url() . "/login/" ); // si pas je redirige vers la page login
	exit;
}

get_header(); // j'importe mon header
// attention c'est important de faire les redirection avant le header sinon la redirection ne marche pas
?>

coucou c'est une page privée

<?php 
$user = wp_get_current_user();
var_dump($user);
?>

<?php get_footer();  // j'importe mon header ?>
```

</details>

</details>

<details>
<summary>
Se déconnecter ? 
</summary>

Dans mon header ou ailleurs je vais pouvoir ajouter un lien de déconnexion.

Dans ma page `header.php` :
```php
<?php if (is_user_logged_in()): // si je suis connecté ?>
  <a href="<?php echo wp_logout_url(); // lien généré par wordpress pour déconnexion ?>">Déconnexion</a>
<?php endif; ?>
```

</details>

</details>

<details>
<summary>
Pour cacher la bar d'option wordpress
</summary>

Comme mon membre nouvellement inscrit est un utilisateur de mon application wordpress il a accès a notre barre d'outil wordpress, c'est pas super pratique pour nous on va donc devoir ajouter une condition dans notre code `functions.php` qui va déterminer qui a le droit ou non de voir cette fameuse barre .

dans `functions.php` :
```php
function tf_check_user_role( $roles ) {
	// si pas connecté alors je sors de la function
	if ( !is_user_logged_in() ) {
		return;
	}

	// je récupère les information de la personne connectée 
	$user = wp_get_current_user();
	// je récupère les roles
	$currentUserRoles = $user->roles;
	// je compare le tableaux de roles de mon user et celui que j'ai envie de comparer pour voir si y a des matches
	$isMatching = array_intersect( $currentUserRoles, $roles);
	$response = false; // par défaux je suis a false

	// si y a matche alors je mets a true
	if ( !empty($isMatching) ) {
		$response = true;
	}

	// je retourne le résulatat 
	return $response;
}
$roles = [ 'contributor' ];
if ( tf_check_user_role($roles) ) {
	add_filter('show_admin_bar', '__return_false');
}
```

</details>

</details>