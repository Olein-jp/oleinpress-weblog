'use strict';

import $          from 'jquery';
import Button     from './button.js';
import ShareCount from './share-count.js';
import Popup      from './popup.js';

export default class MwShareButtonsPocket extends Button {
  constructor(button, params) {
    super(button, params);
  }

  count() {
    const api = wp_mw_share_buttons_pocket.endpoint;
    new ShareCount(api, 'json', {
        action     : wp_mw_share_buttons_pocket.action,
        _ajax_nonce: wp_mw_share_buttons_pocket._ajax_nonce,
        post_id    : this.params.post_id
      }
    ).request().done((json) => {
      let count = json ? json : 0;
      this.button.find('.mw-share-button__count').text(count);
    });
  }

  popup() {
    new Popup(
      this.button.find('.mw-share-button__button'),
      'Pocket',
      550,
      350
    );
  }
}
