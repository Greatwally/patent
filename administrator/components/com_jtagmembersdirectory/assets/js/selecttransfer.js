jQuery(document).ready(function() {  
   jQuery('#add').click(function() {  
     jQuery('#select2 option').each(function(i) {
       jQuery(this).attr("selected", "selected");
     });
    return !jQuery('#select1 option:selected').remove().appendTo('#select2');  
   });  
   jQuery('#remove').click(function() {  
//     jQuery('#select2 option').each(function(i) {
//       jQuery(this).attr("selected", "selected");
//     });
    appended = !jQuery('#select2 option:selected').remove().appendTo('#select1');
    jQuery('#select2 option').each(function(i) {
       jQuery(this).attr("selected", "selected");
     });
     
     return appended;
   }); 
   
   jQuery('#select2 option').each(function(i) {
       jQuery(this).attr("selected", "selected");
     });
   
//   jQuery('#adminForm').submit(function() {
//     jQuery('#select2 option').each(function(i) {
//       jQuery(this).attr("selected", "selected");
//     });
//   });  
  });  
