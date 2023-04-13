<body>
          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <div class="row">
                <div class="col-lg-12 col-md-12 order-1">
                  <div class="row">
                    <div class="col-lg-6 col-md-12 col-6 mb-6">
                      <div class="card">
                        <div class="card-body">
                          <div class="card-title d-flex align-items-start justify-content-between">
                            <div class=" flex-shrink-0">
                              <img src="<?php echo base_url(); ?>/public/assets/img/dashboard/postcard.png"/>
                            </div>
                          </div>
                          <span class="fw-semibold d-block mb-4" style="align-items: center;">Total No: Of Posts</span>
                          <h2 class="card-title mb-4" style="align-items: center;"><?= $total_posts ?></h2>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-6 mb-6">
                      <div class="card">
                        <div class="card-body">
                          <div class="card-title d-flex align-items-start justify-content-between">
                            <div class=" flex-shrink-0">
                              <img src="<?php echo base_url(); ?>/public/assets/img/dashboard/postcard1.png"/>
                            </div>
                          </div>
                          <span class="fw-semibold d-block mb-4" style="align-items: center;">Total No: Of Active Posts</span>
                          <h2 class="card-title mb-4" style="align-items: center;"><?= $active_posts ?></h2>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
      
              </div>
              <br>

              <div class="row">
                <div class="col-lg-12 col-md-12 order-1">
                  <div class="row">
                    <div class="col-lg-6 col-md-12 col-6 mb-6">
                      <div class="card">
                        <div class="card-body">
                          <div class="card-title d-flex align-items-start justify-content-between">
                            <div class=" flex-shrink-0">
                              <img src="<?php echo base_url(); ?>/public/assets/img/dashboard/postcard2.png"/>
                            </div>
                          </div>
                          <span class="fw-semibold d-block mb-4" style="align-items: center;">Total No: Of Archived Posts</span>
                          <h2 class="card-title mb-4" style="align-items: center;"><?= $archived_posts ?></h2>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
      
              </div>
            </div>
            <!-- / Content -->
