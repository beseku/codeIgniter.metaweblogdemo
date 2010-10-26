<?php

/**
*	@package		MetaWeblog API Demo
*	@subpackage		Controllers
*	@author			Ben Sekulowicz-Barclay
*	@copyright		Copyright 2010
*	@version		0.01
*
**/

class DemoModel extends Model {
    
    /** 
	*	@access	public
	*   @param  string
	*   @param  string
	*   @return mixed		
	*	@author Ben Sekulowicz-Barclay
	*
	**/
	
	public function authenticate_user($user, $pass) {
	    // This is a fake method... you can only login as user #99 ...
	    return ($user === 'ben' && $pass === 'sux')? 99: FALSE;
	}
	
	/** 
	*	@access	public
	*   @param  integer
	*   @param  integer
	*   @return boolean		
	*	@author Ben Sekulowicz-Barclay
	*
	**/
	
	public function add_post($account = FALSE, $data = FALSE, $post = FALSE) {
	    // This is a fake method... you can only add post #10 ...
	    if (!$account || (int) $account != 99 || !$post) {
	        return FALSE;
	    }
	    
	    // We only need to return the post ID from this method, not the whole post ...
	    return 11;
	}
	
	/** 
	*	@access	public
	*   @param  integer
	*   @param  integer
	*   @return boolean		
	*	@author Ben Sekulowicz-Barclay
	*
	**/
	
	public function delete_post($account = FALSE, $post = FALSE) {
	    // This is a fake method... you can only delete post #10 ...
	    if (!$account || (int) $account != 99 || !$post || (int) $post != 10) {
	        return FALSE;
	    }
	    
	    // We only need to return the true/false from this method ...
	    return TRUE;
	}
	
	/** 
	*	@access	public
	*   @param  integer
	*   @param  integer
	*   @return boolean		
	*	@author Ben Sekulowicz-Barclay
	*
	**/
	
	public function edit_post($account = FALSE, $post = FALSE) {
	    // This is a fake method... you can only edit post #9 ...
	    if (!$account || (int) $account != 99 || !$post || (int) $post != 9) {
	        return FALSE;
	    }
	    
	    // We only need to return the true/false from this method ...
	    return TRUE;
	}
	
    /** 
	*	@access	public
	*   @param  integer
	*   @param  integer
	*   @return array		
	*	@author Ben Sekulowicz-Barclay
	*
	**/
	
	public function get_categories($blog, $limit = 1000, $offset = 0) {
	    // The controller deals with formatting this data, using the categories_to_structs helper. 
	    return array(
            array(
                'id'            => 1,
                'parent'        => 0,
                'description'   => '',
                'title'         => 'Arsenal FC',                            
            ),
            array(
                'id'            => 2,
                'parent'        => 0,
                'description'   => '',
                'title'         => 'Living in Japan',                           
            ),
        );
	}
	
	/** 
	*	@access	public
	*   @param  integer
	*   @return array		
	*	@author Ben Sekulowicz-Barclay
	*
	**/
	
	public function get_post($post = FALSE) {
	    // The controller deals with formatting this data, using the post_to_struct helper. 
	    return array(
	        'id'            => (int) $post,
            'dateCreated'   => date('U', strtotime('2010-10-18 01:23:45')),
            'title'         => 'The title of post number 1',
            'description'   => 'The description of post number 1',
            'categories'    => array('Arsenal FC'),
	    );
	}
	
	/** 
	*	@access	public
	*   @param  integer
	*   @param  integer
	*   @param  integer
	*   @return array		
	*	@author Ben Sekulowicz-Barclay
	*
	**/
	
	public function get_posts($blog = FALSE, $limit = 1000, $offset = 0) {
	    // The controller deals with formatting this data, using the posts_to_structs helper. 
	    return array(
            array(
                'id'            => 1,
                'dateCreated'   => date('U', strtotime('2010-10-18 01:23:45')),
                'title'         => 'The title of post number 1',
                'description'   => 'The description of post number 1',
                'categories'    => array('Arsenal FC'),
            ),
            array(
                'id'            => 2,
                'dateCreated'   => date('U', strtotime('2010-10-19 01:23:45')),
                'title'         => 'The title of post number 2',
                'description'   => 'The description of post number 2',
                'categories'    => array('Living in Japan'),
            ),
            array(
                'id'            => 3,
                'dateCreated'   => date('U', strtotime('2010-10-20 01:23:45')),
                'title'         => 'The title of post number 3',
                'description'   => 'The description of post number 3',
                'categories'    => array('Arsenal FC', 'Living in Japan'),
            ),
            array(
                'id'            => 4,
                'dateCreated'   => date('U', strtotime('2010-10-21 01:23:45')),
                'title'         => 'The title of post number 4',
                'description'   => 'The description of post number 4',
                'categories'    => array('Arsenal FC'),
            ),
            array(
                'id'            => 5,
                'dateCreated'   => date('U', strtotime('2010-10-22 01:23:45')),
                'title'         => 'The title of post number 5',
                'description'   => 'The description of post number 5',
                'categories'    => array('Living in Japan'),
            ),
            array(
                'id'            => 6,
                'dateCreated'   => date('U', strtotime('2010-10-23 01:23:45')),
                'title'         => 'The title of post number 6',
                'description'   => 'The description of post number 6',
                'categories'    => array('Arsenal FC'),
            ),
            array(
                'id'            => 7,
                'dateCreated'   => date('U', strtotime('2010-10-24 01:23:45')),
                'title'         => 'The title of post number 7',
                'description'   => 'The description of post number 7',
                'categories'    => array('Arsenal FC'),
            ),
            array(
                'id'            => 8,
                'dateCreated'   => date('U', strtotime('2010-10-25 01:23:45')),
                'title'         => 'The title of post number 8',
                'description'   => 'The description of post number 8',
                'categories'    => array('Arsenal FC'),
            ),
            array(
                'id'            => 9,
                'dateCreated'   => date('U', strtotime('2010-10-26 01:23:45')),
                'title'         => 'The title of post number 9',
                'description'   => 'The description of post number 9',
                'categories'    => array('Arsenal FC'),
            ),
            array(
                'id'            => 10,
                'dateCreated'   => date('U', strtotime('2010-10-27 01:23:45')),
                'title'         => 'The title of post number 10',
                'description'   => 'The description of post number 10',
                'categories'    => array('Arsenal FC'),
            )
        );
	}
}

/* End of file DemoModel.php */
/* Location: ./system/application/models/DemoModel.php */