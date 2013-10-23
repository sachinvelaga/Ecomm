define([
  'jquery',
  'underscore',
  'backbone',
  'ProductModel',
  'text!/templates/Product.html'
], function ($, _, Backbone, ProductModel, productTemplate) {
  var ProductView = Backbone.View.extend({
    el: $('#app-content .app-wrap'),

    initialize: function (productId) {
      this.model = new ProductModel({
        ProductId: productId
      });
      this.model.url += '/' + this.model.get('ProductId');
      this.model.fetch();
    },

    render: function () {
      var compiledTemplate = _.template(productTemplate, {
        products: this.model
      });
      this.$el.html(compiledTemplate);
    }
  });

  return ProductView;
});