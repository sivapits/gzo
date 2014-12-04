<?php

require_once(PATH_site . 'typo3conf/ext/lwsolradmin/classes/solr/class.lwsolradmin_sorl.php');

class tx_lwsolradmin_results{

	public function ajaxGetResults($params, &$ajaxObj){

		$test=false;

		if($_POST['show']=='none')
		{
			$content['results']=array();
			$content['total']=0;
		}
		elseif(!$test)
		{
			$lwsolr = new lwsolradmin_sorl;
			$result = $lwsolr->QueryProcess('',array('site'=>'http*'),10);
			$content['results']=$result['docs'];
			$content['total']=$result['numFound'];
		}
		else
		{
			$result = Array(
				'id'=>1,
				'url'=>'http://lingewoud.nl',
				'site'=>'Lingewoud',
				'sitehash'=>'x/l;djfgklds',
				'title'=>'Home',
			);
			$content['total']=10;
			$content['results'][]=$result;
			$result = Array(
				'id'=>2,
				'url'=>print_r($_POST,true),
				'site'=>'Lingewoud',
				'title'=>'Home',
				'type'=>'Page',
				'sitehash'=>'x/l;djfgklds',
			);

			$content['results'][]=$result;
		}

		$ajaxObj->setContent($content);
		$ajaxObj->setContentFormat('jsonbody');
	}
}

?>
