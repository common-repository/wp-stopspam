<?php
/*
Plugin Name: WP StopSpam
Plugin URI: http://virtuasoft.de/project/wp-stopspam
Description: WP StopSpam fügt ein verstecktes Feld zur Anmeldung hinzu, dass von Spammern ausgefüllt wird und die Registrierung damit verhindert. Sagen Sie Captchas den Kampf an!
Version: 1.0
Author: virtuaSOFT
Author URI: http://virtuasoft.de/
*/

function print_field(){
	print '<input type="hidden" name="website" value="" />';
	print '<input type="hidden" name="homepage" value="" />';
	print '<p>
		<label for="user_question">Vorname von Franz Beckenbauer?<br />
		<input type="text" name="user_question" id="user_question" class="input" value="" size="25" /></label>
	</p>';
}

function check_answer($errors) {
	global $_POST;

	if(strtolower($_POST['user_question']) != "franz" || $_POST['website'] != "" || $_POST['homepage'] != "")
		$errors->add( 'captcha_error', __('<strong>Fehler</strong>: Bitte die Frage richtig beantworten.') );

	return $errors;
}
	
add_filter('registration_errors', 'check_answer');

add_action('register_form','print_field');

?>