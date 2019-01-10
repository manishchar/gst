
</head>
<body>
<table>
  <div class="container-fluid">

      <div class="col-md-12 ">
        <h4>Route Master</h4>
          <hr>
            <div class="form-group">
            	<?php echo form_open('Company/route_master'); ?>

               <div class="col-md-12">
                <div class="col-md-4">
                <label class="control-label">Route Name</label><br>
                
			 <div class="input-group">
                 <select type="text" class="form-control" value="" name="routeName" id="">
							
							<option value="r1">r1</option>
							<option value="r2">r2</option>
							<option value="r3">r3</option>
							<option value="r4">r4</option>
							<option value="r5">r5</option>
							<option value="r6">r6</option>
							</select>
	          </div>
			   </div>
			   <div class="col-md-12"><hr>
			        <div class="col-md-6 col-md-offset-3" style="margin-left: 50%" >
                            
		                   <button type="submit" value="add" name="add" class="btn btn-primary" style="width:120px;margin:10px 10px;margin left; ">ADD</button>
                           <button type="" value="" name="" class="btn btn-danger" style="width:120px;margin:10px 10px;margin left">DELETE</button>
                    </div> 
			  
			   <div>
            </div>
            <?php echo form_close();?>
      </div>
      
    

  </div>
</body>
</table>
</html>