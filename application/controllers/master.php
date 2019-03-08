<?php
class Master extends CI_Controller{
    function __construct(){
        parent::__construct();
        if($this->session->userdata('login_status') != TRUE ){
            $this->session->set_flashdata('notif','Maaf, Anda tidak diperbolehkan masuk tanpa login !');
            redirect('');
        };
        $this->load->model('model_app');
        $this->load->helper('currency_format_helper');
    }

    function index(){
        $data=array(
            'title'=>'Master Data',
            'active_master'=>'active',
            'kd_produk'=>$this->model_app->getKodeProduk(),
            'kd_store'=>$this->model_app->getKodeStore(),
            'kd_user'=>$this->model_app->getKodeUser(),
            'data_produk'=>$this->model_app->getAllData('produk'),
            'data_store'=>$this->model_app->getAllData('store'),
            'data_contact'=>$this->model_app->getAllData('contact'),
            'data_user'=>$this->model_app->getAllData('users'),
        );
        $this->load->view('element/v_header',$data);
    if ($this->session->userdata('LEVEL') == 'KAE'){
        $this->load->view('pages/v_master');
    }else{
    $this->load->view('errors/index');
    }
        $this->load->view('element/v_footer');
    }
    
//    ===================== INSERT =====================
    function tambah_produk(){
        $data=array(
            'kd_produk'=>$this->input->post('kd_produk'),
            'nm_produk'=>$this->input->post('nm_produk'),
            'stok'=>$this->input->post('stok'),
            'harga'=>$this->input->post('harga'),
        );
        $this->model_app->insertData('produk',$data);
        redirect("master");
    }
    function tambah_store(){
        $data=array(
            'kd_store'=> $this->input->post('kd_store'),
            'nm_store'=>$this->input->post('nm_store'),
            'alamat'=>$this->input->post('alamat'),
            'email'=>$this->input->post('email'),
        );
        $this->model_app->insertData('store',$data);
        redirect("master");
    }
    function tambah_user(){
        $data=array(
            'kd_user'=> $this->input->post('kd_user'),
            'email'=>$this->input->post('email'),
            'password'=>md5($this->input->post('password')),
            'nama'=> $this->input->post('nama'),
            'level'=>$this->input->post('level'),
        );
        $this->model_app->insertData('users',$data);
        redirect("master");
    }


//    ======================== EDIT =======================
    function edit_produk(){
        $id['kd_produk'] = $this->input->post('kd_produk');
        $data=array(
            'nm_produk'=>$this->input->post('nm_produk'),
            'stok'=>$this->input->post('stok'),
            'harga'=>$this->input->post('harga'),
        );
        $this->model_app->updateData('produk',$data,$id);
        redirect("master");
    }
    function edit_store(){
        $id['kd_store'] = $this->input->post('kd_store');
        $data=array(
            'nm_store'=>$this->input->post('nm_store'),
            'alamat'=>$this->input->post('alamat'),
            'email'=>$this->input->post('email'),
        );
        $this->model_app->updateData('store',$data,$id);
        redirect("master");
    }
    function edit_contact(){
        $id['id'] = 1;
        $data=array(
            'nama'=> $this->input->post('nama'),
            'owner'=>$this->input->post('owner'),
            'alamat'=>$this->input->post('alamat'),
            'telp'=>$this->input->post('telp'),
            'email'=>$this->input->post('email'),
            'website'=>$this->input->post('website'),
            'deskripsi'=>$this->input->post('deskripsi'),
        );
        $this->model_app->updateData('contact',$data,$id);
        redirect("master");
    }
    function edit_user(){
        $id['kd_user'] = $this->input->post('kd_user');
        $data=array(
            'email'=>$this->input->post('email'),
            'password'=>md5($this->input->post('password')),
            'nama'=> $this->input->post('nama'),
            'level'=>$this->input->post('level'),
        );
        $this->model_app->updateData('users',$data,$id);
        redirect("master");
    }

//    ========================== DELETE =======================
    function hapus_produk(){
        $id['kd_produk'] = $this->uri->segment(3);
        $this->model_app->deleteData('produk',$id);
        redirect("master");
    }
    function hapus_store(){
        $id['kd_store'] = $this->uri->segment(3);
        $this->model_app->deleteData('store',$id);
        redirect("master");
    }
    function hapus_user(){
        $id['kd_user'] = $this->uri->segment(3);
        $this->model_app->deleteData('users',$id);
        redirect("master");
    }
}