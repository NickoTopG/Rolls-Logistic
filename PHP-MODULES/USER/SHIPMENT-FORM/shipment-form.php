<?php
include "../../connection.php";

$id = '';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    var_dump($id);
}

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
    $pickup_country = $_POST['pickup-country'];
    $pickup_address = $_POST['pickup-address'];
    $mode_transportation = $_POST['mode-transportation'];
    $departure_date = $_POST['departure-date'];

    $sql_pickup_country = "INSERT INTO pickup_countries (pickup_country, pickup_address, transportation, departure_date, user_id)
                            VALUES ('$pickup_country', '$pickup_address', '$mode_transportation', '$departure_date', '$id')";

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
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">

    <!--CSS links-->
    <link rel="stylesheet" href="../../../STYLES/OVERALL/overall.css">
    <link rel="stylesheet" href="../../../STYLES/USER/SHIPMENT-FORM/shipment-form.css">
    <link rel="stylesheet" href="../../../STYLES/USER/HEADER/header.css">
    <!--CALCULATOR LINK-->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <!-- Include Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
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
    <!-- HELP ME TO CALCULATE -->
    <div class="modal" id="calculate-container">
        <div class="modal-dialog custom-modal-width">
            <div class="modal-content" id="modal-content">
                <div class="calculate-header">
                    <label class="modal-title">Calculate Weight</label>
                    <div class="label-info">
                        <div class="calculate-tooltip">
                            <img src="../../../IMAGES/GENERAL/info.png" alt="">
                            <div class="tooltip-guide">
                                <p><label for="">Declared weight:</label> 45 peso x kg. </p>
                                <p><label for="">Delicate type:</label> fragile items must add 12 pesos x kg.</p>
                            </div>
                        </div>
                    </div>
                    <div class="close-calculate" data-bs-dismiss="modal" aria-label="Close">
                        <img class="close-btn-calculate" src="../../../IMAGES/GENERAL/close.png" alt="">
                    </div>
                </div>
                <div class="form-lot">
                    <form method="POST" class="form-container">
                        <div class="form-seperator">
                            <div class="form-group">
                                <label for="name" class="">Declared weight:</label>
                                <div class="overlay-input">
                                    <input type="number" class="" id="item-weight" min="1" value="1" placeholder="Weight in kg" required>
                                    <div class="absolute-guide">kg</div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" id="selected-delicate">Delicate type:</label>
                                <div class="custom-select-container" id="custom-select">
                                    <div class="custom-select">
                                        <label id="selected-option" value="">Choose delicate</label>
                                        <div class="custom-select-options">
                                            <label class="delicate-type" id="delicate-type-sturdy" value="Sturdy">Sturdy</label>
                                            <label class="delicate-type" id="delicate-type-fragile" value="Fragile">Fragile</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="calculate-result">
                                <label for="">Total Price:</label>
                                <label for="" id="display-full-price">0</label>
                            </div>
                            <div class="calculate-submit" id="calculate-submit-container">
                                <button class="weight-calculator-trigger" id="calculate-button" type="button">
                                    Help me calculate
                                </button>
                            </div>
                        </div>
                    </form>
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

            <!-- SHIPPING-FORM -->
            <div class="shipping-form">
                <div class="shipping-section">
                    <div class="shipment-form">
                        <div class="shipment-seperator-row">
                            <div class="shipment-fields">
                                <label for="declared-items">Declared items:</label>
                                <input type="text" id="declared-items" name="declared-items" placeholder="Commodity">
                                <div class="error-message" id="error-declared-items"></div>
                            </div>
                            <div class="shipment-fields">
                                <label for="">Declared weight</label>
                                <div class="overlay-input">
                                    <input type="number" id="declared-weight" name="declared-weight" placeholder="weight in kg" min="1">
                                    <div class="absolute-guide">kg</div>
                                </div>
                                <div class="error-message" id="error-declared-weight"></div>
                            </div>
                        </div>
                        <div class="shipment-seperator-row">
                            <div class="shipment-fields">
                                <label for="">Delicate type:</label>
                                <select class="form-select cForm-select" id="declared-delicate" name="declared-delicate">
                                    <option disabled selected style="display: none;">Choose delicate:</option>
                                    <option value="Fragile">Fragile</option>
                                    <option value="Sturdy">Sturdy</option>
                                </select>
                                <div class="error-message" id="error-declared-delicate"></div>
                            </div>
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
                        <div class="shipment-seperator-calculator">
                            <button class="weight-calculator-trigger" id="calculate-weightPrice" type="button" data-toggle="modal" data-target="#calculate-container">
                                Help me calculate
                            </button>
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
                        <p>2.</p>
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
                                    <option disabled selected style="display: none;">Countries</option>
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
                        <hr>
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
                        <p>3.</p>
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
            <div class="book-buttonContainer">
                <div class="price-dashboard">
                    <label class="price-header" for="price-header">Total Price: </label>
                    <label class="display-full-price1" for="shipment-price" id="display-full-price1">0</label>
                    <!-- INVISIBLE INPUT associated at name: submit-book -->
                </div>
                <button type="submit" id="submit-book" name="submit-book">Book now</button>
                <input type="text" id="shipment-price1" name="shipment-price" style="opacity: 0;">
            </div>
        </form>
    </div>

    <!-- Modal -->
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
    </div>
    <script>
        $(document).ready(function() {
            $('#calculate-weightPrice').click(function() {
                $('#calculate-container').modal('show');
            });
        });
    </script>
    <!-- Bootstrap JS and dependencies 'FOR DESIGN' -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>

    <!-- JS files -->
    <script src="../../../JAVASCRIPT/USER/SHIPMENT-FORM/index.js"></script>
</body>

</html>