<?php

namespace frontend\models;

use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class ChannelForm extends Model
{
    public $id;
    public $channelname;
    public $actives;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['channelname','actives'], 'required'],
        ];
    }
}
