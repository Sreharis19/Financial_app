  <!-- Content wrapper -->
  <div class="content-wrapper">
                    <!-- Content -->

                    <div class="container-xxl flex-grow-1 container-p-y">
                        <div style="float: right;">
                            <button type="button" onclick="location.href = '<?php echo base_url(); ?>/public/Ma_Cw_List';" class="btn btn-primary">
                                <span class="tf-icons bx bx-arrow-back">
                                </span>&nbsp; Back To Content Writer List
                            </button>
                        </div>
                        <br>
                        <br>
                        <br>
                        <form>
                        <div class="card" style="padding-top: 10px; padding-left: 05px; padding-right: 05px;">
                            <div class="col-xl-10" style="padding-top: 30px; padding-left: 80px; padding-right: 80px;">
                                <!-- HTML5 Inputs -->
                                <div class="card mb-4">
                                    <h5 class="card-header">Edit Content Writer Details</h5>
                                     <div class="card-body">
                                        <div class="mb-3 row">
                                            <label for="first_name" class="col-md-2 col-form-label">First Name :</label>
                                            <div class="col-md-10">
                                                <input class="form-control" type="text" id="first_name"  value="<?= $cw->first_name ?>" name="first_name"   />
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="last_name" class="col-md-2 col-form-label">Last Name :</label>
                                            <div class="col-md-10">
                                                <input class="form-control" type="text" id="last_name" value="<?= $cw->last_name ?>" name="last_name"  />
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="email" class="col-md-2 col-form-label">Email : </label>
                                            <div class="col-md-10">
                                                <input class="form-control" type="email" id="email" value="<?= $cw->user_email ?>" name="email"  />
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="ContactNumber" class="col-md-2 col-form-label">Contact Number
                                                :</label>
                                            <div class="col-md-10">
                                                <input class="form-control" type="tel" id="ContactNumber" value="<?= $cw->user_contact ?>" name="ContactNumber" />
                                            </div>
                                        </div>
                                        <br>
                                        <br>
                                        <div style="float: right;">	
                                <button type="button" id="updateContentWriter" class="btn btn-dark">	
                                    <span class="tf-icons bx bx-save">	
                                    </span>&nbsp; UpdateAccount	
                                </button>	
                            </div>
                            
                                    </div>
                                </div>
                            </div>
                        </div>
                 </form>
                    </div>
				 
                    <!-- / Content -->

                    </div>
