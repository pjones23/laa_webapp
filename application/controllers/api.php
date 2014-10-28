<?php
require(APPPATH.'/libraries/REST_Controller.php');
require_once(APPPATH.'/models/category.php');
require_once(APPPATH.'/models/contact.php');
require_once(APPPATH.'/models/resource.php');
require_once(APPPATH.'/models/user.php');
 
class API extends REST_Controller
{
	/**
	 * @api {get} /user/:id Read data of a user
	 * @apiName GetUser
	 * @apiGroup User
	 *
	 * @apiParam {Number} id Users unique ID.
	 *
	 * @apiSuccess {Number} ID Users unique ID.
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
	 * @api {post} /user Create a new user
	 * @apiName CreateUser
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
	 *       "Successfully inserted user!"
	 *     }
	 * 
	 * @apiErrorExample Error-Response:
	 *     HTTP/1.1 200 OK
	 *     {
	 *       "Failed to insert user."
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
        
        $message = ($success) ? "Successfully inserted user!" : "Failed to insert user.";
        $this->response($message, 200); // 200 being the HTTP response code
    }
    
	/**
	 * @api {put} /user/:id Update a user
	 * @apiName UpdateUser
	 * @apiGroup User
	 *
	 * @apiParam {Number} id Users unique ID.
	 * @apiParam {String} firstName First name of the User.
	 * @apiParam {String} lastName Last name of the User.
	 * @apiParam {String} email Email address of the User.
	 * 
	 * @apiSuccessExample Success-Response:
	 *     HTTP/1.1 200 OK
	 *     {
	 *       "Successfully updated user!"
	 *     }
	 * 
	 * @apiErrorExample Error-Response:
	 *     HTTP/1.1 200 OK
	 *     {
	 *       "Failed to update user."
	 *     }
	 * 
	 */
    function user_put()
    {
        $success = User::update($this->get('id'),
        	$this->put('firstName'),
        	$this->put('lastName'),
        	$this->put('email'));
			
        $message = ($success) ? "Successfully updated user!" : "Failed to update user.";
        $this->response($message, 200); // 200 being the HTTP response code 
    }
    
	/**
	 * @api {delete} /user/:id Delete a user
	 * @apiName DeleteUser
	 * @apiGroup User
	 *
	 * @apiParam {Number} id Users unique ID.
	 *
	 * @apiSuccessExample Success-Response:
	 *     HTTP/1.1 200 OK
	 *     {
	 *       "Successfully deleted user!"
	 *     }
	 * 
	 * @apiErrorExample Error-Response:
	 *     HTTP/1.1 404 Not Found
	 *     {
	 *       "Failed to delete a user."
	 *     }
	 * 
	 */
    function user_delete()
    {
    	$success = User::delete($this->get('id'));
        
        $message = ($success) ? "Successfully deleted user!" : "Failed to delete a user.";
        $this->response($message, 200); // 200 being the HTTP response code
    }
    
	/**
	 * @api {get} /user Read data of all users
	 * @apiName GetAllUsers
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
	 * @api {get} /category/:id Read data of a category
	 * @apiName GetCategory
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
	 * @api {post} /category Create a new category
	 * @apiName CreateCategory
	 * @apiGroup Category
	 *
	 * @apiParam {Number} parentCategoryID Unique ID of the parent Category.
	 * @apiParam {String} name Name of the Category.
	 * @apiParam {String} description Description of the Category.
	 * 
	 * @apiSuccessExample Success-Response:
	 *     HTTP/1.1 200 OK
	 *     {
	 *       "Successfully inserted category!"
	 *     }
	 * 
	 * @apiErrorExample Error-Response:
	 *     HTTP/1.1 200 OK
	 *     {
	 *       "Failed to insert category."
	 *     }
	 * 
	 */
    function category_post()
    {
        $success = Category::create($this->post('parentCategoryID'),
        	$this->post('name'),
        	$this->post('description'));
        
        $message = ($success) ? "Successfully inserted category!" : "Failed to insert category.";
        $this->response($message, 200); // 200 being the HTTP response code
    }
    
	/**
	 * @api {put} /category/:id Update a category
	 * @apiName UpdateCategory
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
	 *       "Successfully updated category!"
	 *     }
	 * 
	 * @apiErrorExample Error-Response:
	 *     HTTP/1.1 200 OK
	 *     {
	 *       "Failed to update category."
	 *     }
	 * 
	 */
    function category_put()
    {
        $success = Category::update($this->get('id'),
        	$this->put('parentCategoryID'),
        	$this->put('name'),
        	$this->put('description'));
         
        $message = ($success) ? "Successfully updated category!" : "Failed to update category.";
        $this->response($message, 200); // 200 being the HTTP response code
    }
    
	/**
	 * @api {delete} /category/:id Delete a category
	 * @apiName DeleteCategory
	 * @apiGroup Category
	 *
	 * @apiParam {Number} id Users unique ID.
	 *
	 * @apiSuccessExample Success-Response:
	 *     HTTP/1.1 200 OK
	 *     {
	 *       "Successfully deleted user!"
	 *     }
	 * 
	 * @apiErrorExample Error-Response:
	 *     HTTP/1.1 404 Not Found
	 *     {
	 *       "Failed to delete a user."
	 *     }
	 * 
	 */
    function category_delete()
    {
        $success = Category::delete($this->get('id'));
        
        $message = ($success) ? "Successfully Deleted category!" : "Did not delete a category.";
        $this->response($message, 200); // 200 being the HTTP response code
	}
    
	/**
	 * @api {get} /categories Read data of all categories
	 * @apiName GetAllCategories
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
        
        $message = ($success) ? "Successfully inserted community resource!" : "Failed to insert community resource.";
        $this->response($message, 200); // 200 being the HTTP response code
    }
    
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
         
        $message = ($success) ? "Successfully updated community resource!" : "Failed to update community resource.";
        $this->response($message, 200); // 200 being the HTTP response code
    }
    
    function resource_delete()
    {
        $success = Resource::delete($this->get('id'));
        
        $message = ($success) ? "Successfully Deleted community resource!" : "Did not delete a community resource.";
        $this->response($message, 200); // 200 being the HTTP response code
    }
     
    function resources_get()
    {
        $resources = Resource::readAll();
        
        if($resources)
        {
            $this->response($resources, 200); // 200 being the HTTP response code
        }
    }
    
	/**
	 * @api {get} /contact/:id Read data of a contact
	 * @apiName GetContact
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
	 * @api {post} /contact Create a new contact
	 * @apiName CreateContact
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
	 *       "Successfully inserted contact!"
	 *     }
	 * 
	 * @apiErrorExample Error-Response:
	 *     HTTP/1.1 200 OK
	 *     {
	 *       "Failed to insert contact."
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
        
        $message = ($success) ? "Successfully inserted contact!" : "Failed to insert contact.";
        $this->response($message, 200); // 200 being the HTTP response code
    }
    
	/**
	 * @api {put} /contact/:id Update a contact
	 * @apiName UpdateContact
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
	 *       "Successfully updated contact!"
	 *     }
	 * 
	 * @apiErrorExample Error-Response:
	 *     HTTP/1.1 200 OK
	 *     {
	 *       "Failed to update contact."
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
         
        $message = ($success) ? "Successfully updated contact!" : "Failed to update contact.";
        $this->response($message, 200); // 200 being the HTTP response code
    }
    
	/**
	 * @api {delete} /contact/:id Delete a contact
	 * @apiName DeleteContact
	 * @apiGroup Contact
	 *
	 * @apiParam {Number} id Contact unique ID.
	 *
	 * @apiSuccessExample Success-Response:
	 *     HTTP/1.1 200 OK
	 *     {
	 *       "Successfully deleted contact!"
	 *     }
	 * 
	 * @apiErrorExample Error-Response:
	 *     HTTP/1.1 404 Not Found
	 *     {
	 *       "Failed to delete a contact."
	 *     }
	 * 
	 */
    function contact_delete()
    {
        $success = Contact::delete($this->get('id'));
        
        $message = ($success) ? "Successfully Deleted contact!" : "Did not delete a contact.";
        $this->response($message, 200); // 200 being the HTTP response code
    }
    
	/**
	 * @api {get} /contacts Read data of all contacts
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
}
?>
