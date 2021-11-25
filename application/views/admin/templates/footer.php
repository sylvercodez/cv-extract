<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

            <div id="message">
                <div id="inner-message" class="alert fade in">
                </div>
            </div>
            
            <footer class="main-footer navbar-fixed-bottom_">
    			<div class="<?php echo CONTAINER; ?>">
					<div class="pull-right hidden-xs">
						
					</div>
    				&copy; 2018
    			</div>
    			<!-- /.container -->
    		</footer>
    	</div>
    	<!-- ./wrapper -->
        
    	<!-- SlimScroll -->
    	<script src="<?php echo base_url(); ?>assets/admin/plugins/slimScroll/jquery.slimscroll.min.js"></script>
    	<!-- FastClick -->
    	<script src="<?php echo base_url(); ?>assets/admin/plugins/fastclick/fastclick.js"></script>
    	<!-- AdminLTE App -->
    	<script src="<?php echo base_url(); ?>assets/admin/js/adminlte.min.js"></script>
        
    	<!-- AdminLTE for demo purposes -->
    	<script src="<?php echo base_url(); ?>assets/admin/js/demo.js"></script>
        <script src="<?php echo base_url(); ?>assets/admin/js/custom.js"></script>

        <script src="<?php echo base_url(); ?>assets/admin/js/bootbox.min.js"></script>
        
		<script src="<?php echo base_url(); ?>assets/admin/plugins/datetimepicker/datetimepicker.js"></script>
		
        <script src="<?php echo base_url(); ?>assets/admin/plugins/ace/js/ace.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/admin/plugins/ace/js/ace-elements.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/admin/plugins/ace/js/spinbox.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/admin/plugins/ace/js/chosen.jquery.min.js"></script>
		
		
		
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/plugins/datatables/dataTables.bootstrap.min.css" />
		<script src="<?php echo base_url(); ?>assets/admin/plugins/datatables/jquery.dataTables.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/admin/plugins/datatables/dataTables.bootstrap.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/admin/js/validator.js"></script>
		<script type="text/javascript">
			$(document).ready(function(){
			     $.validator.setDefaults({ ignore: ":hidden:not(select)" });
				$(".chosen-select").chosen();
                //$('#spinner1').ace_spinner({value:0,min:0,max:200,step:10, btn_up_class:'btn-success btn-flat' , btn_down_class:'btn-warning btn-flat'}).closest('.ace-spinner').on('changed.fu.spinbox', function(){ console.log($('#spinner1').val()) });
				
				$('#spinner2').ace_spinner({value:0,min:0,max:10000,step:100, touch_spinner: true, icon_up:'ace-icon fa fa-caret-up bigger-110', icon_down:'ace-icon fa fa-caret-down bigger-110'});
				$('#spinner1').ace_spinner({value:0,min:0,max:100,step:1, on_sides: true, icon_up:'ace-icon fa fa-plus bigger-110', icon_down:'ace-icon fa fa-minus bigger-110', btn_up_class:'btn-success' , btn_down_class:'btn-danger'});
				$('#spinner4').ace_spinner({value:0,min:-100,max:100,step:10, on_sides: true, icon_up:'ace-icon fa fa-plus', icon_down:'ace-icon fa fa-minus', btn_up_class:'btn-purple' , btn_down_class:'btn-purple'});

				$(".spinbox-input").addClass("input-sm");
				
				$('.datepicker').datetimepicker({
					//useCurrent:false,
					//autoclose: true,
					//value:'',
					//lang:'en',
					format:'d-m-Y',
					//formatTime:'H:i',
					//formatDate:'d-m-Y',
					//step:60,
					//closeOnDateSelect:0,
					//closeOnWithoutClick:true,
					timepicker:false,
					//datepicker:true,
					//minDate:false,
					//maxDate:false,
					//minTime:false,
					//maxTime:false,
					//allowTimes:[],
					//opened:false,
					//inline:false,
					//onSelectDate:function() {},
					//onSelectTime:function() {},
					//onChangeMonth:function() {},
					//onChangeDateTime:function() {},
					//onShow:function() {},
					//onClose:function() {},
					//onGenerate:function() {},
					//withoutCopyright:true,
					//inverseButton:false,
					//hours12:false,
					//next:	'xdsoft_next',
					//prev : 'xdsoft_prev',
					//dayOfWeekStart:0,
					//timeHeightInTimePicker:25,
					//timepickerScrollbar:true,
					//todayButton:true, // 2.1.0
					//defaultSelect:true, // 2.1.0
					//scrollMonth:true,
					//scrollTime:true,
					//scrollInput:true,
					//mask:false,
					//validateOnBlur:true,
					//allowBlank:false,
					//yearStart:1950,
					//yearEnd:2050,
					//style:'',
					//id:'',
					//roundTime:'round', // ceil, floor
					//className:'',
					//weekends	: 	[],
					//yearOffset:0
				});

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
				
				$('.ace-file-2').ace_file_input({
					style: 'well',
					btn_choose: 'Click to choose',
					btn_change: null,
					no_icon: 'ace-icon fa fa-cloud-upload',
					droppable: false,
					thumbnail: 'large'//large | fit
					//,icon_remove:null//set null, to hide remove/reset button
					/**,before_change:function(files, dropped) {
						//Check an example below
						//or examples/file-upload.html
						return true;
					}*/
					/**,before_remove : function() {
						return true;
					}*/
					,
					preview_error : function(filename, error_code) {
						//name of the file that failed
						//error_code values
						//1 = 'FILE_LOAD_FAILED',
						//2 = 'IMAGE_LOAD_FAILED',
						//3 = 'THUMBNAIL_FAILED'
						//alert(error_code);
					}
			
				}).on('change', function(){
					//console.log($(this).data('ace_input_files'));
					//console.log($(this).data('ace_input_method'));
				});

			});
		</script>
    </body>

</html>