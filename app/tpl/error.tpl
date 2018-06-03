<?php $this->layout('_layout', $this->data); ?>

    <h1>Error</h1>

    <p class="errorMsg">
        <?= $err_msg; ?>
    </p>
<?php if (! DEBUG_MODE): ?>
    <p>
        Set <code>DEBUG_MODE</code> (in env.php) to <code>true</code> to see error details.
    </p>
<?php endif; 

    if (DEBUG_MODE && ! MAINTENANCE_MODE):

        $frames = $err_inspector->getFrames();
        $total_frames = count($frames);
?>
    <!-- ERROR DETAILS -->
    <div class="errorDetails">
        <h4><?= $err_type; ?>:</h4>

        <p class="errorMsg">
            <?= $err_file; ?> (on line: <?= $err_line; ?>)
        </p>

        <h4>Backtrace:</h4>

        <ol class="backtrace">
    <?php foreach ($frames as $i => $frame): 
            echo sprintf(
                "<li>[%d]: %s%s%s in %s: %d</li>",
                ($total_frames - $i),
                ($frame->getClass() ?: ''),
                ($frame->getClass() && $frame->getFunction() ? '::' : ''),
                ($frame->getFunction() ? $frame->getFunction() . '()' : ''),
                ($frame->getFile() ?: '<#unknown>'),
                $frame->getLine()
            ); 
    endforeach; ?>
        </ol>

        <h4>Error trace:</h4>

        <div class="errorTrace">
<pre>
<?= print_r($err_trace, true); ?>
</pre>
        </div>
<?php endif; ?>

    </div>
    <!-- / ERROR DETAILS -->