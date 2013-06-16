<?

class test // extends Controller 
{ 
	//private $tt;
	var $model=11; 

	/** 
	* 构造函数 
	* 
	**/ 
	function __construct() 
	{ 
		$this->model=111;
	} 

	function showList() 
	{ 
		echo $this->model;
	} 
}

$mytest = new test();
$mytest->showList() 
?> 
