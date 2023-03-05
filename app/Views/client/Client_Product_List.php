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
                            <th>Product</th>
                            <th>Product Category</th>
                            <th>Product Image</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($products as $key => $product) : ?>
                            <tr>
                                <td><?= $key + 1 ?></td>
                                <td><?= $product->product_description ?></td>
                                <td><?= $product->product_category_id ?></td>
                                <td><?= $product->product_image ?></td>
                                <td><?php if ($post->post_status == 1) : ?> <?= "Active" ?> <?php else : ?> <?= "Blocked" ?> <?php endif; ?></td>
                                <td>
                                    
                                </td>
                                <!-- <td>
                                    <button title="chat" type="button" class="btn rounded-pill btn-secondary">
                                        <span class="tf-icons bx bxs-chat"></span>&nbsp; Chat
                                    </button>
                                </td> -->
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
</body>