<?php
	
	function ping($adresa)
	{
		$ping = exec("ping -c 1 $adresa 2>&1", $izlaz, $status);
		if (strpos(implode(",", $izlaz), 'Destination host unreachable') !== false) {
			return false;
    	} else {
        	return true;
    	}
	}