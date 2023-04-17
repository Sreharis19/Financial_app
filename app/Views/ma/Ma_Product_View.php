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
        <div class="card" style="padding-top: 10px; padding-left: 05px; padding-right: 05px;">
            <div class="col-xl-10" style="padding-top: 30px; padding-left: 80px; padding-right: 80px;">
                <!-- HTML5 Inputs -->
                <div class="card mb-4">
                    <h5 class="card-header">View Product</h5>
                    <div class="card-body">
                        <div class="mb-3 row">
                            <label for="first_name" class="col-md-2 col-form-label">Product Name :</label>
                            <div class="col-md-07">
                                <input disabled class="form-control" value="<?= $product->product_name ?>" type="text" id="first_name" />
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="email" class="col-md-2 col-form-label">Product Category: </label>
                            <div class="col-md-07">
                                <select disabled id="choices-multiple-remove-button" placeholder="Select products">
                                    <option selected value="<?= $product->category_id ?>"><?= $product->category_name ?></option>
                                </select>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="product_amount" class="col-md-3 col-form-label"> Amount :</label>
                            <div class="col-md-06">
                                <input class="form-control" name="product_amount" value="<?= $product->product_amount ?>" type="number" id="product_amount" />
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="product_max_quantity" class="col-md-3 col-form-label">Quantity :</label>
                            <div class="col-md-06">
                                <input class="form-control" name="product_max_quantity" value="<?= $product->product_max_quantity ?>" type="number" id="product_max_quantity" />
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="product_description" class="form-label">Description :</label>
                            <div class="col-md-07">
                                <textarea cols="100" id="product_description" value="<?= $product->product_description ?>" name="product_description" rows="18"><?= $product->product_description ?></textarea>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="product_benefits" class="form-label">Benifits :</label>
                            <div class="col-md-07">
                                <textarea cols="100" id="product_benefits" value="" name="product_benefits" rows="18"><?= $product->product_benefits ?></textarea>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="pc_image" class="form-label">Content Image :</label>
                            <div class="col-md-6 col-lg-4 mb-3">
                                <div class="card h-100">
                                    <div class="card-body">
                                        <h5 class="card-title">Image Preview</h5>
                                    </div>
                                    <img class="img-fluid" src="<?php echo base_url(); ?>/public/assets/uploads/product_cat/<?= $product->product_image ?>" alt="" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- / Content -->