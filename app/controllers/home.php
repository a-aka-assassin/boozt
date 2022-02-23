<?php

//using interface class controller
class Home implements Controller
{
    public function index() //interface function
    {
        require_once '../app/model/User.php'; //using database file
        require_once '../app/model/model.php'; //using model file

        $db = new Model();

        //using abstract functions
        $customerResults = $db->get_customers();

        $orderResults = $db->get_orders();

        $orderItemResults = $db->get_revenue();

        //summing up revenue
        $revenue = 0;
        foreach ($orderItemResults as $orderItem) {
            $revenue = $revenue + $orderItem['price'];
        }

        //storing the values in session variable so the values do not show up in the url with header 
        session_start();
        $_SESSION['customers'] = $customerResults;
        $_SESSION['customer_numbers']   = count($customerResults);
        $_SESSION['orders_numbers']   = count($orderResults);
        $_SESSION['revenue'] = $revenue;
        $_SESSION['orders']   = $orderResults;
        Header("Location: ../app/views/view.php");
        exit();
    }
}
