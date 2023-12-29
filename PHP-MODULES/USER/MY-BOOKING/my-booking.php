<?php

include '../../connection.php';
// MY-BOOKING-QUERY
$sql_view_book = "
SELECT 
    user_shippings.declared_items, 
    user_shippings.declared_weight, 
    user_shippings.delicate_type, 
    user_shippings.package_type,
    user_shippings.shipment_price,

    pickup_countries.pickup_country,
    pickup_countries.transportation, 
    pickup_countries.pickup_address,
    pickup_countries.transportation,
    pickup_countries.departure_date,

    delivery_countries.delivery_country,
    delivery_countries.delivery_address,
    delivery_countries.arrival_date

FROM 
    user_shippings
LEFT JOIN 
    pickup_countries ON user_shippings.shipping_id = pickup_countries.pickup_id

LEFT JOIN 
    delivery_countries ON user_shippings.shipping_id = delivery_countries.delivery_id

WHERE 
    user_shippings.shipping_id = delivery_countries.delivery_id
ORDER BY 
    user_shippings.shipping_id DESC
LIMIT 1";

$result_view_book = mysqli_query($con, $sql_view_book);

$list_booking = "";
if ($result_view_book) {
    while ($row = mysqli_fetch_assoc($result_view_book)) {
        $departure_date = $row['departure_date'];
        $declared_item = $row['declared_items'];
        $declared_weight = $row['declared_weight'];
        $delicate_type = $row['delicate_type'];
        $package_type = $row['package_type'];
        $pickup_country = $row['pickup_country'];
        $delivery_country = $row['delivery_country'];
        $arrival_date = $row['arrival_date'];

        $list_booking = '
        
        <div class="container mt-5">
        <div class="header mb-3">
            <h2>My Booking</h2>
        </div>
        <table class="table">
        <thead style="background-color: red;">
                <tr>
                    <th>Departure Date: </th>
                    <th>Declared items</th>
                    <th>Declared weight</th>
                    <th>Delicate type</th>
                    <th>Package type</th>
                    <th>Pickup country</th>
                    <th>Delivery country</th>
                    <th>Arrival date</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>' . $departure_date . '</td>
                    <td>' . $declared_item . '</td>
                    <td>' . $declared_weight . '</td>
                    <td>' . $delicate_type . '</td>
                    <td>' . $package_type . '</td>
                    <td>' . $pickup_country . '</td>
                    <td>' .  $delivery_country . '</td>
                    <td>' . $arrival_date . '</td>
                </tr>
                <!-- Add more rows as needed -->
            </tbody>
        </table>
    </div>
        
        ';
    }
}

if (!$result_view_book) {
    echo "Error";
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!--Font link-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Asap:wght@300;400;500;600;700;800&family=Assistant:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- CUSTOM-CSS -->
    <link rel="stylesheet" href="../../../STYLES/USER/MY-BOOKING/my-booking.css">
    <link rel="stylesheet" href="../../../STYLES/OVERALL/overall.css">
    <link rel="stylesheet" href="../../../STYLES/USER/HEADER/header.css">

</head>

<body>
    <div class="header-container">
        <div class="header-sections">
            <div class="header-components">
                <div class="header-left-section">
                    <div class="logo-font">
                        <img class="logistic-logo" src="../../../IMAGES/GENERAL/logo.png" alt="">
                        <label for="">Rolls</label>
                    </div>
                    <div class="header-services">
                        <div class="services-navigation">
                            <a href="">My booking</a>
                            <a href="">Services</a>
                            <a href="">About</a>
                            <a href="">Contact</a>
                        </div>
                    </div>
                </div>
                <div class="header-right-section">
                    <div class="personalization-container">
                        <img src="../../../IMAGES/GENERAL/account.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?= $list_booking; ?>
    <!-- Bootstrap JS and dependencies 'FOR DESIGN' -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

</html>