<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <div style="float: right;">
            <button type="button" onclick="location.href = '<?php echo base_url(); ?>/public/Cw_Post_List';" class="btn btn-primary">
                <span class="tf-icons bx bx-arrow-back">
                </span>&nbsp; Back To Post's List
            </button>
        </div>
        <br>
        <br>
        <br>
        <form method="post" enctype="multipart/form-data" action="<?php echo base_url(); ?>/public/Edit_Post">
        <div class="card" style="padding-top: 10px; padding-left: 05px; padding-right: 05px;">
            <div class="col-xl-10" style="padding-top: 30px; padding-left: 80px; padding-right: 80px;">
                <!-- HTML5 Inputs -->
                <div class="card mb-4">
                    <h5 class="card-header">Update Post</h5>
                    <div class="card-body">
                        <div class="mb-3 row">
                            <label for="first_name" class="col-md-2 col-form-label">Title :</label>
                            <div class="col-md-07">
                                <input class="form-control" value="<?= $post->post_title ?>" type="text" id="post_title" name="post_title" />
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="email" class="col-md-2 col-form-label">Product : </label>
                            <div class="col-md-07">
                                <select id="choices-multiple-remove-button" name="category" placeholder="Select a product category">
                                    <?php foreach ($select['category'] as $value) : ?>
                                        <?php if ($post->product_id == $value->product_id) : ?>
                                            <option selected value="<?= $value->product_id ?>"><?= $value->product_name ?></option>
                                        <?php else : ?>
                                            <option value="<?= $value->product_id ?>"><?= $value->product_name ?></option>
                                        <?php endif; ?>

                                    <?php endforeach ?>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="email" class="col-md-2 col-form-label">Targeted User's Region : </label>
                            <div class="col-md-07">
                                <select id="choices-multiple-remove-button" name="region" placeholder="Select a product category">
                                    <?php foreach ($select['country'] as $value) : ?>
                                        <?php if ($post->post_region == $value->id) : ?>
                                            <option selected value="<?= $value->id ?>"><?= $value->name ?></option>
                                        <?php else : ?>
                                            <option value="<?= $value->id ?>"><?= $value->name ?></option>
                                        <?php endif; ?>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        </div>

                        <div class="mb-3 row">
                                 <label for="first_name" class="col-md-3 col-form-label">Minimum Investment Amount :</label>
                                 <div class="col-md-06">
                                     <input class="form-control" name="min" value="<?= $post->min_purchase_amount ?>" type="number" id="min" />
                                 </div>
                             </div>

                             <div class="mb-3 row">
                                 <label for="first_name" class="col-md-3 col-form-label">Maximum Investment Amount :</label>
                                 <div class="col-md-06">
                                     <input class="form-control" name="max" value="<?= $post->max_purchase_amount ?>" type="number" id="max" />
                                 </div>
                             </div>

                        <div class="mb-3 row">
                            <label for="pc_image" class="form-label">Content Image :</label>
                            <div class="col-md-6 col-lg-4 mb-3">
                                <div class="card h-100">
                                    <div class="card-body">
                                        <h5 class="card-title">Image Preview</h5>
                                    </div>
                                    <img class="img-fluid" id="image1" name="image1" src="<?php echo base_url(); ?>/public/assets/uploads/post/<?= $post->post_image ?>" alt="Card image cap" />
                                </div>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="pc_image" class="form-label">Content Image :</label>
                            <div class="col-md-07">
                                <input class="form-control" onclick="erasImage()" type="file" id="image" name="image" />
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="pc_image" class="form-label">Content :</label>
                            <div class="col-md-07">
                                <textarea cols="100" id="content" name="content" rows="18"> <?= $post->post_content ?></textarea>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="status" class="col-md-2 col-form-label">Post Status : </label>
                            <div class="col-md-07">
                                <select id="choices-multiple-remove-button" name="status" placeholder="Select Post Status">
                                    <?php if ($post->post_status == 1) : ?>
                                        <option selected value="1">Active</option>
                                        <option value="2">Archived</option>
                                    <?php else : ?>
                                        <option value="1">Active</option>
                                        <option selected value="2">Archived</option>
                                    <?php endif; ?>
                                </select>
                            </div>
                        </div>
                        <input class="form-control" value="<?= $post->_id ?>" type="hidden" id="_id" name="_id" />
                        <br>
                        <br>
                        <div style="float: right;">
                            <button type="submit" class="btn btn-dark">
                                <span class="tf-icons bx bx-save">
                                </span>&nbsp; Update Post
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </form>
    </div>
    <!-- / Content -->