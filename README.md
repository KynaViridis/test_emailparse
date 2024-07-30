# Email Parsing API
This project provides an API for parsing email content and storing it in a database. The API supports user registration, authentication, and CRUD operations for email data.

## Table of Contents
- [Requirements](#requirements)
- [Installation](#installation)
- [Configuration](#configuration)
- [Running the Project](#running-the-project)
- [API Endpoints](#api-endpoints)
- [User Registration](#user-registration)
- [User Login](#user-login)
- [Get All Emails](#get-all-emails)
- [Get Email by ID](#get-email-by-id)
- [Create Email](#create-email)
- [Update Email](#update-email)
- [Delete Email](#delete-email)
- [Command for Parsing Emails](#command-for-parsing-emails)

## Requirements
- PHP >= 7.4
- Composer
- MySQL
- Laravel 8.x

## Installation
1. Clone the repository:

```sh
git clone https://github.com/KynaViridis/test_emailparse
cd test_emailparse
```

2. Install the dependencies:

```sh
composer install
```

3. Copy the `.env.example` file to `.env`:
```sh
cp .env.example .env
```  

4. Generate the application key:
```sh
php artisan key:generate
```

## Configuration
1. Configure the `.env` file with your database and other settings.
2. Run the migrations:

```sh
php artisan migrate
```

## Running the Project

1. Start the Laravel development server:
```sh
php artisan serve
```

## API Endpoints

### User Registration

-  **URL:**  `http://website_url_or_ip/api/register`
-  **Method:**  `POST`
-  **Headers:**  `Content-Type: application/json`
-  **Body:**
```json
{
"name": "Your Name",
"email": "mail@domain",
"password": "your PWD",
"password_confirmation": "your PWD"
}
```

-  **cURL Command:**
```sh
curl -X POST http://website_url_or_ip/api/register -H "Content-Type: application/json" -d '{
"name": "Your Mail",
"email": "mail@domain",
"password": "your PWD",
"password_confirmation": "your PWD"
}'
```

### User Login
-  **URL:**  `http://website_url_or_ip/api/login`
-  **Method:**  `POST`
-  **Body:**

```sh
email=mail@domain.com&password=yourPWD
```

-  **cURL Command:**
```sh
curl -X POST http://website_url_or_ip/api/login -d "email=mail@domain&password=yourPWD"
```

### Get All Emails
-  **URL:**  `http://website_url_or_ip/api/emails`
-  **Method:**  `GET`
-  **Authorization:** ` Bearer your_jwt_token`
-  **cURL Command:**

```sh
curl -X GET http://website_url_or_ip/api/emails -H "Authorization: Bearer your_jwt_token"
```

### Get Email by ID
-  **URL:**  `http://website_url_or_ip/api/emails/{id}`
-  **Method:**  `GET`
-  **Headers:**
-  **Authorization:** ` Bearer your_jwt_token`

-  **cURL Command:**
```sh
curl -X GET http://website_url_or_ip/api/emails/{id}  -H  "Authorization: Bearer your_jwt_token"

```

  

### Create Email
-  **URL:**  `http://website_url_or_ip/api/emails`
-  **Method:**  `POST`
-  **Headers:**
-  **Authorization:** ` Bearer your_jwt_token`
-  `Content-Type: application/json`
-  **Body:**
```json
{
"affiliate_id": 0123,
"envelope": "sample",
"from": "mailfrom@dom.com",
"subject": "Test Subject",
"dkim": "dkim-sample",
"SPF": "SPF-sample",
"spam_score": 0.0,
"email": "<html><body><p>This is a <strong>test email</strong> content for <u>parsing</u>.</p></body></html>",
"sender_ip": "192.168.1.1",
"to": "mailto@dom.com",
"timestamp": 1622551123
}
```

-  **cURL Command:**
```sh
curl -X POST http://website_url_or_ip/api/emails -H "Authorization: Bearer your_jwt_token" -H "Content-Type: application/json" -d '{
"affiliate_id": 0123,
"envelope": "sample",
"from": "mailfrom@dom.com",
"subject": "Test Subject",
"dkim": "dkim-sample",
"SPF": "SPF-sample",
"spam_score": 0.0,
"email": "<html><body><p>This is a <strong>test email</strong> content for <u>parsing</u>.</p></body></html>",
"sender_ip": "192.168.1.1",
"to": "mailto@dom.com",
"timestamp": 1622551123
}'
```

### Update Email
-  **URL:**  `http://website_url_or_ip/api/emails/{id}`
-  **Method:**  `PUT`
-  **Headers:**
-  **Authorization:** ` Bearer your_jwt_token`
-  `Content-Type: application/json`
-  **Body:**
```json
{
"subject": "Updated Subject",
"email": "<html><body><p>Updated email content.</p></body></html>"
}
```

-  **cURL Command:**
```sh
curl -X PUT http://website_url_or_ip/api/emails/{id}  -H  "Authorization: Bearer your_jwt_token"  -H  "Content-Type: application/json"  -d  '{
"subject": "Updated Subject",
"email": "<html><body><p>Updated email content.</p></body></html>"
}'
```

### Delete Email
-  **URL:**  `http://website_url_or_ip/api/emails/{id}`
-  **Method:**  `DELETE`
-  **Headers:**
-  **Authorization:** ` Bearer your_jwt_token`

-  **cURL Command:**
```sh
curl -X DELETE http://website_url_or_ip/api/emails/{id}  -H  "Authorization: Bearer your_jwt_token"
```

## Command for Parsing Emails

This command runs every hour to parse emails and store the plain text content in the database.

-  **Command:**

```sh
php artisan emails:parse
```