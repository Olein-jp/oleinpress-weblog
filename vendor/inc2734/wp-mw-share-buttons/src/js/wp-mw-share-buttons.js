'use strict';

import $        from 'jquery';
import Facebook from './facebook.js';
import Twitter  from './twitter.js';
import Hatena   from './hatena.js';
import Pocket   from './pocket.js';
import Feedly   from './feedly.js';

export default class WpMwShareButtons {
  constructor(params) {
    $(() => {
      this.container = $('.wp-mw-share-buttons');
      this.params = $.extend({
        title    : encodeURIComponent(this.container.data('wp-mw-share-buttons-title')),
        url      : this.container.data('wp-mw-share-buttons-url'),
        post_id  : this.container.data('wp-mw-share-buttons-postid')
      }, params);

      new Facebook(
        this.container.find('.mw-share-button--facebook'),
        this.params
      );

      new Twitter(
        this.container.find('.mw-share-button--twitter'),
        this.params
      );

      new Hatena(
        this.container.find('.mw-share-button--hatena'),
        this.params
      );

      new Pocket(
        this.container.find('.mw-share-button--pocket'),
        this.params
      );

      new Feedly(
        this.container.find('.mw-share-button--feedly'),
        this.params
      );
    });
  }
}
