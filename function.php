<?php
function css($num1,$num2,$num3,$num4,$id,$n){
    return "<div class='"."col-lg-".$num1." "."col-md-".$num2." "."col-sm-".$num3." "."col-xs-".$num4." "."e-msg'>"."<div id=".$id.">".$n."</div></div>";
}
function b_css($num1,$num2,$num3,$num4,$num5,$num6,$num7){
    return "<div class='"."col-lg-".$num1." "."col-md-".$num2." "."col-sm-".$num3." "."col-xs-".$num4." "."e-msg'>"."<button type=button"." "."class='".$num7.""."'id=".$num5.">".$num6."</button></div>";
}
?>