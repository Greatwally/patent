<?php

defined('_JEXEC') or die('Restricted access');

//тут коннект к базе
 
?>

<div class="generate-document">
  <h3>Выберите членов профсоюза</h3>

  <div class="container inputs">
    <label><input type="checkbox" id="all"/>Выбрать всех</label><br/>
    <label><input type="checkbox"/> Административный район</label><br/>
    <label><input type="checkbox"/> Административный район </label><br/>
    <label><input type="checkbox"/> Административный район </label><br/>
    <label><input type="checkbox"/> Административный район </label><br/>
  </div>
  <br>
  <label><span style="display:block; width: 50px; float: left;">От</span><input type="text"></label>
  <br><br>
  <label><span style="display:block; width: 50px; float: left">Приказ</span><input type="text"></label>
  <br><br>
  <label><span style="display:block; width: 50px; float: left">Тема</span><input type="text"></label>

  <h3>Инфа какая-то обшая для всех</h3>
    <?php
    $editor =& JFactory::getEditor();
    echo $editor->display('jform[member_profile]', htmlspecialchars($this->member->member_profile, ENT_QUOTES),'900','500','60','20',array('pagebreak','readmore'));
    ?>
  <br>
  <br>
  <br>
    3 баттона, каждый отвечает за свое
  <br>
    <button>сгенерировать документ со списком</button>
    <button>сгенерировать документ с рассылкой</button>
    <button>разослать уведомления на почту</button>
</div>
<script>
  var el = document.querySelector("#all");
  var els = document.querySelectorAll('input[type=checkbox]');
  el.addEventListener("click", function () {
    els.forEach(function (item, i, els) {
      el.checked ? els[i].checked = true  : els[i].checked = false;
    })
  });
</script>