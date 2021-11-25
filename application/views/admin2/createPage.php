
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

            <div class="col-md-5">
                <form class="form-group" method="post">
                    <div>
                        <label for="price">Price</label>
                        <input type="number" name="price" class="form-control" required value="<?=(isset($cv)) ? $cv->price : ''?>">
                    </div>
                    <div>
                        <label for="html">HTML</label>
                        <textarea id="html" name="html" class="form-control" rows="10" required="true">
                        <?php if (!isset($cv)){
                            echo "your html code";
                            }else{ 
                                // $this->load->library('editor');
                                echo $this->editor->get_file('cvs/'.$cv->html);
                            } ?>
                        </textarea>
                    </div>
                    <input type="submit" value="save">
                </form>
            </div>
            <div class="col-md-7">
                <h2 class="text-center">Preview</h2>
                <iframe id="code" style="position: relative; width: 100%;"></iframe>
            </div>
        </div>
    </div>

</div>
<script>
    function compile() {
        var html = document.getElementById("html");
        var code = document.getElementById("code").contentWindow.document;

        document.body.onkeyup = function () {
            
            // code.body.innerHTML="";
            // code.body.innerHTML=html.value;
            // code.write(html.value);
            var postdata = html.value;
            code.open();
            code.write(validate_html(postdata));
            code.close();
            /*$.ajax({
            type: "POST",
            url: "",
            data: {postdata:postdata},
            complete: function(data){
                code.open();
                // console.log(data.responseJSON);
                // var response = JSON.parse(data.responseJSON.response)
                code.write(data.responseJSON.response);
                code.close();                        
                }
            });
            */
            
        }
    }
    function validate_html(obj){
// console.log(html);
// console.log( typeof html_value);
        // return eval(html_value);
        return Function( '"use strict"; return(' + obj + ')' )();
    }
    compile();
    
</script>
