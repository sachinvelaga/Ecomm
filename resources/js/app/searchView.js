define([
  'jquery',
  'underscore',
  'backbone',
  'SearchCollection',
  'text!/templates/SearchList.html'
], function ($, _, Backbone, SearchCollection, searchListTemplate) {
  var SearchView = Backbone.View.extend({
    el: $('#app-content .app-wrap'),

    initialize: function () {
      this.collection = new SearchCollection();
      this.collection.on('reset', this.render, this);
    },

    render: function () {
      var compiledTemplate = _.template(searchListTemplate, {
        products: this.collection.models
      });
      this.$el.html(compiledTemplate);
    }
  });

  return SearchView;
});