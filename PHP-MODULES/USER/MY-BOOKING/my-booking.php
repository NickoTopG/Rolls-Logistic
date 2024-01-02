<?php

include '../../connection.php';
// MY-BOOKING-QUERY

$encrypted_id = $_GET['id'];

// Use a 16-byte IV
$iv = substr('your_iv_here12345', 0, 16);

$decrypted_id = openssl_decrypt($encrypted_id, 'aes-256-cbc', 'your_secret_key', 0, $iv);

$sql_view_book = "
SELECT
    user_signup.id,
    user_shippings.shipping_id,
    user_shippings.declared_items,
    user_shippings.declared_weight,
    user_shippings.delicate_type,
    user_shippings.package_type,

    pickup_countries.pickup_id,
    pickup_countries.pickup_country,
    pickup_countries.transportation,
    pickup_countries.pickup_address,
    pickup_countries.departure_date,

    delivery_countries.delivery_country,
    delivery_countries.delivery_address,
    delivery_countries.arrival_date

FROM
    user_signup

JOIN
    user_shippings ON user_signup.id = user_shippings.user_id 

JOIN
    pickup_countries ON user_shippings.shipping_id = pickup_countries.pickup_id

JOIN
    delivery_countries ON user_shippings.shipping_id = delivery_countries.delivery_id

WHERE
    user_signup.id = $decrypted_id

ORDER BY
    CAST(CONVERT(pickup_countries.departure_date, DATE) AS DATE) ASC;

";

$result_view_book = mysqli_query($con, $sql_view_book);

$list_booking = "";
if ($result_view_book) {
    while ($row = mysqli_fetch_assoc($result_view_book)) {
        $id = $row['id'];
        $pickup_id = $row['pickup_id'];
        $pickup_date = date('m/d/Y', strtotime($row['departure_date']));
        $declared_item = $row['declared_items'];
        $declared_weight = $row['declared_weight'];
        $delicate_type = $row['delicate_type'];
        $package_type = $row['package_type'];
        $pickup_country = $row['pickup_country'];
        $delivery_country = $row['delivery_country'];
        $arrival_date = date('m/d/Y', strtotime($row['arrival_date']));
        $mode_transpo = $row['transportation'];


        $list_booking .= '
    <div class="table-data-seperator">
        <div class="table-data-leftSection">
            <div class="table-data-content">
                <div class="table-date-contentHeader">
                    <img src="../../../IMAGES/GENERAL/star.png" alt="">
                    <label class="data-content" for=""> ' . $declared_item . ' &middot;</label>
                </div>
            </div>
            <div class="table-data-content">
                <label for="" class="data-gross-weight">Your Shipment Gross Weight was
                    <p class="weight-underline">' . $declared_weight . ' </p>
                    kg -
                </label>
                <label for="" class="data-delicate">
                    Declared as:
                    <p class="weight-underline"> ' . $delicate_type . '</p>
                    state.
                </label>
            </div>
        </div>
        <div class="table-data-rightSection">
            <div class="table-data-content2">
                Pickup Via:
                <p class="left-underline">';

        if ($mode_transpo == 'Plane') {
            $list_booking .= 'Plane';
        } elseif ($mode_transpo == 'Vessel') {
            $list_booking .= 'Vessel';
        } elseif ($mode_transpo == 'Inland') {
            $list_booking .= 'Inland';
            $mode_transpoText = 'Inland';
        }
        $list_booking .= '</p>';

        $list_booking .= '<img src="';
        if ($mode_transpo == 'Plane') {
            $list_booking .= '../../../IMAGES/GENERAL/transport/plane.png';
        } elseif ($mode_transpo == 'Vessel') {
            $list_booking .= '../../../IMAGES/GENERAL/transport/vessel.png';
        } elseif ($mode_transpo == 'Inland') {
            $list_booking .= '../../../IMAGES/GENERAL/transport/inland.png';
        }
        $list_booking .= '" alt="">
            </div>
            <div class="table-data-content2">
                Pickup Date:
                <p class="left-underline">' . $pickup_date . '</p>
                <img src="../../../IMAGES/GENERAL/date.png" alt="">
            </div>
        </div>
    </div>';
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
    <div class="table-shipments-container">
        <div class="table-shipments">
            <table>
                <div class="header-table">
                    <label for="">Your Cargo List</label>
                </div>
                <tr>
                    <td>
                        <div class="table-data-container">
                            <?= $list_booking ?>
                        </div>
                    </td>
                </tr>
            </table>
        </div>
    </div>


    <!-- Bootstrap JS and dependencies 'FOR DESIGN' -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

</html>