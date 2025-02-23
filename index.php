<?php
   
    @include "payment-config.php";
    
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EB Pearl Project</title>

    <link rel="stylesheet" href="index.css">
</head>
<body>
    <div id="container">
        <nav id="navbar">
                 <img class="logo" src="/images/logo.png" alt="Logo">
                 <ul class="nav-links">
                    <li><a href="#">Products</a></li>
                    <li><a href="#">Services</a></li>
                    <li><a href="#">Help center</a></li>
                    <li><a href="#">Get started</a></li>
                 </ul>
                 <div class="btns">
                 

                      <a  href="#">Login</a>
                  
                  

                      <button ><a href="#">Request a demo</a></button>
                  
                    </div>
        </nav>
        <!-- //// -->
        <div id="hamburger-nav">
          <img class="logo" src="/images/logo.png" alt="Logo">
         
          
          <div class="hamburger-menu">
            <div class="hamburger-icon" onClick=toggleMenu() >
              <span></span>
              <span></span>
              <span></span>
            </div>
            <div class="menu-links">
              <li><a href="#">Products</a></li>
                    <li><a href="#">Services</a></li>
                    <li><a href="#">Help center</a></li>
                    <li><a href="#">Get started</a></li>
            </div>
            <div class="btns">
                 

              <a  href="#">Login</a>
          
          

              <button ><a href="#">Request a demo</a></button>
          
            </div>
          </div>
        </div>
        <!-- ///// -->
        <section id="layout-first">
            <div class="box1">
                  <h1>Get instant cash flow with invoice factoring</h1>
                  <p>Why wait? Get same day funding and a faster way to access cash flow.</p>
                  <button><a href="#">Get started</a></button>
            </div>
            <div class="box2">
                    <img src="/images/image1.png" alt="Design image" class="design">
            </div>

        </section>
        <main id="layout-second">
            <h1>Outsource payment collection </h1>
            <p>Faster and flexible access to cash flow from one or all your invoices</p>
        <div class="content-box">
        <?php
            $select = " SELECT * FROM payment_table";

            $result = mysqli_query($conn, $select);
            
            if(mysqli_num_rows($result) > 0){
            ?>
            <?php while( $row = mysqli_fetch_assoc($result)){
              
              ?>
            <div class="box">
                  <img src="<?php echo ($row['icon']);?>" alt="icon">
                  <h3><?php echo ($row['title']);?></h3>
                  <p><?php echo ($row['descrip']);?>
                </p>
            </div>
            <?php }?>
        <?php }?>
            
        </div>
        </main>
        <section id="layout-third">
          <div class="task-manager">
            <h1>Task Manager</h1>
            <p>Your daily to do list</p>
            <div class="task-container">
              <ul id="taskList">
                    
                     </ul>
                  <form id="taskForm">
                      <input type="text" id="taskInput" placeholder="Add new task" required>
                      <button type="submit">Add Task</button>
                  </form>
          
                  
              </div>
          </div>
        </section>
        <address id="layout-fourth">
             <div class="contact-section">
              <h1>Contact us</h1>
              <p>Speak with our team to see how we can help your business.</p>
              <form id="contactForm" action="send.php" method="POST">
                <div class="input">
                    
                    <input type="text" id="name" name="name" placeholder="Your name" required>
                </div>
                <div class="input">
                    
                    <input type="email" id="email" name="email" placeholder="Email" required>
                </div>
                <div class="input">
                    
                    <input type="tel" id="number" name="number" placeholder="Your best contact number" pattern="[0-9]{3}-[0-9]{7}" required>
                </div>
                <div class="input">
                    
                    <textarea id="message" name="message" placeholder="Business or company name" required></textarea>
                </div>
                <!-- Honeypot field (anti-spam) -->
                <div style="display:none;" class="input">
                    <label for="honeypot">Leave this field blank:</label>
                    <input type="text" id="honeypot" name="honeypot">
                </div>
                <div class="input">
                    <button type="submit" name="send">Submit</button>
                </div>
            </form> 
            </div>
        </address>
       <footer id="layout-fifth">
        <div class="footer-details">
          <div class="details-media">
               <p>Curabitur consequat, purus a scelerisque sagittis, nulla metus tincidunt elit, vel venenatis nulla libero nec nulla. Suspendisse potenti. Aenean a justo vel sapien pellentesque tincidunt. Sed luctus, elit ac interdum convallis, ligula libero egestas orci, at auctor felis ligula nec odio.</p>
            <div class="media">
             <img src="/images/linkedin.png" alt="linkedin">
              <img src="/images/email.png" alt="email">
            </div>
          </div>
        
             <div class="col">
              <h4>Products</h4>
              <p>Payments</p>
              <p>Invoice Factoring</p>
              <p>Invoice Factoring</p>
              <p>Supplier finance</p>
              <p>Customer finance </p>
             </div>
             <div class="col">
              <h4>Company</h4>
              <p>About us</p>
              <p>Contact us</p>
             </div>
             <div class="col">
              <h4>Resources</h4>
              <p>Frequently asked questions</p>
              <p>Knowledge base</p>
              <p>API documentation</p>
             </div>
          
        </div>
        
       </footer>
      </div>
     
      <script src="script.js"></script>
</body>
</html>
