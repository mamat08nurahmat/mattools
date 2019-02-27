<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Performancedetail extends CI_Controller
{
    
        
    function __construct()
    {
        parent::__construct();
        $this->load->model('Performancedetail_model');
        $this->load->library('form_validation');
    }

    public function promo()
    {

        
//        $performancedetail = $this->Performancedetail_model->get_all();

        $data = array(
        'header' => 'AGUSNET',
        'tittle' => 'Promo',
  //          'performancedetail_data' => $performancedetail
        );

        //$this->session->unset_userdata('tgl_awal');
        //$this->session->unset_userdata('tgl_akhir');        
        
//        $this->template->load('template','performancedetail_promo_list', $data);
          $this->load->view('/performancedetail/performancedetail_promo_list', $data);
    }
    
    public function cekKode(){
        
        $kode_promo = $_POST['kode_promo'];
        $promo = $this->db->query("SELECT * FROM Promo WHERE PromoCode='$kode_promo'")->result();
        $output = '';
foreach($promo as $p){
            $promo_name = $p->PromoName;
            $start_date = date("Y-m-d",strtotime($p->StartDate));
            $end_date  = date("Y-m-d",strtotime($p->EndDate));
/*
        $output .= $promo_name;
        $output .= '<br>';
        $output .= $start_date;
        $output .= '<br>';
        $output .= $end_date;
        $output .= '<br>';
*/  
$output='
                    <div class="form-group">
                        <label  class="col-sm-2 control-label">Promo Name : '.$promo_name.'</label>
                        <label  class="col-sm-2 control-label">Start Date : '.$start_date.'</label>
                        <label  class="col-sm-2 control-label">End Date   :'.$end_date.'</label>
                        <div class="col-sm-6">
                        </div>
                    </div>  
';
    
}       
//      $output .= 'DATAAAAAAAAAAAAAAAA';
//      $output .= $promo;
        echo $output;
    }
    
    public function getData(){
    
    //$tgl_awal = $_POST['tgl_awal'];
    //$tgl_akhir = $_POST['tgl_akhir'];
    
    //$type = $_POST['type'];
    
    if($this->input->post('type')=='A'){
        $type=" AND Parameter11 = 'A' ";
        
    }else{
        $type="";
    }
    
        $kode_promo= $this->input->post('kode_promo');
          $bulan= $this->input->post('bulan');
        
//        $tgl_awal= date("Y-m-d",strtotime($this->input->post('tgl_awal')));
//        $tgl_akhir= date("Y-m-d",strtotime($this->input->post('tgl_akhir')));

//    $performancedetail_data = $this->Performancedetail_model->get_all();  
/*
    $performancedetail_data = $this->db->query("
    SELECT  pd.* 
    FROM Performancedetail pd
    LEFT JOIN PerformanceEmployee pe ON pd.BatchID=pe.BatchID AND pd.RowID=pe.RowID 
    LEFT JOIN Employee e ON pe.EmployeeID=e.EmployeeID
    LEFT JOIN Promo p ON SUBSTRING(pd.Parameter2,19,3)=p.PromoCode  
    WHERE 
    pd.AsOfDate between '$tgl_awal' and '$tgl_akhir' 
    ".$type."
    AND p.PromoCode='$kode_promo'   
    AND LEN(pd.Parameter2) >= 21 ORDER BY pd.AsOfDate 
    ")->result();   
    
    --pd.AsOfDate between '$tgl_awal' and '$tgl_akhir' 
    --".$type." 
*/  
    $performancedetail_data = $this->db->query("

        SELECT 
    SUBSTRING(pd.Parameter2,19,3) as PromoCode,
    pd.* 
    FROM Performancedetail pd
    LEFT JOIN PerformanceEmployee pe ON pd.BatchID=pe.BatchID AND pd.RowID=pe.RowID 
    LEFT JOIN Employee e ON pe.EmployeeID=e.EmployeeID  
    WHERE 
    LEN(pd.Parameter2) >= 21    
    AND SUBSTRING(pd.Parameter2,19,3) = '$kode_promo'
    AND MONTH(pd.AsOfDate)='$bulan' 
    ".$type."
    ORDER BY pd.AsOfDate    
    
    

    ")->result();   
    
/*

    $output_tabel='TABELLLLLLLLLLLLLLL';
    $output_tabel.='--------------<br>';
    $output_tabel.='tgl_awal : '.$tgl_awal;
    $output_tabel.='--------------<br>';
    $output_tabel.='tgl_akhir : '.$tgl_akhir;
    $output_tabel.='--------------<br>';
    $output_tabel.='type : '.$type;
$output_tabel.=$type;
$output_tabel.='</br>------';
*/  
$output_tabel='';
/*

$output_tabel.='

          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  
            <a type="button" id="excel"  class="btn btn-primary"><i class="fa fa-file-excel-o"></i> Excel</a>

        
                </div>
                <div class="box-body">
        <table class="table table-bordered table-striped" id="mytable">
            <thead>
                <tr>
            <th width="80px">No</th>
            <th>Open Date</th>
            <th>SC DSR</th>
            <th>Nama Nasabah</th>
            <th>DOB</th>
            <th>Action</th>
                </tr>
            </thead>
        <tbody>
';

         $start = 1;
            foreach ($performancedetail_data as $performancedetail)
           {
$link = site_url("performancedetail_promo/read/".$performancedetail->RowID."");
           
$output_tabel.='
            <tr>
            <td>'.$start++.'</td>
            <td>'.$performancedetail->AsOfDate.'</td>
            <td>'.$performancedetail->Parameter6.'</td>
            <td>'.$performancedetail->CustomerName.'</td>
            <td>'.$performancedetail->CustomerBirthDate.'</td>
            <td style="text-align:center" width="40px">
            
            <td>
            <a type="button"  href="'.$link.'" class="btn btn-primary">DETAIL</a>
            </td>

            </td>
            </tr>
';
            }
*/          
$output_tabel.='

    <div class="row-fluid">
        <div class="span4">&nbsp;</div>
        <div class="span4 loader" style="text-align: center">
            <div class="progress progress-striped active" style="display: none">
                <div class="bar" style="width: 100%;"></div>
            </div>
        </div>
        <div class="span4">&nbsp;</div>
    </div>

';  


    $output_tabel.='

        <table class="table table-bordered table-striped" id="mytable">
            <thead>
            <tr>
                <th width="80px">No</th>
                <th>Open Date</th>
                <th>SC DSR</th>
                <th>Nama Nasabah</th>
                <th>DOB</th>
                <th>Source</th>
                <th>Promo</th>
                <th>Status</th>
                </tr>
            </thead>
        <tbody>';
        
         $start = 1;
            foreach ($performancedetail_data as $performancedetail)
           {
/*
$link = site_url("performancedetail_promo/read/".$performancedetail->RowID."");
*/      
           
$output_tabel.='
            <tr>
            <td>'.$start++.'</td>
            <td>'.date("Y-m-d",strtotime($performancedetail->AsOfDate)).'</td>
            <td>'.$performancedetail->Parameter6.'</td>
            <td>'.$performancedetail->CustomerName.'</td>
            <td>'.date("Y-m-d",strtotime($performancedetail->CustomerBirthDate)).'</td>
  <td>'.$performancedetail->Parameter2.'</td>
  <td>'.substr($performancedetail->Parameter2,18,3).'</td>
  <td>'.$performancedetail->Parameter11.'</td>
          

            </td>
            </tr>
';            

}
                

$output_tabel.='
        </tbody>
        
    
        
        </table>    
    ';
    
$output_tabel.='
        <script type="text/javascript">
            $(document).ready(function () {
                
                $("#mytable").dataTable();
            });
        </script>
';

//$output_tabel.=$kode_promo;

/*
$output_tabel.="

<script>
$(document).ready(function() {
    // Setup - add a text input to each footer cell
    $('#mytable tfoot th').each( function () {
        var title = $(this).text();
        $(this).html( '<input type='text' placeholder='Search '+title+'' />' );
    } );
 
    // DataTable
    var table = $('#mytable').DataTable();
 
    // Apply the search
    table.columns().every( function () {
        var that = this;
 
        $( 'input', this.footer() ).on( 'keyup change', function () {
            if ( that.search() !== this.value ) {
                that
                    .search( this.value )
                    .draw();
            }
        } );
    } );
} );
</script>

";
*/


        
    echo $output_tabel;
    }

///versi 2

    function v2(){
        $data=array(
            'title'=>'Laporan Penjualan',
            'active_laporan'=>'active',
            //'data_penjualan'=>$this->model_app->getAllDataPenjualan(),
        );
//        $this->session->unset_userdata('tgl_awal');
//        $this->session->unset_userdata('tgl_akhir');


        $this->load->view('template/header');
        $this->load->view('v_laporan');
        $this->load->view('template/footer');

    }


    function cari(){
        $tgl_awal= date("Y-m-d",strtotime($this->input->post('tgl_awal')));
        $tgl_akhir= date("Y-m-d",strtotime($this->input->post('tgl_akhir')));
/*
        $sess_data=array(
            'tgl_awal'=>$tgl_awal,
            'tgl_akhir'=>$tgl_akhir
        );
        $this->session->set_userdata($sess_data);
*/      
        
//  $dt_result = $this->model_app->getLapPenjualan($tgl_awal,$tgl_akhir);       
    $dt_result = $this->db->query("
    SELECT  * FROM Performancedetail 
    WHERE AsOfDate between '$tgl_awal' and '$tgl_akhir'
    ")->result();   
        
//print_r($dt_result);die();
        
        $data=array(
            'dt_result'=>$dt_result ,
            //'tgl_awal'=>date("d M Y",strtotime($this->session->userdata('tgl_awal'))),
            //'tgl_akhir'=>date("d M Y",strtotime($this->session->userdata('tgl_akhir'))),
        );
        
        $this->load->view('template/header');
        $this->load->view('v_result_laporan',$data);
        $this->load->view('template/footer');       
    }



    public function excel($bulan,$type,$kode_promo)
//    public function excel($tgl_awal,$tgl_akhir,$type)
    //public function excel()
    {
        
/*
        $tgl_awal= date("Y-m-d",strtotime($this->input->post('tgl_awal')));
        $tgl_akhir= date("Y-m-d",strtotime($this->input->post('tgl_akhir')));
        $type = $this->input->post('type');
*/      

      //  $tgl_awal= date("Y-m-d",strtotime($tgl_awal));
       // $tgl_akhir= date("Y-m-d",strtotime($tgl_akhir));
    if($type=='A'){
        $type=" AND Parameter11 = 'A' ";
        
    }else{
        $type="";
    }       
/*
        print_r($tgl_awal);
        print_r('<br>');
        print_r($tgl_akhir);
        print_r('<br>');
        print_r($type);
        print_r('<br>');
        print_r($kode_promo);
die();      
*/      
        $this->load->helper('exportexcel');
        $namaFile = "KODE_".$kode_promo."_BULAN_".$bulan.".xls";
        $judul = "Report PromoCode";
        $tablehead = 0;
        $tablebody = 1;
        $nourut = 1;
        //penulisan header
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header("Content-Disposition: attachment;filename=" . $namaFile . "");
        header("Content-Transfer-Encoding: binary ");

        xlsBOF();

        $kolomhead = 0;
        xlsWriteLabel($tablehead, $kolomhead++, "No");
//  xlsWriteLabel($tablehead, $kolomhead++, "BatchID");
    xlsWriteLabel($tablehead, $kolomhead++, "ApplicationSource");
    xlsWriteLabel($tablehead, $kolomhead++, "AsOfDate");
    xlsWriteLabel($tablehead, $kolomhead++, "SC DSR");
    xlsWriteLabel($tablehead, $kolomhead++, "CustomerName");
    xlsWriteLabel($tablehead, $kolomhead++, "CustomerBirthDate");
    xlsWriteLabel($tablehead, $kolomhead++, "SourceCode");
    xlsWriteLabel($tablehead, $kolomhead++, "PromoCode");
    xlsWriteLabel($tablehead, $kolomhead++, "Status");
    
/*
    xlsWriteLabel($tablehead, $kolomhead++, "Parameter1");
    xlsWriteLabel($tablehead, $kolomhead++, "Parameter2");
    xlsWriteLabel($tablehead, $kolomhead++, "Parameter3");
    xlsWriteLabel($tablehead, $kolomhead++, "Parameter4");
    xlsWriteLabel($tablehead, $kolomhead++, "Parameter5");
    xlsWriteLabel($tablehead, $kolomhead++, "Parameter6");
    xlsWriteLabel($tablehead, $kolomhead++, "Parameter7");
    xlsWriteLabel($tablehead, $kolomhead++, "Parameter8");
    xlsWriteLabel($tablehead, $kolomhead++, "Parameter9");
    xlsWriteLabel($tablehead, $kolomhead++, "Parameter10");
    xlsWriteLabel($tablehead, $kolomhead++, "Parameter11");
    xlsWriteLabel($tablehead, $kolomhead++, "Parameter12");
    xlsWriteLabel($tablehead, $kolomhead++, "Parameter13");
    xlsWriteLabel($tablehead, $kolomhead++, "Parameter14");
    xlsWriteLabel($tablehead, $kolomhead++, "Parameter15");
*/  
    
/*
$dt_result = $this->db->query("
    SELECT  pd.* FROM Performancedetail pd
    LEFT JOIN PerformanceEmployee pe ON pd.BatchID=pe.BatchID AND pd.RowID=pe.RowID 
    LEFT JOIN Employee e ON pe.EmployeeID=e.EmployeeID
    WHERE pd.AsOfDate between '$tgl_awal' and '$tgl_akhir' ".$type." 
    AND LEN(pd.Parameter2) >= 21 ORDER BY pd.AsOfDate
    ")->result();   
*/

$dt_result = $this->db->query("

        SELECT 
    pd.* 
    FROM Performancedetail pd
    LEFT JOIN PerformanceEmployee pe ON pd.BatchID=pe.BatchID AND pd.RowID=pe.RowID 
    LEFT JOIN Employee e ON pe.EmployeeID=e.EmployeeID  
    WHERE 
    LEN(pd.Parameter2) >= 21    
    AND SUBSTRING(pd.Parameter2,19,3) = '$kode_promo'
    AND MONTH(pd.AsOfDate)='$bulan' 
    ".$type."
    ORDER BY pd.AsOfDate    


    ")->result();   


    foreach ($dt_result  as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
//      xlsWriteNumber($tablebody, $kolombody++, $data->BatchID);
        xlsWriteLabel($tablebody, $kolombody++, $data->ApplicationSource);
        xlsWriteLabel($tablebody, $kolombody++, $data->AsOfDate);
        xlsWriteLabel($tablebody, $kolombody++, $data->Parameter6);
        xlsWriteLabel($tablebody, $kolombody++, $data->CustomerName);
        xlsWriteLabel($tablebody, $kolombody++, $data->CustomerBirthDate);

        xlsWriteLabel($tablebody, $kolombody++, $data->Parameter2);
        xlsWriteLabel($tablebody, $kolombody++, substr($data->Parameter2,18,3));
        xlsWriteLabel($tablebody, $kolombody++, $data->Parameter11);

/*
        xlsWriteLabel($tablebody, $kolombody++, $data->Parameter1);
        xlsWriteLabel($tablebody, $kolombody++, $data->Parameter2);
        xlsWriteLabel($tablebody, $kolombody++, $data->Parameter3);
        xlsWriteLabel($tablebody, $kolombody++, $data->Parameter4);
        xlsWriteLabel($tablebody, $kolombody++, $data->Parameter5);
        xlsWriteLabel($tablebody, $kolombody++, $data->Parameter6);
        xlsWriteLabel($tablebody, $kolombody++, $data->Parameter7);
        xlsWriteLabel($tablebody, $kolombody++, $data->Parameter8);
        xlsWriteLabel($tablebody, $kolombody++, $data->Parameter9);
        xlsWriteLabel($tablebody, $kolombody++, $data->Parameter10);
        xlsWriteLabel($tablebody, $kolombody++, $data->Parameter11);
        xlsWriteLabel($tablebody, $kolombody++, $data->Parameter12);
        xlsWriteLabel($tablebody, $kolombody++, $data->Parameter13);
        xlsWriteLabel($tablebody, $kolombody++, $data->Parameter14);
        xlsWriteLabel($tablebody, $kolombody++, $data->Parameter15);
*/      

        $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

//----------------- 

}