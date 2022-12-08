<?php 

add_shortcode('contact-form', 'display_contact_form');
/**
 * Cette fonction affiche les messages de validation, le message de réussite, le conteneur des messages de 
 * validation et le formulaire de contact.
 */
function display_contact_form() {

	$validation_messages = [];
	$success_message = '';

	if ( isset( $_POST['contact_form'] ) ) {

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
      <input type="hidden" name="contact_form">

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