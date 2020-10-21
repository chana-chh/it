<?php
	
	function ping($adresa)
	{
		$ping = exec("ping -c 1 $adresa", $izlaz, $status);
		if (strpos(implode(",", $izlaz), 'Destination') !== false) {
			return false;
    	} else {
        	return true;
    	}
	}