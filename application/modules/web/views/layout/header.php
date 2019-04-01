
<header id="header">
    <div class="header-top-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12 header-top">
                    <p>
                        <a href="mailto:<?php echo $settings->email; ?>"><i class="fa fa-envelope"></i> <?php echo $settings->email; ?></a>
                        <a href="tel:<?php echo $settings->phone; ?>"><i class="fa fa-phone"></i> <?php echo $settings->phone; ?></a>
                        <?php if(!empty($settings->other_phone)){?>
                            <a href="tel:<?php echo $settings->other_phone; ?>"><i class="fa fa-phone"></i><?php echo $settings->other_phone; ?></a>
                        <?php }?>
                    </p>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12">                            
                    <div class="top-menu">
                        <ul>
                           <!--  <li><a href="<?php echo site_url('admission'); ?>"><?php echo $this->lang->line('admission'); ?></a></li>
                            <li>|</li> -->
                            <?php if (logged_in_user_id()) { ?>       
                            <li><a href="<?php echo site_url('dashboard'); ?>"><?php echo $this->lang->line('dashboard'); ?></a></li>
                            <li>|</li>
                            <li><a href="<?php echo site_url('auth/logout'); ?>"><?php echo $this->lang->line('logout'); ?></a></li>
                            <?php }else{ ?>

                            <li><a href="<?php echo site_url('login'); ?>"><?php echo $this->lang->line('login'); ?></a></li>

                            <?php } ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-area d-flex align-items-center">
        <div class="container-fluid pos">
            <div class="row">
                <div class="col-lg-4">
                    <div class="logo">
                        <div class="displayFlex">
                            <div class="logo-nn">
                                <a href="<?php echo site_url(); ?>">
                                <img src="<?php echo UPLOAD_PATH; ?>/logo/<?php echo $settings->logo;?>" alt="" />
                            </div>
                            <div class="logo-nn textWidth">
                                 <a><span>R</span>ockford <span>I</span>nternational<span>S</span>chool</a>
                            </div>
                        </div> 
                    </div>   
                </div>
                <div class="col-lg-8 static">
                    <div class="main-menu">
                        <nav>
                            <ul class="mainmenu" id="mainmenu">
                                <li class="active"><a href="<?php echo site_url(); ?>" ><?php echo $this->lang->line('home'); ?></a></li>
                                <li><a href="#" class="hidemenu"><?php echo $this->lang->line('announcement'); ?> <i class="fa fa-caret-down"></i></a>                                       
                                    <ul class="submenu">
                                        <li><a href="<?php echo site_url('news'); ?>"><?php echo $this->lang->line('news'); ?></a></li>
                                        <li><a href="<?php echo site_url('notice'); ?>"><?php echo $this->lang->line('notice'); ?></a></li>
                                        <li><a href="<?php echo site_url('holiday'); ?>"><?php echo $this->lang->line('holiday'); ?></a></li>
                                    </ul>
                                </li>
                                <li><a href="javascript:void(0)" class="hidemenu"><?php echo $this->lang->line('about'); ?>
                                    <i class="fa fa-caret-down"></i></a>                                       
                                    <ul class="submenu">
                                        <li><a href="<?php echo site_url('about/about-us'); ?>"><?php echo 'About Us'; ?></a></li>
                                        <li><a href="<?php echo site_url('about/md-message'); ?>"><?php echo "MD's message"; ?></a></li>
                                        <li><a href="<?php echo site_url('about/principal-message'); ?>"><?php echo "Principal's Message"; ?></a></li>
                                         <li><a href="<?php echo site_url('fees'); ?>"><?php echo 'Fee Structure'; ?></a></li>
                                    </ul>
                              
                                </li>
                                <li><a href="javascript:void(0);" class="hidemenu">Admission
                                    <i class="fa fa-caret-down"></i></a>
                                    <ul class="submenu">
                                         <li><a href="<?php echo site_url('admissionform');?>">Admission Form</a>
                                        </li>
                                        <li><a href="<?php echo site_url('about/admission'); ?>"><?php echo 'Admission Procedure'; ?></a>
                                        </li>
                                    </ul>
                                </li>
                                <li><a href="javascript:void(0);" class="hidemenu">Academic
                                    <i class="fa fa-caret-down"></i></a>
                                    <ul class="submenu">
                                        
                                        <li><a href="<?php echo site_url('teachers'); ?>"><?php echo $this->lang->line('teacher'); ?></a></li>
                                        <li><a href="<?php echo site_url('staff'); ?>"><?php echo $this->lang->line('staff'); ?></a></li>
                                        <li><a href="<?php echo site_url('galleries'); ?>"><?php echo $this->lang->line('gallery'); ?></a></li>
                                        <li><a href="<?php echo site_url('facilities'); ?>">Facility</a></li>   
                                    </ul>
                                </li>
                                <!-- <li><a href="<?php echo site_url('events'); ?>"><?php echo $this->lang->line('event'); ?></a></li> -->
                                <!-- <li><a href="<?php echo site_url('galleries'); ?>"><?php echo $this->lang->line('gallery'); ?></a></li>
                                <li><a href="<?php echo site_url('teachers'); ?>"><?php echo $this->lang->line('teacher'); ?></a></li>
                                <li><a href="<?php echo site_url('staff'); ?>"><?php echo $this->lang->line('staff'); ?></a></li>
                                <li><a href="<?php echo site_url('facilities'); ?>">Facility</a></li> -->
                                <li><a href="<?php echo site_url('about/recognition'); ?>">Recognition</a></li>
                                <li><a href="<?php echo site_url('contact'); ?>"><?php echo $this->lang->line('contact_us'); ?></a></li>
                                
                            </ul>
                            <ul class="mainmenu-toggle" id="mainmenu-toggle">
                                <li class="manutoggle"><a href="javascript:void(0);" onclick="toggleMenu()"><i class="fa fa-bars"></i></a></li>
                            </ul>
                        </nav>
                    </div>

                    <script type="text/javascript">

                        function toggleMenu() {
                            var x = document.getElementById("mainmenu");
                            if (x.className === "mainmenu") {
                                x.className += " responsive";
                            } else {
                                x.className = "mainmenu";
                            }
                        }
                        $(document).ready(function(){
                            $(".hidemenu").click(function(){
                                $(".submenu").toggle();
                            });

                            $('#slider_area').owlCarousel({
                                items: 1,
                                loop: true,
                                nav: true,
                                dots: true,
                                autoplay: true
                              });

                            $('#notice-board').owlCarousel({
                                items: 1,
                                loop: true,
                                // margin: 30,
                                nav: false,
                                
                                dots: true,
                                autoplay: true
                              });
                            
                        });

                    </script>

                </div>
            </div>
        </div>
    </div>
</header>