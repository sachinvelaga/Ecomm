define([
  'underscore',
  'backbone',
  'ProductModel'
], function (_, Backbone, ProductModel) {

  var CatalogueCollection = Backbone.Collection.extend({
    url: 'api/catalogue',
    model: ProductModel
  });

  return CatalogueCollection;
});