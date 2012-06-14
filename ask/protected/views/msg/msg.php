<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<style>
*{ margin:0; padding:0;}
body{ background:#f0f0f0; font:12px Arial, Helvetica, sans-serif; color:#505050; }
#box{ width:600px; margin:0 auto; background:#fff; border:1px solid #ccc; padding:20px; display:none; -webkit-border-radius: 10px;-moz-border-radius: 10px; display:none; }
#box p{ margin-bottom:20px;}
</style>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js" type="text/javascript"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/scripts/jquery.blockUI.js" type="text/javascript"></script>
<script type="text/javascript">
$(function(){
        $.blockUI({
            message: $('#box'),
            css: {
		        top:		'50%',
		        left:		'50%',
		        textAlign:	'left',
		        marginLeft:     '-320px',
		        marginTop:      '-145px',
                width: '600px',
                background:'none'
            }
        });
		setTimeout($.unblockUI, 2000);
		$('#close').click($.unblockUI);
});
</script>

<div id="box">
<h3><?php echo $message;?></h3>
<p>
	<?php
		if (!empty($url)){
			?>
			<span>
                        页面将在3秒后自动跳转到下一页，你也可以直接点 <a href="<?php echo $url ?>" >立即跳转</a>。
                        <script type="text/javascript">
                            function redirect(url, time) {
                                setTimeout("window.location='" + url + "'", time * 1000);
                            }
                            redirect('<?php echo $url ?>', 3);
                        </script>
                    </span>
			<?php
			exit;
		}
	?>

</p>

</div>