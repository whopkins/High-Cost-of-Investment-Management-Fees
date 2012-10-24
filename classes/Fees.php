<?php

class Fees {

	// Set up protected variables.
	protected $_princpal;
	protected $_repeat;
	protected $_return;
	protected $_fees;
	protected $_duration;
	
	// When we use the class, these four (4) variables are the available inputs.  Assign the variables (which in our other file are drawn from the user input into the form) to the protected variables so that the protected variables can be used in our forthcoming methods (functions).
	public function __construct($principal, $repeat, $return, $duration, $fees) {
		$this->_principal = $principal;
		$this->_repeat = $repeat;
		$this->_return = $return;
		$this->_fees = $fees;
		$this->_duration = $duration;
	}
	
	public function no_fee_impact() {
		if ($this->_repeat == "checked") {
			// no fee WITH repeating investments
			$no_fee_impact1 = 0;
			for ($year = 1; $year <= $this->_duration; $year++) {
				$no_fee_impact1 = ($no_fee_impact1 + $this->_principal)*(1+$this->_return);
			}
			$no_fee_impact2 = "$" . number_format($no_fee_impact1, 0, ".", ",");
		} else {
			// no fee WITHOUT repeating investments
			$no_fee_impact1 = $this->_principal;
			for ($year = 1; $year <= $this->_duration; $year++) {
				$no_fee_impact1 = $no_fee_impact1*(1+$this->_return);
			}
			$no_fee_impact2 = "$" . number_format($no_fee_impact1, 0, ".", ",");
		}
		return $no_fee_impact2;
	}
	
	public function fee_impact() {
		
		if ($this->_repeat == "checked") {
			// fee WITH repeating investments
			$fee_impact1 = 0;
			for ($year = 1; $year <= $this->_duration; $year++) {
				$fee_impact1 = ($fee_impact1 + $this->_principal)*(1+$this->_return);
				$fee_impact1 = $fee_impact1 - $fee_impact1*($this->_fees);
			}
			$fee_impact2 = "$" . number_format($fee_impact1, 0, ".", ",");
		} else {
			// fee WITHOUT repeating investments
			$fee_impact1 = $this->_principal;
			for ($year = 1; $year <= $this->_duration; $year++) {
				$fee_impact1 = $fee_impact1*(1+$this->_return);
				$fee_impact1 = $fee_impact1 - $fee_impact1*($this->_fees);
			}
			$fee_impact2 = "$" . number_format($fee_impact1, 0, ".", ",");
		}
		return $fee_impact2;
	}
}

?>