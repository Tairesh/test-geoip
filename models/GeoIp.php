<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * Description of GeoIp
 *
 * @author ilya
 */
class GeoIp extends Model
{

    public $ip;
    public $data = [];

    public function getData()
    {
	// TODO: check cache

	$rawData = Yii::$app->freegeoip->query($this->ip);
	if (!empty($rawData)) {
	    $this->data = [
		'country' => $rawData->country_name,
		'city' => $rawData->city,
		'latitude' => $rawData->latitude,
		'longitude' => $rawData->longitude,
	    ];
	}
	return $this->data;
    }

}
