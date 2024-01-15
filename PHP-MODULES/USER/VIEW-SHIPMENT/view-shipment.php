<?php

include "../../connection.php";

// Data
$id = $_GET['id'];
$declared_item = isset($_GET['declared_item']) ? $_GET['declared_item'] : '';
$declared_weight = $_GET['declared_weight'];
$shipment_price = $_GET['shipment_price'];
$delicate_type = $_GET['delicate_type'];
$package_type = $_GET['package_type'];

$pickup_country = $_GET['pickup_country'];
$pickup_address = $_GET['pickup_address'];
$transportation = $_GET['transportation'];


$delivery_country = $_GET['delivery_country'];
$delivery_address = $_GET['delivery_address'];
$arrival_date = date('m/d/Y', strtotime($_GET['arrival_date']));
$departure_date = date('m/d/Y', strtotime($_GET['departure_date']));

$booking_info = '
        
        <div class="cargo-horizon">
        <div class="cargo-lot">
            <div class="data-icon">
                <img src="../../../IMAGES/GENERAL/cargo-item.png" alt="">
            </div>
            <div class="cargo-info">
                <label for="" class="field-type">Cargo item</label>
                <div class="cargo-identification">
                    <label for="" class="cargo-item">' . $declared_item . '</label>
                    <label for="" class="delicate-state">Gross weight: ' . $declared_weight . ' kg</label>
                </div>
            </div>
        </div>
        <div class="cargo-lot">
            <div class="data-icon">
                <img src="../../../IMAGES/GENERAL/packaging.png" alt="">
            </div>
            <div class="cargo-info">
                <label for="" class="field-type">Packaging & State</label>
                <div class="cargo-identification">
                    <label for="" class="cargo-item">' . $delicate_type . ' </label>
                    <label for="" class="delicate-state">Delicate state: (' . $package_type . ')</label>
                </div>
            </div>
        </div>
    </div>

    <div class="cargo-horizon">
    <div class="cargo-lot">
        <div class="data-icon">
            <img src="../../../IMAGES/GENERAL/pickup-country.png" alt="">
        </div>
        <div class="cargo-info">
            <label for="" class="field-type">Pickup country</label>
            <div class="cargo-identification">
                <label for="" class="cargo-item">' . $pickup_country . '</label>
                <label for="" class="delicate-state">Address: ' . $pickup_address . '</label>
            </div>
        </div>
    </div>
    <div class="cargo-lot">
        <div class="data-icon">
            <img src="../../../IMAGES/GENERAL/delivery-country.png" alt="">
        </div>
        <div class="cargo-info">
            <label for="" class="field-type">Delivery country</label>
            <div class="cargo-identification">
                <label for="" class="cargo-item">' . $delivery_country . ' </label>
                <label for="" class="delicate-state">Address: ' . $delivery_address . '</label>
            </div>
        </div>
    </div>
</div>



<div class="cargo-horizon">
<div class="cargo-lot">
    <div class="data-icon">
        <img src="../../../IMAGES/GENERAL/departure.png" alt="">
    </div>
    <div class="cargo-info">
        <label for="" class="field-type">Departure date:</label>
        <div class="cargo-identification">
            <label for="" class="cargo-item">' . $departure_date . '</label>
            <label for="" class="delicate-state-year">mm/dd/yyyy</label>
        </div>
    </div>
</div>
<div class="cargo-lot">
    <div class="data-icon">
        <img src="../../../IMAGES/GENERAL/arrival.png" alt="">
    </div>
    <div class="cargo-info">
        <label for="" class="field-type">Arrival date: </label>
        <div class="cargo-identification">
            <label for="" class="cargo-item">' . $arrival_date . ' </label>
            <label for="" class="delicate-state-year">mm/dd/yyyy</label>
        </div>
    </div>
</div>
</div>';

$pricing_info = '
    <div class="mode-transpo">
        <div class="transpo-container">
            <label class="transpo-header" for="">Mode of Transportation</label>
            <div class="transpo-section">
                <img src="';

if ($transportation == 'Plane') {
    $pricing_info .= '../../../IMAGES/GENERAL/transport/plane.png';
} elseif ($transportation == 'Vessel') {
    $pricing_info .= '../../../IMAGES/GENERAL/transport/vessel.png';
} elseif ($transportation == 'Inland') {
    $pricing_info .= '../../../IMAGES/GENERAL/transport/inland.png';
} else {
    $pricing_info .= 'path/to/default/image.png';
}

$pricing_info .= '" alt="">
                <hr>
                <label class="prefered-transpo">' . $transportation . '</label>
            </div>
        </div>
    </div>';

$total_price = '
        <div class="mode-transpo">
        <div class="transpo-container">
            <label class="transpo-header" for="">Pricing</label>
            <div class="transpo-section-2">
                <div class="shipment-price-container">
                    <label class="currency-sign"> &#8369</label>
                    <div class="shipmnent-totalPrice">
                        ' . $shipment_price . '
                    </div>
                </div>
            </div>
        </div>
    </div>
        ';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!--Font link-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link rel="stylesheet" href="../../../STYLES/USER/VIEW-SHIPMENT/view-shipment.css">
    <link rel="stylesheet" href="../../../STYLES/OVERALL/overall.css">
    <link rel="stylesheet" href="../../../STYLES/USER/HEADER/header.css">
    <link href="https://fonts.googleapis.com/css2?family=Asap:wght@300;400;500;600;700;800&family=Assistant:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Shipment</title>
</head>

<body>
    <!-- HEADER-CONTAINER -->
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
                            <?= '<a href="../../../PHP-MODULES/USER/SHIPMENT-FORM/shipment-form.php?id=' . $id . '">Shipment form</a>'; ?>
                            <?= '<a href="../../../PHP-MODULES/USER/MY-BOOKING/my-booking.php?id=' . $id . '">My booking</a>'; ?>
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
    <!-- BODY-CONTAINER -->
    <div class="body-container">
        <div class="body-section">
            <div class="body-confirm-seperator">
                <div class="body-contents">
                    <div class="booking-header">
                        <label for="">Shipment Information</label>
                    </div>
                    <div class="booked-information">
                        <?= $booking_info ?>
                    </div>
                </div>
                <div class="pricing-modeTranspo">
                    <div class="booking-header">
                        <label for="">Transportation & Pricing</label>
                    </div>
                    <div class="pricing-information">
                        <?= $pricing_info  ?>
                    </div>
                    <div class="transpo-divider">
                        <hr>
                    </div>
                    <div class="pricing-information">
                        <?= $total_price; ?>
                    </div>
                </div>
            </div>
            <!-- <form method="post" class="done-btn" class="view-booking">
                <button name="done-btn">My booking</button>
            </form> -->
        </div>
    </div>
</body>

</html>