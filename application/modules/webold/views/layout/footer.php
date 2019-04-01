<footer>
    <div class="container">
        <div class="row">
            <div class="col-lg-5 col-md-5">
                <h3 class="footer-title"><?php echo $this->lang->line('about'); ?> <?php echo $this->lang->line('school'); ?></h3>
                <div class="footer-text about_description">
                    <?php echo substr($about->page_description,0,220); ?>
                </div>
                <div class="q-links">
                <h3 class="footer-title"><?php echo $this->lang->line('social_link'); ?></h3>
                <ul class="social-links clearfix">
                    <?php if($settings->facebook_url){ ?>
                    <li><a target="_blank" href="<?php echo $settings->facebook_url; ?>"><i class="fa fa-facebook-square"></i></a></li>
                    <?php } ?>
                    <?php if($settings->twitter_url){ ?>
                    <li><a target="_blank" href="<?php echo $settings->twitter_url; ?>"><i class="fa fa-twitter-square"></i></a></li>
                    <?php } ?>
                    <?php if($settings->linkedin_url){ ?>
                    <li><a target="_blank" href="<?php echo $settings->linkedin_url; ?>"><i class="fa fa-linkedin-square"></i></a></li>
                    <?php } ?>
                    <?php if($settings->google_plus_url){ ?>
                    <li><a target="_blank" href="<?php echo $settings->google_plus_url; ?>"><i class="fa fa-google-plus-square"></i></a></li>
                    <?php } ?>
                    <?php if($settings->youtube_url){ ?>
                    <li><a target="_blank" href="<?php echo $settings->youtube_url; ?>"><i class="fa fa-youtube-square"></i></a></li>
                    <?php } ?>
                   <!--  <?php if($settings->instagram_url){ ?>
                    <li><a target="_blank" href="<?php echo $settings->instagram_url; ?>"><i class="fa fa-instagram"></i></a></li>
                    <?php } ?>
                    <?php if($settings->pinterest_url){ ?>
                    <li><a target="_blank" href="<?php echo $settings->pinterest_url; ?>"><i class="fa fa-pinterest-square"></i></a></li>
                    <?php } ?> -->
                    
                </ul>
            </div>
            </div>
            <div class="col-lg-4 col-md-4 q-links">
                <h3 class="footer-title">Helpful Links</h3>
                <ul class="static-links clearfix">
                    <!-- <li><a href="<?php echo site_url('news'); ?>"><?php echo $this->lang->line('news'); ?></a></li>
                    <li><a href="<?php echo site_url('notice'); ?>"><?php echo $this->lang->line('notice'); ?></a></li>
                    <li><a href="<?php echo site_url('holiday'); ?>"><?php echo $this->lang->line('holiday'); ?></a></li>
                    <li><a href="<?php echo site_url('events'); ?>"><?php echo $this->lang->line('event'); ?></a></li>
                    <li><a href="<?php echo site_url('galleries'); ?>"><?php echo $this->lang->line('gallery'); ?></a></li>
                    <li><a href="<?php echo site_url('admission'); ?>"><?php echo $this->lang->line('admission'); ?></a></li>
                    <li><a href="<?php echo site_url('teachers'); ?>"><?php echo $this->lang->line('teacher'); ?></a></li>
                    <li><a href="<?php echo site_url('staff'); ?>"><?php echo $this->lang->line('staff'); ?></a></li> -->
                    <!-- <li><a href="<?php echo site_url('contact'); ?>"><?php echo $this->lang->line('contact_us'); ?></a></li>
                    <li><a href="<?php echo site_url('terms'); ?>"><?php echo $this->lang->line('terms_and_condition'); ?></a></li>
                    <li><a href="<?php echo site_url('privacy'); ?>"><?php echo $this->lang->line('privacy_policy'); ?></a></li>
                    <li><a href="<?php echo site_url('about'); ?>"><?php echo $this->lang->line('about'); ?></a></li> -->  
                    <li><i class="fa fa-caret-right icom" aria-hidden="true"></i><a href="http://www.goeducation.in" target="_blank">www.goeducation.in</a> </li>
                    <li><i class="fa fa-caret-right icom" aria-hidden="true"></i><a href="http://www.cbse.nic.in" target="_blank">www.cbse.nic.in</a> </li>
                    <li><i class="fa fa-caret-right icom" aria-hidden="true"></i><a href="http://www.ncte-india.org" target="_blank">www.ncte-india.org</a></li>
                    <li><i class="fa fa-caret-right icom" aria-hidden="true"></i><a href="http://www.biharboard.bih.nic.in" target="_blank">www.biharboard.bih.nic.in</a></li>
                    <li><i class="fa fa-caret-right icom" aria-hidden="true"></i><a href="http://www.wikipedia.org" target="_blank">www.wikipedia.org</a> </li>
                                   
                </ul>
            </div>
            
            <div class="col-lg-3 col-md-3">
                <h3 class="footer-title"><?php echo $this->lang->line('get_in_touch'); ?></h3>
                <div class="footer-contact-info">
                    <div class="icon"><i class="fa fa-map-marker"></i></div>
                    <div class="text"><?php echo $settings->address; ?></div>
                </div>
                <div class="footer-contact-info">
                    <div class="icon"><i class="fa fa-phone"></i></div>
                    <div class="text padding-top">
                        <a href="tel:<?php echo $settings->phone; ?>"><?php echo $settings->phone; ?></a></div>
                </div>
                <div class="footer-contact-info">
                    <div class="icon"><i class="fa fa-envelope"></i></div>
                    <div class="text padding-top">
                        <a href="mailto:<?php echo $settings->email; ?>"><?php echo $settings->email; ?></a></div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="col-xl-12">
            <div class="copyright"><?php echo $settings->footer; ?></div>
        </div>
    </div>
</footer>