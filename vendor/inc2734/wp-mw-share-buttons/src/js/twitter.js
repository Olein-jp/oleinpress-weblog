'use strict';

import $          from 'jquery';
import Button     from './button.js';
import ShareCount from './share-count.js';
import Popup      from './popup.js';

export default class MwShareButtonsTwitter extends Button {
  constructor(button, params) {
    super(button, params);
  }

  count() {
    const api = 'https://opensharecount.com/count.json?url=' + this.params.url;
    new ShareCount(api).request().done((json) => {
      let count = 0;
      if ('count' in json) {
        count = json.count;
      }
      this.button.find('.mw-share-button__count').text(count);
    });
  }

  popup() {
    new Popup(
      this.button.find('.mw-share-button__button'),
      'Share on Twitter',
      550,
      400
    );
  }
}
