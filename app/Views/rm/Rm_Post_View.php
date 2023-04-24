<!-- Content wrapper -->
<div class="content-wrapper">
                    <!-- Content -->

                    <div class="container-xxl flex-grow-1 container-p-y">
                        <div style="float: right;">
                            <button type="button" onclick="location.href = '<?php echo base_url(); ?>/public/Rm_Post_List';" class="btn btn-primary">
                                <span class="tf-icons bx bx-arrow-back">
                                </span>&nbsp; Back To Post's List
                            </button>
                        </div>
                        <br>
                        <br>
                        <br>
                        <div class="card" style="padding-top: 10px; padding-left: 05px; padding-right: 05px;">
                            <div class="col-xl-10" style="padding-top: 30px; padding-left: 80px; padding-right: 80px;">
                                <!-- HTML5 Inputs -->
                                <div class="card mb-4">
                                    <h5 class="card-header">View Post</h5>
                                    <div class="card-body">
                                        <div class="mb-3 row">
                                            <label for="first_name" class="col-md-2 col-form-label">Title :</label>
                                            <div class="col-md-07">
                                                <input disabled class="form-control" value="<?= $post->post_title ?>" type="text" id="first_name" />
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="email" class="col-md-2 col-form-label">Product : </label>
                                            <div class="col-md-07">
                                                <select disabled id="choices-multiple-remove-button"
                                                    placeholder="Select products">
                                                    <option selected value="<?= $post->product_id ?>"><?= $post->product_name ?></option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="pc_image" class="form-label">Content Image :</label>
                                            <div class="col-md-6 col-lg-4 mb-3">
                                                <div class="card h-100">
                                                  <div class="card-body">
                                                    <h5 class="card-title">Image Preview</h5>
                                                  </div>
                                                  <img class="img-fluid" src="<?php echo base_url(); ?>/public/assets/uploads/post/<?= $post->post_image ?>" alt="" />
                                                </div>
                                              </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="pc_image" class="form-label">Content :</label>
                                            <div class="col-md-07">
                                           <textarea disabled cols="100" rows="18"> <?= $post->post_content ?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- / Content -->