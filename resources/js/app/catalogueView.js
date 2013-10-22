define([
  'jquery',
  'underscore',
  'backbone',
  'CatalogueCollection',
  'text!/templates/CatalogueList.html'
], function ($, _, Backbone, CatalogueCollection, catalogueListTemplate) {
  var CatalogueView = Backbone.View.extend({
    el: $('#app-content .app-wrap'),

    initialize: function () {
      this.collection = new CatalogueCollection();
      this.collection.on('reset', this.render, this);
      this.collection.fetch();
    },

    render: function () {
      var compiledTemplate = _.template(catalogueListTemplate, {
        products: this.collection.models
      });
      this.$el.html(compiledTemplate);
    }
  });

  return CatalogueView;
});