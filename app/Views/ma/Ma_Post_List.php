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
                            <th>title</th>
                            <th>Content</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($posts as $key => $post) : ?>
                            <tr>
                                <td><?= $key + 1 ?></td>
                                <td><?= $post->post_title ?></td>
                                <td><?= $post->post_content ?></td>
                                <td><?php if ($post->post_status == 1) : ?> <?= "Active" ?> <?php else : ?> <?= "Blocked" ?> <?php endif; ?></td>
                                <td>
                                    <?php if ($post->post_status == 1) : ?>
                                        <div title="View" class="btn-group" role="group" aria-label="First group">
                                            <button type="button" onclick="BlockPost(<?= $post->_id ?>)" class="btn btn-outline-secondary">
                                                <i title="block" class="tf-icons bx bx-check-shield"></i>
                                            </button>
                                        </div>
                                    <?php else : ?>
                                        <div title="View" class="btn-group" role="group" aria-label="First group">
                                            <button type="button" onclick="UnBlockPost(<?= $post->_id ?>)" class="btn btn-outline-secondary">
                                                <i title="block" class="tf-icons bx bx-check-shield"></i>
                                            </button>
                                        </div>
                                    <?php endif; ?>

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