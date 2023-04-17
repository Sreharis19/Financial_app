<body>

    <!-- Content wrapper -->
    <div class="content-wrapper">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">
            <div style="float: right;">
                <button type="button" onclick="location.href = '<?php echo base_url(); ?>/public/Ma_Rm_Add?';" class="btn btn-primary">
                    <span class="tf-icons bx bxs-message-alt-add">
                    </span>&nbsp; Add New Rm
                </button>
            </div>
            <br>
            <br>
            <br>
            <br>
            <div class="card" style="padding-top: 10px; padding-left: 05px; padding-right: 05px;">
                <table id="datatable" class="table table-striped" style="width:100%;">
                    <thead>
                        <tr>
                            <th>Sl No.</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Products Expertise In</th>
                            <th>Status</th>
                            <th>Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($rms as $key => $rm) : ?>
                            <tr>
                                <td><?= $key + 1 ?></td>
                                <td><?= $rm->first_name ?></td>
                                <td><?= $rm->user_email ?></td>
                                <td><?php foreach ($rm->products as $product) : ?><?= $product->product_name ?>, <br><?php endforeach ?></td>
                                <td><?php if ($rm->user_status == 1) : ?> <?= "Active" ?> <?php else : ?> <?= "Blocked" ?> <?php endif; ?></td>

                                <td>
                                    <div class="btn-group" role="group" aria-label="First group">
                                        <button type="button" onclick="location.href = '<?php echo base_url(); ?>/public/Ma_Rm_View?id=<?= $rm->id ?>';" class="btn btn-outline-secondary">
                                            <i title="view" class='tf-icons bx bx-street-view'></i>
                                        </button>

                                        <button type="button" onclick="location.href = '<?php echo base_url(); ?>/public/Ma_Rm_Edit?id=<?= $rm->id ?>';" class="btn btn-outline-secondary">
                                            <i title="Edit" class='tf-icons bx bx-edit-alt'></i>
                                        </button>

                                        <?php if ($rm->user_status == 1) : ?>
                                            <button type="button" data-bs-toggle="modal" data-id="<?= $rm->id ?>" onclick="passValue(<?= $rm->id ?>)" data-bs-target="#block" class="btn btn-outline-secondary">
                                                <i title="block" class="tf-icons bx bx-check-shield"></i>
                                            </button>
                                        <?php else : ?>
                                            <button type="button" data-bs-toggle="modal" data-id="<?= $rm->id ?>" onclick="passValue(<?= $rm->id ?>)" data-bs-target="#unblock" class="btn btn-outline-secondary">
                                                <i title="unblock" class="tf-icons bx bx-check-shield"></i>
                                            </button>
                                        <?php endif; ?>
                                    </div>
                                </td>

                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
                <!-- Modal -->
                <div class="modal fade" id="block" data-bs-backdrop="static" tabindex="-1">
                    <div class="modal-dialog">
                        <form class="modal-content">
                            <div class="modal-header">
                                <h7 class="modal-title" id="backDropModalTitle">User Management</h7>
                            </div>
                            <hr>
                            <div class="modal-body">
                                <h4 class="modal-title" id="backDropModalTitle">Do yo want to BLOCK this
                                    Account ?</h4>
                            </div>
                            <input type="hidden" id="user_id1">
                            <input type="hidden" value="block" id="type">
                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                    No
                                </button>
                                <button type="button" onclick="BlockUnblock()" id="block" class="btn btn-primary">Yes</button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="unblock" data-bs-backdrop="static" tabindex="-1">
                    <div class="modal-dialog">
                        <form class="modal-content">
                            <div class="modal-header">
                                <h7 class="modal-title" id="backDropModalTitle">User Management</h7>
                            </div>
                            <hr>
                            <div class="modal-body">
                                <h4 class="modal-title" id="backDropModalTitle">Do yo want to UNBLOCK this
                                    Account ?</h4>
                            </div>
                            <input type="hidden" id="user_id">
                            <input type="hidden" value="unblock" id="type">
                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                    No
                                </button>
                                <button type="button" onclick="BlockUnblock()" id="block" class="btn btn-primary">Yes</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>



        <!-- / Content -->


        <!-- / Layout wrapper -->
        <!-- Core JS -->
        <!-- build:js assets/vendor/js/core.js -->


    </div>
</body>