<div class="row">
   <div class="col-12">
      <div class="card">
         <div class="card-header pb-0">
            <div class="d-lg-flex">
               <div>
                  <h5 class="mb-0">All Blogs</h5>
               
               </div>
               <div class="ms-auto my-auto mt-lg-0 mt-4">
                  <div class="ms-auto my-auto">
                     <a href="<?= base_url('addblogs') ?>" class="btn bg-gradient-primary btn-sm mb-0" >+&nbsp; Add Blogs</a>
                  </div>
               </div>
            </div>
         </div>
         <div class="card-body px-0 pb-0">
            <div class="table-responsive">
               <div class="dataTable-wrapper dataTable-loading no-footer sortable searchable fixed-columns">
                  <div class="dataTable-container">
                     <table class="table table-flush dataTable-table" id="products-list">
                        <thead class="thead-light">
                           <tr>
                              <th>Image</th>
                              <th>Title</th>
                              <th>Category</th>
                              <th>Published</th>
                              <th>created_at</th>
                           </tr>
                        </thead>
                        <tbody>
                           <?php foreach ($allBlogs as $index => $data) {?>
                              <tr>
                                 <td>
                                    <img src="<?= $data['image'] ?>" alt="blog_image" style="width: 50px; height: auto;">                                    
                                 </td>
                                 <td>
                                 <div class="d-flex">
                                       <h6 class="my-auto"><?= $data['title'] ?></h6>
                                    </div>
                                 </td>
                                 <td class="text-sm"><?= $data['category'] ?></td>
                              
                                 <td>
                                    <input <?= $data['published'] == 1 ? 'checked' : '' ?> name="status" type="checkbox" class="custom-control-input" data-blog-id="<?= $data['id'] ?>" onchange='updateFeaturedStatus(this)'>
                                 </td>
                                 <td class="text-sm"><?= $data['created_at'] ?></td>
                                 
                              </tr>

                              <script>
                                    function updateFeaturedStatus(checkboxElement) {
                                       var blogId = checkboxElement.getAttribute('data-blog-id');
                                       var isFeatured = checkboxElement.checked ? 1 : 0; // 1 if checked, 0 if not
                                          console.log(isFeatured);
                                          console.log(blogId);
                                       var url = `<?= base_url('Admin/makeFeatured/') ?>` + blogId + '/' + isFeatured;
                                       fetch(url, {
                                          method: 'POST',
                                          headers: {
                                                'Content-Type': 'application/json',
                                          },
                                          body: JSON.stringify({
                                                blogId: blogId,
                                                featured: isFeatured
                                          })
                                       })
                                       .then(response => response)
                                       .then(data => {
                                          console.log('Success:', data);
                                          // Optionally, show a success message or update the UI accordingly
                                       })
                                       .catch((error) => {
                                          console.error('Error:', error);
                                          // Optionally, show an error message
                                       });
                                    }
                                    </script>
                           <?php }?>
                          
                        </tbody>
                     </table>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>