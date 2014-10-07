<?php
class GridObject{
	public $rows;
	public $cols;
	public $gridForm;
	public $columnWidthPercentsArray;
	public function __construct($rows,$cols,$gridForm,$columnWidthPercentsArray){
		$this->rows = $rows;
		$this->cols = $cols;
		$this->gridForm = $gridForm;
		$this->columnWidthPercentsArray=$columnWidthPercentsArray;
	}
	function make(){
		$container ="<div class='gridFormContainer' >";
		for ($r = 0; $r < $this->rows; $r++) {
			$container .="<div class='gridRow' >";
			for ($c = 0; $c < $this->cols; $c++) {
				if (isset($this->gridForm[$r][$c])) {
					$container .="<div class='gridCell'  style='width:".$this->columnWidthPercentsArray[$c]."%;' >" . $this->gridForm[$r][$c] . "</div>";
				}else{
					$container .="<div class='gridCell'>  </div>";
				}
			}
			$container .="</div>";
		}
		$container .="</div>";
		echo($container);
	}
	
	function getGrid(){
		$container ="<div class='gridFormContainer' >";
		for ($r = 0; $r < $this->rows; $r++) {
			$container .="<div class='gridRow' >";
			for ($c = 0; $c < $this->cols; $c++) {
				if (isset($this->gridForm[$r][$c])) {
					$container .="<div class='gridCell'  style='width:".$this->columnWidthPercentsArray[$c]."%;' >" . $this->gridForm[$r][$c] . "</div>";
				}else{
					$container .="<div class='gridCell'>  </div>";
				}
			}
			$container .="</div>";
		}
		$container .="</div>";
		 
		return $container;
	}
}
?>