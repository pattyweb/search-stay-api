## Bookstore API Documentation

Welcome to the documentation for the Bookstore API. This API provides endpoints for managing books and stores, as well as user authentication features.

### Getting Started with Docker Installation Using Sail

To get started with using the Bookstore API using Docker and Laravel Sail, follow the steps below:

1. Clone this repository to your local machine:

```bash
git clone https://github.com/pattyweb/search-stay-api.git
```

2. Navigate to the project directory:

```bash
cd search-stay-api
```

3. Copy the example environment file and configure it with your database settings:

```bash
cp .env.example .env
```

4. Install Composer and Laravel Sail:

```bash
composer install && ./vendor/bin/sail install
```

5. Start the development environment:

```bash
./vendor/bin/sail up -d
```

6. Generate the application key:

```bash
./vendor/bin/sail artisan key:generate
```

7. .env config:

```bash
DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=sail
DB_PASSWORD=password
```

8. The API should now be accessible at `http://localhost`. You can make requests to the API using tools like Postman or Insomnia.

---

## API Endpoints

### Books

- **GET /api/books**: Get all books.
- **POST /api/books**: Create a new book.
- **GET /api/books/{id}**: Get a specific book by ID.
- **PUT /api/books/{id}**: Update a book by ID.
- **DELETE /api/books/{id}**: Delete a book by ID.

### Stores

- **GET /api/stores**: Get all stores.
- **POST /api/stores**: Create a new store.
- **GET /api/stores/{id}**: Get a specific store by ID.
- **PUT /api/stores/{id}**: Update a store by ID.
- **DELETE /api/stores/{id}**: Delete a store by ID.

Here's an example usage for each of the endpoints:

### Books

- **GET /api/books**: Get all books.
  - Example:
    ```bash
    curl http://localhost/api/books
    ```

- **POST /api/books**: Create a new book.
  - Example:
    ```bash
    curl -X POST -H "Content-Type: application/json" -d '{"name":"Book Title", "isbn":"1234567890", "value":19.99}' http://localhost/api/books
    ```

- **GET /api/books/{id}**: Get a specific book by ID.
  - Example:
    ```bash
    curl http://localhost/api/books/1
    ```

- **PUT /api/books/{id}**: Update a book by ID.
  - Example:
    ```bash
    curl -X PUT -H "Content-Type: application/json" -d '{"name":"Updated Book Title"}' http://localhost/api/books/1
    ```

- **DELETE /api/books/{id}**: Delete a book by ID.
  - Example:
    ```bash
    curl -X DELETE http://localhost/api/books/1
    ```

### Stores

- **GET /api/stores**: Get all stores.
  - Example:
    ```bash
    curl http://localhost/api/stores
    ```

- **POST /api/stores**: Create a new store.
  - Example:
    ```bash
    curl -X POST -H "Content-Type: application/json" -d '{"name":"Bookstore Name", "address":"123 Main St", "active":true}' http://localhost/api/stores
    ```

- **GET /api/stores/{id}**: Get a specific store by ID.
  - Example:
    ```bash
    curl http://localhost/api/stores/1
    ```

- **PUT /api/stores/{id}**: Update a store by ID.
  - Example:
    ```bash
    curl -X PUT -H "Content-Type: application/json" -d '{"name":"Updated Bookstore Name"}' http://localhost/api/stores/1
    ```

- **DELETE /api/stores/{id}**: Delete a store by ID.
  - Example:
    ```bash
    curl -X DELETE http://localhost/api/stores/1
    ```

These examples assume that you are running the API locally on your machine. Replace `http://localhost` with the appropriate URL if your API is hosted elsewhere. Additionally, make sure to replace the sample data (e.g., book titles, store names, IDs) with actual data when making requests.

### Authentication

- **POST /api/register**: Register a new user.
- Example:
    ```bash
    curl -X POST -H "Content-Type: application/json" -d '{"name":"John Doe", "email":"doe@email.com", "password":"password", "password_confirmation":"password"}' http://localhost/api/register
    ```
    
- **POST /api/login**: Login with email and password to obtain an access token.
- Example:
    ```bash
    curl -X POST -H "Content-Type: application/json" -d '{"email":"doe@email.com", "password":"password"}' http://localhost/api/login
    ```

### User Management

- **GET /api/user**: Get the authenticated user's details.

## Authentication

The Bookstore API uses Laravel Sanctum for API authentication. To access endpoints that require authentication, include the `Authorization` header with the value `Bearer <access_token>` in your requests, where `<access_token>` is the token obtained after logging in.

---

## Implement Book-Store Relationship

The Bookstore API supports a many-to-many relationship between books and stores. This means that a book can be associated with multiple stores, and a store can carry multiple books.

### How to Use the Relationship

To associate a book with one or more stores, or to associate a store with one or more books, you can use the following endpoints:

- **Attach a Book to a Store**: `POST /api/stores/{store_id}/books/{book_id}/attach`
  - This endpoint attaches the specified book to the specified store.

- **Detach a Book from a Store**: `POST /api/stores/{store_id}/books/{book_id}/detach`
  - This endpoint detaches the specified book from the specified store.

- **Attach a Store to a Book**: `POST /api/books/{book_id}/stores/{store_id}/attach`
  - This endpoint attaches the specified store to the specified book.

- **Detach a Store from a Book**: `POST /api/books/{book_id}/stores/{store_id}/detach`
  - This endpoint detaches the specified store from the specified book.

### Example Usage

1. To attach a book with ID 1 to a store with ID 2:
   ```bash
   POST /api/stores/2/books/1/attach
   ```

2. To detach a book with ID 1 from a store with ID 2:
   ```bash
   POST /api/stores/2/books/1/detach
   ```

3. To attach a store with ID 2 to a book with ID 1:
   ```bash
   POST /api/books/1/stores/2/attach
   ```

4. To detach a store with ID 2 from a book with ID 1:
   ```bash
   POST /api/books/1/stores/2/detach
   ```

### Note

Make sure to replace `{store_id}` and `{book_id}` with the actual IDs of the store and book you want to associate or disassociate.


## Testing

You can test the API endpoints using tools like Postman or Insomnia. Refer to the API endpoints section above for details on each endpoint and their respective HTTP methods.

---

This API was built using Laravel version 10 with MySQL and Docker.

---

<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[WebReinvent](https://webreinvent.com/)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Jump24](https://jump24.co.uk)**
- **[Redberry](https://redberry.international/laravel/)**
- **[Active Logic](https://activelogic.com)**
- **[byte5](https://byte5.de)**
- **[OP.GG](https://op.gg)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
