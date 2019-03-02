<?php 
$this->load->view('template/head');
?>
<!--tambahkan custom css disini-->
<link href="<?php echo base_url('assets/bootstrap-datepicker/css/bootstrap-datepicker3.min.css')?>" rel="stylesheet">
<!---
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
-->

<?php
$this->load->view('template/topbar');
$this->load->view('template/sidebar');
?>
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        HIRING LIST
        <small>Sales Force</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Examples</a></li>
        <li class="active">Blank page</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">

    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Title</h3>
            <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
            </div>
        </div>
        <div class="box-body">
<!------ xxxxxxxxxxxxxxxxxxxx ---------->
<hr>
<div class="container bootstrap snippet">
<!--
    <div class="row">
  		<div class="col-sm-8"><h1>User name</h1></div>
    	<div class="col-sm-2"><a href="/users" class="pull-right"><img title="profile image" class="img-circle img-responsive" src="http://www.gravatar.com/avatar/28fd20ccec6865e2d5f0e1f4446eb7bf?s=100"></a></div>
    </div>
-->
	
    <div class="row">
  		<div class="col-sm-3"><!--left col-->
              

      <div class="text-center">
        <img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" class="avatar img-circle img-thumbnail" alt="avatar">
<!--
        <h6>Upload a different photo...</h6>
        <input type="file" class="text-center center-block file-upload">
-->		
      </div></hr><br>

<!---
          <div class="panel panel-default">
            <div class="panel-heading">Website <i class="fa fa-link fa-1x"></i></div>
            <div class="panel-body">
        <img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" class="avatar  img-thumbnail" alt="avatar">
        <h6>Upload a different photo...</h6>
        <input type="file" class="text-center center-block file-upload">			
			</div>
          </div>
          
          
          <ul class="list-group">
            <li class="list-group-item text-muted">Activity <i class="fa fa-dashboard fa-1x"></i></li>
            <li class="list-group-item text-right"><span class="pull-left"><strong>Shares</strong></span> 125</li>
            <li class="list-group-item text-right"><span class="pull-left"><strong>Likes</strong></span> 13</li>
            <li class="list-group-item text-right"><span class="pull-left"><strong>Posts</strong></span> 37</li>
            <li class="list-group-item text-right"><span class="pull-left"><strong>Followers</strong></span> 78</li>
          </ul> 
               
          <div class="panel panel-default">
            <div class="panel-heading">Social Media</div>
            <div class="panel-body">
            	<i class="fa fa-facebook fa-2x"></i> <i class="fa fa-github fa-2x"></i> <i class="fa fa-twitter fa-2x"></i> <i class="fa fa-pinterest fa-2x"></i> <i class="fa fa-google-plus fa-2x"></i>
            </div>
          </div>
-->               
          
        </div><!--/col-3-->
    	<div class="col-sm-7">
            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#home">Informasi Pribadi</a></li>
                <li><a data-toggle="tab" href="#messages">Informasi Tempat Tinggal</a></li>
                <li><a data-toggle="tab" href="#settings">Menu 2</a></li>
              </ul>

              
          <div class="tab-content">
            <div class="tab-pane active" id="home">
                <hr>
                  <form class="form" action="##" method="post" id="registrationForm">
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="EmployeeName"><h4>Nama</h4></label>
                              <input type="text" class="form-control" name="EmployeeName" id="EmployeeName" placeholder="EmployeeName" title="EmployeeName.">
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                            <label for="AgencyName"><h4>Agency</h4></label>
                              <input type="text" class="form-control" name="AgencyName" id="AgencyName" placeholder="AgencyName" title="AgencyName">
                          </div>
                      </div>
          
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="SalesCenterName"><h4>Sales Center</h4></label>
                              <input type="text" class="form-control" name="SalesCenterName" id="SalesCenterName" placeholder="SalesCenterName" title="SalesCenterName">
                          </div>
                      </div>
          
                      <div class="form-group">
                          <div class="col-xs-6">
                             <label for="UserGroupName"><h4>Posisi</h4></label>
                              <input type="text" class="form-control" name="UserGroupName" id="UserGroupName" placeholder="UserGroupName" title="UserGroupName">
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="Atasan"><h4>Atasan</h4></label>
                              <input type="text" class="form-control" name="Atasan" id="Atasan" placeholder="Atasan" title="Atasan">
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="Status"><h4>Status</h4></label>
                              <input type="text" class="form-control" name="Status" id="Status" placeholder="Status" title="Status">
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="EmployeeNewCode"><h4>Kode</h4></label>
                              <input type="text" class="form-control" name="EmployeeNewCode" id="EmployeeNewCode" placeholder="EmployeeNewCode" title="EmployeeNewCode">
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                            <label for="Grade"><h4>Grade/Level</h4></label>
                              <input type="text" class="form-control" name="Grade" id="Grade" placeholder="Grade" title="Grade">
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="EmployeeBirth"><h4>TTL</h4></label>
                              <input type="text" class="form-control" name="EmployeeBirthPlace" id="EmployeeBirthPlace" placeholder="EmployeeBirthPlace" title="EmployeeBirthPlace">
                              <input type="text" class="form-control" name="EmployeeBirthDate" id="EmployeeBirthDate" placeholder="EmployeeBirthDate" title="EmployeeBirthDate">
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                            <label for="Identity"><h4>NO Identitas</h4></label>
                              <input type="text" class="form-control" name="IdentityType" id="IdentityType" placeholder="IdentityType" title="IdentityType">
                              <input type="text" class="form-control" name="IdentityNumber" id="IdentityNumber" placeholder="IdentityNumber" title="IdentityNumber">
                          </div>
                      </div>

                      <div class="form-group">
                           <div class="col-xs-12">
                                <br>
						<img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" class="avatar  img-thumbnail" alt="avatar" >
						<h6>Foto identitas...</h6>
                            </div>
                      </div>					  

                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="MothersMaidenName"><h4>Nama Gadis Ibu Kandung</h4></label>
                              <input type="MothersMaidenName" class="form-control" name="MothersMaidenName" id="MothersMaidenName" placeholder="MothersMaidenName" title="MothersMaidenName">
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                            <label for="SEX"><h4>Jenis Kelamin</h4></label>
                              <input type="SEX" class="form-control" name="SEX" id="SEX" placeholder="SEX" title="SEX">
                          </div>
                      </div>
					                        <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="Religion"><h4>Agama</h4></label>
                              <input type="Religion" class="form-control" name="Religion" id="Religion" placeholder="Religion" title="Religion">
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                            <label for="NPWP"><h4>NPWP</h4></label>
                              <input type="NPWP" class="form-control" name="NPWP" id="NPWP" placeholder="NPWP" title="NPWP">
                          </div>
                      </div>
					                        <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="ActiveDate"><h4>Tanggal Aktif</h4></label>
                              <input type="ActiveDate" class="form-control" name="ActiveDate" id="ActiveDate" placeholder="ActiveDate" title="ActiveDate">
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                            <label for="EndDate"><h4>Tanggal Non Aktif</h4></label>
                              <input type="EndDate" class="form-control" name="EndDate" id="EndDate" placeholder="EndDate" title="EndDate">
                          </div>
                      </div>
					  
					  
                      <div class="form-group">
                           <div class="col-xs-12">
                                <br>
                              	<button class="btn btn-lg btn-success" type="submit"><i class="glyphicon glyphicon-ok-sign"></i> Save</button>
                               	<button class="btn btn-lg" type="reset"><i class="glyphicon glyphicon-repeat"></i> Reset</button>
                            </div>
                      </div>
              	</form>
              
              <hr>
              
             </div><!--/tab-pane-->
             <div class="tab-pane" id="messages">
               
               <h2></h2>
               
               <hr>
                  <form class="form" action="##" method="post" id="registrationForm">
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="Province"><h4>Propinsi</h4></label>
                              <input type="text" class="form-control" name="Province" id="Province" placeholder="Province" title="Province">
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                            <label for="StreetAddress"><h4>Alamat</h4></label>
                              <input type="text" class="form-control" name="StreetAddress" id="StreetAddress" placeholder="StreetAddress" title="StreetAddress">
                          </div>
                      </div>
          
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="PostalCode"><h4>Kode Pos</h4></label>
                              <input type="text" class="form-control" name="PostalCode" id="PostalCode" placeholder="PostalCode" title="PostalCode">
                          </div>
                      </div>
          
                      <div class="form-group">
                          <div class="col-xs-6">
                             <label for="FixedPhoneNumber"><h4>Nomor Telepon Rumah</h4></label>
                              <input type="text" class="form-control" name="FixedPhoneNumber" id="FixedPhoneNumber" placeholder="FixedPhoneNumber" title="FixedPhoneNumber">
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="PhoneNumber"><h4>Nomor Handphone 1</h4></label>
                              <input type="text" class="form-control" name="PhoneNumber" id="PhoneNumber" placeholder="PhoneNumber" title="PhoneNumber">
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="PhoneNumber2"><h4>Nomor Handphone 2</h4></label>
                              <input type="text" class="form-control" name="PhoneNumber2" id="PhoneNumber2" placeholder="PhoneNumber2" title="PhoneNumber2">
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="EmailAddress"><h4>Alamat Email</h4></label>
                              <input type="EmailAddress" class="form-control" id="EmailAddress" placeholder="EmailAddress" title="EmailAddress">
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="MaritalStatus"><h4>Status Pernikahan</h4></label>
                              <input type="text" class="form-control" name="MaritalStatus" id="MaritalStatus" placeholder="MaritalStatus" title="MaritalStatus">
                          </div>
                      </div>
					  
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                            <label for="password2"><h4>Tinggi / Berat Badan</h4></label>
                              <input type="text" class="form-control" name="Height" id="Height" placeholder="Height" title="Height"> cm
							  <input type="text" class="form-control" name="Weight" id="Weight" placeholder="Weight" title="Weight"> kg
                          </div>
                      </div>
					  
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="EmergencyName"><h4>Nama Orang Yang Bisa Dihubungi Dalam Keadaan Darurat</h4></label>
                              <input type="text" class="form-control" name="EmergencyName" id="EmergencyName" placeholder="EmergencyName" title="EmergencyName">
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                            <label for="EmergencyStatus"><h4>Hubungan</h4></label>
                              <input type="text" class="form-control" name="EmergencyStatus" id="EmergencyStatus" placeholder="EmergencyStatus" title="EmergencyStatus">
                          </div>
                      </div>

                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="EmergencyNumber"><h4>Nomor Telepon</h4></label>
                              <input type="text" class="form-control" name="EmergencyNumber" id="EmergencyNumber" placeholder="EmergencyNumber" title="EmergencyNumber">
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                            <label for="EmergencyAddress"><h4>Alamat</h4></label>
                              <input type="text" class="form-control" name="EmergencyAddress" id="EmergencyAddress" placeholder="EmergencyAddress" title="EmergencyAddress">
                          </div>
                      </div>


					  
					  
                      <div class="form-group">
                           <div class="col-xs-12">
                                <br>
                              	<button class="btn btn-lg btn-success" type="submit"><i class="glyphicon glyphicon-ok-sign"></i> Save</button>
                               	<button class="btn btn-lg" type="reset"><i class="glyphicon glyphicon-repeat"></i> Reset</button>
                            </div>
                      </div>
              	</form>
               
             </div><!--/tab-pane-->
             <div class="tab-pane" id="settings">
            		
               	
                  <hr>
                  <form class="form" action="##" method="post" id="registrationForm">
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="first_name"><h4>CCCCC</h4></label>
                              <input type="text" class="form-control" name="first_name" id="first_name" placeholder="first name" title="enter your first name if any.">
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                            <label for="last_name"><h4>Last name</h4></label>
                              <input type="text" class="form-control" name="last_name" id="last_name" placeholder="last name" title="enter your last name if any.">
                          </div>
                      </div>
          
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="phone"><h4>Phone</h4></label>
                              <input type="text" class="form-control" name="phone" id="phone" placeholder="enter phone" title="enter your phone number if any.">
                          </div>
                      </div>
          
                      <div class="form-group">
                          <div class="col-xs-6">
                             <label for="mobile"><h4>Mobile</h4></label>
                              <input type="text" class="form-control" name="mobile" id="mobile" placeholder="enter mobile number" title="enter your mobile number if any.">
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="email"><h4>Email</h4></label>
                              <input type="email" class="form-control" name="email" id="email" placeholder="you@email.com" title="enter your email.">
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="email"><h4>Location</h4></label>
                              <input type="email" class="form-control" id="location" placeholder="somewhere" title="enter a location">
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="password"><h4>Password</h4></label>
                              <input type="password" class="form-control" name="password" id="password" placeholder="password" title="enter your password.">
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                            <label for="password2"><h4>Verify</h4></label>
                              <input type="password" class="form-control" name="password2" id="password2" placeholder="password2" title="enter your password2.">
                          </div>
                      </div>
                      <div class="form-group">
                           <div class="col-xs-12">
                                <br>
                              	<button class="btn btn-lg btn-success pull-right" type="submit"><i class="glyphicon glyphicon-ok-sign"></i> Save</button>
                               	<!--<button class="btn btn-lg" type="reset"><i class="glyphicon glyphicon-repeat"></i> Reset</button>-->
                            </div>
                      </div>
              	</form>
              </div>
               
              </div><!--/tab-pane-->
          </div><!--/tab-content-->

        </div><!--/col-9-->
    </div><!--/row-->

<!------ xxxxxxxxxxxxxxxxxxxx ---------->

		
        </div><!-- /.box-body -->
        <div class="box-footer">
            Footer
        </div><!-- /.box-footer-->
    </div><!-- /.box -->

</section><!-- /.content -->

<?php 
$this->load->view('template/js');
?>

<!--tambahkan custom js disini
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
--->
<script src="<?php echo base_url('assets/bootstrap-datepicker/js/bootstrap-datepicker.min.js')?>"></script>

<script type="text/javascript">
$(document).ready(function() {

$(':input').attr('readonly','readonly');    
    var readURL = function(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('.avatar').attr('src', e.target.result);
            }
    
            reader.readAsDataURL(input.files[0]);
        }
    }
    

    $(".file-upload").on('change', function(){
        readURL(this);
    });

	
	    $.ajax({
        url : "<?php echo site_url('employee/ajax_employee_detail/')?>/"+<?=$this->uri->segment(3);?>,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
console.log(data);			
$('[name="EmployeeName"]').val(data.EmployeeName);
$('[name="EmergencyName"]').val(data.EmergencyName);
$('[name="AgencyName"]').val(data.AgencyName);
$('[name="SalesCenterName"]').val(data.SalesCenterName);
$('[name="UserGroupName"]').val(data.UserGroupName);
$('[name="Atasan"]').val(data.Atasan);
$('[name="Status"]').val(data.Status);
$('[name="EmployeeNewCode"]').val(data.EmployeeNewCode);
$('[name="Grade"]').val(data.Grade);
$('[name="EmployeeBirthPlace"]').val(data.EmployeeBirthPlace);
$('[name="EmployeeBirthDate"]').val(data.EmployeeBirthDate);
$('[name="IdentityType"]').val(data.IdentityType);
$('[name="IdentityNumber"]').val(data.IdentityNumber);
$('[name="IdentityFileName"]').val(data.IdentityFileName);
/*
$('[name="EmployeeID"]').val(data.EmployeeID);
$('[name="EmployeeName"]').val(data.EmployeeName);
$('[name="PhotoFileName"]').val(data.PhotoFileName);
$('[name="EmergencyName"]').val(data.EmergencyName);
$('[name="AgencyName"]').val(data.AgencyName);
$('[name="SalesCenterName"]').val(data.SalesCenterName);
$('[name="UserGroupName"]').val(data.UserGroupName);
$('[name="Atasan"]').val(data.Atasan);
$('[name="Status"]').val(data.Status);
$('[name="EmployeeNewCode"]').val(data.EmployeeNewCode);
$('[name="Grade"]').val(data.Grade);
$('[name="EmployeeBirthPlace"]').val(data.EmployeeBirthPlace);
$('[name="EmployeeBirthDate"]').val(data.EmployeeBirthDate);
$('[name="IdentityType"]').val(data.IdentityType);
$('[name="IdentityNumber"]').val(data.IdentityNumber);
$('[name="IdentityFileName"]').val(data.IdentityFileName);
$('[name="MothersMaidenName"]').val(data.MothersMaidenName);


$('[name="SEX"]').val(data.SEX);
$('[name="Religion"]').val(data.Religion);
$('[name="NPWP"]').val(data.NPWP);
$('[name="ActiveDate"]').val(data.ActiveDate);
$('[name="EndDate"]').val(data.EndDate);
$('[name="Province"]').val(data.Province);
$('[name="StreetAddress"]').val(data.StreetAddress);
$('[name="PostalCode"]').val(data.PostalCode);
$('[name="FixedPhoneNumber"]').val(data.FixedPhoneNumber);
$('[name="PhoneNumber"]').val(data.PhoneNumber);
$('[name="PhoneNumber2"]').val(data.PhoneNumber2);
$('[name="EmailAddress"]').val(data.EmailAddress);
$('[name="MaritalStatus"]').val(data.MaritalStatus);
$('[name="Height"]').val(data.Height);
$('[name="Weight"]').val(data.Weight);
$('[name="EmergencyStatus"]').val(data.EmergencyStatus);
$('[name="EmergencyNumber"]').val(data.EmergencyNumber);
$('[name="EmergencyAddress"]').val(data.EmergencyAddress);
*/

//            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
 //           $('.modal-title').text('Edit employee'); // Set title to Bootstrap modal title

        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });

	
	
});

</script>
<?php
$this->load->view('template/foot');
?>  
  

                                                      