<?php

namespace frontend\models;

use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class MatchForm extends Model
{
    public $boxernameone;
    public $boxernametwo;
    public $tournament;
    public $venu;
    public $startdate;
    public $enddate;
    public $remindernote;
    public $prematchsummary;
    public $postsummary;
    public $winner;
    public $featured;
    public $sortnumber;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['boxernameone','boxernametwo','tournament','featured','sortnumber'], 'required'],
        ];
    }
}
