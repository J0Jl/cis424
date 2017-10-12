<?php

/**
 * Default controller class provides the run method to all subclasses. The
 * index method provides the default action of the application and can be
 * overridden in subclasses.
 *
 * @author JAM
 * @version 171010
 */
class DefaultController {
    
    public function __construct() {
        
        // Currently no constructor.
    }

    public final function run($action = 'index') {
        if (!method_exists($this, $action)) {
            $action = 'index';
        }
        $this->$action();
    }

    /**
     * Displays the default view for the application.
     */
    public function index() {
        $this->list_products();
    }
    
    public function list_products() {
        $category_id = filter_input(INPUT_GET, 'category_id', FILTER_VALIDATE_INT);
        if ($category_id == NULL || $category_id == FALSE) {
            $category_id = 1;
        }
        $categoryDAM = new CategoryDAM();
        $category_name = $categoryDAM->get_category_name($category_id);
        $categories = $categoryDAM->get_categories();
        $productDAM = new ProductDAM();
        $products = $productDAM->get_products_by_category($category_id);
        include('views/product_list.php');
    }

}
