<?php

namespace app\components\help;

use Yii;
use yii\helpers\Html;
 
class Rss
{
	public static function parseRSS($rss)
	{
		$xmlstr = @file_get_contents($rss);
		if($xmlstr===false) return false;
		$xml = new \SimpleXMLElement($xmlstr);
		if($xml===false)die('Error parse RSS: '.$rss);
		$xml = @simplexml_load_file( $rss);
		if(!$xml===false){
			return $xml;
		}else{
			return false;
		}
	}
}