<script>
    //alert('http://img.9ask.cn<?php echo $picurl?>');
parent.document.getElementById("img_CurrentHeadImage").src='http://img.9ask.cn<?php echo $picurl?>';
 window.parent.document.location.href='<?php echo url('user/profile/uppic')?>';
</script>