
<script src="<?= BASE_ASSET; ?>/js/jquery.hotkeys.js"></script>
<script type="text/javascript">
    function domo(){
     
       // Binding keys
       $('*').bind('keydown', 'Ctrl+s', function assets() {
          $('#btn_save').trigger('click');
           return false;
       });
    
       $('*').bind('keydown', 'Ctrl+x', function assets() {
          $('#btn_cancel').trigger('click');
           return false;
       });
    
      $('*').bind('keydown', 'Ctrl+d', function assets() {
          $('.btn_save_back').trigger('click');
           return false;
       });
        
    }
    
    jQuery(document).ready(domo);
</script>
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Mismer All        <small>Edit Mismer All</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class=""><a  href="<?= site_url('administrator/mismer_all'); ?>">Mismer All</a></li>
        <li class="active">Edit</li>
    </ol>
</section>
<!-- Main content -->
<section class="content">
    <div class="row" >
        <div class="col-md-12">
            <div class="box box-warning">
                <div class="box-body ">
                    <!-- Widget: user widget style 1 -->
                    <div class="box box-widget widget-user-2">
                        <!-- Add the bg color to the header using any of the bg-* classes -->
                        <div class="widget-user-header ">
                            <div class="widget-user-image">
                                <img class="img-circle" src="<?= BASE_ASSET; ?>/img/add2.png" alt="User Avatar">
                            </div>
                            <!-- /.widget-user-image -->
                            <h3 class="widget-user-username">Mismer All</h3>
                            <h5 class="widget-user-desc">Edit Mismer All</h5>
                            <hr>
                        </div>
                        <?= form_open(base_url('administrator/mismer_all/edit_save/'.$this->uri->segment(4)), [
                            'name'    => 'form_mismer_all', 
                            'class'   => 'form-horizontal', 
                            'id'      => 'form_mismer_all', 
                            'method'  => 'POST'
                            ]); ?>
                         
                                                <div class="form-group ">
                            <label for="ORG" class="col-sm-2 control-label">ORG 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="ORG" id="ORG" placeholder="ORG" value="<?= set_value('ORG', $mismer_all->ORG); ?>">
                                <small class="info help-block">
                                <b>Input ORG</b> Max Length : 255.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="MID" class="col-sm-2 control-label">MID 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="MID" id="MID" placeholder="MID" value="<?= set_value('MID', $mismer_all->MID); ?>">
                                <small class="info help-block">
                                <b>Input MID</b> Max Length : 255.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="MERCHANT_DBA_NAME" class="col-sm-2 control-label">MERCHANT DBA NAME 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="MERCHANT_DBA_NAME" id="MERCHANT_DBA_NAME" placeholder="MERCHANT DBA NAME" value="<?= set_value('MERCHANT_DBA_NAME', $mismer_all->MERCHANT_DBA_NAME); ?>">
                                <small class="info help-block">
                                <b>Input MERCHANT DBA NAME</b> Max Length : 255.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="STATUS_EDC" class="col-sm-2 control-label">STATUS EDC 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="STATUS_EDC" id="STATUS_EDC" placeholder="STATUS EDC" value="<?= set_value('STATUS_EDC', $mismer_all->STATUS_EDC); ?>">
                                <small class="info help-block">
                                <b>Input STATUS EDC</b> Max Length : 255.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="OPENDATE" class="col-sm-2 control-label">OPENDATE 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="OPENDATE" id="OPENDATE" placeholder="OPENDATE" value="<?= set_value('OPENDATE', $mismer_all->OPENDATE); ?>">
                                <small class="info help-block">
                                <b>Input OPENDATE</b> Max Length : 255.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="CITY" class="col-sm-2 control-label">CITY 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="CITY" id="CITY" placeholder="CITY" value="<?= set_value('CITY', $mismer_all->CITY); ?>">
                                <small class="info help-block">
                                <b>Input CITY</b> Max Length : 255.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="STATE" class="col-sm-2 control-label">STATE 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="STATE" id="STATE" placeholder="STATE" value="<?= set_value('STATE', $mismer_all->STATE); ?>">
                                <small class="info help-block">
                                <b>Input STATE</b> Max Length : 255.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="DATE_LAST_MAINTAIN" class="col-sm-2 control-label">DATE LAST MAINTAIN 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="DATE_LAST_MAINTAIN" id="DATE_LAST_MAINTAIN" placeholder="DATE LAST MAINTAIN" value="<?= set_value('DATE_LAST_MAINTAIN', $mismer_all->DATE_LAST_MAINTAIN); ?>">
                                <small class="info help-block">
                                <b>Input DATE LAST MAINTAIN</b> Max Length : 255.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="CONTACT_PERSON" class="col-sm-2 control-label">CONTACT PERSON 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="CONTACT_PERSON" id="CONTACT_PERSON" placeholder="CONTACT PERSON" value="<?= set_value('CONTACT_PERSON', $mismer_all->CONTACT_PERSON); ?>">
                                <small class="info help-block">
                                <b>Input CONTACT PERSON</b> Max Length : 255.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="TELP1" class="col-sm-2 control-label">TELP1 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="TELP1" id="TELP1" placeholder="TELP1" value="<?= set_value('TELP1', $mismer_all->TELP1); ?>">
                                <small class="info help-block">
                                <b>Input TELP1</b> Max Length : 255.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="TELP2" class="col-sm-2 control-label">TELP2 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="TELP2" id="TELP2" placeholder="TELP2" value="<?= set_value('TELP2', $mismer_all->TELP2); ?>">
                                <small class="info help-block">
                                <b>Input TELP2</b> Max Length : 255.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="MSO" class="col-sm-2 control-label">MSO 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="MSO" id="MSO" placeholder="MSO" value="<?= set_value('MSO', $mismer_all->MSO); ?>">
                                <small class="info help-block">
                                <b>Input MSO</b> Max Length : 255.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="MMO" class="col-sm-2 control-label">MMO 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="MMO" id="MMO" placeholder="MMO" value="<?= set_value('MMO', $mismer_all->MMO); ?>">
                                <small class="info help-block">
                                <b>Input MMO</b> Max Length : 255.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="DDA" class="col-sm-2 control-label">DDA 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="DDA" id="DDA" placeholder="DDA" value="<?= set_value('DDA', $mismer_all->DDA); ?>">
                                <small class="info help-block">
                                <b>Input DDA</b> Max Length : 255.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="MERCHANT_TYPE" class="col-sm-2 control-label">MERCHANT TYPE 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="MERCHANT_TYPE" id="MERCHANT_TYPE" placeholder="MERCHANT TYPE" value="<?= set_value('MERCHANT_TYPE', $mismer_all->MERCHANT_TYPE); ?>">
                                <small class="info help-block">
                                <b>Input MERCHANT TYPE</b> Max Length : 255.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="CHAIN_STORE" class="col-sm-2 control-label">CHAIN STORE 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="CHAIN_STORE" id="CHAIN_STORE" placeholder="CHAIN STORE" value="<?= set_value('CHAIN_STORE', $mismer_all->CHAIN_STORE); ?>">
                                <small class="info help-block">
                                <b>Input CHAIN STORE</b> Max Length : 255.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="SOURCE_CODE" class="col-sm-2 control-label">SOURCE CODE 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="SOURCE_CODE" id="SOURCE_CODE" placeholder="SOURCE CODE" value="<?= set_value('SOURCE_CODE', $mismer_all->SOURCE_CODE); ?>">
                                <small class="info help-block">
                                <b>Input SOURCE CODE</b> Max Length : 255.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="MERCHANT_NAME" class="col-sm-2 control-label">MERCHANT NAME 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="MERCHANT_NAME" id="MERCHANT_NAME" placeholder="MERCHANT NAME" value="<?= set_value('MERCHANT_NAME', $mismer_all->MERCHANT_NAME); ?>">
                                <small class="info help-block">
                                <b>Input MERCHANT NAME</b> Max Length : 255.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="ALAMAT1" class="col-sm-2 control-label">ALAMAT1 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="ALAMAT1" id="ALAMAT1" placeholder="ALAMAT1" value="<?= set_value('ALAMAT1', $mismer_all->ALAMAT1); ?>">
                                <small class="info help-block">
                                <b>Input ALAMAT1</b> Max Length : 255.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="ALAMAT2" class="col-sm-2 control-label">ALAMAT2 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="ALAMAT2" id="ALAMAT2" placeholder="ALAMAT2" value="<?= set_value('ALAMAT2', $mismer_all->ALAMAT2); ?>">
                                <small class="info help-block">
                                <b>Input ALAMAT2</b> Max Length : 255.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="KOTA1" class="col-sm-2 control-label">KOTA1 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="KOTA1" id="KOTA1" placeholder="KOTA1" value="<?= set_value('KOTA1', $mismer_all->KOTA1); ?>">
                                <small class="info help-block">
                                <b>Input KOTA1</b> Max Length : 255.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="KOTA2" class="col-sm-2 control-label">KOTA2 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="KOTA2" id="KOTA2" placeholder="KOTA2" value="<?= set_value('KOTA2', $mismer_all->KOTA2); ?>">
                                <small class="info help-block">
                                <b>Input KOTA2</b> Max Length : 255.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="ZIPCODE" class="col-sm-2 control-label">ZIPCODE 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="ZIPCODE" id="ZIPCODE" placeholder="ZIPCODE" value="<?= set_value('ZIPCODE', $mismer_all->ZIPCODE); ?>">
                                <small class="info help-block">
                                <b>Input ZIPCODE</b> Max Length : 255.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="kolom24" class="col-sm-2 control-label">Kolom24 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="kolom24" id="kolom24" placeholder="Kolom24" value="<?= set_value('kolom24', $mismer_all->kolom24); ?>">
                                <small class="info help-block">
                                <b>Input Kolom24</b> Max Length : 255.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="MCC1" class="col-sm-2 control-label">MCC1 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="MCC1" id="MCC1" placeholder="MCC1" value="<?= set_value('MCC1', $mismer_all->MCC1); ?>">
                                <small class="info help-block">
                                <b>Input MCC1</b> Max Length : 255.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="MCC2" class="col-sm-2 control-label">MCC2 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="MCC2" id="MCC2" placeholder="MCC2" value="<?= set_value('MCC2', $mismer_all->MCC2); ?>">
                                <small class="info help-block">
                                <b>Input MCC2</b> Max Length : 255.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="kolom27" class="col-sm-2 control-label">Kolom27 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="kolom27" id="kolom27" placeholder="Kolom27" value="<?= set_value('kolom27', $mismer_all->kolom27); ?>">
                                <small class="info help-block">
                                <b>Input Kolom27</b> Max Length : 255.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="kolom28" class="col-sm-2 control-label">Kolom28 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="kolom28" id="kolom28" placeholder="Kolom28" value="<?= set_value('kolom28', $mismer_all->kolom28); ?>">
                                <small class="info help-block">
                                <b>Input Kolom28</b> Max Length : 255.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="kolom29" class="col-sm-2 control-label">Kolom29 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="kolom29" id="kolom29" placeholder="Kolom29" value="<?= set_value('kolom29', $mismer_all->kolom29); ?>">
                                <small class="info help-block">
                                <b>Input Kolom29</b> Max Length : 255.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="POS1" class="col-sm-2 control-label">POS1 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="POS1" id="POS1" placeholder="POS1" value="<?= set_value('POS1', $mismer_all->POS1); ?>">
                                <small class="info help-block">
                                <b>Input POS1</b> Max Length : 255.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="POS2" class="col-sm-2 control-label">POS2 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="POS2" id="POS2" placeholder="POS2" value="<?= set_value('POS2', $mismer_all->POS2); ?>">
                                <small class="info help-block">
                                <b>Input POS2</b> Max Length : 255.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="POS3" class="col-sm-2 control-label">POS3 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="POS3" id="POS3" placeholder="POS3" value="<?= set_value('POS3', $mismer_all->POS3); ?>">
                                <small class="info help-block">
                                <b>Input POS3</b> Max Length : 255.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="PLAN1" class="col-sm-2 control-label">PLAN1 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="PLAN1" id="PLAN1" placeholder="PLAN1" value="<?= set_value('PLAN1', $mismer_all->PLAN1); ?>">
                                <small class="info help-block">
                                <b>Input PLAN1</b> Max Length : 255.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="PLAN2" class="col-sm-2 control-label">PLAN2 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="PLAN2" id="PLAN2" placeholder="PLAN2" value="<?= set_value('PLAN2', $mismer_all->PLAN2); ?>">
                                <small class="info help-block">
                                <b>Input PLAN2</b> Max Length : 255.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="PLAN3" class="col-sm-2 control-label">PLAN3 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="PLAN3" id="PLAN3" placeholder="PLAN3" value="<?= set_value('PLAN3', $mismer_all->PLAN3); ?>">
                                <small class="info help-block">
                                <b>Input PLAN3</b> Max Length : 255.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="DATE_LAST_STATEMENT" class="col-sm-2 control-label">DATE LAST STATEMENT 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="DATE_LAST_STATEMENT" id="DATE_LAST_STATEMENT" placeholder="DATE LAST STATEMENT" value="<?= set_value('DATE_LAST_STATEMENT', $mismer_all->DATE_LAST_STATEMENT); ?>">
                                <small class="info help-block">
                                <b>Input DATE LAST STATEMENT</b> Max Length : 255.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="kolom37" class="col-sm-2 control-label">Kolom37 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="kolom37" id="kolom37" placeholder="Kolom37" value="<?= set_value('kolom37', $mismer_all->kolom37); ?>">
                                <small class="info help-block">
                                <b>Input Kolom37</b> Max Length : 255.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="kolom38" class="col-sm-2 control-label">Kolom38 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="kolom38" id="kolom38" placeholder="Kolom38" value="<?= set_value('kolom38', $mismer_all->kolom38); ?>">
                                <small class="info help-block">
                                <b>Input Kolom38</b> Max Length : 255.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="kolom39" class="col-sm-2 control-label">Kolom39 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="kolom39" id="kolom39" placeholder="Kolom39" value="<?= set_value('kolom39', $mismer_all->kolom39); ?>">
                                <small class="info help-block">
                                <b>Input Kolom39</b> Max Length : 255.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="kolom40" class="col-sm-2 control-label">Kolom40 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="kolom40" id="kolom40" placeholder="Kolom40" value="<?= set_value('kolom40', $mismer_all->kolom40); ?>">
                                <small class="info help-block">
                                <b>Input Kolom40</b> Max Length : 255.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="kolom41" class="col-sm-2 control-label">Kolom41 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="kolom41" id="kolom41" placeholder="Kolom41" value="<?= set_value('kolom41', $mismer_all->kolom41); ?>">
                                <small class="info help-block">
                                <b>Input Kolom41</b> Max Length : 255.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="kolom42" class="col-sm-2 control-label">Kolom42 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="kolom42" id="kolom42" placeholder="Kolom42" value="<?= set_value('kolom42', $mismer_all->kolom42); ?>">
                                <small class="info help-block">
                                <b>Input Kolom42</b> Max Length : 255.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="kolom43" class="col-sm-2 control-label">Kolom43 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="kolom43" id="kolom43" placeholder="Kolom43" value="<?= set_value('kolom43', $mismer_all->kolom43); ?>">
                                <small class="info help-block">
                                <b>Input Kolom43</b> Max Length : 255.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="kolom44" class="col-sm-2 control-label">Kolom44 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="kolom44" id="kolom44" placeholder="Kolom44" value="<?= set_value('kolom44', $mismer_all->kolom44); ?>">
                                <small class="info help-block">
                                <b>Input Kolom44</b> Max Length : 255.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="kolom45" class="col-sm-2 control-label">Kolom45 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="kolom45" id="kolom45" placeholder="Kolom45" value="<?= set_value('kolom45', $mismer_all->kolom45); ?>">
                                <small class="info help-block">
                                <b>Input Kolom45</b> Max Length : 255.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="kolom46" class="col-sm-2 control-label">Kolom46 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="kolom46" id="kolom46" placeholder="Kolom46" value="<?= set_value('kolom46', $mismer_all->kolom46); ?>">
                                <small class="info help-block">
                                <b>Input Kolom46</b> Max Length : 255.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="kolom47" class="col-sm-2 control-label">Kolom47 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="kolom47" id="kolom47" placeholder="Kolom47" value="<?= set_value('kolom47', $mismer_all->kolom47); ?>">
                                <small class="info help-block">
                                <b>Input Kolom47</b> Max Length : 255.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="NPWP" class="col-sm-2 control-label">NPWP 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="NPWP" id="NPWP" placeholder="NPWP" value="<?= set_value('NPWP', $mismer_all->NPWP); ?>">
                                <small class="info help-block">
                                <b>Input NPWP</b> Max Length : 255.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="ACCOUNT_NO" class="col-sm-2 control-label">ACCOUNT NO 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="ACCOUNT_NO" id="ACCOUNT_NO" placeholder="ACCOUNT NO" value="<?= set_value('ACCOUNT_NO', $mismer_all->ACCOUNT_NO); ?>">
                                <small class="info help-block">
                                <b>Input ACCOUNT NO</b> Max Length : 255.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="BANK_NAME" class="col-sm-2 control-label">BANK NAME 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="BANK_NAME" id="BANK_NAME" placeholder="BANK NAME" value="<?= set_value('BANK_NAME', $mismer_all->BANK_NAME); ?>">
                                <small class="info help-block">
                                <b>Input BANK NAME</b> Max Length : 255.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="kolom51" class="col-sm-2 control-label">Kolom51 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="kolom51" id="kolom51" placeholder="Kolom51" value="<?= set_value('kolom51', $mismer_all->kolom51); ?>">
                                <small class="info help-block">
                                <b>Input Kolom51</b> Max Length : 255.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="kolom52" class="col-sm-2 control-label">Kolom52 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="kolom52" id="kolom52" placeholder="Kolom52" value="<?= set_value('kolom52', $mismer_all->kolom52); ?>">
                                <small class="info help-block">
                                <b>Input Kolom52</b> Max Length : 255.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="kolom53" class="col-sm-2 control-label">Kolom53 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="kolom53" id="kolom53" placeholder="Kolom53" value="<?= set_value('kolom53', $mismer_all->kolom53); ?>">
                                <small class="info help-block">
                                <b>Input Kolom53</b> Max Length : 255.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="kolom54" class="col-sm-2 control-label">Kolom54 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="kolom54" id="kolom54" placeholder="Kolom54" value="<?= set_value('kolom54', $mismer_all->kolom54); ?>">
                                <small class="info help-block">
                                <b>Input Kolom54</b> Max Length : 255.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="kolom55" class="col-sm-2 control-label">Kolom55 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="kolom55" id="kolom55" placeholder="Kolom55" value="<?= set_value('kolom55', $mismer_all->kolom55); ?>">
                                <small class="info help-block">
                                <b>Input Kolom55</b> Max Length : 255.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="kolom56" class="col-sm-2 control-label">Kolom56 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="kolom56" id="kolom56" placeholder="Kolom56" value="<?= set_value('kolom56', $mismer_all->kolom56); ?>">
                                <small class="info help-block">
                                <b>Input Kolom56</b> Max Length : 255.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="kolom57" class="col-sm-2 control-label">Kolom57 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="kolom57" id="kolom57" placeholder="Kolom57" value="<?= set_value('kolom57', $mismer_all->kolom57); ?>">
                                <small class="info help-block">
                                <b>Input Kolom57</b> Max Length : 255.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="kolom58" class="col-sm-2 control-label">Kolom58 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="kolom58" id="kolom58" placeholder="Kolom58" value="<?= set_value('kolom58', $mismer_all->kolom58); ?>">
                                <small class="info help-block">
                                <b>Input Kolom58</b> Max Length : 255.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="MDR_VISA_BNI" class="col-sm-2 control-label">MDR VISA BNI 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="MDR_VISA_BNI" id="MDR_VISA_BNI" placeholder="MDR VISA BNI" value="<?= set_value('MDR_VISA_BNI', $mismer_all->MDR_VISA_BNI); ?>">
                                <small class="info help-block">
                                <b>Input MDR VISA BNI</b> Max Length : 255.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="kolom60" class="col-sm-2 control-label">Kolom60 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="kolom60" id="kolom60" placeholder="Kolom60" value="<?= set_value('kolom60', $mismer_all->kolom60); ?>">
                                <small class="info help-block">
                                <b>Input Kolom60</b> Max Length : 255.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="kolom61" class="col-sm-2 control-label">Kolom61 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="kolom61" id="kolom61" placeholder="Kolom61" value="<?= set_value('kolom61', $mismer_all->kolom61); ?>">
                                <small class="info help-block">
                                <b>Input Kolom61</b> Max Length : 255.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="kolom62" class="col-sm-2 control-label">Kolom62 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="kolom62" id="kolom62" placeholder="Kolom62" value="<?= set_value('kolom62', $mismer_all->kolom62); ?>">
                                <small class="info help-block">
                                <b>Input Kolom62</b> Max Length : 255.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="kolom63" class="col-sm-2 control-label">Kolom63 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="kolom63" id="kolom63" placeholder="Kolom63" value="<?= set_value('kolom63', $mismer_all->kolom63); ?>">
                                <small class="info help-block">
                                <b>Input Kolom63</b> Max Length : 255.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="kolom64" class="col-sm-2 control-label">Kolom64 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="kolom64" id="kolom64" placeholder="Kolom64" value="<?= set_value('kolom64', $mismer_all->kolom64); ?>">
                                <small class="info help-block">
                                <b>Input Kolom64</b> Max Length : 255.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="kolom65" class="col-sm-2 control-label">Kolom65 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="kolom65" id="kolom65" placeholder="Kolom65" value="<?= set_value('kolom65', $mismer_all->kolom65); ?>">
                                <small class="info help-block">
                                <b>Input Kolom65</b> Max Length : 255.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="MDR_VISA_OTHER" class="col-sm-2 control-label">MDR VISA OTHER 
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="MDR_VISA_OTHER" id="MDR_VISA_OTHER" placeholder="MDR VISA OTHER" value="<?= set_value('MDR_VISA_OTHER', $mismer_all->MDR_VISA_OTHER); ?>">
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                                                
                        <div class="message"></div>
                        <div class="row-fluid col-md-7">
                            <button class="btn btn-flat btn-primary btn_save btn_action" id="btn_save" data-stype='stay' title="<?= cclang('save_button'); ?> (Ctrl+s)">
                            <i class="fa fa-save" ></i> <?= cclang('save_button'); ?>
                            </button>
                            <a class="btn btn-flat btn-info btn_save btn_action btn_save_back" id="btn_save" data-stype='back' title="<?= cclang('save_and_go_the_list_button'); ?> (Ctrl+d)">
                            <i class="ion ion-ios-list-outline" ></i> <?= cclang('save_and_go_the_list_button'); ?>
                            </a>
                            <a class="btn btn-flat btn-default btn_action" id="btn_cancel" title="<?= cclang('cancel_button'); ?> (Ctrl+x)">
                            <i class="fa fa-undo" ></i> <?= cclang('cancel_button'); ?>
                            </a>
                            <span class="loading loading-hide">
                            <img src="<?= BASE_ASSET; ?>/img/loading-spin-primary.svg"> 
                            <i><?= cclang('loading_saving_data'); ?></i>
                            </span>
                        </div>
                        <?= form_close(); ?>
                    </div>
                </div>
                <!--/box body -->
            </div>
            <!--/box -->
        </div>
    </div>
</section>
<!-- /.content -->
<!-- Page script -->
<script>
    $(document).ready(function(){
      
             
      $('#btn_cancel').click(function(){
        swal({
            title: "Are you sure?",
            text: "the data that you have created will be in the exhaust!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes!",
            cancelButtonText: "No!",
            closeOnConfirm: true,
            closeOnCancel: true
          },
          function(isConfirm){
            if (isConfirm) {
              window.location.href = BASE_URL + 'administrator/mismer_all';
            }
          });
    
        return false;
      }); /*end btn cancel*/
    
      $('.btn_save').click(function(){
        $('.message').fadeOut();
            
        var form_mismer_all = $('#form_mismer_all');
        var data_post = form_mismer_all.serializeArray();
        var save_type = $(this).attr('data-stype');
        data_post.push({name: 'save_type', value: save_type});
    
        $('.loading').show();
    
        $.ajax({
          url: form_mismer_all.attr('action'),
          type: 'POST',
          dataType: 'json',
          data: data_post,
        })
        .done(function(res) {
          if(res.success) {
            var id = $('#mismer_all_image_galery').find('li').attr('qq-file-id');
            if (save_type == 'back') {
              window.location.href = res.redirect;
              return;
            }
    
            $('.message').printMessage({message : res.message});
            $('.message').fadeIn();
            $('.data_file_uuid').val('');
    
          } else {
            $('.message').printMessage({message : res.message, type : 'warning'});
          }
    
        })
        .fail(function() {
          $('.message').printMessage({message : 'Error save data', type : 'warning'});
        })
        .always(function() {
          $('.loading').hide();
          $('html, body').animate({ scrollTop: $(document).height() }, 2000);
        });
    
        return false;
      }); /*end btn save*/
      
       
       
           
    
    }); /*end doc ready*/
</script>