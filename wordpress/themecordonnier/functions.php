<?php

add_theme_support('title-tag'); // support de mon title tag
add_theme_support('post-thumbnails'); // support du thumbnail sur mes articles
add_theme_support('menus'); // support des menus WordPress

function wpbootstrap_styles_scripts() {
  wp_enqueue_style('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css');
  wp_enqueue_style('style', get_template_directory_uri() .'/css/style.css', ['bootstrap'], true);

  wp_enqueue_script('jquery');
  wp_enqueue_script('bootstrap-bundle', 'https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js', false, '1.0.0', true);
  wp_enqueue_script('scripts', get_template_directory_uri().'/js/script.js', ['jquery'], '1.0.0', true);
  
  /**
   * Enqueue the JavaScript scripts associated with our contact form.
   */
  wp_enqueue_script( 'contact-form', get_template_directory_uri() . '/js/contact-form.js', false, '', true );
}
add_action('wp_enqueue_scripts', 'wpbootstrap_styles_scripts');


/**
 * CUSTOM POST TYPE
 */
function create_post_type() {	
	register_post_type('services', [
		'labels' => [
			'name' => __('Services'),
			'singular_name' => __('Services')
		],
    'supports' => ['title', 'editor', 'thumbnail'],
		'public' => true,
		'has_archive' => false,
  	'rewrite' => ['slug' => 'services'],
		'menu_icon' => 'dashicons-clipboard'
	]);
}
add_action('init', 'create_post_type');


/**
 * CREATION D'UN FIELD DANS LES ARTICLES ET PAGES
 */
function wporg_custom_box_html($post) {
	$value = get_post_meta($post->ID, '_wporg_meta_key', true);
	echo "<label for='wporg_field'>Section title</label>";
	echo "<input id='wporg_field' type='text' name='wporg_field' value='$value' />";
}
function wporg_add_custom_box() {
	add_meta_box(
		'wporg_box_id',                 // Unique ID
		'Section title',                // Box title
		'wporg_custom_box_html',  			// Content callback, must be of type callable
		'page',
		'side',
		'high'
	);
}
add_action( 'add_meta_boxes', 'wporg_add_custom_box' );

function wporg_save_postdata( $post_id ) {
	if ( array_key_exists( 'wporg_field', $_POST ) ) {
		update_post_meta(
			$post_id,
			'_wporg_meta_key',
			$_POST['wporg_field']
		);
	}
}
add_action( 'save_post', 'wporg_save_postdata' );


/**
 * CREATION D'UN MENU DANS L'ADMINISTRATION WORDPRESS
 */
function my_admin_menu() {
	add_menu_page(
		'Header hero', // nom de mon menu
		'Header hero', // nom affiché dans la sidebar de l'admin wordpress
		'manage_options', // la capacité requise pour que ce menu soit affiché à l'utilisateur.
		'sample-page', // le slug (donc l'url dans l'admin)
		'my_admin_page__header_hero__contents', // notre function qui va construire la page
		'dashicons-schedule', // l'icone dans la side bar
		3
	);
}
add_action( 'admin_menu', 'my_admin_menu' );

function my_admin_page__header_hero__contents() {
  // ici je vérifie que que le contenu a bien été modifier 
  // si ce n'est pas le cas.. pas besoin d'enregistrer
  if( $_POST['updated'] === 'true' ){ 

    // si mon contenu a bien été enregistré je vérifie que mon fomulaire existe bien
    if( ! isset( $_POST['header-hero_form'] ) || ! wp_verify_nonce( $_POST['header-hero_form'], 'header-hero_update' ) ){ 
      // si ce n'est pas le cas je retourne une erreur  
    ?>
      <div class="error">
        <p>Sorry, your nonce was not correct. Please try again.</p>
      </div> <?php
      exit;
    } else {
      // si toute les vérifications se sont bien passée j'enregistre mes données

      // 
      // dans cette section je vais simplement récupérer les champs de mon formulaire 
      // "main-title", "under-title", "scroll-label", "background-url"
      // et demander a worpress de les traiter.. en suite j'enregistre ça dans une variable pour chaque champs
      // 
      $mainTitle = sanitize_text_field( $_POST['main-title'] ); 
      $underTitle = sanitize_text_field( $_POST['under-title'] );
      $scrollLabel = sanitize_text_field( $_POST['scroll-label'] );
      $backgroundUrl = sanitize_text_field( $_POST['background-url'] );
      //
      
      // 
      // dans cette section je récupère les variable que j'ai enregistré avant 
      // et je les stock dans une "option" wordpress option que je pourrais récupérer plus tard en fonction de mes besoin
      // avec "get_option" suivi du nom de mon options
      //
      // donc pour enregistrer l'option j'utilise "update_option" pour la récuperer j'utilise "get_option"
      // 
      update_option('header-hero_main-title', $mainTitle );
      update_option('header-hero_under-title', $underTitle );
      update_option('header-hero_scroll-label', $scrollLabel );
      update_option('header-hero_background-url', $backgroundUrl );
      //
    }
  } ?>
  <div class="wrap">
    <h2><?php
      // je récupère le titre de ma page admin dans mon cas "Header hero"
      // c'est la 2eme ligne de "add_menu_page()"
      echo get_admin_page_title();
    ?></h2>
    <form method="POST">
      <input type="hidden" name="updated" value="true" />
      <?php 
        // ici je j'ajoute mon "vérificateur" en utilisant la function "wp_nonce_field" qui permet de nomer mon formulaire
        // c'est grace a lui que je pourrais vérifier l'existance de mon formulaire d'ajout de données
        wp_nonce_field( 'header-hero_update', 'header-hero_form' ); 
      ?>
      <table class="form-table">
        <tbody>
          <tr>
            <th><label for="main-title">Main title</label></th>
            <td><input name="main-title" id="main-title" type="text" value="<?php echo get_option('header-hero_main-title'); ?>" class="regular-text" /></td>
          </tr>
          <tr>
            <th><label for="under-title">Under title</label></th>
            <td><input name="under-title" id="under-title" type="text" value="<?php echo get_option('header-hero_under-title'); ?>" class="regular-text" /></td>
          </tr>
          <tr>
            <th><label for="scroll-label">Scroll label</label></th>
            <td><input name="scroll-label" id="scroll-label" type="text" value="<?php echo get_option('header-hero_scroll-label'); ?>" class="regular-text" /></td>
          </tr>
          <tr>
            <th><label for="background-url">Background image url</label></th>
            <td><input name="background-url" id="background-url" type="text" value="<?php echo get_option('header-hero_background-url'); ?>" class="regular-text" /></td>
          </tr>
        </tbody>
      </table>
      <p class="submit">
        <?php
          // wordpress nous donne la possibilité de générer un bouton pour enregistrer les valeurs de notre formulaire
          submit_button(); 
        ?></p>
    </form>
  </div><?php 
}



/**
 * CONTACT FORM
 */
add_shortcode('contact-form', 'display_contact_form');
/**
 * Cette fonction affiche les messages de validation, le message de réussite, le conteneur des messages de 
 * validation et le formulaire de contact.
 */
function display_contact_form() {
  $validation_messages = [];
	$success_message = '';

	if (isset($_POST['contact_form']) && $_POST['contact_form'] === 'true') {

		// Assainir les données
    // wordpress utilise "sanitize_text_field" pour récupérer les données de formulaire
		$name = isset( $_POST['name'] ) ? sanitize_text_field( $_POST['name'] ) : '';
		$subject = isset( $_POST['subject'] ) ? sanitize_text_field( $_POST['subject'] ) : '';
		$message = isset( $_POST['message'] ) ? sanitize_textarea_field( $_POST['message'] ) : '';

		// on vérifie les datas c'est par example ici que l'on pourra vérrifier si l'utilisateur a entré un email correct
		if ( strlen( $name ) === 0 ) {
			$validation_messages[] = esc_html__('Entrez un nom valide.', 'supershoes-theme');
		}

		if ( strlen( $message ) === 0 ) {
			$validation_messages[] = esc_html__('Entre un messaage valide.', 'supershoes-theme');
		}

		// envoyer l'mail a l'administrateur wordpress si il n'y a pas d'erreur
		if ( empty( $validation_messages ) ) {
			$mail    = get_option( 'admin_email' );
			$adminSubject = 'New message from ' . $name;
			$message = $message . ' - The email address of the customer is: ' . $mail;

			wp_mail( $mail, $adminSubject, $message );
			$success_message = esc_html__( 'Your message has been successfully sent.', 'supershoes-theme' );
		}
	} 
  
  // on montre les erreur que l'utilisateur a pu faire
  if ( ! empty( $validation_messages ) ) {
    foreach ( $validation_messages as $validation_message ) {
      echo '<div class="alert alert-danger" role="alert">' . esc_html( $validation_message ) . '</div>';
    }
  }

  // on montre que tous c'est bien passé 
  if ( strlen( $success_message ) > 0) {
    echo '<div class="alert alert-success" role="alert">' . esc_html( $success_message ) . '</div>';
  }
	?>
    <div class="col-md">

      <!-- c'est la div dans la quel on va envoyer nos erreurs -->
      <div id="validation-messages-container"></div>

      <form id="contact-form" action="<?php echo esc_url( get_permalink() ); ?>" method="post">
        <input type="hidden" name="contact_form" value="true">

        <p class="form-group">
          <label for="name"><?php echo esc_html( 'Votre nom et prénom', 'supershoes-theme' ); ?></label>
          <input type="text" id="name" name="name" class="form-control">
        </p>

        <p class="form-group">
          <label for="subject"><?php echo esc_html( 'Subject', 'supershoes-theme' ); ?></label>
          <select name="subject" id="subject" class="form-control">
            <option value="0">Choisissez un sujet</option>
            <option value="devis">Demande de devis</option>
            <option value="question">Question</option>
            <option value="other">Autres</option>
          </select>
        </p>

        <p class="form-group">
          <label for="message"><?php echo esc_html( 'Message', 'supershoes-theme' ); ?></label>
          <textarea id="message" name="message" class="form-control"></textarea>
        </p>

        <button type="submit" class="btn btn-primary" id="contact-form-submit">
          <?php echo esc_attr( 'Submit', 'supershoes-theme' ); ?>
        </button>

      </form>
    </div>
	<?php
}