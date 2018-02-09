<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\Response;
use app\actions\JsonErrorAction;
use app\models\GeoIp;

class SiteController extends Controller
{

    /**
     * @inheritdoc
     */
    public function actions()
    {
	return [
	    'error' => [
		'class' => JsonErrorAction::className(),
	    ],
	];
    }

    /**
     * Makes query to GeoIP.
     *
     * @return string
     */
    public function actionQuery($ip)
    {
	Yii::$app->response->format = Response::FORMAT_JSON;
	$model = new GeoIp([
	    'ip' => $ip,
	]);
	$data = [];
	if (!$model->validate()) {
	    Yii::$app->response->setStatusCode(400);
	} else {
	    $data = $model->getData();
	    if (empty($data)) {
		Yii::$app->response->setStatusCode(404);
	    }
	}

	return $data;
    }

}
