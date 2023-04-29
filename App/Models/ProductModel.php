<?php
	class ProductModel
	{
		private $db;

		public function __construct()
		{
			$this->db = (new Database())->getPdo();
		}

		public function getAllProducts()
		{
			$stmt = $this->db->prepare("SELECT * FROM products");
			$stmt->execute();
			return $stmt->fetchAll();
		}

		public function scopeByCategory($query, $id)
		{
			return $query->where('category_id', $id);
		}
		public function getByCategory($category_id)
		{
			$stmt = $this->db->prepare("SELECT * FROM products WHERE category_id = :category_id");
			$stmt->bindParam(':category_id', $category_id);
			$stmt->execute();
			return $stmt->fetchAll();
		}

	}
