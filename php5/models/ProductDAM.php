<?php

/**
 * Product model data access and manipulation (DAM) class.
 *
 * @author jam
 * @version 171010
 */
class ProductDAM extends DAM {

    // Database connection is inherited from the parent.

    function __construct() {
        parent::__construct();
    }

    public function get_product($product_id) {
        $query = 'SELECT *
                  FROM products
                  WHERE productID = :product_id';
        $statement = $this->db->prepare($query);
        $statement->bindValue(':product_id', $product_id);
        $statement->execute();
        $products = $statement->fetchAll();
        $statement->closeCursor();
        return $products;
    }
    
    public function get_products_by_category($category_id) {
        $query = 'SELECT *
                  FROM products
                  WHERE products.categoryID = :category_id
                  ORDER BY productID';
        $statement = $this->db->prepare($query);
        $statement->bindValue(':category_id', $category_id);
        $statement->execute();
        $products = $statement->fetchAll();
        $statement->closeCursor();
        return $products;
    }

    public function add_product($category_id, $code, $name, $price) {
        $query = 'INSERT INTO products (categoryID, productCode, productName, listPrice)
                  VALUE(:category_id,:code,:name,:price)';
        $statement = $this->db->prepare($query);
        $statement->bindValue(':category_id', $category_id);
        $statement->bindValue(':code', $code);
        $statement->bindValue(':name', $name);
        $statement->bindValue(':price', $price);
        $statement->execute();
        $statement->closeCursor();
        
    }

    public function delete_product($product_id) {
        $query = 'DELETE FROM products
                  WHERE productID = :product_id';
        $statement = $this->db->prepare($query);
        $statement->bindValue(':product_id', $product_id);
        $statement->execute();
        $statement->closeCursor();
        
    }
}
