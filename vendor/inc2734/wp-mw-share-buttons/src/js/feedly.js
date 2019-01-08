'use strict';

import $          from 'jquery';
import Button     from './button.js';
import ShareCount from './share-count.js';

export default class MwShareButtonsFeedly extends Button {
  constructor(button, params) {
    super(button, params);
  }

  count() {
    const api = wp_mw_share_buttons_feedly.endpoint;
    new ShareCount(api, 'json', {
        action     : wp_mw_share_buttons_feedly.action,
        _ajax_nonce: wp_mw_share_buttons_feedly._ajax_nonce
      }
    ).request().done((json) => {
      let count = json.subscribers ? json.subscribers : 0;
      this.button.find('.mw-share-button__count').text(count);
    });
  }
}
