<?php

class GenerateJSON {

	private $option_value;

	public function process_endpoint() {
		if ($this->validate_request()) {
			return $this->generate_output();
		} else {
			header($_SERVER["SERVER_PROTOCOL"]." 400 Bad Request");
			return 'ERROR!';
		}
	}

	public function validate_request() {
		// Ensure the option parameter has been set
		if (!isset($_GET['option']) || empty($this->option_value = $_GET['option'])) {
			return false;
		}

		// Only allow the user to request home or blogname
		if ($this->option_value !== 'home' && $this->option_value !== 'blogname') {
			return false;
		}

		return true;
	}

	public function generate_output() {

		global $wpdb;

		// Just get the option property names for the requested option
		$options = $wpdb->get_results("SELECT option_name, option_value FROM $wpdb->options WHERE option_name = '{$this->option_value}'");
		error_log('>>>>>:' . $this->option_value . ':');

		header('Content-Type: application/json');
		header($_SERVER["SERVER_PROTOCOL"]." 200 OK");
		return json_encode($options);
	}

}
