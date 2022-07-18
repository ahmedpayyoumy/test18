<?php 

class Products_model extends CI_model
{
    public function activeProductsCount()
    {
        $query = $this->db->query("SELECT COUNT(id) AS active_products FROM products WHERE status = 1");
        return $query->result_array();
    }

    public function freeActiveProducts()
    {
        $query = $this->db->query("SELECT products.id FROM products INNER JOIN cart ON products.id = cart.product_id GROUP BY cart.product_id");
        $ids = [];
        foreach($query->result_array() as $id){
            $ids[] = $id['id'];
        }
        $this->db->select("COUNT(products.id) AS free_products");
        $this->db->from('products');
        $this->db->where_not_in('id', $ids);
        $this->db->where('products.status = 1');
        $res = $this->db->get();
        return $res->result_array();
    }

    public function orderedActiveProducts()
    {
        $query = $this->db->query("SELECT SUM(cart.quantity) AS ordered_products FROM products INNER JOIN cart ON products.id = cart.product_id WHERE products.status = 1");
        return $query->result_array();
    }
}



?>