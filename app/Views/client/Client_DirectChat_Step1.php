 <!-- Content wrapper -->
 <div class="content-wrapper">
                    <!-- Content -->

                    <div class="container-xxl flex-grow-1 container-p-y">
                        <div style="float: right;">
                            <button type="button" onclick="location.href = '<?php echo base_url(); ?>/public/Client_Rm_List';" class="btn btn-primary">
                                <span class="tf-icons bx bx-arrow-back">
                                </span>&nbsp; Back To Post List
                            </button>
                        </div>
                        <br>
                        <br>
                        <br>
                        <div class="card" style="padding-top: 10px; padding-left: 05px; padding-right: 05px;">
                            <div class="col-xl-10" style="padding-top: 30px; padding-left: 80px; padding-right: 80px;">
                                <!-- HTML5 Inputs -->
                                <div class="card mb-4">
                                    <h5 class="card-header">Select a content topic</h5>
                                    <div class="card-body">
                                        <div class="mb-3 row">
                                            <label for="email" class="col-md-2 col-form-label">Post : </label>
                                            <div class="col-md-10">
                                                <select id="choices-multiple-remove-button"
                                                    placeholder="Select a RM to start chat">
                                                    <?php foreach ($posts as $value) : ?>
                                                    <option value="<?= $value->_id ?>"><?= $value->post_title ?></option>
                                                    <?php endforeach ?>
                                                </select>
                                            </div>
                                        </div>
                                        <br>
                                        <br>
                                        <div style="float: right;">
                                            <button type="button" id="Tostep_2"
                                                class="btn btn-dark">
                                                <span class="tf-icons bx bx-save">
                                                </span>&nbsp; Next
                                            </button>
                                        </div>
                                        <input type="hidden" id='user' value="<?= $userId ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- / Content -->