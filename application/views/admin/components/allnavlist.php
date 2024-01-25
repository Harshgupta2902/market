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
                     <a href="<?= base_url('addnavbarform') ?>" class="btn bg-gradient-primary btn-sm mb-0" >+&nbsp; New Product</a>
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
                              <th style="width: 10%;"><a href="#" >Page Name</a></th>
                              <th style="width: 10%;"><a href="#" >Category</a></th>
                              <th style="width: 10%;"><a href="#" >Route</a></th>
                              <th style="width: 10%;"><a href="#" >Enable</a></th>
                              <th style="width: 10%;"><a href="#" >Action</a></th>
                           </tr>
                        </thead>
                        <tbody>
                           <tr>
                              <td>
                                 <div class="d-flex">
                                    <h6 class="my-auto">Home</h6>
                                 </div>
                              </td>
                              <td class="text-sm">Home</td>
                              
                              <td class="text-sm">0</td>
                              <td>
                              <div class="custom-control custom-switch">
                                 <input name="status" type="checkbox" class="custom-control-input" id="notification1">
                              </div>
                              </td>
                              <td class="text-sm">
                                 <a href="<?= base_url() ?>" data-bs-toggle="tooltip" data-bs-original-title="Preview product">
                                 <i class="me-2 fas fa-eye text-secondary" aria-hidden="true"></i>
                                 </a>
                                 <a href="javascript:;" data-bs-toggle="tooltip" data-bs-original-title="Delete product">
                                 <i class="ms-4 fas fa-trash text-secondary" aria-hidden="true"></i>
                                 </a>
                              </td>
                           </tr>
                        </tbody>
                     </table>
                  </div>
                  <!-- <div class="dataTable-bottom">
                     <div class="dataTable-info">Showing 1 to 7 of 15 entries</div>
                     <nav class="dataTable-pagination">
                        <ul class="dataTable-pagination-list">
                           <li class="pager"><a href="#" data-page="1">‹</a></li>
                           <li class="active"><a href="#" data-page="1">1</a></li>
                           <li class=""><a href="#" data-page="2">2</a></li>
                           <li class=""><a href="#" data-page="3">3</a></li>
                           <li class="pager"><a href="#" data-page="2">›</a></li>
                        </ul>
                     </nav>
                  </div> -->
               </div>
            </div>
         </div>
      </div>
   </div>
</div>