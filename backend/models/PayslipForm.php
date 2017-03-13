<?php
namespace backend\models;

use backend\helpers\PayslipHelper;
use common\models\User;
use yii\base\Exception;
use yii\base\Model;
use Yii;


/**
 * Create user form
 */
class PayslipForm extends Model
{
    public $username;
    public $salary;
    public $rate;
    public $month;

    public $payPeriod;
    public $grossIncome;
    public $incomeTax;
    public $netIncome;
    public $super;

    private $model;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['username', 'filter', 'filter' => 'trim'],
            ['username', 'required'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['salary', 'filter', 'filter' => 'trim'],
            ['salary', 'required'],
            ['salary', 'integer'],

            ['month', 'required'],

            ['rate','required'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'username' => Yii::t('common', 'Username'),
            'salary' => Yii::t('common', 'Salary'),
            'month' => Yii::t('common', 'Month'),
        ];
    }

    public function save(){
        $payslip = new PayslipHelper($this->salary,$this->rate,$this->month);
        $this->payPeriod = $payslip->getPayPeriod();
        $this->grossIncome = $payslip->getGrossIncome();
        $this->incomeTax = $payslip->getIncomeTax();
        $this->netIncome = $payslip->getNetIncome();
        $this->super = $payslip->getSuper();
        return 1;
    }

    public function getMonthlist(){
        $payslip = new PayslipHelper();
       return  $payslip->getMonthlist();
    }
}
