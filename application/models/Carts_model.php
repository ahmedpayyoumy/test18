<?php 

class Carts_model extends CI_model
{   
    public function getTotalOrdersPrices()
    {
        $query = $this->db->query("SELECT * from cart INNER JOIN products ON products.id = cart.product_id WHERE products.status = 1");
        $result = $query->result_array();
        $totalPrice = 0;
        foreach($result as $row) {
            $totalPrice += $row['quantity'] * $row['price'];
        }
        return $totalPrice;
    }

    public function getTotalOrdersPricesForUser()
    {
        $query = $this->db->query("SELECT SUM(cart.quantity * products.price) AS user_total, users.name from cart INNER JOIN products ON products.id = cart.product_id INNER JOIN users ON users.id = cart.user_id WHERE products.status = 1 GROUP BY users.id ORDER BY users.id ASC");
        return $query->result_array();
    }
    
}



?>