<script language="javascript">    
  window.parent.document.getElementById("OaskUser_WorkID").value='<?php echo $workid?>';
  window.parent.document.getElementById('ls_workname').innerHTML='<?php echo $workname?>';
  <?php
  if(!empty($workid))
      {
  ?>
   window.parent.myclose();
   <?php
      }
   ?>
 </script>
