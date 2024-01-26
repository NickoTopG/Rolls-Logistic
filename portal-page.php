<!DOCTYPE html>
<html lang="en">

<head>
    <!--Font link-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Asap:wght@300;400;500;600;700;800&family=Assistant:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <!-- Font awesome link-->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <!--CSS links-->
    <link rel="stylesheet" href="STYLES/OVERALL/overall.css">
    <link rel="stylesheet" href="STYLES/OVERALL/header.css">
    <link rel="stylesheet" href="STYLES/PORTAL-PAGE/portal-page.css">
    <link rel="stylesheet" href="STYLES/FOOTER/footer.css">

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rolls</title>
</head>

<body>
    <div class="header-container">
        <div class="header-sections">
            <div class="header-components">
                <div class="header-left-section">
                    <div class="logo-font">
                        <label for="">Rolls</label>
                    </div>
                    <div class="header-services">
                        <div class="services-navigation">
                            <a href="">Services</a>
                            <a href="">About</a>
                            <a href="">Contact</a>
                        </div>
                    </div>
                </div>
                <div class="header-right-section">
                    <div class="personalization-container">
                        <a href="login.php"><img src="IMAGES/GENERAL/account.png" alt=""></a>
                    </div>
                </div>
            </div>
            <div class="header-campaign-headings">
                <div class="campaign-title">Revolutionize and transform your business flow</div>
            </div>
        </div>
    </div>
    <div class="campaign-section">
        <img src="IMAGES/GENERAL/pic.jpg" alt="">
        <div class="header-center-headings">
            <div class="tracking-header">
                Tracking
            </div>
            <div class="tracking-input">
                <div class="overlay-location">
                    <input type="text" placeholder="Tracking ID">
                    <div class="location-logo"><img src="IMAGES/GENERAL/location.png" alt=""></div>
                </div>
                <button>Track</button>
            </div>
        </div>
    </div>
    <div class="body-container">
        <div class="body-section">
            <div class="body-account">
                <div class="body-account-textguide">
                    <div class="account-sections">
                        <div class="account-lot">
                            <div class="body-account-icon">
                                <img src="IMAGES/GENERAL/global.png" alt="">
                            </div>
                            <div class="account-texts">
                                <div class="body-account-header">How to get started</div>
                                <div class="body-account-subheader">
                                    <label for="">Step by step guides to get started using our digital services. </label>
                                    <a href="signup.php" class="register-container">
                                        <button class="register-button">Learn more</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="account-sections">
                        <div class="account-lot">
                            <div class="body-account-icon">
                                <img src="IMAGES/GENERAL/add-user.png" alt="">
                            </div>
                            <div class="account-texts">
                                <div class="body-account-header">New to Rolls.com?</div>
                                <div class="body-account-subheader">
                                    <label for="">Sign up to book online, manage and pay for shipments, and access a suite of products and services designed to simplify your supply chain. </label>
                                    <a href="signup.php" class="register-container">
                                        <button class="register-button">Register now</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?= include "PHP-MODULES/FILE-COMPONENTS/footer.html" ?>
</body>

</html>