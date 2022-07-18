<?php 

class Users_model extends CI_model
{
    public function getActiveUsersCount(){
        $query = $this->db->query("SELECT COUNT(id) AS active_users FROM users WHERE status=1");
        return $query->result_array();
    }

    public function activeUsersWithOrders()
    {
        $query = $this->db->query("SELECT COUNT(users.id) AS active_users_with_orders FROM users INNER JOIN cart ON cart.user_id = users.id WHERE users.status= 1 GROUP BY users.id");
        return $query->num_rows();
    }
}



?>