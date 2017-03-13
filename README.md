# myob test v-0.1.3 

<!-- BADGES/ -->

<!-- /BADGES -->

myob Full Stack Developer Task

## Before you start
Please notice this project not complete yet. It was built with Yii 2 Starter Kit
http://yii2-starter-kit.terentev.net/
So, this framework also include CMS, RABC, Log ,etc  but this is not the point.

I add the part of products mangement, test management, 

The demo address is 
http://my.rewentuijian.com/

http://my.rewentuijian.com/payslip/create

username:manager

password:manager

Because I took a vocation in the weekend and I only have one day to do this.
So I finished the whole environment building up and Main Management System Framework.

####Main file
myob-test/backend/helpers/PayslipHelper.php

myob-test/myob_test/tests/unit/PayslipTest.php

run test

ssh:47.91.42.123

account: myob

password:myob123

cd /data/wwwroot/my.rewentuijian.com/myob_test/

 ../vendor/bin/codecept run

Functional Tests (0) -----------------------------------------------------------
--------------------------------------------------------------------------------

Unit Tests (5) -----------------------------------------------------------------

✔ PayslipTest: Pay period (0.00s)

✔ PayslipTest: Gross income (0.00s)

✔ PayslipTest: Income tax (0.00s)

✔ PayslipTest: Net income (0.00s)

✔ PayslipTest: Super (0.00s)
--------------------------------------------------------------------------------

Acceptance Tests (0) -----------------------------------------------------------
--------------------------------------------------------------------------------


Time: 151 ms, Memory: 4.00MB

OK (5 tests, 13 assertions)


 
 





####Tasks


TODO:
1. upload a csv file
2. more stable
3. adding some frontend effect 

##### Frontend part
Due to the time limitation, now is all developed based on Bootstrap3 version of Admintle.
Which can be changed into angular version in the future.

##### Backend part
Consider the development efficient, I choos Yii Framework, This framework is a good balance for
best practice design to performance.

##### Database
I also setup the datebase with mysql 5.7 ,with master slave structure and json formate date suppport.

I also use migration for sql management.
#####Server part
I choose Alicloud which is more cheaper than AWS and also provide storng performance 
as well as stability.
The session is setup with redis which is
more convenient for us to build up distributed system with load balance in the future.

Linux + nginx + Mysql + PHP7 


