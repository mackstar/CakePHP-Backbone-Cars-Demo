$(function(){
  
  CarsRouter = Backbone.Router.extend({
    routes: {
      "": "default",
      "test": "testing"
    },

    default: function(){
      window.App = new AppView;
    },

    testing: function(){
      alert("Testing");
    }
  });
  
  window.Start = new CarsRouter();
  Backbone.history.start();
  
});