<section class="slider_area">
  <div class="container">
    <div class="row">
      <div class="col-md-8">
        <div class="owl-carousel" id="slider_area">
        <div class="item">
          <img src="assets/uploads/slider/slider-move.jpg" class="img-responsive" alt="slider">
          <div class="overlay"></div>
          <!-- <?php $slider_str = ''; foreach($sliders as $obj){ ?>
            <?php $slider_str .= '"assets/uploads/slider/'.$obj->image.'"'.','; ?>
          <?php } ?>
        <div id="demo-1" data-zs-src='[<?php echo rtrim($slider_str, ','); ?>]' data-zs-overlay="dots">
            <div class="demo-inner-content"></div>
        </div>  -->
          </div>
          <div class="item">
            <img src="assets/uploads/slider/slider-banner.jpg" class="img-responsive" alt="slider">
            <div class="overlay"></div>
          </div>
           <div class="item">
            <img src="assets/uploads/slider/home-slider-1523271646-sms.jpg" class="img-responsive" alt="slider">
            <div class="overlay"></div>
          </div>
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
                            <marquee onmouseover="stop();" onmouseout="start();" scrollamount="1" scrolldelay="1" direction="up" style="width: 100%; margin: 0px 0px 10px 0px; padding: 0px 0px; float: right; height: 200px;text-align:center">
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
<section class="facilitySection">
  <div class="container">
    <div class="col-md-12">
      <div class="facilityWrapper">
        <div class="facilityHead">
          <h2>Bus Facility</h2>
        </div>
        <div class="facilityContent">
          <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
          <div class="row">
            <div class="col-md-4">
              <ul>
                <li><i class="fa fa-check-square-o" aria-hidden="true"></i>Bus facility</li>
                <li><i class="fa fa-check-square-o" aria-hidden="true"></i>Smart Classes</li>
                <li><i class="fa fa-check-square-o" aria-hidden="true"></i>Yoga facility</li>
                <li><i class="fa fa-check-square-o" aria-hidden="true"></i>Canteen facility</li>
                <li><i class="fa fa-check-square-o" aria-hidden="true"></i>Bus facility</li>
                <li><i class="fa fa-check-square-o" aria-hidden="true"></i>Smart Classes</li>
                <li><i class="fa fa-check-square-o" aria-hidden="true"></i>Yoga facility</li>
                <li><i class="fa fa-check-square-o" aria-hidden="true"></i>Canteen facility</li>
              </ul>
            </div>
            <div class="col-md-4">
              <ul>
                <li><i class="fa fa-check-square-o" aria-hidden="true"></i>Bus facility</li>
                <li><i class="fa fa-check-square-o" aria-hidden="true"></i>Smart Classes</li>
                <li><i class="fa fa-check-square-o" aria-hidden="true"></i>Yoga facility</li>
                <li><i class="fa fa-check-square-o" aria-hidden="true"></i>Canteen facility</li>
                <li><i class="fa fa-check-square-o" aria-hidden="true"></i>Bus facility</li>
                <li><i class="fa fa-check-square-o" aria-hidden="true"></i>Smart Classes</li>
                <li><i class="fa fa-check-square-o" aria-hidden="true"></i>Yoga facility</li>
                <li><i class="fa fa-check-square-o" aria-hidden="true"></i>Canteen facility</li>
              </ul>
            </div>
            <div class="col-md-4">
              <div class="facilityImg">
                <img src="assets/images/school-bus.jpg" alt="facility">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- second facility -->
    <div class="col-md-12">
      <div class="facilityWrapper">
        <div class="facilityHead">
          <h2>Bus Facility</h2>
        </div>
        <div class="row">
          <div class="col-md-7">
            <div class="facilityContent">
              <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
              <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
            </div>
          </div>
          <div class="col-md-5">
            <div class="facilityImg">
              <img src="assets/images/library.jpg" alt="facility">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>