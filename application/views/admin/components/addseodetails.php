<div class="row">
    <div class="col-12">
       <div class="multisteps-form">
          <div class="row">
             <div class="col-12 col-lg-8 m-auto">
                <form class="multisteps-form__form mb-8" style="height: 406px;" action="<?= base_url('addseodetails') ?>" method="post" >
                   <div class="card multisteps-form__panel p-3 border-radius-xl bg-white js-active" data-animation="FadeIn">
                      <h5 class="font-weight-bolder">Product Information</h5>
                      <div class="multisteps-form__content">
                         <div class="row mt-3">
                            <div class="col-12">
                               <label>Seo Title</label>
                               <input name="seo_title" class="multisteps-form__input form-control" type="text">
                            </div>
                         </div>
                         <div class="row mt-4">
                           <div class="col-12 mt-3 mt-sm-0">
                               <label>Seo Description</label>
                               <input name="seo_desc" class="multisteps-form__input form-control" type="text">
                            </div>
                         </div>
                         <div class="row mt-4">
                           <div class="col-12 mt-3 mt-sm-0">
                               <label>Seo keywords</label>
                               <input name="seo_keys" class="multisteps-form__input form-control" type="text">
                            </div>
                         </div>
                         <div class="row mt-4">
                            <div class="col-sm-6 mt-sm-0 mt-4">
                            <label>Seo Canonicals</label>
                              <select name="seo_canonicals" class="form-select" aria-label="Default select example">
                                 <?php foreach ($page_url as $data) { ?>
                                    <option value="<?= $data['url'] ?>"><?= $data['url'] ?></option>
                                 <?php } ?>
                              </select>
                            </div>
                         </div>
                         <div class="button-row d-flex mt-4">
                            <button class="btn bg-gradient-dark ms-auto mb-0 js-btn-next" type="submit" title="Add">Add</button>
                         </div>
                      </div>
                   </div>
                </form>
             </div>
          </div>
       </div>
    </div>
 </div>