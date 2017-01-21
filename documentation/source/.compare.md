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
<!-- START_d7b7952e7fdddc07c978c9bdaf757acf -->
## Register User.

When the submit a register form we will be creating new account for him,
also we will be sending to him and email with link to activate him account.

> Example request:

```bash
curl "http://localhost/api/register" \
-H "Accept: application/json" \
    -d "username"="enim" \
    -d "email"="westley85@example.org" \
    -d "password"="enim" \
    -d "accept_terms"="1" \

```

```javascript
// Vue 2
let data = {
        "username": "enim",
        "email": "westley85@example.org",
        "password": "enim",
        "accept_terms": true
};

this.$http.post(config.api_url + "api/register", data)
    .then(response => {
        console.info(response.data.tata);
    })
    .catch(error => {
        console.warn(error);
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
<!-- START_c3fa189a6c95ca36ad6ac4791a873d23 -->
## Login User.

> Example request:

```bash
curl "http://localhost/api/login" \
-H "Accept: application/json" \
    -d "email"="morissette.frieda@example.com" \
    -d "password"="repellat" \

```

```javascript
// Vue 2
let data = {
        "email": "morissette.frieda@example.com",
        "password": "repellat"
};

this.$http.post(config.api_url + "api/login", data)
    .then(response => {
        console.info(response.data.tata);
    })
    .catch(error => {
        console.warn(error);
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
<!-- START_7e6ee60aafd6de54298e0e276a7451fe -->
## Logout User.

When User Logout We Will Log him out and destroy the token.

> Example request:

```bash
curl "http://localhost/api/logout" \
-H "Accept: application/json"
```

```javascript
// Vue 2

this.$http.get(config.api_url + "api/logout", data)
    .then(response => {
        console.info(response.data.tata);
    })
    .catch(error => {
        console.warn(error);
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
    -d "email"="carol.towne@example.net" \

```

```javascript
// Vue 2
let data = {
        "email": "carol.towne@example.net"
};

this.$http.post(config.api_url + "api/forgot-password", data)
    .then(response => {
        console.info(response.data.tata);
    })
    .catch(error => {
        console.warn(error);
    });

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
    -d "email"="mitchell.bryana@example.org" \
    -d "password"="nulla" \

```

```javascript
// Vue 2
let data = {
        "email": "mitchell.bryana@example.org",
        "password": "nulla"
};

this.$http.post(config.api_url + "api/reset-password", data)
    .then(response => {
        console.info(response.data.tata);
    })
    .catch(error => {
        console.warn(error);
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
<!-- START_8d78d43a0817865525e3740dbf866578 -->
## Activate User&#039;s account.

> Example request:

```bash
curl "http://localhost/api/user/account/activate" \
-H "Accept: application/json" \
    -d "code"="sit" \

```

```javascript
// Vue 2
let data = {
        "code": "sit"
};

this.$http.post(config.api_url + "api/user/account/activate", data)
    .then(response => {
        console.info(response.data.tata);
    })
    .catch(error => {
        console.warn(error);
    });

```



### HTTP Request
`POST api/user/account/activate`

#### Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    code | string |  required  | Minimum: `60` Maximum: `60`

<!-- END_8d78d43a0817865525e3740dbf866578 -->
<!-- START_d275f853c4ddf9364b8a5869a05adaa0 -->
## Login With Social Sites
(facebook/twitter/github)

> Example request:

```bash
curl "http://localhost/api/auth/social/login-with/{type}" \
-H "Accept: application/json"
```

```javascript
// Vue 2

this.$http.get(config.api_url + "api/auth/social/login-with/{type}", data)
    .then(response => {
        console.info(response.data.tata);
    })
    .catch(error => {
        console.warn(error);
    });

```

> Example response:

```json
null
```


### HTTP Request
`GET api/auth/social/login-with/{type}`

`HEAD api/auth/social/login-with/{type}`


<!-- END_d275f853c4ddf9364b8a5869a05adaa0 -->
<!-- START_d05cb9fa652b35960690842fb33839a8 -->
## Login With Social Sites Feedback

> Example request:

```bash
curl "http://localhost/api/auth/social/callback/{type}" \
-H "Accept: application/json"
```

```javascript
// Vue 2

this.$http.get(config.api_url + "api/auth/social/callback/{type}", data)
    .then(response => {
        console.info(response.data.tata);
    })
    .catch(error => {
        console.warn(error);
    });

```

> Example response:

```json
null
```


### HTTP Request
`GET api/auth/social/callback/{type}`

`HEAD api/auth/social/callback/{type}`


<!-- END_d05cb9fa652b35960690842fb33839a8 -->
#Forms
<!-- START_5a3be3b8cd540c7506c74c30c130fb46 -->
## Submit Form Reply

> Example request:

```bash
curl "http://localhost/api/form" \
-H "Accept: application/json"
```

```javascript
// Vue 2

this.$http.post(config.api_url + "api/form", data)
    .then(response => {
        console.info(response.data.tata);
    })
    .catch(error => {
        console.warn(error);
    });

```



### HTTP Request
`POST api/form`


<!-- END_5a3be3b8cd540c7506c74c30c130fb46 -->
#Manage Forms
<!-- START_c49085b6426cbb5312fc081c074013f2 -->
## Get Data
### Required permission (can:view_model)
This will return dynamic filtrable data, (paginate, search, orderBy).

To get the deleted data use query(?eloquent=trashed)

> Example request:

```bash
curl "http://localhost/api/forms" \
-H "Accept: application/json"
```

```javascript
// Vue 2

this.$http.get(config.api_url + "api/forms", data)
    .then(response => {
        console.info(response.data.tata);
    })
    .catch(error => {
        console.warn(error);
    });

```

> Example response:

```json
{
    "error": "Unauthenticated."
}
```


### HTTP Request
`GET api/forms`

`HEAD api/forms`


<!-- END_c49085b6426cbb5312fc081c074013f2 -->
<!-- START_e86c5559f6bc3371a08a5a47ebbdb263 -->
## Get Form

> Example request:

```bash
curl "http://localhost/api/forms/{id}" \
-H "Accept: application/json"
```

```javascript
// Vue 2

this.$http.get(config.api_url + "api/forms/{id}", data)
    .then(response => {
        console.info(response.data.tata);
    })
    .catch(error => {
        console.warn(error);
    });

```

> Example response:

```json
{
    "error": "Unauthenticated."
}
```


### HTTP Request
`GET api/forms/{id}`

`HEAD api/forms/{id}`


<!-- END_e86c5559f6bc3371a08a5a47ebbdb263 -->
<!-- START_326dd9cee4f966dffabfa8a7db01b393 -->
## Create Forms

> Example request:

```bash
curl "http://localhost/api/forms" \
-H "Accept: application/json" \
    -d "title"="dicta" \
    -d "slug"="dicta" \
    -d "submit_text"="dicta" \

```

```javascript
// Vue 2
let data = {
        "title": "dicta",
        "slug": "dicta",
        "submit_text": "dicta"
};

this.$http.post(config.api_url + "api/forms", data)
    .then(response => {
        console.info(response.data.tata);
    })
    .catch(error => {
        console.warn(error);
    });

```



### HTTP Request
`POST api/forms`

#### Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    title | string |  required  | Minimum: `3` Maximum: `255`
    slug | string |  required  | Minimum: `3` Maximum: `255`
    submit_text | string |  required  | Minimum: `3` Maximum: `255`

<!-- END_326dd9cee4f966dffabfa8a7db01b393 -->
<!-- START_5d307c4febe8068bb64e57c0907c4eb0 -->
## Update Form

> Example request:

```bash
curl "http://localhost/api/forms/{id}" \
-H "Accept: application/json" \
    -d "title"="tenetur" \
    -d "slug"="tenetur" \
    -d "submit_text"="tenetur" \

```

```javascript
// Vue 2
let data = {
        "title": "tenetur",
        "slug": "tenetur",
        "submit_text": "tenetur"
};

this.$http.put(config.api_url + "api/forms/{id}", data)
    .then(response => {
        console.info(response.data.tata);
    })
    .catch(error => {
        console.warn(error);
    });

```



### HTTP Request
`PUT api/forms/{id}`

#### Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    title | string |  required  | Minimum: `3` Maximum: `255`
    slug | string |  required  | Minimum: `3` Maximum: `255`
    submit_text | string |  required  | Minimum: `3` Maximum: `255`

<!-- END_5d307c4febe8068bb64e57c0907c4eb0 -->
<!-- START_3a41ea3a035641a017cd2afe6a272550 -->
## Remove Data
### Required permission (can:delete_model)

> Example request:

```bash
curl "http://localhost/api/forms/{id}" \
-H "Accept: application/json"
```

```javascript
// Vue 2

this.$http.delete(config.api_url + "api/forms/{id}", data)
    .then(response => {
        console.info(response.data.tata);
    })
    .catch(error => {
        console.warn(error);
    });

```



### HTTP Request
`DELETE api/forms/{id}`


<!-- END_3a41ea3a035641a017cd2afe6a272550 -->
<!-- START_fc63747f73399d87a8744bf1a8eede18 -->
## Get Form Fields

> Example request:

```bash
curl "http://localhost/api/forms/{slug}/fields" \
-H "Accept: application/json"
```

```javascript
// Vue 2

this.$http.get(config.api_url + "api/forms/{slug}/fields", data)
    .then(response => {
        console.info(response.data.tata);
    })
    .catch(error => {
        console.warn(error);
    });

```

> Example response:

```json
{
    "error": "Unauthenticated."
}
```


### HTTP Request
`GET api/forms/{slug}/fields`

`HEAD api/forms/{slug}/fields`


<!-- END_fc63747f73399d87a8744bf1a8eede18 -->
<!-- START_137e996e03c7187dce199c94ce7abaa1 -->
## Create Form Fields

> Example request:

```bash
curl "http://localhost/api/forms/{slug}/fields" \
-H "Accept: application/json"
```

```javascript
// Vue 2

this.$http.post(config.api_url + "api/forms/{slug}/fields", data)
    .then(response => {
        console.info(response.data.tata);
    })
    .catch(error => {
        console.warn(error);
    });

```



### HTTP Request
`POST api/forms/{slug}/fields`


<!-- END_137e996e03c7187dce199c94ce7abaa1 -->
<!-- START_70e2f1aff34dd9f4379bb4904ef2768c -->
## Update Form Fields

> Example request:

```bash
curl "http://localhost/api/forms/{slug}/fields/{id}" \
-H "Accept: application/json"
```

```javascript
// Vue 2

this.$http.put(config.api_url + "api/forms/{slug}/fields/{id}", data)
    .then(response => {
        console.info(response.data.tata);
    })
    .catch(error => {
        console.warn(error);
    });

```



### HTTP Request
`PUT api/forms/{slug}/fields/{id}`


<!-- END_70e2f1aff34dd9f4379bb4904ef2768c -->
<!-- START_0e6174f2f5d1531551d1fb9dcc9ec8ff -->
## Get From Responses

> Example request:

```bash
curl "http://localhost/api/forms/{slug}/responses" \
-H "Accept: application/json"
```

```javascript
// Vue 2

this.$http.get(config.api_url + "api/forms/{slug}/responses", data)
    .then(response => {
        console.info(response.data.tata);
    })
    .catch(error => {
        console.warn(error);
    });

```

> Example response:

```json
{
    "error": "Unauthenticated."
}
```


### HTTP Request
`GET api/forms/{slug}/responses`

`HEAD api/forms/{slug}/responses`


<!-- END_0e6174f2f5d1531551d1fb9dcc9ec8ff -->
<!-- START_70c1a1dae47ab64b105ade168bd2b231 -->
## Get Form Response

> Example request:

```bash
curl "http://localhost/api/forms/{slug}/responses/{id}" \
-H "Accept: application/json"
```

```javascript
// Vue 2

this.$http.get(config.api_url + "api/forms/{slug}/responses/{id}", data)
    .then(response => {
        console.info(response.data.tata);
    })
    .catch(error => {
        console.warn(error);
    });

```

> Example response:

```json
{
    "error": "Unauthenticated."
}
```


### HTTP Request
`GET api/forms/{slug}/responses/{id}`

`HEAD api/forms/{slug}/responses/{id}`


<!-- END_70c1a1dae47ab64b105ade168bd2b231 -->
<!-- START_52ae26d1c4c8b66dbd68d2bc45eb6162 -->
## Delete Form Response

> Example request:

```bash
curl "http://localhost/api/forms/{slug}/responses/{id}" \
-H "Accept: application/json"
```

```javascript
// Vue 2

this.$http.delete(config.api_url + "api/forms/{slug}/responses/{id}", data)
    .then(response => {
        console.info(response.data.tata);
    })
    .catch(error => {
        console.warn(error);
    });

```



### HTTP Request
`DELETE api/forms/{slug}/responses/{id}`


<!-- END_52ae26d1c4c8b66dbd68d2bc45eb6162 -->
#Manage Pages
<!-- START_c44904d8eb741cc708c2d88a56a69927 -->
## Get Data
### Required permission (can:view_model)
This will return dynamic filtrable data, (paginate, search, orderBy).

To get the deleted data use query(?eloquent=trashed)

> Example request:

```bash
curl "http://localhost/api/pages" \
-H "Accept: application/json"
```

```javascript
// Vue 2

this.$http.get(config.api_url + "api/pages", data)
    .then(response => {
        console.info(response.data.tata);
    })
    .catch(error => {
        console.warn(error);
    });

```

> Example response:

```json
{
    "error": "Unauthenticated."
}
```


### HTTP Request
`GET api/pages`

`HEAD api/pages`


<!-- END_c44904d8eb741cc708c2d88a56a69927 -->
<!-- START_9db908f3cc041bad182795bc2a844789 -->
## Create Page

> Example request:

```bash
curl "http://localhost/api/pages" \
-H "Accept: application/json" \
    -d "title"="est" \
    -d "slug"="est" \
    -d "sites"="est" \
    -d "content"="est" \

```

```javascript
// Vue 2
let data = {
        "title": "est",
        "slug": "est",
        "sites": "est",
        "content": "est"
};

this.$http.post(config.api_url + "api/pages", data)
    .then(response => {
        console.info(response.data.tata);
    })
    .catch(error => {
        console.warn(error);
    });

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
<!-- START_d49ae3294aa1a51c31696f736f2cf22e -->
## Update Page

> Example request:

```bash
curl "http://localhost/api/pages/{id}" \
-H "Accept: application/json" \
    -d "title"="atque" \
    -d "slug"="atque" \
    -d "sites"="atque" \
    -d "content"="atque" \

```

```javascript
// Vue 2
let data = {
        "title": "atque",
        "slug": "atque",
        "sites": "atque",
        "content": "atque"
};

this.$http.put(config.api_url + "api/pages/{id}", data)
    .then(response => {
        console.info(response.data.tata);
    })
    .catch(error => {
        console.warn(error);
    });

```



### HTTP Request
`PUT api/pages/{id}`

#### Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    title | string |  required  | Minimum: `3` Maximum: `255`
    slug | string |  required  | Minimum: `3` Maximum: `255`
    sites | string |  required  | 
    content | string |  required  | 

<!-- END_d49ae3294aa1a51c31696f736f2cf22e -->
<!-- START_32d51619c4070ff1232268887700befd -->
## Remove Data
### Required permission (can:delete_model)

> Example request:

```bash
curl "http://localhost/api/pages/{id}" \
-H "Accept: application/json"
```

```javascript
// Vue 2

this.$http.delete(config.api_url + "api/pages/{id}", data)
    .then(response => {
        console.info(response.data.tata);
    })
    .catch(error => {
        console.warn(error);
    });

```



### HTTP Request
`DELETE api/pages/{id}`


<!-- END_32d51619c4070ff1232268887700befd -->
#Manage Sites
<!-- START_6bde012eab6506f2b473003076ee19f4 -->
## Get Data
### Required permission (can:view_model)
This will return dynamic filtrable data, (paginate, search, orderBy).

To get the deleted data use query(?eloquent=trashed)

> Example request:

```bash
curl "http://localhost/api/sites" \
-H "Accept: application/json"
```

```javascript
// Vue 2

this.$http.get(config.api_url + "api/sites", data)
    .then(response => {
        console.info(response.data.tata);
    })
    .catch(error => {
        console.warn(error);
    });

```

> Example response:

```json
{
    "error": "Unauthenticated."
}
```


### HTTP Request
`GET api/sites`

`HEAD api/sites`


<!-- END_6bde012eab6506f2b473003076ee19f4 -->
<!-- START_050561d0692a332850f55e4b6e23c90d -->
## Get Site

> Example request:

```bash
curl "http://localhost/api/sites/{id}" \
-H "Accept: application/json"
```

```javascript
// Vue 2

this.$http.get(config.api_url + "api/sites/{id}", data)
    .then(response => {
        console.info(response.data.tata);
    })
    .catch(error => {
        console.warn(error);
    });

```

> Example response:

```json
{
    "error": "Unauthenticated."
}
```


### HTTP Request
`GET api/sites/{id}`

`HEAD api/sites/{id}`


<!-- END_050561d0692a332850f55e4b6e23c90d -->
<!-- START_0ebc8c1e23f5fffe2bde49996df7e6a8 -->
## Create Site

> Example request:

```bash
curl "http://localhost/api/sites" \
-H "Accept: application/json" \
    -d "name"="quos" \
    -d "url"="https://www.thiel.net/cupiditate-consequatur-modi-dolore" \
    -d "ui"="quos" \

```

```javascript
// Vue 2
let data = {
        "name": "quos",
        "url": "https:\/\/www.thiel.net\/cupiditate-consequatur-modi-dolore",
        "ui": "quos"
};

this.$http.post(config.api_url + "api/sites", data)
    .then(response => {
        console.info(response.data.tata);
    })
    .catch(error => {
        console.warn(error);
    });

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
<!-- START_5c735973cfbd0edc25ddcb9c8ddd8610 -->
## Update Site

> Example request:

```bash
curl "http://localhost/api/sites/{id}" \
-H "Accept: application/json" \
    -d "name"="aliquam" \
    -d "url"="http://brakus.info/" \
    -d "ui"="aliquam" \

```

```javascript
// Vue 2
let data = {
        "name": "aliquam",
        "url": "http:\/\/brakus.info\/",
        "ui": "aliquam"
};

this.$http.put(config.api_url + "api/sites/{id}", data)
    .then(response => {
        console.info(response.data.tata);
    })
    .catch(error => {
        console.warn(error);
    });

```



### HTTP Request
`PUT api/sites/{id}`

#### Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    name | string |  required  | Minimum: `3` Maximum: `255`
    url | url |  required  | Minimum: `3` Maximum: `255`
    ui | string |  required  | Minimum: `3` Maximum: `255`

<!-- END_5c735973cfbd0edc25ddcb9c8ddd8610 -->
<!-- START_00e90caed6de37f0a44ce5288c2ab262 -->
## Remove Data
### Required permission (can:delete_model)

> Example request:

```bash
curl "http://localhost/api/sites/{id}" \
-H "Accept: application/json"
```

```javascript
// Vue 2

this.$http.delete(config.api_url + "api/sites/{id}", data)
    .then(response => {
        console.info(response.data.tata);
    })
    .catch(error => {
        console.warn(error);
    });

```



### HTTP Request
`DELETE api/sites/{id}`


<!-- END_00e90caed6de37f0a44ce5288c2ab262 -->
<!-- START_2769ec165c2297d6e49ced508170544d -->
## Get Site Themes

> Example request:

```bash
curl "http://localhost/api/sites/{id}/ui" \
-H "Accept: application/json"
```

```javascript
// Vue 2

this.$http.get(config.api_url + "api/sites/{id}/ui", data)
    .then(response => {
        console.info(response.data.tata);
    })
    .catch(error => {
        console.warn(error);
    });

```

> Example response:

```json
{
    "error": "Unauthenticated."
}
```


### HTTP Request
`GET api/sites/{id}/ui`

`HEAD api/sites/{id}/ui`


<!-- END_2769ec165c2297d6e49ced508170544d -->
<!-- START_9c9bedbd0ea2d99ba79d13b4e77f5167 -->
## Upload Site Theme

> Example request:

```bash
curl "http://localhost/api/sites/{id}/ui" \
-H "Accept: application/json" \
    -d "ui"="explicabo" \
    -d "type"="explicabo" \

```

```javascript
// Vue 2
let data = {
        "ui": "explicabo",
        "type": "explicabo"
};

this.$http.post(config.api_url + "api/sites/{id}/ui", data)
    .then(response => {
        console.info(response.data.tata);
    })
    .catch(error => {
        console.warn(error);
    });

```



### HTTP Request
`POST api/sites/{id}/ui`

#### Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    ui | string |  required  | Allowed mime types: `zip`
    type | string |  required  | 

<!-- END_9c9bedbd0ea2d99ba79d13b4e77f5167 -->
<!-- START_e7bf23caf9c2a9cd4c40296cb830f376 -->
## Get Site Configs

> Example request:

```bash
curl "http://localhost/api/sites/{id}/config" \
-H "Accept: application/json"
```

```javascript
// Vue 2

this.$http.get(config.api_url + "api/sites/{id}/config", data)
    .then(response => {
        console.info(response.data.tata);
    })
    .catch(error => {
        console.warn(error);
    });

```

> Example response:

```json
{
    "error": "Unauthenticated."
}
```


### HTTP Request
`GET api/sites/{id}/config`

`HEAD api/sites/{id}/config`


<!-- END_e7bf23caf9c2a9cd4c40296cb830f376 -->
<!-- START_8f6a297bf8d60f97310a0af655aa3803 -->
## Update Site Config

> Example request:

```bash
curl "http://localhost/api/sites/{id}/config" \
-H "Accept: application/json"
```

```javascript
// Vue 2

this.$http.post(config.api_url + "api/sites/{id}/config", data)
    .then(response => {
        console.info(response.data.tata);
    })
    .catch(error => {
        console.warn(error);
    });

```



### HTTP Request
`POST api/sites/{id}/config`


<!-- END_8f6a297bf8d60f97310a0af655aa3803 -->
#Manage User Roles
<!-- START_0a74816f6409e89e5fc8538015f2b907 -->
## Get Data
### Required permission (can:view_model)
This will return dynamic filtrable data, (paginate, search, orderBy).

To get the deleted data use query(?eloquent=trashed)

> Example request:

```bash
curl "http://localhost/api/roles" \
-H "Accept: application/json"
```

```javascript
// Vue 2

this.$http.get(config.api_url + "api/roles", data)
    .then(response => {
        console.info(response.data.tata);
    })
    .catch(error => {
        console.warn(error);
    });

```

> Example response:

```json
{
    "error": "Unauthenticated."
}
```


### HTTP Request
`GET api/roles`

`HEAD api/roles`


<!-- END_0a74816f6409e89e5fc8538015f2b907 -->
<!-- START_ee0837edbb11701ed30dbeb0ccb0b984 -->
## Get Role Permissions

> Example request:

```bash
curl "http://localhost/api/roles/{id}" \
-H "Accept: application/json"
```

```javascript
// Vue 2

this.$http.get(config.api_url + "api/roles/{id}", data)
    .then(response => {
        console.info(response.data.tata);
    })
    .catch(error => {
        console.warn(error);
    });

```

> Example response:

```json
{
    "error": "Unauthenticated."
}
```


### HTTP Request
`GET api/roles/{id}`

`HEAD api/roles/{id}`


<!-- END_ee0837edbb11701ed30dbeb0ccb0b984 -->
<!-- START_a4aa9bc74cd63eb1e389f052680d4a42 -->
## Get Role For Edit

> Example request:

```bash
curl "http://localhost/api/roles/{id}/edit" \
-H "Accept: application/json"
```

```javascript
// Vue 2

this.$http.get(config.api_url + "api/roles/{id}/edit", data)
    .then(response => {
        console.info(response.data.tata);
    })
    .catch(error => {
        console.warn(error);
    });

```

> Example response:

```json
{
    "error": "Unauthenticated."
}
```


### HTTP Request
`GET api/roles/{id}/edit`

`HEAD api/roles/{id}/edit`


<!-- END_a4aa9bc74cd63eb1e389f052680d4a42 -->
<!-- START_90c780acaefab9740431579512d07101 -->
## Create Role

> Example request:

```bash
curl "http://localhost/api/roles" \
-H "Accept: application/json"
```

```javascript
// Vue 2

this.$http.post(config.api_url + "api/roles", data)
    .then(response => {
        console.info(response.data.tata);
    })
    .catch(error => {
        console.warn(error);
    });

```



### HTTP Request
`POST api/roles`


<!-- END_90c780acaefab9740431579512d07101 -->
<!-- START_66a5365d6273a0f12351f1a19e197a06 -->
## Update Role

> Example request:

```bash
curl "http://localhost/api/roles/{id}" \
-H "Accept: application/json"
```

```javascript
// Vue 2

this.$http.put(config.api_url + "api/roles/{id}", data)
    .then(response => {
        console.info(response.data.tata);
    })
    .catch(error => {
        console.warn(error);
    });

```



### HTTP Request
`PUT api/roles/{id}`


<!-- END_66a5365d6273a0f12351f1a19e197a06 -->
<!-- START_d7d76016c9a76a1ed7d5d016fb1ba3bc -->
## Remove Data
### Required permission (can:delete_model)

> Example request:

```bash
curl "http://localhost/api/roles/{id}" \
-H "Accept: application/json"
```

```javascript
// Vue 2

this.$http.delete(config.api_url + "api/roles/{id}", data)
    .then(response => {
        console.info(response.data.tata);
    })
    .catch(error => {
        console.warn(error);
    });

```



### HTTP Request
`DELETE api/roles/{id}`


<!-- END_d7d76016c9a76a1ed7d5d016fb1ba3bc -->
<!-- START_4a9d5428fe93c48a0f2de64b775ca8a3 -->
## Get Role Permissions

> Example request:

```bash
curl "http://localhost/api/roles/all/permissions" \
-H "Accept: application/json"
```

```javascript
// Vue 2

this.$http.get(config.api_url + "api/roles/all/permissions", data)
    .then(response => {
        console.info(response.data.tata);
    })
    .catch(error => {
        console.warn(error);
    });

```

> Example response:

```json
{
    "error": "Unauthenticated."
}
```


### HTTP Request
`GET api/roles/all/permissions`

`HEAD api/roles/all/permissions`


<!-- END_4a9d5428fe93c48a0f2de64b775ca8a3 -->
<!-- START_9df85a3a61f6284b75d7a067ff42ff36 -->
## Update Role Permissions

> Example request:

```bash
curl "http://localhost/api/roles/{id}/permissions" \
-H "Accept: application/json"
```

```javascript
// Vue 2

this.$http.post(config.api_url + "api/roles/{id}/permissions", data)
    .then(response => {
        console.info(response.data.tata);
    })
    .catch(error => {
        console.warn(error);
    });

```



### HTTP Request
`POST api/roles/{id}/permissions`


<!-- END_9df85a3a61f6284b75d7a067ff42ff36 -->
#Manage Users
<!-- START_da5727be600e4865c1b632f7745c8e91 -->
## Get Data
### Required permission (can:view_model)
This will return dynamic filtrable data, (paginate, search, orderBy).

To get the deleted data use query(?eloquent=trashed)

> Example request:

```bash
curl "http://localhost/api/users" \
-H "Accept: application/json"
```

```javascript
// Vue 2

this.$http.get(config.api_url + "api/users", data)
    .then(response => {
        console.info(response.data.tata);
    })
    .catch(error => {
        console.warn(error);
    });

```

> Example response:

```json
{
    "error": "Unauthenticated."
}
```


### HTTP Request
`GET api/users`

`HEAD api/users`


<!-- END_da5727be600e4865c1b632f7745c8e91 -->
<!-- START_5da4a01649c4efd773d0d8417009a943 -->
## Get User
### Required permission (can:view_users)

> Example request:

```bash
curl "http://localhost/api/users/{id}" \
-H "Accept: application/json"
```

```javascript
// Vue 2

this.$http.get(config.api_url + "api/users/{id}", data)
    .then(response => {
        console.info(response.data.tata);
    })
    .catch(error => {
        console.warn(error);
    });

```

> Example response:

```json
{
    "error": "Unauthenticated."
}
```


### HTTP Request
`GET api/users/{id}`

`HEAD api/users/{id}`


<!-- END_5da4a01649c4efd773d0d8417009a943 -->
<!-- START_12e37982cc5398c7100e59625ebb5514 -->
## Create User
### Required permission (can:create_users)

> Example request:

```bash
curl "http://localhost/api/users" \
-H "Accept: application/json" \
    -d "username"="rem" \
    -d "email"="claire.schumm@example.net" \
    -d "password"="rem" \
    -d "accept_terms"="1" \

```

```javascript
// Vue 2
let data = {
        "username": "rem",
        "email": "claire.schumm@example.net",
        "password": "rem",
        "accept_terms": true
};

this.$http.post(config.api_url + "api/users", data)
    .then(response => {
        console.info(response.data.tata);
    })
    .catch(error => {
        console.warn(error);
    });

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
<!-- START_9332edb67641ad6a0c477285396a59e6 -->
## Update User
### Required permission (can:update_users)

> Example request:

```bash
curl "http://localhost/api/users/{id}" \
-H "Accept: application/json" \
    -d "username"="sint" \
    -d "email"="ukoch@example.com" \

```

```javascript
// Vue 2
let data = {
        "username": "sint",
        "email": "ukoch@example.com"
};

this.$http.put(config.api_url + "api/users/{id}", data)
    .then(response => {
        console.info(response.data.tata);
    })
    .catch(error => {
        console.warn(error);
    });

```



### HTTP Request
`PUT api/users/{id}`

#### Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    username | string |  required  | Maximum: `255` Minimum: `3`
    email | email |  required  | Maximum: `255` Minimum: `3`

<!-- END_9332edb67641ad6a0c477285396a59e6 -->
<!-- START_fceddd82d8c88376fcee403bd01f165a -->
## Remove Data
### Required permission (can:delete_model)

> Example request:

```bash
curl "http://localhost/api/users/{id}" \
-H "Accept: application/json"
```

```javascript
// Vue 2

this.$http.delete(config.api_url + "api/users/{id}", data)
    .then(response => {
        console.info(response.data.tata);
    })
    .catch(error => {
        console.warn(error);
    });

```



### HTTP Request
`DELETE api/users/{id}`


<!-- END_fceddd82d8c88376fcee403bd01f165a -->
#Pages
<!-- START_99d69b7d4c16f9206069482b2df9bd08 -->
## Get Page (slug)

> Example request:

```bash
curl "http://localhost/api/pages/{slug}" \
-H "Accept: application/json"
```

```javascript
// Vue 2

this.$http.get(config.api_url + "api/pages/{slug}", data)
    .then(response => {
        console.info(response.data.tata);
    })
    .catch(error => {
        console.warn(error);
    });

```

> Example response:

```json
{
    "data": null,
    "status_code": 200
}
```


### HTTP Request
`GET api/pages/{slug}`

`HEAD api/pages/{slug}`


<!-- END_99d69b7d4c16f9206069482b2df9bd08 -->
#User
<!-- START_2ea88ff35aa222f5582e50f39a2b35fd -->
## User
Get the logged in user with him all permissions.

> Example request:

```bash
curl "http://localhost/api/user" \
-H "Accept: application/json"
```

```javascript
// Vue 2

this.$http.get(config.api_url + "api/user", data)
    .then(response => {
        console.info(response.data.tata);
    })
    .catch(error => {
        console.warn(error);
    });

```

> Example response:

```json
{
    "error": "Unauthenticated."
}
```


### HTTP Request
`GET api/user`

`HEAD api/user`


<!-- END_2ea88ff35aa222f5582e50f39a2b35fd -->
<!-- START_f0654d3f2fc63c11f5723f233cc53c83 -->
## User Update
Update the logged in user detail.

if the user email been changed we will send him a confirmation link to
activate him new email.

> Example request:

```bash
curl "http://localhost/api/user" \
-H "Accept: application/json" \
    -d "username"="ab" \
    -d "email"="dschoen@example.net" \

```

```javascript
// Vue 2
let data = {
        "username": "ab",
        "email": "dschoen@example.net"
};

this.$http.post(config.api_url + "api/user", data)
    .then(response => {
        console.info(response.data.tata);
    })
    .catch(error => {
        console.warn(error);
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
## User Info
Get the logged in user infos.

> Example request:

```bash
curl "http://localhost/api/user/info" \
-H "Accept: application/json"
```

```javascript
// Vue 2

this.$http.get(config.api_url + "api/user/info", data)
    .then(response => {
        console.info(response.data.tata);
    })
    .catch(error => {
        console.warn(error);
    });

```

> Example response:

```json
{
    "error": "Unauthenticated."
}
```


### HTTP Request
`GET api/user/info`

`HEAD api/user/info`


<!-- END_e24fea9a36c83d9f84bd323b6b9d94db -->
<!-- START_1cf9d677dadd7b751523d1b871857f9c -->
## User Info Update

> Example request:

```bash
curl "http://localhost/api/user/info" \
-H "Accept: application/json" \
    -d "first_name"="suscipit" \
    -d "last_name"="suscipit" \
    -d "phone_number"="suscipit" \
    -d "mobile_number"="suscipit" \
    -d "address_line_1"="suscipit" \
    -d "address_line_2"="suscipit" \
    -d "subrub"="suscipit" \
    -d "post_code"="suscipit" \
    -d "state"="suscipit" \
    -d "country"="suscipit" \

```

```javascript
// Vue 2
let data = {
        "first_name": "suscipit",
        "last_name": "suscipit",
        "phone_number": "suscipit",
        "mobile_number": "suscipit",
        "address_line_1": "suscipit",
        "address_line_2": "suscipit",
        "subrub": "suscipit",
        "post_code": "suscipit",
        "state": "suscipit",
        "country": "suscipit"
};

this.$http.post(config.api_url + "api/user/info", data)
    .then(response => {
        console.info(response.data.tata);
    })
    .catch(error => {
        console.warn(error);
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
<!-- START_e835795e301f9db730fefd2b61c35c22 -->
## User Avatar Update

> Example request:

```bash
curl "http://localhost/api/user/upload-avatar" \
-H "Accept: application/json" \
    -d "avatar"="nisi" \

```

```javascript
// Vue 2
let data = {
        "avatar": "nisi"
};

this.$http.post(config.api_url + "api/user/upload-avatar", data)
    .then(response => {
        console.info(response.data.tata);
    })
    .catch(error => {
        console.warn(error);
    });

```



### HTTP Request
`POST api/user/upload-avatar`

#### Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    avatar | image |  required  | Must be an image (jpeg, png, bmp, gif, or svg)

<!-- END_e835795e301f9db730fefd2b61c35c22 -->
<!-- START_d23a710a00a38fab97a33e30ff4db011 -->
## User Avatar Change
Logged in user can select an image from him Images

> Example request:

```bash
curl "http://localhost/api/user/select-avatar" \
-H "Accept: application/json" \
    -d "url"="https://casper.com/sunt-nam-expedita-qui-qui-rerum.html" \

```

```javascript
// Vue 2
let data = {
        "url": "https:\/\/casper.com\/sunt-nam-expedita-qui-qui-rerum.html"
};

this.$http.post(config.api_url + "api/user/select-avatar", data)
    .then(response => {
        console.info(response.data.tata);
    })
    .catch(error => {
        console.warn(error);
    });

```



### HTTP Request
`POST api/user/select-avatar`

#### Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    url | url |  required  | 

<!-- END_d23a710a00a38fab97a33e30ff4db011 -->
<!-- START_7768c0075d080d4c4baddbd9853b0378 -->
## User Images
Get all images been uploaded by this logged in user.

> Example request:

```bash
curl "http://localhost/api/user/images" \
-H "Accept: application/json"
```

```javascript
// Vue 2

this.$http.get(config.api_url + "api/user/images", data)
    .then(response => {
        console.info(response.data.tata);
    })
    .catch(error => {
        console.warn(error);
    });

```

> Example response:

```json
{
    "error": "Unauthenticated."
}
```


### HTTP Request
`GET api/user/images`

`HEAD api/user/images`


<!-- END_7768c0075d080d4c4baddbd9853b0378 -->
<!-- START_812ceeb9f4b6c86aab342de07a9a88be -->
## User Password Update

> Example request:

```bash
curl "http://localhost/api/user/change-password" \
-H "Accept: application/json" \
    -d "current_password"="nihil" \
    -d "password"="nihil" \

```

```javascript
// Vue 2
let data = {
        "current_password": "nihil",
        "password": "nihil"
};

this.$http.post(config.api_url + "api/user/change-password", data)
    .then(response => {
        console.info(response.data.tata);
    })
    .catch(error => {
        console.warn(error);
    });

```



### HTTP Request
`POST api/user/change-password`

#### Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    current_password | string |  required  | 
    password | string |  required  | Minimum: `6`

<!-- END_812ceeb9f4b6c86aab342de07a9a88be -->
