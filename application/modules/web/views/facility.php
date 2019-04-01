<section class="page-title-area bg-white">
    <div class="container">
        <div class="row">
            <div class="col-lg-12"><h1 class="page-title">Facilities</h1></div>
        </div>
    </div>
</section>
<section class="facilitySection">
  <div class="container">
   <!--  <?php if(!empty($facilities)) { ?>
    <?php foreach($facilities as $facility) { ?>
    <div class="col-md-12 pd-none">
      <div class="facilityWrapper">
        <div class="facilityHead">
          <h2><?php echo (!empty($facility->name))?$facility->name:'';?></h2>
        </div>
        <div class="facilityContent">
          <p><?php echo (!empty($facility->description))?$facility->description:'';?></p>
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
  <?php } ?>
<?php } ?> -->
    <!-- second facility -->
    <?php if(!empty($facilities)) { ?>
    <?php foreach($facilities as $facility) { ?>
    <div class="col-md-12 pd-none">
      <div class="facilityWrapper">
        <div class="facilityHead">
          <h2><?php echo (!empty($facility->name))?$facility->name:'';?></h2>
        </div>
        <div class="row">
          <div class="col-md-8">
            <div class="facilityContent">
              <p><?php echo (!empty($facility->description))?$facility->description:'';?></p>
            </div>
          </div>
          <div class="col-md-4">
            <div class="facilityImg">
              <?php if(!empty($facility->photo)){ ?>
                <img src="assets/uploads/facility-photo/<?php echo (!empty($facility->photo))?$facility->photo:''; ?>" alt="facility">
              <?php }?>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php } ?>
<?php } ?>
  </div>
</section>