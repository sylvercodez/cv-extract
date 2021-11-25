<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php
    $colors = array('#FECACE','#D7FFC1','#FCFFC6','#C7FFFC','#FFCCF2','#F1D0FF');
?>

<div class="container">
    <div class="mypanel cv-ready">
        <div class="row">
            <div class="col-md-6">
                <?php if (isset($_SESSION['cvdata']['preview'] )):?>
                <div class="cv-img">
                    <img src="<?= base_url('preview/'.$_SESSION['cvdata']['preview']); ?>" />
                </div>
                <?php else: ?>                
                <div class="cv-img">
                    <iframe src="<?=base_url('cvs/preview/'.$this->uri->segment('3')) ?>" style="min-width: 90%; height: 500px; border: none"></iframe>
                </div>
                <?php endif;?>

                <div class="row" style="padding: 20px 5px 50px 5px;">
                    <div class="col-sm-6">
                        <a class="btn btn-block cv-ready-option" href="<?php echo base_url('cvs/fillinfo/'.$cvinfo->id); ?>">Edit</a>
                    </div>
                    <div class="col-sm-6">
                        <a class="btn btn-block cv-ready-option" href="<?php echo base_url('cvs'); ?>">Change Template</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="cv-info">
                    <div class="row">
                        <div class="bdr col-md-12">
                            <h2 style="font-size: 20px;">Awesome! Your CV is ready.</h2>                            
                        </div>
                    </div>
                    <div class="row">
                        <div class="bdr col-md-12">
                            <h1 style="font-weight: bold; font-size: 50px;">N<?php echo $cvinfo->price; ?></h1>
                        </div>
                    </div>
                    <div class="row">
                        <div class="bdr col-md-12">
                            <?php 
                                if($cvinfo->social_discount>0){
                                    ?>
                                    <h3 style="font-size: 15px; padding-bottom: 5px;">Share to your friends and get N<?php echo $cvinfo->social_discount; ?> off</h3>
                                    <?php
                                }
                            ?>
                            <div class="social-share">
                                <img style="width: 30px; padding: 0;" src="<?php echo asset_url('images/FACEBOOK.png'); ?>" />
                                <img style="width: 30px; padding: 0; margin-left: 10px;" src="<?php echo asset_url('images/TWITTER.png'); ?>" />
                            </div>
                            
                        </div>
                    </div> 
                    <div class="row">
                        <div class="col-md-12">
                        <?php 
                        if($this->session->has_userdata('user_id')){
                            $status = $this->payment->is_cv_bought($this->uri->segment('3'));
                            if($status):
                            ?>
                            <p><a class="btn-proceed-pay" href="<?= base_url('cvs/download/'.$this->uri->segment('3'))?>"> Download here</a></p>                            
                            <?php else: ?>
                            <p><form >
                                <script src="https://js.paystack.co/v1/inline.js"></script>
                                <button class="btn-proceed-pay" type="button" onclick="payWithPaystack()" id="pay-btn"> Pay </button> 
                            </form></p>
                            <?php endif;
                         }else{?>
                        <p><a class="btn-proceed-pay" href="#" data-toggle="modal" data-target="#myModal">Sign in and Download <span class="caret"></span></a></p>
                            <?php }?>
                        </div>
                    </div>
                    
                                       
                </div>
            </div>
        </div>
    </div>
</div>
<?php if($this->session->has_userdata('user_id')): ?>
<script>
  function payWithPaystack(){

    document.getElementById("pay-btn").disabled = true;
    var xmlhttp = new XMLHttpRequest();
xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        var paymentDetails = JSON.parse(this.responseText);
        // document.getElementById("demo").innerHTML = myObj.name;
        // console.log(paymentDetails);
        var handler = PaystackPop.setup({
      key: '<?= PUBLIC_KEY ?>',
      email: paymentDetails.email,
      amount: paymentDetails.price,
      ref: paymentDetails.reference,
      metadata: {
         custom_fields: [
            {
                display_name: "Mobile Number",
                variable_name: "mobile_number",
                value: "+2348012345678"
            }
         ]
      },
      callback: function(response){
        //   alert('success. transaction ref is ' + response.reference);
        window.location.replace('<?= base_url("payments/verify/") ?>'+ response.reference);
      },
      onClose: function(){
        //   alert('window closed');
        document.getElementById("pay-btn").disabled = false;
      }
    });
    handler.openIframe();
    }
};
xmlhttp.open("GET", '<?=base_url("payments/pay/".$this->uri->segment('3'))?>', true);
xmlhttp.send();          
  }
</script>
<?php endif; ?>
<script>
$.fn.extend({
	print: function() {
		var frameName = 'printIframe';
		var doc = window.frames[frameName];
		if (!doc) {
			$('<iframe>').hide().attr('name', frameName).appendTo(document.body);
			doc = window.frames[frameName];
		}
		doc.document.body.innerHTML = this.html();
		doc.window.print();
		return this;
	}
});
</script>