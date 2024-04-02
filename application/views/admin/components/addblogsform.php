<!-- <div class="row">
    <div class="col-12">
       <div class="multisteps-form">
          <div class="row">
             <div class="col-12 col-lg-8 m-auto">
                <form class="multisteps-form__form mb-8" style="height: 406px;" action="<?= base_url('addnavbarform') ?>" method="post" >
                   <div class="card multisteps-form__panel p-3 border-radius-xl bg-white js-active" data-animation="FadeIn">
                      <h5 class="font-weight-bolder">Add Blogs</h5>
                      <div class="multisteps-form__content">
                         <div class="row mt-3">
                            <div class="col-12 col-sm-6">
                               <label>Page Name</label>
                               <input name="subnav" class="multisteps-form__input form-control" type="text">
                            </div>
                            <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                               <label>Page Route</label>
                               <input name="url" class="multisteps-form__input form-control" type="text">
                            </div>
                         </div>
                         <div class="row mt-4">
                            <div class="col-sm-6 mt-sm-0 mt-4">
                              <select name="nav" class="form-select" aria-label="Default select example">
                                 <option value="Tools">Tools</option>
                                 <option value="Calculators">Calculators</option>
                                 <option value="Crypto">Crypto</option>
                                 <option value="Ipo">Ipo</option>
                              </select>
                            </div>
                         </div>
                         <div class="button-row d-flex mt-4">
                            <button class="btn bg-gradient-dark ms-auto mb-0 js-btn-next" type="submit" title="Add">Next</button>
                         </div>
                      </div>
                   </div>
                </form>
             </div>
          </div>
       </div>
    </div>
 </div> -->


 <section class="py-4">
      <div class="container">
        <div class="row pb-4">
          <div class="col-12">
            <!-- Title -->
            <h1 class="mb-0 h2">Create a post</h1>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <!-- Chart START -->
            <div class="card border">
              <!-- Card body -->
              <div class="card-body">
                <!-- Form START -->
                <form action='<?= base_url('createPost') ?>' enctype="multipart/form-data" method='POST' onsubmit="return validateForm()">
                  <!-- Main form -->
                  <div class="row">
                    <div class="col-12">
                      <!-- Post name -->
                      <div class="mb-3">
                        <label class="form-label">Post name</label>
                        <input required name="post_name" type="text" class="form-control"
                          placeholder="Post name">
                      </div>
                    </div>

                    <div class="col-12">
                      <!-- Post name -->
                      <div class="mb-3">
                        <label class="form-label">Post Slug</label>
                        <input required name="slug" type="text" class="form-control"
                          placeholder="Post Slug">
                      </div>
                    </div>


                    <!-- Post type START -->
                    <div class="col-12">
                      <div class="mb-3">
                        <label class="form-label">Post type</label>
                        <div class="d-flex flex-wrap gap-3">
                          <!-- Post type item -->
                          <div class="flex-fill">
                            <input type="radio" class="btn-check" name="poll" value="Post" id="option">
                            <label class="btn btn-outline-light w-100" for="option">
                              <i class="bi bi-chat-left-text fs-1"></i>
                              <span class="d-block"> Post </span>
                            </label>
                          </div>
                          <!-- Post type item -->
                          <div class="flex-fill">
                            <input type="radio" class="btn-check" name="poll" value="Question" id="option2">
                            <label class="btn btn-outline-light w-100" for="option2">
                              <i class="bi bi-patch-question fs-1"></i>
                              <span class="d-block"> Question </span>
                            </label>
                          </div>
                          <!-- Post type item -->
                          <div class="flex-fill">
                            <input type="radio" class="btn-check" name="poll" value="Poll" id="option3">
                            <label class="btn btn-outline-light w-100" for="option3">
                              <i class="bi bi-chat-right-dots fs-1"></i>
                              <span class="d-block"> Poll </span>
                            </label>
                          </div>
                          <!-- Post type item -->
                          <div class="flex-fill">
                            <input type="radio" class="btn-check" name="poll" value="Images" id="option4">
                            <label class="btn btn-outline-light w-100" for="option4">
                              <i class="bi bi-ui-checks-grid fs-1"></i>
                              <span class="d-block"> Images </span>
                            </label>
                          </div>
                          <!-- Post type item -->
                          <div class="flex-fill">
                            <input type="radio" class="btn-check" name="poll" value="Video" id="option5">
                            <label class="btn btn-outline-light w-100" for="option5">
                              <i class="bi bi-camera-reels fs-1"></i>
                              <span class="d-block"> Video </span>
                            </label>
                          </div>
                          <!-- Post type item -->
                          <div class="flex-fill">
                            <input type="radio" class="btn-check" name="poll" value="Other" id="option6">
                            <label class="btn btn-outline-light w-100" for="option6">
                              <i class="bi bi-chat-square fs-1"></i>
                              <span class="d-block"> Other </span>
                            </label>
                          </div>
                          <!-- Post type item -->
                        </div>
                      </div>
                    </div>
                    <!-- Post type END -->

                    <script>
                        function validateForm() {
                          var radioButtons = document.getElementsByName('poll');
                          var selected = false;
                          for (var i = 0; i < radioButtons.length; i++) {
                            if (radioButtons[i].checked) {
                              selected = true;
                              break;
                            }
                          }
                          if (!selected) {
                            alert('Please select a post type.');
                            radioButtons[0].focus(); // Focus on the first radio button

                            return false;
                          }
                          return true;
                        }
                      </script>
                    <!-- Short description -->
                    <div class="col-12">
                      <div class="mb-3">
                        <label class="form-label">Short description </label>
                        <textarea required name="short_description" class="form-control" rows="3" placeholder="Add description"></textarea>
                      </div>
                    </div>

                    <!-- Main toolbar -->
                    <div class="col-md-12">
                      <!-- Subject -->
                      <div class="mb-3">
                        <label class="form-label">Post body</label>
                        <textarea name="description" id="mytextarea"></textarea>
                        </div>
                      </div>
                    </div>
                    <div class="col-12">
                      <div class="mb-3">
                        <!-- Image -->
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
                          <input required name="alt_keyword" type="text" class="form-control"
                            placeholder="Alt Keyword">
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
                          <option value="1">Technology</option>
                          <option value="2">Travel</option>
                          <option value="3">Business</option>
                          <option value="4">Sports</option>
                          <option value="5">Marketing</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-12">
                      <div class="form-check mb-3">
                        <input class="form-check-input" name="featured" type="checkbox" value="1" id="postCheck">
                        <label class="form-check-label" for="postCheck">
                          Make this post featured?
                        </label>
                      </div>
                    </div>

                    <div class="col-6">
                        <!-- Post name -->
                        <div class="mb-3">
                          <label class="form-label">Meta title</label>
                          <input required name="meta_title" type="text" class="form-control"
                            placeholder="Meta title">
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
                    </div>
                    
                    <div class="row">
                      <div class="col-12 mb-3">
                      <label class="form-label">Meta Description</label>
                      <textarea type="text" class="form-control" name="meta_description" placeholder="Enter meta Description"></textarea>
                      </div>
                    </div>

                      
                    <div class="row">
                      <div class="col-12 mb-3">
                      <label class="form-label">Meta Keywords</label>
                      <textarea type="text" class="form-control" name="meta_keywords" placeholder="Enter meta Keywords"></textarea>
                      </div>
                    </div>
                    <!-- Create post button -->
                    <div class="col-md-12 text-start">
                      <button class="btn btn-primary w-100" type="submit">Create post</button>
                    </div>
                  </div>
                </form>
                <!-- Form END -->
              </div>
            </div>
            <!-- Chart END -->
          </div>
        </div>
      </div>
    </section>