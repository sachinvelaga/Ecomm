define([
  'underscore',
  'backbone',
  'ProductModel'
], function (_, Backbone, ProductModel) {

  var SearchCollection = Backbone.Collection.extend({
    url: 'api/search',
    model: ProductModel
  });

  return SearchCollection;
});