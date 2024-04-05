<section class="py-4">
    <div class="container">
        <div class="card-header pb-4">
            <div class="d-lg-flex">
                <div class="col-6">
                    <h1 class="mb-0 h2">Create a post</h1>
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
                        <form action='<?= base_url('createPost') ?>' enctype="multipart/form-data" method='POST'>
                            <div class="row">
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label class="form-label">Post name</label>
                                        <input required name="post_name" type="text" class="form-control"
                                            placeholder="Post name">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label class="form-label">Short description </label>
                                        <textarea required name="short_description" class="form-control" rows="3" placeholder="Add description"></textarea>
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
                                        <h6 class="my-2">Upload post image here, or<a href="#!"
                                                class="text-primary"> Browse</a></h6>
                                        <label class="w-100" style="cursor:pointer;">
                                            <span>
                                                <input class="form-control stretched-link" type="file" name="image"
                                                    id="image" accept="image/gif, image/jpeg, image/png">
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
                            
                            <div class="row">
                                <div class="col-lg-6">
                                    <!-- Message -->
                                    <div class="mb-3">
                                        <label class="form-label">Category</label>
                                        <select class="form-select" name="category" aria-label="Default select example">
                                            <option selected>IPO</option>
                                            <option value="Cryptocurrencies">Cryptocurrencies</option>
                                            <option value="Investments">Investments</option>
                                            <option value="Regulations">Regulations</option>
                                            <option value="Market">Market</option>
                                            <option value="Technology">Technology</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <!-- Message -->
                                    <div class="mb-3">
                                        <label class="form-label">Author</label>
                                        <select class="form-select" name="author">
                                            <option selected>Admin</option>
                                            <option value="Cryptocurrencies">Harsh Gupta</option>
                                            <option value="Investments">Ravi Gupta</option>
                                            <option value="Regulations">Pankaj Gupta</option>
                                            <option value="Market">Ronak Gupta</option>
                                            <option value="Technology">Vishal Gupta</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-6">
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
                                        <option value="noindex, nofollow">noindex, nofollow</option>
                                        <option value="nofollow, index">nofollow, index</option>
                                        <option value="noindex, follow">noindex, follow</option>
                                        <option selected value="index, follow">index, follow</option>
                                    </select>
                                </div>
                            </div>
                            </div>
                            <div class="col-lg-7">
                                <!-- Tags -->
                                <div class="mb-3">
                                    <label class="form-label">Tags</label>
                                    <textarea name="tags" class="form-control" rows="1" placeholder="Tags"></textarea>
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
