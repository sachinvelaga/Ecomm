define([
  'jquery',
  'underscore',
  'backbone',
  'text!/templates/header.html'
], function ($, _, Backbone, headerTemplate) {
  var HeaderView = Backbone.View.extend({
    el: $('#app-header .app-wrap'),

    events: {
      'keyup .search-input': 'search'
    },

    initialize: function (query) {
      this.render(query);
    },

    search: function (e) {
      console.log(arguments);
      var $e = $(e.target);

      if(e.keyCode === 13) {
        NS.R.navigate('search?query=' + $e.val(), {
          trigger: true
        });
      }
    },

    render: function (query) {
      var compiledTemplate = _.template(headerTemplate, {
        query: query
      });
      this.$el.html(compiledTemplate);
    }
  });

  return HeaderView;
});