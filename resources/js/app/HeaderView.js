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

    initialize: function () {
      this.render();
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

    render: function () {
      var compiledTemplate = _.template(headerTemplate, {
        query: ''
      });
      this.$el.html(compiledTemplate);
    }
  });

  return HeaderView;
});