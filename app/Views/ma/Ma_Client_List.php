<body>

    <!-- Content wrapper -->
    <div class="content-wrapper">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">
        <div style="float: right;">
                            <button type="button" onclick="location.href = '<?php echo base_url(); ?>/public/Ma_Client_Add?';" class="btn btn-primary">
                                <span class="tf-icons bx bxs-message-alt-add">
                                </span>&nbsp; Add New Client
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
                            <th>Products Opted</th>
                            <th>Status</th>
                            <th>Action</th>
                        
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($clients as $key => $client) : ?>
                            <tr>
                                <td><?= $key + 1 ?></td>
                                <td><?= $client->first_name ?></td>
                                <td><?= $client->user_email ?></td>
                                <td><?php foreach ($client->products as $product) : ?><?= $product->product_name ?>, <br><?php endforeach ?></td>
                                <td><?php if ($client->user_status == 1) : ?> <?= "Active" ?> <?php else : ?> <?= "Blocked" ?> <?php endif; ?></td>
                                
                                    <td>
                                   
         
                                     <div  class="btn-group" role="group" aria-label="First group">
                                        <button type="button" onclick="location.href = '<?php echo base_url(); ?>/public/Ma_Client_View?id=<?= $client->id ?>';" class="btn btn-outline-secondary">
                                            <i title="view" class='tf-icons bx bx-street-view'></i>
                                        </button>
                                   
                                        <button type="button" onclick="location.href = '<?php echo base_url(); ?>/public/Ma_Client_Edit?id=<?= $client->id ?>';" class="btn btn-outline-secondary">
                                            <i title="Edit" class='tf-icons bx bx-edit-alt'></i>
                                        </button>
                                        <?php if ($client->user_status == 1) : ?>
                                            <button type="button" data-bs-toggle="modal" data-id="<?= $client->id ?>" onclick="passValue(<?= $client->id ?>)" data-bs-target="#block" class="btn btn-outline-secondary">
                                                <i title="block" class="tf-icons bx bx-check-shield"></i>
                                            </button>
                                        <?php else : ?>
                                            <button type="button" data-bs-toggle="modal" data-id="<?= $client->id ?>" onclick="passValue(<?= $client->id ?>)" data-bs-target="#unblock" class="btn btn-outline-secondary">
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
                                <h4 class="modal-title" id="backDropModalTitle">Do yo want to block this
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
                                <button type="button" onclick="BlockUnblock()" id="unblock" class="btn btn-primary">Yes</button>
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