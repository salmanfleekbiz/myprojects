<?php

namespace frontend\models;

use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class BoxerForm extends Model
{
    public $name;
    public $total_no_match;
    public $total_no_win_match;
    public $total_no_loss_match;
    public $total_no_nr_match;
    public $total_no_konckout_match;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name','total_no_match','total_no_win_match','total_no_loss_match','total_no_nr_match','total_no_konckout_match'], 'required'],
            ['name', 'match', 'pattern' => '/[a-zA-Z]+([\s][a-zA-Z]+)*/','message' => 'Please enter only alphabetically'],
            ['total_no_match', 'integer', 'integerOnly' => true, 'min' => 0,'message' => 'Please enter only numbers'],
            ['total_no_win_match', 'integer', 'integerOnly' => true, 'min' => 0,'message' => 'Please enter only numbers'],
            ['total_no_loss_match', 'integer', 'integerOnly' => true, 'min' => 0,'message' => 'Please enter only numbers'],
            ['total_no_nr_match', 'integer', 'integerOnly' => true, 'min' => 0,'message' => 'Please enter only numbers'],
            ['total_no_konckout_match', 'integer', 'integerOnly' => true, 'min' => 0,'message' => 'Please enter only numbers'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'verifyCode' => 'Verification Code',
        ];
    }

    /**
     * Sends an email to the specified email address using the information collected by this model.
     *
     * @param string $email the target email address
     * @return bool whether the email was sent
     */
    public function sendEmail($email)
    {
        return Yii::$app->mailer->compose()
            ->setTo($email)
            ->setFrom([$this->email => $this->name])
            ->setSubject($this->subject)
            ->setTextBody($this->body)
            ->send();
    }
}
