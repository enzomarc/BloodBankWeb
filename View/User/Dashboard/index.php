<html>
    
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blood Bank - Dashboard</title>
    <link rel="stylesheet" type="text/css" href="View/assets/css/dashboard-styles.css">
    <link rel="stylesheet" type="text/css" href="View/assets/css/edit-styles.css">
    <link rel="stylesheet" type="text/css" href="View/assets/css/normalize.css">
    <link rel="stylesheet" type="text/css" href="View/assets/css/skeleton.css">
    <link rel="stylesheet" type="text/css" href="View/assets/css/_nucleo-outline.scss">

    <script src="View/assets/js/jquery-3.2.1.js"></script>
    <script src="View/assets/js/main.js"></script>
    <script src="View/assets/js/dashboard.js"></script>
</head>
    
<body>

    <?php require_once 'Controller/User/dashboard.php'; ?>

    <div class="content">
            
        <div class="three columns" id="menu-container">
                
            <div class="header">

                <h5>Electronic Blood Bank</h5>
                <hr>

                <img id="avatar" src="View/assets/images/pp/<?= $avatar; ?>" alt="avatar">
                <h6><?= Auth::GetUsername(); ?></h6>

                <div class="menu-items">
                    <div class="container">
                        <div class="row"><a class="button button-primary u-full-width" href="index.php?p=dashboard"><i class="now-ui-icons business_chart-bar-32">&nbsp;&nbsp;</i>Dashboard</a></div>
                        <div class="row"><a class="button u-full-width" href="index.php?p=dashboard&v=edit"><i class="now-ui-icons users_single-02">&nbsp;&nbsp;</i>User Profile</a></div>
                        <div class="row"><a class="button u-full-width" href="index.php?p=dashboard&v=notification"><i class="now-ui-icons ui-1_bell-53">&nbsp;&nbsp;</i>Notifications</a></div>
                        <div class="row"><a class="button u-full-width" href="index.php?p=dashboard&v=result"><i class="now-ui-icons files_paper">&nbsp;&nbsp;</i>Test Results</a></div>
                        <div class="row"><a class="button u-full-width" href="index.php?p=logout"><i class="now-ui-icons travel_info">&nbsp;&nbsp;</i>Logout</a></div>
                    </div>
                </div>

            </div>

        </div>
        
        <div class="row">
            
            <div class="eight columns" id="main-container">
                
                <?php 
                    if (isset($_GET['v']))
                    {
                        $path = dirname(__DIR__) . '\Dashboard\\' . $_GET['v'] . '.php';
                        require_once file_exists($path) ? $path : 'dashboard.php';
                    }
                    else
                        require_once 'dashboard.php';
                ?>
                
            </div>
            
        </div>
            
    </div>
        
</body>
    
</html>