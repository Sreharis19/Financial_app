  <!-- Content wrapper -->
  <div class="content-wrapper">
                    <!-- Content -->

                    <div class="container-xxl flex-grow-1 container-p-y">
                        <div style="float: right;">
                            <button type="button" onclick="location.href = '<?php echo base_url(); ?>/public/Ma_Client_List';" class="btn btn-primary">
                                <span class="tf-icons bx bx-arrow-back">
                                </span>&nbsp; Back To Client List
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
                                    <h5 class="card-header">Edit Client Details</h5>
                                    <div class="card-body">
                                        <div class="mb-3 row">
                                            <label for="first_name" class="col-md-2 col-form-label">First Name :</label>
                                            <div class="col-md-10">
                                                <input class="form-control" type="text" value="<?= $client->first_name ?>" name="first_name" id="first_name"   />
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="last_name" class="col-md-2 col-form-label">Last Name :</label>
                                            <div class="col-md-10">
                                                <input class="form-control" type="text" value="<?= $client->last_name ?>" name="last_name" id="last_name"   />
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="email" class="col-md-2 col-form-label">Email : </label>
                                            <div class="col-md-10">
                                                <input class="form-control" type="email" value="<?= $client->user_email ?>" name="email" id="email"   />
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="ContactNumber" class="col-md-2 col-form-label">Contact Number
                                                :</label>
                                            <div class="col-md-10">
                                                <input class="form-control" type="tel" value="<?= $client->user_contact ?>" name="ContactNumber" id="ContactNumber"  />
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                <label for="category" class="col-md-2 col-form-label">Products : </label>
                                <div class="col-md-10">
                                    <select id="choices-multiple-remove-button" name="category" placeholder="Select a product category" multiple>
                                        <?php foreach ($client->product as $value) : ?>
                                            <?php foreach ($select['category'] as $value1) : ?>
                                                <?php if ($value1->product_id == $value[0]->product_id) : ?>
                                                    <option selected value="<?= $value1->product_id ?>"><?= $value1->product_name ?></option>
                                                <?php else : ?>
                                                    <option value="<?= $value1->product_id ?>"><?= $value1->product_name ?></option>
                                                <?php endif; ?>
                                            <?php endforeach ?>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                            <label for="minimum" class="col-md-2 col-form-label">Minimum Investment
                                                Amount</label>
                                            <div class="col-md-10">
                                                <input class="form-control" type="number" id="minimum"  name="minimum"  value="500"  />
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="maximum" class="col-md-2 col-form-label">Maximum Investment
                                                Amount</label>
                                            <div class="col-md-10">
                                                <input class="form-control" type="number" id="maximum" name="maximum" value="10000"  />
                                            </div>
                                        </div>

                            <div class="form-group row">
                                <label for="region" class="col-sm-2 col-form-label">Country:</label>
                                <div class="col-sm-10">
                                    <select id="choices-multiple-remove-button1" name="region" class="form-control">
                                        <?php foreach ($select['country'] as $value) : ?>
                                            <?php if ($client->user_country == $value->id) : ?>
                                                <option selected value="<?= $value->id ?>"><?= $value->name ?></option>
                                            <?php else : ?>
                                                <option value="<?= $value->id ?>"><?= $value->name ?></option>
                                            <?php endif; ?>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                            </div>
                            <input class="form-control" type="hidden" value="<?= $client->id ?>" name="id" id="id" />
                            <br>
                            <br>
                            <div style="float: right;">
                                <button type="button" id="updateClient" class="btn btn-dark">
                                    <span class="tf-icons bx bx-save">
                                    </span>&nbsp; Update Account
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
