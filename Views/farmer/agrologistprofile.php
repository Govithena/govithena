<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="<?php echo IMAGES ?>/favicon.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo CSS; ?>/base.css">
    <link rel="stylesheet" type="text/css" href="<?php echo CSS; ?>/grid.css">
    <!-- <link rel="stylesheet" type="text/css" href="<?php echo CSS; ?>/table.css"> -->
    <link rel="stylesheet" href="<?php echo CSS ?>/ui.css">
    
    <!-- css file eka -->
    <link rel="stylesheet" href="<?php echo CSS ?>/farmer/investors.css">
    <link rel="stylesheet" href="<?php echo CSS ?>/farmer/farmerrequest.css">
    <link rel="stylesheet" href="<?php echo CSS ?>/farmer/agrologistprofile.css">

    <title>Dashboard | Investor</title>
</head>


<body class="bg-gray h-screen">

    <?php
    $active = "agrologist";
    $title = "Agrologist";
    require_once("navigator.php");
    ?>

    

    <div class="[ container ][ gigs ]" container-type="dashboard-section">
        <!-- <div class="card">
           <img float="left" class="img" src="<?php echo IMAGES ?>/21.jpg" alt="profile" > 
           <h1><p><b>Amal Perera</b></p></h1>
           <p>send you a request to you</p>
           <button type="button" class="btn1">Accept</button>
           <button type="button" class="btn2">Decline</button>
        </div> -->
        <div class="[ requests__cn ]">
           
    
                <div class="[ requests__wrap ]">
                   

                        <div class="[ requestcard bg-light ]">
                           
                           <div class="[ requestimg ]">
                                <img class="img" src="<?php echo IMAGES ?>/agrologist/agrologist8.jpg" alt="profile">
                            </div>

                            <form action="<?php echo URLROOT . '/agrologist/requests' ?>" >
                                <div class="flex flex-row ">
                                    <div class="[ requestcont ]">

                                        
                                            <!-- <a class="[ text-dec-none  text-dark  ]" href="<?php echo URLROOT . "/agrologist/requests/" ?>"> -->
                                                
                                                <h1><p><b>Avishka Prabath</b></p></h1> 
                                            <!-- </a> -->
                                          
                                            
                                        
                                        <p class="flex flex-row">
                                            <span class="fa fa-star"></span>
                                            <span class="fa fa-star"></span>
                                            <span class="fa fa-star"></span>
                                            <span class="fa fa-star"></span>
                                            <span class="fa fa-star"></span>
                                        </p>

                                    </div>
                                    
                                </div>
                            </form>

                            <div class=" flex-c-c">
                            <!-- <form action="/action_page.php"> -->
                               <!-- <label for="type">Type : </label> &ensp;
                                <select name="type" id="type">
                                     <option value="creategig">Create Gig</option>
                                     <option value="updateprogress">Update progress</option>
                                     
                                </select> -->
                                &emsp; &emsp;
                                
                                <!-- <input type="submit" value="Submit"> -->
                                <button type="button"   class="btn_accept1" name="accept">Add</button> 
                            <!-- </form> -->
                                        
                                        
                            </div>
                           
                        </div>
    
                </div>
        </div>

         <div class="cardagro">
         
           <h1><p>Personal Details</p></h1><hr>
           <div class="flex-c-c1 name">

                <p style="color: #666362;">First Name </p>  &emsp;
                <p style="color: #666362;">Last Name </p>
           </div>
            <div class="flex-c-c1 name">
                <p>Avishka </p> 
                &emsp;<p>Prabath </p>
            </div>
            <hr>
            <p style="color: #666362;">Prices</p>
    
 
            <table style="width:77%" class="pricetable">
 
                <tr>
                    <td>Price(per month)</td>
                    <td>$2000.00</td>
                </tr>
            </table>
            <hr>

            <p>Email <br> <u>avishkaprabath@gmail.com</u></p> <br>
            <p>Mobile Number <br> 070 1234567</p> <br> <br>
             <p><h2>Address</h2></p>
             <hr>

             <p>No 34,</p>
             <p>Meldor place,</p>
             <P>Rambewa.</P>
             <div class="space">
             <p>District:   Anuradhapura</p>
             <p>PostalCode:   50000</p>
             </div>
             <hr>

             <div class="lineone">

             <div class="cardgrow">
                <div class="imgout">
                   <img class="imggrow" src="<?php echo IMAGES ?>/growthings/carrot.jpg" alt="profile">
                </div>
                <hr>
                <b><h2>Carrot</h2></b>
                <p class="locationgrow"><i class="fa-solid fa-location-dot"></i>&ensp;Nuwara Eliya</p>
             </div>
             
             <div class="cardgrow">
                <div class="imgout">
                   <img class="imggrow" src="<?php echo IMAGES ?>/growthings/beetroot.jpg" alt="profile">
                </div>
                <hr>
                <b><h2>Beetroot</h2></b>
                <p class="locationgrow"><i class="fa-solid fa-location-dot"></i>&ensp;Nuwara Eliya</p>
             </div>

             <div class="cardgrow">
                <div class="imgout">
                   <img class="imggrow" src="<?php echo IMAGES ?>/growthings/radish.jpg" alt="profile">
                </div>
                <hr>
                <b><h2>Radish</h2></b>
                <p class="locationgrow"><i class="fa-solid fa-location-dot"></i>&ensp;Nuwara Eliya</p>
             </div>
             </div>
        
           
        </div>
    
    </div>
    <?php
    require_once("footer.php");
    ?>
   
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="<?php echo JS ?>/dashboard/chart.js"></script>
    <script src="<?php echo JS ?>/dashboard/dashboard.js"></script>
</body>

</html>