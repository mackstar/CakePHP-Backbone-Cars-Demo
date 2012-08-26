$(function(){
  
  window.cars = new CarsList();
  
  window.CarView = Backbone.View.extend({
    
    events: {
      "click a.destroy" : "clear"
    },
    
    template: _.template($('#car-detail').html()),
    
    initialize: function(){
       this.model.bind('destroy', this.remove, this);
    },
    
    tagName:  "tr",
    
    render: function() {
      this.$el.html(this.template(this.model.toJSON()));
      this.model.save();
      return this;
    },
    
    clear: function() {
      this.model.clear();
    },
    
    
  });
  
  
  window.AppView = Backbone.View.extend({
    
    el: $("#cars-container"),
    
    events: {
      "submit form": "formSubmitted"
    },

    formSubmitted: function(e){
      e.preventDefault();
      var data = Backbone.Syphon.serialize(this);
      _.each(data, function(val, key){ 
        if (val === "") {
          delete data[key];
        } 
      });
      car = new Car(data);
      cars.add(car);
      this.$('input[type=text]').val("");
    },
    
    statsTemplate: _.template($('#stats').html()),
    
    initialize: function(){
      
      cars.bind('add', this.render, this);
      cars.bind('remove', this.render, this);
      cars.bind('add', this.addOne, this);
      
      cars.bind('reset', this.addAll, this);
      this.main = $('#stats-body');
      
      cars.fetch();
    },
    
    addOne: function(car) {
      var view = new CarView({model: car});
      $("#cars-container").append(view.render().el);
    },
    
    addAll: function() {
      cars.each(this.addOne);
      this.render();
    },
    
    render: function() {
      
       this.main.html(this.statsTemplate({items: cars.items()}));
    }
    
  });
});

