<?php

class Controller_Test extends Controller
{
	function action_index()
	{	
		
		echo md5(md5(trim(123)));
	}
}

?>