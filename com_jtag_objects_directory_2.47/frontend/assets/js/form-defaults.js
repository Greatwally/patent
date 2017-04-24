var dwDefaults = new Class({
  //options
  options: {
    collection: $$('input[type=text]')
  },
  
  //initialization
  initialize: function(options) {
    //set options
    this.setOptions(options);
    this.defaults();
  },
  
  //a method that does whatever you want
  defaults: function() {
    defaults = new Array();
    this.options.collection.each(function(el, i) {

      var eLabel = el.getNext();
      //check value value on domready
      if (el.value != '')
      {
        eLabel.setStyle('display', 'none');
      }
      
      el.addEvent('focus', function() {
        eLabel.setStyle('display', 'none');
        el.select();
      });
      
      el.addEvent('blur', function() {
        if (el.value == '')
        {
          eLabel.setStyle('display', 'inline');
        }
      });
      
      eLabel.addEvent('click', function() {
        eLabel.setStyle('display', 'none');
        el.focus();
      });
    });
  }
  
});

//implements
dwDefaults.implement(new Options)