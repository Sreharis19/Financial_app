<body>

    <!-- Content wrapper -->
    <div class="content-wrapper">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">
        <div style="float: right;">
                            <button type="button" onclick="location.href = '<?php echo base_url(); ?>/public/Ma_pc_Add?';" class="btn btn-primary">
                                <span class="tf-icons bx bxs-message-alt-add">
                                </span>&nbsp; Add New Product Category
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
                            <th>Category Name</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($productcategory as $key => $productcategory) : ?>
                            <tr>
                                <td><?= $key + 1 ?></td>
                                <td><?= $productcategory->category_name ?></td>
                               
                                <td><?php if ($productcategory->category_status == 1) : ?> <?= "Active" ?> <?php else : ?> <?= "Archived" ?> <?php endif; ?></td>
                                
                                    <td>
                                   
         
                                     <div  class="btn-group" role="group" aria-label="First group">
                                       
                                        <button type="button" onclick="location.href = '<?php echo base_url(); ?>/public/Ma_pc_Edit?id=<?= $productcategory->category_id ?>';" class="btn btn-outline-secondary">
                                            <i title="Edit" class='tf-icons bx bx-edit-alt'></i>
                                        </button>

                                        <button type="button" data-bs-toggle="modal" data-bs-target="#blockorunblock" class="btn btn-outline-secondary">
                                            <i title="block" class="tf-icons bx bx-check-shield"></i>
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
                                <h7 class="modal-title" id="backDropModalTitle">Inventory Management</h7>
                            </div>
                            <hr>
                            <div class="modal-body">
                                <h4 class="modal-title" id="backDropModalTitle">Do yo want to archive this product Category ?</h4>
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