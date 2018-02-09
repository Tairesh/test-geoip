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

    const CACHE_TIME = 60 * 30; // 30 minutes

    public $ip;
    public $data = [];

    /**
     * Unique redis key for IP
     * @return string
     */
    protected function getKey()
    {
	return 'ip:' . $this->ip;
    }

    /**
     * Returns GeoIP data for this IP
     * @return array
     */
    public function getData()
    {
	// check cache
	$model = CachedData::findOne($this->getKey());
	if ($model) {
	    $this->data = $model->attributes;
	} else {
	    // using API
	    $rawData = Yii::$app->freegeoip->query($this->ip);
	    if (!empty($rawData)) {
		$this->data = [
		    'id' => $this->getKey(),
		    'country' => $rawData->country_name,
		    'city' => $rawData->city,
		    'latitude' => $rawData->latitude,
		    'longitude' => $rawData->longitude,
		];
		$model = new CachedData($this->data);
		$model->save();
	    }
	}
	unset($this->data['id']);
	return $this->data;
    }

}
