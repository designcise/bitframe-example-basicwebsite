<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title><?= "{$page_title_prefix}{$page_title}{$page_title_suffix}"; ?></title>
        
        <base href="<?= BASE_URL; ?>" />
        
        <link rel="stylesheet" type="text/css" href="static/css/style.css" />
<?php foreach ($css as $file): ?>
        <link rel="stylesheet" type="text/css" href="static/css/<?= $file; ?>" />
<?php endforeach; ?>
        
<?php foreach ($js as $file): ?>
        <script type="text/javascript" src="static/js/<?= $file; ?>"></script>
<?php endforeach; ?>
    </head>
    
    <body<?= (MAINTENANCE_MODE) ? ' class="maintenance"' : ''; ?>>
        <!-- LAYOUT -->
        <div id="layout">

<?php if (! MAINTENANCE_MODE): ?>
            <!-- HEADER -->
            <header>
                <?= $this->insert('component::main-nav'); ?>
            </header>
            <!-- / HEADER -->
<?php endif; ?>

            <!-- BODY -->
            <section id="body" class="gridWrapper">
<?php if (! $is_error && ! MAINTENANCE_MODE): ?>
                <h2>From Parent Template</h2>

                <p>
                    This is a barebones example of how a website could be made with BitFrame. This text is imported from the main layout template (which is synonymous across all templates to give them the same look and feel).
                </p>
<?php endif; ?>
            
                <?= $this->section('content'); ?>

            </section>
            <!-- / BODY -->
        
        </div>
        <!-- / LAYOUT -->
    </body>
</html>
