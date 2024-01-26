<style>
    .nav-pills .nav-link.active {
        color: blue !important; /* Set the color to blue for the active tab */
        text-decoration: underline; /* Add underline for the active tab */
    }
</style>

<div class="row">
   <div class="col-xl-12">
      <div class="card">
         <div class="card-header d-flex pb-0 p-3">
            <div class="nav-wrapper position-relative w-100">
               <ul class="nav nav-pills nav-fill p-1" role="tablist">
                  <li class="nav-item" role="presentation">
                     <a class="nav-link mb-0 px-0 py-1 active" data-bs-toggle="tab" href="#main" role="tab" aria-controls="main" aria-selected="true">
                     main
                     </a>
                  </li>
                  <li class="nav-item" role="presentation">
                     <a class="nav-link mb-0 px-0 py-1" data-bs-toggle="tab" href="#upcoming" role="tab" aria-controls="upcoming" aria-selected="false" tabindex="-1">
                     upcoming
                     </a>
                  </li>
                  <li class="nav-item" role="presentation">
                     <a class="nav-link mb-0 px-0 py-1" data-bs-toggle="tab" href="#gmp" role="tab" aria-controls="gmp" aria-selected="false" tabindex="-1">
                     gmp
                     </a>
                  </li>
                  <li class="nav-item" role="presentation">
                     <a class="nav-link mb-0 px-0 py-1" data-bs-toggle="tab" href="#old_gmp" role="tab" aria-controls="old_gmp" aria-selected="false" tabindex="-1">
                     old_gmp
                     </a>
                  </li>
                  <li class="nav-item" role="presentation">
                     <a class="nav-link mb-0 px-0 py-1" data-bs-toggle="tab" href="#sme" role="tab" aria-controls="sme" aria-selected="false" tabindex="-1">
                     sme
                     </a>
                  </li>
                  <li class="nav-item" role="presentation">
                     <a class="nav-link mb-0 px-0 py-1" data-bs-toggle="tab" href="#ipo_subscription" role="tab" aria-controls="ipo_subscription" aria-selected="false" tabindex="-1">
                     Ipo subscription
                     </a>
                  </li>
                  <li class="nav-item" role="presentation">
                     <a class="nav-link mb-0 px-0 py-1" data-bs-toggle="tab" href="#sme_subscription" role="tab" aria-controls="sme_subscription" aria-selected="false" tabindex="-1">
                     SME subscription
                     </a>
                  </li>
                  <li class="nav-item" role="presentation">
                     <a class="nav-link mb-0 px-0 py-1" data-bs-toggle="tab" href="#forms" role="tab" aria-controls="forms" aria-selected="false" tabindex="-1">
                     forms
                     </a>
                  </li>
                  <li class="nav-item" role="presentation">
                     <a class="nav-link mb-0 px-0 py-1" data-bs-toggle="tab" href="#buyback" role="tab" aria-controls="buyback" aria-selected="false" tabindex="-1">
                     buyback
                     </a>
                  </li>
                  
               </ul>
            </div>
         </div>
         <div class="card-body p-3 mt-2">
            <div class="tab-content" id="v-pills-tabContent">
                <div class="tab-pane fade position-relative border-radius-lg active show" id="main" role="tabpanel" aria-labelledby="main">
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
                                    <?php foreach ($main as $data) {?>
                                        <tr>
                                            <td><div class="d-flex"><h6 class="my-auto"><?= $data['Company'] ?></h6></div></td>
                                            <td class="text-sm"><?= $data['Type'] ?></td>
                                            <td class="text-sm"><?= $data['Open'] ?></td>
                                            <td class="text-sm"><?= $data['Close'] ?></td>
                                        </tr>
                                    <?php }?>
                                    
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade position-relative border-radius-lg" id="upcoming" role="tabpanel" aria-labelledby="upcoming" >
                    <div class="table-responsive">
                        <div class="dataTable-wrapper dataTable-loading no-footer sortable searchable fixed-columns">
                            <div class="dataTable-container">
                                <table class="table table-flush dataTable-table" id="products-list">
                                    <thead class="thead-light">
                                    <tr>
                                        <th>Company Name</th>
                                        <th>Date</th>
                                        <th>size</th>
                                        <th>price</th>
                                        <th>status</th>
                                        <th>link</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($upcoming as $data) {?>
                                        <tr>
                                            <td>
                                                <div class="d-flex">
                                                <h6 class="my-auto"><?= $data['companyName'] ?></h6>
                                                </div>
                                            </td>
                                            <td class="text-sm"><?= $data['date'] ?></td>
                                            <td class="text-sm"><?= $data['size'] ?></td>
                                            <td class="text-sm"><?= $data['price'] ?></td>
                                            <td class="text-sm"><?= $data['status'] ?></td>
                                            <td class="text-sm"><?= $data['link'] ?></td>
                                        </tr>
                                    <?php }?>
                                    
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade position-relative border-radius-lg" id="gmp" role="tabpanel" aria-labelledby="gmp" >
                    <div class="table-responsive">
                        <div class="dataTable-wrapper dataTable-loading no-footer sortable searchable fixed-columns">
                            <div class="dataTable-container">
                                <table class="table table-flush dataTable-table" id="products-list">
                                    <thead class="thead-light">
                                    <tr>
                                        <th>Company Name</th>
                                        <th>Date</th>
                                        <th>Type</th>
                                        <th>GMP</th>
                                        <th>Price</th>
                                        <th>Gain</th>
                                        <th>Kostak</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($gmp as $data) {?>
                                        <tr>
                                            <td>
                                                <div class="d-flex">
                                                <h6 class="my-auto"><?= $data['ipo_name'] ?></h6>
                                                </div>
                                            </td>
                                            <td class="text-sm"><?= $data['date'] ?></td>
                                            <td class="text-sm"><?= $data['type'] ?></td>
                                            <td class="text-sm"><?= $data['ipo_gmp'] ?></td>
                                            <td class="text-sm"><?= $data['price'] ?></td>
                                            <td class="text-sm"><?= $data['gain'] ?></td>
                                            <td class="text-sm"><?= $data['kostak'] ?></td>
                                        </tr>
                                    <?php }?>
                                    
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade position-relative border-radius-lg active" id="old_gmp" role="tabpanel" aria-labelledby="old_gmp">
                    <div class="table-responsive">
                        <div class="dataTable-wrapper dataTable-loading no-footer sortable searchable fixed-columns">
                            <div class="dataTable-container">
                                <table class="table table-flush dataTable-table" id="products-list">
                                    <thead class="thead-light">
                                    <tr>
                                        <th>Company Name</th>
                                        <th>Price</th>
                                        <th>GMP</th>
                                        <th>Listed</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($old_gmp as $data) {?>
                                        <tr>
                                            <td>
                                                <div class="d-flex">
                                                <h6 class="my-auto"><?= $data['ipo_name'] ?></h6>
                                                </div>
                                            </td>
                                            <td class="text-sm"><?= $data['price'] ?></td>
                                            <td class="text-sm"><?= $data['ipo_gmp'] ?></td>
                                            <td class="text-sm"><?= $data['listed'] ?></td>
                                        </tr>
                                    <?php }?>
                                    
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade position-relative border-radius-lg" id="sme" role="tabpanel" aria-labelledby="sme" style="background-image: url('../../assets/img/bg-smart-home-2.jpg'); background-size:cover;">
                    <div class="table-responsive">
                        <div class="dataTable-wrapper dataTable-loading no-footer sortable searchable fixed-columns">
                            <div class="dataTable-container">
                                <table class="table table-flush dataTable-table" id="products-list">
                                    <thead class="thead-light">
                                    <tr>
                                        <th>Company Name</th>
                                        <th>Dates</th>
                                        <th>Price</th>
                                        <th>Platform</th>
                                        <th>Link</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($sme as $data) {?>
                                        <tr>
                                            <td>
                                                <div class="d-flex">
                                                <h6 class="my-auto"><?= $data['name'] ?></h6>
                                                </div>
                                            </td>
                                            <td class="text-sm"><?= $data['Dates'] ?></td>
                                            <td class="text-sm"><?= $data['Price'] ?></td>
                                            <td class="text-sm"><?= $data['Platform'] ?></td>
                                            <td class="text-sm"><?= $data['link'] ?></td>
                                        </tr>
                                    <?php }?>
                                    
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade position-relative border-radius-lg" id="ipo_subscription" role="tabpanel" aria-labelledby="ipo_subscription" >
                    <div class="table-responsive">
                        <div class="dataTable-wrapper dataTable-loading no-footer sortable searchable fixed-columns">
                            <div class="dataTable-container">
                                <table class="table table-flush dataTable-table" id="products-list">
                                    <thead class="thead-light">
                                    <tr>
                                        <th>Company Name</th>
                                        <th>Close</th>
                                        <th>Size(in Cr)</th>
                                        <th>Qib</th>
                                        <th>SNii</th>
                                        <th>BNii</th>
                                        <th>Nii</th>
                                        <th>retail</th>
                                        <th>employee</th>
                                        <th>others</th>
                                        <th>total</th>
                                        <th>applications</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($ipo_subs as $data) {?>
                                        <tr>
                                            <td>
                                                <div class="d-flex">
                                                <h6 class="my-auto"><?= $data['company_name'] ?></h6>
                                                </div>
                                            </td>
                                            <td class="text-sm"><?= $data['close_date'] ?></td>
                                            <td class="text-sm"><?= $data['size_rs_cr'] ?></td>
                                            <td class="text-sm"><?= $data['qib_x'] ?></td>
                                            <td class="text-sm"><?= $data['snii_x'] ?></td>
                                            <td class="text-sm"><?= $data['bnii_x'] ?></td>
                                            <td class="text-sm"><?= $data['nii_x'] ?></td>
                                            <td class="text-sm"><?= $data['retail_x'] ?></td>
                                            <td class="text-sm"><?= $data['employee_x'] ?></td>
                                            <td class="text-sm"><?= $data['others_x'] ?></td>
                                            <td class="text-sm"><?= $data['total_x'] ?></td>
                                            <td class="text-sm"><?= $data['applications'] ?></td>
                                        </tr>
                                    <?php }?>
                                    
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade position-relative border-radius-lg" id="sme_subscription" role="tabpanel" aria-labelledby="sme_subscription" >
                    <div class="table-responsive">
                        <div class="dataTable-wrapper dataTable-loading no-footer sortable searchable fixed-columns">
                            <div class="dataTable-container">
                                <table class="table table-flush dataTable-table" id="products-list">
                                    <thead class="thead-light">
                                    <tr>
                                    <th>IPO Name</th>
                                    <th>Close Date</th>
                                    <th>Size (Rs Cr)</th>
                                    <th>QIB (x)</th>
                                    <th>NII (x)</th>
                                    <th>Retail (x)</th>
                                    <th>Total (x)</th>
                                    <th>Applications</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($sme_subs as $data) {?>
                                        <tr>
                                            <td>
                                                <div class="d-flex">
                                                <h6 class="my-auto"><?= $data['company_name'] ?></h6>
                                                </div>
                                            </td>
                                            <td class="text-sm"><?= $data['close_date'] ?></td>
                                            <td class="text-sm"><?= $data['size_rs_cr'] ?></td>
                                            <td class="text-sm"><?= $data['qib_x'] ?></td>
                                            <td class="text-sm"><?= $data['nii_x'] ?></td>
                                            <td class="text-sm"><?= $data['retail_x'] ?></td>
                                            <td class="text-sm"><?= $data['total_x'] ?></td>
                                            <td class="text-sm"><?= $data['applications'] ?></td>
                                        </tr>
                                    <?php }?>
                                    
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade position-relative border-radius-lg" id="forms" role="tabpanel" aria-labelledby="forms">
                    <div class="table-responsive">
                        <div class="dataTable-wrapper dataTable-loading no-footer sortable searchable fixed-columns">
                            <div class="dataTable-container">
                                <table class="table table-flush dataTable-table" id="products-list">
                                    <thead class="thead-light">
                                    <tr>
                                    <th>IPO Name</th>
                                    <th>Date</th>
                                    <th>BSE</th>
                                    <th>NSE</th>
                                    <th>BSE LInk</th>
                                    <th>NSE Link</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($forms as $data) {?>
                                        <tr>
                                            <td>
                                                <div class="d-flex">
                                                <h6 class="my-auto"><?= $data['name'] ?></h6>
                                                </div>
                                            </td>
                                            <td class="text-sm"><?= $data['date'] ?></td>
                                            <td class="text-sm"><?= $data['bse'] ?></td>
                                            <td class="text-sm"><?= $data['nse'] ?></td>
                                            <td class="text-sm">
                                                <a href="" target="_blank" rel="noopener noreferrer">
                                                    <?= $data['bse_link'] ?></td>
                                                </a>
                                            <td class="text-sm">
                                                <a href="" target="_blank" rel="noopener noreferrer">
                                                    <?= $data['nse_link'] ?></td>
                                                </a>
                                        </tr>
                                    <?php }?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade position-relative border-radius-lg" id="buyback" role="tabpanel" aria-labelledby="buyback" >
                    <div class="table-responsive">
                        <div class="dataTable-wrapper dataTable-loading no-footer sortable searchable fixed-columns">
                            <div class="dataTable-container">
                                <table class="table table-flush dataTable-table" id="products-list">
                                    <thead class="thead-light">
                                    <tr>
                                    <th>IPO Name</th>
                                    <th>Record Date</th>
                                    <th>Open</th>
                                    <th>Close</th>
                                    <th>Price</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($buyback as $data) {?>
                                        <tr>
                                            <td>
                                                <div class="d-flex">
                                                <h6 class="my-auto"><?= $data['company_name'] ?></h6>
                                                </div>
                                            </td>
                                            <td class="text-sm"><?= $data['record_date'] ?></td>
                                            <td class="text-sm"><?= $data['open'] ?></td>
                                            <td class="text-sm"><?= $data['close'] ?></td>
                                            <td class="text-sm"><?= $data['price'] ?></td>
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
   </div>
</div>