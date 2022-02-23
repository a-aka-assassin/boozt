<?php
//script to fetch results on runtime
require_once '../../app/model/User.php';
$db = $mysqli;
if (isset($_POST['startDate'])) {
    $starting_date = $_POST['startDate'];
    $ending_date = $_POST['endDate'];
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

    echo json_encode($row);
}
