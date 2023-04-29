<?php
	class CategoryModel
	{
		private $db;

		public function __construct()
		{
			$this->db = (new Database())->getPdo();
		}

		public function getAllCategory()
		{
			$stmt = $this->db->prepare("SELECT * FROM categories");
			$stmt->execute();
			return $stmt->fetchAll();
		}

		public function getTotalProductsFromCategory($category_id)
		{
			$stmt = $this->db->prepare("SELECT COUNT(*) as total_products FROM products WHERE category_id = :category_id;");
			$stmt->bindParam(":category_id", $category_id);
			$stmt->execute();

			return $stmt->fetchColumn();
		}
	}
