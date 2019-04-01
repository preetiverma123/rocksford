<section class="page-title-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12"><h1 class="page-title"><?php echo $this->lang->line('news'); ?></h1></div>
        </div>
    </div>
</section>

<section class="go-content-area">
    <div class="container">

        <div class="row">
            
            <?php if(isset($news_list) && !empty($news_list)) { ?>
                <?php foreach ($news_list as $obj) { ?>
                    <div class="col-sm-12 col-md-6 col-lg-6 services-grid clearfix">
                        <div class="newsWrap">
                            <div class="col-sm-12 col-md-12 col-lg-6 clearfix serv-img">
                                <div class="news-content">
                                    <a href="<?php echo site_url('news-detail/'.$obj->id); ?>">
                                        <img src="<?php echo UPLOAD_PATH; ?>/news/<?php echo $obj->image; ?>" alt="Foto" class="news-listing-img img-fluid img-responsive">
                                    </a>
                                    <div class="news-discription">
                                        <div class="theme-border">
                                            <div class="tg-display-table">
                                                <div class="tg-display-table-cell">
                                                    <div class="news-title">
                                                        <h4><a href="javascript:void(0);">Coaching</a></h4>
                                                        <ul class="news-meta">                                          
                                                            <li>Dated: March 20, 2016</li>
                                                            <div class="clearfix"> </div>
                                                        </ul>                                       
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    
                        <div class="col-sm-12 col-md-12 col-lg-6 serv-text">
                            <a href="<?php echo site_url('news-detail/'.$obj->id); ?>">
                                <h4><?php echo $obj->title; ?></h4>
                            </a>
                            <div class="news-date"><i class="fa fa-calendar"></i> <?php echo date('M j, Y', strtotime($obj->date)); ?></div>
                            <p>
                                <?php echo substr($obj->news, 0,120); ?>...
                            </p>
                            <div class="more-link"><a href="<?php echo site_url('news-detail/'.$obj->id); ?>" class="btn-link"><?php echo $this->lang->line('read_more'); ?> <i class="fa fa-long-arrow-right"></i></a></div>
                        </div>                   
                        <div class="clearfix"> </div>
                    </div>
                </div>
                <?php } ?>
             <?php } else { ?>
            <div class="col-md-12 col-sm-12"><?php echo $this->lang->line('no_data_found'); ?></div>
            <?php } ?>
        </div>
    </div>

</section>