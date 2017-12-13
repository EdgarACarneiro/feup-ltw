<?php
include_once('includes/messages.php');

if (areMessagesSet()) { ?>
    <section id="messages">
        <?php $errors = getErrorMessages();foreach ($errors as $error) { ?>
            <article class="error">
                <p><?=$error?></p>
            </article>
        <?php } ?>
        <?php $successes = getSuccessMessages();foreach ($successes as $success) { ?>
            <article class="success">
                <p><?=$success?></p>
            </article>
        <?php } clearMessages(); ?>
    </section>
<?php } ?>
