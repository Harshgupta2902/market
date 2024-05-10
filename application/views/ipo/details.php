<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://softivus.com/coinx/main/assets/css/style.min.css">
    <?php $this->load->view('components/head')?>
</head>

<body id="dark">
    <?php $this->load->view('components/navbar')?>


    <section class="cyber_arena pt-120 pb-120">
        <div class="container pt-17 pt-sm-20 pt-lg-0">
            <div class="row ">
                <div class="col-12">
                    <div
                        class="cyber_arena__tophead d-flex align-items-center justify-content-between flex-wrap gap-4 mb-10 mb-md-15 wow fadeInUp">
                        <div class="cyber_arena__tphead d-flex align-items-center gap-3 flex-wrap">
                            <div class="cyber_arena__tphead-itemone d-flex align-items-center gap-3 gap-sm-6 flex-wrap">
                                <a href="javascript:void(0)" class="cyber_arena__tphead-name">
                                    <h2>
                                        <?= $response->companyName ?>
                                    </h2>
                                </a>
                            </div>
                            <div class="cyber_arena__tphead-itemtwo d-flex align-items-center gap-3">
                                <button type="button" class="px-5 py-2 fs-four bg1-color rounded-1">
                                    <?= $response->date ?>
                                </button>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

 <?php foreach (json_decode($response->lists) as $lists) { ?>
                        <div class="rounded-20 br2  px-sm-6 px-md-8 pt-3 pt-sm-6 pt-md-8 pb-0 pb-md-3 mb-4">
                            <div class="pricing_plan__expert wow fadeInUp">
                                <span class="fs-four p1-color fw-bold mb-md-6">
                                    <?= $lists->heading ?>
                                </span>

                                <div class="pricing_plan__cards-befit">
                                    <ul class="d-flex flex-column gap-4">
                                        <?php foreach ($lists->items as $items) { ?>
                                        <li class="d-flex align-items-center gap-3">
                                            <span class="bg1-color px-1 rounded-item">
                                                <i class="ti ti-check p1-color"></i>
                                            </span>
                                            <p style="margin-bottom: 0px;">
                                                <?= $items?>
                                            </p>
                                        </li>
                                        <?php } ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
<div class="row gy-5 gy-sm-6 mb-10 mb-md-15">
                        <h3 class="cyber_arena__tstyle wow fadeInUp">IPO Details</h3>
                        <?php foreach (json_decode($response->tables) as $tables) { ?>
                            <div class="col-md-8 col-xl-9">
                                <div class="cyber_arena__totalcard p-6 p-md-8 br2 bg1-color rounded-20 h-100">
                                    <?php if (!empty($tables->name)) { ?>
                                    <div
                                        class="d-flex align-items-center justify-content-between mb-6 mb-md-8 gap-4 flex-wrap flex-sm-nowrap">
                                        <div class="cyber_arena__totalcard-title">
                                            <span class="fs-four p1-color fw-bold">
                                                <?= $tables->name ?>
                                            </span>
                                        </div>
                                    </div>
                                    <?php } ?>

                                    <div class="cyber_arena__table wow fadeInUp">
                                        <table class="table">
                                            <?= $tables->data?>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
            <!-- <div class="row">
                <div class="col-lg-6">
                   
                </div>
                <div class="col-lg-6">
                    

                </div>
            </div> -->



        </div>
    </section>


    <?php $this->load->view('components/footer')?>
    <?php $this->load->view('components/script')?>
</body>

</html>