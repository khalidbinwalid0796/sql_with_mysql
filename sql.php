#Data--> it can be facts related to any object in consideration. like age, video & other;data means information

#Database-->it is a systematic collection of data which support storage & manipulation of data in a easy way.
			An online telephone directory uses a database to store data of people, phone numbers, and other contact details

#Why database-->manage large amount of data is hasale but using database multiple people can also edit data at the same time

#DBMS-->it is a collection of programms which enables it's user to access database, manipulate data, reporting/
	   representation of data

#sql-->it is the standard language for dealing with relational(key relation from one table to another table) 
	  database which can be used to create,read,update & delete database records.sql has acid properties as database compliance.

#mysql-->it is a relational database.

#Application of sql-->data definition language(ddl),data manipulation language(dml),data control language
					(dcl),client/server language,3 tier architecture client-server-database

#Field-->column of table
#Record-->raw of table

##datatype
#numeric
	int
	smallint
	tinyint
	bigint
	decimal
	float

#character
	char(s)-->255 character
	varchar(s)-->255 character
	text-->65535 character

#date-time
	date-->YYYY-MM-DD
	time-->HH-MM-SS
	year-->YYYY

#Constraints are used to specify rules for data in table
	Not Null
	Default
	Unique
	Primary Key = Not Null + Unique


##database, database table name, column name, index name are case insensitive on windows but sessitive in unix

#create database	
	CREATE DATABASE sql_practise;

#USE-->jokhon multiple database nie kaj kora hoy tokhon database select korar jonno USE keyword use kora hoy mane kon database a operation korbo seta to age theke ee define kore nite hoy ai kaj tai USE keyword kore

	   USE DatabaseName;

#delete database
	DROP DATABASE sql_practise

#create table
	CREATE TABLE Persons (
	    PersonID int not null,
	    LastName varchar(255),
	    FirstName varchar(255),
	    Address varchar(255),
	    City varchar(255),
	    primary key(PersonID)
	);

#delete all data from table
	TRUNCATE TABLE Persons;

#alter-->add, delete, modify columns in a table
	alter table employee add birth_day date;
	alter table employee drop column birth_day date;


##CRUD

#insert
	insert into Persons values(1,'hasan','sakib','magura','jessore');
	insert into persons(PersonID,LastName,FirstName,Address,City) values(2,'khan','tamim','chitta','chittagong');

#select
	select * from persons;

#update
	update persons set LastName='khan',FirstName='tamim',Address='chitta',City='chittagong' where PersonID='1';

#delete
	delete from persons where personid = '2';

#Distinct

	id     gender
	1      male
	2      female
	3      male
	4      female
	5      male

	select distinct gender from employee;

	output :  gender
			  male
			  female

#where used in filtering
	select * from employee where gender = 'male';

#multiple condition using AND, OR, NOT
	select * from employee where gender = 'male' and salary > 30000;

	select * from employee where dept = 'bowling' or dept = 'batsman';
	select * from employee where dept = 'bowling' or salary > 30000;

	select * from employee where not gender = 'male';

#LIKE operator with wild card characters

	%-->represents zero,one,multiple character
	%m-->m ar age zero,one,multiple character but m ar pore no character
	m%-->m ar pore zero,one,multiple character but m ar age no character
	%m%-->m ar age and pore zero,one,multiple character thakte pare

	_-->represents single character
	3_-->3 ar pore only 1ta digit thakte parbe

	select * from employee where name like '%m%';
	select * from employee where salary like '3_';

#Between
	select * from employee where age between 30 and 35;

#in
	select * from employee where dept in('batsman','all-rounder');

#Min function
	select min(salary) from employee;

#Max function
	select max(salary) from employee;

#count()
	select count() from employee where gender = 'male';

#sum()
	select sum(salary) from employee;

#avg()
	select avg(salary) from employee;

## String Function

#ltrim()-->remove left space

#lower()-->convert all character into lower case

#upper()-->convert all character into upper case

#reverse()-->reverse all character in a string

#substring()-->gives a sub string from the original string
	substring('main string',starting_index_of_substring,sub_string_length)

#order by(bydefault sort in ascending order)
	select * from employee order by name asc;

#top clause(fetch the top n records)->works on MSSQL 
	select top 3 * from employee;

#limit
	select * from employee order by id asc limit 3
	select * from employee order by id asc limit 2,3 //2 number theke 3 ta data show korbe

#group by similar to distinct but lot of functionalities
	select avg(salary), gender from employee group by gender;
	select avg(age), avg(salary), dept from employee group by dept order by avg(salary) asc; 

#having-->having must used with group by; only having works conditionally with derive/calculative value like 
		  avg(salary) and order by works with derive/calculative value like avg(salary) but where, group by etc not work with avg(salary).

	select dept, avg(salary) from employee where avg(salary) between 20000 and 30000;
	//wrong because where avg(salary)

	select dept, avg(salary) as avg_salary from employee group by dept having avg(salary) between 20000 and 30000 order by avg(salary) asc; //correct

	select dept, avg(salary) from employee group by avg(salary) having avg(salary) between 20000 and 30000 order by avg(salary) asc;
	//wrong because group by avg(salary)

## JOIN
	INNER JOIN - উভয় টেবিলে অন্তত একটি কলামের মিল থাকলে সকল সারি রিটার্ন করে।
	LEFT JOIN - ডান টেবিলের মিলিত সারিসহ বাম টেবিলের সকল সারি রিটার্ন করে।
	RIGHT JOIN - বাম টেবিলের মিলিত সারিসহ ডান টেবিলের সকল সারি রিটার্ন করে।
	FULL JOIN -যেকোনো একটি টেবিলের সাথে মিল থাকলে উভয় টেবিলের সকল সারি রিটার্ন করে।
	CROSS JOIN - বাম পাশের মিলিত সারির একটি কলামের জন্য ডান পাশের মিলিত সারির প্রতিটি কলামকে রিটার্ন করে।


employee

	id	name 	age		salary		dept			gender	d_id
		
	1	sakib	35		35000		all-rounder		male	1
		
	2	tamim	34		30000		batsman			male	2
		
	3	Runa	25		25000		all-rounder		female	3
		
	4	salma	25		20000		batsman			female	4

	5	samim	25		22000		batsman			male	1

	6	taijul	25		20000		bowling			male	2

department

	d_id	d_name	d_location
		
	1		cse		dhaka
		
	2		eee		dhaka

	3		te		jessore

	4		mc		khulna

#inner join
	SELECT employee.name, department.d_name FROM employee INNER JOIN department ON employee.d_id = department.d_id;

#left join
	select employee.*, department.d_name from employee left join department on employee.d_id = department.d_id;
	
#right join	
	select employee.*, department.d_name from employee right join department on employee.d_id = department.d_id;

#full join->column same na hole o full join kora jai
	select employee.*, department.d_name from employee full join department on employee.d_id = department.d_id;

#most useful join
	select employee.*,department.d_name from employee,department where employee.d_id = department.d_id
	order by employee.id desc;

#union-->combine result set of two or more select statements but avoid duplicate entry
	select city from customers union select city from suppliers;

#union all-->combine result set of two or more select statements and accepts duplicate entry
	select city from customers union all select city from suppliers;

#except operator
	select * from employee except select * from department;//not working

	#instead of except not in can be used

#intersect-->2ta table theke common data gulo return kore. not work in mysql instead of use in operator or left 
			 join.
	SELECT products.category_id FROM products WHERE products.category_id IN (SELECT inventory.category_id FROM inventory);

#view->create views/table from existing table
	CREATE VIEW female_employee AS SELECT name, salary FROM employee WHERE gender = 'female';

#views delete
	drop view female_employee;

select EmployeeDetail.FirstName, ProjectDetail.ProjectName from EmployeeDetail ProjectDetail where EmployeeDetail.EmployeeID = ProjectDetail.EmployeeDetailID order by EmployeeDetail.FirstName asc;
