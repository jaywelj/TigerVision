		<div class="container">
		 	<!-- Trigger the modal with a button -->
		  	<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Add</button>
		  	<!-- Modal -->
		 	<div class="modal fade" id="myModal" role="dialog">
		  		<div class="modal-dialog modal-lg">
		      		<div class="modal-content">
		        		<div class="modal-header">
		          			<button type="button" class="close" data-dismiss="modal">&times;</button>
		          			<h4 class="modal-title">Add a Destination</h4>
		        		</div>
		        		<div class="modal-body">
		          			<form method="post" name="form1" id="prevsub">
			                    <table width="25%" border="0">

			                        <div class="form-group">
			                            <label>Name</label>
			                            <input type="text" name="txtbxName" class="form-control">
			                        </div>
			                        <div class="form-group">
			                            <label>Address</label>
			                            <input type="text" name="txtbxAddress" class="form-control">
			                        </div>
			                        <div class="form-group">
			                            <label>Email</label>
			                            <input type="email" name="txtbxEmail" class="form-control">
			                        </div>
			                        <div class="form-group"> 
			                            <label>Contact No</label>
			                            <input type="text" name="txtbxContactNo" class="form-control">
			                        </div>
			                        <div class="form-group"> 
			                            <label>Link</label>
			                            <input type="text" name="txtbxLink" class="form-control">
			                        </div>
			                        <div class="form-group"> 
			                            <label>Description</label>
			                            <textarea 
			                                id="text" 
			                                cols="40" 
			                                rows="4" 
			                                name="txtbxDescription" 
			                                placeholder="Description" class="form-control"></textarea>
			                        </div>
			                        <div class="form-group"> 
			                            <label>Image</label>
			                            <input type="file" name="imgDestinationImage">
			                        </div>
			                        <div class="form-group"> 
			                            <label>Price-Minimum</label>
			                            <input type="text" name="txtbxPriceMin" class="form-control">
			                        </div>
			                        <div class="form-group"> 
			                            <label>Price-Maximum</label>
			                            <input type="text" name="txtbxPriceMax" class="form-control">
			                        </div>
			                        <div class="form-group">
			                            <strong><input type="submit" name="btnAddRecord" value="Add" class="form-control">
			                        </div>
			                    </table>
			                </form>
			                <?php
								//including the database connection file
								include_once("TVDODatabaseConnection.php");

								if(isset($_POST['btnAddRecord'])) 
								{
									include 'TVDOAdd.php';
								}
							?>
		        		</div>
		        		<div class="modal-footer">
		          			<button type="button" class="btn btn-default strong" data-dismiss="modal"><strong>Close</button>
		        		</div>
		      		</div>
		    	</div>
		  	</div>
		</div>
		
