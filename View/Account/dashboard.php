<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="View/assets/css/donors_dash.css">
    <script src="View/assets/js/jquery-3.2.1.js"></script>
    <script src="View/assets/js/main.js"></script>
    <title><?= Auth::GetUsername(); ?> - Dashboard</title>
</head>

<body>
    
    <header>
        <nav>
            <a href="#"><img id="menu" src="View/assets/images/dash_icons/User_Male_50px.png" alt="menu button"></a>
            <a href="index.php"><img id="logo" src="View/assets/images/logo.png" alt="logo"></a>
        </nav>
    </header>

    <div class="user-menu">
        <span><?= Auth::GetUsername(); ?></span>
        <div class="separator"></div>
        <a href="#">Edit Profile</a>
        <a href="Controller/User/logout.php">Log Out</a>
    </div>
    
    <div class="shadow"></div>

    <section class="main">

        <div class="option" id="bank_option">
            <div class="top_section">
                <img src="View/assets/images/dash_icons/Blood_Bank_White_96px.png" alt="Blood Bank">
            </div>
            <div class="separator"></div>
            <div class="bottom">
                <a href="donation.php"><h2 class="option-title">Faire une Donation</h2></a>
                <p class="option-msg">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi voluptas a eos qui quis assumenda eum, possimus in ex, deserunt delectus quia? Ab similique laborum alias provident nostrum sapiente ipsam.</p>
            </div>
        </div>


        <div class="option" id="request_option">
            <div class="top_section">
                <img src="View/assets/images/dash_icons/Syringe_White_50px.png" alt="Blood Request">
            </div>
            <div class="separator"></div>
            <div class="bottom">
                <a href="blood_search.php"><h2 class="option-title">Blood Request</h2></a>
                <p class="option-msg">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi voluptas a eos qui quis assumenda eum, possimus in ex, deserunt delectus quia? Ab similique laborum alias provident nostrum sapiente ipsam.</p>
            </div>
        </div>

        <div class="option" id="test_option">
            <div class="top_section">
                <img src="View/assets/images/dash_icons/Test_Results_White_96px.png" alt="Tests Results">
            </div>
            <div class="separator"></div>
            <div class="bottom">
                <a href="#"><h2>Tests Results</h2></a>
                <p class="option-msg">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi voluptas a eos qui quis assumenda eum, possimus in ex, deserunt delectus quia? Ab similique laborum alias provident nostrum sapiente ipsam.</p>
            </div>
        </div>

        
        
    </section>

    <footer>

    </footer>

</body>

</html>
