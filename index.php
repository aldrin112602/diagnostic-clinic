<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link
       rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
       <title>DIAGNOSTIC CLINIC</title>   
      <link rel="stylesheet" href="style.css" />
      <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" /> -->

      <!-- Poppins font -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet" />

      <style>
    * {
        font-family: "Poppins", sans-serif;
        padding: 0;
        margin: 0;
        box-sizing: border-box;
        transition: all 0.5s;
    }

    </style>

</head>
<body>
    
 <nav class="nav_con">
       <div class="navbox">
        <img src="images/logo.png">
        <a href="#home" id="logo">DIAGNOSTIC CLINIC</a>
       <div class="menu"  id="drop-menu">
         <span class="bar"></span>
         <span class="bar"></span>
         <span class="bar"></span>
       </div>
       <nav class="items">
            <a href="#home"     id="home-page">Home</a>
            <a href="#about"    id="about-page">About</a>
            <a href="#services" id="services-page">Services</a>
            <a href="#contact"  id="contact-page">Contact</a>
            <a href="login.php">Login</a>
            <a href="register.php">Register</a>
       </nav>
     </div>
 </nav>

 <section class="main"  id="home">
      <div class="main_home">
            <h1>Bagong Silang <br> Group of Doctors</h1>
            <h2>DIAGNOSTIC CLINIC</h2>
            <p>Monday - Sunday:</p>
            <p>7:00am - 6:30pm</p>
            <p>LABORATORY</p>
            <p>8:00am - 4:30pm</p>
      </div>
      
      <button type="button" onclick="location.href='login.php'" style="background: #222; color: white; border: 0; margin-left: 9rem; margin-top: 5rem; height: 50px; font-size: 1.2rem; width: 200px; cursor: pointer; border-radius: 25px;">BOOK NOW</button>
      
 </section>
  
 <section class="about"  id="about">
      <div class="about_con">

            <h1>MISSION</h1>
            <p>To provide the best medical care and advanced diagnostic services for patients of North Caloocan that is generally cost-effective and affordable. Equipped with highly motivated, professional, and competent personnel, committed to uphold human dignity, respect for life and right to health.</p>
           
            <h2>VISSION</h2>
        
          <p>BSGD is the leading and trusted multi-specialty clinic and diagnostic center in North Caloocan.</p>    

      </div>
</section>

 <section class="services" id="services">
            <h1>SERVICES</h1>
      <div class="service_con">
       <div class="service_box">
            <a class="x-ray" href="images/xray.jpg">
                  <img src="images/xray.jpg">
                
            </a>
            <div class="details">Laboratory x-ray</div>
       </div>
      </div>
        
        <div class="service_con">
        <div class="service_box">
            <a class="oby" href="images/obgyn.webp">
             <img src="images/obgyn.webp">
            </a>
            <div class="details">OBY</div>
       </div>
      </div>
      

     <div class="service_con">
      <div class="service_box">
          <a class="Pedia" href="images/pedia.jpg">
           <img src="images/pedia.jpg">
          </a>
          <div class="details">PEDIA</div>
     </div>
    </div>

    <div class="service_con">
      <div class="service_box">
          <a class="Swab" href="images/swab.jpg">
           <img src="images/swab.jpg">
          </a>
          <div class="details">SWAB</div>
     </div>
    </div>

    <div class="service_con">
      <div class="service_box">
          <a class="ultra" href="images/ultra sound.webp">
           <img src="images/ultra sound.webp">
          </a>
          <div class="details">ULTRASOUND</div>
     </div>
    </div>
   
    <div class="service_con">
      <div class="service_box">
          <a class="vaccine" href="images/vaccine.webp">
           <img src="images/vaccine.webp">
          </a>
          <div class="details">VACCINE</div>
          
     </div>
    </div>

    <div class="service_con">
        <div class="service_box">
            <a class="check" href="images/check up.jpg">
             <img src="images/check up.jpg">
            </a>
            <div class="details">CHECK</div>
       </div>
      </div>
  </section>

  <section class="contact"  id="contact">
      <div class="contact_con">

       <div class="address">ADDRESS
          <p>PHASE 2, PACKAGE 1, BAGONG SILANG, NORTH CALOOCAN</p>
          <p>CONTACT NUMBER(0943) 1337255</p>
      </div>
            

    <div class="opening">OPENING
     <p class="p1">Monday - Sunday:</p> 
     <p class="p2">7:00am - 6:30pm</p>   
    </div>
                   
      <div class="socialmedia">SOCIAL MEDIA</div>
        
</section>
 

<div class="parent">
     <div class="desc">
     
         <button id="chatbot-toggler" style="color: white;">
            <i class="fa-regular fa-message" style="font-size: 1.2rem;"></i>
         </button>
        
         
     </div>
     <div>
   
     </div>
 </div>
 <div id="test" style="position: fixed;top: 4rem;right: 8rem;display: none;">
     <div class="child" id="chatbot">
         <div class="header">
             <div class="h-child">
                 <img src="images/logo.png" alt="avatar" id="avatar">
                 <div>
                     <span class="name">BSGD</span>
                     <br>
                     <span style="color:lawngreen">online</span>
                 </div>
             </div>
             <div>
                 <button class="refBtn"><i class="fa fa-refresh" onclick="initChat()"></i></button>
             </div>
         </div>
         
         <div id="chat-box">

         </div>
         <div class="chat-input">
          <textarea placeholder="Enter a message..." spellcheck="false" required></textarea>

         </div>
                
     </div>
 </div>



<script src="./src/script.js"></script>
<script src=https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js></script>
</body>
</html> 








