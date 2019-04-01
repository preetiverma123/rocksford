<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <!-- Meta, title, CSS, favicons, etc. -->
        <meta charset="utf-8">
        <meta charset="ISO-8859-15">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

       <!--  <title><?php echo $title_for_layout; ?></title> -->
        <title><?php echo $settings->school_name; ?></title>
      <!--   <link rel="icon" href="<?php echo IMG_URL; ?>favicon.png" type="image/x-icon" /> -->
         <link rel="icon" href="<?php echo UPLOAD_PATH; ?>logo/favicon.png" type="image/x-icon" />
        <link href="https://fonts.googleapis.com/css?family=Rubik:400,400i,500,500i,700,700i" rel="stylesheet">
        <!-- Bootstrap -->
        <link href="<?php echo VENDOR_URL; ?>bootstrap/bootstrap.min.css" rel="stylesheet">
        <!-- Font Awesome -->
        
        <link href="<?php echo VENDOR_URL; ?>font-awesome/css/font-awesome.min.css" rel="stylesheet">
        <link href="<?php echo CSS_URL; ?>owl.carousel.css" rel="stylesheet">
        <link href="<?php echo CSS_URL; ?>owl.theme.default.css" rel="stylesheet">
        <!-- Custom Theme Style -->
        <link href="<?php echo CSS_URL; ?>front-style.css" rel="stylesheet">
        <link href="<?php echo CSS_URL; ?>animate.css" rel="stylesheet">
        <link href="<?php echo CSS_URL; ?>front-colorbox.css" rel="stylesheet">
        <link href="<?php echo CSS_URL; ?>themify-icons.css" rel="stylesheet">

        <?php if ($theme->slug) { ?>
            <link href="<?php echo CSS_URL; ?>theme/<?php echo $theme->slug; ?>.css" rel="stylesheet">
        <?php } else { ?>
            <link href="<?php echo CSS_URL; ?>theme/dodger-blue.css" rel="stylesheet">
        <?php } ?>
        <!-- style.css -->
        <!-- <link href="<?php echo CSS_URL;?>theme/style.css" rel="stylesheet"> -->

        <!-- jQuery -->
        <script src="<?php echo JS_URL; ?>modernizr-2.6.2.min.js"></script>
        <script src="<?php echo JS_URL; ?>jquery-1.11.2.min.js"></script>
        <script src="<?php echo JS_URL; ?>main.js"></script>
        <script src="<?php echo JS_URL; ?>jquery.mixitup.js"></script>
        <script src="<?php echo JS_URL; ?>jquery.countTo.js"></script>
        <script src="<?php echo JS_URL; ?>jquery.waypoints.min.js"></script>
        <script src="<?php echo JS_URL; ?>jquery.mCustomScrollbar.concat.min.js"></script>
        <script src="<?php echo JS_URL; ?>jquery.validate.js"></script>
         
    </head>

    <body>
        <div id="cover"></div>

        <?php $this->load->view('layout/header'); ?>   

        
        <!-- page content -->
        
        <?php echo $content_for_layout; ?>
        <!-- /page content -->
        
        <!-- footer content -->
        <?php $this->load->view('layout/footer'); ?>   
        <!-- /footer content -->

        <!-- Bootstrap -->
        <script src="<?php echo VENDOR_URL; ?>bootstrap/bootstrap.min.js"></script>    
        <script src="<?php echo JS_URL; ?>owl.carousel.min.js"></script>
        <!--   Start   -->
        
        <script src="<?php echo JS_URL; ?>jquery.zoomslider.min.js"></script>        
        <script src="<?php echo JS_URL; ?>jquery.colorbox-min.js"></script>
        <script src="<?php echo JS_URL; ?>jquery.countdown.js"></script>
        <script src="<?php echo JS_URL; ?>masonry.pkgd.min.js"></script>
        <script src="<?php echo JS_URL; ?>magnific-popup.min.js"></script>
        <script src="<?php echo JS_URL; ?>isotope.pkgd.min.js"></script>
        <!-- dataTable with buttons end -->
        <script src="<?php echo JS_URL; ?>custom-1.js"></script>
        <!-- Custom Theme Scripts -->
        <script src="<?php echo JS_URL; ?>front-custom.js"></script>   
       
        <script type="text/javascript">

            jQuery.extend(jQuery.validator.messages, {
                required: "<?php echo $this->lang->line('required_field'); ?>",
                email: "<?php echo $this->lang->line('enter_valid_email'); ?>",
                url: "<?php echo $this->lang->line('enter_valid_url'); ?>",
                date: "<?php echo $this->lang->line('enter_valid_date'); ?>",
                number: "<?php echo $this->lang->line('enter_valid_number'); ?>",
                digits: "<?php echo $this->lang->line('enter_only_digit'); ?>",
                equalTo: "<?php echo $this->lang->line('enter_same_value_again'); ?>",
                remote: "<?php echo $this->lang->line('pls_fix_this'); ?>",
                dateISO: "Please enter a valid date (ISO).",
                maxlength: jQuery.validator.format("Please enter no more than {0} characters."),
                minlength: jQuery.validator.format("Please enter at least {0} characters."),
                rangelength: jQuery.validator.format("Please enter a value between {0} and {1} characters long."),
                range: jQuery.validator.format("Please enter a value between {0} and {1}."),
                max: jQuery.validator.format("Please enter a value less than or equal to {0}."),
                min: jQuery.validator.format("Please enter a value greater than or equal to {0}.")
            });


        </script>
        <script type="text/javascript">
            $(document).on('ready',function(){
               
                setTimeout(function(){
                    $('#cover').fadeOut(500);
                },100)
            });
        </script>
        <script>
        $('#held-event').owlCarousel({
            loop: true,
            margin: 30,
            nav: false,
            items: 1,
            dots: true,
            autoplay: true,
            
          });
        $('#notice-detail').owlCarousel({
            items: 1,
            loop: true,
            nav: false,
            dots: true,
            autoplay: true
          });
        </script>

    </body>
</html>