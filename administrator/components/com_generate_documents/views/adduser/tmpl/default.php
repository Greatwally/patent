<?php
defined('_JEXEC') or die('Restricted access');
?>

<form action="" method="post">
    <div class="generate-document">
        <?php if (isset($this->files)): ?>
            <h3>Скачать</h3>
            <div class="container">
                <?php foreach ($this->files as $file): ?>
                    <a href="<?php echo $file['url']; ?>"><?php echo $file['name']; ?></a><br>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <h3>Выберите членов профсоюза</h3>

        <div class="container inputs">
            <label><input type="checkbox" id="all"/>Выбрать всех</label><br/>
            <?php foreach ($this->countries as $country): ?>
                <label>
                    <input type="checkbox" name="countries[]" value="<?php echo $country->country; ?>"/><?php echo $country->name; ?>
                </label><br/>
            <?php endforeach; ?>
        </div>

        <br>
        <label><span style="display:block; width: 50px; float: left;">От</span><input type="text" name="from"></label>
        <br><br>
        <label><span style="display:block; width: 50px; float: left">Приказ</span><input type="text" name="order"></label>
        <br><br>
        <label><span style="display:block; width: 50px; float: left">Тема</span><input type="text" name="topic"></label>

        <h3>Инфа какая-то обшая для всех</h3>
        <?php
        $editor = JFactory::getEditor();
        echo $editor->display(
            'text',
            htmlspecialchars('', ENT_QUOTES),
            '900',
            '500',
            '60',
            '20',
            array('pagebreak', 'readmore')
        );
        ?>
        <br>
        <br>
        <br>
        3 баттона, каждый отвечает за свое
        <br>
        <button type="submit" name="type" value="list">сгенерировать документ со списком</button>
        <button type="submit" name="type" value="generate">сгенерировать документ с рассылкой</button>
        <!--<button type="submit" name="type" value="mail">разослать уведомления на почту</button>-->
    </div>
</form>

<script>
    var el = document.querySelector("#all");
    var els = document.querySelectorAll('input[type=checkbox]');
    el.addEventListener("click", function () {
        els.forEach(function (item, i, els) {
            el.checked ? els[i].checked = true : els[i].checked = false;
        })
    });
</script>