define([
  'jquery',
  'underscore',
  'backbone',
  'catalogueView'
], function ($, _, Backbone, CatalogueView) {
  
  var AppRouter = Backbone.Router.extend({
    routes: {
      'catalogue': 'showCatalogue',
      'catalogue/:id': 'showProduct',
      'search/:query': 'search',
      '*actions': 'defaultAction'
    }
  });

  var initialize = function () {
    var appRouter = new AppRouter();

    appRouter.on('route:showCatalogue', function () {
      console.log('catalogue');
      var catalogueView = new CatalogueView();

    });

    appRouter.on('route:showProduct', function (id) {
      console.log('product');
      console.log(id);
    });

    appRouter.on('route:search', function (query) {
      console.log('search');
      console.log(query);
    });

    appRouter.on('route:defaultAction', function(actions){
      // We have no matching route, lets just log what the URL was
      console.log('No route:', actions);
    });

    Backbone.history.start({
      pushState: true,
      hashChange: false
    });
  };

  return {
    initialize: initialize
  }
});