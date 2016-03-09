$(document).ready(function() {

	$('#addproduct').click(function() {
		//Get value of item name
		var itemName_input = $('#product').val();
		var listid_input = $('#listid').val();

		//Lets disable all input fields to stop users from entering twice
		$('#product, #addproduct').prop("disabled", true);

		//Lets send the data to our PHP file
		request = $.ajax({
			url: "ajax/addItemsToList.php",
			type: "post",
			data: { listid : listid_input, itemName : itemName_input}
		});

		// If we're successfull!
		request.done(function (response, textStatus, jqXHR){
			var newItemID = response;
			$("#todoList").append('<li>'+itemName_input+' <span data-itemid="'+newItemID+'" class="glyphicon glyphicon-remove deleteItem"></span></li></li>');
			$('#product').val("");
		});

		// If we're successfull or it failed - re-enable fields
	    request.always(function () {
	        $('#product, #addproduct').prop("disabled", false);
	    });

	});


	$('body').on('click', '.deleteItem', function() {
		//Get item ID to delete
		var itemId = $(this).data("itemid");
		var listItem = $(this).parent();

		//Lets send the data to our PHP file
		request = $.ajax({
			url: "ajax/removeItemsFromList.php",
			type: "post",
			data: { itemid : itemId}
		});

		// If we're successfull!
		request.done(function (response, textStatus, jqXHR){
			listItem.remove();
		});
	});

});