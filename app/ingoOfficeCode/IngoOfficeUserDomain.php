<?php

namespace App\ingoOfficeCode;

use App\Ingos;

class ingoOfficeUserDomain{

	public static function check_domain($userDomain){
		
		$ingos = Ingos::all();

		$ingo_office_id = -1;

		foreach ($ingos as $ingo) {
			
			$ingo_email = $ingo->email;

			$modified_domain = explode("@",$ingo_email);

			if($modified_domain[1] == $userDomain){
				$ingo_office_id = $ingo->id;
				break;
			}
		}

		return $ingo_office_id;

	}

}					