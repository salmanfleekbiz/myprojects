<?php
namespace frontend\controllers;

use Yii;
use yii\web\Controller;

/**
 * Site controller
 */
class TestController extends Controller
{
    
    public function actionIndex()
    {
        return $this->render('mytest');
    }

}
