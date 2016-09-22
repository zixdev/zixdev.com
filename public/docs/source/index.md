---
title: API Reference

language_tabs:
- bash
- javascript

includes:

search: true

toc_footers:
- <a href='http://github.com/mpociot/documentarian'>Documentation Powered by Documentarian</a>
---
<!-- START_INFO -->
# Info

Welcome to the generated API reference.
[Get Postman Collection](http://localhost/docs/collection.json)
<!-- END_INFO -->

#general
<!-- START_c3fa189a6c95ca36ad6ac4791a873d23 -->
## api/login

> Example request:

```bash
curl "http://localhost/api/login" \
-H "Accept: application/json" \
    -d "email"="uzieme@example.org" \
    -d "password"="rerum" \

```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/login",
    "method": "POST",
    "data": {
        "email": "uzieme@example.org",
        "password": "rerum"
},
        "headers": {
    "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
console.log(response);
});
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
## api/register

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
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/register",
    "method": "POST",
    "data": {
        "username": "et",
        "email": "milo77@example.org",
        "password": "et",
        "accept_terms": true
},
        "headers": {
    "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
console.log(response);
});
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
## Send a reset link to the given user.

> Example request:

```bash
curl "http://localhost/api/forgot-password" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/forgot-password",
    "method": "POST",
        "headers": {
    "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
console.log(response);
});
```


### HTTP Request
`POST api/forgot-password`


<!-- END_78c4b7d6388c81c68bc37ec872d44f65 -->
<!-- START_6d3061d375666b8cf6babe163b36f250 -->
## Reset the given user&#039;s password.

> Example request:

```bash
curl "http://localhost/api/reset-password" \
-H "Accept: application/json" \
    -d "email"="maximillia06@example.com" \
    -d "password"="provident" \

```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/reset-password",
    "method": "POST",
    "data": {
        "email": "maximillia06@example.com",
        "password": "provident"
},
        "headers": {
    "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
console.log(response);
});
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
## When User Logout We Will Log him out and destroy the token.

> Example request:

```bash
curl "http://localhost/api/logout" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/logout",
    "method": "GET",
        "headers": {
    "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
console.log(response);
});
```

> Example response:

```json
{
    "data": true,
    "status_code": 200
}
```

### HTTP Request
`GET api/logout`

`HEAD api/logout`


<!-- END_7e6ee60aafd6de54298e0e276a7451fe -->
<!-- START_8d78d43a0817865525e3740dbf866578 -->
## api/user/account/activate

> Example request:

```bash
curl "http://localhost/api/user/account/activate" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/user/account/activate",
    "method": "POST",
        "headers": {
    "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
console.log(response);
});
```


### HTTP Request
`POST api/user/account/activate`


<!-- END_8d78d43a0817865525e3740dbf866578 -->
<!-- START_2ea88ff35aa222f5582e50f39a2b35fd -->
## Display a listing of the resource.

> Example request:

```bash
curl "http://localhost/api/user" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/user",
    "method": "GET",
        "headers": {
    "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
console.log(response);
});
```

> Example response:

```json
{
    "data": {
        "user": null
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
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/user",
    "method": "POST",
    "data": {
        "username": "unde",
        "email": "felipa52@example.org"
},
        "headers": {
    "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
console.log(response);
});
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
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/user/info",
    "method": "GET",
        "headers": {
    "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
console.log(response);
});
```

> Example response:

```json
null
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
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/user/info",
    "method": "POST",
    "data": {
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
},
        "headers": {
    "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
console.log(response);
});
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
