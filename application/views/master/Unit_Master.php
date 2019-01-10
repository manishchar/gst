
</head>
<body>
<table>
  <div class="container-fluid">
<br>
<br>
      <div class="col-md-12 ">
        <h4>Unit Master</h4>
          
            <div class="form-group">
            <?php echo form_open('Company/unit_master_insert'); ?>

               <div class="col-md-12">
                <div class="col-md-4">
                <label class="control-label">Unit</label><br>
                
			 <div class="input-group">
                 <select type="text" class="form-control" value="" name="unit" id="" required="required">
							
							<option value="unit1">nos</option>
							<option value="unit2">nos</option>
							<option value="unit3">nos</option>
							<option value="unit4">nos</option>
							<option value="unit5">nos</option>
							<option value="unit6">nos</option>
							</select>
	          </div>
			   </div>
			 
			   <div class="col-md-6 col-md-offset-3 >
			
			   <div class="" style="float:right!important;margin-top: 70px;">
              
		 <button type="" value="" name="" class="btn btn-primary" style="width:120px;margin:20px 30px;margin left; ">ADD</button>
        <button type="" value="" name="" class="btn btn-danger" style="width:120px;margin:20px 30px;margin left">DELETE</button>
              </div> 
			  </div>
			 <?php echo form_close();?>	
            </div>
      </div>
      
    

  </div>
</body>
</table>
</html>