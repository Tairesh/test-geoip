<?php

namespace app\components;

use Yii;
use yii\web\Response;
use yii\web\ErrorAction;

/**
 * Description of JsonErrorAction
 *
 * @author ilya
 */
class JsonErrorAction extends ErrorAction
{

    public function run()
    {
	Yii::$app->response->setStatusCodeByException($this->exception);
	Yii::$app->response->format = Response::FORMAT_JSON;
	return [];
    }

}
