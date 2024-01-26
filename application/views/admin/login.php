
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <link rel="apple-touch-icon" sizes="76x76" href="<?= base_url('assets/admin/img/apple-icon.png') ?>" />
  <link rel="icon" type="image/png" href="<?= base_url('assets/admin/img/favicon.png') ?>" />
  <title>Soft UI Dashboard PRO by Creative Tim</title>

  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />

  <link href="<?= base_url('assets/admin/css/nucleo-icons.css') ?>" rel="stylesheet" />
  <link href="<?= base_url('assets/admin/css/nucleo-svg.css') ?>" rel="stylesheet" />

  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="<?= base_url('assets/admin/css/nucleo-svg.css') ?>" rel="stylesheet" />

  <link id="pagestyle" href="<?= base_url('assets/admin/css/soft-ui-dashboard.min.css?v=1.1.0') ?>" rel="stylesheet" />
</head>

<body class>
  <main class="main-content  mt-0">
    <section>
      <div class="page-header min-vh-100">
        <div class="container">
          <div class="row">
            <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column mx-lg-0 mx-auto">
              <div class="card card-plain">
                <div class="card-header pb-0 text-start">
                  <h4 class="font-weight-bolder">Sign In</h4>
                  <p class="mb-0">Enter your email and password to sign in</p>
                </div>
                <div class="card-body">
                  <?php echo form_open(base_url('process_login')); ?>
                    <div class="mb-3">
                        <?php echo form_input(['name' => 'email', 'class' => 'form-control form-control-lg', 'placeholder' => 'Email', 'aria-label' => 'Email', 'required' => 'required']); ?>
                    </div>
                    <div class="mb-3">
                        <?php echo form_password(['name' => 'password', 'class' => 'form-control form-control-lg', 'placeholder' => 'Password', 'aria-label' => 'Password', 'required' => 'required']); ?>
                    </div>
                    <div class="text-center">
                        <?php echo form_submit(['class' => 'btn btn-lg bg-gradient-primary btn-lg w-100 mt-4 mb-0', 'value' => 'Sign in']); ?>
                    </div>
                  <?php echo form_close(); ?>

                  <?php if (isset($error)) : ?>
                      <p class="text-danger mt-3"><?= $error ?></p>
                  <?php endif; ?>
                </div>
               
              </div>
            </div>
            <div
              class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 end-0 text-center justify-content-center flex-column">
              <div
                class="position-relative bg-gradient-primary h-100 m-3 px-7 border-radius-lg d-flex flex-column justify-content-center">
                <img src="<?= base_url('assets/admin/img/shapes/pattern-lines.svg') ?>" alt="pattern-lines"
                  class="position-absolute opacity-4 start-0" />
                <div class="position-relative">
                  <img class="max-width-500 w-100 position-relative z-index-2"
                    src="<?= base_url('assets/admin/img/illustrations/chat.png') ?>" alt="chat-img" />
                </div>
                <h4 class="mt-5 text-white font-weight-bolder">
                  "Attention is the new currency"
                </h4>
                <p class="text-white">
                  The more effortless the writing looks, the more effort the
                  writer actually put into the process.
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>

</body>

</html>