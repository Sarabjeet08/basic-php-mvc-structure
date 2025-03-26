<?php
require_once __DIR__ . '/../core/Controller.php';
require_once __DIR__ . '/../models/Product.php';

class ProductsController extends Controller {
    public function __construct() {
        session_start();
    }

    // Display all products
    public function index() {
        $productModel = new Product();
        $products = $productModel->getAll();
        $this->view('products/index', ['products' => $products]);
    }

    // Show form to create a new product
    public function create() {
        $this->view('products/create');
    }

    // Store a new product
    public function store() {
        $productModel = new Product();
        $data = [
            'title' => $_POST['title'],
            'description' => $_POST['description'],
            'brand' => $_POST['brand'],
            'model' => $_POST['model'],
            'price' => $_POST['price'],
            'quantity' => $_POST['quantity'],
            'pictures' => $_POST['pictures'] // Assuming pictures are uploaded as a comma-separated string
        ];
        $productModel->insert($data);
        header('Location: /products');
    }

    // Show form to edit a product
    public function edit($id) {
        $productModel = new Product();
        $product = $productModel->find($id);
        $this->view('products/edit', ['product' => $product]);
    }

    // Update a product
    public function update($id) {
        $productModel = new Product();
        $data = [
            'title' => $_POST['title'],
            'description' => $_POST['description'],
            'brand' => $_POST['brand'],
            'model' => $_POST['model'],
            'price' => $_POST['price'],
            'quantity' => $_POST['quantity'],
            'pictures' => $_POST['pictures']
        ];
        $productModel->update($id, $data);
        header('Location: /products');
    }

    // Delete a product
    public function delete($id) {
        $productModel = new Product();
        $productModel->delete($id);
        header('Location: /products');
    }
}