<?php
class CCLITERATURE {
	public $id;
	public $subject;
	public $language;
	public $statement;
	public $listIdentifier;
	public $gradeLevels;
	//array {0,1,2,3,4,5,6,7,8,9,10,11,12}
	public $jurisdiction;
	public $jurisdictionAbbreviation;
	public $gradeLevel;
	public $code;
	public $shortCode;
	public $ASN;
	//array {id,parent, indexingStatus, authorityStatus, statementNotation, leaf}
	public $CCSS;
	// array {GUID, dotNotation, URI, currentURL}
	public function __construct() {
	}
//GETTERS
	public function getId(){
		return $this->id;
	}
	public function getSubject(){
		return $this->subject;
	}
	public function getLanguage(){
		return $this->language;
	}
	public function getStatement(){
		return $this->statement;
	}
	public function getListIdentifier(){
		return $this->listIdentifier;
	}
	public function getGradeLevels(){
		return $this->gradeLevels;
	}
	public function getJurisdiction(){
		return $this->jurisdiction;
	}
	public function getJurisdictionAbbreviation(){
		return $this->jurisdictionAbbreviation;
	}
	public function getGradeLevel(){
		return $this->gradeLevel;
	}
	public function getCode(){
		return $this->code;
	}
	public function getShortCode(){
		return $this->shortCode;
	}
	public function getASN(){
		return $this->ASN;
	}
	public function getCCSS(){
		return $this->CCSS;
	}
	
//SETTERS
	public function setId($id) {
		$this -> id = $id;
	}

	public function setSubject($subject) {
		$this -> subject = $subject;
	}

	public function setLanguage($language) {
		$this -> language = $language;
	}

	public function setStatement($statement) {
		$this -> statement = $statement;
	}

	public function setListIdentifier($listIdentifier) {
		$this -> listIdentifier = $listIdentifier;
	}

	public function setGradeLevels($gradeLevels) {
		$this -> gradeLevels = $gradeLevels;
	}

	public function setJurisdiction($jurisdiction) {
		$this -> jurisdiction = $jurisdiction;
	}

	public function setJurisdictionAbbreviation($jurisdictionAbbreviation) {
		$this -> jurisdictionAbbreviation = $jurisdictionAbbreviation;
	}

	public function setGradeLevel($gradeLevel) {
		$this -> gradeLevel = $gradeLevel;
	}

	public function setCode($code) {
		$this -> code = $code;
	}

	public function setShortCode($shortCode) {
		$this -> shortCode = $shortCode;
	}

	public function setASN($ASN) {
		$this -> ASN = $ASN;
	}

	public function setCCSS($CCSS) {
		$this -> CCSS = $CCSS;
	}

}
?>