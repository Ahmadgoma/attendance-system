# Attendance using Laravel 6

Attendance System Sample

This is a system to help managers oversee when employees check in and out at work. 
The task is divided into two main features.

## Getting Started

These instructions will get you a copy of the project up and running on your local machine for development and testing purposes. See deployment for notes on how to deploy the project on a live system.

### Requirements

* PHP >= 7.2
* OpenSSL PHP Extension
* PDO PHP Extension
* Mbstring PHP Extension
* [composer](http://getcomposer.org/")


### Installation

* First create database, 
copy .env.example and make new file .env
then change DB_DATABASE=name of database in .env file.
* Run these following commands:
* $ composer install
* $ php artisan migrate --seed
* $ php artisan passport:install
* $ php artisan serve

#### You can manage employees in web view:
###### Dashboard "Admin Section"
1. Sign to the system by this credentials:
 `email asd@gmail.com and password 123456`.
2. List all with pagination by 20 per page.
3. Search by name, or email, ID. 
4. Create a new employee with name, pin code and unique email.
5. View attendance information of each employee, total working hours per each month 
and check-in time and check-out time for each day in month. 

#### You can manage attendance through api:
###### Api "Employee Section"

1. Login with email and pin_code.
1. Check-in or check-out for authenticated employee.

### Example:

Login dashboard:
```
http://localhost/attendence-system/attendance-dashboard/login
```

Login api:
```
POST http://localhost/attendence-system/api/login

headers 
Accept : application/json
Content-Type : application/json

Body {
"email" : "asd@email.com" ,
"pin_code": 1234
}
```
Check in or out api:
```
GET http://localhost/attendence-system/api/check-in-out

Authorization Bearer token

headers 
Accept : application/json
Content-Type : application/json
```

## Built With

* [Laravel](https://laravel.com/docs/6.x) - PHP framework.
* [Passport](https://laravel.com/docs/6.x/passport) -  OAuth2 server and API authentication package.

## Structure 
* use service orientated architecture to decouple code.
* make service layer for domain logic.
* make repository layer for query.
* use dependency injection in service and controller.  
