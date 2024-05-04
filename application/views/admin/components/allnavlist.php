<div class="row">
   <div class="col-12">
      <div class="card">
         <div class="card-header pb-0">
            <div class="d-lg-flex">
               <div>
                  <h5 class="mb-0">All Navs</h5>
               
               </div>
               <div class="ms-auto my-auto mt-lg-0 mt-4">
                  <div class="ms-auto my-auto">
                     <a href="<?= base_url('addnavbarform') ?>" class="btn bg-gradient-primary btn-sm mb-0" >+&nbsp; Add New Nav</a>
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
                              <th>S.No.</th>
                              <th>Page Name</th>
                              <th>Category</th>
                              <th>Route</th>
                              <th>Enable</th>
                              <th>Action</th>
                           </tr>
                        </thead>
                        <tbody>
                           <?php foreach ($data as $index => $data) {?>
                              <tr>
                              <td>
                                    <div class="d-flex">
                                       <h6 class="my-auto"><?= $index + 1 ?></h6>
                                    </div>
                                 </td>
                                 <td>
                                    <div class="d-flex">
                                       <h6 class="my-auto"><?= $data['subnav'] ?></h6>
                                    </div>
                                 </td>
                                 <td class="text-sm"><?= $data['nav'] ?></td>
                                 
                                 <td class="text-sm">
                                    <?= $data['url'] ?>
                                 </td>
                                 <td>
                                 <div class="custom-control custom-switch">
                                 <input <?= $data['status'] == 1 ? 'checked' : '' ?> name="status" type="checkbox" class="custom-control-input" data-nav-id="<?= $data['id'] ?>" onchange='updateFeaturedStatus(this)'>

                                    <!-- <input <?= $data['status'] == 1 ? 'checked' : ''; ?> name="status" type="checkbox" class="custom-control-input" id="notification1"> -->
                                 </div>
                                 </td>
                                 <td class="text-sm">
                                    <a href="<?= base_url($data['url']) ?>" target="_blank" data-bs-toggle="tooltip" data-bs-original-title="Preview product">
                                       <i class="me-2 fas fa-eye text-secondary" aria-hidden="true"></i>
                                    </a>
                                    <a href="javascript:;" data-bs-toggle="tooltip" data-bs-original-title="Delete product">
                                       <i class="ms-4 fas fa-trash text-secondary" aria-hidden="true"></i>
                                    </a>
                                 </td>
                              </tr>
                              <script>
                                    function updateFeaturedStatus(checkboxElement) {
                                       var navId = checkboxElement.getAttribute('data-nav-id');
                                       var isFeatured = checkboxElement.checked ? 1 : 0; // 1 if checked, 0 if not
                                          console.log(isFeatured);
                                          console.log(navId);
                                       var url = `<?= base_url('Admin/makeEnabled/') ?>` + navId + '/' + isFeatured;
                                       fetch(url, {
                                          method: 'POST',
                                          headers: {
                                                'Content-Type': 'application/json',
                                          },
                                          body: JSON.stringify({
                                             navId: navId,
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