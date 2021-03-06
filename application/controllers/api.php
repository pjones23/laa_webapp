<?php
header("Access-Control-Allow-Origin: *");
require(APPPATH.'/libraries/REST_Controller.php');
require_once(APPPATH.'/models/category.php');
require_once(APPPATH.'/models/contact.php');
require_once(APPPATH.'/models/resource.php');
require_once(APPPATH.'/models/user.php');
 
class API extends REST_Controller
{
	/**
	 * @api {get} api/user/id/:id Read data of a user
	 * @apiName Get User
	 * @apiGroup User
	 *
	 * @apiParam {Number} id User unique ID.
	 *
	 * @apiSuccess {Number} ID User unique ID.
	 * @apiSuccess {String} firstName First name of the User.
	 * @apiSuccess {String} lastName Last name of the User.
	 * @apiSuccess {String} email Email address of the User.
	 * @apiSuccess {Number} isAdmin Whether the User is an Administrator or not (1 = TRUE | 0 = FALSE)
	 * 
	 * @apiErrorExample Error-Response:
	 *     HTTP/1.1 404 Not Found
	 *     {
	 *       "error": "User could not be found"
	 *     }
	 * 
	 */
	function user_get()
    {
        if(!$this->get('id'))
        {
        	$this->response(NULL, 400);
        }

		$user = User::read($this->get('id'));
    	
        if($user)
        {
            $this->response($user, 200); // 200 being the HTTP response code
        }

        else
        {
            $this->response(array('error' => 'User could not be found'), 404);
        }
    }
    
	/**
	 * @api {post} api/user Create a new user
	 * @apiName Create User
	 * @apiGroup User
	 *
	 * @apiParam {String} firstName First name of the User.
	 * @apiParam {String} lastName Last name of the User.
	 * @apiParam {String} email Email address of the User.
	 * @apiParam {String} password Password of the User.
	 * @apiParam {Number} isAdmin Whether the User is an Administrator or not (1 = TRUE | 0 = FALSE)
	 * 
	 * @apiSuccessExample Success-Response:
	 *     HTTP/1.1 200 OK
	 *     {
	 *       "return_code": 0,
	 * 		 "message": "Successfully inserted user!"
	 *     }
	 * 
	 * @apiErrorExample Error-Response:
	 *     HTTP/1.1 200 OK
	 *     {
	 *       "return_code": 1,
	 * 		 "message": "Failed to insert user."
	 *     }
	 * 
	 */
    function user_post()
    {
        $success = User::create($this->post('firstName'),
        	$this->post('lastName'),
        	$this->post('email'),
        	$this->post('password'),
        	$this->post('isAdmin'));
        
        $message = ($success) ? array("return_code" => 0, "message" => "Successfully inserted user!") : array("return_code" => 1, "message" => "Failed to insert user.");
        $this->response($message, 200); // 200 being the HTTP response code
    }
    
	/**
	 * @api {put} api/user/id/:id Update a user
	 * @apiName Update User
	 * @apiGroup User
	 *
	 * @apiParam {Number} id User unique ID.
	 * @apiParam {String} firstName First name of the User.
	 * @apiParam {String} lastName Last name of the User.
	 * @apiParam {String} email Email address of the User.
	 * 
	 * @apiSuccessExample Success-Response:
	 *     HTTP/1.1 200 OK
	 *     {
	 *       "return_code": 0,
	 * 		 "message": "Successfully updated user!"
	 *     }
	 * 
	 * @apiErrorExample Error-Response:
	 *     HTTP/1.1 200 OK
	 *     {
	 *       "return_code": 1,
	 * 		 "message": "Failed to update user."
	 *     }
	 * 
	 */
    function user_put()
    {
        $success = User::update($this->get('id'),
        	$this->put('firstName'),
        	$this->put('lastName'),
        	$this->put('email'));
			
        $message = ($success) ? array("return_code" => 0, "message" => "Successfully updated user!") : array("return_code" => 1, "message" => "Failed to update user.");
        $this->response($message, 200); // 200 being the HTTP response code 
    }
    
	/**
	 * @api {delete} api/user/id/:id Delete a user
	 * @apiName Delete User
	 * @apiGroup User
	 *
	 * @apiParam {Number} id User unique ID.
	 *
	 * @apiSuccessExample Success-Response:
	 *     HTTP/1.1 200 OK
	 *     {
	 *       "return_code": 0,
	 * 		 "message": "Successfully deleted user!"
	 *     }
	 * 
	 * @apiErrorExample Error-Response:
	 *     HTTP/1.1 404 Not Found
	 *     {
	 *       "return_code": 1,
	 * 		 "message": "Failed to delete user."
	 *     }
	 * 
	 */
    function user_delete()
    {
    	$success = User::delete($this->get('id'));
        
        $message = ($success) ? array("return_code" => 0, "message" => "Successfully deleted user!") : array("return_code" => 1, "message" => "Failed to delete user.");
        $this->response($message, 200); // 200 being the HTTP response code
    }
    
	/**
	 * @api {get} api/user Read data of all users
	 * @apiName Get All Users
	 * @apiGroup User
	 *
	 *
	 * @apiSuccess {Number} ID Users unique ID.
	 * @apiSuccess {String} firstName First name of the User.
	 * @apiSuccess {String} lastName Last name of the User.
	 * @apiSuccess {String} email Email address of the User.
	 * @apiSuccess {Number} isAdmin Whether the User is an Administrator or not (1 = TRUE | 0 = FALSE)
	 * 
	 */
    function users_get()
    {
        $users = User::readAll();
        
        if($users)
        {
            $this->response($users, 200); // 200 being the HTTP response code
        }
	}
	
	/**
	 * @api {post} api/userByEmail Read data of a user searched by email
	 * @apiName Get User By Email
	 * @apiGroup User
	 *
	 * @apiParam {String} email User unique email.
	 *
	 * @apiSuccess {Number} ID User unique ID.
	 * @apiSuccess {String} firstName First name of the User.
	 * @apiSuccess {String} lastName Last name of the User.
	 * @apiSuccess {String} email Email address of the User.
	 * @apiSuccess {Number} isAdmin Whether the User is an Administrator or not (1 = TRUE | 0 = FALSE)
	 * 
	 * @apiErrorExample Error-Response:
	 *     HTTP/1.1 404 Not Found
	 *     {
	 *       "error": "User could not be found"
	 *     }
	 * 
	 */
	function userByEmail_post()
    {
        if(!$this->post('email'))
        {
        	$this->response(NULL, 400);
        }

		$user = User::readUserByEmail($this->post('email'));
    	
        if($user)
        {
            $this->response($user, 200); // 200 being the HTTP response code
        }

        else
        {
            $this->response(array('error' => 'User could not be found'), 404);
        }
    }
	
	/**
	 * @api {post} api/userByPassword Read data of a user searched by email and password
	 * @apiName Get User By Password
	 * @apiGroup User
	 *
	 * @apiParam {String} email User unique email.
	 * @apiParam {String} password User password.
	 *
	 * @apiSuccess {Number} ID User unique ID.
	 * @apiSuccess {String} firstName First name of the User.
	 * @apiSuccess {String} lastName Last name of the User.
	 * @apiSuccess {String} email Email address of the User.
	 * @apiSuccess {Number} isAdmin Whether the User is an Administrator or not (1 = TRUE | 0 = FALSE)
	 * 
	 * @apiErrorExample Error-Response:
	 *     HTTP/1.1 404 Not Found
	 *     {
	 *       "error": "User could not be found"
	 *     }
	 * 
	 */
	function userByPassword_post()
    {
        if(!$this->post('email') || !$this->post('password'))
        {
        	$this->response(NULL, 400);
        }

		$user = User::readUserByEmailAndPassword($this->post('email'), $this->post('password'));
    	
        if($user)
        {
            $this->response($user, 200); // 200 being the HTTP response code
        }

        else
        {
            $this->response(array('error' => 'User could not be found'), 404);
        }
    }

	/**
	 * @api {get} api/category/id/:id Read data of a category
	 * @apiName Get Category
	 * @apiGroup Category
	 *
	 * @apiParam {Number} id Category unique ID.
	 *
	 * @apiSuccess {Number} ID Category unique ID.
	 * @apiSuccess {Number} parentCategoryID Unique ID of the parent Category.
	 * @apiSuccess {String} name Name of the Category.
	 * @apiSuccess {String} description Description of the Category.
	 * 
	 * @apiErrorExample Error-Response:
	 *     HTTP/1.1 404 Not Found
	 *     {
	 *       "error": "Category could not be found"
	 *     }
	 * 
	 */
    function category_get()
    {
        if(!$this->get('id'))
        {
        	$this->response(NULL, 400);
        }

        $category = Category::read($this->get('id'));
    	
        if($category)
        {
            $this->response($category, 200); // 200 being the HTTP response code
        }
        else
        {
            $this->response(array('error' => 'Category could not be found'), 404);
        }
    }

	/**
	 * @api {post} api/category Create a new category
	 * @apiName Create Category
	 * @apiGroup Category
	 *
	 * @apiParam {Number} parentCategoryID Unique ID of the parent Category.
	 * @apiParam {String} name Name of the Category.
	 * @apiParam {String} description Description of the Category.
	 * 
	 * @apiSuccessExample Success-Response:
	 *     HTTP/1.1 200 OK
	 *     {
	 *       "return_code": 0,
	 * 		 "message": "Successfully inserted category!"
	 *     }
	 * 
	 * @apiErrorExample Error-Response:
	 *     HTTP/1.1 200 OK
	 *     {
	 * 		 "return_code": 1,
	 *       "message": "Failed to insert category."
	 *     }
	 * 
	 */
    function category_post()
    {
        $success = Category::create($this->post('parentCategoryID'),
        	$this->post('name'),
        	$this->post('description'));
        
        $message = ($success) ? array("return_code" => 0, "message" => "Successfully inserted category!") : array("return_code" => 1, "message" => "Failed to insert category.");
        $this->response($message, 200); // 200 being the HTTP response code
    }
    
	/**
	 * @api {put} api/category/id/:id Update a category
	 * @apiName Update Category
	 * @apiGroup Category
	 *
	 * @apiParam {Number} id Category unique ID.
	 * @apiParam {Number} parentCategoryID Unique ID of the parent Category.
	 * @apiParam {String} name Name of the Category.
	 * @apiParam {String} description Description of the Category.
	 * 
	 * @apiSuccessExample Success-Response:
	 *     HTTP/1.1 200 OK
	 *     {
	 *       "return_code": 0,
	 * 		 "message": "Successfully updated category!"
	 *     }
	 * 
	 * @apiErrorExample Error-Response:
	 *     HTTP/1.1 200 OK
	 *     {
	 *       "return_code": 1,
	 * 		 "message": "Failed to update category."
	 *     }
	 * 
	 */
    function category_put()
    {
        $success = Category::update($this->get('id'),
        	$this->put('parentCategoryID'),
        	$this->put('name'),
        	$this->put('description'));
         
        $message = ($success) ? array("return_code" => 0, "message" => "Successfully updated category!") : array("return_code" => 1, "message" => "Failed to update category.");
        $this->response($message, 200); // 200 being the HTTP response code
    }
    
	/**
	 * @api {delete} api/category/id/:id Delete a category
	 * @apiName Delete Category
	 * @apiGroup Category
	 *
	 * @apiParam {Number} id Users unique ID.
	 *
	 * @apiSuccessExample Success-Response:
	 *     HTTP/1.1 200 OK
	 *     {
	 *       "return_code": 0,
	 * 		 "message": "Successfully deleted category!"
	 *     }
	 * 
	 * @apiErrorExample Error-Response:
	 *     HTTP/1.1 404 Not Found
	 *     {
	 *       "return_code": 1,
	 * 		 "message": "Failed to delete category."
	 *     }
	 * 
	 */
    function category_delete()
    {
        $success = Category::delete($this->get('id'));
        
        $message = ($success) ? array("return_code" => 0, "message" => "Successfully deleted category!") : array("return_code" => 1, "message" => "Failed to delete category.");
        $this->response($message, 200); // 200 being the HTTP response code
	}
    
	/**
	 * @api {get} api/categories Read data of all categories
	 * @apiName Get All Categories
	 * @apiGroup Category
	 *
	 * @apiSuccess {Number} ID Category unique ID.
	 * @apiSuccess {Number} parentCategoryID Unique ID of the parent Category.
	 * @apiSuccess {String} name Name of the Category.
	 * @apiSuccess {String} description Description of the Category.
	 * 
	 */
    function categories_get()
    {
        $categories = Category::readAll();
        
        if($categories)
        {
            $this->response($categories, 200); // 200 being the HTTP response code
        }
    }
    
	/**
	 * @api {get} api/resource/id/:id Read data of a community resource
	 * @apiName Get Resource
	 * @apiGroup Resource
	 *
	 * @apiParam {Number} id Resource unique ID.
	 *
	 * @apiSuccess {Number} ID Users unique ID.
	 * @apiSuccess {Number} categoryID Category unique ID which the resource belongs to.
	 * @apiSuccess {String} name Name of the resource.
	 * @apiSuccess {String} phone Phone number of the resource.
	 * @apiSuccess {String} address Street address of the resource.
	 * @apiSuccess {String} city City of the resource.
	 * @apiSuccess {String} state State of the resource.
	 * @apiSuccess {String} zip Zip code of the resource.
	 * @apiSuccess {String} description Description of the resource.
	 * @apiSuccess {String} serviceHours Service hours of the resource.
	 * @apiSuccess {String} eligibility Eligibility requirements for the resource.
	 * @apiSuccess {String} intakeProcedure Intake procedure of the resource.
	 * @apiSuccess {String} documents Documents required by the resource.
	 * @apiSuccess {String} fees Fees associated with the resource.
	 * @apiSuccess {String} languages Languages supported by the resource.
	 * @apiSuccess {String} services Services offered by the resource.
	 * @apiSuccess {String} website Website of the resource.
	 * 
	 * @apiErrorExample Error-Response:
	 *     HTTP/1.1 404 Not Found
	 *     {
	 *       "error": "Resource could not be found"
	 *     }
	 * 
	 */
    function resource_get()
    {
        if(!$this->get('id'))
        {
        	$this->response(NULL, 400);
        }

        $resource = Resource::read($this->get('id'));
    	
        if($resource)
        {
            $this->response($resource, 200); // 200 being the HTTP response code
        }
        else
        {
            $this->response(array('error' => 'Community resource could not be found'), 404);
        }
    }
    
	/**
	 * @api {post} api/resource Create a community resource
	 * @apiName Create Resource
	 * @apiGroup Resource
	 *
	 * @apiParam {Number} categoryID Category unique ID which the resource belongs to.
	 * @apiParam {String} name Name of the resource.
	 * @apiParam {String} phone Phone number of the resource.
	 * @apiParam {String} address Street address of the resource.
	 * @apiParam {String} city City of the resource.
	 * @apiParam {String} state State of the resource.
	 * @apiParam {String} zip Zip code of the resource.
	 * @apiParam {String} description Description of the resource.
	 * @apiParam {String} serviceHours Service hours of the resource.
	 * @apiParam {String} eligibility Eligibility requirements for the resource.
	 * @apiParam {String} intakeProcedure Intake procedure of the resource.
	 * @apiParam {String} documents Documents required by the resource.
	 * @apiParam {String} fees Fees associated with the resource.
	 * @apiParam {String} languages Languages supported by the resource.
	 * @apiParam {String} services Services offered by the resource.
	 * @apiParam {String} website Website of the resource.
	 * 
	 * @apiSuccessExample Success-Response:
	 *     HTTP/1.1 200 OK
	 *     {
	 *       "return_code": 0,
	 * 		 "message": "Successfully inserted community resource!"
	 *     }
	 * 
	 * @apiErrorExample Error-Response:
	 *     HTTP/1.1 200 OK
	 *     {
	 *       "return_code": 1,
	 * 		 "message": "Failed to insert community resource."
	 *     }
	 * 
	 */
    function resource_post()
    {
        $success = Resource::create($this->post('categoryID'),
        	$this->post('name'),
        	$this->post('phone'),
        	$this->post('email'),
        	$this->post('address'),
        	$this->post('city'),
        	$this->post('state'),
        	$this->post('zip'),
        	$this->post('description'),
        	$this->post('serviceHours'),
        	$this->post('eligibility'),
        	$this->post('intakeProcedure'),
        	$this->post('documents'),
        	$this->post('fees'),
        	$this->post('languages'),
        	$this->post('services'),
        	$this->post('website'));
        
        $message = ($success) ? array("return_code" => 0, "message" => "Successfully inserted community resource!") : array("return_code" => 1, "message" => "Failed to insert community resource.");
        $this->response($message, 200); // 200 being the HTTP response code
    }
    
	/**
	 * @api {put} api/resource/id/:id Update a community resource
	 * @apiName Update Resource
	 * @apiGroup Resource
	 *
	 * @apiParam {Number} id Resource unique ID.
	 * @apiParam {Number} categoryID Category unique ID which the resource belongs to.
	 * @apiParam {String} name Name of the resource.
	 * @apiParam {String} phone Phone number of the resource.
	 * @apiParam {String} address Street address of the resource.
	 * @apiParam {String} city City of the resource.
	 * @apiParam {String} state State of the resource.
	 * @apiParam {String} zip Zip code of the resource.
	 * @apiParam {String} description Description of the resource.
	 * @apiParam {String} serviceHours Service hours of the resource.
	 * @apiParam {String} eligibility Eligibility requirements for the resource.
	 * @apiParam {String} intakeProcedure Intake procedure of the resource.
	 * @apiParam {String} documents Documents required by the resource.
	 * @apiParam {String} fees Fees associated with the resource.
	 * @apiParam {String} languages Languages supported by the resource.
	 * @apiParam {String} services Services offered by the resource.
	 * @apiParam {String} website Website of the resource.
	 * 
	 * @apiSuccessExample Success-Response:
	 *     HTTP/1.1 200 OK
	 *     {
	 *       "return_code": 0,
	 * 		 "message": "Successfully updated community resource!"
	 *     }
	 * 
	 * @apiErrorExample Error-Response:
	 *     HTTP/1.1 200 OK
	 *     {
	 *       "return_code": 1,
	 * 		 "message": "Failed to update community resource."
	 *     }
	 * 
	 */
    function resource_put()
    {
        $success = Resource::update($this->get('id'),
        	$this->put('categoryID'),
        	$this->put('name'),
        	$this->put('phone'),
        	$this->put('email'),
        	$this->put('address'),
        	$this->put('city'),
        	$this->put('state'),
        	$this->put('zip'),
        	$this->put('description'),
        	$this->put('serviceHours'),
        	$this->put('eligibility'),
        	$this->put('intakeProcedure'),
        	$this->put('documents'),
        	$this->put('fees'),
        	$this->put('languages'),
        	$this->put('services'),
        	$this->put('website'));
         
        $message = ($success) ? array("return_code" => 0, "message" => "Successfully updated community resource!") : array("return_code" => 1, "message" => "Failed to update community resource.");
        $this->response($message, 200); // 200 being the HTTP response code
    }
    
	/**
	 * @api {delete} api/resource/id/:id Delete a community resource
	 * @apiName Delete Resource
	 * @apiGroup Resource
	 *
	 * @apiParam {Number} id Resource unique ID.
	 *
	 * @apiSuccessExample Success-Response:
	 *     HTTP/1.1 200 OK
	 *     {
	 *       "return_code": 0,
	 * 		 "message": "Successfully deleted community resource!"
	 *     }
	 * 
	 * @apiErrorExample Error-Response:
	 *     HTTP/1.1 404 Not Found
	 *     {
	 *       "return_code": 1,
	 * 		 "message": "Failed to delete community resource."
	 *     }
	 * 
	 */
    function resource_delete()
    {
        $success = Resource::delete($this->get('id'));
        
        $message = ($success) ? array("return_code" => 0, "message" => "Successfully deleted community resource!") : array("return_code" => 1, "message" => "Failed to delete community resource.");
        $this->response($message, 200); // 200 being the HTTP response code
    }
    
	/**
	 * @api {get} api/resources Read data of all community resources
	 * @apiName Get All Resources
	 * @apiGroup Resource
	 *
	 * @apiSuccess {Number} ID Users unique ID.
	 * @apiSuccess {Number} categoryID Category unique ID which the resource belongs to.
	 * @apiSuccess {String} name Name of the resource.
	 * @apiSuccess {String} phone Phone number of the resource.
	 * @apiSuccess {String} address Street address of the resource.
	 * @apiSuccess {String} city City of the resource.
	 * @apiSuccess {String} state State of the resource.
	 * @apiSuccess {String} zip Zip code of the resource.
	 * @apiSuccess {String} description Description of the resource.
	 * @apiSuccess {String} serviceHours Service hours of the resource.
	 * @apiSuccess {String} eligibility Eligibility requirements for the resource.
	 * @apiSuccess {String} intakeProcedure Intake procedure of the resource.
	 * @apiSuccess {String} documents Documents required by the resource.
	 * @apiSuccess {String} fees Fees associated with the resource.
	 * @apiSuccess {String} languages Languages supported by the resource.
	 * @apiSuccess {String} services Services offered by the resource.
	 * @apiSuccess {String} website Website of the resource.
	 * 
	 */
    function resources_get()
    {
        $resources = Resource::readAll();
        
        if($resources)
        {
            $this->response($resources, 200); // 200 being the HTTP response code
        }
    }
	
	/**
	 * @api {get} api/resourcesByCategory/categoryID/:categoryID Read data of community resources for a specified category
	 * @apiName Get All Resources By Category
	 * @apiGroup Resource
	 *
	 * @apiParam {Number} categoryID Category unique ID.
	 *
	 * @apiSuccess {Number} ID Users unique ID.
	 * @apiSuccess {Number} categoryID Category unique ID which the resource belongs to.
	 * @apiSuccess {String} name Name of the resource.
	 * @apiSuccess {String} phone Phone number of the resource.
	 * @apiSuccess {String} address Street address of the resource.
	 * @apiSuccess {String} city City of the resource.
	 * @apiSuccess {String} state State of the resource.
	 * @apiSuccess {String} zip Zip code of the resource.
	 * @apiSuccess {String} description Description of the resource.
	 * @apiSuccess {String} serviceHours Service hours of the resource.
	 * @apiSuccess {String} eligibility Eligibility requirements for the resource.
	 * @apiSuccess {String} intakeProcedure Intake procedure of the resource.
	 * @apiSuccess {String} documents Documents required by the resource.
	 * @apiSuccess {String} fees Fees associated with the resource.
	 * @apiSuccess {String} languages Languages supported by the resource.
	 * @apiSuccess {String} services Services offered by the resource.
	 * @apiSuccess {String} website Website of the resource.
	 * 
	 * @apiErrorExample Error-Response:
	 *     HTTP/1.1 404 Not Found
	 *     {
	 *       "error": "Resource could not be found"
	 *     }
	 * 
	 */
    function resourcesByCategory_get()
    {
        if(!$this->get('categoryID'))
        {
        	$this->response(NULL, 400);
        }

        $resources = Resource::readAllByCategory($this->get('categoryID'));
    	
        if($resources)
        {
            $this->response($resources, 200); // 200 being the HTTP response code
        }
        else
        {
            $this->response(array('error' => 'Community resources could not be found for category'), 404);
        }
    }
    
	/**
	 * @api {get} api/contact/id/:id Read data of a contact
	 * @apiName Get Contact
	 * @apiGroup Contact
	 *
	 * @apiParam {Number} id Contact unique ID.
	 *
	 * @apiSuccess {Number} ID Contact unique ID.
	 * @apiSuccess {Number} resourceID Resource unique ID which the contact belongs to.
	 * @apiSuccess {String} name Name of the contact.
	 * @apiSuccess {String} email Email address of the contact.
	 * @apiSuccess {String} phone Phone number of the contact.
	 * @apiSuccess {String} description Description of the contact.
	 * 
	 * @apiErrorExample Error-Response:
	 *     HTTP/1.1 404 Not Found
	 *     {
	 *       "error": "User could not be found"
	 *     }
	 * 
	 */
    function contact_get()
    {
        if(!$this->get('id'))
        {
        	$this->response(NULL, 400);
        }

        $contact = Contact::read($this->get('id'));
    	
        if($contact)
        {
            $this->response($contact, 200); // 200 being the HTTP response code
        }
        else
        {
            $this->response(array('error' => 'Contact could not be found'), 404);
        }
    }
    
	/**
	 * @api {post} api/contact Create a new contact
	 * @apiName Create Contact
	 * @apiGroup Contact
	 *
	 * @apiParam {Number} resourceID Resource unique ID which the contact belongs to.
	 * @apiParam {String} name Name of the contact.
	 * @apiParam {String} email Email address of the contact.
	 * @apiParam {String} phone Phone number of the contact.
	 * @apiParam {String} description Description of the contact.
	 * 
	 * @apiSuccessExample Success-Response:
	 *     HTTP/1.1 200 OK
	 *     {
	 *       "return_code": 0,
	 * 		 "message": "Successfully inserted contact!"
	 *     }
	 * 
	 * @apiErrorExample Error-Response:
	 *     HTTP/1.1 200 OK
	 *     {
	 *       "return_code": 1,
	 * 		 "message": "Failed to insert contact."
	 *     }
	 * 
	 */
    function contact_post()
    {
        $success = Contact::create($this->post('resourceID'),
        	$this->post('name'),
        	$this->post('email'),
        	$this->post('phone'),
        	$this->post('description'));
        
        $message = ($success) ? array("return_code" => 0, "message" => "Successfully inserted contact!") : array("return_code" => 1, "message" => "Failed to insert contact.");
        $this->response($message, 200); // 200 being the HTTP response code
    }
    
	/**
	 * @api {put} api/contact/id/:id Update a contact
	 * @apiName Update Contact
	 * @apiGroup Contact
	 *
	 * @apiParam {Number} id Contact unique ID.
	 * @apiParam {Number} resourceID Resource unique ID which the contact belongs to.
	 * @apiParam {String} name Name of the contact.
	 * @apiParam {String} email Email address of the contact.
	 * @apiParam {String} phone Phone number of the contact.
	 * @apiParam {String} description Description of the contact.
	 * 
	 * @apiSuccessExample Success-Response:
	 *     HTTP/1.1 200 OK
	 *     {
	 *       "return_code": 0,
	 * 		 "message": "Successfully updated contact!"
	 *     }
	 * 
	 * @apiErrorExample Error-Response:
	 *     HTTP/1.1 200 OK
	 *     {
	 *       "return_code": 1,
	 * 		 "message": "Failed to update contact."
	 *     }
	 * 
	 */
    function contact_put()
    {
        $success = Contact::update($this->get('id'),
        	$this->put('resourceID'),
        	$this->put('name'),
        	$this->put('email'),
        	$this->put('phone'),
        	$this->put('description'));
         
        $message = ($success) ? array("return_code" => 0, "message" => "Successfully updated contact!") : array("return_code" => 1, "message" => "Failed to update contact.");
        $this->response($message, 200); // 200 being the HTTP response code
    }
    
	/**
	 * @api {delete} api/contact/id/:id Delete a contact
	 * @apiName Delete Contact
	 * @apiGroup Contact
	 *
	 * @apiParam {Number} id Contact unique ID.
	 *
	 * @apiSuccessExample Success-Response:
	 *     HTTP/1.1 200 OK
	 *     {
	 *       "return_code": 0,
	 * 		 "message": "Successfully deleted contact!"
	 *     }
	 * 
	 * @apiErrorExample Error-Response:
	 *     HTTP/1.1 404 Not Found
	 *     {
	 *       "return_code": 1,
	 * 		 "message": "Failed to delete a contact."
	 *     }
	 * 
	 */
    function contact_delete()
    {
        $success = Contact::delete($this->get('id'));
        
        $message = ($success) ? array("return_code" => 0, "message" => "Successfully deleted contact!") : array("return_code" => 1, "message" => "Failed to delete contact.");
        $this->response($message, 200); // 200 being the HTTP response code
    }
    
	/**
	 * @api {get} api/contacts Read data of all contacts
	 * @apiName GetAllContacts
	 * @apiGroup Contact
	 *
	 * @apiSuccess {Number} ID Contact unique ID.
	 * @apiSuccess {Number} resourceID Resource unique ID which the contact belongs to.
	 * @apiSuccess {String} name Name of the contact.
	 * @apiSuccess {String} email Email address of the contact.
	 * @apiSuccess {String} phone Phone number of the contact.
	 * @apiSuccess {String} description Description of the contact.
	 * 
	 */
    function contacts_get()
    {
        $contacts = Contact::readAll();
        
        if($contacts)
        {
            $this->response($contacts, 200); // 200 being the HTTP response code
        }
    }
	
	/**
	 * @api {get} api/contactsByResource/resourceID/:resourceID Read data of all contacts of a specified resource
	 * @apiName Get All Contacts By Resource
	 * @apiGroup Contact
	 * 
	 * @apiParam {Number} resourceID Resource unique ID.
	 *
	 * @apiSuccess {Number} ID Contact unique ID.
	 * @apiSuccess {Number} resourceID Resource unique ID which the contact belongs to.
	 * @apiSuccess {String} name Name of the contact.
	 * @apiSuccess {String} email Email address of the contact.
	 * @apiSuccess {String} phone Phone number of the contact.
	 * @apiSuccess {String} description Description of the contact.
	 * 
	 */
    function contactsByResource_get()
    {
        if(!$this->get('resourceID'))
        {
        	$this->response(NULL, 400);
        }

        $contacts = Contact::readByResourceID($this->get('resourceID'));
    	
        if($contacts)
        {
            $this->response($contacts, 200); // 200 being the HTTP response code
        }
        else
        {
            $this->response(array('error' => 'Contacts could not be found for resource'), 404);
        }
    }
}
?>
