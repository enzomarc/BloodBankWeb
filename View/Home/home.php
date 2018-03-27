<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Blood Bank</title>
        <link rel="stylesheet" type="text/css" href="View/assets/css/styles.css">
        <link rel="stylesheet" type="text/css" href="View/assets/css/normalize.css">
        <script src="View/assets/js/jquery-3.2.1.js"></script>
        <script src="View/assets/js/main.js"></script>
    </head>
    
    <body>
    
        <video id="bgvid" playsinline loop autoplay muted>
            <source src="View/assets/videos/bgvid.mp4" type="video/mp4">
        </video>

        <header>
        
            <nav>
                <a href="#"><img id="menu" src="View/assets/images/menu.png" alt="menu button"></a>
                <a href="index.php?p=home"><img id="logo" src="View/assets/images/logo.png" alt="logo"></a>
            </nav>
            
        </header>
        
        <div id="shadow"></div>
        
        <!-- Main section -->
        
        <section id="main">
            
            <div class="content">
                <h1 id="title">Electronic Blood Bank</h1>
                <div id="border"></div>
                <p id="informations">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Vitae illum veritatis id perferendis blanditiis facere similique quisquam voluptatem consequatur minima consectetur aliquid perspiciatis soluta sint mollitia impedit sequi, eligendi unde!</p>
                <button id="suscribeButton" type="button">SUSCRIBE</button>
                <button id="loginButton" type="button">SIGN IN</button>
            </div>

        </section>

        <!-- Health tips section -->

        <section id="tips">
            
            

        </section>

        <!-- Testimonies section -->
        
        <section id="testimonies">

            <h1 class="section-title">Ce qu'ils disent à propos de Blood Bank</h1>
            <div id="border"></div>
            
            <div class="testimony" id="testimony1">
                <img src="View/assets/images/pp/EmmaHenderson.jpg" alt="">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis nesciunt sit fugiat excepturi, temporibus dolores earum laborum est non veritatis eius natus iusto doloremque distinctio atque tempora minima dicta ab.</p>
                <h4 class="name">Emma Henderson</h4>
            </div>

            <div class="testimony" id="testimony2">
                <img src="View/assets/images/pp/JimmieButler.jpg" alt="">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque, perferendis sed. Provident iusto iste modi, ipsam optio repellendus vel vitae exercitationem nobis sunt porro, expedita esse quibusdam assumenda beatae. Rerum.</p>
                <h4 class="name">Jimmie Butler</h4>
            </div>

            <div class="testimony" id="testimony3">
                <img src="View/assets/images/pp/ToniBrewer.jpg" alt="">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Assumenda error quas repellendus at quae eius inventore quia, nobis libero repudiandae mollitia, perspiciatis rerum totam veniam! Odit reprehenderit fugiat numquam eius.</p>
                <h4 class="name">Toni Brewer</h4>
            </div>

        </section>

        <!-- Menu -->

        <section id="menu" style="display: none;">
            
            <a href="#"><img class="back-button" src="View/assets/images/back.png" alt="back-button"></a>
            <a href="index.php?p=home"><img class="menu-logo" src="View/assets/images/logo.png" alt="logo"></a>
            
            <div class="menu-items">
                <a href="index.php?p=donation">Donors</a>
                <a href="index.php?p=request">Seekers</a>
                <a href="index.php?p=register">Register</a>
                <a href="index.php?p=about">About</a>
            </div>
            
            <p class="copy">Copyright &copy; 2017 &nbsp;<a href="https://www.nucleus-technologies.com">Nucleus Technologies</a></p>
            
        </section>

        <!-- Footer -->

        <footer>
            <p>Made with &#x2665; & VSCode by &nbsp;<a href="https://www.nucleus-technologies.com">Nucléus Technologies</a></p>
        </footer>
    
    </body>
    
</html>