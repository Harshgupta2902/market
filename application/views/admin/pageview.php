<!DOCTYPE html>
<html lang="en">

<head>
 <?php $this->load->view('admin/static/header') ?>
</head>

<body class="g-sidenav-show  bg-gray-100">
 <?php $this->load->view('admin/static/sidebar') ?>
   
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">

        <?php $this->load->view('admin/static/nav') ?>
       

        <div class="container-fluid py-4">
            
            <?php $this->load->view('admin/components/page_view') ?>
            <?php $this->load->view('admin/static/footer') ?>

        </div>
    </main>

    <?php $this->load->view('admin/static/script') ?>

</body>

</html>