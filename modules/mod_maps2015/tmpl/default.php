<?
/**
 * API Яндекс карт
2015 - 
 */
defined('_JEXEC') or die; 
$temp =  array();
$point =  array();
$newtext = "";
$arraystoplist = "";
$list_templates_json_decode = json_decode($list_templates);
//print_r($list_templates_json_decode);

if($list_templates_json_decode) {
foreach ($list_templates_json_decode->template as  $value)
   {
	$temp[]=$value; // выводим точки
   }
                                 }
if($list_templates_json_decode) {
foreach ($list_templates_json_decode->point as  $value)
   {
	$point[]=$value; // выводим флажки 
   }   
                                }
if($list_templates_json_decode) {
foreach ($list_templates_json_decode->description as  $value)
   {

	$desc_explode[] = trim($value);// выводим описание    
   }
                                 }
   $count = count($temp); // сколько точек ?
   //echo 	$desc_explode[0];
$doc = JFactory::getDocument();
$doc->addScript("https://api-maps.yandex.ru/2.1/?lang=ru_RU");


$rand = rand(1,1000);

?>
<div class="yandex_map" id="yandex_map<?php echo $rand;?>"><script type="text/javascript">

var myMap;
// Дождёмся загрузки API и готовности DOM.
ymaps.ready(init);

function init () {
    var myMap = new ymaps.Map("map2<?php echo $rand;?>", {
            center: [<?php echo $centermap;?>],
            zoom: <?php echo $scope;?>,
			controls: [<? if($scrope_bool==1) {?>'zoomControl',<? } ?><? if($bottom_bool==1) {?>'searchControl',<? } ?><? if($typemap_bool==1) {?>'typeSelector',<? } ?>'fullscreenControl']
			//,type: "yandex#satellite" // загрузка спутник
			   });
<? 
for($i=0;$i<$count;$i++)
{
?>
 // Создаем геообъект с типом геометрии "Точка".
   myPlacemark<?php echo $i?> = new ymaps.Placemark([<? echo $temp[$i];?>], {
            // Свойства.
  balloonContent: '<?php 
    $desc = explode("\n", $desc_explode[$i]);
	for($y=0;$y<count($desc);$y++) {echo $desc[$y];} // "распарим" строку для корректного отображения тэгов HTML 
  ?>'}, {
					
            // Опции.
			    // Необходимо указать данный тип макета.
            iconLayout: 'default#image',
            // Своё изображение иконки метки.
			//<?php 

			echo  $pos = strpos($point[$i], "/");// если первый символ "/" то $pos == 0 //?> 
            iconImageHref: '<?php 
			// проверка на наличия файла
			$filename = ''; // обнулим ранний цикл			
    		if(trim($point[$i])== true) { // если  флажок указан, т.е.  что-то написано 
			if($pos==0) {} else {$point[$i]="/".$point[$i];} // ecли  $pos == 0 то "/" ставить не нужно else  надо	
			$filename = trim("http://".$_SERVER['HTTP_HOST'].$point[$i]); //присвоим	
			 		                      }

			// файл, который мы проверяем			
			$Headers = @get_headers($filename);
			// проверяем ли ответ от сервера с кодом 200 - ОК
			if(preg_match("|200|", $Headers[0])) { // - немного дольше :)
			//if(strpos('200', $Headers[0])) {
			echo $filename;
			} else {
			echo "/".$iconmap;
			}	
			//echo $point[$i]
			//echo $iconmap;
			
			?>',
            // Размеры метки. <?php //print_r($Headers); ?> 
            iconImageSize: [<?php echo $icon_wi;?>, <?php echo $icon_he;?>],
            // Смещение левого верхнего угла иконки относительно
            // её "ножки" (точки привязки).
           iconImageOffset: [<?php echo $zn1;?>, <?php echo $zn2;?>]
        });		
		
<?
} // конец for

 if($trafficControl==1) {?>
   // Создадим элемент управления "Пробки".
    var trafficControl = new ymaps.control.TrafficControl({ state: {
            // Отображаются пробки "Сейчас".
            providerKey: 'traffic#actual',
            // Начинаем сразу показывать пробки на карте.
            trafficShown: true
        }});
    // Добавим контрол на карту.
    myMap.controls.add(trafficControl);
    // Получим ссылку на провайдер пробок "Сейчас" и включим показ инфоточек.
    trafficControl.getProvider('traffic#actual').state.set('infoLayerShown', true);  
 // Добавляем все метки на карту.


<?php  } ?>

<?php if($scaling==1) { ?>myMap.behaviors.disable('scrollZoom'); <?php } ?>


myMap.geoObjects<?php 
for($i=0;$i<$count;$i++)
{ ?>	
.add(myPlacemark<?php echo $i;?>)
<?php } ?>
    
}

</script>
<div class="spb-webmaster" id="map2<?php echo $rand;?>" 
   style="width:<?php
$wi = trim($wi); 
$mystring = $wi;
$findme   = '%';
$findme2   = 'px';
$pos_proc = strpos($mystring, $findme);
$pos_px = strpos($mystring, $findme2);

// Заметьте, что используется ===.  Использование == не даст верного результата
if (($pos_proc === false) and ($pos_px === false)) { echo $wi."px";} else { echo $wi;} ?>;
  
  
  height:<?php
$he = trim($he); 
$mystring = $he;
$findme   = '%';
$findme2   = 'px';
$pos_proc = strpos($mystring, $findme);
$pos_px = strpos($mystring, $findme2);

// Заметьте, что используется ===.  Использование == не даст верного результата
if (($pos_proc === false) and ($pos_px === false)) { echo $he."px";} else { echo $he;} ?>;"></div>
</div>
<div class="clear" style="clear:both"></div>
