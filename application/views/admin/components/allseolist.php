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
                     <a href="<?= base_url('addseodetails') ?>" class="btn bg-gradient-primary btn-sm mb-0" >+&nbsp; Add New Page Seo</a>
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
                              <th>Seo Title</th>
                              <th>Seo Description</th>
                              <th>Seo Keywords</th>
                              <th>Seo canonicals</th>
                              <th>Actions</th>
                           </tr>
                        </thead>
                        <tbody>
                           <?php foreach ($seo_details as $data) {?>
                              <tr>
                                 <td>
                                    <div class="d-flex">
                                       <h6 class="my-auto"><?= $data['seo_title'] ?></h6>
                                    </div>
                                 </td>
                                 <td class="text-sm"><?= $data['seo_desc'] ?></td>
                                 
                                 <td class="text-sm">
                                    <?= $data['seo_keys'] ?>
                                 </td>
                                 <td class="text-sm">
                                    <?= $data['seo_canonicals'] ?>
                                 </td>
                                 <td class="text-sm">
                                    <a href="<?= $data['seo_canonicals']?>" data-bs-toggle="tooltip" data-bs-original-title="Preview product">
                                       <i class="me-2 fas fa-eye text-secondary" aria-hidden="true"></i>
                                    </a>
                                    <a href="javascript:;" data-bs-toggle="tooltip" data-bs-original-title="Delete product">
                                       <i class="ms-4 fas fa-trash text-secondary" aria-hidden="true"></i>
                                    </a>
                                 </td>
                              </tr>
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