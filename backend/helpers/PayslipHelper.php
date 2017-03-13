<?php
/**
 * Created by IntelliJ IDEA.
 * User: Administrator
 * Date: 12/03/2017
 * Time: 9:09 AM
 */

namespace backend\helpers;
/**
 * Class Payslip
 * This is the payslip helper to process the employee's pay slips
 *
 * You should init it with
 * salary  int  cent is the unit
 * rate    int the super rate of percentage
 * month   1-12  means the name of month
 * @package Helper
 */

class PayslipHelper
{
    // the employee's salary
    public $salary;
    // the employee's rate
    public $rate;
    // the pay month
    public $month;

    //this is gross income
    private $_grossIncomme;
    // this is income tax for net income
    private $_incomeTax;


    public function __construct($salary=0, $rate=0, $month=1)
    {
        $this->salary = $salary;
        $this->rate = $rate;
        $this->month = $month;
    }
    //get current date of this month;
    private function _getMonthDay($m){
        $y = date('Y');// get current year;
        return date("t",strtotime("$y-$m"));
    }
    public function getMonthlist(){
        //caculate date

        return [
            1=>'01 January to 31 January' ,
            2=>'01 February to '.$this->_getMonthDay(2),
            3=>'01 March to 31 March',
            4=>'01 April to 30 April',
            5=>'01 May to 31 May',
            6=>'01 June to 30 June',
            7=>'01 July to 31 July',
            8=>'01 August to 31 August',
            9=>'01 September to 30 September',
            10=>'01 October to 31 October',
            11=>'01 November to 30 November',
            12=>'01 December to 31 December',
        ];
    }

    public function getPayPeriod(){
        $tmp = $this->getMonthlist();
        return $tmp[$this->month];
    }

    public function getGrossIncome(){
        $this->_grossIncomme = round($this->salary/12);
        return $this->_grossIncomme;
    }

    public function getIncomeTax(){
        if(0<$this->salary&&$this->salary<=18200){
            $this->_incomeTax = 0;
        }else if(18200<$this->salary&&$this->salary<=37000){
            $this->_incomeTax =  round(($this->salary-18200)*0.19/12);
        }else if(37000<$this->salary&&$this->salary<=80000){
            $this->_incomeTax =  round((3572 + ($this->salary-37000) * 0.325 )/12);
        }else if(80000<$this->salary&&$this->salary<=180000){
            $this->_incomeTax =  round((17547 + ($this->salary-80000) * 0.37 )/12);
        }else if(180000<$this->salary){
            $this->_incomeTax =  round((54547 + ($this->salary-180000) * 0.45 )/12);
        }
        return $this->_incomeTax;
    }

    public function getNetIncome(){
        return $this->getGrossIncome() - $this->getIncomeTax();
    }
    public function getSuper(){
        return round($this->getGrossIncome() * $this->rate);
    }

}