<?php
require_once __DIR__ . '/../core/Model.php';

class Product extends Model {
    protected $table = 'products';

    // Get all products
    public function getAll() {
        $sql = "SELECT * FROM {$this->table}";
        return $this->query($sql)->fetchAll();
    }

    // Find a product by ID
    public function find($id) {
        $sql = "SELECT * FROM {$this->table} WHERE id = ?";
        return $this->query($sql, [$id])->fetch();
    }

    // Insert a new product
    public function insert($data) {
        $columns = implode(', ', array_keys($data));
        $placeholders = implode(', ', array_fill(0, count($data), '?'));
        $sql = "INSERT INTO {$this->table} ($columns) VALUES ($placeholders)";
        $this->query($sql, array_values($data));
    }

    // Update a product
    public function update($id, $data) {
        $setClause = implode(', ', array_map(fn($key) => "$key = ?", array_keys($data)));
        $sql = "UPDATE {$this->table} SET $setClause WHERE id = ?";
        $this->query($sql, array_merge(array_values($data), [$id]));
    }

    // Delete a product
    public function delete($id) {
        $sql = "DELETE FROM {$this->table} WHERE id = ?";
        $this->query($sql, [$id]);
    }
}