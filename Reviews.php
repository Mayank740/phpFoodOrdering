<?php
session_start();
?>
<!DOCTYPE html>
<html>
     <head>
      <!--css-->
    <link rel="stylesheet" type="text/css" href="review.css">
    
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<!-- Bootstrap Link -->
	<!-- <link rel="stylesheet"  href="bootstrap/css/bootstrap.min.css"> -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

    <!-- css link -->
    <link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="css/index_style.css">

	<!-- google fonts -->
	<link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet"> 

	<!-- font awesome -->
	<link rel="stylesheet" type="text/css" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
      <script>
            $(document).ready(function(){
            var isWebkit = navigator && navigator.userAgent.match(/webkit/i);
            var $root = $(isWebkit ? 'body' : 'html');
            var elements = $('div'), elcount = elements.length;
            var scrolling = false;
            // Replacing the CSS attr(... url)
            elements.css('background-image', function(i){
              return 'url('+$(this).data('img')+')';
            });
            //Add permalinks
            elements.each(function(i){
              var $t = $(this);
              var id = $t.attr('id');
              if(!id) return;
              $('<a>').addClass('permalink')
                      .attr('href', '#'+id)
                      .appendTo($t);
            });
            $root.keydown(function(e){
              if(e.keyCode != 37 && e.keyCode != 39) return;
              var current = scrolling || 0;
              if(scrolling === false)
              {
                var bsT = $root.scrollTop(), t;
                while(current < elcount && (t = elements.eq(current).offset().top) < bsT)
                  current++;
              }
              if(e.keyCode == 37) current--;
              else if(scrolling !== false || t == bsT) current++;
              current = (current + elcount) % elcount;
              $root.stop().animate({scrollTop: elements.eq(current).offset().top}, function(){scrolling = false;});
              scrolling = current;
            });
          });
              </script>
     </head>
 <body>
        <nav>
                <div class="logo">
                    <h4>LOGO</h4>
                </div>
                <ul class="nav-links">
                    <li>
                        <a href="ali.php" class="active" name="nav">Home</a>
                    </li>
                    <li>
                        <a href="#about">About</a>
                    </li>
                    <li>
                        <a href="#about">Contact</a>
                    </li>
                    <li>
                        <a href="Reviews.php" class="">Review</a>
                    </li>
                    <li>
                        <a href="login_registration.php" class="login">Login/Register</a> 
                    </li>
                </ul>
            </nav> 


        <div id="image1" class="img" data-img="5f7.jpg"><span class="multiline"><span class="max">Scroll down to see what our customers are saying</span>Reviews from some of our satisfied customers</span></div>
        <div id="image2" class="img" data-img="bd0.jpg"><span class="multiline"><span class="max">Anurag from Chandigarh says:</span>The donner wraps are just heavenly</span></div>
        <div id="image3" class="img" data-img="ipe3.jpg"><span class="multiline"><span class="max">Mansi from Jalandhar says:</span>The crispiest chicken pakoras I ever had</span></div>
        <div id="image4" class="img" data-img="oto.jpg"><span class="multiline"><span class="max">Raj from Amritsar says:</span>Stopped for some snacks, had the crispy samosas. Never had better samosas in my life</span></div>
        <div id="image5" class="img" data-img="age1.jpg"><span class="multiline"><span class="max">Rohini from Mumbai says:</span>You know the place is good when even the mushroom bhaji is good</span></div>
        <div id="review" class="button1 md-col-8 py-5 img" data-img="abstract1080-01.svg">
        
        <a href="reviews2.php" class="multiline"><button class="btn-warning btn-block col-md-15">READ ALL REVIEWS</button></a>
    </div>

        <footer>
                <div class="container-fluid">
                   <!-- back to top -->
                   <div class="row top text-center">
                     <a href="#nav" style="text-decoration: none; color: white; padding-right: 600px;">
                      <i class="fa fa-chevron-circle-up" aria-hidden="true"> &nbsp;Back to top</i>
                      </a>
                   </div>
                   <!-- Follow us, About and Contact -->
                   <div class="row about">
                      <!-- Follow us -->
                      <div class="col-lg-4">
                         <a name="about"></a>
                         <p class="text-center">Follow Us</p>
                         <p class="text-center" style="font-size: 10px; color: #808080;">Let us be social</p>
                         <div class="icons">
                         <i class="fa fa-facebook" aria-hidden="true" style="color: white; margin-left: 99px;"></i>
                         <i class="fa fa-instagram" aria-hidden="true" style="color: white;"></i>
                         <i class="fa fa-twitter" aria-hidden="true" style="color: white;"></i>
                         <i class="fa fa-linkedin" aria-hidden="true" style="color: white;"></i>
                      </div>
                         <!-- <div class="border"></div> -->
                      </div>
                      <!-- about -->
                      <div class="col-lg-4 about">
                         <p class="text-center" style="margin-top: -8px;">About</p>
                         <!-- <div class="border"></div> -->
                      </div>
                      <!-- contact -->
                      <div class="col-lg-4">
                      <p class="text-center">Quick Contact</p>
                      <i class="fa fa-phone" aria-hidden="true" style="color: white; font-size: 12px; padding: 10px 0px 0px 140px;"> &nbsp; 1800 123 5555</i><br>
                      <i class="fa fa-envelope" aria-hidden="true" style="color: white; font-size: 12px; padding: 15px 0px 0px 140px;"> &nbsp;customercare@travelo.com</i>
                   </div>
                   </div>
                   <!-- footer -->
                   <div class="row foot">
                      <p>All rights reserved &copy 2020</p>
                   </div>
                </div>
             </footer>
    </body>
</html>