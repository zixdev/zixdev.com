---
title: API Reference

language_tabs:
- bash
- javascript


includes:

search: true

toc_footers:
- <a href='http://zixdev.com'>Documentation Powered by Zix Development</a>
---
<!-- START_INFO -->
# Info

Welcome to the generated API reference.
[Get Postman Collection](http://localhost/documentation/collection.json)
<!-- END_INFO -->

#Authentication
<!-- START_c3fa189a6c95ca36ad6ac4791a873d23 -->
## Login user.

###1) when first submit the form
- If the class is using the Throttles Login trait, we can automatically throttle
- the login attempts for this application. We'll key this by the username and
- the IP address of the client making these requests into this application.

###2) Send the response after the user was authenticated.
- Create new token for the user with the User-Agent (browser type)
- Return response with the user token and him details.

###3) Send the response after the user was unauthenticated.
- If the login attempt was unsuccessful we will increment the number of attempts
- to login and redirect the user back to the login form. Of course, when this
- user surpasses their maximum number of attempts they will get locked out.

> Example request:

```bash
curl "http://localhost/api/login" \
-H "Accept: application/json" \
    -d "email"="uzieme@example.org" \
    -d "password"="rerum" \

```

```javascript
// Angular 2
let data = {
        "email": "uzieme@example.org",
        "password": "rerum"
};

this.apiServie.post("api/login", data)
    .subscribe(
        response => {
            console.info(response.json());
        },

        error => {
            console.warn(error);
        }
    );

```



### HTTP Request
`POST api/login`

#### Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    email | email |  required  | 
    password | string |  required  | 

<!-- END_c3fa189a6c95ca36ad6ac4791a873d23 -->
<!-- START_d7b7952e7fdddc07c978c9bdaf757acf -->
## Register new user.

When the submit a register form we will be creating new account for him,
also we will be sending to him and email with link to activate him account.

> Example request:

```bash
curl "http://localhost/api/register" \
-H "Accept: application/json" \
    -d "username"="et" \
    -d "email"="milo77@example.org" \
    -d "password"="et" \
    -d "accept_terms"="1" \

```

```javascript
// Angular 2
let data = {
        "username": "et",
        "email": "milo77@example.org",
        "password": "et",
        "accept_terms": true
};

this.apiServie.post("api/register", data)
    .subscribe(
        response => {
            console.info(response.json());
        },

        error => {
            console.warn(error);
        }
    );

```



### HTTP Request
`POST api/register`

#### Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    username | string |  required  | Maximum: `255` Minimum: `3`
    email | email |  required  | Maximum: `255` Minimum: `3`
    password | string |  required  | Maximum: `255` Minimum: `6`
    accept_terms | boolean |  required  | 

<!-- END_d7b7952e7fdddc07c978c9bdaf757acf -->
<!-- START_78c4b7d6388c81c68bc37ec872d44f65 -->
## Send Reset Password Email.

###1) Send reset password link:
- We will send the password reset link to this user.
- Once we have attempted to send the link.
- we will examine the response then see the message we need to show to the user.
- Finally, we'll send out a proper response.

###2) In case error and the email not found :
- If an error was returned by the password broker
- We will get this message translated so we can notify a user of the problem.
- We'll we'll send out and error message.

> Example request:

```bash
curl "http://localhost/api/forgot-password" \
-H "Accept: application/json" \
    -d "email"="cordell06@example.net" \

```

```javascript
// Angular 2
let data = {
        "email": "cordell06@example.net"
};

this.apiServie.post("api/forgot-password", data)
    .subscribe(
        response => {
            console.info(response.json());
        },

        error => {
            console.warn(error);
        }
    );

```



### HTTP Request
`POST api/forgot-password`

#### Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    email | email |  required  | 

<!-- END_78c4b7d6388c81c68bc37ec872d44f65 -->
<!-- START_6d3061d375666b8cf6babe163b36f250 -->
## Reset User Password.

###1) resetting user password:
- Here we will attempt to reset the user's password.
- If it is successful we will update the password on an actual user model and persist it to the database.
- Otherwise we will parse the error and return the response.


###2) return success if the password been reset.
- If the password was successfully reset, we return success response message.
- Clean user tokens (to not allow other applications to log in with the old tokens).
- Create new token for the user and log him in
- Return response with the user token and him details.

> Example request:

```bash
curl "http://localhost/api/reset-password" \
-H "Accept: application/json" \
    -d "email"="maximillia06@example.com" \
    -d "password"="provident" \

```

```javascript
// Angular 2
let data = {
        "email": "maximillia06@example.com",
        "password": "provident"
};

this.apiServie.post("api/reset-password", data)
    .subscribe(
        response => {
            console.info(response.json());
        },

        error => {
            console.warn(error);
        }
    );

```



### HTTP Request
`POST api/reset-password`

#### Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    email | email |  required  | 
    password | string |  required  | Maximum: `255` Minimum: `6`

<!-- END_6d3061d375666b8cf6babe163b36f250 -->
<!-- START_7e6ee60aafd6de54298e0e276a7451fe -->
## Logout User.

When User Logout We Will Log him out and destroy the token.

> Example request:

```bash
curl "http://localhost/api/logout" \
-H "Accept: application/json"
```

```javascript
// Angular 2

this.apiServie.get("api/logout", data)
    .subscribe(
        response => {
            console.info(response.json());
        },

        error => {
            console.warn(error);
        }
    );

```

> Example response:

```json
{
    "data": 0,
    "status_code": 200
}
```


### HTTP Request
`GET api/logout`

`HEAD api/logout`


<!-- END_7e6ee60aafd6de54298e0e276a7451fe -->
<!-- START_8d78d43a0817865525e3740dbf866578 -->
## Activate User&#039;s account.

> Example request:

```bash
curl "http://localhost/api/user/account/activate" \
-H "Accept: application/json" \
    -d "active_code"="vero" \

```

```javascript
// Angular 2
let data = {
        "active_code": "vero"
};

this.apiServie.post("api/user/account/activate", data)
    .subscribe(
        response => {
            console.info(response.json());
        },

        error => {
            console.warn(error);
        }
    );

```



### HTTP Request
`POST api/user/account/activate`

#### Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    active_code | string |  required  | Minimum: `60` Maximum: `60`

<!-- END_8d78d43a0817865525e3740dbf866578 -->
#Authenticated User
<!-- START_2ea88ff35aa222f5582e50f39a2b35fd -->
## Display a listing of the resource.

> Example request:

```bash
curl "http://localhost/api/user" \
-H "Accept: application/json"
```

```javascript
// Angular 2

this.apiServie.get("api/user", data)
    .subscribe(
        response => {
            console.info(response.json());
        },

        error => {
            console.warn(error);
        }
    );

```

> Example response:

```json
{
    "data": {
        "user": {
            "id": 1,
            "username": "admin@admin.com",
            "email": "admin@admin.com",
            "active": 1,
            "active_code": null,
            "created_at": "2016-09-18 15:00:03",
            "updated_at": "2016-09-22 15:22:31"
        }
    },
    "status_code": 200
}
```


### HTTP Request
`GET api/user`

`HEAD api/user`


<!-- END_2ea88ff35aa222f5582e50f39a2b35fd -->
<!-- START_f0654d3f2fc63c11f5723f233cc53c83 -->
## Update the specified resource in storage.

> Example request:

```bash
curl "http://localhost/api/user" \
-H "Accept: application/json" \
    -d "username"="unde" \
    -d "email"="felipa52@example.org" \

```

```javascript
// Angular 2
let data = {
        "username": "unde",
        "email": "felipa52@example.org"
};

this.apiServie.post("api/user", data)
    .subscribe(
        response => {
            console.info(response.json());
        },

        error => {
            console.warn(error);
        }
    );

```



### HTTP Request
`POST api/user`

#### Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    username | string |  required  | Maximum: `255` Minimum: `3`
    email | email |  required  | Maximum: `255` Minimum: `3`

<!-- END_f0654d3f2fc63c11f5723f233cc53c83 -->
<!-- START_e24fea9a36c83d9f84bd323b6b9d94db -->
## Display a listing of the resource.

> Example request:

```bash
curl "http://localhost/api/user/info" \
-H "Accept: application/json"
```

```javascript
// Angular 2

this.apiServie.get("api/user/info", data)
    .subscribe(
        response => {
            console.info(response.json());
        },

        error => {
            console.warn(error);
        }
    );

```

> Example response:

```json
{
    "data": {
        "user": {
            "id": 1,
            "username": "admin@admin.com",
            "email": "admin@admin.com",
            "active": 1,
            "active_code": null,
            "created_at": "2016-09-18 15:00:03",
            "updated_at": "2016-09-22 15:22:31",
            "info": {
                "id": 1,
                "user_id": 1,
                "first_name": null,
                "last_name": null,
                "phone_number": null,
                "mobile_number": null,
                "address_line_1": null,
                "address_line_2": null,
                "subrub": null,
                "post_code": null,
                "state": null,
                "country": null,
                "created_at": "2016-09-22 15:13:02",
                "updated_at": "2016-09-22 15:13:02"
            }
        }
    },
    "status_code": 200
}
```


### HTTP Request
`GET api/user/info`

`HEAD api/user/info`


<!-- END_e24fea9a36c83d9f84bd323b6b9d94db -->
<!-- START_1cf9d677dadd7b751523d1b871857f9c -->
## Update the specified resource in storage.

> Example request:

```bash
curl "http://localhost/api/user/info" \
-H "Accept: application/json" \
    -d "first_name"="et" \
    -d "last_name"="et" \
    -d "phone_number"="et" \
    -d "mobile_number"="et" \
    -d "address_line_1"="et" \
    -d "address_line_2"="et" \
    -d "subrub"="et" \
    -d "post_code"="et" \
    -d "state"="et" \
    -d "country"="et" \

```

```javascript
// Angular 2
let data = {
        "first_name": "et",
        "last_name": "et",
        "phone_number": "et",
        "mobile_number": "et",
        "address_line_1": "et",
        "address_line_2": "et",
        "subrub": "et",
        "post_code": "et",
        "state": "et",
        "country": "et"
};

this.apiServie.post("api/user/info", data)
    .subscribe(
        response => {
            console.info(response.json());
        },

        error => {
            console.warn(error);
        }
    );

```



### HTTP Request
`POST api/user/info`

#### Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    first_name | string |  optional  | Minimum: `3` Maximum: `255`
    last_name | string |  optional  | Minimum: `3` Maximum: `255`
    phone_number | string |  optional  | Minimum: `3` Maximum: `255`
    mobile_number | string |  optional  | Minimum: `3` Maximum: `255`
    address_line_1 | string |  optional  | Minimum: `3` Maximum: `255`
    address_line_2 | string |  optional  | Minimum: `3` Maximum: `255`
    subrub | string |  optional  | Minimum: `3` Maximum: `255`
    post_code | string |  optional  | Minimum: `3` Maximum: `255`
    state | string |  optional  | Minimum: `3` Maximum: `255`
    country | string |  optional  | Minimum: `3` Maximum: `255`

<!-- END_1cf9d677dadd7b751523d1b871857f9c -->
