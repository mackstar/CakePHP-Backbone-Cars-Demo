$(function(){
  window.Car = Backbone.Model.extend({
    
    idAttribute: "_id",
    urlRoot: "/cakefest/cars",

    defaults: function() {
      return {
        maker: "OTHER",
        model: "OTHER",
        show: true
      };
    },
    

    toggle: function() {
      this.save({show: !this.get("show")});
    },

    clear: function() {
      this.destroy();
    }

  });
});