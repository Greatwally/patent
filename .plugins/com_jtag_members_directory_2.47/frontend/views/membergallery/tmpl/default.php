
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
*/
defined('_JEXEC') or die('Restricted access');

?>
<html>
<body>
<!-- Added by Priyanka Bhorkade on 28th Dec 2012. Functionality to delete indivisual gallary images  -->
<form action="" method="post" name="deleteGallary" id="delete_gallery">
<!-- END -->
    <div id='body'>
     <a href="#" class="back-list" onclick="self.history.back(1)"><?php echo JText:: _('BACK_TO_THE_LIST');?></a>
        <div id="bigPic">
                <?php foreach($this->images as $image ): ?>
					<img src="components/com_jtagmembersdirectory/assets/gallery_pictures/<?php echo $image['image'];?>"   width="700" height="400" />
                <?php endforeach; ?>
        </div>
            
    <?php foreach($this->images as $image ): ?>
<?php $id =$image['image_id']; ?>
             <ul id="thumbs">
<!-- Added by Priyanka Bhorkade on 28th Dec 2012. Functionality to delete indivisual gallary images   -->
             <li class='active' rel='1'><img src="components/com_jtagmembersdirectory/assets/gallery_pictures/<?php echo $image['image'];?>"  /><?php $user_id = JRequest::getInt(mid); $user =& JFactory::getUser(); if($image['image'] != NULL){ if($user_id == $user->id){ ?> <input type="checkbox" name = " <?php echo "jform[$id]";?>" onClick = "<?php echo $image['image_id'] ?>" /> <?php }} ?></li>

             </ul>
        <?php endforeach; ?>
        <?php if($image['image'] != NULL){if($user_id == $user->id){ ?>
<input type="submit" name="checkSubmit" value ="Delete"/>  
<?php } }?>
        </div>

<input type="hidden" name="task" value="deleteCheckboxGal" />
<input type="hidden" name="boxchecked" value="0" />
<input type="hidden" name="controller" value="deleteCheckboxGal" />
</form>
<!-- END -->
<script type="text/javascript">
	var currentImage;
    var currentIndex = -1;
    var interval;
    function showImage(index){
        if(index < $('#bigPic img').length){
            var indexImage = $('#bigPic img')[index];
            if(currentImage){   
                    if(currentImage != indexImage ){
                    $(currentImage).css('z-index',2);
                    clearTimeout(myTimer);
                    $(currentImage).fadeOut(250, function() {
                                            myTimer = setTimeout("showNext()", 3000);
                                            $(this).css({'display':'none','z-index':1})
                                        });
                }
            }
            $(indexImage).css({'display':'block', 'opacity':1});
            currentImage = indexImage;
            currentIndex = index;
            $('#thumbs li').removeClass('active');
            //$($('#thumbs li')[index]).addClass('active');
        }
    }
    
    function showNext(){
        var len = $('#bigPic img').length;
        var next = currentIndex < (len-1) ? currentIndex + 1 : 0;
        showImage(next);
    }
    
    var myTimer;
    
    $(document).ready(function() {
            myTimer = setTimeout("showNext()", 3000);
            showNext(); //loads first image
        	$('#thumbs li').bind('click',function(e){
                var count = $(this).attr('rel');
                showImage(parseInt(count)-1);
        	});
    });
    
        
</script>
        
</body></html>
