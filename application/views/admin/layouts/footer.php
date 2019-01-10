<style rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css"></style>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

<script type="text/javascript"> 
//alert();
    $(document).ready(function() {
        //alert('');
        var table = '';
        var table=$('#bankResult').DataTable( {
            "processing": true,
            "serverSide": true,
            "ajax": {
              'url':"<?php echo base_url().'master/get_bank_details'; ?>",
              "type": "POST"
            }, "columns": [
                { "data": "accountId"},
                { "data": "bankName"},
                { "data": "accountHolder"},
                { "data": "accountNumber"},
                { "data": "branch"},
                { "data": "ifscCode"},
                { "data": "action"}
                
            ]
        } );

    });

    function bankEdit(cek_id){
        var r = confirm("Are You Sure To select!");

        if(r){
            $.ajax({
                type  : "POST",
                url   : "<?php echo base_url()."master/get_bank"; ?>",
                data  : {cek_id:cek_id},
                success:function(result){
                   var obj = JSON.parse(result);
                   if(obj.status == 'success'){
                    console.log(obj.data);
                    console.log(obj.data.id);
                     $("#id").val(obj.data.id);
                     $("#accountId").val(obj.data.accountId); 
                     $("#bankName").val(obj.data.bankName);
                     $("#accountHolder").val(obj.data.accountHolder); 
                     $("#accountNumber").val(obj.data.accountNumber); 
                     $("#branch").val(obj.data.branch); 
                     $("#ifscCode").val(obj.data.ifscCode);
                     $('#bankSubmit').prop('disabled',true);
                    //$('#submit').prop('disabled',true);
                   }
                   if(obj.status == 'failed'){
                        alert(obj.message);
                   }
                }
            });    
        }else {
          txt = "You pressed Cancel!";
        }
    }

    $('#bankDelete').click(function(){  
     alert('Ready To delete');
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url('master/delete_bank_details') ?>", 
                    data: $("#bankForm").serialize(),
                    success: function(result) 
                    {
                    console.log(result);
                    var obj = JSON.parse(result);
                   if(obj.status=='success'){
                       $('#errorMessage').html('<div class="alert alert-success">'+obj.message+'</div>');
                       $('#bankResult').DataTable().ajax.reload();
                       $('bankForm').trigger('reset');
                       //window.location.reload(); 
                    }
                    if(obj.status=='failed'){
                        $('#errorMessage').html('<div class="alert alert-danger">'+obj.message+'</div>');
                       $('bankForm').trigger('reset');
                       $('#bankResult').DataTable().ajax.reload(); 
                    }
                    }        
                });
    });

    $('#bankUpdate').click(function(){          
        var r = confirm("Are You Sure To Update?");
        if(r){
            $.ajax({
                type: "POST",
                url: "<?php echo base_url('master/update_bank_details') ?>", 
                data: $("#bankForm").serialize(),
                success: function(result) 
                {
                    console.log(result);
                    var obj = JSON.parse(result);
                    console.log(obj.status);
                    if(obj.status=='success'){
                       $('#errorMessage').html('<div class="alert alert-success">'+obj.message+'</div>');
                       $('bankForm').trigger('reset');
                       $('#bankResult').DataTable().ajax.reload();
                       //window.location.reload(); 
                    }
                    if(obj.status=='failed'){
                        $('#errorMessage').html('<div class="alert alert-danger">'+obj.message+'</div>');
                       $('bankForm').trigger('reset');
                       $('#bankResult').DataTable().ajax.reload(); 
                    }
                    
                    //$('#bankResult').DataTable().ajax.reload();
                }        
            });
        }
    });
    //bank details end//
    //party master start//
    $(document).ready(function() {
        //alert('hello');
        var table = '';
        var table=$('#partyResult').DataTable( {
            "processing": true,
            "serverSide": true,
               "ajax": {
              'url':"<?php echo base_url().'Master/get_party_master'; ?>",
              "type": "POST"
            }, "columns": [
                { "data": "customerType"},
                { "data": "customer"},
                { "data": "primaryContactPerson"},
                { "data": "email"},
                { "data": "mobile"},
                { "data": "billingAddress"},
                { "data": "addressLine2"},
                { "data": "city"},
                { "data": "state"},
                { "data": "pin"},
                { "data": "gstinNo"},
                { "data": "panNo"},
                { "data": "collectionRoute"},
                { "data": "openingBalance"},
                { "data": "requiredSms"},
                { "data": "action"}
                
            ]
        } );
    });

   

function partyEdit(cek_id){
    //alert('hello');
    var r = confirm("Are You Sure To select!");

    if(r){
        $.ajax({
            type  : "POST",
            url   : "<?php echo base_url()."master/get_party"; ?>",
            data  : {cek_id:cek_id},
            success:function(result){
               var obj = JSON.parse(result);
               if(obj.status == 'success'){
                console.log(obj.data);
                console.log(obj.data.id);
                 $("#id").val(obj.data.id);
                 $("#customerType").val(obj.data.customerType); 
                 $("#customer").val(obj.data.customer);
                 $("#primaryContactPerson").val(obj.data.primaryContactPerson); 
                 $("#email").val(obj.data.email); 
                 $("#mobile").val(obj.data.mobile); 
                 $("#billingAddress").val(obj.data.billingAddress);
                 $("#addressLine2").val(obj.data.addressLine2);
                 $("#city").val(obj.data.city);
                 $("#state").val(obj.data.state);
                 $("#pin").val(obj.data.pin);
                 $("#gstinNo").val(obj.data.gstinNo);
                 $("#panNo").val(obj.data.panNo);
                 $("#collectionRoute").val(obj.data.collectionRoute);
                 $("#openingBalance").val(obj.data.openingBalance);
                 $("#requiredSms").val(obj.data.requiredSms);
                 $('#partysubmit').prop('disabled',true);
               }
               if(obj.status == 'failed'){
                    alert(obj.message);
               }
            }
        });    
    }else {
      txt = "You pressed Cancel!";
    }
}

$('#partyDelete').click(function(){  
     var r = confirm("Are You Sure To Delete?");

    if(r){
            $.ajax({
                type: "POST",
                url: "<?php echo base_url('master/delete_party_master') ?>", 
                data: $("#partyForm").serialize(),
                success: function(result) 
                {
                console.log(result);
                var obj = JSON.parse(result);
              if(obj.status=='success'){
                   $('#errorMessage').html('<div class="alert alert-success">'+obj.message+'</div>');
                   $('#partyForm').trigger('reset');
                   $('#partyResult').DataTable().ajax.reload();
                   //window.location.reload(); 
                }
                if(obj.status=='failed'){
                    $('#errorMessage').html('<div class="alert alert-danger">'+obj.message+'</div>');
                    //alert(obj.message);
                   //$('#bankResult').DataTable().ajax.reload(); 
                }
                
                }        
            });
        }
});

$('#partyUpdate').click(function(){          
    var r = confirm("Are You Sure To Update?");
    if(r){
        $.ajax({
            type: "POST",
            url: "<?php echo base_url('master/update_party_master') ?>", 
            data: $("#partyForm").serialize(),
            success: function(result) 
            {
                console.log(result);
                var obj = JSON.parse(result);
                console.log(obj.status);
                if(obj.status=='success'){
                   $('#errorMessage').html('<div class="alert alert-success">'+obj.message+'</div>');
                $('#partyForm').trigger('reset');

                   $('#partyResult').DataTable().ajax.reload();
                   //window.location.reload(); 
                }
                if(obj.status=='failed'){
                    $('#errorMessage').html('<div class="alert alert-danger">'+obj.message+'</div>');
                     $('#partyForm').trigger('reset');
                    $('#bankResult').DataTable().ajax.reload(); 
                }
                
                //$('#bankResult').DataTable().ajax.reload();
            }        
        });
    }
});

//party master end//
//product details start//
$(document).ready(function() {
    //alert('');
    var table = '';
    var table=$('#productResult').DataTable( {
        "processing": true,
        "serverSide": true,
        "ajax": {
          'url':"<?php echo base_url().'master/get_product_services'; ?>",
           "type": "POST"
        }, "columns": [
            { "data": "productCode"},
            { "data": "productGroup"},
            { "data": "productName"},
            { "data": "productType"},
            { "data": "productDescription"},
            { "data": "sellingPrice"},
            { "data": "productPrice"},
            { "data": "mrpPrice"},
            { "data": "openingStock"},
            { "data": "unitType"},
            { "data": "salesType"},
            { "data": "purchaseType"},
            { "data": "calculation"},
            { "data": "negativeStock"},     
            { "data": "hsnCode"},
            { "data": "minQty"},
            { "data": "subUnit"},
            { "data": "action"}
            
        ]
    } );


});
    
function productEdit(cek_id){
    var r = confirm("Are You Sure To select!");
       
     if(r){
         $.ajax({
             type : "POST",
             url  : "<?php echo base_url()."master/get_product"; ?>",
             data : {cek_id:cek_id},
             success:function(result){
            var obj = JSON.parse(result);
            if(obj.status == 'success'){
              console.log(obj.data);
              console.log(obj.data.id);
                 $("#id").val(obj.data.id);
                // $("#company_id").val(obj.data.company_id);
                 $("#productCode").val(obj.data.productCode); 
                 $("#productGroup").val(obj.data.productGroup);
                 $("#productName").val(obj.data.productName); 
                 $("#productType").val(obj.data.productType); 
                 $("#productDescription").val(obj.data.productDescription);
                 $("#sellingPrice").val(obj.data.sellingPrice); 
                 $("#productPrice").val(obj.data.productPrice);
                 $("#mrpPrice").val(obj.data.mrpPrice); 
                 $("#openingStock").val(obj.data.openingStock); 
                 $("#unitType").val(obj.data.unitType);
                 $("#salesType").val(obj.data.salesType); 
                 $("#purchaseType").val(obj.data.purchaseType);
                 $("#calculation").val(obj.data.calculation); 
                 $("#negativeStock").val(obj.data.negativeStock); 
                 $("#hsnCode").val(obj.data.hsnCode);
                 $("#minQty").val(obj.data.minQty);
                 $("#subUnit").val(obj.data.subUnit);
                 $('#submit').prop('disabled',true);    
                   
                   
                 }  
             if(obj.status == 'failed'){
                 alert(obj.message)
             }
             }
         });
     }else{
         txt = "You pressed Cancel";
     }
}   
    
    
 $('#productUpdate').click(function(){          
   var r = confirm("Are You Sure To Update?");
    if(r){
        $.ajax({
           type: "POST",
           url: "<?php echo base_url('master/update_product_services') ?>", 
            data: $("#productForm").serialize(),
            success: function(result) 
          {
                console.log(result);
                var obj = JSON.parse(result);
                console.log(obj.status);
                if(obj.status=='success'){
                   $('#errorMessage').html('<div class="alert alert-success">'+obj.message+'</div>');
                   //$('#user').DataTable().ajax.reload();
                   window.location.reload(); 
                }
                if(obj.status=='failed'){
                    $('#errorMessage').html('<div class="alert alert-danger">'+obj.message+'</div>');
                    //alert(obj.message);
                   //$('#user').DataTable().ajax.reload(); 
                }
                
                //$('#user').DataTable().ajax.reload();
            }        
        });
    }
}); 
    

 $('#productDelete').click(function(){  
     var r = confirm("Are You Sure To Delete?");

    if(r){
            $.ajax({
                type: "POST",
                url: "<?php echo base_url('master/delete_product_master') ?>", 
                data: $("#productForm").serialize(),
                success: function(result) 
                {
                console.log(result);
                var obj = JSON.parse(result);
               if(obj.status == 'success'){
                 $('#productResult').DataTable().ajax.reload(); 
               }
               if(obj.status == 'failed'){
                    alert(obj.message);
               }
                }        
            });
        }
});

// product details end// 
//tex master start//
$(document).ready(function() {
    //alert('');
    var table = '';
    var table=$('#texResult').DataTable( {
        "processing": true,
        "serverSide": true,
        "ajax": {
          'url':"<?php echo base_url().'master/get_tex_details'; ?>",
          "type": "POST"
        }, "columns": [
            { "data": "texName"},
            { "data": "texPercentage"},
            { "data": "texType"},
            { "data": "sgst"},
            { "data": "cgst"},
            { "data": "igst"},
            { "data": "action"}
            
        ]
    } );

});

function texEdit(cek_id){
    var r = confirm("Are You Sure To select!");

    if(r){
        $.ajax({
            type  : "POST",
            url   : "<?php echo base_url()."master/get_tex"; ?>",
            data  : {cek_id:cek_id},
            success:function(result){
               var obj = JSON.parse(result);
               if(obj.status == 'success'){
                console.log(obj.data);
                console.log(obj.data.id);
                 $("#id").val(obj.data.id);
                 $("#texName").val(obj.data.texName); 
                 $("#texPercentage").val(obj.data.texPercentage);
                 $("#texType").val(obj.data.texType); 
                 $("#sgst").val(obj.data.sgst); 
                 $("#cgst").val(obj.data.cgst); 
                 $("#igst").val(obj.data.igst);
                 $('#texSubmit').prop('disabled',true);
                //$('#submit').prop('disabled',true);
               }
               if(obj.status == 'failed'){
                    alert(obj.message);
               }
            }
        });    
    }else {
      txt = "You pressed Cancel!";
    }
}

$('#texDelete').click(function(){  
        var r = confirm("Are You Sure To Delete?");
    if(r){
            $.ajax({
                type: "POST",
                url: "<?php echo base_url('master/delete_tex_master') ?>", 
                data: $("#texForm").serialize(),
                success: function(result) 
                {
                    console.log(result);
                    var obj = JSON.parse(result);
                   if(obj.status == 'success'){
                     $('#texResult').DataTable().ajax.reload(); 
                     $('#texForm').trigger("reset");
                   }
                   if(obj.status == 'failed'){
                        alert(obj.message);
                   }
                }        
            });
        }
});

$('#texUpdate').click(function(){          
    var r = confirm("Are You Sure To Update?");
    if(r){
        $.ajax({
            type: "POST",
            url: "<?php echo base_url('master/update_tex_master') ?>", 
            data: $("#texForm").serialize(),
            success: function(result) 
            {
                console.log(result);
                var obj = JSON.parse(result);
                console.log(obj.status);
                if(obj.status=='success'){
                   $('#errorMessage').html('<div class="alert alert-success">'+obj.message+'</div>');
                   
                   $('#texResult').DataTable().ajax.reload();
                   //window.location.reload(); 
                   $('#texForm').trigger("reset");
                }
                if(obj.status=='failed'){
                    $('#errorMessage').html('<div class="alert alert-danger">'+obj.message+'</div>');
                    //alert(obj.message);
                   //$('#bankResult').DataTable().ajax.reload(); 
                }
                
                //$('#bankResult').DataTable().ajax.reload();
            }        
        });
    }
});
// tex master end//

// user master start//
$(document).ready(function() {
    //alert('');
    var table = '';
    var table=$('#userTable').DataTable( {
        "processing": true,
        "serverSide": true,
        "ajax": {
          'url':"<?php echo base_url().'master/get_user_master'; ?>",
           "type": "POST"
        }, "columns": [
           // {"data": "company_id"},
            { "data": "userName"},
            { "data": "name"},
            { "data": "email"},
            { "data": "mobile"},
            { "data": "password"},
            { "data": "action"}
            
        ]
    } );


});

function userEdit(cek_id){
    var r = confirm("Are You Sure To select!");
       
     if(r){
         $.ajax({
             type : "POST",
             url  : "<?php echo base_url()."master/get_user"; ?>",
             data : {cek_id:cek_id},
             success:function(result){
            var obj = JSON.parse(result);
            if(obj.status == 'success'){
              console.log(obj.data);
              console.log(obj.data.id);
                 $("#id").val(obj.data.id);
                // $("#company_id").val(obj.data.company_id);
                 $("#userName").val(obj.data.userName); 
                 $("#name").val(obj.data.name);
                 $("#email").val(obj.data.email); 
                 $("#mobile").val(obj.data.mobile); 
                 $("#password").val(obj.data.password); 
                 $('#submit').prop('disabled',true);    
                 }  
             if(obj.status == 'failed'){
                 alert(obj.message)
             }
             }
         });
     }else{
         txt = "You pressed Cancel";
     }
}   

 $('#userUpdate').click(function(){          
   var r = confirm("Are You Sure To Update?");
    if(r){
        $.ajax({
           type: "POST",
           url: "<?php echo base_url('master/update_user_master') ?>", 
            data: $("#userForm").serialize(),
            success: function(result) 
          {
                console.log(result);
                var obj = JSON.parse(result);
                console.log(obj.status);
                if(obj.status=='success'){
                   $('#errorMessage').html('<div class="alert alert-success">'+obj.message+'</div>');
                   //$('#user').DataTable().ajax.reload();
                   window.location.reload(); 
                }
                if(obj.status=='failed'){
                    $('#errorMessage').html('<div class="alert alert-danger">'+obj.message+'</div>');
                    }
                
                
            }        
        });
    }
}); 
 $('#userDelete').click(function(){  
 alert('Ready To delete');
            $.ajax({
                type: "POST",
                url: "<?php echo base_url('master/delete_user_master') ?>", 
                data: $("#userForm").serialize(),
                success: function(result) 
                {
                console.log(result);
                var obj = JSON.parse(result);
               if(obj.status == 'success'){
                 $('#userResult').DataTable().ajax.reload(); 
               }
               if(obj.status == 'failed'){
                    alert(obj.message);
               }
                }        
            });
});
// user master end //
//unit master start//
    $("#unitEdit").change(function(event) {
        event.preventDefault();
        var id = $(this).val();
          var r = confirm("Are you sure to selected!");
          if(r){
        $.ajax({
            type: "POST",
            url: "<?php echo base_url('Company/get_unit') ?>" ,
            
            data: {id: id},
            success:function(result){

            var obj = JSON.parse(result);
            if(obj.status == 'success'){
              console.log(obj.data);
              console.log(obj.data.id);
                 $("#id").val(obj.data.id);
                 $("#unit").val(obj.data.unit); 
                 $('#unitSubmit').prop('disabled',true);    
                 }  
             if(obj.status == 'failed'){
                 alert(obj.message)
             }
             }
        });
       }
    });

    $('#unitDelete').click(function(){  
 var r = confirm("Are You Sure To Delete!");
    if(r){
          $.ajax({
                type: "POST",
                url: "<?php echo base_url('Company/delete_unit_master') ?>", 
                data: $("#unitForm").serialize(),
                success: function(result) 
                {
                console.log(result);
                var obj = JSON.parse(result);
               if(obj.status == 'success'){
                 $('#errorMessage').html('<div class="alert alert-success">'+obj.message+'</div>');
                   //$('#userResult').DataTable().ajax.reload();
                   $('#unitForm').trigger("reset");
                   $('#unit').trigger("reset");

 }
               if(obj.status == 'failed'){
                    //alert(obj.message);
                    $('#errorMessage').html('<div class="alert alert-danger">'+obj.message+'</div>');
                   $('#unitForm').trigger("reset");
                   //$('#userResult').DataTable().ajax.reload();

               }
                }        
            });
      }
});

//unit master end//
// groupe master start//
$("#groupEdit").change(function(event) {
        event.preventDefault();
        var id = $(this).val();
          var r = confirm("Are you sure to selected!");
          if(r){
        $.ajax({
            type: "POST",
            url: "<?php echo base_url('Company/get_group') ?>" ,
            
            data: {id: id},
            success:function(result){

            var obj = JSON.parse(result);
            if(obj.status == 'success'){
              console.log(obj.data);
              console.log(obj.data.id);
                 $("#id").val(obj.data.id);
                 $("#group").val(obj.data.parent_id); 
                  $("#groupName").val(obj.data.groupName);

 
                 $('#groupSubmit').prop('disabled',true);    
                 }  
             if(obj.status == 'failed'){
                 alert(obj.message)
             }
             }
        });
       }
    });
$('#groupDelete').click(function(){  
 var r = confirm("Are You Sure To Delete!");
    if(r){
          $.ajax({
                type: "POST",
                url: "<?php echo base_url('Company/delete_group_master') ?>", 
                data: $("#groupForm").serialize(),
                success: function(result) 
                {
                console.log(result);
                var obj = JSON.parse(result);
               if(obj.status == 'success'){
                 $('#errorMessage').html('<div class="alert alert-success">'+obj.message+'</div>');
                   //$('#userResult').DataTable().ajax.reload();
                   $('#groupForm').trigger("reset");
                   $('#groupName').trigger("reset");

 }
               if(obj.status == 'failed'){
                    //alert(obj.message);
                    $('#errorMessage').html('<div class="alert alert-danger">'+obj.message+'</div>');
                   $('#groupForm').trigger("reset");
                   //$('#userResult').DataTable().ajax.reload();

               }
                }        
            });
      }
});
// group master end//

//route master start//
$("#routeEdit").change(function(event) {
        event.preventDefault();
        var id = $(this).val();
          var r = confirm("Are you sure to selected!");
          if(r){
        $.ajax({
            type: "POST",
            url: "<?php echo base_url('master/get_route') ?>" ,
            
            data: {id: id},
            success:function(result){

            var obj = JSON.parse(result);
            if(obj.status == 'success'){
              console.log(obj.data);
              console.log(obj.data.id);
                 $("#id").val(obj.data.id);
                 $("#route").val(obj.data.parent_id); 
                  $("#routeName").val(obj.data.routeName);

 
                 $('#routeSubmit').prop('disabled',true);    
                 }  
             if(obj.status == 'failed'){
                 alert(obj.message)
             }
             }
        });
       }
    });
$('#routeDelete').click(function(){  
 var r = confirm("Are You Sure To Delete!");
    if(r){
          $.ajax({
                type: "POST",
                url: "<?php echo base_url('master/delete_route_master') ?>", 
                data: $("#routeForm").serialize(),
                success: function(result) 
                {
                console.log(result);
                var obj = JSON.parse(result);
               if(obj.status == 'success'){
                 $('#errorMessage').html('<div class="alert alert-success">'+obj.message+'</div>');
                   //$('#userResult').DataTable().ajax.reload();
                   $('#routeForm').trigger("reset");
                   $('#routeName').trigger("reset");

 }
               if(obj.status == 'failed'){
                    //alert(obj.message);
                    $('#errorMessage').html('<div class="alert alert-danger">'+obj.message+'</div>');
                   $('#routeForm').trigger("reset");
                   //$('#userResult').DataTable().ajax.reload();

               }
                }        
            });
      }
});

function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#productImage')
                    .attr('src', e.target.result)
                    .width(100)
            };

            reader.readAsDataURL(input.files[0]);
        }
    }


</script>

  


