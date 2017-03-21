window.addEvent('domready', function(){
  $('jtag-userseacr-submit').addEvent('click', function(){
    jtagMDAjaxSearch();
    
    return false;
  });
  
  $$('input[type=text]').addEvent('keypress', jtagMDTimeOutAjaxSearch = function(){
    if (typeof jtagMDtimeout != 'undefined') {
      clearTimeout(jtagMDtimeout);
    }
    jtagMDtimeout = setTimeout('jtagMDAjaxSearch()', 700);
  });
  
  $$('select').addEvent('change', jtagMDTimeOutAjaxSearch = function(){
    if (typeof jtagMDtimeout != 'undefined') {
      clearTimeout(jtagMDtimeout);
    }
    jtagMDtimeout = setTimeout('jtagMDAjaxSearch()', 700);
  });
  
});

function jtagMDAjaxSearch(pageLink)
{
  if (pageLink != undefined)
  {
    var url = $(pageLink).href;
  }
  else
  {
    var url = 'index.php?option=com_jtagmembersdirectory&format=raw';
    $$('.field').each(function(el) {
      url += '&'+el.name+'='+el.value;
    });
  }
  if (MooTools.version < '1.3')
  {
    var result = new Ajax(url, {
      method: 'get',
      onRequest: function() {
//        $('jtag-member-list').innerHTML = 'loading';
//        $('jtag-md-overall-partial').setStyle('display', 'block');
//        $('jtag-member-list').innerHTML = '<div class="preloader"></div>';
      },
      onSuccess: function(data) {
        $('jtag-member-list').innerHTML = data;
        $('jtag-md-overall-partial').setStyle('display', 'none');
      }
    });
    result.request();
  }
  else
  {
    var result = new Request.HTML({
      url: url,
      method: 'get',
      update: 'jtag-member-list',
      onRequest: function() {
//        $('jtag-member-list').innerHTML = 'loading';
//        $('jtag-md-overall-partial').setStyle('display', 'block');
//        $('jtag-member-list').innerHTML = '<div class="preloader"></div>';
      }
    });
    result.send();
  }
}