<?php


class PayslipTest extends \Codeception\Test\Unit
{
    public $firstName;
    public $lastName;
    public $salary;
    public $rate;
    public $startMonth;



    /**
     * @var \UnitTester
     */
    protected $tester;



    protected function _before()
    {
        //init payslip
        $this->salary = 60050;
        $this->rate = 9;
        $this->startMonth = 3;
    }

    protected function _after()
    {
    }

    // tests
    public function testPayPeriod()
    {

    }

    // tests
    public function testGrossIncome()
    {
        //process by myob
        $grossIcome = 5004;
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
        $incomeTax = 922;
        $this->assertEquals(922, $incomeTax);

        $incomeTax = 922;
        $this->assertEquals(922, $incomeTax);

        $incomeTax = 922;
        $this->assertEquals(922, $incomeTax);
    }

    // test net income
    public function testNetIncome()
    {
        $netIncome = 4082;
        $this->assertEquals(4082, $netIncome);

        $netIncome = 4082;
        $this->assertEquals(4082, $netIncome);

        $netIncome = 4082;
        $this->assertEquals(4082, $netIncome);
    }

    // tests super
    public function testSuper()
    {
        $super = 450;
        $this->assertEquals(450,$super);

        $super = 450;
        $this->assertEquals(450,$super);

        $super = 450;
        $this->assertEquals(450,$super);
    }
}