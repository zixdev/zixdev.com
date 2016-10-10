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
            "username": "chraider",
            "email": "badi1wow@gmail.com",
            "active": 1,
            "active_code": null,
            "created_at": "2016-09-30 08:11:34",
            "updated_at": "2016-09-30 08:11:34"
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
            "username": "chraider",
            "email": "badi1wow@gmail.com",
            "active": 1,
            "active_code": null,
            "created_at": "2016-09-30 08:11:34",
            "updated_at": "2016-09-30 08:11:34",
            "info": null
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
<!-- START_40678f04b4e400fabecec3d2fbc5060f -->
## Get Site Versions.

> Example request:

```bash
curl "http://localhost/api/sites/{id}/versions" \
-H "Accept: application/json"
```

```javascript
// Angular 2

this.apiServie.get("api/sites/{id}/versions", data)
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
`GET api/sites/{id}/versions`

`HEAD api/sites/{id}/versions`


<!-- END_40678f04b4e400fabecec3d2fbc5060f -->
<!-- START_e11e41acfb8431af3bd59f2341a7669f -->
## Show the form for creating a new resource.

> Example request:

```bash
curl "http://localhost/api/sites/{id}/versions/create" \
-H "Accept: application/json"
```

```javascript
// Angular 2

this.apiServie.get("api/sites/{id}/versions/create", data)
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
`GET api/sites/{id}/versions/create`

`HEAD api/sites/{id}/versions/create`


<!-- END_e11e41acfb8431af3bd59f2341a7669f -->
<!-- START_15cfcdb334b901a76203fe07e909f8de -->
## Store a newly created resource in storage.

> Example request:

```bash
curl "http://localhost/api/sites/{id}/versions" \
-H "Accept: application/json"
```

```javascript
// Angular 2

this.apiServie.post("api/sites/{id}/versions", data)
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
`POST api/sites/{id}/versions`


<!-- END_15cfcdb334b901a76203fe07e909f8de -->
<!-- START_15390f9a9a8a1b379c2bf54e0fdd4016 -->
## Display the specified resource.

> Example request:

```bash
curl "http://localhost/api/sites/{id}/versions/{version}" \
-H "Accept: application/json"
```

```javascript
// Angular 2

this.apiServie.get("api/sites/{id}/versions/{version}", data)
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
`GET api/sites/{id}/versions/{version}`

`HEAD api/sites/{id}/versions/{version}`


<!-- END_15390f9a9a8a1b379c2bf54e0fdd4016 -->
<!-- START_c70a9dbff7199185962a6ae75d8341aa -->
## Show the form for editing the specified resource.

> Example request:

```bash
curl "http://localhost/api/sites/{id}/versions/{version}/edit" \
-H "Accept: application/json"
```

```javascript
// Angular 2

this.apiServie.get("api/sites/{id}/versions/{version}/edit", data)
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
`GET api/sites/{id}/versions/{version}/edit`

`HEAD api/sites/{id}/versions/{version}/edit`


<!-- END_c70a9dbff7199185962a6ae75d8341aa -->
<!-- START_cff6263e9d23ff2667d105d2e51e6b5f -->
## Update the specified resource in storage.

> Example request:

```bash
curl "http://localhost/api/sites/{id}/versions/{version}" \
-H "Accept: application/json"
```

```javascript
// Angular 2

this.apiServie.put("api/sites/{id}/versions/{version}", data)
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
`PUT api/sites/{id}/versions/{version}`

`PATCH api/sites/{id}/versions/{version}`


<!-- END_cff6263e9d23ff2667d105d2e51e6b5f -->
<!-- START_7fd590211ab23ff6acba6362f83e2941 -->
## Remove the specified resource from storage.

> Example request:

```bash
curl "http://localhost/api/sites/{id}/versions/{version}" \
-H "Accept: application/json"
```

```javascript
// Angular 2

this.apiServie.delete("api/sites/{id}/versions/{version}", data)
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
`DELETE api/sites/{id}/versions/{version}`


<!-- END_7fd590211ab23ff6acba6362f83e2941 -->
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
    "data": [
        {
            "id": 1,
            "name": "Zix Development",
            "public_code": "70490311fe7c84acda8886406a6d884b",
            "private_code": "$2y$10$DmBRPgg0vBNHcsW0HIJ.Q.er\/vde0VMdnpYSvoGXstPjW1MHclXQ.",
            "url": "http:\/\/localhost:8000",
            "ui": "default",
            "ssl": "",
            "status": 1,
            "created_at": "2016-09-30 08:11:21",
            "updated_at": "2016-10-10 16:01:02",
            "deleted_at": null
        },
        {
            "id": 2,
            "name": "Zix Development v2",
            "public_code": null,
            "private_code": null,
            "url": "http:\/\/localhost:8080",
            "ui": "zixdev",
            "ssl": null,
            "status": 1,
            "created_at": "2016-10-02 13:53:50",
            "updated_at": "2016-10-10 19:14:29",
            "deleted_at": null
        }
    ],
    "status_code": 200
}
```


### HTTP Request
`GET api/sites`

`HEAD api/sites`


<!-- END_6bde012eab6506f2b473003076ee19f4 -->
<!-- START_c7cd12d95cd3eaaf3af48dc5fcae9d79 -->
## Show the form for creating a new resource.

> Example request:

```bash
curl "http://localhost/api/sites/create" \
-H "Accept: application/json"
```

```javascript
// Angular 2

this.apiServie.get("api/sites/create", data)
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
`GET api/sites/create`

`HEAD api/sites/create`


<!-- END_c7cd12d95cd3eaaf3af48dc5fcae9d79 -->
<!-- START_0ebc8c1e23f5fffe2bde49996df7e6a8 -->
## Create New Site.

> Example request:

```bash
curl "http://localhost/api/sites" \
-H "Accept: application/json" \
    -d "name"="et" \
    -d "url"="et" \
    -d "ui"="et" \

```

```javascript
// Angular 2
let data = {
        "name": "et",
        "url": "et",
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
    url | string |  required  | Minimum: `3` Maximum: `255`
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
<!-- START_2a638f3cb43c3741d9eec0133103bf86 -->
## Show the form for editing the specified resource.

> Example request:

```bash
curl "http://localhost/api/sites/{site}/edit" \
-H "Accept: application/json"
```

```javascript
// Angular 2

this.apiServie.get("api/sites/{site}/edit", data)
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
`GET api/sites/{site}/edit`

`HEAD api/sites/{site}/edit`


<!-- END_2a638f3cb43c3741d9eec0133103bf86 -->
<!-- START_773c9bdb2e712908dcb18a7159ba29ec -->
## Update Site.

> Example request:

```bash
curl "http://localhost/api/sites/{site}" \
-H "Accept: application/json" \
    -d "name"="dolores" \
    -d "url"="dolores" \
    -d "ui"="dolores" \

```

```javascript
// Angular 2
let data = {
        "name": "dolores",
        "url": "dolores",
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
    url | string |  required  | Minimum: `3` Maximum: `255`
    ui | string |  required  | Minimum: `3` Maximum: `255`

<!-- END_773c9bdb2e712908dcb18a7159ba29ec -->
<!-- START_5d642e3a724d019171d9753fe202f9b6 -->
## Remove the specified resource from storage.

> Example request:

```bash
curl "http://localhost/api/sites/{site}" \
-H "Accept: application/json"
```

```javascript
// Angular 2

this.apiServie.delete("api/sites/{site}", data)
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
`DELETE api/sites/{site}`


<!-- END_5d642e3a724d019171d9753fe202f9b6 -->
