<?php
namespace api\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;

/**
 * Site controller
 */
class UserController extends Controller
{
    public function actionTest()
    {
      echo 'yahooo!!!!!!!!!';
      exit();
    }

}
