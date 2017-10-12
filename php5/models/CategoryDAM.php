<?php

/**
 * Product category model data access and manipulation (DAM) class.
 *
 * @author jam
 * @version 171010
 */
class CategoryDAM extends DAM {

    // Database connection is inherited from the parent.

    function __construct() {
        parent::__construct();
    }

    public function get_categories() {
         $query = 'SELECT * 
                   FROM categories';
        $statement = $this->db->query($query);
        return $statement;
    }

    function get_category_name($category_id) {
        $query = 'SELECT categoryName 
                  FROM categories
                  WHERE categoryID = :category_id';
        $statement = $this->db->prepare($query);
        $statement->bindValue(':category_id', $category_id);
        $statement->execute();
        $statement->closeCursor();
        
    }
}
