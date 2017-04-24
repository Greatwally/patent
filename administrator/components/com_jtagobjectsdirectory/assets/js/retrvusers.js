window.addEvent('domready', function(){
  //position box
  
  $('userlist_box').setStyle('left', (screen.width/2 - 350)+'px');
  
  //show box
  $('jform_user_username').addEvent('click', function(){
      $('overall').setStyle('display', 'block');
      $('userlist_box').setStyle('display', 'block');
      $('username_filter').focus();
      if ($('userlist_results').innerHTML == '')
      {
        jtagMDSendURequest();
      }
  });
  
  $('overall').addEvent('click', function(){
    jtagMDCloseOverall();
  });
  
  $('username_filter').addEvent('keypress', function(){
    if (typeof jtagMDtimeout != 'undefined') {
      clearTimeout(jtagMDtimeout);
    }
    jtagMDtimeout = setTimeout('jtagMDSendURequest($(\'username_filter\').value)', 700);
  });
});

function jtagMDSendURequest(filter)
{
  var url = 'index.php?option=com_jtagobjectsdirectory&task=retrieveUsers&format=raw';
  
  if (filter)
  {
    url += '&filter='+filter;
  }
  
  if (MooTools.version < '1.3')
  {
    var retvusers = new Ajax(url, {
        method: 'get',
        onRequest: function(data) {
          $('userlist_results').innerHTML = '<div class="loader"><img src="components/com_jtagobjectsdirectory/assets/images/loader.gif" width="128" height="128" /></div>';
        },
        onSuccess: function(data) {
          $('userlist_results').innerHTML = data;
        }
    });
    
    retvusers.request();
  }
  else
  {
    var retvusers = new Request.HTML({
      url: url,
      method: 'get',
      update: 'userlist_results',
      onRequest: function() {
        $('userlist_results').innerHTML = '<div class="loader"><img src="components/com_jtagobjectsdirectory/assets/images/loader.gif" width="128" height="128" /></div>';
      }
    });
  
    retvusers.send();
  }
  
  
}

function jtagMDSetUser(data)
{
  if (data.md_profile != null)
  {
    window.location = 'index.php?option=com_jtagobjectsdirectory&controller=jtagobjectsdirectory&task=object&mid='+data.md_profile;
  }

  for (var i in data)
  {
    elementId = 'jform_user_'+i;
    if (element = $(elementId))
    {
      $(elementId).value = data[i];
    }
  }
  
  jtagMDCloseOverall();
}

function jtagMDCloseOverall()
{
  $('userlist_box').setStyle('display', 'none');
  $('overall').setStyle('display', 'none');
}

function jtagMDResetFilter()
{
  if ($('username_filter').value != '')
  {
    $('username_filter').value = '';
    jtagMDSendURequest();
  }
}
