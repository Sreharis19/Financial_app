 <!-- Content wrapper -->
 <div class="content-wrapper">
     <!-- Content -->

     <div class="container-xxl flex-grow-1 container-p-y">
         <div style="float: right;">
             <button type="button" onclick="location.href = '<?php echo base_url(); ?>/public/Client_dashboard';" class="btn btn-primary">
                 <span class="tf-icons bx bx-arrow-back">
                 </span>&nbsp; Back To Dashboard
             </button>
         </div>
         <br>
         <br>
         <br>
         <div class="card" style="padding-top: 10px; padding-left: 05px; padding-right: 05px;">
             <div class="col-xl-10" style="padding-top: 30px; padding-left: 80px; padding-right: 80px;">
                 <!-- HTML5 Inputs -->
                 <div class="card mb-4">
                     <h5 class="card-header">My Profile</h5>
                     <div class="card-body">
                     <div class="card-body">
                        <div class="mb-3 row">
                                 <label for="first_name" class="col-md-2 col-form-label">Bio :</label>
                                 <div class="col-md-10">
                                     <input class="form-control" type="text" id="bio" value="<?= $userInfo[0]->bio ?>" disabled />
                                 </div>
                             </div>
                             <div class="mb-3 row">
                                 <label for="first_name" class="col-md-2 col-form-label">Name :</label>
                                 <div class="col-md-10">
                                     <input class="form-control" type="text" id="full_name" value="<?= $userInfo[0]->first_name ?> <?= $userInfo[0]->last_name ?>" disabled />
                                 </div>
                             </div>
                             <div class="mb-3 row">
                                 <label for="last_name" class="col-md-2 col-form-label">Email ID :</label>
                                 <div class="col-md-10">
                                     <input class="form-control" type="text" id="user_email_id" value="<?= $userInfo[0]->user_email ?>" disabled />
                                 </div>
                             </div>
                             <div class="mb-3 row">
                                 <label for="email" class="col-md-2 col-form-label">Contact No: </label>
                                 <div class="col-md-10">
                                     <input class="form-control" type="number" id="contactNo" value="<?= $userInfo[0]->user_contact ?>" disabled />
                                 </div>
                             </div>
                             <div class="mb-3 row">
                                 <label for="email" class="col-md-2 col-form-label">Opted Products: </label>
                                 <div class="col-md-10">
                                     <?php
                                        $selectedProducts = "";
                                        foreach ($userInfo as $key => $user) {
                                            if ($key > 0) {
                                                $selectedProducts .= $user[0]->selected_products . ", ";
                                            }
                                        }
                                        $selectedProducts = trim($selectedProducts, ", ");
                                        ?>
                                     <input class="form-control" type="text" id="opted_products" value="<?= $selectedProducts ?>" disabled />
                                 </div>
                             </div>
                             <div class="mb-3 row">
                                 <label for="minimum" class="col-md-2 col-form-label">Minimum Investment
                                     Amount: </label>
                                 <div class="col-md-10">
                                     <input class="form-control" type="number" id="minimum" value="<?= $userInfo[0]->user_min_purchase_power ?>" disabled />
                                 </div>
                             </div>
                             <div class="mb-3 row">
                                 <label for="maximum" class="col-md-2 col-form-label">Maximum Investment
                                     Amount: </label>
                                 <div class="col-md-10">
                                     <input class="form-control" type="number" id="minimum" value="<?= $userInfo[0]->user_max_purchase_power ?>" disabled />
                                 </div>
                             </div>
                             <div class="mb-3 row">
                                 <label for="maximum" class="col-md-2 col-form-label">Country: </label>
                                 <div class="col-md-10">
                                     <input class="form-control" type="text" id="country" value="<?= $userInfo[0]->user_country ?>" disabled />
                                 </div>
                             </div>
                             <br>
                             <br>
                         </div>
                     </div>
                 </div>
             </div>
         </div>