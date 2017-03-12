<?php
/**
 * Created by IntelliJ IDEA.
 * User: Administrator
 * Date: 12/03/2017
 * Time: 9:09 AM
 */

namespace Helper;
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

class Payslip
{
    // the employee's salary
    public $salary;
    // the employee's rate
    public $rate;
    // the pay month
    public $month;

    public function __construct($salary, $rate, $month)
    {
        $this->salary = $salary;
        $this->rate = $rate;
        $this->month = $month;
    }

    public function getPayPeriod(){

    }

    public function getGrossIncome(){

    }

    public function getIncomeTax(){

    }

    public function getNetIncome(){

    }
    public function getSuper(){

    }

}