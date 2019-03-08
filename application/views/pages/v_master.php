<!--========================= Content Wrapper ==============================-->
<div class="tabbable tabs-left">
    <ul class="nav nav-tabs">
        <li class="active"><a href="#tabProduk" data-toggle="tab"><strong>PRODUK</strong></a></li>
        <li><a href="#tabStore" data-toggle="tab"><strong>STORE</strong></a></li>
        <li><a href="#tabUser" data-toggle="tab"><strong>USER</strong></a></li>
        <li><a href="#tabContact" data-toggle="tab"><strong>CONTACT</strong></a></li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane active" id="tabProduk">
            <?php $this->load->view('pages/v_tab_master_produk')?>
        </div>
        <div class="tab-pane" id="tabStore">
            <?php $this->load->view('pages/v_tab_master_store')?>
        </div>
        <div class="tab-pane" id="tabUser">
            <?php $this->load->view('pages/v_tab_master_user')?>
        </div>
        <div class="tab-pane" id="tabContact">
            <?php $this->load->view('pages/v_tab_master_contact')?>
        </div>
    </div>
</div>