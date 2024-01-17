<?php
include "../../connection.php";



$id = $_GET['id'];

// SELECT COUNTRIES
$query_countries = "SELECT countries FROM route_countries";
$result_country = mysqli_query($con, $query_countries);
$all_countries = '';
if ($result_country) {
    while ($row = mysqli_fetch_assoc($result_country)) {
        $all_countries .= '<option>' . $row['countries'] . '</option>';
    }
} else {
    echo "<script>alert('Error in query: " . mysqli_error($con) . "')</script>";
}



if (isset($_POST['submit-book'])) {

    // INSERT SHIPPING ITEM MATTER
    $declared_items = $_POST['declared-items'];
    $declared_weight = $_POST['declared-weight'];
    $declared_delicate = $_POST['declared-delicate'];
    $declared_package = $_POST['declared-package'];
    $shipment_price = $_POST['shipment-price'];

    $sql_item_info = "INSERT INTO user_shippings (declared_items, declared_weight, delicate_type, package_type, user_id, shipment_price)
                      VALUES ('$declared_items', $declared_weight, '$declared_delicate', '$declared_package', '$id', $shipment_price)";

    $result_booking = mysqli_query($con, $sql_item_info);

    // INSERT PICKUP_COUNTRY MATTER
    $pickup_date = $_POST['pickup-date'];
    $pickup_country = $_POST['pickup-country'];
    $pickup_address = $_POST['pickup-address'];
    $mode_transportation = $_POST['mode-transportation'];
    $departure_date = $_POST['departure-date'];

    $sql_pickup_country = "INSERT INTO pickup_countries (pickup_country, pickup_address, pickup_date, transportation, departure_date, user_id)
                            VALUES ('$pickup_country', '$pickup_address', '$pickup_date','$mode_transportation', '$departure_date', '$id')";

    $result_pickup_country = mysqli_query($con, $sql_pickup_country);

    // INSERT DELIVERY_COUNTRY  MATTER
    $delivery_country = $_POST['delivery-country'];
    $delivery_address = $_POST['delivery-address'];
    $arrival_date = $_POST['arrival-date'];

    $sql_delivery_country = "INSERT INTO delivery_countries (delivery_country, delivery_address, arrival_date, user_id)
                            VALUES ('$delivery_country', '$delivery_address', '$arrival_date', '$id')";

    $result_delivery_country = mysqli_query($con, $sql_delivery_country);


    if (!$result_booking || !$result_pickup_country || !$result_delivery_country) {
        echo "Insert error";
    } else {
        header("location: ../../../PHP-MODULES/USER/SHIPMENT-FORM/confirm-booking.php?id=$id");
        exit();
    }
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!--Font link-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Asap:wght@300;400;500;600;700;800&family=Assistant:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <!--CSS links-->
    <link rel="stylesheet" href="../../../STYLES/OVERALL/overall.css">
    <link rel="stylesheet" href="../../../STYLES/USER/SHIPMENT-FORM/shipment-form.css">
    <link rel="stylesheet" href="../../../STYLES/USER/HEADER/header.css">
    <!--CALCULATOR LINK-->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shimpment Form</title>
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
                            <a href="">Shipment Form</a>
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
    <!--BODY-CONTAINER-->
    <div class="body-container">
        <form method="POST" class="body-section" id="booking-form" name="booking-form">
            <div class="process-container">
                <div class="process-section">
                    <div class="process-header">
                        <label for="">Book-Your-cargo</label>
                    </div>
                    <div class="process-progress-container">
                        <div class="current-progress">
                            <div class="progress-circle-label">
                                <img class="sign" src="../../../IMAGES/GENERAL/logo.png" alt="">
                                <label for="">Information</label>
                            </div>
                            <div class="current-hr">
                                <hr>
                            </div>
                        </div>
                        <div class="current-progress">
                            <div class="current-hr">
                                <hr>
                            </div>
                            <div class="progress-circle-label">
                                <img class="sign" src="../../../IMAGES/GENERAL/proceeding-progress.png" alt="">
                                <label class="untraversed-process" for="">Booked</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- STEPS-CONTAINER -->
            <div class="steps-container">
                <div class="steps-section">
                    <div class="steps-header">
                        Cargo Details
                    </div>
                    <div class="numerical-steps">
                        <p>1.</p>
                        <label for="">Item & Packaging</label>
                        <hr>
                        <img src="../../../IMAGES/GENERAL/info.png" alt="">
                    </div>
                </div>
            </div>
            <!-- SHIPPING-FORM -->
            <div class="shipping-form">
                <div class="shipping-section">
                    <div class="shipment-form">
                        <div class="shipment-seperator-row">
                            <div class="shipment-fields">
                                <label for="declared-items">Declared items:</label>
                                <input type="text" id="declared-items" name="declared-items" min="20" placeholder="Commodity">
                                <div class="error-message" id="error-declared-items"></div>
                            </div>

                        </div>
                        <div class="shipment-seperator-row">
                            <!-- <div class="shipment-fields">
                                <label for="">Delicate type:</label>
                                <select class="form-select cForm-select">
                                    <option disabled selected style="display: none;">Choose delicate:</option>
                                    <option value="Fragile">Fragile</option>
                                    <option value="Sturdy">Sturdy</option>
                                </select>
                                <div class="error-message" id="error-declared-delicate"></div>
                            </div> -->
                            <div class="shipment-fields">
                                <label for="">Package type:</label>
                                <select class="form-select cForm-select" id="declared-package" name="declared-package">
                                    <option disabled selected style="display: none;">Choose package:</option>
                                    <option value="Cardboard boxes">Cardboard Boxes</option>
                                    <option value="Pallets">Pallets</option>
                                    <option value="Crates">Crates</option>
                                    <option value="Bags/Sacks">Bags/Sacks</option>
                                    <option value="Tubes">Tubes</option>
                                    <option value="Refrigerated Containers">Refrigerated Containers</option>
                                    <option value="Flexible Packaging">Flexible Packaging</option>
                                    <option value="Plastic Containers">Plastic Containers</option>
                                </select>
                                <div class="error-message" id="error-declared-package"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- STEPS-CONTAINER -->
            <div class="steps-container">
                <div class="steps-section">
                    <div class="steps-header">
                        Calculate & Metrics
                    </div>
                    <div class="numerical-steps">
                        <p>2.</p>
                        <label for="">Weight Calculator</label>
                        <hr>
                        <img src="../../../IMAGES/GENERAL/info.png" alt="">
                    </div>
                </div>
            </div>
            <!-- SHIPPING-FORM -->
            <div class="shipping-form">
                <div class="shipping-section">
                    <div class="modal-content" id="calculator-container">
                        <div class="calculate-header">
                            <label class="modal-title">Calculate Weight</label>
                            <div class="label-info">
                                <div class="calculate-tooltip">
                                    <img src="../../../IMAGES/GENERAL/info.png" alt="">
                                    <div class="tooltip-guide">
                                        <p><label for="">Declared weight:</label> 45 peso x kg. </p>
                                        <p><label for="">Fragile type:</label> 45 peso and must add 12 pesos x kg.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-lot">
                            <div method="POST" class="form-container">

                                <div class="form-seperator">
                                    <div class="form-seperator-section">
                                        <div class="form-group">
                                            <label for="name" class="">Declared weight:</label>
                                            <div class="overlay-input">
                                                <input type="number" class="" id="item-weight" name="declared-weight" min="1" placeholder="Weight in kg">
                                                <div class="absolute-guide">kg</div>
                                            </div>
                                            <div class="error-message" id="error-declared-weight"></div>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Delicate type:</label>
                                            <select class="delicate-select" id="declared-delicate" name="declared-delicate">
                                                <option class="disable-select" disabled selected style="display: none;">Choose Delicate</option>
                                                <option value="Inland">Sturdy</option>
                                                <option value="Vessel">Fragile</option>
                                            </select>
                                            <div class="error-message" id="error-declared-delicate"></div>
                                        </div>
                                    </div>
                                    <div class="calculate-result">
                                        <label for="">Total Price:</label>
                                        <label for="" id="display-full-price">0</label>
                                    </div>
                                    <div class="calculate-submit" id="calculate-submit-container">
                                        <button class="weight-calculator-trigger" id="calculate-button" type="button">
                                            Calculate
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- STEPS-CONTAINER -->
            <div class="steps-container">
                <div class="steps-section">
                    <div class="steps-header">
                        Sender & Recipient
                    </div>
                    <div class="numerical-steps">
                        <p>3.</p>
                        <label for="">Point to destination</label>
                        <hr>
                        <img src="../../../IMAGES/GENERAL/info.png" alt="">
                    </div>
                </div>
            </div>
            <!-- SHIPPING-FORM -->
            <div class="shipping-form">
                <div class="shipping-section">
                    <div action="" class="shipment-form">
                        <div class="shipment-seperator-row">
                            <div class="shipment-fields">
                                <label for="">Pickup country:</label>
                                <select class="form-select cForm-select" id="pickup-country" name="pickup-country">
                                    <option disabled selected style="display: none;">Pickup Countries</option>
                                    <?php echo $all_countries; ?>
                                </select>
                                <div class="error-message" id="error-pickup-country"></div>
                            </div>
                            <div class="shipment-fields">
                                <label for="">Mode of Transpo:</label>
                                <select class="form-select cForm-select" id="mode-transpo" name="mode-transportation">
                                    <option disabled selected style="display: none;">Transport</option>
                                    <option value="Inland">Inland</option>
                                    <option value="Vessel">Vessel</option>
                                    <option value="Plane">Plane</option>
                                </select>
                                <div class="error-message" id="error-mode-transpo"></div>
                            </div>
                        </div>
                        <div class="shipment-seperator-row">
                            <div class="shipment-fields">
                                <label for="">Pickup address:</label>
                                <input type="text" id="pickup-address" placeholder="Pickup address" name="pickup-address">
                                <div class="error-message" id="error-pickup-address"></div>
                            </div>
                        </div>

                        <div class="shipment-seperator-row">
                            <div class="shipment-fields">
                                <label for="">Delivery country</label>
                                <select class="form-select cForm-select" id="delivery-country" name="delivery-country">
                                    <option disabled selected style="display: none;">Countries</option>
                                    <?php echo $all_countries; ?>
                                </select>
                                <div class="error-message" id="error-delivery-country"></div>
                            </div>
                            <div class="shipment-fields">

                            </div>
                        </div>
                        <div class="shipment-seperator-row">
                            <div class="shipment-fields">
                                <label for="">Delivery address</label>
                                <input type="text" id="delivery-address" placeholder="Delivery address" name="delivery-address">
                                <div class="error-message" id="error-delivery-address"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- STEPS-CONTAINER -->
            <div class="steps-container">
                <div class="steps-section">
                    <div class="steps-header">
                        Date
                    </div>
                    <div class="numerical-steps">
                        <p>4.</p>
                        <label for="">Departure & Arrival</label>
                        <hr>
                        <img src="../../../IMAGES/GENERAL/info.png" alt="">
                    </div>
                </div>
            </div>
            <div class="shipping-form">
                <div class="shipping-section">
                    <div action="" class="shipment-form">
                        <div class="shipment-seperator-row">
                            <div class="shipment-fields">
                                <label for="">Pickup date:</label>
                                <input type="date" id="declared-pickup" name="pickup-date">
                                <div class="error-message" id="error-declared-pickup"></div>
                            </div>
                            <div class="shipment-fields">
                                <label for="">Departure date:</label>
                                <input type="date" id="declared-departure" placeholder="Earliest of date" name="departure-date">
                                <div class="error-message" id="error-declared-departure"></div>
                            </div>
                            <div class="shipment-fields">
                                <label for="">Arrival date:</label>
                                <input type="date" id="declared-arrival" name="arrival-date">
                                <div class="error-message" id="error-declared-arrival"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- STEPS-CONTAINER -->
            <div class="steps-container">
                <div class="steps-section">
                    <div class="steps-header">
                        Pricing
                    </div>
                    <div class="numerical-steps">
                        <p>5.</p>
                        <label for="">Gross Weight Price: </label>
                        <hr>
                        <img src="../../../IMAGES/GENERAL/info.png" alt="">
                    </div>
                </div>
            </div>

            <div class="shipping-form">
                <div class="shipping-section">
                    <div class="price-dashboard">
                        <label class="price-header" for="price-header">Total Price: </label>
                        <label class="display-full-price1" for="shipment-price" id="display-full-price1">0</label>
                        <!-- INVISIBLE INPUT associated at name: submit-book -->
                    </div>
                </div>
            </div>
            <div class="book-buttonContainer">
                <button type="submit" id="submit-book" name="submit-book">Book now</button>
                <input type="text" id="shipment-price1" name="shipment-price" style="opacity: 0;">
            </div>
        </form>
    </div>

    <!-- Modal
    <div class="modal fade" id="okModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header d-flex flex-column align-items-center">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Confirm Booking</h1>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Ok</button>
                </div>
            </div>
        </div>
    </div> -->
    <!-- JS files -->
    <script src="../../../JAVASCRIPT/USER/SHIPMENT-FORM/index.js"></script>
</body>

</html>