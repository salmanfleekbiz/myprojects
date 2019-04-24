<?php

namespace frontend\models;

use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class NotificationForm extends Model
{
    public $tournament;
    public $match;
    public $message;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tournament','match','message'], 'required'],
        ];
    }
}
