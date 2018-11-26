<?php
header("Content-type: application/javascript");
?>

$(document).ready(function(){
	$.ajax({
		url: "<?php echo site_url("ajaxMsg/loadInbox") ?>",
		type: 'POST',
		success: function(msg){
			$("#msgBody").html(msg);
		}
	});
});