<?php

namespace App\Helpers;

use Mail;

class EmailHelper
{
	public static function PosaljiEmail($tekst, $od_koga_mail, $od_koga_ime, $tema = null)
	{

    	Mail::raw($tekst, function($message) use($od_koga_mail, $od_koga_ime, $tema){
    		$message->from($od_koga_mail, $od_koga_ime)->subject($tema);
    		$message->to('ikt@kg.org.rs')->cc('stasha@kg.org.rs');
		});
		
	}
}