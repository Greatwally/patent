<?php
/*------------------------------------------------------------------------
# com_joomlatag_members_directory � Jtag Members Directory
# ------------------------------------------------------------------------
# author    Joomlatag.com
# copyright Copyright (C) 2011 Joomlatag. All Rights Reserved.
# Websites  http://www.joomlatag.com
# Support   http://www.joomlatag.com/Forum/
# @version  2.0
# @license  http://www.joomlatag.com/Different-articles/software-license.html
-------------------------------------------------------------------------*/
defined('_JEXEC') or die('Restricted access'); 	
?>

<script type="text/javascript">

function alphaclick(alpha) {
	
  var url = 'index.php?option=com_jtagmembersdirectory&format=raw&alphabet='+alpha;		
  if (MooTools.version < '1.3')
  {
    var result = new Ajax(url, { method: 'get', onRequest: function() { }, onSuccess: function(data) {  $('jtag-member-list').innerHTML = data; $('jtag-md-overall-partial').setStyle('display', 'none'); }});
    result.request();
  }
  else
  {
    var result = new Request.HTML({ url: url,  method: 'get',   update: 'jtag-member-list',  onRequest: function() {} });
    result.send();
  }
          
}
</script>


<div float:left>
<a id=mylink value="A" href="javascript:void(0)" onclick=alphaclick("A") >A</a>
<a id=mylink value="B" href="javascript:void(0)" onclick=alphaclick("B") >B</a>
<a id=mylink value="C" href="javascript:void(0)" onclick=alphaclick("C") >C</a>
<a id=mylink value="D" href="javascript:void(0)" onclick=alphaclick("D") >D</a>
<a id=mylink value="E" href="javascript:void(0)" onclick=alphaclick("E") >E</a>
<a id=mylink value="F" href="javascript:void(0)" onclick=alphaclick("F") >F</a>
<a id=mylink value="G" href="javascript:void(0)" onclick=alphaclick("G") >G</a>
<a id=mylink value="H" href="javascript:void(0)" onclick=alphaclick("H") >H</a>
<a id=mylink value="I" href="javascript:void(0)" onclick=alphaclick("I") >I</a>
<a id=mylink value="J" href="javascript:void(0)" onclick=alphaclick("J") >J</a>
<a id=mylink value="K" href="javascript:void(0)" onclick=alphaclick("K") >K</a>
<a id=mylink value="L" href="javascript:void(0)" onclick=alphaclick("L") >L</a>
<a id=mylink value="M" href="javascript:void(0)" onclick=alphaclick("M") >M</a>
<a id=mylink value="N" href="javascript:void(0)" onclick=alphaclick("N") >N</a>
<a id=mylink value="O" href="javascript:void(0)" onclick=alphaclick("O") >O</a>
<a id=mylink value="P" href="javascript:void(0)" onclick=alphaclick("P") >P</a>
<a id=mylink value="Q" href="javascript:void(0)" onclick=alphaclick("Q") >Q</a>
<a id=mylink value="R" href="javascript:void(0)" onclick=alphaclick("R") >R</a>
<a id=mylink value="S" href="javascript:void(0)" onclick=alphaclick("S") >S</a>
<a id=mylink value="T" href="javascript:void(0)" onclick=alphaclick("T") >T</a>
<a id=mylink value="U" href="javascript:void(0)" onclick=alphaclick("U") >U</a>
<a id=mylink value="V" href="javascript:void(0)" onclick=alphaclick("V") >V</a>
<a id=mylink value="W" href="javascript:void(0)" onclick=alphaclick("W") >W</a>
<a id=mylink value="X" href="javascript:void(0)" onclick=alphaclick("X") >X</a>
<a id=mylink value="Y" href="javascript:void(0)" onclick=alphaclick("Y") >Y</a>
<a id=mylink value="Z" href="javascript:void(0)" onclick=alphaclick("Z") >Z</a>
</div>

