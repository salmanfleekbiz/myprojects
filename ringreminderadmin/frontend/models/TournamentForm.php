<?php

namespace frontend\models;

use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class TournamentForm extends Model
{
    public $name;
    public $startdate;
    public $enddate;
    public $tournamenttype;
    public $channel;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name','startdate','enddate','tournamenttype','channel'], 'required'],
        ];
    }
}
