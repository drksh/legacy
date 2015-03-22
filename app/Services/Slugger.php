<?php namespace DarkShare\Services;

class Slugger {

	/**
	 * Acceptable slug elements
	 *
	 * @var array
	 */
	private $acceptableElements = [
		'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j',
		'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't',
		'u', 'v', 'w', 'x', 'y', 'z',

		'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J',
		'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T',
		'U', 'V', 'W', 'X', 'Y', 'Z',

		'0', '1', '2', '3', '4', '5', '6', '7', '8', '9',

		'-', '_', '~', '[', ']', '@', '!', '$', '&', '(',
		')', '*', '+', ';', '=', '\'', '"', '<', '>', ',',
		'^', ';', '`',
	];

	/**
	 * The number of acceptable slug elements
	 *
	 * @var int
	 */
	private $acceptableElementNumber;

	/**
	 * Create a new Slugger instance
	 */
	function __construct()
	{
		$this->acceptableElementNumber = count($this->acceptableElements);
	}

	/**
	 * Make the conversion
	 *
	 * @param int $id
	 */
	public function make($id)
	{
		return $this->intToAlphaBaseN($id - 1, $this->acceptableElements);
	}


	/**
	 * Convert an arbitrarily large number from any base to any base.
	 * @source http://php.net/manual/en/function.base-convert.php#105990
	 *
	 * @param int   $number
	 * @param array $characterArray
	 * @return string
	 */
	private function intToAlphaBaseN($number, $characterArray)
	{
		$length = count($characterArray);
		$slug = '';
		for ($i = 1; $number >= 0 && $i < 10; $i++) {
			$slug = $characterArray[($number % pow($length, $i) / pow($length, $i - 1))] . $slug;
			$number -= pow($length, $i);
		}
		return $slug;
	}

}
