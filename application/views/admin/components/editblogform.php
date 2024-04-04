<section class="py-4">
  <div class="container">
    <div class="card-header pb-4">
        <div class="d-lg-flex">
            <div class="col-6">
                <h1 class="mb-0 h2">Edit post</h1>
            </div>
            <div class="ms-auto my-auto mt-lg-0 mt-4">
                <div class="ms-auto my-auto">
                    <a href="https://ixora.narrato.io/cws/43232/project/71636/folder/105438" target="_blank" class="btn bg-gradient-primary btn-sm mb-0" >&nbsp; Write Here</a>
                </div>
            </div>
        </div>
    </div>
    
    <div class="row">
      <div class="col-12">
        <div class="card border">
          <div class="card-body">
            <form action='<?= base_url('update') ?>' enctype="multipart/form-data" method='POST'>
            <input type="hidden" name="blog_id" value="<?=$blog['id']?>">

              <div class="row">
                <div class="col-12">
                  <div class="mb-3">
                    <label class="form-label">Post name</label>
                    <input required name="post_name" type="text" class="form-control" value="<?= $blog['title'] ?>">
                  </div>
                </div>
                <div class="col-12">
                  <div class="mb-3">
                    <label class="form-label">Short description </label>

                      <textarea required name="short_description" class="form-control"
                        rows="3"><?= $blog['description'] ?></textarea>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="mb-3">
                    <label class="form-label">Post body</label>
                    <textarea name="description" id="mytextarea"> <?= $blog['blog'] ?></textarea>
                  </div>
                </div>
                </div>
                <div class="col-12 mt-4">
                    <div class="mb-3">
                      <!-- Image -->
                      <div class="row align-items-center mb-2">
                        <div class="col-4 col-md-2">
                          <div class="position-relative">
                            <img src="<?= $blog['image'] ?>" alt="Selected Image" id="image-preview"
                              style="max-width: 100%; height: auto;">
                            <div class="position-absolute top-0 end-0 mt-n2 me-n2">
                              <a class="btn btn-icon btn-xs btn-danger" href="#"><i class="bi bi-x"></i></a>
                            </div>
                          </div>
                        </div>
                        <div class="col-sm-8 col-md-10 position-relative">
                          <h6 class="my-2">Edit blog image</h6>
                          <label class="w-100" style="cursor:pointer;">
                            <span>
                              <input class="form-control stretched-link" type="file" name="image" id="my-image"
                                accept="image/gif, image/jpeg, image/png" value="<?= $blog['image'] ?>">
                            </span>
                          </label>
                        </div>
                      </div>
                    </div>
                  </div>
                  <script>
                    document.addEventListener('DOMContentLoaded', function () {
                      const imageInput = document.getElementById('my-image');
                      const imagePreview = document.getElementById('image-preview');

                      imageInput.addEventListener('change', function (event) {
                        const file = event.target.files[0];
                        const reader = new FileReader();

                        reader.onload = function (e) {
                          imagePreview.src = e.target.result;
                        };

                        if (file) {
                          reader.readAsDataURL(file);
                        } else {
                          imagePreview.src = ''; // Reset image preview if no file selected
                        }
                      });
                    });
                  </script>
                <div class="col-12">
                  <!-- Post name -->
                  <div class="mb-3">
                    <label class="form-label">Image Alt Keyword</label>
                    <input required name="alt_keyword" type="text" class="form-control" value="<?= $blog['alt_keyword'] ?>">
                  </div>
                </div>
                <div class="col-lg-7">
                  <!-- Tags -->
                  <div class="mb-3">
                    <label class="form-label">Tags</label>
                    <textarea name="tags" class="form-control" rows="1" > <?= $blog['tags'] ?></textarea>
                  </div>
                </div>
                <div class="col-lg-5">
                  <!-- Message -->
                  <div class="mb-3">
                    <label class="form-label">Category</label>
                    <select class="form-select" name="category" aria-label="Default select example">
                      <option selected>IPO's</option>
                      <option value="Cryptocurrencies">Cryptocurrencies</option>
                      <option value="Investments">Investments</option>
                      <option value="Regulations">Regulations</option>
                      <option value="Market">Market</option>
                      <option value="Technology">Technology</option>
                    </select>
                  </div>
                </div>

                <div class="col-6">
                  <div class="mb-3">
                    <label class="form-label">Meta title</label>
                    <input required name="meta_title" type="text" class="form-control" value="<?= $blog['meta_title'] ?>">
                  </div>
                </div>
                <div class="col-6">
                  <!-- Post name -->
                  <div class="mb-3">
                    <label class="form-label">Robots</label>

                    <select class="form-select" name="robots" aria-label="Default Robots">
                      <option value="noindex, nofollow">noindex, nofollow</option>
                      <option value="nofollow, index">nofollow, index</option>
                      <option value="noindex, follow">noindex, follow</option>
                      <option selected value="index, follow">index, follow</option>
                    </select>
                  </div>
                </div>
                <div class="row">
                  <div class="col-12 mb-3">
                    <label class="form-label">Meta Description</label>
                    <textarea type="text" class="form-control" name="meta_description"> <?= isset($blog['meta_description']) ? $blog['meta_description'] : '' ?></textarea>
                  </div>
                </div>
  
  
                <div class="row">
                  <div class="col-12 mb-3">
                    <label class="form-label">Meta Keywords</label>
                    <textarea type="text" class="form-control" name="meta_keywords"> <?= isset($blog['meta_keywords']) ? $blog['meta_keywords'] : '' ?></textarea>
                  </div>
                </div>
                <!-- Crate post button -->
                  <div class="col-md-12 text-start">
                    <button class="btn btn-primary" type="submit">Save change</button>
                    <button class="btn btn-danger" type="delete">Delete post</button>
                  </div>
              </div>
         
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>