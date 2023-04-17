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
                            <th>Show Interest</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($productList as $key => $product) : ?>
                            <tr>
                                <td><?= $key + 1 ?></td>
                                <td><?= $product->product_name ?></td>
                                <td><?= $product->category_name ?></td>
                                <td><img src="<?= base_url('public/assets/uploads/product_cat/' . $product->product_image) ?>"></td>
                                <td><?php if ($product->product_status == 1) : ?> <?= "Active" ?> <?php else : ?> <?= "Blocked" ?> <?php endif; ?></td>                    

                                <td>
                                    <div class="container mt-3">
                                        <div class="form-check form-switch">
                                            <label class="form-check-label" for="flexSwitchCheckDefault1"></label>
                                            <input class="form-check-input" type="checkbox" role="switch" onchange="togglechange(<?= $product->product_id ?>, <?= $user ?>)" id="flexSwitchCheckDefault1<?= $product->product_id ?>" <?php if ($product->selected_products == "matched") : ?> value="on" checked <?php else : ?> value="off" <?php endif; ?>>
                                        </div>
                                    </div>
                                </td>
                                <td hidden><?= $product->product_image ?></td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
</body>