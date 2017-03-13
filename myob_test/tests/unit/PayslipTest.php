<?php
namespace myob_test\tests\unit;

use backend\helpers\PayslipHelper;

class PayslipTest extends \Codeception\Test\Unit
{
    public $firstName;
    public $lastName;
    public $salary;
    public $rate;
    public $startMonth;

    public $payslipClass;

    /**
     * @var \UnitTester
     */
    protected $tester;



    protected function _before()
    {
        //init payslip
        $this->salary = 60050;
        $this->rate = 0.09;
        $this->startMonth = 3;

        $this->payslipClass = new PayslipHelper($this->salary, $this->rate, $this->startMonth);

    }

    protected function _after()
    {
    }

    // tests
    public function testPayPeriod()
    {
        $payPeriod = $this->payslipClass->getPayPeriod();
        $this->assertEquals('01 March to 31 March', $payPeriod);
    }

    // tests
    public function testGrossIncome()
    {
        //process by myob
        $grossIcome = $this->payslipClass->getGrossIncome();
        $this->assertEquals(5004, $grossIcome);

        //process by myob
        $grossIcome = 5004;
        $this->assertEquals(5004, $grossIcome);

        //process by myob
        $grossIcome = 5004;
        $this->assertEquals(5004, $grossIcome);
    }

    // test income tax
    public function testIncomeTax()
    {
        $incomeTax = $this->payslipClass->getIncomeTax();
        $this->assertEquals(922, $incomeTax);

        $incomeTax = 922;
        $this->assertEquals(922, $incomeTax);

        $incomeTax = 922;
        $this->assertEquals(922, $incomeTax);
    }

    // test net income
    public function testNetIncome()
    {
        $netIncome = $this->payslipClass->getNetIncome();
        $this->assertEquals(4082, $netIncome);

        $netIncome = 4082;
        $this->assertEquals(4082, $netIncome);

        $netIncome = 4082;
        $this->assertEquals(4082, $netIncome);
    }

    // tests super
    public function testSuper()
    {
        $super = $this->payslipClass->getSuper();
        $this->assertEquals(450,$super);

        $super = 450;
        $this->assertEquals(450,$super);

        $super = 450;
        $this->assertEquals(450,$super);
    }
}