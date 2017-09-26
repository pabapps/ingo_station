<?
namespace App\emailDomain;

class domain{



	public static function create_domain(){

		$domain_array = array("a.parkes@malariaconsortium.org","achala.navaratne@redcross.org",
			"alfred.lcdb@gmail.com","anik.asad@heks-eper.org","arahman@fhi360.org","atul@caritasbd.org",
			"bangladeshrep@mcc.org","bchakraborty@saferworld.org.uk","dha.hom@solidarites-bangladesh.org",
			"cornelis.wolf@united-purpose.org","cornelius_tudu@sil.org","davidhall@mcc.org","drc.bangla@gmail.com",
			"edtib@ti-bangladesh.org","Farah.Kabir@actionaid.org","franziska.korn@fesbd.org","Fred_Witteveen@wvi.org",
			"GDeJesus@redcross.org.uk","hasin.jahan@practicalaction.org.bd","hom.bd.solidarites@gmail.com",
			"KasparKaspar.Grossenbacher@helvetas.org","kdaring@worldrenew.net","KhairulIslam@wateraid.org",
			"khodeja.sultana@diakonia.se","kyledscott@gmail.com","lionel.lafont@tdh.ch","m.kabir@tdh.nl",
			"mahfuzur.rahman@muslimaid.com","mblomberg@maf.org","mostafizur.rahman@helpagesa.org",
			"nazbul.khan@winrock.org","nazrul@ri.org","ncyb@agni.com","cd@bd.missions-acf.org",
			"prodipd@worldconcern.org","Rabeya.Sultana@helpagesa.org","reiza@hibd.org","Rita.Petralba@redcross.se",
			"rubayets@ipas.org","sara.taylor@asiafoundation.org","shabel.firuz@islamicrelief-bd.org",
			"shahedf@traidcraft.org","Shamim.Ahamed@helvetas.org","sugahara@shaplaneer.org",
			"Tessa.Schmelzer@icco-cooperation.org","zia.choudhury@care.org","ZTalukder@hki.org",
			"bangladesh-hom@oca.msf.org","john@habitatbangladesh.org","Simon.Brown@vsoint.org",
			"deepti.pant@crs.org","Amitabh.Sharma@redcross.ch","Orla.Murphy@plan-international.org",
			"selimr@solidaridadnetwork.org","rlohani@iscbangladesh.org","zkhair@hollows.org",
			"landerson@adrabd.org","suzan@htnbd.org","mark.pierce@savethechildren.org",
			"v.lucchese@tdhitaly.org","kariful@sightsavers.org","SNabi@christian-aid.org",
			"mgso@dca.dk","shafiqul.islam@add-bangladesh.org","ksengupta@fh.org","Rakhi.Sarkar@roomtoread.org",
			"musha.akm@concern.net","dkhadka@ideglobal.org","rkhondker@gainhealth.org","MAkhter@oxfam.org.uk",
			"t.schmelzer@icco.nl","dp@hibd.org","jacob.sarker@tearfund.org","jbelanger@snvworld.org","kamrul.hasan@add-bangladesh.org");

		$refined_array = array();

		$count = 0 ;

		foreach ($domain_array as $array) {
			

			$string = explode("@",$array);



		// dd($string[1]);

			$final =  preg_replace('/[^A-Za-z0-9\-]/', '', $string[1]); 

			$refined_array[$count] = $string[1];

			$count++;

		}

		

		dd($refined_array);





	}


}