'use strict';

import $          from 'jquery';
import Button     from './button.js';
import ShareCount from './share-count.js';
import Popup      from './popup.js';

export default class MwShareButtonsFacebook extends Button {
  constructor(button, params) {
    super(button, params);
  }

  count() {
    const api = '//graph.facebook.com/?id=' + this.params.url;
    new ShareCount(api).request().done((json) => {
      let count = 0;
      if ('share' in json) {
        if ('share_count' in json.share) {
          count = json.share.share_count;
        }
      }
      this.button.find('.mw-share-button__count').text(count);
    });
  }

  popup() {
    new Popup(
      this.button.find('.mw-share-button__button'),
      'Share on Facebook',
      670,
      400
    );
  }
}
