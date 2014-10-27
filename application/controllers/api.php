<?php
require(APPPATH.'/libraries/REST_Controller.php');
require_once(APPPATH.'/models/category.php');
require_once(APPPATH.'/models/contact.php');
require_once(APPPATH.'/models/resource.php');
require_once(APPPATH.'/models/user.php');
 
class API extends REST_Controller
{
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
    
    function user_put()
    {
        $success = User::update($this->get('id'),
        	$this->put('firstName'),
        	$this->put('lastName'),
        	$this->put('email'));
			
        $message = ($success) ? "Successfully updated user!" : "Failed to update user.";
        $this->response($message, 200); // 200 being the HTTP response code 
    }
    
    function user_delete()
    {
    	$success = User::delete($this->get('id'));
        
        $message = ($success) ? "Successfully Deleted user!" : "Did not delete a user.";
        $this->response($message, 200); // 200 being the HTTP response code
    }
    
    function users_get()
    {
        $users = User::readAll();
        
        if($users)
        {
            $this->response($users, 200); // 200 being the HTTP response code
        }
	}

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
     
    function category_post()
    {
        $success = Category::create($this->post('parentCategoryID'),
        	$this->post('name'),
        	$this->post('description'));
        
        $message = ($success) ? "Successfully inserted category!" : "Failed to insert category.";
        $this->response($message, 200); // 200 being the HTTP response code
    }
    
    function category_put()
    {
        $success = Category::update($this->get('id'),
        	$this->put('parentCategoryID'),
        	$this->put('name'),
        	$this->put('description'));
         
        $message = ($success) ? "Successfully updated category!" : "Failed to update category.";
        $this->response($message, 200); // 200 being the HTTP response code
    }
    
    function category_delete()
    {
        $success = Category::delete($this->get('id'));
        
        $message = ($success) ? "Successfully Deleted category!" : "Did not delete a category.";
        $this->response($message, 200); // 200 being the HTTP response code
	}
     
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
    
    function contact_delete()
    {
        $success = Contact::delete($this->get('id'));
        
        $message = ($success) ? "Successfully Deleted contact!" : "Did not delete a contact.";
        $this->response($message, 200); // 200 being the HTTP response code
    }
     
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
