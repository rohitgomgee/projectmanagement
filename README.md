# Project Management API

This is a Laravel-based API for managing projects, timesheets, and dynamic attributes using the Entity-Attribute-Value (EAV) system. It also includes authentication with Laravel Passport.

## Features
- **User Authentication** with Laravel Passport
- **Projects Management** with dynamic attributes
- **Timesheets Management** for task tracking
- **EAV System** for dynamic project attributes
- **CRUD Operations** for all resources

## Installation

Follow these steps to get your Laravel project up and running.

### 1. Clone the Repository

```bash
git clone https://github.com/your-username/project-management-api.git
cd project-management-api
```
### 2 Install Dependencies
Run the following command to install the project dependencies:

```bash
composer install
```
### 3 Set Up Environment File
Copy the .env.example file to .env:

```bash
cp .env.example .env
```
### 4 Generate App Key
Run the following command to generate the app key:

```bash
php artisan key:generate
```
### 5 Set Up Database
Configure your .env file to connect to your database. Ensure that you have created a database.
Run the migrations to set up the database:

```bash
php artisan migrate
```

### 6 Install Passport
Generate encryption keys for Passport:

```bash
php artisan passport:install
```
### 7 Seed Database
If you'd like to seed the database with some dummy data, run the following command:

```bash
php artisan db:seed
```
### 8 Start the Development Server
You can start the development server using:

```bash
php artisan serve
```
The API will be available at http://localhost:8000.

## Authentication
This API uses Laravel Passport for authentication. You can register, login, and logout using the following endpoints:

- POST /api/register - Register a new user
- POST /api/login - Login and get an access token
- POST /api/logout - Logout and invalidate the access token

## Endpoints

### Projects

- GET /api/projects - Get a list of all projects
- GET /api/projects/{id} - Get a specific project
- POST /api/projects - Create a new project
- PUT /api/projects/{id} - Update a project
- DELETE /api/projects/{id} - Delete a project

### Timesheets

- GET /api/timesheets - Get a list of all timesheets
- GET /api/timesheets/{id} - Get a specific timesheet
- POST /api/timesheets - Create a new timesheet
- PUT /api/timesheets/{id} - Update a timesheet
- DELETE /api/timesheets/{id} - Delete a timesheet

### Attributes

- GET /api/attributes - Get a list of all attributes
- GET /api/attributes/{id} - Get a specific attribute
- POST /api/attributes - Create a new attribute
- PUT /api/attributes/{id} - Update an attribute
- DELETE /api/attributes/{id} - Delete an attribute

## Postman Collection

A Postman collection is included in the repository for easy testing of the API. You can find the collection in the root folder as postman_collection.

### Import the Collection

- Open Postman.
- Click on "Import" in the top left corner.
- Select "File" and choose the postman_collection.json file.
- Click "Import."
- Now you can use the collection to test all the endpoints.