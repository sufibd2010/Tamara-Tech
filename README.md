# How To Run The Project

### 1. Clone the repository
```
git clone
```

### 2. Import the sql to the database in phpmyadmin
```
test-db.sql
```

### 3. Run the project
```
php artisan serve
```

# How To Use The Project

### Call the API

There is a field where it will take user_id as input and will return the user's information from the database. Three tables (Users, Bio, Location) are interconnected with each other. So, the API will return the information from all the tables.

# API Documentation

`{{base_url}}` is the base URL of the API. For example, if the API is hosted at `http://localhost:8000`, then the base URL is `http://localhost:8000`.

### Get User Information

Returns the user's information from the database. The response is paginated. The default page size is 10. To retrieve a specific page, add the `page` parameter to the URL. For example, to retrieve the second page, use `http://{{base_url}}/api/v1/user?user_id=1&page=2`. To change the page size, add the `per_page` parameter to the URL. For example, to retrieve 20 posts per page, use `http://{{base_url}}/api/v1/user?user_id=1&per_page=20`.

**URL** : `/api/v1/user`

**Method** : `GET`

**Auth required** : NO

**Permissions required** : None

**Data constraints**

Provide user_id to get the user's information.

```json
{
    "user_id": "[integer]"
}
```

**Data example**

```json
{
    "user_id": "1"
}
```

## Success Response

**Code** : `200 OK`

**Content example**

```json
{
    "status": "success",
    "message": "User information retrieved successfully",
    "data": {
        "id": 1,
        "name": "John Doe",
        "email": "
        "bio": {
            "id": 1,
            "user_id": 1,
            "bio": "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla euismod, nisl eget ultricies aliquam, quam nisl aliquet nunc, vitae aliquam nisl nisl eu nunc. Nulla
        },
        "location": {
            "id": 1,
            "user_id": 1,
            "address": "Dhaka, Bangladesh",
            "latitude": "23.8103",
            "longitude": "90.4125"
        }
    }
}
```

## Error Responses

**Condition** : If 'user_id' is not provided.

**Code** : `400 BAD REQUEST`

**Content** :

```json
{
    "status": "error",
    "message": "User ID is required"
}
```

**Condition** : If 'user_id' is not found in the database.

**Code** : `404 NOT FOUND`

**Content** :

```json
{
    "status": "error",
    "message": "User not found"
}
```

**Condition** : If the user's information is not found in the database.

**Code** : `404 NOT FOUND`

**Content** :

```json
{
    "status": "error",
    "message": "User information not found"
}
```

### Same goes to other API Endpoints (Bio and Location) With Different HTTP Methods And Status Codes

## Notes

### Regarding Security Considerations

-   The API is not protected by any authentication mechanism. Anyone can call the API and get the user's information. To protect the API, we can use Laravel Sanctum or Laravel Passport.

-   The API is not protected by any rate limiting mechanism. Anyone can call the API as many times as they want. To protect the API, we can use Laravel Throttle.

-   The API is not protected by any CORS mechanism. Anyone can call the API from any domain. To protect the API, we can use Laravel CORS.

### Regarding Database Design

- The database should be indexed properly to improve the performance of the API. For example, the 'user_id' column of the 'users' table should be indexed. 

- The 'user_id' column of the 'bio' table should be indexed.

- The 'user_id' column of the 'location' table should be indexed.

### Regarding API Design

- The API should be versioned. For example, the current API is version 1. So, the URL is `http://{{base_url}}/api/v1/user`. If we want to change the API in the future, we can create a new version of the API. For example, the new version of the API is version 2. So, the URL is `http://{{base_url}}/api/v2/user`.

### Regarding Validation and Error Handling

- The API should be validated properly. For example, the 'user_id' field should be validated to check if it is an integer or not.

- The API should be handled properly. For example, if the 'user_id' field is not provided, the API should return a 400 Bad Request error.

### Regarding Testing

- The API should be tested properly. For example, the API should be tested with different types of data. For example, the 'user_id' field should be tested with an integer, a string, a negative number, a floating-point number, etc.

- The API should be tested with different types of HTTP methods. For example, the API should be tested with the GET, POST, PUT, PATCH, and DELETE methods.

- The API should be tested with different types of HTTP status codes. For example, the API should be tested with the 200, 201, 400, 401, 403, 404, 405, 422, and 500 status codes.

- The functions of the API should be tested. For example, the API should be tested to check if the user's information is retrieved from the database or not.

- The API should be tested with different types of data. For example, the API should be tested with a valid user ID, an invalid user ID, a user ID that does not exist in the database, etc.

### Regarding Code Structure

- The code should be structured properly. For example, the code should be divided into different files and folders. For example, the code should be divided into controllers, models, routes, etc.

- The code should be documented properly. For example, the code should be documented with comments.

- The code should be formatted properly. For example, the code should be formatted with PSR-2.

- The code should be tested properly. For example, the code should be tested with PHPUnit.

### Regarding Architecture

- The API should be designed properly. For example, the API should be designed with the MVC architecture.

- Repository pattern should be used to separate the business logic from the database logic.

- Dependency injection should be used to inject the dependencies into the classes.

- The API should be designed with the SOLID, DRY, KISS principles.






