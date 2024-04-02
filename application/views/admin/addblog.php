<!DOCTYPE html>
<html lang="en">

<head>
 <?php $this->load->view('admin/static/header') ?>
 <script src="https://cdn.tiny.cloud/1/c1gvghf9a50nhfs4r15amqmkra3k2nynjejiovp81x7e0g03/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
      tinymce.init({
        selector: '#mytextarea'
      });
    </script>
</head>

<body class="g-sidenav-show  bg-gray-100">
 <?php $this->load->view('admin/static/sidebar') ?>
   
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">

        <?php $this->load->view('admin/static/nav') ?>
       

        <div class="container-fluid py-4">
            
            <?php $this->load->view('admin/components/addblogsform') ?>
            <?php $this->load->view('admin/static/footer') ?>

        </div>
    </main>

    <?php $this->load->view('admin/static/script') ?>

</body>

</html>