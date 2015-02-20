<?php namespace DarkShare\Services\Validators;

use Illuminate\Validation\Validator;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class FileValidator extends Validator {

	public function validateFile($attribute, UploadedFile $file, $property)
	{
		return $file->isValid();
	}

}
