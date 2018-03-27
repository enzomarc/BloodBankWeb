<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Blood Bank - Login</title>
        <link rel="stylesheet" type="text/css" href="View/assets/css/seekers.css">
        <link rel="stylesheet" type="text/css" href="View/assets/css/normalize.css">
        <script src="View/assets/js/jquery-3.2.1.js"></script>
        <script src="View/assets/js/main.js"></script>
        <script src="View/assets/js/login.js"></script>
    </head>
    
    <body>
                
        <section id="main">
            
            <div class="register-box">
                
                <div class="shadow"></div>

                <a href="index.html"><h2>Blood Bank</h2></a>
                <p class="manifest">Need Blood ?<br>We got what you need.</p>
                <button type="button" class="register-btn">REGISTER NOW</button>
                <div class="links">
                    <a href="index.html">Home</a>
                    <a href="#">Community</a>
                    <a href="#">About</a>
                </div>

            </div>
            
            <div class="middle-separator"></div>
            
            <div class="login-box">
                                
                <form class="login-form" id="login-form" method="post" action="../../Controller/User/login.php">
                    <label id="name-label" for="username" style="display:none">NAME</label><br>
                    <input type="text" id="username" name="username" style="display:none"><br>
                    <label id="group-label" for="bloodgroup" style="display:none">BLOOD GROUP</label><br>
                    <select name="bloodgroup" id="bloodgroup" style="display:none">
                        <option value="">Choose blood group ...</option>
                        <option value="ap">Group A+</option>
                        <option value="am">Group A-</option>
                        <option value="bp">Group B+</option>
                        <option value="bm">Group B-</option>
                        <option value="abp">Group AB+</option>
                        <option value="abm">Group AB-</option>
                        <option value="op">Group O+</option>
                        <option value="om">Group O-</option>
                    </select><br>
                    <label for="user-phone">PHONE</label><br>
                    <input type="tel" id="user-phone" maxlength="9" name="phone"><br>
                    <label for="user-password">PASSWORD</label><br>
                    <input type="password" id="user-password" name="password"><br>
                    <button type="button" class="login-button">LOGIN NOW</button>
                    <a href="#" class="recover-password">I forgot my password</a>
                </form>
                
            </div>
            
        </section>
    
    </body>
    
</html>