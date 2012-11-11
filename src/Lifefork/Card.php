<?php
/**
 * Base Card Implementation
 */

namespace Lifefork;

abstract class Card {

	private $data = null;

	public function __construct()
	{

	}

	public function loadFromFile($type, $path)
	{
		if(!file_exists($path)){
			throw new Exception("File $path does not exist", 1);
		}
		$this->loadJson($path);
	}

	protected function loadJson($path)
	{
		$cardJson = file_get_contents($path);
		$card = json_decode($cardJson);
		$this->setData($card);
	}

	protected function loadMarkdown()
	{
		//TODO
	}

	/**
	 * For Testing Purposes, set data directly
	 * otherwise, comes from parsing 
	 * @param Object $data object describing card
	 */
	public function setData($data)
	{
		if(!$this->validateData($data)){
			throw new Exception("Data not valid", 1);
		}

		$this->data = $data;
	}

	protected function validateData($data)
	{
		return true;
	}
}