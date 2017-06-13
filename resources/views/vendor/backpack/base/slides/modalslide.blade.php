{{-- modal --}}
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content" style="border-radius: 7px;">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
				<h2 class="modal-title" id="myModalLabel" style="color: blue;">Add New Slide</h2>
			</div>
			<div class="modal-body">
				<form method="POST" 
					id="frmslide" 
					name="frmslide" 
					enctype="multipart/form-data"
					action="{{ url(''). "/ad/slide" }}">
					{{ csrf_field() }}
					<!-- HTML Form (wrapped in a .bootstrap-iso div) -->
					<div class="bootstrap-iso">
						<div class="container-fluid">
							<div class="row">
								<div class="col-md-12 col-sm-12 col-xs-12">
									<div class="form-group ">
										<label class="control-label requiredField article" for="article_id">
											Article
											<span class="asteriskField">
												*
											</span>
										</label>
										<select class="select form-control" id="article_id" name="article_id">
											<option></option>
											
											@foreach($articles as $article)
												
												<option value="{{ $article->id }}">
													{{$article->name}}
												</option>
											
											
											@endforeach
										</select>
									</div>
									<div class="form-group">
										<label class="control-label" for="image">Image
											<span class="asteriskField">
												*
											</span>
										</label>
										<input class="form-control" type="file" name="image" id="image">
									</div>
									<div class="form-group ">
										<label class="control-label" for="deial">
											Detial
										</label>
										<textarea class="form-control" cols="40" id="detial" name="detial" rows="3"></textarea>
									</div>
									<div class="form-group ">
										<label class="control-label " for="status">
											Status
										</label>
										<select class="select form-control" id="status" name="status">
											<option value="Enabled">
												Enabled
											</option>
											<option value="Disabled">
												Disabled
											</option>
										</select>
									</div>
									<div class="form-group">
										<div>
											<button type="submit" class="btn btn-primary save" id="btn-add" value="add">Submit</button>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					
				</form>
			</div>
			
		</div>
	</div>
</div>