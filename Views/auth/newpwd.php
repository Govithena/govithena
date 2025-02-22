<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="<?php echo IMAGES ?>/favicon.png">

    <link rel="stylesheet" href="<?php echo CSS ?>base.css">
    <link rel="stylesheet" href="<?php echo CSS ?>auth/verify.css">

    <title>Govithena | New Password</title>
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
                    <h3>Reset Password</h3>
                    <p>Choose a strong password and don't reuse it for other accounts. <br><a href="<?php echo URLROOT ?>/auth/signup">Find out more</a></p>
                    <p>Changing your password will sign you out on your devices, with some exceptions.</p>
                </div>
                <form class="form" action="<?php echo URLROOT ?>/auth/newpwd" method="post">
                    <label for="newPassword">New Password</label>
                    <input type="password" id="newPassword" name="newPassword" class="" placeholder="New Password" autocomplete="off" required>
                    <label for="confirmPassword">Confirm Password</label>
                    <input type="password" id="confirmPassword" name="confirmPassword" class="" placeholder="Confirm Password" autocomplete="off" required>
                    <button type="submit" name="reset" class="button__primary nextBtn">Reset</button>
                </form>
            </div>
            <p></p>
        </div>
    </div>
</body>












<!-- <body>
    <div class="brand">
        <svg width="140" height="289" viewBox="0 0 1220 289" fill="none" xmlns="http://www.w3.org/2000/svg">
            <g filter="url(#filter0_d_709_3441)">
                <path d="M163.444 40C145.644 77.0748 88.9185 169 163.443 169C237.786 169 181.973 78.0905 163.444 40Z" fill="#1DB352" />
                <path d="M40.3416 142.124C54.0994 180.736 79.3515 285.457 131.78 232.286C184.08 179.245 80.3769 155.526 40.3416 142.124Z" fill="#1DB352" />
                <path d="M281.507 142.124C267.749 180.736 242.497 285.457 190.069 232.286C137.769 179.245 241.472 155.526 281.507 142.124Z" fill="#1DB352" />
                <path d="M453.436 125.383C440.539 117.907 428.296 114.168 416.707 114.168C405.118 114.168 396.333 117.907 390.352 125.383C384.557 132.673 381.66 144.822 381.66 161.832C381.66 183.327 386.707 196.972 396.8 202.766C402.034 205.757 408.109 207.252 415.025 207.252C422.127 207.252 428.856 206.318 435.212 204.449L435.772 192.953L435.212 171.925L461.567 170.243L461.006 188.467L461.567 221.551C444.744 227.159 429.23 229.963 415.025 229.963C394.09 229.963 378.296 224.262 367.642 212.86C357.174 201.271 351.941 184.262 351.941 161.832C351.941 139.402 358.015 122.019 370.165 109.682C382.501 97.1589 399.885 90.8972 422.314 90.8972C437.081 91.0841 450.352 93.8878 462.128 99.3084L456.24 124.822L453.436 125.383ZM523.873 128.467C538.827 128.467 550.041 132.673 557.518 141.084C564.995 149.495 568.733 161.925 568.733 178.374C568.733 194.822 564.621 207.626 556.397 216.785C548.359 225.757 536.957 230.243 522.191 230.243C507.612 230.243 496.49 226.037 488.827 217.626C481.35 209.028 477.612 196.505 477.612 180.056C477.612 163.607 481.63 150.897 489.668 141.925C497.705 132.953 509.107 128.467 523.873 128.467ZM523.032 147.252C516.303 147.252 511.443 149.589 508.453 154.262C505.462 158.748 503.967 166.692 503.967 178.093C503.967 189.495 505.462 197.907 508.453 203.327C511.443 208.561 516.397 211.178 523.313 211.178C530.228 211.178 535.182 209.028 538.172 204.729C541.163 200.43 542.658 192.579 542.658 181.178C542.658 169.776 541.07 161.271 537.892 155.664C534.714 150.056 529.761 147.252 523.032 147.252ZM620.843 201.645H622.525L640.188 147.252L643.833 130.15H667.945L635.422 228H605.142L577.665 130.991L603.74 129.589L606.263 145.85L620.843 201.645ZM695.502 82.486C699.988 82.486 703.446 83.7944 705.876 86.4112C708.306 88.8411 709.521 92.3925 709.521 97.0654C709.521 101.551 708.212 105.196 705.595 108C702.979 110.804 699.334 112.206 694.661 112.206C690.175 112.206 686.624 110.991 684.007 108.561C681.577 105.944 680.362 102.393 680.362 97.9065C680.362 93.4206 681.764 89.7757 684.567 86.972C687.371 83.9813 691.016 82.486 695.502 82.486ZM708.68 228H680.642L682.044 187.626L680.923 132.112L708.96 129.869L706.997 185.103L708.68 228ZM773.763 207.252C778.062 207.252 782.642 206.131 787.501 203.888L789.744 206.131L786.941 222.393C780.025 226.131 772.828 228.374 765.352 229.121C746.473 227.252 736.941 218.093 736.754 201.645L737.875 183.981V147.813H724.698L723.576 146.692L724.978 131.271H737.314V115.009L762.828 106.879L764.791 108.561L763.95 131.271H789.184L790.025 132.673L788.903 147.813H763.67L762.548 194.916C762.548 199.402 763.296 202.579 764.791 204.449C766.473 206.318 769.464 207.252 773.763 207.252ZM850.537 151.738C845.303 151.738 839.228 154.542 832.312 160.15L831.752 185.103L833.154 228H805.397L806.798 187.346L805.677 82.7663L833.434 80.5234L832.593 144.168H833.714C841.378 137.065 849.696 132.019 858.668 129.028C869.322 129.028 877.453 131.458 883.06 136.318C888.668 141.178 891.378 148.093 891.191 157.065L890.63 185.103L891.752 228H863.714L865.397 167.159C865.77 156.879 860.817 151.738 850.537 151.738ZM934.949 182.86C936.07 200.617 944.669 209.495 960.743 209.495C969.902 209.495 979.341 206.879 989.061 201.645L991.304 203.327L987.659 223.794C977.94 227.907 968.127 230.056 958.22 230.243C942.706 230.243 930.65 225.757 922.052 216.785C913.454 207.813 909.155 195.477 909.155 179.776C909.155 163.888 913.454 151.458 922.052 142.486C930.837 133.327 941.958 128.748 955.416 128.748C968.874 128.748 978.874 132.206 985.416 139.121C992.145 145.85 995.51 155.196 995.51 167.159C995.51 170.897 995.229 174.729 994.669 178.654L990.463 182.579L934.949 182.86ZM956.257 146.972C950.837 146.972 946.257 148.748 942.519 152.299C938.968 155.85 936.631 160.897 935.51 167.439L970.837 166.318L971.398 164.075C971.211 152.673 966.164 146.972 956.257 146.972ZM1074.33 167.159C1074.33 156.879 1069.94 151.738 1061.16 151.738C1054.8 151.738 1048.07 154.729 1040.97 160.71V185.103L1042.37 228H1014.33L1015.74 187.626L1014.61 132.112L1041.25 129.869V144.168H1042.65C1050.69 137.065 1059.1 132.019 1067.89 129.028C1078.54 129.028 1086.58 131.458 1092 136.318C1097.6 141.178 1100.31 148.093 1100.13 157.065L1099.57 185.103L1100.69 228H1072.65L1074.33 167.159ZM1160.67 128.467C1173.19 128.467 1182.54 130.897 1188.71 135.757C1194.88 140.617 1197.96 147.346 1197.96 155.944C1197.96 158.374 1197.49 166.318 1196.56 179.776C1196.56 179.776 1196.28 187.439 1195.72 202.766C1195.72 205.196 1196 206.879 1196.56 207.813C1197.12 208.561 1198.24 208.935 1199.92 208.935C1201.61 208.935 1203.57 208.654 1205.81 208.093L1208.05 209.776L1205.25 224.355C1200.76 227.159 1195.72 228.935 1190.11 229.682C1181.14 228.935 1175.72 223.794 1173.85 214.262H1172.45C1165.34 221.738 1158.15 226.972 1150.86 229.963C1140.76 229.776 1132.82 227.065 1127.03 221.832C1121.23 216.598 1118.33 209.589 1118.33 200.804C1118.33 187.159 1125.53 178.935 1139.92 176.131L1172.17 170.243V161.551C1172.17 152.393 1167.87 147.813 1159.27 147.813C1150.67 147.813 1140.58 151.832 1128.99 159.869L1126.75 158.748L1123.66 140.243C1136 132.393 1148.33 128.467 1160.67 128.467ZM1149.74 189.028C1145.44 189.963 1143.29 192.579 1143.29 196.879C1143.29 205.29 1146.93 209.495 1154.22 209.495C1159.64 209.495 1165.44 206.224 1171.61 199.682L1172.17 183.981L1149.74 189.028Z" fill="#1DB352" />
            </g>
            <defs>
                <filter id="filter0_d_709_3441" x="-4" y="0" width="1228" height="297" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                    <feFlood flood-opacity="0" result="BackgroundImageFix" />
                    <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha" />
                    <feOffset dy="4" />
                    <feGaussianBlur stdDeviation="2" />
                    <feComposite in2="hardAlpha" operator="out" />
                    <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.25 0" />
                    <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_709_3441" />
                    <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_709_3441" result="shape" />
                </filter>
            </defs>
        </svg>

    </div>
    <div class="container grid gird-center">
        <h1>222 Sign up and start investing today.</h1>
        <form class="form" action="" method="post">
            <?php
            if (isset($msg)) { ?>
                <div class="alert">
                    <p><?php echo $msg ?></p>
                </div>
            <?php
            }
            ?>
            <input type="text" name="firstName" class="" placeholder="First Name" autocomplete="off">
            <input type="text" name="lastName" class="" placeholder="Last Name" autocomplete="off">
            <input type="email" name="email" class="" placeholder="Email Address" autocomplete="off">
            <input type="password" name="password" class="" placeholder="Password">
            <input type="password" name="confirmPassword" class="" placeholder="Confirm Password">
            <div class="terms_and_conditions">
                <input type="checkbox" id="terms_condtions" name="terms_condtions" value="accepted">
                <label for="terms_condtions">
                    Yes, I understand and agree to the Govithena
                    <a href="">Terms of Service</a>, including the <a href="">User Agreement and Privacy Policy</a>.
                </label>
            </div>
            <button type="submit" name="register_btn" class="btn uppercase">Sign up</button>
        </form>
        <h5>Already Have an Account? <a class="register" href="<?php echo URLROOT ?>/auth/signin">Login</a></h5>
    </div>
</body> -->

</html>