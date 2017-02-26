# Tipple Invoice v-0.1.1 

<!-- BADGES/ -->

<!-- /BADGES -->

Tipple Full Stack Developer Task

Tipple processes multiple invoices per day manually from different suppliers, one of our main suppliers has the option to supply us with a digital copy of the invoice, the invoice is a DBF file and is formatted in a certain way.

We would like an easier way to process these invoices utilising the DBF files supplied by our supplier, store and retrieve. 

For this task we would like to see your skills in both backend and front end, including using a database of choice.

I have attached a DBF file and the matching PDF to one of the invoices we receive from our suppliers.

Get creative and let the development begin. 

## Before you start
Please notice this project not complete yet. It was built with Yii 2 Starter Kit
http://yii2-starter-kit.terentev.net/
So, this framework also include CMS, RABC, Log ,etc  but this is not the point.

I add the part of products mangement, invoice management, 

The demo address is 
http://tipple.rewentuijian.com/

username:manager

password:manager

Because I visted my friend in the weekend and I only have one day to do this.
So I finished the whole environment building up and Main Management System Framework.

You can login and view content=> dbf to see the analysis for the dbf file.

I also created the products table and will add the connection between the dbf file to the products.

I will add tax rate and fee calculator in the future.



####Tasks
##### Main functions
Main Management System Framework(DONE)

DBF file analysis(TODO)

DBF file insert DB (TODO)

Products Management(done with out DBF insert products)

Inovice Mangement (TODO)

Fees&Tax Caculator (TODO)

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
###NOTE
This template was created mostly for developers NOT for end users.
This is a point where you can begin your application, rather than creating it from scratch.
Good luck!

