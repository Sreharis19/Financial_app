<body>

    <!-- Content wrapper -->
    <div class="content-wrapper">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">
            <br>
            <br>
            <br>
            <div class="card" style="padding-top: 10px; padding-left: 05px; padding-right: 05px;">
                <table id="datatable" class="table table-striped" style="width:100%;">
                    <thead>
                        <tr>
                            <th>Sl No.</th>
                            <th>Name</th>
                            <th>email</th>
                            <th>Products Opted</th>
                            <th>Status</th>
                            <th>Action</th>
                            <th>Interaction</th>
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
                                    <div title="view" class="btn-group" role="group" aria-label="First group">
                                        <button type="button" onclick="location.href = '<?php echo base_url(); ?>/public/Rm_Client_View?id=<?= $client->id ?>';" class="btn btn-outline-secondary">
                                            <i title="view" class='tf-icons bx bx-street-view'></i>
                                        </button>
                                    </div>
                                </td>
                                <td>
                                    <button title="chat" type="button" class="btn rounded-pill btn-secondary">
                                        <span class="tf-icons bx bxs-chat"></span>&nbsp; Chat
                                    </button>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
                <!-- Modal -->
                <div class="modal fade" id="blockorunblock" data-bs-backdrop="static" tabindex="-1">
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
                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                    No
                                </button>
                                <button type="button" class="btn btn-primary">Yes</button>
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



</body>