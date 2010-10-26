<?php
    
    /** 
    *	@param	array
    *	@return	array
    *	@author Ben Sekulowicz-Barclay
    *
    **/

    if (!function_exists('category_to_struct')) {			
    	function category_to_struct($category = '') {
            return array(
                array(
                    'categoryId'            => array($category['id'], 'string'),
                    'parentId'              => array($category['parent'], 'string'),
                    'description'           => array($category['description'], 'string'),
                    'categoryDescription'   => array('', 'string'),
                    'categoryName'          => array($category['title'], 'string'),                            
                ),
                'struct'
            );
    	}
    }
    
    
    /** 
    *	@param	array
    *	@return	array
    *	@author Ben Sekulowicz-Barclay
    *
    **/

    if (!function_exists('categories_to_structs')) {			
    	function categories_to_structs($categories = '') {
            $temp = array(array(), 'array');

            foreach($categories as $category) {
                $temp[0][] = category_to_struct($category);
            }
        
            return $temp;
    	}
    }
    
    /** 
    *	@param	array
    *	@return	array
    *	@author Ben Sekulowicz-Barclay
    *
    **/

    if (!function_exists('post_to_struct')) {			
    	function post_to_struct($post = '') {
            return array(
                array(
                    'postid'        => array($post['id'], 'string '),
                    'dateCreated'   => array(date('c', $post['dateCreated']), 'DateTime'),
                    'title'         => array($post['title'], 'string'),
                    'description'   => array($post['description'], 'string'),
                    'categories'    => array($post['categories'], 'array'),
                ),
                'struct'
            );
    	}
    }

    /** 
    *	@param	array
    *	@return	array
    *	@author Ben Sekulowicz-Barclay
    *
    **/

    if (!function_exists('posts_to_structs')) {			
    	function posts_to_structs($posts = '') {
            $temp = array(array(), 'array');

            foreach($posts as $post) {
                $temp[0][] = post_to_struct($post);
            }
        
            return $temp;
    	}
    }

?>