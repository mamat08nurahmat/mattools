<!DOCTYPE html>
<html>
    <head> 
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>DATATABLE</title>
    <link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet">
    
    </head> 
<body>

    <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Name</th>
                <th>Position</th>
                <th>Office</th>
                <th>Extn.</th>
                <th>Start date</th>
                <th>Salary</th>
<!--
-->				
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>Name</th>
                <th>Position</th>
                <th>Office</th>
                <th>Extn.</th>
                <th>Start date</th>
                <th>Salary</th>
            </tr>
<!---
-->				
        </tfoot>
    </table>
		
</body>	

<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

    
    

<script type="text/javascript">

$(document).ready(function() {
    $('#example').DataTable( {
//        "ajax": "<?php echo site_url('employee/ajax_defer_render')?>",
		"ajax": "<?php echo base_url('data/arrays.txt')?>",	//dummy data dev	
        "deferRender": true
    } );
} );

</script>
</html>
	
	
	
	
	
	
