<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->
    
    <div class="container-xxl flex-grow-1 container-p-y">
    <div style="float: right;">
        <button type="button" data-bs-toggle="modal" data-bs-target="#blockorunblock" class="btn btn-primary">
            <span class="tf-icons bx bx-reply">
            </span>&nbsp; Raise New Ticket
        </button>
    </div>
        <br>
        <br>
        <br>
        <div class="card" style="padding-top: 10px; padding-left: 05px; padding-right: 05px;">
            <table id="datatable" class="table table-striped" style="width:100%;">
                <thead>
                    <tr>
                        <th>Sl No.</th>
                        <th>Message</th>
                        <th>Admin Reply</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($userDetails as $key => $userDetail) : ?>
                        <tr>
                            <td><?= $key + 1 ?></td>
                            <td><?= $userDetail->comments ?></td>
                            <td><?= $userDetail->admin_reply ?></td>
                            <td>
                                <div title="delete" class="btn-group" role="group" aria-label="First group">
                                    <button type="button" onclick="deleteTicket('<?= $userDetail->id ?>')" class="btn btn-outline-secondary">
                                        <i title="delete" class="tf-icons bx bxs-message-alt-x"></i>
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
                            <h5 class="modal-title" id="modalCenterTitle">Raise Ticket</h5>
                        </div>
                        <hr>

                        <div class="modal-body">
                            <h7 class="modal-title" id="backDropModalTitle">Your Message</h7>
                            <br>
                            <textarea cols="55" id="message" rows="18"></textarea>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                Discard
                            </button>
                            <button type="button" id="send_support" class="btn btn-primary">Send</button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="modal fade" id="delete" data-bs-backdrop="static" tabindex="-1">
                <div class="modal-dialog">
                    <form class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalCenterTitle">Delete ?</h5>
                        </div>
                        <hr>

                        <div class="modal-body">
                            <h7 class="modal-title" id="backDropModalTitle">Do you want to delete this message !</h7>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                No
                            </button>
                            <button type="button" id="delete_support" class="btn btn-primary">Yes</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>

    <!-- / Content -->