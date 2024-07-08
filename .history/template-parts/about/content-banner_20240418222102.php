<div class="hero-banner">
    <div class="banner-content-about">
        <h2 class="heading-banner">Burgers you can trust</h2>

        <div class="banner-mascot-container">
            <?php
            echo wp_get_attachment_image(231, 'full');
            ?>
        </div>
        <div class="banner-logo-lettermark-container">
            <?php
            echo wp_get_attachment_image(232, 'full');
            ?>
        </div>
    </div>

    <div class="hero-banner-bg">
        <?php
        echo wp_get_attachment_image(233, 'full', array('class' => 'cover-image'));
        ?>
    </div>
</div>