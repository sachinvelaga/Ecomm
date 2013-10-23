define([
  'jquery',
  'underscore',
  'backbone',
  'ProductModel',
  'RelatedView',
  'text!/templates/Product.html'
], function ($, _, Backbone, ProductModel, RelatedView, productTemplate) {
  var ProductView = Backbone.View.extend({
    el: $('#app-content .app-wrap'),

    initialize: function (productId) {
      this.model = new ProductModel({
        ProductId: productId
      });
      this.model.url += '/' + this.model.get('ProductId');
      this.model.fetch();
      this.model.on('change', this.render, this);
      this.model.on('change', this.loadRelated, this);
    },

    loadRelated: function () {
      this.relatedView = new RelatedView(this.model);
    },
    
    render: function () {
      var compiledTemplate = _.template(productTemplate, {
        product: this.model
      });
      this.$el.html(compiledTemplate);
    }
  });

  return ProductView;
});