<?php

use \Illuminate\Foundation\Testing\DatabaseTransactions;

class FeatureTestCase extends TestCase
{
	use DatabaseTransactions;

	public function seeErrors(array $fields)
	{
		# code...
		foreach ($fields as $name => $errors) {
			# code...
			foreach ((array)$errors as $message ) {
				# code...
				$this->seeInElement(
					"#field_{$name} .help-block", 
					$message
				);
			}
		}
	}
}