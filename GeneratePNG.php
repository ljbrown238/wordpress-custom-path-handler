<?php

class GeneratePNG {

	public function process_endpoint() {
		if ($this->validate_request()) {
			return $this->generate_output();
		} else {
			header($_SERVER["SERVER_PROTOCOL"]." 400 Bad Request");
			return 'ERROR!';
		}
	}

	public function validate_request() {
		// No parameters to process
		return true;
	}

	public function generate_output() {

		// Small red dot
		$png_base64 = 'iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAADUlEQVR42mP8z8DwBwAFAgH9XSO6wwAAAABJRU5ErkJggg==';

		header('Content-Type: image/png');
		header($_SERVER["SERVER_PROTOCOL"]." 200 OK");
		return base64_decode($png_base64);
	}

}
