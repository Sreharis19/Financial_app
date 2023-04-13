<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <div style="float:inline-start;">
        <h6 style="color: red;">Chat Auto Reloads In :</h6> <h6 style="color: red;" id="countdown"></h6>
    </div>
    <div style="float: left;">
            <button type="button" onclick="window.location.reload();" class="btn btn-secondary">
                <span class="tf-icons bx bx-reset">
                </span>&nbsp; Force Reload
            </button>
        </div>
        <div style="float: right;">
            <button type="button" onclick="location.href = '<?php echo base_url(); ?>/public/Rm_Client_List';" class="btn btn-primary">
                <span class="tf-icons bx bx-arrow-back">
                </span>&nbsp; Back To Post List
            </button>
        </div>
        <section class="msger">
            <header class="msger-header">
                <div class="msger-header-title">
                    <i class="fas fa-comment-alt"></i><h5> <?= $client->first_name . ' ' . $client->last_name ?> </h5>
                </div>
                <div class="msger-header-options">
                    <span><i class="fas fa-cog"></i></span>
                </div>
            </header>

            <main class="msger-chat">
                <?php foreach ($chats as $key => $chat) : ?>
                    <?php if ($chat->send_by == $rm_id) : ?>
                        <div class="msg right-msg">
                        <?php else : ?>
                            <div class="msg left-msg">
                            <?php endif; ?>
                            <div class="msg-img" style="background-image: url(<?php echo base_url(); ?>/<?= $otherUser_image ?>)"></div>
                            <div class="msg-bubble">
                                <div class="msg-info">
                                    <div class="msg-info-name">
                                        <?php if ($chat->send_by == $rm_id) : ?>
                                            Me
                                        <?php else : ?>
                                            <?= $client->first_name . ' ' . $client->last_name .' (Client)' ?>
                                        <?php endif; ?>
                                    </div>
                                    <div class="msg-info-time"><?= $chat->created_date ?></div>
                                </div>

                                <div class="msg-text">
                                <?= $chat->message ?>
                                </div>
                            </div>
                            </div>
                        <?php endforeach ?>
                        <input type="hidden" id="rmid" value="<?= $rm_id ?>"/>
                        <input type="hidden" id="user_image" value="<?= $user_image ?>"/>
                        <input type="hidden" id="clientid" value="<?= $client->id ?>"/>
                        <input type="hidden" id="postid" value="<?= $cw_post_id ?>"/>
            </main>

            <form class="msger-inputarea">
                <input type="text" class="msger-input" placeholder="Enter your message...">
                <button type="submit" class="msger-send-btn">Send</button>
            </form>
        </section>
    </div>
</div>