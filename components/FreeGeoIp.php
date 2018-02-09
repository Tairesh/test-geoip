<?php

namespace app\components;

use yii\base\Component;

/**
 * Description of FreeGeoIp
 *
 * @author ilya
 */
class FreeGeoIp extends Component
{

    public $url = 'http://freegeoip.net/json/';

    public function query($ip)
    {
	return $this->curlRequest($this->url . $ip);
    }

    /**
     * Curl request
     */
    protected function curlRequest($url)
    {
	$ch = \curl_init($url);

	\curl_setopt($ch, CURLOPT_HTTPHEADER, array(
	    'Content-Type: application/json'
	));
	\curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$output = \curl_exec($ch);
	$info = \curl_getinfo($ch);
	if ($output === false) {
	    if (\curl_error($ch)) {
		throw new \Exception(curl_error($ch));
	    } else {
		throw new \Exception($info);
	    }
	}
	$http_status_code = \curl_getinfo($ch, CURLINFO_HTTP_CODE);
	if ($http_status_code != 200) {
	    return [];
	} else {
	    $json_data = json_decode($output);
	    if ($json_data == NULL) {
		// json parsing failed
		throw new \Exception($output);
	    }
	    \curl_close($ch);
	    return $json_data;
	}
    }

}
