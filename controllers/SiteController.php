<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\Response;
use app\components\JsonErrorAction;

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
	return [];
    }

}
