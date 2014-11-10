define({ api: [
  {
    "type": "post",
    "url": "api/category",
    "title": "Create a new category",
    "name": "Create_Category",
    "group": "Category",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Number",
            "field": "parentCategoryID",
            "optional": false,
            "description": "<p>Unique ID of the parent Category.</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "field": "name",
            "optional": false,
            "description": "<p>Name of the Category.</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "field": "description",
            "optional": false,
            "description": "<p>Description of the Category.</p>"
          }
        ]
      }
    },
    "success": {
      "examples": [
        {
          "title": "Success-Response:",
          "content": "Success-Response:\n   HTTP/1.1 200 OK\n   {\n     \"return_code\": 0,\n\t \"message\": \"Successfully inserted category!\"\n   }\n",
          "type": "json"
        }
      ]
    },
    "error": {
      "examples": [
        {
          "title": "Error-Response:",
          "content": "Error-Response:\n   HTTP/1.1 200 OK\n   {\n\t \"return_code\": 1,\n     \"message\": \"Failed to insert category.\"\n   }\n",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "./api.php"
  },
  {
    "type": "delete",
    "url": "api/category/id/:id",
    "title": "Delete a category",
    "name": "Delete_Category",
    "group": "Category",
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
          "content": "Success-Response:\n   HTTP/1.1 200 OK\n   {\n     \"return_code\": 0,\n\t \"message\": \"Successfully deleted category!\"\n   }\n",
          "type": "json"
        }
      ]
    },
    "error": {
      "examples": [
        {
          "title": "Error-Response:",
          "content": "Error-Response:\n   HTTP/1.1 404 Not Found\n   {\n     \"return_code\": 1,\n\t \"message\": \"Failed to delete category.\"\n   }\n",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "./api.php"
  },
  {
    "type": "get",
    "url": "api/categories",
    "title": "Read data of all categories",
    "name": "Get_All_Categories",
    "group": "Category",
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "Number",
            "field": "ID",
            "optional": false,
            "description": "<p>Category unique ID.</p>"
          },
          {
            "group": "Success 200",
            "type": "Number",
            "field": "parentCategoryID",
            "optional": false,
            "description": "<p>Unique ID of the parent Category.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "field": "name",
            "optional": false,
            "description": "<p>Name of the Category.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "field": "description",
            "optional": false,
            "description": "<p>Description of the Category.</p>"
          }
        ]
      }
    },
    "version": "0.0.0",
    "filename": "./api.php"
  },
  {
    "type": "get",
    "url": "api/category/id/:id",
    "title": "Read data of a category",
    "name": "Get_Category",
    "group": "Category",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Number",
            "field": "id",
            "optional": false,
            "description": "<p>Category unique ID.</p>"
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
            "description": "<p>Category unique ID.</p>"
          },
          {
            "group": "Success 200",
            "type": "Number",
            "field": "parentCategoryID",
            "optional": false,
            "description": "<p>Unique ID of the parent Category.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "field": "name",
            "optional": false,
            "description": "<p>Name of the Category.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "field": "description",
            "optional": false,
            "description": "<p>Description of the Category.</p>"
          }
        ]
      }
    },
    "error": {
      "examples": [
        {
          "title": "Error-Response:",
          "content": "Error-Response:\n   HTTP/1.1 404 Not Found\n   {\n     \"error\": \"Category could not be found\"\n   }\n",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "./api.php"
  },
  {
    "type": "put",
    "url": "api/category/id/:id",
    "title": "Update a category",
    "name": "Update_Category",
    "group": "Category",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Number",
            "field": "id",
            "optional": false,
            "description": "<p>Category unique ID.</p>"
          },
          {
            "group": "Parameter",
            "type": "Number",
            "field": "parentCategoryID",
            "optional": false,
            "description": "<p>Unique ID of the parent Category.</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "field": "name",
            "optional": false,
            "description": "<p>Name of the Category.</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "field": "description",
            "optional": false,
            "description": "<p>Description of the Category.</p>"
          }
        ]
      }
    },
    "success": {
      "examples": [
        {
          "title": "Success-Response:",
          "content": "Success-Response:\n   HTTP/1.1 200 OK\n   {\n     \"return_code\": 0,\n\t \"message\": \"Successfully updated category!\"\n   }\n",
          "type": "json"
        }
      ]
    },
    "error": {
      "examples": [
        {
          "title": "Error-Response:",
          "content": "Error-Response:\n   HTTP/1.1 200 OK\n   {\n     \"return_code\": 1,\n\t \"message\": \"Failed to update category.\"\n   }\n",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "./api.php"
  },
  {
    "type": "post",
    "url": "api/contact",
    "title": "Create a new contact",
    "name": "Create_Contact",
    "group": "Contact",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Number",
            "field": "resourceID",
            "optional": false,
            "description": "<p>Resource unique ID which the contact belongs to.</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "field": "name",
            "optional": false,
            "description": "<p>Name of the contact.</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "field": "email",
            "optional": false,
            "description": "<p>Email address of the contact.</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "field": "phone",
            "optional": false,
            "description": "<p>Phone number of the contact.</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "field": "description",
            "optional": false,
            "description": "<p>Description of the contact.</p>"
          }
        ]
      }
    },
    "success": {
      "examples": [
        {
          "title": "Success-Response:",
          "content": "Success-Response:\n   HTTP/1.1 200 OK\n   {\n     \"return_code\": 0,\n\t \"message\": \"Successfully inserted contact!\"\n   }\n",
          "type": "json"
        }
      ]
    },
    "error": {
      "examples": [
        {
          "title": "Error-Response:",
          "content": "Error-Response:\n   HTTP/1.1 200 OK\n   {\n     \"return_code\": 1,\n\t \"message\": \"Failed to insert contact.\"\n   }\n",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "./api.php"
  },
  {
    "type": "delete",
    "url": "api/contact/id/:id",
    "title": "Delete a contact",
    "name": "Delete_Contact",
    "group": "Contact",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Number",
            "field": "id",
            "optional": false,
            "description": "<p>Contact unique ID.</p>"
          }
        ]
      }
    },
    "success": {
      "examples": [
        {
          "title": "Success-Response:",
          "content": "Success-Response:\n   HTTP/1.1 200 OK\n   {\n     \"return_code\": 0,\n\t \"message\": \"Successfully deleted contact!\"\n   }\n",
          "type": "json"
        }
      ]
    },
    "error": {
      "examples": [
        {
          "title": "Error-Response:",
          "content": "Error-Response:\n   HTTP/1.1 404 Not Found\n   {\n     \"return_code\": 1,\n\t \"message\": \"Failed to delete a contact.\"\n   }\n",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "./api.php"
  },
  {
    "type": "get",
    "url": "api/contacts",
    "title": "Read data of all contacts",
    "name": "GetAllContacts",
    "group": "Contact",
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "Number",
            "field": "ID",
            "optional": false,
            "description": "<p>Contact unique ID.</p>"
          },
          {
            "group": "Success 200",
            "type": "Number",
            "field": "resourceID",
            "optional": false,
            "description": "<p>Resource unique ID which the contact belongs to.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "field": "name",
            "optional": false,
            "description": "<p>Name of the contact.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "field": "email",
            "optional": false,
            "description": "<p>Email address of the contact.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "field": "phone",
            "optional": false,
            "description": "<p>Phone number of the contact.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "field": "description",
            "optional": false,
            "description": "<p>Description of the contact.</p>"
          }
        ]
      }
    },
    "version": "0.0.0",
    "filename": "./api.php"
  },
  {
    "type": "get",
    "url": "api/contactsByResource/resourceID/:resourceID",
    "title": "Read data of all contacts of a specified resource",
    "name": "Get_All_Contacts_By_Resource",
    "group": "Contact",
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "Number",
            "field": "ID",
            "optional": false,
            "description": "<p>Contact unique ID.</p>"
          },
          {
            "group": "Success 200",
            "type": "Number",
            "field": "resourceID",
            "optional": false,
            "description": "<p>Resource unique ID which the contact belongs to.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "field": "name",
            "optional": false,
            "description": "<p>Name of the contact.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "field": "email",
            "optional": false,
            "description": "<p>Email address of the contact.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "field": "phone",
            "optional": false,
            "description": "<p>Phone number of the contact.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "field": "description",
            "optional": false,
            "description": "<p>Description of the contact.</p>"
          }
        ]
      }
    },
    "version": "0.0.0",
    "filename": "./api.php"
  },
  {
    "type": "get",
    "url": "api/contact/id/:id",
    "title": "Read data of a contact",
    "name": "Get_Contact",
    "group": "Contact",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Number",
            "field": "id",
            "optional": false,
            "description": "<p>Contact unique ID.</p>"
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
            "description": "<p>Contact unique ID.</p>"
          },
          {
            "group": "Success 200",
            "type": "Number",
            "field": "resourceID",
            "optional": false,
            "description": "<p>Resource unique ID which the contact belongs to.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "field": "name",
            "optional": false,
            "description": "<p>Name of the contact.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "field": "email",
            "optional": false,
            "description": "<p>Email address of the contact.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "field": "phone",
            "optional": false,
            "description": "<p>Phone number of the contact.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "field": "description",
            "optional": false,
            "description": "<p>Description of the contact.</p>"
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
    "url": "api/contact/id/:id",
    "title": "Update a contact",
    "name": "Update_Contact",
    "group": "Contact",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Number",
            "field": "id",
            "optional": false,
            "description": "<p>Contact unique ID.</p>"
          },
          {
            "group": "Parameter",
            "type": "Number",
            "field": "resourceID",
            "optional": false,
            "description": "<p>Resource unique ID which the contact belongs to.</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "field": "name",
            "optional": false,
            "description": "<p>Name of the contact.</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "field": "email",
            "optional": false,
            "description": "<p>Email address of the contact.</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "field": "phone",
            "optional": false,
            "description": "<p>Phone number of the contact.</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "field": "description",
            "optional": false,
            "description": "<p>Description of the contact.</p>"
          }
        ]
      }
    },
    "success": {
      "examples": [
        {
          "title": "Success-Response:",
          "content": "Success-Response:\n   HTTP/1.1 200 OK\n   {\n     \"return_code\": 0,\n\t \"message\": \"Successfully updated contact!\"\n   }\n",
          "type": "json"
        }
      ]
    },
    "error": {
      "examples": [
        {
          "title": "Error-Response:",
          "content": "Error-Response:\n   HTTP/1.1 200 OK\n   {\n     \"return_code\": 1,\n\t \"message\": \"Failed to update contact.\"\n   }\n",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "./api.php"
  },
  {
    "type": "post",
    "url": "api/resource",
    "title": "Create a community resource",
    "name": "Create_Resource",
    "group": "Resource",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Number",
            "field": "categoryID",
            "optional": false,
            "description": "<p>Category unique ID which the resource belongs to.</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "field": "name",
            "optional": false,
            "description": "<p>Name of the resource.</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "field": "phone",
            "optional": false,
            "description": "<p>Phone number of the resource.</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "field": "address",
            "optional": false,
            "description": "<p>Street address of the resource.</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "field": "city",
            "optional": false,
            "description": "<p>City of the resource.</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "field": "state",
            "optional": false,
            "description": "<p>State of the resource.</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "field": "zip",
            "optional": false,
            "description": "<p>Zip code of the resource.</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "field": "description",
            "optional": false,
            "description": "<p>Description of the resource.</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "field": "serviceHours",
            "optional": false,
            "description": "<p>Service hours of the resource.</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "field": "eligibility",
            "optional": false,
            "description": "<p>Eligibility requirements for the resource.</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "field": "intakeProcedure",
            "optional": false,
            "description": "<p>Intake procedure of the resource.</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "field": "documents",
            "optional": false,
            "description": "<p>Documents required by the resource.</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "field": "fees",
            "optional": false,
            "description": "<p>Fees associated with the resource.</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "field": "languages",
            "optional": false,
            "description": "<p>Languages supported by the resource.</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "field": "services",
            "optional": false,
            "description": "<p>Services offered by the resource.</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "field": "website",
            "optional": false,
            "description": "<p>Website of the resource.</p>"
          }
        ]
      }
    },
    "success": {
      "examples": [
        {
          "title": "Success-Response:",
          "content": "Success-Response:\n   HTTP/1.1 200 OK\n   {\n     \"return_code\": 0,\n\t \"message\": \"Successfully inserted community resource!\"\n   }\n",
          "type": "json"
        }
      ]
    },
    "error": {
      "examples": [
        {
          "title": "Error-Response:",
          "content": "Error-Response:\n   HTTP/1.1 200 OK\n   {\n     \"return_code\": 1,\n\t \"message\": \"Failed to insert community resource.\"\n   }\n",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "./api.php"
  },
  {
    "type": "delete",
    "url": "api/resource/id/:id",
    "title": "Delete a community resource",
    "name": "Delete_Resource",
    "group": "Resource",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Number",
            "field": "id",
            "optional": false,
            "description": "<p>Resource unique ID.</p>"
          }
        ]
      }
    },
    "success": {
      "examples": [
        {
          "title": "Success-Response:",
          "content": "Success-Response:\n   HTTP/1.1 200 OK\n   {\n     \"return_code\": 0,\n\t \"message\": \"Successfully deleted community resource!\"\n   }\n",
          "type": "json"
        }
      ]
    },
    "error": {
      "examples": [
        {
          "title": "Error-Response:",
          "content": "Error-Response:\n   HTTP/1.1 404 Not Found\n   {\n     \"return_code\": 1,\n\t \"message\": \"Failed to delete community resource.\"\n   }\n",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "./api.php"
  },
  {
    "type": "get",
    "url": "api/resources",
    "title": "Read data of all community resources",
    "name": "Get_All_Resources",
    "group": "Resource",
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
            "type": "Number",
            "field": "categoryID",
            "optional": false,
            "description": "<p>Category unique ID which the resource belongs to.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "field": "name",
            "optional": false,
            "description": "<p>Name of the resource.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "field": "phone",
            "optional": false,
            "description": "<p>Phone number of the resource.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "field": "address",
            "optional": false,
            "description": "<p>Street address of the resource.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "field": "city",
            "optional": false,
            "description": "<p>City of the resource.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "field": "state",
            "optional": false,
            "description": "<p>State of the resource.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "field": "zip",
            "optional": false,
            "description": "<p>Zip code of the resource.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "field": "description",
            "optional": false,
            "description": "<p>Description of the resource.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "field": "serviceHours",
            "optional": false,
            "description": "<p>Service hours of the resource.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "field": "eligibility",
            "optional": false,
            "description": "<p>Eligibility requirements for the resource.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "field": "intakeProcedure",
            "optional": false,
            "description": "<p>Intake procedure of the resource.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "field": "documents",
            "optional": false,
            "description": "<p>Documents required by the resource.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "field": "fees",
            "optional": false,
            "description": "<p>Fees associated with the resource.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "field": "languages",
            "optional": false,
            "description": "<p>Languages supported by the resource.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "field": "services",
            "optional": false,
            "description": "<p>Services offered by the resource.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "field": "website",
            "optional": false,
            "description": "<p>Website of the resource.</p>"
          }
        ]
      }
    },
    "version": "0.0.0",
    "filename": "./api.php"
  },
  {
    "type": "get",
    "url": "api/resource/id/:id",
    "title": "Read data of a community resource",
    "name": "Get_Resource",
    "group": "Resource",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Number",
            "field": "id",
            "optional": false,
            "description": "<p>Resource unique ID.</p>"
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
            "type": "Number",
            "field": "categoryID",
            "optional": false,
            "description": "<p>Category unique ID which the resource belongs to.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "field": "name",
            "optional": false,
            "description": "<p>Name of the resource.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "field": "phone",
            "optional": false,
            "description": "<p>Phone number of the resource.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "field": "address",
            "optional": false,
            "description": "<p>Street address of the resource.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "field": "city",
            "optional": false,
            "description": "<p>City of the resource.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "field": "state",
            "optional": false,
            "description": "<p>State of the resource.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "field": "zip",
            "optional": false,
            "description": "<p>Zip code of the resource.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "field": "description",
            "optional": false,
            "description": "<p>Description of the resource.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "field": "serviceHours",
            "optional": false,
            "description": "<p>Service hours of the resource.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "field": "eligibility",
            "optional": false,
            "description": "<p>Eligibility requirements for the resource.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "field": "intakeProcedure",
            "optional": false,
            "description": "<p>Intake procedure of the resource.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "field": "documents",
            "optional": false,
            "description": "<p>Documents required by the resource.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "field": "fees",
            "optional": false,
            "description": "<p>Fees associated with the resource.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "field": "languages",
            "optional": false,
            "description": "<p>Languages supported by the resource.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "field": "services",
            "optional": false,
            "description": "<p>Services offered by the resource.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "field": "website",
            "optional": false,
            "description": "<p>Website of the resource.</p>"
          }
        ]
      }
    },
    "error": {
      "examples": [
        {
          "title": "Error-Response:",
          "content": "Error-Response:\n   HTTP/1.1 404 Not Found\n   {\n     \"error\": \"Resource could not be found\"\n   }\n",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "./api.php"
  },
  {
    "type": "put",
    "url": "api/resource/id/:id",
    "title": "Update a community resource",
    "name": "Update_Resource",
    "group": "Resource",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Number",
            "field": "id",
            "optional": false,
            "description": "<p>Resource unique ID.</p>"
          },
          {
            "group": "Parameter",
            "type": "Number",
            "field": "categoryID",
            "optional": false,
            "description": "<p>Category unique ID which the resource belongs to.</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "field": "name",
            "optional": false,
            "description": "<p>Name of the resource.</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "field": "phone",
            "optional": false,
            "description": "<p>Phone number of the resource.</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "field": "address",
            "optional": false,
            "description": "<p>Street address of the resource.</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "field": "city",
            "optional": false,
            "description": "<p>City of the resource.</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "field": "state",
            "optional": false,
            "description": "<p>State of the resource.</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "field": "zip",
            "optional": false,
            "description": "<p>Zip code of the resource.</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "field": "description",
            "optional": false,
            "description": "<p>Description of the resource.</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "field": "serviceHours",
            "optional": false,
            "description": "<p>Service hours of the resource.</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "field": "eligibility",
            "optional": false,
            "description": "<p>Eligibility requirements for the resource.</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "field": "intakeProcedure",
            "optional": false,
            "description": "<p>Intake procedure of the resource.</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "field": "documents",
            "optional": false,
            "description": "<p>Documents required by the resource.</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "field": "fees",
            "optional": false,
            "description": "<p>Fees associated with the resource.</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "field": "languages",
            "optional": false,
            "description": "<p>Languages supported by the resource.</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "field": "services",
            "optional": false,
            "description": "<p>Services offered by the resource.</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "field": "website",
            "optional": false,
            "description": "<p>Website of the resource.</p>"
          }
        ]
      }
    },
    "success": {
      "examples": [
        {
          "title": "Success-Response:",
          "content": "Success-Response:\n   HTTP/1.1 200 OK\n   {\n     \"return_code\": 0,\n\t \"message\": \"Successfully updated community resource!\"\n   }\n",
          "type": "json"
        }
      ]
    },
    "error": {
      "examples": [
        {
          "title": "Error-Response:",
          "content": "Error-Response:\n   HTTP/1.1 200 OK\n   {\n     \"return_code\": 1,\n\t \"message\": \"Failed to update community resource.\"\n   }\n",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "./api.php"
  },
  {
    "type": "post",
    "url": "api/user",
    "title": "Create a new user",
    "name": "Create_User",
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
          "content": "Success-Response:\n   HTTP/1.1 200 OK\n   {\n     \"return_code\": 0,\n\t \"message\": \"Successfully inserted user!\"\n   }\n",
          "type": "json"
        }
      ]
    },
    "error": {
      "examples": [
        {
          "title": "Error-Response:",
          "content": "Error-Response:\n   HTTP/1.1 200 OK\n   {\n     \"return_code\": 1,\n\t \"message\": \"Failed to insert user.\"\n   }\n",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "./api.php"
  },
  {
    "type": "delete",
    "url": "api/user/id/:id",
    "title": "Delete a user",
    "name": "Delete_User",
    "group": "User",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Number",
            "field": "id",
            "optional": false,
            "description": "<p>User unique ID.</p>"
          }
        ]
      }
    },
    "success": {
      "examples": [
        {
          "title": "Success-Response:",
          "content": "Success-Response:\n   HTTP/1.1 200 OK\n   {\n     \"return_code\": 0,\n\t \"message\": \"Successfully deleted user!\"\n   }\n",
          "type": "json"
        }
      ]
    },
    "error": {
      "examples": [
        {
          "title": "Error-Response:",
          "content": "Error-Response:\n   HTTP/1.1 404 Not Found\n   {\n     \"return_code\": 1,\n\t \"message\": \"Failed to delete user.\"\n   }\n",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "./api.php"
  },
  {
    "type": "get",
    "url": "api/user",
    "title": "Read data of all users",
    "name": "Get_All_Users",
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
    "url": "api/user/id/:id",
    "title": "Read data of a user",
    "name": "Get_User",
    "group": "User",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Number",
            "field": "id",
            "optional": false,
            "description": "<p>User unique ID.</p>"
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
            "description": "<p>User unique ID.</p>"
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
    "type": "post",
    "url": "api/userByEmail",
    "title": "Read data of a user searched by email",
    "name": "Get_User_By_Email",
    "group": "User",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "String",
            "field": "email",
            "optional": false,
            "description": "<p>User unique email.</p>"
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
            "description": "<p>User unique ID.</p>"
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
    "type": "post",
    "url": "api/userByPassword",
    "title": "Read data of a user searched by email and password",
    "name": "Get_User_By_Password",
    "group": "User",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "String",
            "field": "email",
            "optional": false,
            "description": "<p>User unique email.</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "field": "password",
            "optional": false,
            "description": "<p>User password.</p>"
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
            "description": "<p>User unique ID.</p>"
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
    "url": "api/user/id/:id",
    "title": "Update a user",
    "name": "Update_User",
    "group": "User",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Number",
            "field": "id",
            "optional": false,
            "description": "<p>User unique ID.</p>"
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
          "content": "Success-Response:\n   HTTP/1.1 200 OK\n   {\n     \"return_code\": 0,\n\t \"message\": \"Successfully updated user!\"\n   }\n",
          "type": "json"
        }
      ]
    },
    "error": {
      "examples": [
        {
          "title": "Error-Response:",
          "content": "Error-Response:\n   HTTP/1.1 200 OK\n   {\n     \"return_code\": 1,\n\t \"message\": \"Failed to update user.\"\n   }\n",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "./api.php"
  }
] });