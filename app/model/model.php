<?php
include '../app/abstract/functions.php'; //using abstract 

class Model extends Functions
{

    //using the abstract functions

    public function get_customers()
    {
        //start and end date of the previous month
        $starting_date = date('Y-m-d', strtotime('first day of last month'));
        $ending_date = date('Y-m-d', strtotime('last day of last month'));

        //including databse connection file
        include '../app/model/User.php';
        $db = $mysqli;
        $sql = "SELECT * FROM `customer`
        LEFT JOIN 
            `order` 
        ON
            customer.id=`order`.customer_id
       WHERE created_at >= '$starting_date' AND created_at <= '$ending_date'";

        $result = $db->query($sql);
        $row = $result->fetch_all(MYSQLI_ASSOC);

        $db->close();
        //returning result to the controller
        return $row;
    }
    public function get_orders()
    {

        $starting_date = date('Y-m-d', strtotime('first day of last month'));
        $ending_date = date('Y-m-d', strtotime('last day of last month'));

        include '../app/model/User.php';
        $db = $mysqli;
        $sql = "SELECT * FROM `order` WHERE purchase_date >= '$starting_date' AND purchase_date <= '$ending_date';";

        $result = $db->query($sql);
        $row = $result->fetch_all(MYSQLI_ASSOC);

        $db->close();
        return $row;
    }
    public function get_revenue()
    {


        $starting_date = date('Y-m-d', strtotime('first day of last month'));
        $ending_date = date('Y-m-d', strtotime('last day of last month'));

        include '../app/model/User.php';
        $db = $mysqli;
        $sql = "SELECT price FROM `order_items` WHERE purchase_date >= '$starting_date' AND purchase_date <= '$ending_date' ";

        $result = $db->query($sql);
        $row = $result->fetch_all(MYSQLI_ASSOC);

        $db->close();
        return $row;
    }
}
