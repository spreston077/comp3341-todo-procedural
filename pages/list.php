<script src="js/list.js"></script>

<div id="mainContainer">
	<ul id="todoList">
		<?php
			$listid = $_GET['id'];
			$query = "SELECT * FROM list_items WHERE list_id = :listid";
		    $result = $DBH->prepare($query);
		    $result->bindParam(':listid', $listid);
		    $result->execute();

		    while($row = $result->fetch(PDO::FETCH_ASSOC)) {
			    echo "<li>".$row['item_name']." <span data-itemid=\"".$row['item_id']."\" class=\"glyphicon glyphicon-remove deleteItem\"></span></li>";
			}
		?>
	</ul>

	<form class="form-inline">
		<div class="form-group">
			<input type="text" class="form-control" id="product" placeholder="Milk">
		</div>
		<input type="hidden" class="form-control" id="listid" value="<?php echo $_GET['id']; ?>">
		<button type="button" class="btn btn-primary" id="addproduct"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></button>
	</form>
</div>