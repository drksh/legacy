<?php namespace DarkShare\Services\Validators;

use Illuminate\Validation\Validator;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class FileValidator extends Validator {

	public function validateFile($attribute, UploadedFile $file, $property)
	{
		if(is_null($file))
		{
			return false;
		}
		if( ! $file->isValid())
		{
			return false;
		}
		if($file->getClientSize() > get_max_upload_size())
		{
			return false;
		}

		return true;
	}

}
