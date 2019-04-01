
<section class="slider_area">
  <div class="container">
    <div class="row">
      <div class="col-md-8">
        <div class="owl-carousel" id="slider_area">
        <?php  foreach($sliders as $obj){ ?>
        <div class="item">
          <img src="assets/uploads/slider/<?php echo $obj->image;?>" class="img-responsive" alt="slider">
          <div class="overlay"></div>
          
           
         
       
        </div>
        <?php } ?>
          
        </div>
      </div>
     <div class="col-lg-4 col-md-4">
        <div class="notice_board">
              <div class="notice-board">
                <?php if(isset($notices) && !empty($notices)){ ?>
                  
                    <div class="go-heading go-lined">
                        <h3 class="title-section1"><?php echo $this->lang->line('notice'); ?></h3>
                    </div>
                     

                      <!-- <div class="row"> -->
                        <div class="notice-single">
                         <div class="notice-marquee">
                            <marquee onmouseover="stop();" onmouseout="start();" scrollamount="1" scrolldelay="1" direction="up" style="width: 100%; margin: 0px 0px 10px 0px; padding: 0px 0px; float: right; height: 270px;text-align:center">
                              <?php foreach($notices as $obj){ ?>  
                                 <div class="item">             
                                  <div class="notice-title">
                                      <h2><?php echo $obj->title; ?></h2>
                                      <h3><i class="fa fa-calendar"></i>  <?php echo date('M j, Y', strtotime($obj->date)); ?> </h3>
                                  </div>
                                  <div>
                                      <p><?php echo substr($obj->notice, 0,120); ?>...</p>
                                  </div>
                                  <div class="more-link"><a href="<?php echo site_url('notice-detail/').$obj->id; ?>" class="btn-link"><?php echo $this->lang->line('read_more'); ?> <i class="fa fa-long-arrow-right"></i></a></div>
                                  </div>
                              <?php } ?>
                            </marquee>  
                        </div>   
                      </div>
                   
                    <!-- </div>           -->
                  </div>
              <?php } ?>
              </div>
            </div>
          
      </div>
    </div>
  </div>
</section>
<section class="messageContainer padding-btm" id="message-section">
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-8">
        <div class="go-heading go-lined">
          <h3 class="title-section1"><span style="color:#00264b;">About</span> Rockford International School</h3>
        </div>
          <div class="directorWrapper">
           <div class="row go-directors">
            <div class="col-md-6 col-sm-6">
              <div class="go-box-wrap our-direct bg-light">
                <div class="block-title">
                    <h2>
                        <span>MD's Message</span>
                    </h2>
                </div> 
                <img src="assets/uploads/page/<?php echo $mdmessage->page_image;?>" width="200px" height="210px" alt="director">
                <h4><?php echo $mdmessage->page_title; ?></h4>
              </div>
              <div class="message-content">
                <p>
                <?php $this->load->helper('text');
                $desc= strip_tags($mdmessage->page_description);
                echo word_limiter($desc,15); ?>
                </p>
              </div>
              <div class="text-center btn_view pb-4">
                <a href="<?php echo site_url('about/md-message'); ?>" class="btn btn-sm btn-lng btn-outline-dark">View More</a>
              </div>
            </div>
<!--             <div class="col-md-4">
              <div class="owl-carousel" id="founder-msg">
                <div class="item">
                  <div class="go-box-wrap go-padding our-direct bg-light">
                    <div class="block-title">
                      <h2>
                          <span>Principal's message</span>
                      </h2>
                    </div> 
                   <img src="assets/images/team3.jpg" width="200px" height="210px" alt="director">
                    <h4><?php echo $mdmessage->page_title; ?></h4>
                  </div>
                  <div class="message-content"> 
                    <p>
                    <?php echo htmlspecialchars_decode(stripslashes($mdmessage->page_description)); ?>
                    </p>
                  </div>
                  <div class="text-center btn_view pb-4">
                    <a href="<?php echo site_url('about'); ?>" class="btn btn-sm btn-lng btn-outline-dark">View More</a>
                  </div>
                </div>
              </div>
            </div> -->
            <div class="col-md-6 col-sm-6">
              <div class="go-box-wrap our-direct bg-light">
                <div class="block-title">
                  <h2>
                      <span>Principal's Message</span>
                  </h2>
                </div> 
               <img src="assets/uploads/page/<?php echo $principal_message->page_image;?>" width="200px" height="210px" alt="director">
                <h4><?php echo $principal_message->page_title; ?></h4>
              </div>
              <div class="message-content">
                <p>
                <?php 
                $this->load->helper('text');
                $desc= strip_tags($principal_message->page_description);
                echo word_limiter($desc,15);

                ?>
                </p>
              </div>
              <div class="text-center btn_view pb-4">
                <a href="<?php echo site_url('about/principal-message'); ?>" class="btn btn-sm btn-lng btn-outline-dark">View More</a>
              </div>
            </div>
          </div>
      </div>
      </div>
      <div class="col-lg-4 col-md-4">
        <div class="notice_board">
              <div class="notice-board">
                <!-- <?php if(isset($notices) && !empty($notices)){ ?> -->
                  
                    <div class="row">
                      <div class="col-lg-12">
                        <div class="facility-school">
                          <div class="go-heading go-lined">
                            <h3 class="title-section1">Facilities</h3>
                          </div>
                          <div class="facilityProvide">
                            <ul>
                              <?php if(!empty($facilities)) { ?>
                                <?php foreach($facilities as $facility) { ?>
                                  <li><i class="fa fa-check-square-o" aria-hidden="true"></i><?php echo !empty($facility->name)?$facility->name:''; ?></li>
                                <?php } ?>
                              <?php } ?>
                             <!--  <li><i class="fa fa-check-square-o" aria-hidden="true"></i>Smart Classes</li>
                              <li><i class="fa fa-check-square-o" aria-hidden="true"></i>Yoga facility</li>
                              <li><i class="fa fa-check-square-o" aria-hidden="true"></i>Canteen facility</li>
                              <li><i class="fa fa-check-square-o" aria-hidden="true"></i>Bus facility</li>
                              <li><i class="fa fa-check-square-o" aria-hidden="true"></i>Smart Classes</li>
                              <li><i class="fa fa-check-square-o" aria-hidden="true"></i>Yoga facility</li>
                              <li><i class="fa fa-check-square-o" aria-hidden="true"></i>Canteen facility</li> -->
                            </ul>
                             <div class="text-center btn_view pb-4">
                              <a href="<?php echo site_url('facilities'); ?>" class="btn btn-sm btn-lng btn-outline-dark">View More</a>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="video-single col-lg-12">
                        <div class="about-school">
                          <div class="addmission-board">
                            <span>A</span>dmission <span>o</span>pen
                          </div>
                          <div class="owl-carousel" id="addmission-board">
                            <div class="item">
                              <div class="addmissionImage">
                                <img src="assets/images/addmission-2.jpg" alt="addmission">
                              </div>
                            </div>
                            <div class="item">
                              <div class="addmissionImage">
                                <img src="assets/images/addmission-1.jpg" alt="addmission">
                              </div>
                            </div>
                          </div>
                        </div>  
                      </div>
                      
                    </div>          
                  </div>
              <!-- <?php } ?> -->
              </div>
            </div>
          
      </div>

    </div>

  
</section>
<!-- Gallery section -->
  <div class="gallery-section">
      <div class="container">
      <div class="site-title">
        <h3 class="title-section1">Gallery</h3>
      </div>
      <div class="galleryDiv">
        <!-- <div class="grid-sizer"></div> -->
        <div class="owl-carousel" id="owl-gallery">
        <?php if (isset($galleries) && !empty($galleries)) { ?>
          <?php foreach($galleries as $obj){?>

            <div class="gallery-Item">
              <a class="img-popup" href="<?php echo site_url('gallery-image/'.$obj->id); ?>"><img src="<?php echo UPLOAD_PATH; ?>/gallery/<?php echo $obj->image; ?>"></a>
            </div>
          <?php }?>
        <?php }?>
        </div>
       <!--  <div class="gallery-item set-bg" data-setbg="assets/images/gallery1.jpg">
          <a class="img-popup" href="assets/images/gallery1.jpg"><i class="ti-plus"></i></a>
        </div>
        <div class="gallery-item set-bg" data-setbg="assets/images/gallery2.jpg">
          <a class="img-popup" href="assets/images/gallery2.jpg"><i class="ti-plus"></i></a>
        </div>
        <div class="gallery-item gi-long set-bg" data-setbg="assets/images/gallery3.jpg">
          <a class="img-popup" href="assets/images/gallery3.jpg"><i class="ti-plus"></i></a>
        </div>
        <div class="gallery-item gi-big set-bg" data-setbg="assets/images/gallery4.jpg">
          <a class="img-popup" href="assets/images/gallery4.jpg"><i class="ti-plus"></i></a>
        </div>
        <div class="gallery-item gi-long set-bg" data-setbg="assets/images/gallery5.jpg">
          <a class="img-popup" href="assets/images/gallery5.jpg"><i class="ti-plus"></i></a>
        </div>
        <div class="gallery-item set-bg" data-setbg="assets/images/gallery6.jpg">
          <a class="img-popup" href="assets/images/gallery6.jpg"><i class="ti-plus"></i></a>
        </div>
        <div class="gallery-item set-bg" data-setbg="assets/images/gallery7.jpg">
          <a class="img-popup" href="assets/images/gallery7.jpg"><i class="ti-plus"></i></a>
        </div> -->
        </div>
      </div>
    </div>
  <!-- Gallery section -->

 <?php if(isset($events) && !empty($events)){ ?>
<section id="events" class="event-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="site-title">
                    <h3 class="title-section1"><?php echo 'Our Events' ?></h3>
                </div>
            </div>
        </div>
        <div class="service_container">
           
              <div class="row text-center justify-content-center">
                 <div class="col-md-12 col-sm-12">
                   <div class="owl-carousel" id="event-held">
                  <?php foreach($events as $obj){ ?> 
                    <div class="item">
               
                    <div class="single-event-list">
                        <div class="event-img">
                            <a href="<?php echo site_url('event-detail/'.$obj->id); ?>"><img src="<?php echo UPLOAD_PATH; ?>/event/<?php echo $obj->image; ?>" alt=""></a>
                        </div>
                        <div class="event-content text-center">
                            <div class="event-meta">
                                <div class="event-title"><?php echo $obj->title; ?></div>
                                <div class="event-for"><span><?php echo $this->lang->line('event_for'); ?></span>: <?php echo $obj->name ? $obj->name : $this->lang->line('all'); ?></div>
                                <div class="event-place"> 
                                  <i class="fa fa-map-marker"></i>
                                  <?php echo $obj->event_place; ?>
                                </div>
                                <div class="event-date">
                                  <i class="fa fa-calendar-o"></i>
                                  <!-- <span><?php echo $this->lang->line('start_date'); ?></span>:  -->
                                   <?php echo date('M j, Y', strtotime($obj->event_from)); ?> -
                                  
                                   <!-- <span><?php echo $this->lang->line('end_date'); ?></span> -->
                                   <?php echo date('M j, Y', strtotime($obj->event_to)); ?></div>
                                </div>
                               <!--  <div class="event-date"><span><?php echo $this->lang->line('end_date'); ?></span>: <i class="far fa-clock"></i> <?php echo date('M j, Y', strtotime($obj->event_to)); ?></div> -->
                            </div>
                            <div class="more-link"><a href="<?php echo site_url('event-detail/'.$obj->id); ?>" class="btn-link"><?php echo $this->lang->line('read_more'); ?> <i class="fa fa-long-arrow-right"></i></a></div>
                        </div>
                    </div>
                   
                    <?php } ?>
                </div>
              </div>
            </div>
        </div>
    </div>
</section>
<section class="fact-section spad set-bg" data-setbg="assets/images/background.jpg" style="background-image: url(assets/images/background.jpg);" id="move-counter">
    <div class="container">
      <div class="row">
        <div class="col-sm-6 col-lg-3 fact">
          <div class="fact-icon">
            <i class="ti-pencil-alt"></i>
          </div>
          <div class="fact-text">
            <span class="goeducation-counter js-counter" data-from="0" data-to="<?php echo count($sections);?>" data-speed="60" data-refresh-interval="50"><?php echo count($sections);?></span>
            <!-- <h2><?php echo count($sections);?></h2> -->
            <p>Sections</p>

          </div>
        </div>
        <div class="col-sm-6 col-lg-3 fact">
          <div class="fact-icon">
            <i class="ti-briefcase"></i>
          </div>
          <div class="fact-text">
            <span class="goeducation-counter js-counter" data-from="0" data-to="<?php echo count($teachers);?>" data-speed="60" data-refresh-interval="50"><?php echo count($teachers);?></span>
            <!-- <h2></h2> -->

            <p>TEACHERS</p>
          </div>
        </div>
        <div class="col-sm-6 col-lg-3 fact">
          <div class="fact-icon">
            <i class="ti-user"></i>
          </div>
          <div class="fact-text">
            <span class="goeducation-counter js-counter" data-from="0" data-to="<?php echo count($students);?>" data-speed="60" data-refresh-interval="50"><?php echo count($students);?></span>
            <!-- <h2><?php echo count($students);?></h2> -->
            <p>STUDENTS</p>
          </div>
        </div>
        <div class="col-sm-6 col-lg-3 fact">
          <div class="fact-icon">
            <i class="ti-pencil-alt"></i>
          </div>
          <div class="fact-text">
            <span class="goeducation-counter js-counter" data-from="0" data-to="<?php echo count($employees);?>" data-speed="60" data-refresh-interval="50"><?php echo count($employees);?></span>
            <!-- <h2><?php echo count($employees);?></h2> -->
            <p>EMPLOYEES</p>
          </div>
        </div>
      </div>
    </div>
  </section>
<?php } ?>
<!-- our team -->
<?php if (isset($teachers) && !empty($teachers)) { ?>
<section class="section_team md-padding">
    <div id="team" >
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="site-title">
                        <h3 class="title-section1">Our Teachers</h3>
                    </div>
                </div>
            </div>
       
    
            <div class="row">
             
                <?php foreach ($teachers as $key => $obj) { ?>
                  <?php if($key<3){ ?>
                <div class="col-sm-6 col-md-3">
                    <div class="team">
                        <div class="team-img">
                          <?php  if($obj->photo != ''){ ?>
                            <img class="img-responsive" src="<?php echo UPLOAD_PATH; ?>/teacher-photo/<?php echo $obj->photo; ?>" alt="">
                          <?php }else{ ?>
                            <img src="<?php echo IMG_URL; ?>/default-user.png" alt="" width="120" class="img-responsive"/> 
                          <?php } ?>
                            <div class="overlay">
                                <div class="team-social">
                                <?php if($obj->facebook_url){ ?>
                                <a target="_blank" href="<?php echo $obj->facebook_url; ?>"><i class="fa fa-facebook"></i></a>
                                <?php } ?>
                                <?php if($obj->linkedin_url){ ?>
                                <a target="_blank" href="<?php echo $obj->linkedin_url; ?>"><i class="fa fa-linkedin"></i></a>
                                <?php } ?>
                                <?php if($obj->google_plus_url){ ?>
                                <a target="_blank" href="<?php echo $obj->google_plus_url; ?>"><i class="fa fa-google-plus"></i></a>
                                <?php } ?>
                               <!--  <?php if($obj->instagram_url){ ?>
                                <li><a target="_blank" href="<?php echo $obj->instagram_url; ?>"><i class="fa fa-instagram"></i></a></li>
                                <?php } ?> -->
                                <!-- <?php if($obj->pinterest_url){ ?>
                                <li><a target="_blank" href="<?php echo $obj->pinterest_url; ?>"><i class="fa fa-pinterest-square"></i></a></li>
                                <?php } ?> -->
                                <?php if($obj->twitter_url){ ?>
                                <a target="_blank" href="<?php echo $obj->twitter_url; ?>"><i class="fa fa-twitter"></i></a>
                                <?php } ?>
                                <?php if($obj->youtube_url){ ?>
                                <a target="_blank" href="<?php echo $obj->youtube_url; ?>"><i class="fa fa-youtube"></i></a>
                                <?php } ?>
                                   <!--  <a  href="<?php echo $obj->facebook_url; ?>"><i class="fa fa-facebook"></i></a>
                                    <a href="#"><i class="fa fa-google-plus"></i></a>
                                    <a href="#"><i class="fa fa-twitter"></i></a> -->
                                </div>
                            </div>
                        </div>
                        <div class="team-content">
                            <h3><?php echo $obj->name; ?></h3>
                            <span><?php echo $obj->responsibility; ?></span>
                        </div>
                    </div>
                </div>

            <?php } ?>
          <?php } ?>
         
         
    </div>
    <div class="text-center btn_view pb-4">
                <a href="<?php echo site_url('teachers'); ?>" class="btn btn-sm btn-lng btn-outline-dark">View More</a>
              </div>
            </div>
</section>
<?php } ?>
<section class="contact-content-area" id="contact-section">
   <div class="go-heading go-lined site-title">
      <h3 class="title-section1">Contact Us</h3>
    </div>
    <div class="container">
     
        <div class="row">
            <div class="col-lg-6 col-md-6 col-xs-12">
              <div class="map-contact">
                <div id="map" style="height: 455px;"></div>
                  <script>
                      function myMap() {
                          var myCenter = new google.maps.LatLng(<?php echo $settings->school_geocode; ?>);
                          var mapCanvas = document.getElementById("map");
                          var mapOptions = {center: myCenter, zoom: 16};
                          var map = new google.maps.Map(mapCanvas, mapOptions);
                          var marker = new google.maps.Marker({position: myCenter});
                          marker.setMap(map);
                          //infowindow.open(map, marker);
                      }
                  </script>
                  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCwNfbMeqVjiM6GstU-IfuyXvg0R1F2UaY&callback=myMap"></script>
              </div>
                <!-- <script>
                    function myMap() {
                        var myCenter = new google.maps.LatLng(<?php echo $settings->school_geocode; ?>);
                        var mapCanvas = document.getElementById("map");
                        var mapOptions = {center: myCenter, zoom: 16};
                        var map = new google.maps.Map(mapCanvas, mapOptions);
                        var marker = new google.maps.Marker({position: myCenter});
                        marker.setMap(map);
                        //infowindow.open(map, marker);
                    }
                </script> -->
               
            </div>
            <div class="col-lg-6 col-md-6 col-xs-12">
                <div class="contact-form">
                    <form action="<?php echo site_url('contact'); ?>" method="post" name="contact" id="contact">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="first_name" class="col-form-label"><?php echo $this->lang->line('first_name'); ?></label>
                                <input type="text" class="form-control" id="first_name" placeholder="<?php echo $this->lang->line('first_name'); ?>" name="first_name" required="required">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="last_name" class="col-form-label"><?php echo $this->lang->line('last_name'); ?></label>
                                <input type="text" class="form-control" id="last_name" placeholder="<?php echo $this->lang->line('last_name'); ?>" name="last_name">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="email" class="col-form-label"><?php echo $this->lang->line('email'); ?></label>
                                <input type="email" class="form-control" id="email" placeholder="<?php echo $this->lang->line('email'); ?>" name="email" required="required">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="phone" class="col-form-label"><?php echo $this->lang->line('phone'); ?></label>
                                <input type="text" class="form-control" id="phone" placeholder="<?php echo $this->lang->line('phone'); ?>" name="phone">
                            </div>
                        </div>  
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="comment"><?php echo $this->lang->line('comment'); ?></label>
                                <textarea class="form-control" id="comment" rows="5" name="comment" required="required" placeholder="<?php echo $this->lang->line('comment'); ?>"></textarea>
                            </div>                           
                        </div>                           
                        <button type="submit" class="btn btn-primary btn-blue" style="margin-left: 16px;"><?php echo $this->lang->line('submit'); ?></button>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- <section class="content-area">
  <div class="front-contact">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12">
                <div class="contact-form">
                    <form action="<?php echo site_url('contact'); ?>" method="post" name="contact" id="contact">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="first_name" class="col-form-label"><?php echo $this->lang->line('first_name'); ?></label>
                                <input type="text" class="form-control" id="first_name" placeholder="<?php echo $this->lang->line('first_name'); ?>" name="first_name" required="required">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="last_name" class="col-form-label"><?php echo $this->lang->line('last_name'); ?></label>
                                <input type="text" class="form-control" id="last_name" placeholder="<?php echo $this->lang->line('last_name'); ?>" name="last_name">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="email" class="col-form-label"><?php echo $this->lang->line('email'); ?></label>
                                <input type="email" class="form-control" id="email" placeholder="<?php echo $this->lang->line('email'); ?>" name="email" required="required">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="phone" class="col-form-label"><?php echo $this->lang->line('phone'); ?></label>
                                <input type="text" class="form-control" id="phone" placeholder="<?php echo $this->lang->line('phone'); ?>" name="phone">
                            </div>
                        </div>  
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="comment"><?php echo $this->lang->line('comment'); ?></label>
                                <textarea class="form-control" id="comment" rows="5" name="comment" required="required" placeholder="<?php echo $this->lang->line('comment'); ?>"></textarea>
                            </div>                           
                        </div>                           
                        <button type="submit" class="btn btn-primary btn-blue" style="margin-left: 16px;"><?php echo $this->lang->line('submit'); ?></button>
                        
                    </form>
                </div>
            </div>
            <div class="col-lg-4 col-md-12">
                <div class="right-pane contact-mg clearfix">
                    <h2 class="widget-title"><?php echo $this->lang->line('get_in_touch'); ?></h2> 
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <ul>
                                <li>
                                    <p><i class="fa fa-map-marker"></i><?php echo $settings->address; ?></p>
                                </li>
                                <li>
                                    <p><i class="fa fa-envelope"></i><?php echo $settings->email; ?></p>
                                </li>
                                <li>
                                    <p><i class="fa fa-phone"></i><?php echo $settings->phone; ?></p>
                                </li>
                                <li>
                                    <p><i class="fa fa-fax"></i><?php echo $settings->school_fax; ?></p>
                                </li>
                            </ul>
                        </div> 
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>
</section> -->
<!-- our gallery -->
<!-- <section id="gallery" class="gallery-wrap">
        
        <div class="container"> 
            <div class="row">
                  <div class="col-12">
                      <div class="site-title">
                            <h3 class="title-section1">Our Gallery</h3>
                        </div>
                  </div>
              </div>       
          
            <div class="row">          
                <div class="col-md-12">
                 
                  <div class="controls text-center">
                    <a class="filter active btn btn-common" data-filter="all">
                      All 
                    </a>
                    <a class="filter btn btn-common" data-filter=".flats">
                      Teachers 
                    </a>
                    <a class="filter btn btn-common" data-filter=".plots">
                      Members
                    </a>
                    <a class="filter btn btn-common" data-filter=".house">
                      Students 
                    </a>
                  </div>
                  
                </div>

            <div id="portfolio" class="row wow fadeInDown" data-wow-delay="0.4s">
              <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4 mix plots house">
                <div class="portfolio-item">
                  <div class="shot-item">
                    <img src="assets/images/team1.jpg" alt="projects"/>  
                    <div class="overlay">
                      <div class="icons">
                        <a class="lightbox preview" href="assets/images/team1.jpg">
                          <i class="icon-eye"></i>
                        </a>
                      </div>
                    </div>
                  </div>               
                </div>
              </div>
             
              <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4 mix plots">
                <div class="portfolio-item">
                  <div class="shot-item">
                    <img src="assets/images/team1.jpg" alt="projects"/> 
                    <div class="overlay">
                      <div class="icons">
                        <a class="lightbox preview" href="assets/images/team1.jpg">
                          <i class="icon-eye"></i>
                        </a>
                      </div>
                    </div>
                  </div>               
                </div>
              </div>
              <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4 mix plots flats">
                <div class="portfolio-item">
                  <div class="shot-item">
                    <img src="assets/images/team2.jpg" alt="projects" /> 
                    <div class="overlay">
                      <div class="icons">
                        <a class="lightbox preview" href="assets/images/team2.jpg">
                          <i class="icon-eye"></i>
                        </a>
                      </div>
                    </div>
                  </div>               
                </div>
              </div>
              <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4 mix plots">
                <div class="portfolio-item">
                  <div class="shot-item">
                    <img src="assets/images/team3.jpg" alt="projects"/> 
                    <div class="overlay">
                      <div class="icons">
                        <a class="lightbox preview" href="assets/images/team3.jpg">
                          <i class="icon-eye"></i>
                        </a>
                      </div>
                    </div>
                  </div>               
                </div>
              </div>
              <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4 mix flats">
                <div class="portfolio-item">
                  <div class="shot-item">
                    <img src="assets/images/team1.jpg" alt="projects"/>
                    <div class="overlay">
                      <div class="icons">
                        <a class="lightbox preview" href="assets/images/team1.jpg">
                          <i class="icon-eye"></i>
                        </a>
                      </div>
                    </div>
                  </div>               
                </div>
              </div>
              <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4 plots">
                <div class="portfolio-item">
                  <div class="shot-item">
                    <img src="assets/images/team1.jpg" alt="projects"/>
                    <div class="overlay">
                      <div class="icons">
                        <a class="lightbox preview" href="assets/images/team1.jpg">
                          <i class="icon-eye"></i>
                        </a>
                      </div>
                    </div>
                  </div>               
                </div>
              </div>
            </div>
          </div>
        </div>
      
      </section> -->
<script type="text/javascript">
 $(document).ready(function() {
          $('#founder-msg').owlCarousel({
            loop: true,
            margin: 30,
            nav: true,
            items: 1,
            dots: true,
            autoplay: true
          });
          
          
          $('#addmission-board').owlCarousel({
            items: 1,
            loop: true,
            nav: true,
            dots: true,
            autoplay: true
          });
          
          
          $('#event-held').owlCarousel({
            loop: true,
            margin: 30,
            nav: false,
            items: 2,
            dots: true,
            autoplay: true,
            responsive: {
              0: {
                  items: 1
              },
              360: {
                  items: 1
              },
              576: {
                  items: 1
              },
              991: {
                  items: 2
              },
              1200: {
                  items: 2
              }
            }
          });

          $('#owl-gallery').owlCarousel({
            loop: true,
            margin: 30,
            nav: false,
            items: 2,
            dots: true,
            autoplay: true,
            responsive: {
              0: {
                  items: 1
              },
              360: {
                  items: 1
              },
              420: {
                items: 2
              },
              576: {
                  items: 2
              },
              767: {
                  items: 2
              },
              991: {
                  items: 3
              },
              1200: {
                  items: 4
              }
            }
          });

         
});

 </script>
