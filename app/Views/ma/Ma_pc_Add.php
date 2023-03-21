<!-- Content wrapper -->
<div class="content-wrapper">
                    <!-- Content -->

                    <div class="container-xxl flex-grow-1 container-p-y">
                        <div style="float: right;">
                            <button type="button" onclick="location.href = '<?php echo base_url(); ?>/public/Ma_pc_List';" class="btn btn-primary">
                                <span class="tf-icons bx bx-arrow-back">
                                </span>&nbsp; Back To Product Category List
                            </button>
                        </div>
                        <br>
                        <br>
                        <br>
                       <div class="card" style="padding-top: 10px; padding-left: 05px; padding-right: 05px;">
                            <div class="col-xl-10" style="padding-top: 30px; padding-left: 80px; padding-right: 80px;">
                                <!-- HTML5 Inputs -->
                                <div class="card mb-4">
                                    <h5 class="card-header">Add Product Category</h5>
                                    <div class="card-body">
                                        <div class="mb-3 row">
                                            <label for="cat_name" class="col-md-2 col-form-label">Category Name :</label>
                                            <div class="col-md-07">
                                                <input class="form-control" type="text" id="cat_name" />
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                             <label for="pc_image" class="form-label">Product Category Image</label>
                                            <div class="col-md-07">
                                            <input class="form-control" type="file" id="pc_image" />
                                            </div>

                                        </div>
                                       
                                        <!-- <div class="mb-3 row">
                                            <label for="email" class="col-md-2 col-form-label">Product Specialised In : </label>
                                            <div class="col-md-10">
                                                <select id="choices-multiple-remove-button"
                                                    placeholder="Select products" multiple>
                                                    <option value="Stocks" onclick="filterSelection('Stocks')">Stocks
                                                    </option>
                                                    <option value="Equity">Equity</option>
                                                    <option value="Bonds">Bonds</option>
                                                    <option value="RA">RA</option>
                                                </select>
                                            </div>
                                        </div> -->
                                       
                                        
                                        <br>
                                        <br>
                                        <div style="float: right;">
                                            <button type="button" onclick="location.href = '<?php echo base_url(); ?>/public/Ma_pc_List';"
                                                class="btn btn-dark">
                                                <span class="tf-icons bx bx-save">
                                                </span>&nbsp; Add Product Category
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
					</div>
                
                    <!-- / Content -->
                    </div>
