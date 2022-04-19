<?php 

namespace classes;

use classes\abs\Dbh;

class DeleteProduct extends Dbh
{
    public function eraseProduct($id)
    {
        $this->delProduct($id);
    }

    private function delProduct($id)
    {
        $sql = "DELETE FROM products WHERE id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id]);
    }
}