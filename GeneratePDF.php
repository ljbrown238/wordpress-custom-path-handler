<?php

class GeneratePDF {

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

		// Small white box
		$pdf_base64 = 'JVBERi0xLjAKMSAwIG9iajw8L1R5cGUvQ2F0YWxvZy9QYWdlcyAyIDAgUj4+ZW5kb2JqIDIgMCBvYmo8PC9UeXBlL1BhZ2VzL0tpZHNbMyAwIFJdL0NvdW50IDE+PmVuZG9iaiAzIDAgb2JqPDwvVHlwZS9QYWdlL01lZGlhQm94WzAgMCAzIDNdPj5lbmRvYmoKeHJlZgowIDQKMDAwMDAwMDAwMCA2NTUzNSBmCjAwMDAwMDAwMTAgMDAwMDAgbgowMDAwMDAwMDUzIDAwMDAwIG4KMDAwMDAwMDEwMiAwMDAwMCBuCnRyYWlsZXI8PC9TaXplIDQvUm9vdCAxIDAgUj4+CnN0YXJ0eHJlZgoxNDkKJUVPRgo=';

		header('Content-Type: application/pdf');
		header($_SERVER["SERVER_PROTOCOL"]." 200 OK");
		return base64_decode($pdf_base64);
	}

}
