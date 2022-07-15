<?php 
  include "inc/header.php";
  include "inc/navbar.php";
  include "controller/bookLib.php";


  // initialise the bookLibrary class
  $bookLib = new BookLib();
  

  
?>
   
    <div class="landing d-flex justify-content-center align-items-center ">
        <div class="text-center text-light">
            <h1>"A Reader Lives a Thousand Lives Before He Dies"</h1>
            <p class="fs-6 text-white-50">Get Your Favorite Book</p>
            <a class="btn  rounded-pill main-btn" href="#">Do It Now</a>
        </div>
    </div>
    <!--========================End landing =========================-->
    <!--=====================Start Features =========================-->
    <div class="features text-center pt-5 pb-5" id="services">
        <div class="container">
          <div class="main-title mt-5 mb-5 position-relative">
            <img class="mb-4" src="img/team(1).png" style="width: 80px;" alt="" />
            <h2>What we Provide</h2>
            <p class="text-black-50 text-uppercase">Some Of Our Services</p>
          </div>
            <div class="row">
                <div class="col-md-6 col-lg-4">
                    <div class="feat">
                        <div class="icon-holder position-relative">
                            <i class="fa-solid fa-1 position-absolute bottom-0 number"></i>
                            <i class="fa-brands fa-solid fa-4x fa-money-check position-absolute bottom-0 icon"></i>
                        </div>
                        <h4 class="mb-4 mt-3 text-uppercase">Online Payment</h4>
                        <p class="text-black-50 lh-lg">Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus ipsa sequi ex modi provident mollitia excepturi accusamus nisi, voluptates odit.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="feat">
                        <div class="icon-holder position-relative">
                            <i class="fa-solid fa-2 position-absolute bottom-0 number"></i>
                            <i class="fa-solid fa-4x fa-truck position-absolute bottom-0 icon"></i>
                        </div>
                        <h4 class="mb-4 mt-3 text-uppercase">Fast & In Time Delivery</h4>
                        <p class="text-black-50 lh-lg">Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus ipsa sequi ex modi provident mollitia excepturi accusamus nisi, voluptates odit.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="feat">
                        <div class="icon-holder position-relative">
                            <i class="fa-solid fa-3 position-absolute bottom-0 number"></i>
                            <i class="fa-solid fa-money-bill-transfer fa-4x position-absolute bottom-0 icon"></i>
                        </div>
                        <h4 class="mb-4 mt-3 text-uppercase">Money Back Guarantee</h4>
                        <p class="text-black-50 lh-lg">Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus ipsa sequi ex modi provident mollitia excepturi accusamus nisi, voluptates odit.</p>
                    </div>
                </div>
            </div>
    </div>
    </div>
    <!--======================End Features ==========================-->
    <!--=====================Books gallery ===========================-->
    <div class="portfolio text-center pt-5" id="books">
        <div class="container">
          <div class="main-title mt-5 mb-5 position-relative">
            <img class="mb-4" src="img/notebook.png" style="width: 80px;" alt="" />
            <h2>Books</h2>
            <p class="text-black-50 text-uppercase">Some of the books in our website</p>
          </div>
              <!--card container -->

             

          <div class="row" id="books-container">
          <?php 
          
             $singlebook = $bookLib->get_Book_By_Count(8);
             
              foreach($singlebook as $item){ 
                
                ?>
                    <div class="col-sm-3">
                      <div class="card" style="margin-bottom:30px">
                        <img class="card-img-top" src="<?php echo $item['book_img']; ?>" style="height:400px;width:90%" alt="Card image cap">
                          <div class="card-body">
                              <h5 class="card-title"><?php echo $item['book_title']; ?></h5>
                              <p class="card-text"><?php echo $item['book_desc']; ?></p>
                              <a href="<?php echo 'BookView.php?view=single&bookid='.$item['id'].'';?>" class="btn rounded-pill main-btn">Voire</a>
                              <a href="<?php echo 'BookView.php?view=reserver&bookid='.$item['id'].''; ?>" class="btn btn-warning rounded-pill">Demander</a>
                          </div>
                      </div>
                    </div>
                <?php }?>
          </div>
        </div>
    </div>
<!--end gallery start About us section-->
    <div class="About-us text-center pt-5" id="about">
      <div class="container">
        <div class="main-title mt-5 mb-5 position-relative">
          <img class="mb-4" src="img/information.png" style="width: 80px;" alt="" />
          <h2>About us</h2>
          <p class="text-black-50 text-uppercase">Who are we and what we do</p>
        </div>

        <div class="row">
          <div class="col-md-6" style="text-align:left" >
            <h2>About us</h2>

            <p style="line-height:2em;">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Aliquam nobis molestias dolorem, eum doloribus recusandae tenetur, repellendus beatae amet ducimus repellat id optio illo? Veritatis alias consequatur fugit error et recusandae ea iure voluptatibus, repellendus ex! Ad, atque animi? Dolorum vitae voluptas eligendi assumenda repellat obcaecati optio. Rerum eius amet dolorem fuga necessitatibus nam ducimus provident libero esse quisquam dolores, molestias ea, sapiente atque veritatis nisi? Animi impedit quia, quae eum iste reiciendis deleniti vel cum officiis nulla fugiat tempora!</p>
          </div>
          <div class="col-md-6">
            <img src="./resources/img/about-us.jpg" style="height:300px;width:100%;" />
          </div>
        </div>

      </div>
    </div>
  <!--============================== Contact form  ==============================-->
  <div class="contact text-center pt-5" id="contact">
    <div class="main-title mt-5 mb-5 position-relative">
      <img class="mb-4" src="img/megaphone.png" style="width: 80px;" alt="" />
      <h2>Contact Us</h2>
      <p class="text-black-50 text-uppercase">Get in touch with us</p>
    </div>
    <div class="container contact-form">
      <div class="contact-image">
          <img src="./resources/img/contactus.png" alt="rocket_contact"/>
      </div>
      <form method="post">
          <h3>Let us a message :)</h3>
         <div class="row">
              <div class="col-md-6">
                  <div class="form-group">
                      <input type="text" name="txtName" class="form-control" placeholder="Your Name *" value="" />
                  </div>
                  <div class="form-group">
                      <input type="text" name="txtEmail" class="form-control" placeholder="Your Email *" value="" />
                  </div>
                  <div class="form-group">
                      <input type="text" name="txtPhone" class="form-control" placeholder="Your Phone Number *" value="" />
                  </div>
                  <div class="form-group">
                      <input type="submit" name="btnSubmit" class="btn rounded-pill main-btn" value="Send Message" />
                  </div>
              </div>
              <div class="col-md-6">
                  <div class="form-group">
                      <textarea name="txtMsg" class="form-control" placeholder="Your Message *" style="width: 100%; height: 150px;"></textarea>
                  </div>
              </div>
          </div>
      </form>
   </div>
</div>
 <?php include "inc/footer.php";