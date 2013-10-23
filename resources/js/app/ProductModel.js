define([
  'underscore',
  'backbone'
], function (_, Backbone) {

  var ProductModel = Backbone.Model.extend({
    url: '/api/catalogue',
    defaults: {
      GroupId: null,
      ProductId: null,
      MovieTitle: '',
      Store: null
    }
  });

  return ProductModel;
});