<p align="center"><a href="https://esmart-me.com/" target="_blank"><img src="https://raw.githubusercontent.com/Meklad/esmart-/main/public/esmart-logo.png" width="400" alt="eSmart Logo"></a></p>

# eSmart Task 

This is task created by Ahmed Abd-El-Rhahman Hassan - AKA - "Ahmed Meklad" using Larave Framework.

## Installation

- Backend Installation:
### 1- First colne the repository:

```bash
$ git clone git@github.com:Meklad/esmart-.git
```

### 2- Copy env.example to .env
```bash
$ cp .env.example .env
```

### 3- Then install the dependencies
```bash
$ composer install
```

### 4- Than run sail to start the docker
```bash
$ ./vendor/bin/sail up
```
#### Note: you can ignore docker if you don't work with it.

### 5- Database Migration and Seeding:
- You must create a database for the app, and another one for testing purposes under the name "esmart_testing", or you can modify the name of the database from phpunit.xml.
```bash
php artisan migrate --seed
```

### 6- Visit the campaigns :
- You will find the the root directory of the project folder called "postman_collection" contains all endpoints.


### 7- To analyse the code bugs using phpstan run:
```bash
$ ./vendor/bin/phpstan
```

### 8- And Finally, run unit test:
```bash
$ php artisan test
```
#### Note: When you run the unit test the ".env.testing" will contain the environment associated with the unit test. 

### Important Note:
- In addition, I installed GitHub workflow to build and test the code for CD/CI.
