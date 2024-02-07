<!DOCTYPE html>
<html lang="en">

<head>
    <!--Font link-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Asap:wght@300;400;500;600;700;800&family=Assistant:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <!--CSS links-->
    <link rel="stylesheet" href="STYLES/OVERALL/overall.css">
    <link rel="stylesheet" href="STYLES/FOOTER/footer.css">
    <link rel="stylesheet" href="STYLES/PORTAL-PAGE/header.css">
    <link rel="stylesheet" href="STYLES/PORTAL-PAGE/services.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <!-- HEADER-CONTAINER -->
    <div class="header-container">
        <div class="header-sections">
            <div class="header-components">
                <div class="header-left-section">
                    <div class="logo-font">
                        <img class="logistic-logo" src="IMAGES/GENERAL/logo.png" alt="">
                        <label for="">Rolls</label>
                    </div>
                    <div class="header-services">
                        <div class="services-navigation">
                            <a href="portal-page.php">Home</a>
                            <a href="">Services</a>
                            <a href="">About us</a>
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
    <div class="service-body-Container">
        <div class="service-body-section">
            <div class="transit-services-container">
                <div class="transit-text-guide">
                    <label class="transit-headerType">Transport Services</label>
                    <label class="transit-headingType">Regardless of your industry, your commodity, or your key markets, Rolls has solutions that offer both small and large businesses the opportunity to grow.
                        We serve our customers with frequent departures on all major trade lanes and inland services for a true end-to-end experience.</label>
                </div>
                <div class="transit-offering-container">
                    <div class="transit-offering-contents">
                        <img src="IMAGES/GENERAL/PORTAL-PAGES/SERVICES/ocean-transport.jpg" alt="">
                        <div class="transit-offering-text">
                            <div class="transit-offering-text">
                                <label class="transit-offering-textH">
                                    Ocean Transport
                                </label>
                                <label class="transit-offering-textS">
                                    As one of the world's largest container shipping companies, we move 12 million containers every year and
                                    deliver to every corner of the globe.
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="transit-offering-contents">
                        <img src="IMAGES/GENERAL/PORTAL-PAGES/SERVICES/inland-transport.jpg" alt="">
                        <div class="transit-offering-text">
                            <label class="transit-offering-textH">
                                Inland services
                            </label>
                            <label class="transit-offering-textS">
                                By truck, rail or barge, we take your goods from farm to store doors.
                            </label>
                        </div>
                    </div>
                    <div class="transit-offering-contents">
                        <img src="IMAGES/GENERAL/PORTAL-PAGES/SERVICES/air-transport.webp" alt="">
                        <div class="transit-offering-text">
                            <label class="transit-offering-textH">
                                Air freight
                            </label>
                            <label class="transit-offering-textS">
                                Reduce the cost of transporting your urgent or time critical cargo with our Global Air Freight solutions. Learn more about Rolls Air.
                            </label>
                        </div>
                    </div>
                    <div class="transit-offering-contents">
                        <img src="IMAGES/GENERAL/PORTAL-PAGES/SERVICES/small-transport.webp" alt="">
                        <div class="transit-offering-text">
                            <label class="transit-offering-textH">
                                Less than Container Load (LCL)
                            </label>
                            <label class="transit-offering-textS">
                                Be it shipping small boxes or pallets, our LCL cargo solutions ensure on-time shipment and delivery of your cargo while saving both time and money.
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?= include "PHP-MODULES/FILE-COMPONENTS/footer.html" ?>
</body>

</html>