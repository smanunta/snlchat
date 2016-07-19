<?php 
class Validate
{
	private $_passed = false,
			$_errors = array(),
			$_db = null;
			
	public function __construct()
	{
		$this->_db = DB::getInstance();
	}
	public function check($source, $items = array())
	{
		foreach($items as $item => $rules) // first split...ex.item = username, rules = (required =true)
		{
			foreach($rules as $rule => $rule_val) //second split... ex.rule = required rule val = true, rule =is_same rule_val = true
			{
				$value = trim($source[$item]); //this picks up each of the values in the post/source

				if($rule === 'required' && empty($value))
				{
					$this->addError("{$item} is required");
				}else if(!empty($value)) //if the value is not empty
				{
					switch($rule)
					{
						case 'min':
							if(strlen($value) < $rule_val)
							{
								$this->addError("{$item} must be a min of {$rule_val}");
							}
						break;
						case 'max':
							if(strlen($value) > $rule_val)
							{
								$this->addError("{$item} must be a max of {$rule_val}");
							}
						break;
						case 'matches':
							if($value > $rule_val)
							{
								$this->addError("{$item} must be a max of {$rule_val}");
							}
						break;
						case 'unique':
							$check = $this->_db->get($rule_val, array($item, '=', $value));
							if($check->count())
							{
								$this->addError("{$item} already exist");
							}
						break;						
					}
				}
				
			}
		}
		
		if(empty($this->_errors))
		{
			$this->_passed = true;
		}
		
		return $this;
	}
	
	private function addError($error)
	{
		$this->_errors[] = $error;
	}
	
	public function errors()
	{
		return $this->_errors;
	}
	public function passed()
	{
		return $this->_passed;
	}
}
?>