<div class="row">
   <div class="col-12">
      <div class="card">
         <div class="card-header pb-0">
            <div class="d-lg-flex">
               <div>
                  <h5 class="mb-0">All Navs</h5>
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
                              <th>Page Name</th>
                              <th>Daily</th>
                              <th>Monthly</th>
                              <th>yearly</th>
                           </tr>
                        </thead>
                        <tbody>
                           <?php foreach ($page as $data) {?>
                              <tr>
                                 <td>
                                    <div class="d-flex">
                                       <h6 class="my-auto"><?= $data['page'] ?></h6>
                                    </div>
                                 </td>
                                 <td class="text-sm"><?= $data['daily_count'] ?></td>
                                 <td class="text-sm"><?= $data['monthly_count'] ?></td>
                                 <td class="text-sm"><?= $data['yearly_count'] ?></td>
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