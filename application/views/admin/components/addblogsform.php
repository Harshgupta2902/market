<section class="py-4">
  <div class="container">
    <div class="row pb-4">
      <div class="col-12">
        <h1 class="mb-0 h2">Create a post</h1>
      </div>
    </div>
    <div class="row">
      <div class="col-12">
        <div class="card border">
          <div class="card-body">
            <form action='<?= base_url('createPost') ?>' enctype="multipart/form-data" method='POST'>
              <div class="row">
                <div class="col-12">
                  <div class="mb-3">
                    <label class="form-label">Post name</label>
                    <input required name="post_name" type="text" class="form-control" placeholder="Post name">
                  </div>
                </div>
                <div class="col-12">
                  <div class="mb-3">
                    <label class="form-label">Short description </label>
                    <textarea required name="short_description" class="form-control" rows="3"
                      placeholder="Add description"></textarea>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="mb-3">
                    <label class="form-label">Post body</label>
                    <textarea name="description" id="mytextarea"></textarea>
                  </div>
                </div>
                </div>
                <div class="col-12">
                  <div class="mb-3">
                    <div class="position-relative">
                      <h6 class="my-2">Upload post image here, or<a href="#!" class="text-primary"> Browse</a></h6>
                      <label class="w-100" style="cursor:pointer;">
                        <span>
                          <input class="form-control stretched-link" type="file" name="image" id="image"
                            accept="image/gif, image/jpeg, image/png">
                        </span>
                      </label>
                    </div>
                  </div>
                </div>
                <div class="col-12">
                  <!-- Post name -->
                  <div class="mb-3">
                    <label class="form-label">Image Alt Keyword</label>
                    <input required name="alt_keyword" type="text" class="form-control" placeholder="Alt Keyword">
                  </div>
                </div>
                <div class="col-lg-7">
                  <!-- Tags -->
                  <div class="mb-3">
                    <label class="form-label">Tags</label>
                    <textarea name="tags" class="form-control" rows="1" placeholder="Tags"></textarea>
                  </div>
                </div>
                <div class="col-lg-5">
                  <!-- Message -->
                  <div class="mb-3">
                    <label class="form-label">Category</label>
                    <select class="form-select" name="category" aria-label="Default select example">
                      <option selected>Lifestyle</option>
                      <option value="Technology">Technology</option>
                      <option value="Travel">Travel</option>
                      <option value="Business">Business</option>
                      <option value="Sports">Sports</option>
                      <option value="Marketing">Marketing</option>
                    </select>
                  </div>
                </div>

                <div class="col-6">
                  <div class="mb-3">
                    <label class="form-label">Meta title</label>
                    <input required name="meta_title" type="text" class="form-control" placeholder="Meta title">
                  </div>
                </div>
                <div class="col-6">
                  <!-- Post name -->
                  <div class="mb-3">
                    <label class="form-label">Robots</label>

                    <select class="form-select" name="robots" aria-label="Default Robots">
                      <option value="">Select Robots</option>
                      <option value="noindex, nofollow">noindex, nofollow</option>
                      <option value="nofollow, index">nofollow, index</option>
                      <option value="noindex, follow">noindex, follow</option>
                      <option value="index, follow">index, follow</option>
                    </select>
                  </div>
                </div>
                <div class="row">
                  <div class="col-12 mb-3">
                    <label class="form-label">Meta Description</label>
                    <textarea type="text" class="form-control" name="meta_description"
                      placeholder="Enter meta Description"></textarea>
                  </div>
                </div>
  
  
                <div class="row">
                  <div class="col-12 mb-3">
                    <label class="form-label">Meta Keywords</label>
                    <textarea type="text" class="form-control" name="meta_keywords"
                      placeholder="Enter meta Keywords"></textarea>
                  </div>
                </div>
                <div class="col-md-12 text-start">
                  <button class="btn btn-primary w-100" type="submit">Create post</button>
                </div>
              </div>
         
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>