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

	private $slugArray = ['a'];

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
		if ($id > $this->acceptableElementNumber) {

			$this->incrementTensAtIndex($this->getIncrementIndex());

			$this->getIncrementalSlugAtIndex($id - $this->acceptableElementNumber);
		} else {

			$this->slugArray[0] = $this->acceptableElements[$id - 1];

		}

		return $this->slugFromArray($this->slugArray);
	}

	private function incrementTensAtIndex($incrementIndex)
	{
		if ( ! array_key_exists($incrementIndex + 1, $this->slugArray)) {
			if (count($this->slugArray) > 1 && $this->slugArrayIsFull()) {
				foreach ($this->slugArray as $key => $value) {
					$this->slugArray[$key] = $this->acceptableElements[0];
				}
			}
			return $this->slugArray[] = $this->acceptableElements[0];
		}


		$currentValue = $this->slugArray[$incrementIndex + 1];
		$nextValue = array_search($currentValue, $this->acceptableElements);
		$this->slugArray[$incrementIndex + 1] = $this->acceptableElements[$nextValue + 1];

	}

	private function getIncrementIndex()
	{
		$maxValue = $this->acceptableElements[$this->acceptableElementNumber - 1];
		$incrementIndex = 0;

		foreach ($this->slugArray as $key => $value) {
			if ($value == $maxValue) {
				$incrementIndex = $key;
			}
		}

		return $incrementIndex;
	}

	private function slugArrayIsFull()
	{
		$fullCount = 0;
		foreach($this->slugArray as $value) {
			if($value == $this->acceptableElements[$this->acceptableElementNumber - 1]);
				$fullCount++;
		}

		return count($this->slugArray) == $fullCount;
	}

	private function slugFromArray($slugArray)
	{
		return implode('', $slugArray);
	}

}
