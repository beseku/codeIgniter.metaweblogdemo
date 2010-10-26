<?php

/**
*	@package		MetaWeblog API Demo
*	@subpackage		Controllers
*	@author			Ben Sekulowicz-Barclay
*	@copyright		Copyright 2010
*	@version		0.01
*
**/

class DemoController extends Controller {

    function DemoController() {
        parent::Controller();
        
        $this->load->helper('xmlrpc');
        
        $this->load->library('xmlrpc');
        $this->load->library('xmlrpcs');
        
        $this->load->model('DemoModel', 'demoModel');
    }

    /** 
	*	@access	public
	*	@author Ben Sekulowicz-Barclay
	*
	**/
	
	public function index() {
	    // Setup our XMP-RPC server to deal with all of the MetaWeblog API methods that MarsEdit sends ...
	    $this->xmlrpcs->initialize(array(
            'functions' => array(
                'blogger.deletePost'           => array('function' => 'DemoController.delete_post'),
	            'metaWeblog.editPost'          => array('function' => 'DemoController.edit_post'),
                'metaWeblog.getCategories'     => array('function' => 'DemoController.get_categories'),
                'metaWeblog.getPost'           => array('function' => 'DemoController.get_post'),
                'metaWeblog.getRecentPosts'    => array('function' => 'DemoController.get_posts'),
                'metaWeblog.newPost'           => array('function' => 'DemoController.add_post'),
            ),
            'object' => $this,
        ));
        
        $this->xmlrpcs->serve();
	}
    
    /** 
	*	@access	public
	*   @param  array
	*	@author Ben Sekulowicz-Barclay
	*
	**/
	
	public function add_post($request) {
	    // Get the request data and validate against the user account ...
	    $request = $request->output_parameters();
	    
	    // If the user credentials against our (fake) authenticate method ... send an error
        if (!$account = $this->demoModel->authenticate_user($request['1'], $request['2'])) {
            return $this->xmlrpc->send_error_message('100', 'Invalid Access');
        }
        
        if (FALSE === ($post = $this->demoModel->add_post($account, $request['0'], $request['3']))) {
            return $this->xmlrpc->send_error_message('101', 'The post could not be created');
        }
        
	    return $this->xmlrpc->send_response(array($post['id'], 'string'));
	}
	
    /** 
	*	@access	public
	*   @param  array
	*	@author Ben Sekulowicz-Barclay
	*
	**/
	
	public function delete_post($request) {
	    // Get the request data and validate against the user account ...
        $request = $request->output_parameters();
        
        // If the user credentials against our (fake) authenticate method ... send an error
        if (!$account = $this->demoModel->authenticate_user($request['2'], $request['3'])) {
            return $this->xmlrpc->send_error_message('100', 'Invalid Access');
        }
        
        // If the delete method returns an error, send back a message and stop here ...
        if (!$this->demoModel->delete_post($account, $request['1'])) {
            return $this->xmlrpc->send_error_message('100', 'The post could not be deleted');
        }
	    
        return $this->xmlrpc->send_response(array(1, 'boolean'));
    }
	
	/** 
	*	@access	public
	*   @param  array
	*	@author Ben Sekulowicz-Barclay
	*
	**/
	
	public function edit_post($request) {
	    // Get the request data and validate against the user account ...
        $request = $request->output_parameters();
        
        // If the user credentials against our (fake) authenticate method ... send an error
        if (!$account = $this->demoModel->authenticate_user($request['1'], $request['2'])) {
            return $this->xmlrpc->send_error_message('100', 'Invalid Access');
        }
        
        // If the edit method returns an error, send back a message and stop here ...
        if (!$this->demoModel->edit_post($account, $request['0'], $request['3'])) {
            return $this->xmlrpc->send_error_message('100', 'The post could not be edited');
        }
	    
        return $this->xmlrpc->send_response(array(1, 'boolean'));
	}
	
	/** 
	*	@access	public
	*   @param  array
	*	@author Ben Sekulowicz-Barclay
	*
	**/
	
	public function get_categories($request) {
	    // Get the request data and validate against the user account ...
	    $request = $request->output_parameters();
	    
	    // If the user credentials against our (fake) authenticate method ... send an error
        if (!$account = $this->demoModel->authenticate_user($request['1'], $request['2'])) {
            return $this->xmlrpc->send_error_message('100', 'Invalid Access');
        }
        
        $categories = categories_to_structs($this->demoModel->get_categories($request['0']));
        
        return $this->xmlrpc->send_response($categories);
	}
	
	/** 
	*	@access	public
	*   @param  array
	*	@author Ben Sekulowicz-Barclay
	*
	**/
	
	public function get_post($request) {
	    // Get the request data and validate against the user account ...
	    $request = $request->output_parameters();
	    
	    // If the user credentials against our (fake) authenticate method ... send an error
        if (!$account = $this->demoModel->authenticate_user($request['1'], $request['2'])) {
            return $this->xmlrpc->send_error_message('100', 'Invalid Access');
        }
        
        $post = post_to_struct($this->demoModel->get_post($request['0']));
        
        return $this->xmlrpc->send_response($post);
	}
	
	/** 
	*	@access	public
	*   @param  array
	*	@author Ben Sekulowicz-Barclay
	*
	**/
	
	public function get_posts($request) {
        // Get the request data and validate against the user account ...
	    $request = $request->output_parameters();
        
        // If the user credentials against our (fake) authenticate method ... send an error
        if (!$account = $this->demoModel->authenticate_user($request['1'], $request['2'])) {
            return $this->xmlrpc->send_error_message('100', 'Invalid Access');
        }
        
        $posts = posts_to_structs($this->demoModel->get_posts($request['0'], $request['3']));
        
        return $this->xmlrpc->send_response($posts);
	}
}

/* End of file DemoController.php */
/* Location: ./system/application/controllers/DemoController.php */