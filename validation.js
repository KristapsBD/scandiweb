$(document).ready(function(){
    $("#product_form").submit(function(event){

        // Read form input values
        var sku = $("#sku").val();
        var name = $("#name").val();
        var price = $("#price").val();
        var productType = $("#productType").prop('selectedIndex')
        var size = $("#size").val();
        var height = $("#height").val();
        var width = $("#width").val();
        var length = $("#length").val();
        var weight = $("#weight").val();
 
        // Check for empty fields
        if (sku.length == 0
            || name.length == 0
            || price.length == 0 
            || productType == 0 
            || (productType == 1 && size.length == 0) 
            || (productType == 2 && (height.length == 0 || width.length == 0 || length.length == 0))
            || ((productType == 3 && weight.length == 0))) {            
           
            $("#errorMessage").css("visibility", "visible");
            $("#errorMessage").text("Please, submit required data"); 

            event.preventDefault();

        // Client side validation
        } else if ( price <= 0 || (productType >= 4 || productType <= 0) || isNaN(price)
            || (productType == 1 && (size <= 0 || isNaN(size)))  
            || (productType == 2 && (isNaN(height) || isNaN(width) || isNaN(length) || height <= 0 || width <= 0 || length <= 0 )) 
            || (productType == 3 && (isNaN(weight) || weight <= 0))){

            $("#errorMessage").css("visibility", "visible");
            $("#errorMessage").text("Please, provide the data of indicated type"); 

            event.preventDefault();
        } else {             
            $("#errorMessage").css("visibility", "hidden");
            $("#errorMessage").text("");
        }
    });
});