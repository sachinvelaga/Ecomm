define([
  'jquery',
  'underscore',
  'backbone',
  'CatalogueCollection',
  'text!/templates/CatalogueList.html'
], function ($, _, Backbone, CatalogueCollection, catalogueListTemplate) {
  var CatalogueView = Backbone.View.extend({
    el: $('#app-content .related-products'),

    initialize: function (model) {
      this.collection = new CatalogueCollection();
      this.collection.on('reset', this.render, this);
      this.collection.url = '/api/related?productId=' + model.get('ProductId') + '&id=' + model.get('id');
      this.collection.fetch();
    },

    render: function () {
      var compiledTemplate = _.template(catalogueListTemplate, {
        products: this.collection.models
      });
      $('#app-content .related-products').html(compiledTemplate);
    }
  });

  return CatalogueView;
});