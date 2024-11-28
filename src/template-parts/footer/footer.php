<footer class="footer">
    <div class="footer__row">
        <div class="footer__container container">
            <div class="footer__content">
                <div class="grid-2">
                    <div class="text-block">
                        <p>
                            All rights reserved <?= date("Y") ?> ©
                        </p>
                        <p>
                            "Writingor"<br>🏠 Novi Sad, Serbia
                        </p>
                    </div>
                    <div class="text-block">
                    </div>
                    <div class="text-block">
                        <a href="/" class="text-s">
                            Design & Development by WRITINGOR 2023
                        </a>
                        <p class="text-s">
                            Icons by <a href="https://icons8.com/" target="_blank" rel="noreferrer noopener">icons8</a> 
                            and <a href="https://www.svgrepo.com/" target="_blank" rel="noreferrer noopener">svgrepo</a>
                            ♡ 
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

<!-- contact-modal -->
<div class="--writingor-modal contact-modal" id="contact-modal">
    <div class="contact-modal__header">
        <div class="contact-modal__title title-3 _centered">
            It's simple!
        </div>
    </div>
    <?php writingor_part('form/form') ?>
</div>
<!--/ contact-modal -->

<!-- info-modal -->
<div class="--writingor-modal info-modal" id="thankyou-modal" data-modal-autohide-time="3000">
    <div class="info-modal__title title-2 _centered">
        💪 Great move! 
    </div>
    <div class="info-modal__text _centered">
        Now it's my turn.
    </div>
    <div class="info-modal__text _centered">
        Will see!
    </div>
</div>
<!--/ info-modal -->
