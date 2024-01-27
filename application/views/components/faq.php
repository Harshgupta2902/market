
<!-- FAQ 3 - Bootstrap Brain Component -->
<section class="bsb-faq-3 py-3 py-md-5 py-xl-8" style="margin-top: 20rem;">
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-12 col-md-10 col-lg-8 col-xl-7 col-xxl-6">
                <h2 class="mb-4 display-5 text-center" style="color: white">Frequently Asked Questions</h2>
                <hr class="w-50 mx-auto mb-5 mb-xl-9 border-dark-subtle">
                <h4 class="mb-4 display-5 text-center" style="color: white"><?= $faqTitle ?></h4>
            </div>
        </div>
    </div>


    <!-- FAQs: My Account --> 
    <div class="mb-8">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-11 col-xl-10">
                    <div class="accordion accordion-flush" id="faqAccount">
                        <?php foreach ($faq as $index => $faq): ?>
                            <div class="accordion-item bg-transparent border-top border-bottom py-3">
                                <h2 class="accordion-header" id="faqAccountHeading<?= $index + 1 ?>">
                                    <button class="accordion-button collapsed bg-transparent fw-bold shadow-none link-primary"
                                            type="button" data-bs-toggle="collapse"
                                            data-bs-target="#faqAccountCollapse<?= $index + 1 ?>" aria-expanded="false"
                                            aria-controls="faqAccountCollapse<?= $index + 1 ?>">
                                        <?= $faq['question'] ?>
                                    </button>
                                </h2>
                                <div id="faqAccountCollapse<?= $index + 1 ?>"
                                     class="accordion-collapse collapse"
                                     aria-labelledby="faqAccountHeading<?= $index + 1 ?>">
                                    <div class="accordion-body">
                                        <p><?= $faq['answer'] ?></p>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
