 <!-- Content wrapper -->
 <div class="content-wrapper">
     <!-- Content -->

     <div class="container-xxl flex-grow-1 container-p-y">
         <div style="float: right;">
             <button type="button" onclick="location.href = '<?php echo base_url(); ?>/public/Rm_Client_List';" class="btn btn-primary">
                 <span class="tf-icons bx bx-arrow-back">
                 </span>&nbsp; Back To Client List
             </button>
         </div>
         <br>
         <br>
         <br>
         <div class="card" style="padding-top: 10px; padding-left: 05px; padding-right: 05px;">
             <div class="col-xl-10" style="padding-top: 30px; padding-left: 80px; padding-right: 80px;">
                 <!-- HTML5 Inputs -->
                 <div class="card mb-4">
                     <h5 class="card-header">View Client Details</h5>
                     <div class="card-body">
                         <div class="mb-3 row">
                             <label for="first_name" class="col-md-2 col-form-label">First Name :</label>
                             <div class="col-md-10">
                                 <input class="form-control" type="text" id="first_name" value="<?= $client->first_name ?>" disabled />
                             </div>
                         </div>
                         <div class="mb-3 row">
                             <label for="last_name" class="col-md-2 col-form-label">Last Name :</label>
                             <div class="col-md-10">
                                 <input class="form-control" type="text" id="last_name" value="<?= $client->last_name ?>" disabled />
                             </div>
                         </div>
                         <div class="mb-3 row">
                             <label for="email" class="col-md-2 col-form-label">Email : </label>
                             <div class="col-md-10">
                                 <input class="form-control" type="email" id="email" value="<?= $client->user_email ?>" disabled />
                             </div>
                         </div>
                         <div class="mb-3 row">
                             <label for="ContactNumber" class="col-md-2 col-form-label">Contact Number
                                 :</label>
                             <div class="col-md-10">
                                 <input class="form-control" type="tel" id="ContactNumber" value="<?= $client->user_contact ?>" disabled />
                             </div>
                         </div>
                         <div class="mb-3 row">
                             <label for="email" class="col-md-2 col-form-label">Products : </label>
                             <div class="col-md-10">
                                 <select disabled id="choices-multiple-remove-button" multiple>
                                     <?php foreach ($client->product as $value) : ?>
                                         <option selected value="<?= $value[0]->product_id ?>"><?= $value[0]->product_name ?></option>
                                     <?php endforeach ?>
                                 </select>
                             </div>
                         </div>
                         <div class="mb-3 row">
                             <label for="minimum" class="col-md-2 col-form-label">Minimum Investment
                                 Amount</label>
                             <div class="col-md-10">
                                 <input class="form-control" type="number" id="minimum" value="500" disabled />
                             </div>
                         </div>
                         <div class="mb-3 row">
                             <label for="maximum" class="col-md-2 col-form-label">Maximum Investment
                                 Amount</label>
                             <div class="col-md-10">
                                 <input class="form-control" type="number" id="maximum" value="10000" disabled />
                             </div>
                         </div>
                         <br>
                         <br>
                     </div>
                 </div>
             </div>
         </div>
     </div>