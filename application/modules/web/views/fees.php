<section class="feesSection">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="feesBanner">
                    <?php if(!empty($fees->page_image)){?>
                     <img src="<?php echo UPLOAD_PATH; ?>/page/<?php echo $fees->page_image; ?>" alt="fees">
                     <?php }?>
                 </div>
            </div>
        </div>
    </div>
</section>
<section class="feesWrapper">
     <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="facilityWrapper">
                    <div class="facilityHead">
                        <h2><?php echo $fees->page_title; ?></h2>
                        
                    </div>
                    <div><p><?php echo $fees->page_description; ?></p></div>
                    
             </div>
            </div>
        </div>
    </div>
</section>
