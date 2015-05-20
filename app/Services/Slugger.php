<?php namespace DarkShare\Services;

class Slugger {

	/**
	 * Acceptable slug elements
	 *
	 * @var array
	 */
	private $acceptableElements = [
		'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', // 1-10
		'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', // 11-20
		'u', 'v', 'w', 'x', 'y', 'z', // 21-26

		'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', // 27-36
		'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', // 37-46
		'U', 'V', 'W', 'X', 'Y', 'Z', // 47-52

		'0', '1', '2', '3', '4', '5', '6', '7', '8', '9', // 53-62

		'-', '_', '~', '[', ']', '@', '!', '$', '&', '(', // 63-72
		')', '*', '+', ';', '=', '\'', '"', '<', '>', ',', // 73-82
		'^', ';', '`', // 83-85
	];

	/**
	 * Make the conversion
	 *
	 * @param int $id
	 */
	public function make($id)
	{
		return $this->decimalToForeign($id, $this->acceptableElements);
	}


	/**
	 * Convert an arbitrarily large number from any base to any base.
	 * @source http://php.net/manual/en/function.base-convert.php#105990
	 *
	 * @param int   $number
	 * @param array $characterArray
	 * @return string
	 */
	private function decimalToForeign($number, $characterArray)
	{
		$slug = [];
		$cipher = 0;
		$length = count($characterArray);
		while($number > $length) {
			$i = $number % $length;
			$slug[$cipher] = $characterArray[$i];
			$number = floor($number / $length);
			$cipher++;
		}
		$slug[$cipher] = $characterArray[$number - 1];

		return implode('', array_reverse($slug));
	}

}
