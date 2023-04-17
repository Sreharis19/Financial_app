 <!-- Content wrapper -->
 <div class="content-wrapper">
     <!-- Content -->

     <div class="container-xxl flex-grow-1 container-p-y">
         <div style="float: right;">
             <button type="button" onclick="location.href = '<?php echo base_url(); ?>/public/Ma_Product_List';" class="btn btn-primary">
                 <span class="tf-icons bx bx-arrow-back">
                 </span>&nbsp; Back To Product List
             </button>
         </div>
         <br>
         <br>
         <br>
         <form method="post" enctype="multipart/form-data" action="<?php echo base_url(); ?>/public/AddData">
             <div class="card" style="padding-top: 10px; padding-left: 05px; padding-right: 05px;">
                 <div class="col-xl-10" style="padding-top: 30px; padding-left: 80px; padding-right: 80px;">
                     <!-- HTML5 Inputs -->
                     <div class="card mb-4">
                         <h5 class="card-header">Add Post</h5>
                         <div class="card-body">
                             <div class="mb-3 row">
                                 <label for="product_name" class="col-md-2 col-form-label">Product Name :</label>
                                 <div class="col-md-07">
                                     <input class="form-control" type="text" id="product_name" name="product_name" />
                                 </div>
                             </div>

                             <div class="mb-3 row">
                                 <label for="email" class="col-md-2 col-form-label">Product Category : </label>
                                 <div class="col-md-07">
                                     <select id="choices-multiple-remove-button" name="category" placeholder="Select a product category">
                                         <?php foreach ($category as $value) : ?>
                                             <option value="<?= $value->category_id ?>"><?= $value->category_name ?></option>
                                         <?php endforeach ?>
                                     </select>
                                 </div>
                             </div>

                             <div class="mb-3 row">
                                 <label for="product_amount" class="col-md-3 col-form-label"> Amount :</label>
                                 <div class="col-md-06">
                                     <input class="form-control" name="product_amount" type="number" id="product_amount" />
                                 </div>
                             </div>

                             <div class="mb-3 row">
                                 <label for="product_max_quantity" class="col-md-3 col-form-label">Quantity :</label>
                                 <div class="col-md-06">
                                     <input class="form-control" name="product_max_quantity" type="number" id="product_max_quantity" />
                                 </div>
                             </div>

                             <div class="mb-3 row">
                                 <label for="pc_image" class="form-label">Product Image :</label>
                                 <div class="col-md-07">
                                     <input class="form-control" required="true" type="file" id="image" name="image" />
                                 </div>
                             </div>
                             <div class="mb-3 row">
                                 <label for="product_description" class="form-label">Description :</label>
                                 <div class="col-md-07">
                                     <textarea cols="100" id="product_description" name="product_description" rows="18"></textarea>
                                 </div>
                             </div>
                             <div class="mb-3 row">
                                 <label for="product_benefits" class="form-label">Benifits :</label>
                                 <div class="col-md-07">
                                     <textarea cols="100" id="product_benefits" name="product_benefits" rows="18"></textarea>
                                 </div>
                             </div>
                             <br>
                             <br>
                             <div style="float: right;">
                                 <button type="submit" class="btn btn-dark">
                                     <span class="tf-icons bx bx-save">
                                     </span>&nbsp; Create Product
                                 </button>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </form>
     </div>
     <!-- / Content -->