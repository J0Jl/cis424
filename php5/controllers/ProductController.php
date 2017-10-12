<?php

class ProductController extends DefaultController {
    
    public function __construct() {
        parent::__construct();
    }

    public function delete_product() {
        $product_id = filter_input(INPUT_POST, 'product_id', FILTER_VALIDATE_INT);
        $category_id = filter_input(INPUT_POST, 'category_id', FILTER_VALIDATE_INT);
        if ($category_id == NULL || $category_id == FALSE ||
                $product_id == NULL || $product_id == FALSE) {
            $error = "Missing or incorrect product id or category id.";
            include('views/error.php');
        } else {
            $productDAM = new ProductDAM();
            $productDAM->delete_product($product_id);
            header("Location: ./index.php?category_id=$category_id");
        }
    }

    public function show_add_form() {
        $categoryDAM = new CategoryDAM();
        $categories = $categoryDAM->get_categories();
        include('views/product_add.php');
    }

    public function add_product() {
        $category_id = filter_input(INPUT_POST, 'category_id', FILTER_VALIDATE_INT);
        $code = filter_input(INPUT_POST, 'code', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $price = filter_input(INPUT_POST, 'price', FILTER_VALIDATE_FLOAT);
        if ($category_id == NULL || $category_id == FALSE || $code == NULL ||
                $name == NULL || $price == NULL || $price == FALSE) {
            $error = "Invalid product data. Check all fields and try again.";
            include('views/error.php');
        } else {
            $productDAM = new ProductDAM();
            $productDAM->add_product($category_id, $code, $name, $price);
            header("Location: ./index.php?category_id=$category_id");
        }
    }
}
