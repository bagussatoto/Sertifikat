
				<!-- BEGIN SAMPLE FORM PORTLET-->
				<div class="portlet box grey">
					<div class="portlet-title">
						<div class="caption">
							#
						</div>
						<div class="actions">
							 <a href="javascript:;" class="btn btn-sm default" onclick="back_page()"><i class="fa fa-chevron-left"></i> Back</a>
						</div>
					</div>
					<div class="portlet-body form">

			<form id="form" role="form" enctype="multipart/form-data">
				<div class="form-body">
					<input id="id_blog" name="id_blog" type="hidden">
					<input id="id_user" name="id_user" type="hidden">
					<input id="p_photo" name="p_photo" type="hidden">
					<div class="row">
					<div class="col-sm-9">
						<div class="form-group">
							<label class=" control-label">Title</label>
							<input id="title_blog" name="title_blog" class="form-control input-sm" type="text" maxlength="200">
						</div>
						<div class="form-group">
							<label class="control-label">Description</label>
							<textarea id="ckeditor" name="desc_blog" class="form-control desc_blog" rows="45"></textarea>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="form-group">
							<label class="control-label">Category</label>
							<select name="id_category" id="id_category" class="form-control" style="width:100%">
								<option value="0">-- Category --</option>
								<?php
								foreach ($category as $p) {
									$level=$p->level_category;
									if($level!='main'){$ncategory='&nbsp;&nbsp;-&nbsp;'.$p->nm_category;}else{$ncategory=$p->nm_category;}
									echo '<option value="'.$p->id_category.'">'.$ncategory.'</option>';
								}
								?>
							</select>
						</div>
						<div class="form-group">
							<label class="control-label">Status</label>
							<div class="radio-list">
								<div class="publish">
									<label for="publish"><input type="radio" id="publish" value="publish" name="status" class="status">&nbsp;<span class="label label-success">Publish</span></label>
								</div>
								<div class="draft">
									<label for="draft"><input type="radio" value="draft" id="draft" name="status" class="status">&nbsp;<span class="label label-warning">Draft</span></label>
								</div>
								<div class="trash" style="display:none">
									<label for="trash"><input type="radio" value="trash" id="trash" name="status" class="status">&nbsp;<span class="label label-danger">Trash</span></label>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label">Date post</label>
							<div class="input-group date">
								 <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
								 <input id="datepicker" name="date_posting" type="text" class="form-control form-control-inline date-picker date_posting" data-date-format="dd/mm/yyyy" id="datepicker" value="<?php echo date('d/m/Y'); ?>">
							</div>
						</div>
						<div class="bootstrap-timepicker">
						<div class="form-group">
							<label class="control-label">Time post</label>
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
								<input id="timepicker" type="text" name="time_posting" class="form-control timepicker timepicker-24 time_posting" value="<?php output(date('H:i')) ?>">
							</div>
						</div>
						</div>
						<div class="form-group">
							<label class="control-label">Photo cover</label>
							<div class="input-group">
								<input type="file" id="photo_cover" name="photo_cover" /> 									
							</div>
							<div class="input-group">								
								<img id="preview_image" style="padding-top:10px;width:220px;height:180px"/>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label">Photo description</label>
							<textarea name="photo_desc" class="form-control photo_desc" rows="2"></textarea>
						</div>
					</div>
					</div>
				</div>
				<div class="form-actions">
					<div class="msg pull-left"></div>
					<div class="pull-right">
					<button type="submit" class="btn btn-primary btn-md"><i class="fa fa-save"></i> Save</button> 
					<button type="button" onclick="back_page()" class="btn btn-default btn-md"> Cancel</button>
					</div>
				</div>
				
			 </form>  

					</div>
				</div>
				<!-- END SAMPLE FORM PORTLET-->



						
				
						
						



	

	

