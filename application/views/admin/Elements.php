<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!-- Full Width Column -->
<div class="content-wrapper">
	<div class="<?php echo CONTAINER; ?>">
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1><i class="fa fa-wpforms"></i> Blank <small>it all starts here</small></h1>
			<ol class="breadcrumb">
				<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
				<li class="active">Blank page</li>
			</ol>
		</section>

		<!-- Main content -->
		<section class="content">
            <?php $this->load->view('admin/alerts'); ?>
			<!-- Default box -->
			<div class="box box-default">
				<div class="box-header with-border">
					<h3 class="box-title">Title</h3>
					<div class="box-tools pull-right">
						<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
					</div>
				</div>
				<div class="box-body">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label>Name</label>
								<input type="text" class="form-control input-sm" />
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Option</label>
								<select class="form-control input-sm chosen-select">
									<option>select option</option>
									<option>option 1</option>
									<option>option 2</option>
									<option>option 3</option>
									<option>option 4</option>
                                    <option>option 5</option>
								</select>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group control-group">
								<label class="control-label">Enabled?</label>
								<div class="">
									<label>
										<input name="switch-field-1" class="ace ace-switch ace-switch-6 btn-flat" type="checkbox"  checked="checked"/>
									<span class="lbl"></span>
									</label>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group control-group">
								<label class="control-label">Spinner</label>
								<div class="">
									<input type="text" id="spinner1" />
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label>Date</label>
								<input type="text" class="datepicker form-control input-sm" />
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>File</label>
								<input type="file" class="ace-file form-control input-sm" />
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label>File 2</label>
								<input type="file" multiple="true" class="ace-file-2 form-control input-sm" />
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Textarea</label>
								<textarea class="form-control"></textarea>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="control-group">
								<label class="control-label bolder blue">Checkbox</label>
								<div class="">
									<label>
										<input name="form-field-checkbox" type="checkbox" class="ace" />
										<span class="lbl"> choice 1</span>
									</label>
									<label>
										<input name="form-field-checkbox" type="checkbox" class="ace" />
										<span class="lbl"> choice 2</span>
									</label>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="control-group">
								<label class="control-label bolder blue">Radio <span class="asterisk text-red">*</span></label>
								<div class="">
									<label>
										<input name="form-field-radio" type="radio" class="ace" />
										<span class="lbl"> choice 1</span>
									</label>
									<label>
										<input name="form-field-radio" type="radio" class="ace" />
										<span class="lbl"> choice 2</span>
									</label>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="box-footer">
					<button type="button" class="btn btn-primary btn-sm"><i class="fa fa-save"></i> Save</button>
				</div>
			</div>
			
			<!-- Default box -->
			<div class="box box-default">
				<div class="box-header with-border">
					<h3 class="box-title">Table</h3>
					<div class="box-tools pull-right">
						<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
					</div>
				</div>
				<div class="box-body">
					<table id="data-table" class="table table-striped table-hover">
						<thead>
							<tr>
								<th>#No</th>
								<th>Name</th>
								<th>Description</th>
								<th>Status</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>1</td>
								<td>Administrator</td>
								<td>Lorem ipsum dolor sit amet, consectetur.</td>
								<td>
									<label>
										<input name="switch-field-1" class="ace ace-switch ace-switch-6 btn-flat" type="checkbox"  checked="checked"/>
										<span class="lbl"></span>
									</label>
								</td>
								<td>
									<a href="#" class="ico edit">Edit</a>
									<a href="#" class="ico del">Delete</a>
								</td>
							</tr>
							<tr>
								<td>1</td>
								<td>Administrator</td>
								<td>Lorem ipsum dolor sit amet, consectetur.</td>
								<td>
									<label>
										<input name="switch-field-1" class="ace ace-switch ace-switch-6 btn-flat" type="checkbox"  checked="checked"/>
										<span class="lbl"></span>
									</label>
								</td>
								<td>
									<a href="#" class="ico edit">Edit</a>
									<a href="#" class="ico del">Delete</a>
								</td>
							</tr>
							<tr>
								<td>1</td>
								<td>Administrator</td>
								<td>Lorem ipsum dolor sit amet, consectetur.</td>
								<td>
									<label>
										<input name="switch-field-1" class="ace ace-switch ace-switch-6 btn-flat" type="checkbox"  checked="checked"/>
										<span class="lbl"></span>
									</label>
								</td>
								<td>
									<a href="#" class="ico edit">Edit</a>
									<a href="#" class="ico del">Delete</a>
								</td>
							</tr>
							<tr>
								<td>1</td>
								<td>Administrator</td>
								<td>Lorem ipsum dolor sit amet, consectetur.</td>
								<td>
									<label>
										<input name="switch-field-1" class="ace ace-switch ace-switch-6 btn-flat" type="checkbox"  checked="checked"/>
										<span class="lbl"></span>
									</label>
								</td>
								<td>
									<a href="#" class="ico edit">Edit</a>
									<a href="#" class="ico del">Delete</a>
								</td>
							</tr>
							<tr>
								<td>1</td>
								<td>Administrator</td>
								<td>Lorem ipsum dolor sit amet, consectetur.</td>
								<td>
									<label>
										<input name="switch-field-1" class="ace ace-switch ace-switch-6 btn-flat" type="checkbox"  checked="checked"/>
										<span class="lbl"></span>
									</label>
								</td>
								<td>
									<a href="#" class="ico edit">Edit</a>
									<a href="#" class="ico del">Delete</a>
								</td>
							</tr>
							<tr>
								<td>1</td>
								<td>Administrator</td>
								<td>Lorem ipsum dolor sit amet, consectetur.</td>
								<td>
									<label>
										<input name="switch-field-1" class="ace ace-switch ace-switch-6 btn-flat" type="checkbox"  checked="checked"/>
										<span class="lbl"></span>
									</label>
								</td>
								<td>
									<a href="#" class="ico edit">Edit</a>
									<a href="#" class="ico del">Delete</a>
								</td>
							</tr>
							<tr>
								<td>1</td>
								<td>Administrator</td>
								<td>Lorem ipsum dolor sit amet, consectetur.</td>
								<td>
									<label>
										<input name="switch-field-1" class="ace ace-switch ace-switch-6 btn-flat" type="checkbox"  checked="checked"/>
										<span class="lbl"></span>
									</label>
								</td>
								<td>
									<a href="#" class="ico edit">Edit</a>
									<a href="#" class="ico del">Delete</a>
								</td>
							</tr>
							<tr>
								<td>1</td>
								<td>Administrator</td>
								<td>Lorem ipsum dolor sit amet, consectetur.</td>
								<td>
									<label>
										<input name="switch-field-1" class="ace ace-switch ace-switch-6 btn-flat" type="checkbox"  checked="checked"/>
										<span class="lbl"></span>
									</label>
								</td>
								<td>
									<a href="#" class="ico edit">Edit</a>
									<a href="#" class="ico del">Delete</a>
								</td>
							</tr>
							<tr>
								<td>1</td>
								<td>Administrator</td>
								<td>Lorem ipsum dolor sit amet, consectetur.</td>
								<td>
									<label>
										<input name="switch-field-1" class="ace ace-switch ace-switch-6 btn-flat" type="checkbox"  checked="checked"/>
										<span class="lbl"></span>
									</label>
								</td>
								<td>
									<a href="#" class="ico edit">Edit</a>
									<a href="#" class="ico del">Delete</a>
								</td>
							</tr><tr>
								<td>1</td>
								<td>Administrator</td>
								<td>Lorem ipsum dolor sit amet, consectetur.</td>
								<td>
									<label>
										<input name="switch-field-1" class="ace ace-switch ace-switch-6 btn-flat" type="checkbox"  checked="checked"/>
										<span class="lbl"></span>
									</label>
								</td>
								<td>
									<a href="#" class="ico edit">Edit</a>
									<a href="#" class="ico del">Delete</a>
								</td>
							</tr><tr>
								<td>1</td>
								<td>Administrator</td>
								<td>Lorem ipsum dolor sit amet, consectetur.</td>
								<td>
									<label>
										<input name="switch-field-1" class="ace ace-switch ace-switch-6 btn-flat" type="checkbox"  checked="checked"/>
										<span class="lbl"></span>
									</label>
								</td>
								<td>
									<a href="#" class="ico edit">Edit</a>
									<a href="#" class="ico del">Delete</a>
								</td>
							</tr><tr>
								<td>1</td>
								<td>Administrator</td>
								<td>Lorem ipsum dolor sit amet, consectetur.</td>
								<td>
									<label>
										<input name="switch-field-1" class="ace ace-switch ace-switch-6 btn-flat" type="checkbox"  checked="checked"/>
										<span class="lbl"></span>
									</label>
								</td>
								<td>
									<a href="#" class="ico edit">Edit</a>
									<a href="#" class="ico del">Delete</a>
								</td>
							</tr><tr>
								<td>1</td>
								<td>Administrator</td>
								<td>Lorem ipsum dolor sit amet, consectetur.</td>
								<td>
									<label>
										<input name="switch-field-1" class="ace ace-switch ace-switch-6 btn-flat" type="checkbox"  checked="checked"/>
										<span class="lbl"></span>
									</label>
								</td>
								<td>
									<a href="#" class="ico edit">Edit</a>
									<a href="#" class="ico del">Delete</a>
								</td>
							</tr><tr>
								<td>1</td>
								<td>Administrator</td>
								<td>Lorem ipsum dolor sit amet, consectetur.</td>
								<td>
									<label>
										<input name="switch-field-1" class="ace ace-switch ace-switch-6 btn-flat" type="checkbox"  checked="checked"/>
										<span class="lbl"></span>
									</label>
								</td>
								<td>
									<a href="#" class="ico edit">Edit</a>
									<a href="#" class="ico del">Delete</a>
								</td>
							</tr><tr>
								<td>1</td>
								<td>Administrator</td>
								<td>Lorem ipsum dolor sit amet, consectetur.</td>
								<td>
									<label>
										<input name="switch-field-1" class="ace ace-switch ace-switch-6 btn-flat" type="checkbox"  checked="checked"/>
										<span class="lbl"></span>
									</label>
								</td>
								<td>
									<a href="#" class="ico edit">Edit</a>
									<a href="#" class="ico del">Delete</a>
								</td>
							</tr><tr>
								<td>1</td>
								<td>Administrator</td>
								<td>Lorem ipsum dolor sit amet, consectetur.</td>
								<td>
									<label>
										<input name="switch-field-1" class="ace ace-switch ace-switch-6 btn-flat" type="checkbox"  checked="checked"/>
										<span class="lbl"></span>
									</label>
								</td>
								<td>
									<a href="#" class="ico edit">Edit</a>
									<a href="#" class="ico del">Delete</a>
								</td>
							</tr><tr>
								<td>1</td>
								<td>Administrator</td>
								<td>Lorem ipsum dolor sit amet, consectetur.</td>
								<td>
									<label>
										<input name="switch-field-1" class="ace ace-switch ace-switch-6 btn-flat" type="checkbox"  checked="checked"/>
										<span class="lbl"></span>
									</label>
								</td>
								<td>
									<a href="#" class="ico edit">Edit</a>
									<a href="#" class="ico del">Delete</a>
								</td>
							</tr><tr>
								<td>1</td>
								<td>Administrator</td>
								<td>Lorem ipsum dolor sit amet, consectetur.</td>
								<td>
									<label>
										<input name="switch-field-1" class="ace ace-switch ace-switch-6 btn-flat" type="checkbox"  checked="checked"/>
										<span class="lbl"></span>
									</label>
								</td>
								<td>
									<a href="#" class="ico edit">Edit</a>
									<a href="#" class="ico del">Delete</a>
								</td>
							</tr><tr>
								<td>1</td>
								<td>Administrator</td>
								<td>Lorem ipsum dolor sit amet, consectetur.</td>
								<td>
									<label>
										<input name="switch-field-1" class="ace ace-switch ace-switch-6 btn-flat" type="checkbox"  checked="checked"/>
										<span class="lbl"></span>
									</label>
								</td>
								<td>
									<a href="#" class="ico edit">Edit</a>
									<a href="#" class="ico del">Delete</a>
								</td>
							</tr><tr>
								<td>1</td>
								<td>Administrator</td>
								<td>Lorem ipsum dolor sit amet, consectetur.</td>
								<td>
									<label>
										<input name="switch-field-1" class="ace ace-switch ace-switch-6 btn-flat" type="checkbox"  checked="checked"/>
										<span class="lbl"></span>
									</label>
								</td>
								<td>
									<a href="#" class="ico edit">Edit</a>
									<a href="#" class="ico del">Delete</a>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
			
		</section>
		<!-- /.content -->
	</div>
	<!-- /.container -->
</div>
<!-- /.content-wrapper -->