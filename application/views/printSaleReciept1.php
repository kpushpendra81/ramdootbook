	<style type="text/css">

    #printable { display: block; }

    @media print
    {
    	#non-printable { display: none; }
    	#printable { display: block; }
    }
</style>
<script>
    function autoResize(id){
        var newheight;
        var newwidth;

        if(document.getElementById){
            newheight=document.getElementById(id).contentWindow.document .body.scrollHeight;
            newwidth=document.getElementById(id).contentWindow.document .body.scrollWidth;
        }

        document.getElementById(id).height= (newheight) + "px";
        document.getElementById(id).width= (newwidth) + "px";
    }
</script>
	
	<!-- CONTENT 
	============================================= -->
	<div class="content shortcodes">
		<div class="layout">
			<div class="row">
				<div class="gap" style="height: 20px;"></div>
				<?php if($is_return):?>
					<IFRAME SRC="<?php echo base_url(); ?>invoiceController/iReturnFrameBill/<?php echo $billNo; ?>" width="100%" height="200px" id="iframe1" style="border: 0px;" onLoad="autoResize('iframe1');"></iframe>
				<?php else:?>
					<IFRAME SRC="<?php echo base_url(); ?>invoiceController/iFrameBill1/<?php echo $billNo; ?>" width="100%" height="200px" id="iframe1" style="border: 0px;" onLoad="autoResize('iframe1');"></iframe>
				<?php endif;?>
			</div>
		</div>
	</div>
	<!-- END CONTENT 
	============================================= -->
