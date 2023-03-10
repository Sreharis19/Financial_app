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
                            <th>Expertise In</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($rmList as $key => $rm) : ?>
                            <tr>
                                <td><?= $key + 1 ?></td>
                                <td><?= $rm->first_name ?></td>
                                <td><?= $rm->user_email ?></td>
                                <td><?php foreach ($rm->products as $product) : ?><?= $product->product_name ?><br><?php endforeach ?></td>
                                <td>
                                    <div title="view" class="btn-group" role="group" aria-label="First group">
                                        <button type="button" onclick="location.href = '<?php echo base_url(); ?>/public/Client_Rm_View?id=<?= $rm->id ?>';" class="btn btn-outline-secondary">
                                            <i title="view" class='tf-icons bx bx-street-view'></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
</body>