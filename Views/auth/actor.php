<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="<?php echo IMAGES ?>/favicon.png">

    <link rel="stylesheet" href="<?php echo CSS ?>base.css">
    <link rel="stylesheet" href="<?php echo CSS ?>auth/signup.css">

    <title>Govithena | Sign Up</title>
</head>


<body>
    <div class="[ signup ]">
        <div class="[ banner ]">
            <img src="<?php echo URLROOT ?>/Webroot/images/bg.jpg" alt="banner" />
            <div class="[ banner__content ]">
                <h1>Invest in the agreculture of Sri Lanka.</h1>
            </div>
        </div>
        <div class="[ content ]">
            <div class="[ logo ]">
                <img src="<?php echo IMAGES ?>/logo.svg" alt="logo" />
                <h2>Govithena</h2>
            </div>

            <div class="[ card ]">
                <div class="[ header ]">
                    <h1>Who are you?</h1>
                    <small>Select your user type</small>
                </div>

                <form class="[ actors ]" method="post" action="<?php echo URLROOT; ?>/auth/signup">
                    <input type="radio" onclick="submitActor()" name="actor" id="investor" value="INVESTOR" />
                    <input type="radio" onclick="submitActor()" name="actor" id="farmer" value="FARMER" />
                    <input type="radio" onclick="submitActor()" name="actor" id="agrologist" value="AGROLOGIST" />
                    <input type="radio" onclick="submitActor()" name="actor" id="tech_assistant" value="TECH_ASSISTANT" />

                    <label for="investor" class="[ actor ]">
                        <h4>Investor</h4>
                        <p>Lorem ipsum dolor sit amet amet consectetur adipisicing elit.</p>

                    </label>
                    <label for="farmer" class="[ actor ]">
                        <h4>Farmer</h4>
                        <p>Lorem ipsum dolor sit amet amet consectetur adipisicing elit.</p>
                    </label>
                    <label for="agrologist" class="[ actor ]">
                        <h4>Agrologist</h4>
                        <p>Lorem ipsum dolor sit amet amet consectetur adipisicing elit.</p>
                    </label>
                    <label for="tech_assistant" class="[ actor ]">
                        <h4>Tech Assistant</h4>
                        <p>Lorem ipsum dolor sit amet amet consectetur adipisicing elit.</p>
                    </label>
                </form>

            </div>
            <p>Already Have an Account? <a class="register" href="<?php echo URLROOT ?>/auth/signin">Sign In</a></p>
        </div>
    </div>
    <script>
        function submitActor() {
            document.querySelector('.actors').submit();
        }
    </script>
</body>

</html>