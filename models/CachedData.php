<?php

namespace app\models;

use Yii;
use yii\redis\ActiveRecord;

/**
 * Description of CachedData
 *
 * @author ilya
 */
class CachedData extends ActiveRecord
{

    public static function getDb()
    {
	return Yii::$app->get('db');
    }

    public function attributes()
    {
	return ['id', 'country', 'city', 'latitude', 'longitude'];
    }

}
