define([
  'underscore',
  'backbone',
  'ProductModel'
], function (_, Backbone, ProductModel) {

  var CatalogueCollection = Backbone.Collection.extend({
    url: '/home/catalogue',
    model: ProductModel
  });

  return CatalogueCollection;
});