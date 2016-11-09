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
<!-- START_c3fa189a6c95ca36ad6ac4791a873d23 -->
## Login user.

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
#Authenticated User
<!-- START_da5727be600e4865c1b632f7745c8e91 -->
## api/users

> Example request:

```bash
curl "http://localhost/api/users" \
-H "Accept: application/json"
```

```javascript
// Angular 2

this.apiServie.get("api/users", data)
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
    "data": [
        {
            "id": 1,
            "username": "chraider v2",
            "email": "badi1wow@gmail.com",
            "email_active": 1,
            "created_at": "2016-10-30 13:40:30",
            "updated_at": "2016-11-04 10:53:27",
            "deleted_at": null
        },
        {
            "id": 2,
            "username": "badi",
            "email": "chraider1badi@gmail.com",
            "email_active": 0,
            "created_at": "2016-11-04 09:32:33",
            "updated_at": "2016-11-05 09:17:21",
            "deleted_at": null
        }
    ],
    "status_code": 200
}
```


### HTTP Request
`GET api/users`

`HEAD api/users`


<!-- END_da5727be600e4865c1b632f7745c8e91 -->
<!-- START_12e37982cc5398c7100e59625ebb5514 -->
## api/users

> Example request:

```bash
curl "http://localhost/api/users" \
-H "Accept: application/json" \
    -d "username"="ut" \
    -d "email"="nakia.mcclure@example.org" \
    -d "password"="ut" \
    -d "accept_terms"="1" \

```

```javascript
// Angular 2
let data = {
        "username": "ut",
        "email": "nakia.mcclure@example.org",
        "password": "ut",
        "accept_terms": true
};

this.apiServie.post("api/users", data)
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
`POST api/users`

#### Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    username | string |  required  | Maximum: `255` Minimum: `3`
    email | email |  required  | Maximum: `255` Minimum: `3`
    password | string |  required  | Maximum: `255` Minimum: `6`
    accept_terms | boolean |  required  | 

<!-- END_12e37982cc5398c7100e59625ebb5514 -->
<!-- START_8f99b42746e451f8dc43742e118cb47b -->
## Get Site By Id.

> Example request:

```bash
curl "http://localhost/api/users/{user}" \
-H "Accept: application/json"
```

```javascript
// Angular 2

this.apiServie.get("api/users/{user}", data)
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
null
```


### HTTP Request
`GET api/users/{user}`

`HEAD api/users/{user}`


<!-- END_8f99b42746e451f8dc43742e118cb47b -->
<!-- START_48a3115be98493a3c866eb0e23347262 -->
## api/users/{user}

> Example request:

```bash
curl "http://localhost/api/users/{user}" \
-H "Accept: application/json" \
    -d "username"="cum" \
    -d "email"="ole99@example.net" \

```

```javascript
// Angular 2
let data = {
        "username": "cum",
        "email": "ole99@example.net"
};

this.apiServie.put("api/users/{user}", data)
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
`PUT api/users/{user}`

`PATCH api/users/{user}`

#### Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    username | string |  required  | Maximum: `255` Minimum: `3`
    email | email |  required  | Maximum: `255` Minimum: `3`

<!-- END_48a3115be98493a3c866eb0e23347262 -->
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
            "username": "chraider v2",
            "email": "badi1wow@gmail.com",
            "email_active": 1,
            "created_at": "2016-10-30 13:40:30",
            "updated_at": "2016-11-04 10:53:27",
            "deleted_at": null
        },
        "permissions": [
            "full_access",
            "view_admin"
        ]
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
            "username": "chraider v2",
            "email": "badi1wow@gmail.com",
            "email_active": 1,
            "created_at": "2016-10-30 13:40:30",
            "updated_at": "2016-11-04 10:53:27",
            "deleted_at": null,
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
                "created_at": "2016-11-06 11:41:00",
                "updated_at": "2016-11-06 11:41:00",
                "deleted_at": null
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
#general
<!-- START_5900363c9d9cf8069f0abf41866a659f -->
## Store a newly created resource in storage.

> Example request:

```bash
curl "http://localhost/api/media" \
-H "Accept: application/json"
```

```javascript
// Angular 2

this.apiServie.post("api/media", data)
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
`POST api/media`


<!-- END_5900363c9d9cf8069f0abf41866a659f -->
<!-- START_c44904d8eb741cc708c2d88a56a69927 -->
## Display a listing of the resource.

> Example request:

```bash
curl "http://localhost/api/pages" \
-H "Accept: application/json"
```

```javascript
// Angular 2

this.apiServie.get("api/pages", data)
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
    "data": [
        {
            "id": 2,
            "title": "About us",
            "slug": "about-us",
            "content": "<p>haw hw<\/p>\n<p>&nbsp;<\/p>",
            "status": 1,
            "created_at": "2016-11-04 15:14:25",
            "updated_at": "2016-11-05 09:13:57",
            "deleted_at": null
        },
        {
            "id": 3,
            "title": "Contact Us",
            "slug": "contact-us",
            "content": "<p>rzerzer<\/p>",
            "status": 1,
            "created_at": "2016-11-04 15:14:43",
            "updated_at": "2016-11-04 16:18:39",
            "deleted_at": null
        }
    ],
    "status_code": 200
}
```


### HTTP Request
`GET api/pages`

`HEAD api/pages`


<!-- END_c44904d8eb741cc708c2d88a56a69927 -->
<!-- START_7519e4dc6775220105645da4eb91a457 -->
## Show the form for creating a new resource.

> Example request:

```bash
curl "http://localhost/api/pages/create" \
-H "Accept: application/json"
```

```javascript
// Angular 2

this.apiServie.get("api/pages/create", data)
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
null
```


### HTTP Request
`GET api/pages/create`

`HEAD api/pages/create`


<!-- END_7519e4dc6775220105645da4eb91a457 -->
<!-- START_9db908f3cc041bad182795bc2a844789 -->
## Store a newly created resource in storage.

> Example request:

```bash
curl "http://localhost/api/pages" \
-H "Accept: application/json" \
    -d "title"="assumenda" \
    -d "slug"="assumenda" \
    -d "sites"="assumenda" \
    -d "content"="assumenda" \

```

```javascript
// Angular 2
let data = {
        "title": "assumenda",
        "slug": "assumenda",
        "sites": "assumenda",
        "content": "assumenda"
};

this.apiServie.post("api/pages", data)
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
`POST api/pages`

#### Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    title | string |  required  | Minimum: `3` Maximum: `255`
    slug | string |  required  | Minimum: `3` Maximum: `255`
    sites | string |  required  | 
    content | string |  required  | 

<!-- END_9db908f3cc041bad182795bc2a844789 -->
<!-- START_4019012e188986f89822c1f74dec9036 -->
## Display the specified resource.

> Example request:

```bash
curl "http://localhost/api/pages/{page}" \
-H "Accept: application/json"
```

```javascript
// Angular 2

this.apiServie.get("api/pages/{page}", data)
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
null
```


### HTTP Request
`GET api/pages/{page}`

`HEAD api/pages/{page}`


<!-- END_4019012e188986f89822c1f74dec9036 -->
<!-- START_8566933932ce5f8ff3a6c96664c48752 -->
## Show the form for editing the specified resource.

> Example request:

```bash
curl "http://localhost/api/pages/{page}/edit" \
-H "Accept: application/json"
```

```javascript
// Angular 2

this.apiServie.get("api/pages/{page}/edit", data)
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
null
```


### HTTP Request
`GET api/pages/{page}/edit`

`HEAD api/pages/{page}/edit`


<!-- END_8566933932ce5f8ff3a6c96664c48752 -->
<!-- START_3a520900c57f00a662864e51d25666f7 -->
## Update the specified resource in storage.

> Example request:

```bash
curl "http://localhost/api/pages/{page}" \
-H "Accept: application/json"
```

```javascript
// Angular 2

this.apiServie.put("api/pages/{page}", data)
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
`PUT api/pages/{page}`

`PATCH api/pages/{page}`


<!-- END_3a520900c57f00a662864e51d25666f7 -->
<!-- START_e2366ca631ebde337e0de1fb73461e8b -->
## Remove the specified resource from storage.

> Example request:

```bash
curl "http://localhost/api/pages/{page}" \
-H "Accept: application/json"
```

```javascript
// Angular 2

this.apiServie.delete("api/pages/{page}", data)
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
`DELETE api/pages/{page}`


<!-- END_e2366ca631ebde337e0de1fb73461e8b -->
<!-- START_e7bf23caf9c2a9cd4c40296cb830f376 -->
## Display a listing of the resource.

> Example request:

```bash
curl "http://localhost/api/sites/{id}/config" \
-H "Accept: application/json"
```

```javascript
// Angular 2

this.apiServie.get("api/sites/{id}/config", data)
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
null
```


### HTTP Request
`GET api/sites/{id}/config`

`HEAD api/sites/{id}/config`


<!-- END_e7bf23caf9c2a9cd4c40296cb830f376 -->
<!-- START_99c0968d1d72d2bae1086d4df1403250 -->
## Show the form for creating a new resource.

> Example request:

```bash
curl "http://localhost/api/sites/{id}/config/create" \
-H "Accept: application/json" \
    -d "key"="sequi" \
    -d "value"="sequi" \

```

```javascript
// Angular 2
let data = {
        "key": "sequi",
        "value": "sequi"
};

this.apiServie.get("api/sites/{id}/config/create", data)
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
    "key": [
        "The key field is required."
    ],
    "value": [
        "The value field is required."
    ]
}
```


### HTTP Request
`GET api/sites/{id}/config/create`

`HEAD api/sites/{id}/config/create`

#### Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    key | string |  required  | Minimum: `3` Maximum: `255`
    value | string |  required  | Minimum: `3` Maximum: `255`

<!-- END_99c0968d1d72d2bae1086d4df1403250 -->
<!-- START_8f6a297bf8d60f97310a0af655aa3803 -->
## Store a newly created resource in storage.

> Example request:

```bash
curl "http://localhost/api/sites/{id}/config" \
-H "Accept: application/json"
```

```javascript
// Angular 2

this.apiServie.post("api/sites/{id}/config", data)
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
`POST api/sites/{id}/config`


<!-- END_8f6a297bf8d60f97310a0af655aa3803 -->
<!-- START_93adf66113ee8536a5eb0ae3250846fb -->
## Display the specified resource.

> Example request:

```bash
curl "http://localhost/api/sites/{id}/config/{config}" \
-H "Accept: application/json"
```

```javascript
// Angular 2

this.apiServie.get("api/sites/{id}/config/{config}", data)
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
null
```


### HTTP Request
`GET api/sites/{id}/config/{config}`

`HEAD api/sites/{id}/config/{config}`


<!-- END_93adf66113ee8536a5eb0ae3250846fb -->
<!-- START_e31a0bd1d9afd6711719ba32461ffaff -->
## Show the form for editing the specified resource.

> Example request:

```bash
curl "http://localhost/api/sites/{id}/config/{config}/edit" \
-H "Accept: application/json"
```

```javascript
// Angular 2

this.apiServie.get("api/sites/{id}/config/{config}/edit", data)
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
null
```


### HTTP Request
`GET api/sites/{id}/config/{config}/edit`

`HEAD api/sites/{id}/config/{config}/edit`


<!-- END_e31a0bd1d9afd6711719ba32461ffaff -->
<!-- START_887bb5500670831acc17d0e49d7f7b7d -->
## Update the specified resource in storage.

> Example request:

```bash
curl "http://localhost/api/sites/{id}/config/{config}" \
-H "Accept: application/json"
```

```javascript
// Angular 2

this.apiServie.put("api/sites/{id}/config/{config}", data)
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
`PUT api/sites/{id}/config/{config}`

`PATCH api/sites/{id}/config/{config}`


<!-- END_887bb5500670831acc17d0e49d7f7b7d -->
<!-- START_8d18675aebdb1f5600fb0dbc0d5ef778 -->
## Remove the specified resource from storage.

> Example request:

```bash
curl "http://localhost/api/sites/{id}/config/{config}" \
-H "Accept: application/json"
```

```javascript
// Angular 2

this.apiServie.delete("api/sites/{id}/config/{config}", data)
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
`DELETE api/sites/{id}/config/{config}`


<!-- END_8d18675aebdb1f5600fb0dbc0d5ef778 -->
#Multi Site
<!-- START_6bde012eab6506f2b473003076ee19f4 -->
## Get All Sites.

> Example request:

```bash
curl "http://localhost/api/sites" \
-H "Accept: application/json"
```

```javascript
// Angular 2

this.apiServie.get("api/sites", data)
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
    "data": [],
    "status_code": 200
}
```


### HTTP Request
`GET api/sites`

`HEAD api/sites`


<!-- END_6bde012eab6506f2b473003076ee19f4 -->
<!-- START_0ebc8c1e23f5fffe2bde49996df7e6a8 -->
## Create New Site.

> Example request:

```bash
curl "http://localhost/api/sites" \
-H "Accept: application/json" \
    -d "name"="et" \
    -d "url"="http://hayes.com/facilis-sit-et-atque-nihil-similique-facilis.html" \
    -d "ui"="et" \

```

```javascript
// Angular 2
let data = {
        "name": "et",
        "url": "http:\/\/hayes.com\/facilis-sit-et-atque-nihil-similique-facilis.html",
        "ui": "et"
};

this.apiServie.post("api/sites", data)
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
`POST api/sites`

#### Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    name | string |  required  | Minimum: `3` Maximum: `255`
    url | url |  required  | Minimum: `3` Maximum: `255`
    ui | string |  required  | Minimum: `3` Maximum: `255`

<!-- END_0ebc8c1e23f5fffe2bde49996df7e6a8 -->
<!-- START_94c94fc597738cd4377b55266da9ff28 -->
## Get Site By Id.

> Example request:

```bash
curl "http://localhost/api/sites/{site}" \
-H "Accept: application/json"
```

```javascript
// Angular 2

this.apiServie.get("api/sites/{site}", data)
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
null
```


### HTTP Request
`GET api/sites/{site}`

`HEAD api/sites/{site}`


<!-- END_94c94fc597738cd4377b55266da9ff28 -->
<!-- START_773c9bdb2e712908dcb18a7159ba29ec -->
## Update Site.

> Example request:

```bash
curl "http://localhost/api/sites/{site}" \
-H "Accept: application/json" \
    -d "name"="dolores" \
    -d "url"="https://www.okuneva.org/voluptas-deleniti-ipsum-quos-nobis-non-laudantium-et" \
    -d "ui"="dolores" \

```

```javascript
// Angular 2
let data = {
        "name": "dolores",
        "url": "https:\/\/www.okuneva.org\/voluptas-deleniti-ipsum-quos-nobis-non-laudantium-et",
        "ui": "dolores"
};

this.apiServie.put("api/sites/{site}", data)
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
`PUT api/sites/{site}`

`PATCH api/sites/{site}`

#### Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    name | string |  required  | Minimum: `3` Maximum: `255`
    url | url |  required  | Minimum: `3` Maximum: `255`
    ui | string |  required  | Minimum: `3` Maximum: `255`

<!-- END_773c9bdb2e712908dcb18a7159ba29ec -->
#Site Versions
<!-- START_2769ec165c2297d6e49ced508170544d -->
## Get Site Versions.

> Example request:

```bash
curl "http://localhost/api/sites/{id}/ui" \
-H "Accept: application/json"
```

```javascript
// Angular 2

this.apiServie.get("api/sites/{id}/ui", data)
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
null
```


### HTTP Request
`GET api/sites/{id}/ui`

`HEAD api/sites/{id}/ui`


<!-- END_2769ec165c2297d6e49ced508170544d -->
<!-- START_1cb243aec0bde34505983c0c6aac4ca2 -->
## Show the form for creating a new resource.

> Example request:

```bash
curl "http://localhost/api/sites/{id}/ui/create" \
-H "Accept: application/json"
```

```javascript
// Angular 2

this.apiServie.get("api/sites/{id}/ui/create", data)
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
null
```


### HTTP Request
`GET api/sites/{id}/ui/create`

`HEAD api/sites/{id}/ui/create`


<!-- END_1cb243aec0bde34505983c0c6aac4ca2 -->
<!-- START_9c9bedbd0ea2d99ba79d13b4e77f5167 -->
## Upload new version.

> Example request:

```bash
curl "http://localhost/api/sites/{id}/ui" \
-H "Accept: application/json" \
    -d "ui"="amet" \
    -d "type"="amet" \

```

```javascript
// Angular 2
let data = {
        "ui": "amet",
        "type": "amet"
};

this.apiServie.post("api/sites/{id}/ui", data)
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
`POST api/sites/{id}/ui`

#### Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    ui | string |  required  | Allowed mime types: `zip`
    type | string |  required  | 

<!-- END_9c9bedbd0ea2d99ba79d13b4e77f5167 -->
<!-- START_e61cb2180c02ab2ab57834f80f553426 -->
## Display the specified resource.

> Example request:

```bash
curl "http://localhost/api/sites/{id}/ui/{ui}" \
-H "Accept: application/json"
```

```javascript
// Angular 2

this.apiServie.get("api/sites/{id}/ui/{ui}", data)
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
null
```


### HTTP Request
`GET api/sites/{id}/ui/{ui}`

`HEAD api/sites/{id}/ui/{ui}`


<!-- END_e61cb2180c02ab2ab57834f80f553426 -->
<!-- START_c0c783082a73551e827873a22d3917bc -->
## Show the form for editing the specified resource.

> Example request:

```bash
curl "http://localhost/api/sites/{id}/ui/{ui}/edit" \
-H "Accept: application/json"
```

```javascript
// Angular 2

this.apiServie.get("api/sites/{id}/ui/{ui}/edit", data)
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
null
```


### HTTP Request
`GET api/sites/{id}/ui/{ui}/edit`

`HEAD api/sites/{id}/ui/{ui}/edit`


<!-- END_c0c783082a73551e827873a22d3917bc -->
<!-- START_99cc82634d5e0537b36942e4cd2583ab -->
## Update the specified resource in storage.

> Example request:

```bash
curl "http://localhost/api/sites/{id}/ui/{ui}" \
-H "Accept: application/json"
```

```javascript
// Angular 2

this.apiServie.put("api/sites/{id}/ui/{ui}", data)
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
`PUT api/sites/{id}/ui/{ui}`

`PATCH api/sites/{id}/ui/{ui}`


<!-- END_99cc82634d5e0537b36942e4cd2583ab -->
<!-- START_d78c937c8d4ab38e29423500e061dbb6 -->
## Remove the specified resource from storage.

> Example request:

```bash
curl "http://localhost/api/sites/{id}/ui/{ui}" \
-H "Accept: application/json"
```

```javascript
// Angular 2

this.apiServie.delete("api/sites/{id}/ui/{ui}", data)
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
`DELETE api/sites/{id}/ui/{ui}`


<!-- END_d78c937c8d4ab38e29423500e061dbb6 -->
