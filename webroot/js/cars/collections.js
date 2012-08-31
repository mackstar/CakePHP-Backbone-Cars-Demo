$(function(){

  window.CarsList = Backbone.Collection.extend({

    // Reference to this collection's model.
    model: Car,
    url: '/cakefest/cars',
    
    items: function() {
      return this.models.length;
    },
    
  });
  
});