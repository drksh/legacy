<?php namespace DarkShare\Services;

class Slugger {

	private $acceptableElements = [
		'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j',
		'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't',
		'u', 'v', 'w', 'x', 'y', 'z', 'æ', 'ø', 'å',

		'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J',
		'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T',
		'U', 'V', 'W', 'X', 'Y', 'Z', 'Æ', 'Ø', 'Å',

		'0', '1', '2', '3', '4', '5', '6', '7', '8', '9',

		'-', '_', '~', '[', ']', '@', '!', '$', '&', '(',
		')', '*', '+', ';', '=', '\'','"', '<', '>', ',',
		'%', '^', '§', '¢', '£', '¢', 'π', '∆', ';', '`',
	];

	private $acceptableElementNumber;

	private $slug = '';

	function __construct()
	{
		$this->acceptableElementNumber = count($this->acceptableElements);
	}

	public function make($id)
	{
		return $this->getIncrementalSlugAtIndex($id);
	}

	private function getIncrementalSlugAtIndex($id)
	{
		if($id <= $this->acceptableElementNumber) {
			$this->slug .= $this->acceptableElements[$id - 1];
		}
		else {
			$this->slug .= $this->acceptableElements[$this->acceptableElementNumber - 1];
			$this->getIncrementalSlugAtIndex($id - $this->acceptableElementNumber);
		}

		return $this->slug;
	}

}
