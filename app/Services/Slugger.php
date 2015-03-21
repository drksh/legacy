<?php namespace DarkShare\Services;

class Slugger {

//	private $acceptableElements = [
//		'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j',
//		'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't',
//		'u', 'v', 'w', 'x', 'y', 'z', 'æ', 'ø', 'å',
//
//		'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J',
//		'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T',
//		'U', 'V', 'W', 'X', 'Y', 'Z', 'Æ', 'Ø', 'Å',
//
//		'0', '1', '2', '3', '4', '5', '6', '7', '8', '9',
//
//		'-', '_', '~', '[', ']', '@', '!', '$', '&', '(',
//		')', '*', '+', ';', '=', '\'','"', '<', '>', ',',
//		'%', '^', '§', '¢', '£', '¢', 'π', '∆', ';', '`',
//	];

	private $acceptableElements = ['a', 'b', 'c', 'd'];

	private $acceptableElementNumber;

	private $counter = [];

	private $slugArray = ['a'];

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
		if ($id > $this->acceptableElementNumber) {

			if (count($this->slugArray) > 1 && ! $this->allPrecedingElementsOfSlugAreFilled()) {
				$elementLevel = $this->precedingElementsOfSlugAreFilled($this->slugArray);
				$this->incrementElementOfSlug($elementLevel);
			} else {
				$this->prependArrayWithSlugElement();
			}

			$this->getIncrementalSlugAtIndex($id - $this->acceptableElementNumber);
		} else {

			$this->slugArray[count($this->slugArray) - 1] = $this->acceptableElements[$id - 1];

		}

		// Debug
		$this->counter['slug'] = ($this->getSlugFromArray($this->slugArray));
		return $this->counter;

		// Real
		return $this->getSlugFromArray($this->slugArray);
	}

	private function prependArrayWithSlugElement()
	{
		if (count($this->slugArray) > 1)
			$this->normalizeSlugArray();

		$value = $this->acceptableElements[0];
		array_unshift($this->slugArray, $value);
	}

	private function normalizeSlugArray()
	{
		foreach($this->slugArray as $key => $value) {
			$this->slugArray[$key] = $this->acceptableElements[0];
		}
	}

	private function incrementElementOfSlug($elementLevel)
	{
		$incrementKey = count($this->slugArray) - $elementLevel;
		$currentValue = $this->slugArray[$incrementKey - 1];
		$nextValueIndex = array_search($currentValue, $this->acceptableElements) + 1;
		$nextValue = $this->acceptableElements[$nextValueIndex];

		$this->slugArray[$elementLevel - 1] = $nextValue;
	}

	private function precedingElementsOfSlugAreFilled($slugArray)
	{
		array_pop($slugArray);

		foreach ($slugArray as $key => $value) {
			$currentElement = $slugArray[$key];
			$maxAllowedValue = $this->acceptableElements[$this->acceptableElementNumber - 1];

			$this->counter['cur'][] = $currentElement;
			$this->counter['max'][] = $maxAllowedValue;
			$this->counter['part'] = $this->slugArray;

			if ($currentElement == $maxAllowedValue) {
				return $key;
			}
		}

		return 1;
	}

	private function allPrecedingElementsOfSlugAreFilled()
	{
		$numberOfFilledElements = 0;
		$slugArrayCopy = $this->slugArray;
		array_pop($slugArrayCopy);

		foreach ($slugArrayCopy as $key => $value) {
			$currentElement = $slugArrayCopy[$key];
			$maxAllowedValue = $this->acceptableElements[$this->acceptableElementNumber - 1];

			if ($currentElement == $maxAllowedValue) {
				$numberOfFilledElements++;
			}
		}

		return $numberOfFilledElements == count($slugArrayCopy);
	}

	private function getSlugFromArray($slugArray)
	{
		return implode('', $slugArray);
	}

}
