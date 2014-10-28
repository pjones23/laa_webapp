define({ api: [
  {
    "type": "post",
    "url": "/user",
    "title": "Create a new user",
    "name": "CreateUser",
    "group": "User",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "String",
            "field": "firstName",
            "optional": false,
            "description": "<p>First name of the User.</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "field": "lastName",
            "optional": false,
            "description": "<p>Last name of the User.</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "field": "email",
            "optional": false,
            "description": "<p>Email address of the User.</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "field": "password",
            "optional": false,
            "description": "<p>Password of the User.</p>"
          },
          {
            "group": "Parameter",
            "type": "Number",
            "field": "isAdmin",
            "optional": false,
            "description": "<p>Whether the User is an Administrator or not (1 = TRUE | 0 = FALSE)</p>"
          }
        ]
      }
    },
    "success": {
      "examples": [
        {
          "title": "Success-Response:",
          "content": "Success-Response:\n   HTTP/1.1 200 OK\n   {\n     \"Successfully inserted user!\"\n   }\n",
          "type": "json"
        }
      ]
    },
    "error": {
      "examples": [
        {
          "title": "Error-Response:",
          "content": "Error-Response:\n   HTTP/1.1 200 OK\n   {\n     \"Failed to insert user.\"\n   }\n",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "./api.php"
  },
  {
    "type": "delete",
    "url": "/user/:id",
    "title": "Read data of a user",
    "name": "DeleteUser",
    "group": "User",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Number",
            "field": "id",
            "optional": false,
            "description": "<p>Users unique ID.</p>"
          }
        ]
      }
    },
    "success": {
      "examples": [
        {
          "title": "Success-Response:",
          "content": "Success-Response:\n   HTTP/1.1 200 OK\n   {\n     \"Successfully deleted user!\"\n   }\n",
          "type": "json"
        }
      ]
    },
    "error": {
      "examples": [
        {
          "title": "Error-Response:",
          "content": "Error-Response:\n   HTTP/1.1 404 Not Found\n   {\n     \"Failed to delete a user.\"\n   }\n",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "./api.php"
  },
  {
    "type": "get",
    "url": "/user",
    "title": "Read data of all users",
    "name": "GetAllUsers",
    "group": "User",
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "Number",
            "field": "ID",
            "optional": false,
            "description": "<p>Users unique ID.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "field": "firstName",
            "optional": false,
            "description": "<p>First name of the User.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "field": "lastName",
            "optional": false,
            "description": "<p>Last name of the User.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "field": "email",
            "optional": false,
            "description": "<p>Email address of the User.</p>"
          },
          {
            "group": "Success 200",
            "type": "Number",
            "field": "isAdmin",
            "optional": false,
            "description": "<p>Whether the User is an Administrator or not (1 = TRUE | 0 = FALSE)</p>"
          }
        ]
      }
    },
    "version": "0.0.0",
    "filename": "./api.php"
  },
  {
    "type": "get",
    "url": "/user/:id",
    "title": "Read data of a user",
    "name": "GetUser",
    "group": "User",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Number",
            "field": "id",
            "optional": false,
            "description": "<p>Users unique ID.</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "Number",
            "field": "ID",
            "optional": false,
            "description": "<p>Users unique ID.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "field": "firstName",
            "optional": false,
            "description": "<p>First name of the User.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "field": "lastName",
            "optional": false,
            "description": "<p>Last name of the User.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "field": "email",
            "optional": false,
            "description": "<p>Email address of the User.</p>"
          },
          {
            "group": "Success 200",
            "type": "Number",
            "field": "isAdmin",
            "optional": false,
            "description": "<p>Whether the User is an Administrator or not (1 = TRUE | 0 = FALSE)</p>"
          }
        ]
      }
    },
    "error": {
      "examples": [
        {
          "title": "Error-Response:",
          "content": "Error-Response:\n   HTTP/1.1 404 Not Found\n   {\n     \"error\": \"User could not be found\"\n   }\n",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "./api.php"
  },
  {
    "type": "put",
    "url": "/user/:id",
    "title": "Update a user",
    "name": "UpdateUser",
    "group": "User",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Number",
            "field": "id",
            "optional": false,
            "description": "<p>Users unique ID.</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "field": "firstName",
            "optional": false,
            "description": "<p>First name of the User.</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "field": "lastName",
            "optional": false,
            "description": "<p>Last name of the User.</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "field": "email",
            "optional": false,
            "description": "<p>Email address of the User.</p>"
          }
        ]
      }
    },
    "success": {
      "examples": [
        {
          "title": "Success-Response:",
          "content": "Success-Response:\n   HTTP/1.1 200 OK\n   {\n     \"Successfully updated user!\"\n   }\n",
          "type": "json"
        }
      ]
    },
    "error": {
      "examples": [
        {
          "title": "Error-Response:",
          "content": "Error-Response:\n   HTTP/1.1 200 OK\n   {\n     \"Failed to update user.\"\n   }\n",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "./api.php"
  }
] });