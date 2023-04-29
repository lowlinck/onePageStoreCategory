<?php
	/**
	 * Summary of MainController
	 */
	class MainController extends Controller
	{
		public $category_id;
	public function index()
    {	$productModel = new ProductModel();
		$products = $productModel->getAllProducts();
        $categoryModel = new CategoryModel();
        $categories = $categoryModel->getAllCategory();
        foreach ($categories as $category) {
            $countProduct = $categoryModel->getTotalProductsFromCategory($category['category_id']);
            $category['countProduct'] = $countProduct;
            $updateCategories[] = $category;			
        }		
        $this->render('mainpage', ['title' => 'testTask', 'categories' => $updateCategories, 'products'=>$products]);		
    }
	public function getProduct(){
		$productModel = new ProductModel();
		$products = $productModel->getAllProducts();
		header('Content-Type: application/json');
		echo json_encode($products);
	}
	public function getProductsByCategory()
{
    $category_id = $_GET['category_id'];
    $productModel = new ProductModel();
    $products = $productModel->getByCategory($category_id);

    header('Content-Type: application/json');
    echo json_encode($products);
    exit;
}
}
	
