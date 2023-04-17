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
                        <th>Message</th>
                        <th>Reply</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($lists as $key => $list) : ?>
                        <tr>
                            <td><?= $key + 1 ?></td>
                            <td><?= $list->comments ?></td>
                            <td><?= $list->admin_reply ?></td>
                            <td>
                                <?php if (!($list->admin_reply)) : ?>
                                    <div title="delete" class="btn-group" role="group" aria-label="First group">
                                        <button type="button"  data-bs-toggle="modal" data-bs-target="#blockorunblock" onclick="PassSupportValue('<?= $list->id ?>','<?= $list->comments ?>')" class="btn btn-outline-secondary">
                                            <i title="reply" class="tf-icons bx bx-reply"></i>
                                        </button>
                                    </div>
                                <?php endif; ?>
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
                            <h5 class="modal-title" id="modalCenterTitle">Raise Ticket</h5>
                        </div>
                        <hr>
                        <div class="modal-body">
                            <h7 class="modal-title" id="backDropModalTitle">Message</h7>
                            <br>
                            <textarea cols="55" disabled id="message" rows="08"></textarea>
                        </div>
                        <div class="modal-body">
                            <h7 class="modal-title" id="backDropModalTitle">Reply</h7>
                            <br>
                            <textarea cols="55" id="reply" rows="18"></textarea>
                        </div>
                        <input id="postid" type="hidden" />
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                Discard
                            </button>
                            <button type="button" id="send_supportForMa" class="btn btn-primary">Send</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>

    <!-- / Content -->