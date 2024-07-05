# Library Management System API

## Overview

- This API allows users to manage authors and books in a library system.
- Includes endpoints for user registration, authentication, and CRUD operations for authors and books.
- Built using Laravel and follows the repository interface design pattern.

## Setup Instructions

1. Clone the repository.
   - `git clone <https://github.com/faroqbright/Book_auther_api>`
   - `cd <Book_auther_api>`
2. Install dependencies.
   - `composer install`
3. Set up the environment variables.
   - `cp .env.example .env`
   - `php artisan key:generate`
4. Configure the database in the `.env` file.
   - `DB_CONNECTION=mysql`
   - `DB_HOST=127.0.0.1`
   - `DB_PORT=3306`
   - `DB_DATABASE=your_database`
   - `DB_USERNAME=your_username`
   - `DB_PASSWORD=your_password`
5. Run migrations.
   - `php artisan migrate`
6. Run the application.
   - `php artisan serve`

## API Endpoints

### Authentication

- **Register**
  - **URL:** `/api/register`
  - **Method:** `POST`
  - **Request Parameters:**
    - `name` (string, required)
    - `email` (string, required, unique)
    - `password` (string, required, min: 8)
  - **Response:**
    - Status: success
    - Message: User registered successfully
    - User details
    - Token

- **Login**
  - **URL:** `/api/login`
  - **Method:** `POST`
  - **Request Parameters:**
    - `email` (string, required)
    - `password` (string, required, min: 8)
  - **Response:**
    - Status: success
    - Message: Login successful
    - User details
    - Token

- **Logout**
  - **URL:** `/api/logout`
  - **Method:** `POST`
  - **Headers:**
    - `Authorization: Bearer {token}`
  - **Response:**
    - Status: success
    - Message: Successfully logged out

### Authors

- **Get All Authors**
  - **URL:** `/api/authors`
  - **Method:** `GET`
  - **Headers:**
    - `Authorization: Bearer {token}`
  - **Response:**
    - Status: success
    - Message: Authors retrieved successfully
    - Authors data

- **Get Author by ID**
  - **URL:** `/api/authors/{id}`
  - **Method:** `GET`
  - **Headers:**
    - `Authorization: Bearer {token}`
  - **Response:**
    - Status: success
    - Message: Author retrieved successfully
    - Author data

- **Create Author**
  - **URL:** `/api/authors`
  - **Method:** `POST`
  - **Headers:**
    - `Authorization: Bearer {token}`
  - **Request Parameters:**
    - `name` (string, required)
  - **Response:**
    - Status: success
    - Message: Author created successfully
    - Author data

- **Update Author**
  - **URL:** `/api/authors/{id}`
  - **Method:** `POST`
  - **Headers:**
    - `Authorization: Bearer {token}`
  - **Request Parameters:**
    - `name` (string, optional)
  - **Response:**
    - Status: success
    - Message: Author updated successfully
    - Author data

- **Delete Author**
  - **URL:** `/api/authors/{id}`
  - **Method:** `DELETE`
  - **Headers:**
    - `Authorization: Bearer {token}`
  - **Response:**
    - Status: success
    - Message: Author deleted successfully

### Books

- **Get All Books**
  - **URL:** `/api/books`
  - **Method:** `GET`
  - **Headers:**
    - `Authorization: Bearer {token}`
  - **Response:**
    - Status: success
    - Message: Books retrieved successfully
    - Books data

- **Get Book by ID**
  - **URL:** `/api/books/{id}`
  - **Method:** `GET`
  - **Headers:**
    - `Authorization: Bearer {token}`
  - **Response:**
    - Status: success
    - Message: Book retrieved successfully
    - Book data

- **Create Book**
  - **URL:** `/api/books`
  - **Method:** `POST`
  - **Headers:**
    - `Authorization: Bearer {token}`
  - **Request Parameters:**
    - `title` (string, required)
    - `author_id` (integer, required, exists:authors,id)
  - **Response:**
    - Status: success
    - Message: Book created successfully
    - Book data

- **Update Book**
  - **URL:** `/api/books/{id}`
  - **Method:** `POST`
  - **Headers:**
    - `Authorization: Bearer {token}`
  - **Request Parameters:**
    - `title` (string, optional)
    - `author_id` (integer, required, exists:authors,id)
  - **Response:**
    - Status: success
    - Message: Book updated successfully
    - Book data

- **Delete Book**
  - **URL:** `/api/books/{id}`
  - **Method:** `DELETE`
  - **Headers:**
    - `Authorization: Bearer {token}`
  - **Response:**
    - Status: success
    - Message: Book deleted successfully

## Conclusion

- This API provides comprehensive endpoints to manage authors and books in a library system.
- Ensure to include the Authorization header with the Bearer token for protected routes.
