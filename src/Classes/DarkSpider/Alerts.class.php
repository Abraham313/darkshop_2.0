<?php

class Alerts{

    static public function render($type,$message){
        return "<script>  toastr.".$type."('".$message."')  </script>";
    }


}

