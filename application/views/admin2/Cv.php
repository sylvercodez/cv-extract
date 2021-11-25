<script src="<?= base_url('assets/js/jquery-3.3.1.min.js')?>"></script>

<?php
    if($action=='add'||$action=='edit'){
        echo form_open_multipart('#',array('class'=>'form-validate','name'=>'cvForm','id'=>'cvForm'));
        ?>
        <div class="box box-default">
            <div class="box-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="box-title" id="myModalLabel"><?php echo $id>0?'Edit CV':'Add CV'; ?></h3>
            </div>
            <div class="box-body">
				<div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Price</label>
                            <input type="number" name="price" id="price" class="form-control input-sm" value="<?php echo $price; ?>" required="required" />
                        </div>
                    </div>
				</div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Image</label>
                            <input type="file" name="image" id="image" class="ace-file form-control input-sm" accept="image/jpeg, image/png, image/gif, image/bmp" />
                        </div>
                    </div>
					<div class="col-md-6">
                        <div class="form-group">
                            <label>Html</label>
                            <input type="file" name="html" id="html" class="ace-file form-control input-sm" accept="text/html, .php" />
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12" id="alert_message">
                        <div class="inner-message fade in alert-dismissable">
                        </div>
                    </div>
                </div>
            </div>
            <div class="overlay">
                <i class="fa fa-spinner fa-spin"></i> 
            </div>
            <div class="box-footer">
                <?php echo form_hidden('id',$id); ?>
                <?php echo form_button(array('type'=>'button','content'=>'<i class="fa fa-times"></i> Close', 'class'=>'btn btn-default btn-sm','data-dismiss'=>'modal')); ?>
                <?php echo form_button(array('type'=>'submit','id'=>'submit','name'=>'submit','content'=>'<i class="fa fa-save"></i> Save', 'class'=>'btn btn-primary btn-sm')); ?>
            </div>
        </div>
        <?php echo form_close();?>
        <script type="text/javascript">
            $(document).ready(function(){
                $.validator.setDefaults({ ignore: ":hidden:not(select)" });
    			$('.chosen-select', this).chosen();
                $('.ace-file').ace_file_input({
					no_file:'No File ...',
					btn_choose:'Choose',
					btn_change:'Change',
					droppable:false,
					onchange:null,
					thumbnail:false //| true | large
					//whitelist:'gif|png|jpg|jpeg'
					//blacklist:'exe|php'
					//onchange:''
					//
				});
                $(".form-validate").validate({
					// validation rules for registration form
					errorClass: "text-red",
					validClass: "text-green",
					errorElement: 'div',
                    rules: {
                        name: {
                            minlength: 2
                        },
                        title: {
                            minlength: 5
                        }
                    },
					errorPlacement: function(error, element) {
						if(element.parent('.input-group').length) {
							error.insertAfter(element.parent());
						}
						else if (element.hasClass('select2')) {     
							error.insertAfter(element.next('span'));  // select2
						}
						else if (element.hasClass('chosen-select')) {     
							//error.insertAfter(element.next('span'));  // chosen-select
							//error.insertAfter("#shop_chosen");
							//element.next("div.chzn-container").append(error);
							error.insertAfter(element.siblings('[class*="chosen-container"]:eq(0)'));
						} else {
							error.insertAfter(element);
						}
					},
					onError : function(){
						$('.input-group.error-class').find('.help-block.form-error').each(function() {
							$(this).closest('.form-group').addClass('error-class').append($(this));
						});
					}
				});
                
                $(".form-validate").submit(function(e){
                    $("#alert_message .alert").attr('class','inner-message fade in alert-dismissable');
                    $("#alert_message .inner-message").html('');
                    if($(".form-validate").validate().errorList.length==0){
                        $('.overlay').toggle();
                        var url = '<?php echo base_url('admin/Cv/save'); ?>'
                        $.ajax({
                            type: "POST",
                            url: url,
                            data: new FormData(this), // serializes the form's elements.
                            contentType: false,
                            cache: false,
                            processData:false,
                            success: function(data){
                                var result = JSON.parse(data);
                                if(result['status']==1){
                                    $('#cvForm')[0].reset();
                                    $('#cvForm .remove').trigger('click');
                                    $('.chosen-select').trigger("chosen:updated");
                                    showMessage(result['message'],'success','#alert_message'); // show response from the php script.
                                }
                                else{
                                    showMessage(result['message'],'danger','#alert_message');
                                }
                                $('.overlay').toggle();                       
                            },
                            error: function (request, status, error) {
                                showMessage(request.responseText,'warning','#alert_message');
                                $('.overlay').toggle();
                            }
                        });
                    }  
                    e.preventDefault(); // avoid to execute the actual submit of the form.
                });
    		});
        </script>
        <?php
    }
    else if($action=='view'){
        ?>
<!--BEGIN PAGE WRAPPER-->
<div id="page-wrapper">
    <!--BEGIN TITLE & BREADCRUMB PAGE-->
    <div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
        <div class="page-header pull-left">
            <div class="page-title">
                Dashboard</div>
        </div>
        <ol class="breadcrumb page-breadcrumb pull-right">
            <li><i class="fa fa-home"></i>&nbsp;<a href="dashboard.html">Home</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
            <li class="hidden"><a href="#">Dashboard</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
            <li class="active">Dashboard</li>
        </ol>
        <div class="clearfix">
        </div>
    </div>
    <!--END TITLE & BREADCRUMB PAGE-->
    <!--BEGIN CONTENT-->
    <div class="page-content">
        <div id="tab-general">

            <div class="panel">
                <!-- Main content -->
                <section class="content" style="padding: 10px;">
                <div>
                    <?php $this->load->view('admin/alerts'); ?>

                    <!-- Default box -->
                    <div class="box box-default">
                        <div class="box-header with-border">
                            <h3 class="box-title">CV</h3>
                            <div class="box-tools pull-right">
                                <a href="<?php echo base_url('admin/Cv/add'); ?>" data-remote="false" data-toggle="modal" data-target="#myModal" class="ico edit">Add Record</a>
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                            </div>
                        </div>
                        <div class="box-body">
                            <table id="data-table" class="table table-hover table-striped data-table">
                                <thead>
                                <tr>
                                    <th class="text-center">#No</th>
                                    <th>Image</th>
                                    <th>Price</th>
                                    <th class="text-center">Action</th>
                                </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
                </section>
                <!-- /.content -->
            </div>            
        </div>
    </div>
    <!--END CONTENT-->
</div>

<!-- Default bootstrap modal example -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content" style="padding: 15px;">
                    <?php echo form_open_multipart('#',array('class'=>'form-validate','name'=>'cvForm','id'=>'cvForm'));?>
                        <div class="box box-default">
                            <div class="box-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h3 class="box-title" id="myModalLabel"><?= ( isset($id) && $id>0)?'Edit CV':'Add CV'; ?></h3>
                                <?php if(!( isset($id) && $id>0)): ?>
                                <label class="pull-right"><a href="<?= base_url('admin/cv/editor')?>">Open Editor </a></label>
                                <?php endif; ?>
                            </div>
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Price</label>
                                            <input type="number" name="price" id="price" class="form-control input-sm" value="<?= isset($price) ? $price : ''; ?>" required="required" />
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Image</label>
                                            <input type="file" name="image" id="image" class="ace-file form-control input-sm" accept="image/jpeg, image/png, image/gif, image/bmp" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Html</label>
                                            <input type="file" name="html" id="html" class="ace-file form-control input-sm" accept="text/html, .php" />
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12" id="alert_message">
                                        <div class="inner-message fade in alert-dismissable">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="overlay">
                                <i class="fa fa-spinner fa-spin"></i> 
                            </div>
                            <div class="box-footer">
                                <?php echo form_hidden('id',isset($id)? $id : 0 ); ?>
                                <?php echo form_button(array('type'=>'button','content'=>'<i class="fa fa-times"></i> Close', 'class'=>'btn btn-default btn-sm','data-dismiss'=>'modal')); ?>
                                <?php echo form_button(array('type'=>'submit','id'=>'submit','name'=>'submit','content'=>'<i class="fa fa-save"></i> Save', 'class'=>'btn btn-primary btn-sm')); ?>
                            </div>
                        </div>
                    <?php echo form_close();?>
                </div>
            </div>
        </div>
<!--END PAGE WRAPPER-->
<!-- Default bootstrap modal example -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content" style="padding: 15px;">
                    
                </div>
            </div>
        </div>
<script type="text/javascript">
    $(document).ready(function() {

        $("#myModal").on("show.bs.modal", function(e){
            var link = $(e.relatedTarget);
            $(this).find(".modal-content").load(link.attr("href"));
        });

        var table = $("#data-table").on( 'init.dt', function () {

            var jsn = JSON.parse('<?php echo json_encode($filters); ?>');
            $("#data-table").parents("div.row:first").before('<div class="row"><div id="filtercontent"></div></div>');
            $.each( jsn, function(i, item){
                var filter = table.state().columns[i].search.search!=undefined?table.state().columns[i].search.search.replace(/^\^+|\$+$/gm,''):'';
                var select = $('<select id="filer_'+i+'" class="form-control"><option value="">All</option></select>')
                    .insertBefore('#filtercontent')
                    .on( 'change', function () {
                        var val = $(this).val();

                        table.column( i )
                            .search( val ? '^'+$(this).val()+'$' : val, true, false )
                            .draw();
                    } );

                $.each( item.data, function(j, val){
                    var sel = filter!=''&&filter==j?'selected="selected"':'';
                    select.append( '<option '+sel+' value="'+ j +'">'+val+'</option>' );
                });

                $('#filer_'+i).wrapAll('<div class="col-sm-2 form-group"></div>');
                $('<label>'+item.lable+'</label>').insertBefore('#filer_'+i);

            });
            $('#data-table_wrapper').removeClass('form-inline');

        }).DataTable({
            "processing": true,
            "serverSide": true,
            "stateSave": true,
            "bStateSave": true,
            "pageLength": <?php echo RECORD_PER_PAGE; ?>,
            "oLanguage": {
                "sProcessing": '<i class="fa fa-spinner fa-spin"></i> Please wait...',
            },
            "processing" : true,
            "columnDefs": [
                { "orderable": false, "targets": [-1] },
                { "searchable" : false, "targets" : [0,-1] }
            ],
            "order": [[ 1, "asc" ]],
            "ajax": {
                url: '<?php echo site_url('admin/Cv/select'); ?>',
                type: 'GET',
                "data": {
                    "action": "view"
                }
            },
            "createdRow": function ( row, data, index ) {
                $('td', row).eq(0).addClass('text-center');
                $('td', row).eq(3).addClass('text-center');
                //$('td', row).eq(4).addClass('text-center');
            }
        });

        $(document).delegate('.btn-delete', 'click', function() {
            var element = $(this);
            bootbox.confirm({
                backdrop: true,
                title: "Are you sure?",
                message: "Do you want to delete record now? This cannot be undone.",
                buttons: {
                    cancel: {
                        label: '<i class="fa fa-times"></i> Cancel',
                        className: 'btn-default btn-sm'
                    },
                    confirm: {
                        label: '<i class="fa fa-check"></i> Confirm',
                        className: 'btn-warning btn-sm'
                    }
                },
                callback: function (result) {
                    if(result===true){
                        var id = $(element).attr('id');
                        var data = 'id='+id;
                        var parent = $(element).parent().parent();
                        $.ajax({
                            type: "POST",
                            url: '<?php echo site_url('admin/Cv/delete'); ?>',
                            data: data,
                            cache: false,
                            success: function(data){
                                data = JSON.parse(data);
                                if(data['status']==1){
                                    parent.fadeOut('slow', function() {
                                        table.row($(this)).remove().draw(false);
                                        showMessage(data['message'],'success');
                                    });
                                }
                                else{
                                    showMessage(data['message'],'danger');
                                }
                            },
                            error: function (request, status, error) {
                                showMessage(request.responseText,'warning');
                            }
                        });
                    }
                }
            });
        });
        $(document).delegate('.btn-status', 'click', function() {
            var id = $(this).attr('id');
            var status = $(this).val();
            var data = 'id='+ id +"&status="+status;
            var button = $(this);
            $.ajax({
                type: "POST",
                url: '<?php echo site_url('admin/Cv/status'); ?>',
                data: data,
                cache: false,
                success: function(data){
                    data = JSON.parse(data);
                    if(data['status']==1){
                        $(button).val(Math.abs(status-1));
                        table.draw(false);
                        showMessage(data['message'],'success');
                    }
                    else{
                        button.prop("checked", !button.prop("checked"));
                        showMessage(data['message'],'danger');
                    }
                },
                error: function (request, status, error) {
                    button.prop("checked", !button.prop("checked"));
                    showMessage(request.responseText,'warning');
                }
            });

        });
    });

</script>
 <?php
    }
?>