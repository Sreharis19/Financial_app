<body>

    <!-- Content wrapper -->
    <div class="content-wrapper">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">
            <div style="float: right;">
                <button type="button" onclick="location.href = '<?php echo base_url(); ?>/public/Ma_Product_Add?';" class="btn btn-primary">
                    <span class="tf-icons bx bxs-message-alt-add">
                    </span>&nbsp; Add New Product
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
                            <th>Product Name</th>
                            <th>Product Amount</th>
                            <th>Product Maximum Amount</th>
                            <th>Product Description</th>
                            <th>Product Benifits</th>
                            <th>Product Category Name</th>
                            <th>Status</th>
                            <th>Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($products as $key => $product) : ?>
                            <tr>
                                <td><?= $key + 1 ?></td>
                                <td><?= $product->product_name ?></td>
                                <td><?= $product->product_amount ?></td>
                                <td><?= $product->product_max_quantity ?></td>
                                <td><?= $product->product_description ?></td>
                                <td><?= $product->product_benefits ?></td>
                                <td><?= $product->category_name ?></td>
                                <td><?php if ($product->product_status == 1) : ?> <?= "Active" ?> <?php else : ?> <?= "Archived" ?> <?php endif; ?></td>

                                <td>


                                    <div class="btn-group" role="group" aria-label="First group">
                                        <button type="button" onclick="location.href = '<?php echo base_url(); ?>/public/Ma_Product_View?id=<?= $product->product_id ?>';" class="btn btn-outline-secondary">
                                            <i title="view" class='tf-icons bx bx-street-view'></i>
                                        </button>

                                        <button type="button" onclick="location.href = '<?php echo base_url(); ?>/public/Ma_Product_Edit?id=<?= $product->product_id ?>';" class="btn btn-outline-secondary">
                                            <i title="Edit" class='tf-icons bx bx-edit-alt'></i>
                                        </button>
                                    </div>
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
                                <h4 class="modal-title" id="backDropModalTitle">Do yo want to Archive this
                                    Product ?</h4>
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


    </div>
</body>