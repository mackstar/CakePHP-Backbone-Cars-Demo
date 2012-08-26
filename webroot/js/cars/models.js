$(function(){
  window.Car = Backbone.Model.extend({
    
    idAttribute: "_id",
    urlRoot: "/cake/cars",

    // Default attributes for the todo item.
    defaults: function() {
      return {
        maker: "OTHER",
        model: "OTHER",
        show: true
      };
    },
    

    // Ensure that each todo created has `title`.
    initialize: function() {
    },

    // Toggle the `done` state of this todo item.
    toggle: function() {
      this.save({show: !this.get("show")});
    },

    // Remove this Todo from *localStorage* and delete its view.
    clear: function() {
      this.destroy();
    }

  });
});