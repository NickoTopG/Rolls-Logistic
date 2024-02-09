<?php

include "../../connection.php";

// Data
$id = $_GET['id'];
$shipping_id = $_GET['shipping_id'];
$declared_item = $_GET['declared_item'];
$declared_weight = $_GET['declared_weight'];
$shipment_price = $_GET['shipment_price'];
$shipping_code = $_GET['shipping_code'];
$delicate_type = $_GET['delicate_type'];
$package_type = $_GET['package_type'];

$pickup_id = $_GET['pickup_id'];
$pickup_country = $_GET['pickup_country'];
$pickup_address = $_GET['pickup_address'];
$transportation = $_GET['transportation'];

$delivery_id = $_GET['delivery_id'];
$delivery_country = $_GET['delivery_country'];
$delivery_address = $_GET['delivery_address'];
$arrival_date = date('m/d/Y', strtotime($_GET['arrival_date']));
$pickup_date = date('m/d/Y', strtotime($_GET['pickup_date']));

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
                    <label for="" class="delicate-state">Packaging: (' . $package_type . ')</label>
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
        <label for="" class="field-type">Pickup date:</label>
        <div class="cargo-identification">
            <label for="" class="cargo-item">' . $pickup_date . '</label>
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

if ($transportation === 'Plane') {
    $pricing_info .= '../../../IMAGES/GENERAL/transport/plane.png';
} elseif ($transportation === 'Vessel') {
    $pricing_info .= '../../../IMAGES/GENERAL/transport/vessel.png';
} elseif ($transportation === 'Inland') {
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
        <div class="body-section" id="body-shipping-section">
            <div class="shipping-headlines">
                <div class="shipping-code-section">
                    <div class="shipping-code-container1">
                        <div class="shipping-code-content">
                            <div class="shipping-code-text1">
                                <div class="shipment-admission-header">
                                    <div class="shipment-header-section">
                                        <img src="../../../IMAGES/GENERAL/update-header.png" alt="">
                                        <label class="shipping-statement" for="">Shipping updates</label>
                                    </div>
                                    <hr>
                                </div>
                                <div class="shipment-admission">
                                    <div class="shipment-admission-section">
                                        <div class="shipment-addmision-contents">
                                            <label class="shipping-text-status" for="">Shipping Status:</label>
                                            <div class="shipping-status" for="">
                                                <img src="../../../IMAGES/GENERAL/aproved.png" alt="">
                                                <label for="">To ship</label>
                                            </div>
                                        </div>
                                        <div class="shipment-addmision-contents">
                                            <label class="shipping-text-status" for="">Expected arrival date:</label>
                                            <div class="shipping-status" for="">
                                                <img src="../../../IMAGES/GENERAL/update-date.png" alt="">
                                                <label for=""><?= $arrival_date ?></label>
                                            </div>
                                        </div>
                                        <div class="shipment-addmision-contents">
                                            <label class="shipping-text-status" for="">Current location:</label>
                                            <div class="shipping-status" for="">
                                                <img src="../../../IMAGES/GENERAL/update-country.png" alt="">
                                                <label for=""><?= $pickup_country ?></label>
                                            </div>
                                        </div>
                                        <div class="shipment-addmision-contents">
                                            <label class="shipping-text-status" for="">Shipping Status:</label>
                                            <div class="shipping-status" for="">
                                                <img src="../../../IMAGES/GENERAL/aproved.png" alt="">
                                                <label for="">4Wod1l@</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="shipping-image-container">

                            </div>
                        </div>
                    </div>
                    <div class="shipping-code-container2">
                        <div class="shipping-code-content">
                            <div class="shipping-code-text2">
                                <div class="shipment-admission-header"><label class="shipping-statement" for="">Shipping code#</label></div>
                                <label class="shipping-code" for=""><?= $shipping_code ?></label>
                            </div>
                            <div class="shipping-image-container">
                                <img src="../../../IMAGES/GENERAL/shipping-code.png" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="shipment-content-data">
                <div class="shipment-receipt">
                    <div class="shipment-text-logo">
                        <div class="receipt-section">
                            <img src="../../../IMAGES/GENERAL/receipt.png" alt="">
                            <label for="">Official receipt</label>
                        </div>
                        <?= '<a href="../../../PHP-MODULES/USER/VIEW-SHIPMENT/edit-shipment.php?id= ' . $id .
                            '&declared_item=' . $declared_item .
                            '&shipping_id=' . $shipping_id .
                            '&shipment_price=' . $shipment_price .
                            '&shipping_code=' . $shipping_code .
                            '&declared_weight=' . $declared_weight .
                            '&pickup_id=' . $pickup_id .
                            '&pickup_country=' . $pickup_country .
                            '&pickup_address=' . $pickup_address .
                            '&pickup_date=' . $pickup_date .
                            '&package_type=' . $package_type .
                            '&delicate_type=' . $delicate_type .
                            '&delivery_id=' . $delivery_id .
                            '&delivery_country=' . $delivery_country .
                            '&delivery_address=' . $delivery_address .
                            '&arrival_date=' . $arrival_date .
                            '&transportation=' . $transportation .
                            ' " class="modification-container">
                    <p>Modify this shipment?</p>
                </a>' ?>
                    </div>
                </div>
                <div class="body-confirm-seperator">
                    <div class="body-contents">
                        <div class="booking-header">
                            <label for="">Shipment Information</label>
                        </div>
                        <div class="booked-information">
                            <?php
                            if (isset($booking_info)) {
                                echo $booking_info;
                            } else {
                                echo "Wala";
                            }  ?>
                        </div>
                    </div>
                    <div class="pricing-modeTranspo">
                        <div class="booking-header">
                            <label for="">Transportation & Pricing</label>
                        </div>
                        <div class="pricing-information">

                            <?php
                            if (isset($pricing_info)) {
                                echo $pricing_info;
                            }  ?>
                        </div>
                        <div class="transpo-divider">
                            <hr>
                        </div>
                        <div class="pricing-information">
                            <?php
                            if (isset($total_price)) {
                                echo $total_price;
                            } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</body>

</html>