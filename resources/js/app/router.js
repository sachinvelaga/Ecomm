define([
  'jquery',
  'underscore',
  'backbone',
  'catalogueView',
  'HeaderView',
  'searchView',
  'productView'
], function ($, _, Backbone, CatalogueView, HeaderView, searchView, ProductView) {
  
  var AppRouter = Backbone.Router.extend({
    routes: {
      '': 'showCatalogue',
      'catalogue': 'showCatalogue',
      'catalogue/:id': 'showProduct',
      'search?:query': 'search',
      '*actions': 'defaultAction'
    }
  });

  var initialize = function () {
    var appRouter = NS.R = new AppRouter();

    appRouter.on('route:showCatalogue', function () {
      console.log('catalogue');
      NS.V.catalogueView = new CatalogueView();
      NS.V.headerView = new HeaderView('');
    });

    appRouter.on('route:showProduct', function (id) {
      console.log('product');
      console.log(id);
      NS.V.headerView = new HeaderView('');
      NS.V.productView = new ProductView(id);
    });

    appRouter.on('route:search', function (query) {
      console.log('search');
      console.log(query);
      var query = query.slice(6);
      NS.V.headerView = new HeaderView(query);
      NS.V.searchView = new searchView();
      NS.V.searchView.collection.fetch({
        data: {
          query: query
        }
      });
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