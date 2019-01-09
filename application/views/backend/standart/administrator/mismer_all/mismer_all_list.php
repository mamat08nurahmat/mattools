
<script src="<?= BASE_ASSET; ?>/js/jquery.hotkeys.js"></script>

<script type="text/javascript">
//This page is a result of an autogenerated content made by running test.html with firefox.
function domo(){
 
   // Binding keys
   $('*').bind('keydown', 'Ctrl+a', function assets() {
       window.location.href = BASE_URL + '/administrator/Mismer_all/add';
       return false;
   });

   $('*').bind('keydown', 'Ctrl+f', function assets() {
       $('#sbtn').trigger('click');
       return false;
   });

   $('*').bind('keydown', 'Ctrl+x', function assets() {
       $('#reset').trigger('click');
       return false;
   });

   $('*').bind('keydown', 'Ctrl+b', function assets() {

       $('#reset').trigger('click');
       return false;
   });
}

jQuery(document).ready(domo);
</script>
<!-- Content Header (Page header) -->
<section class="content-header">
   <h1>
      Mismer All<small><?= cclang('list_all'); ?></small>
   </h1>
   <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Mismer All</li>
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
                     <div class="row pull-right">
                        <?php is_allowed('mismer_all_add', function(){?>
                        <a class="btn btn-flat btn-success btn_add_new" id="btn_add_new" title="<?= cclang('add_new_button', ['Mismer All']); ?>  (Ctrl+a)" href="<?=  site_url('administrator/mismer_all/add'); ?>"><i class="fa fa-plus-square-o" ></i> <?= cclang('add_new_button', ['Mismer All']); ?></a>
                        <?php }) ?>
                        <?php is_allowed('mismer_all_export', function(){?>
                        <a class="btn btn-flat btn-success" title="<?= cclang('export'); ?> Mismer All" href="<?= site_url('administrator/mismer_all/export'); ?>"><i class="fa fa-file-excel-o" ></i> <?= cclang('export'); ?> XLS</a>
                        <?php }) ?>
                        <?php is_allowed('mismer_all_export', function(){?>
                        <a class="btn btn-flat btn-success" title="<?= cclang('export'); ?> pdf Mismer All" href="<?= site_url('administrator/mismer_all/export_pdf'); ?>"><i class="fa fa-file-pdf-o" ></i> <?= cclang('export'); ?> PDF</a>
                        <?php }) ?>
                     </div>
                     <div class="widget-user-image">
                        <img class="img-circle" src="<?= BASE_ASSET; ?>/img/list.png" alt="User Avatar">
                     </div>
                     <!-- /.widget-user-image -->
                     <h3 class="widget-user-username">Mismer All</h3>
                     <h5 class="widget-user-desc"><?= cclang('list_all', ['Mismer All']); ?>  <i class="label bg-yellow"><?= $mismer_all_counts; ?>  <?= cclang('items'); ?></i></h5>
                  </div>

                  <form name="form_mismer_all" id="form_mismer_all" action="<?= base_url('administrator/mismer_all/index'); ?>">
                  

                  <div class="table-responsive"> 
                  <table class="table table-bordered table-striped dataTable">
                     <thead>
                        <tr class="">
                           <th>
                            <input type="checkbox" class="flat-red toltip" id="check_all" name="check_all" title="check all">
                           </th>
                           <th>ORG</th>
                           <th>MID</th>
                           <th>MERCHANT DBA NAME</th>
                           <th>STATUS EDC</th>
                           <th>OPENDATE</th>
                           <th>CITY</th>
                           <th>STATE</th>
                           <th>DATE LAST MAINTAIN</th>
                           <th>CONTACT PERSON</th>
                           <th>TELP1</th>
                           <th>TELP2</th>
                           <th>MSO</th>
                           <th>MMO</th>
                           <th>DDA</th>
                           <th>MERCHANT TYPE</th>
                           <th>CHAIN STORE</th>
                           <th>SOURCE CODE</th>
                           <th>MERCHANT NAME</th>
                           <th>ALAMAT1</th>
                           <th>ALAMAT2</th>
                           <th>KOTA1</th>
                           <th>KOTA2</th>
                           <th>ZIPCODE</th>
                           <th>Kolom24</th>
                           <th>MCC1</th>
                           <th>MCC2</th>
                           <th>Kolom27</th>
                           <th>Kolom28</th>
                           <th>Kolom29</th>
                           <th>POS1</th>
                           <th>POS2</th>
                           <th>POS3</th>
                           <th>PLAN1</th>
                           <th>PLAN2</th>
                           <th>PLAN3</th>
                           <th>DATE LAST STATEMENT</th>
                           <th>Kolom37</th>
                           <th>Kolom38</th>
                           <th>Kolom39</th>
                           <th>Kolom40</th>
                           <th>Kolom41</th>
                           <th>Kolom42</th>
                           <th>Kolom43</th>
                           <th>Kolom44</th>
                           <th>Kolom45</th>
                           <th>Kolom46</th>
                           <th>Kolom47</th>
                           <th>NPWP</th>
                           <th>ACCOUNT NO</th>
                           <th>BANK NAME</th>
                           <th>Kolom51</th>
                           <th>Kolom52</th>
                           <th>Kolom53</th>
                           <th>Kolom54</th>
                           <th>Kolom55</th>
                           <th>Kolom56</th>
                           <th>Kolom57</th>
                           <th>Kolom58</th>
                           <th>MDR VISA BNI</th>
                           <th>Kolom60</th>
                           <th>Kolom61</th>
                           <th>Kolom62</th>
                           <th>Kolom63</th>
                           <th>Kolom64</th>
                           <th>Kolom65</th>
                           <th>MDR VISA OTHER</th>
                           <th>Action</th>
                        </tr>
                     </thead>
                     <tbody id="tbody_mismer_all">
                     <?php foreach($mismer_alls as $mismer_all): ?>
                        <tr>
                           <td width="5">
                              <input type="checkbox" class="flat-red check" name="id[]" value="<?= $mismer_all->id; ?>">
                           </td>
                           
                           <td><?= _ent($mismer_all->ORG); ?></td> 
                           <td><?= _ent($mismer_all->MID); ?></td> 
                           <td><?= _ent($mismer_all->MERCHANT_DBA_NAME); ?></td> 
                           <td><?= _ent($mismer_all->STATUS_EDC); ?></td> 
                           <td><?= _ent($mismer_all->OPENDATE); ?></td> 
                           <td><?= _ent($mismer_all->CITY); ?></td> 
                           <td><?= _ent($mismer_all->STATE); ?></td> 
                           <td><?= _ent($mismer_all->DATE_LAST_MAINTAIN); ?></td> 
                           <td><?= _ent($mismer_all->CONTACT_PERSON); ?></td> 
                           <td><?= _ent($mismer_all->TELP1); ?></td> 
                           <td><?= _ent($mismer_all->TELP2); ?></td> 
                           <td><?= _ent($mismer_all->MSO); ?></td> 
                           <td><?= _ent($mismer_all->MMO); ?></td> 
                           <td><?= _ent($mismer_all->DDA); ?></td> 
                           <td><?= _ent($mismer_all->MERCHANT_TYPE); ?></td> 
                           <td><?= _ent($mismer_all->CHAIN_STORE); ?></td> 
                           <td><?= _ent($mismer_all->SOURCE_CODE); ?></td> 
                           <td><?= _ent($mismer_all->MERCHANT_NAME); ?></td> 
                           <td><?= _ent($mismer_all->ALAMAT1); ?></td> 
                           <td><?= _ent($mismer_all->ALAMAT2); ?></td> 
                           <td><?= _ent($mismer_all->KOTA1); ?></td> 
                           <td><?= _ent($mismer_all->KOTA2); ?></td> 
                           <td><?= _ent($mismer_all->ZIPCODE); ?></td> 
                           <td><?= _ent($mismer_all->kolom24); ?></td> 
                           <td><?= _ent($mismer_all->MCC1); ?></td> 
                           <td><?= _ent($mismer_all->MCC2); ?></td> 
                           <td><?= _ent($mismer_all->kolom27); ?></td> 
                           <td><?= _ent($mismer_all->kolom28); ?></td> 
                           <td><?= _ent($mismer_all->kolom29); ?></td> 
                           <td><?= _ent($mismer_all->POS1); ?></td> 
                           <td><?= _ent($mismer_all->POS2); ?></td> 
                           <td><?= _ent($mismer_all->POS3); ?></td> 
                           <td><?= _ent($mismer_all->PLAN1); ?></td> 
                           <td><?= _ent($mismer_all->PLAN2); ?></td> 
                           <td><?= _ent($mismer_all->PLAN3); ?></td> 
                           <td><?= _ent($mismer_all->DATE_LAST_STATEMENT); ?></td> 
                           <td><?= _ent($mismer_all->kolom37); ?></td> 
                           <td><?= _ent($mismer_all->kolom38); ?></td> 
                           <td><?= _ent($mismer_all->kolom39); ?></td> 
                           <td><?= _ent($mismer_all->kolom40); ?></td> 
                           <td><?= _ent($mismer_all->kolom41); ?></td> 
                           <td><?= _ent($mismer_all->kolom42); ?></td> 
                           <td><?= _ent($mismer_all->kolom43); ?></td> 
                           <td><?= _ent($mismer_all->kolom44); ?></td> 
                           <td><?= _ent($mismer_all->kolom45); ?></td> 
                           <td><?= _ent($mismer_all->kolom46); ?></td> 
                           <td><?= _ent($mismer_all->kolom47); ?></td> 
                           <td><?= _ent($mismer_all->NPWP); ?></td> 
                           <td><?= _ent($mismer_all->ACCOUNT_NO); ?></td> 
                           <td><?= _ent($mismer_all->BANK_NAME); ?></td> 
                           <td><?= _ent($mismer_all->kolom51); ?></td> 
                           <td><?= _ent($mismer_all->kolom52); ?></td> 
                           <td><?= _ent($mismer_all->kolom53); ?></td> 
                           <td><?= _ent($mismer_all->kolom54); ?></td> 
                           <td><?= _ent($mismer_all->kolom55); ?></td> 
                           <td><?= _ent($mismer_all->kolom56); ?></td> 
                           <td><?= _ent($mismer_all->kolom57); ?></td> 
                           <td><?= _ent($mismer_all->kolom58); ?></td> 
                           <td><?= _ent($mismer_all->MDR_VISA_BNI); ?></td> 
                           <td><?= _ent($mismer_all->kolom60); ?></td> 
                           <td><?= _ent($mismer_all->kolom61); ?></td> 
                           <td><?= _ent($mismer_all->kolom62); ?></td> 
                           <td><?= _ent($mismer_all->kolom63); ?></td> 
                           <td><?= _ent($mismer_all->kolom64); ?></td> 
                           <td><?= _ent($mismer_all->kolom65); ?></td> 
                           <td><?= _ent($mismer_all->MDR_VISA_OTHER); ?></td> 
                           <td width="200">
                              <?php is_allowed('mismer_all_view', function() use ($mismer_all){?>
                              <a href="<?= site_url('administrator/mismer_all/view/' . $mismer_all->id); ?>" class="label-default"><i class="fa fa-newspaper-o"></i> <?= cclang('view_button'); ?>
                              <?php }) ?>
                              <?php is_allowed('mismer_all_update', function() use ($mismer_all){?>
                              <a href="<?= site_url('administrator/mismer_all/edit/' . $mismer_all->id); ?>" class="label-default"><i class="fa fa-edit "></i> <?= cclang('update_button'); ?></a>
                              <?php }) ?>
                              <?php is_allowed('mismer_all_delete', function() use ($mismer_all){?>
                              <a href="javascript:void(0);" data-href="<?= site_url('administrator/mismer_all/delete/' . $mismer_all->id); ?>" class="label-default remove-data"><i class="fa fa-close"></i> <?= cclang('remove_button'); ?></a>
                               <?php }) ?>
                           </td>
                        </tr>
                      <?php endforeach; ?>
                      <?php if ($mismer_all_counts == 0) :?>
                         <tr>
                           <td colspan="100">
                           Mismer All data is not available
                           </td>
                         </tr>
                      <?php endif; ?>
                     </tbody>
                  </table>
                  </div>
               </div>
               <hr>
               <!-- /.widget-user -->
               <div class="row">
                  <div class="col-md-8">
                     <div class="col-sm-2 padd-left-0 " >
                        <select type="text" class="form-control chosen chosen-select" name="bulk" id="bulk" placeholder="Site Email" >
                           <option value="">Bulk</option>
                           <option value="delete">Delete</option>
                        </select>
                     </div>
                     <div class="col-sm-2 padd-left-0 ">
                        <button type="button" class="btn btn-flat" name="apply" id="apply" title="<?= cclang('apply_bulk_action'); ?>"><?= cclang('apply_button'); ?></button>
                     </div>
                     <div class="col-sm-3 padd-left-0  " >
                        <input type="text" class="form-control" name="q" id="filter" placeholder="<?= cclang('filter'); ?>" value="<?= $this->input->get('q'); ?>">
                     </div>
                     <div class="col-sm-3 padd-left-0 " >
                        <select type="text" class="form-control chosen chosen-select" name="f" id="field" >
                           <option value=""><?= cclang('all'); ?></option>
                            <option <?= $this->input->get('f') == 'ORG' ? 'selected' :''; ?> value="ORG">ORG</option>
                           <option <?= $this->input->get('f') == 'MID' ? 'selected' :''; ?> value="MID">MID</option>
                           <option <?= $this->input->get('f') == 'MERCHANT_DBA_NAME' ? 'selected' :''; ?> value="MERCHANT_DBA_NAME">MERCHANT DBA NAME</option>
                           <option <?= $this->input->get('f') == 'STATUS_EDC' ? 'selected' :''; ?> value="STATUS_EDC">STATUS EDC</option>
                           <option <?= $this->input->get('f') == 'OPENDATE' ? 'selected' :''; ?> value="OPENDATE">OPENDATE</option>
                           <option <?= $this->input->get('f') == 'CITY' ? 'selected' :''; ?> value="CITY">CITY</option>
                           <option <?= $this->input->get('f') == 'STATE' ? 'selected' :''; ?> value="STATE">STATE</option>
                           <option <?= $this->input->get('f') == 'DATE_LAST_MAINTAIN' ? 'selected' :''; ?> value="DATE_LAST_MAINTAIN">DATE LAST MAINTAIN</option>
                           <option <?= $this->input->get('f') == 'CONTACT_PERSON' ? 'selected' :''; ?> value="CONTACT_PERSON">CONTACT PERSON</option>
                           <option <?= $this->input->get('f') == 'TELP1' ? 'selected' :''; ?> value="TELP1">TELP1</option>
                           <option <?= $this->input->get('f') == 'TELP2' ? 'selected' :''; ?> value="TELP2">TELP2</option>
                           <option <?= $this->input->get('f') == 'MSO' ? 'selected' :''; ?> value="MSO">MSO</option>
                           <option <?= $this->input->get('f') == 'MMO' ? 'selected' :''; ?> value="MMO">MMO</option>
                           <option <?= $this->input->get('f') == 'DDA' ? 'selected' :''; ?> value="DDA">DDA</option>
                           <option <?= $this->input->get('f') == 'MERCHANT_TYPE' ? 'selected' :''; ?> value="MERCHANT_TYPE">MERCHANT TYPE</option>
                           <option <?= $this->input->get('f') == 'CHAIN_STORE' ? 'selected' :''; ?> value="CHAIN_STORE">CHAIN STORE</option>
                           <option <?= $this->input->get('f') == 'SOURCE_CODE' ? 'selected' :''; ?> value="SOURCE_CODE">SOURCE CODE</option>
                           <option <?= $this->input->get('f') == 'MERCHANT_NAME' ? 'selected' :''; ?> value="MERCHANT_NAME">MERCHANT NAME</option>
                           <option <?= $this->input->get('f') == 'ALAMAT1' ? 'selected' :''; ?> value="ALAMAT1">ALAMAT1</option>
                           <option <?= $this->input->get('f') == 'ALAMAT2' ? 'selected' :''; ?> value="ALAMAT2">ALAMAT2</option>
                           <option <?= $this->input->get('f') == 'KOTA1' ? 'selected' :''; ?> value="KOTA1">KOTA1</option>
                           <option <?= $this->input->get('f') == 'KOTA2' ? 'selected' :''; ?> value="KOTA2">KOTA2</option>
                           <option <?= $this->input->get('f') == 'ZIPCODE' ? 'selected' :''; ?> value="ZIPCODE">ZIPCODE</option>
                           <option <?= $this->input->get('f') == 'kolom24' ? 'selected' :''; ?> value="kolom24">Kolom24</option>
                           <option <?= $this->input->get('f') == 'MCC1' ? 'selected' :''; ?> value="MCC1">MCC1</option>
                           <option <?= $this->input->get('f') == 'MCC2' ? 'selected' :''; ?> value="MCC2">MCC2</option>
                           <option <?= $this->input->get('f') == 'kolom27' ? 'selected' :''; ?> value="kolom27">Kolom27</option>
                           <option <?= $this->input->get('f') == 'kolom28' ? 'selected' :''; ?> value="kolom28">Kolom28</option>
                           <option <?= $this->input->get('f') == 'kolom29' ? 'selected' :''; ?> value="kolom29">Kolom29</option>
                           <option <?= $this->input->get('f') == 'POS1' ? 'selected' :''; ?> value="POS1">POS1</option>
                           <option <?= $this->input->get('f') == 'POS2' ? 'selected' :''; ?> value="POS2">POS2</option>
                           <option <?= $this->input->get('f') == 'POS3' ? 'selected' :''; ?> value="POS3">POS3</option>
                           <option <?= $this->input->get('f') == 'PLAN1' ? 'selected' :''; ?> value="PLAN1">PLAN1</option>
                           <option <?= $this->input->get('f') == 'PLAN2' ? 'selected' :''; ?> value="PLAN2">PLAN2</option>
                           <option <?= $this->input->get('f') == 'PLAN3' ? 'selected' :''; ?> value="PLAN3">PLAN3</option>
                           <option <?= $this->input->get('f') == 'DATE_LAST_STATEMENT' ? 'selected' :''; ?> value="DATE_LAST_STATEMENT">DATE LAST STATEMENT</option>
                           <option <?= $this->input->get('f') == 'kolom37' ? 'selected' :''; ?> value="kolom37">Kolom37</option>
                           <option <?= $this->input->get('f') == 'kolom38' ? 'selected' :''; ?> value="kolom38">Kolom38</option>
                           <option <?= $this->input->get('f') == 'kolom39' ? 'selected' :''; ?> value="kolom39">Kolom39</option>
                           <option <?= $this->input->get('f') == 'kolom40' ? 'selected' :''; ?> value="kolom40">Kolom40</option>
                           <option <?= $this->input->get('f') == 'kolom41' ? 'selected' :''; ?> value="kolom41">Kolom41</option>
                           <option <?= $this->input->get('f') == 'kolom42' ? 'selected' :''; ?> value="kolom42">Kolom42</option>
                           <option <?= $this->input->get('f') == 'kolom43' ? 'selected' :''; ?> value="kolom43">Kolom43</option>
                           <option <?= $this->input->get('f') == 'kolom44' ? 'selected' :''; ?> value="kolom44">Kolom44</option>
                           <option <?= $this->input->get('f') == 'kolom45' ? 'selected' :''; ?> value="kolom45">Kolom45</option>
                           <option <?= $this->input->get('f') == 'kolom46' ? 'selected' :''; ?> value="kolom46">Kolom46</option>
                           <option <?= $this->input->get('f') == 'kolom47' ? 'selected' :''; ?> value="kolom47">Kolom47</option>
                           <option <?= $this->input->get('f') == 'NPWP' ? 'selected' :''; ?> value="NPWP">NPWP</option>
                           <option <?= $this->input->get('f') == 'ACCOUNT_NO' ? 'selected' :''; ?> value="ACCOUNT_NO">ACCOUNT NO</option>
                           <option <?= $this->input->get('f') == 'BANK_NAME' ? 'selected' :''; ?> value="BANK_NAME">BANK NAME</option>
                           <option <?= $this->input->get('f') == 'kolom51' ? 'selected' :''; ?> value="kolom51">Kolom51</option>
                           <option <?= $this->input->get('f') == 'kolom52' ? 'selected' :''; ?> value="kolom52">Kolom52</option>
                           <option <?= $this->input->get('f') == 'kolom53' ? 'selected' :''; ?> value="kolom53">Kolom53</option>
                           <option <?= $this->input->get('f') == 'kolom54' ? 'selected' :''; ?> value="kolom54">Kolom54</option>
                           <option <?= $this->input->get('f') == 'kolom55' ? 'selected' :''; ?> value="kolom55">Kolom55</option>
                           <option <?= $this->input->get('f') == 'kolom56' ? 'selected' :''; ?> value="kolom56">Kolom56</option>
                           <option <?= $this->input->get('f') == 'kolom57' ? 'selected' :''; ?> value="kolom57">Kolom57</option>
                           <option <?= $this->input->get('f') == 'kolom58' ? 'selected' :''; ?> value="kolom58">Kolom58</option>
                           <option <?= $this->input->get('f') == 'MDR_VISA_BNI' ? 'selected' :''; ?> value="MDR_VISA_BNI">MDR VISA BNI</option>
                           <option <?= $this->input->get('f') == 'kolom60' ? 'selected' :''; ?> value="kolom60">Kolom60</option>
                           <option <?= $this->input->get('f') == 'kolom61' ? 'selected' :''; ?> value="kolom61">Kolom61</option>
                           <option <?= $this->input->get('f') == 'kolom62' ? 'selected' :''; ?> value="kolom62">Kolom62</option>
                           <option <?= $this->input->get('f') == 'kolom63' ? 'selected' :''; ?> value="kolom63">Kolom63</option>
                           <option <?= $this->input->get('f') == 'kolom64' ? 'selected' :''; ?> value="kolom64">Kolom64</option>
                           <option <?= $this->input->get('f') == 'kolom65' ? 'selected' :''; ?> value="kolom65">Kolom65</option>
                           <option <?= $this->input->get('f') == 'MDR_VISA_OTHER' ? 'selected' :''; ?> value="MDR_VISA_OTHER">MDR VISA OTHER</option>
                          </select>
                     </div>
                     <div class="col-sm-1 padd-left-0 ">
                        <button type="submit" class="btn btn-flat" name="sbtn" id="sbtn" value="Apply" title="<?= cclang('filter_search'); ?>">
                        Filter
                        </button>
                     </div>
                     <div class="col-sm-1 padd-left-0 ">
                        <a class="btn btn-default btn-flat" name="reset" id="reset" value="Apply" href="<?= base_url('administrator/mismer_all');?>" title="<?= cclang('reset_filter'); ?>">
                        <i class="fa fa-undo"></i>
                        </a>
                     </div>
                  </div>
                  </form>                  <div class="col-md-4">
                     <div class="dataTables_paginate paging_simple_numbers pull-right" id="example2_paginate" >
                        <?= $pagination; ?>
                     </div>
                  </div>
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
   
    $('.remove-data').click(function(){

      var url = $(this).attr('data-href');

      swal({
          title: "<?= cclang('are_you_sure'); ?>",
          text: "<?= cclang('data_to_be_deleted_can_not_be_restored'); ?>",
          type: "warning",
          showCancelButton: true,
          confirmButtonColor: "#DD6B55",
          confirmButtonText: "<?= cclang('yes_delete_it'); ?>",
          cancelButtonText: "<?= cclang('no_cancel_plx'); ?>",
          closeOnConfirm: true,
          closeOnCancel: true
        },
        function(isConfirm){
          if (isConfirm) {
            document.location.href = url;            
          }
        });

      return false;
    });


    $('#apply').click(function(){

      var bulk = $('#bulk');
      var serialize_bulk = $('#form_mismer_all').serialize();

      if (bulk.val() == 'delete') {
         swal({
            title: "<?= cclang('are_you_sure'); ?>",
            text: "<?= cclang('data_to_be_deleted_can_not_be_restored'); ?>",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "<?= cclang('yes_delete_it'); ?>",
            cancelButtonText: "<?= cclang('no_cancel_plx'); ?>",
            closeOnConfirm: true,
            closeOnCancel: true
          },
          function(isConfirm){
            if (isConfirm) {
               document.location.href = BASE_URL + '/administrator/mismer_all/delete?' + serialize_bulk;      
            }
          });

        return false;

      } else if(bulk.val() == '')  {
          swal({
            title: "Upss",
            text: "<?= cclang('please_choose_bulk_action_first'); ?>",
            type: "warning",
            showCancelButton: false,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Okay!",
            closeOnConfirm: true,
            closeOnCancel: true
          });

        return false;
      }

      return false;

    });/*end appliy click*/


    //check all
    var checkAll = $('#check_all');
    var checkboxes = $('input.check');

    checkAll.on('ifChecked ifUnchecked', function(event) {   
        if (event.type == 'ifChecked') {
            checkboxes.iCheck('check');
        } else {
            checkboxes.iCheck('uncheck');
        }
    });

    checkboxes.on('ifChanged', function(event){
        if(checkboxes.filter(':checked').length == checkboxes.length) {
            checkAll.prop('checked', 'checked');
        } else {
            checkAll.removeProp('checked');
        }
        checkAll.iCheck('update');
    });

  }); /*end doc ready*/
</script>