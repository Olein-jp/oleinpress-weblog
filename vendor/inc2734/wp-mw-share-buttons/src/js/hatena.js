'use strict';

import $          from 'jquery';
import Button     from './button.js';
import ShareCount from './share-count.js';
import Popup      from './popup.js';

export default class MwShareButtonsHatena extends Button {
  constructor(button, params) {
    super(button, params);
  }

  count() {
    const api = (location.protocol === 'https:' ? 'https://b.hatena.ne.jp' : 'http://api.b.st-hatena.com') + '/entry.count?url=' + this.params.url;
    new ShareCount(api).request().done((json) => {
      let count = json ? json : 0;
      this.button.find('.mw-share-button__count').text(count);
    });
  }

  popup() {
    new Popup(
      this.button.find('.mw-share-button__button'),
      'Hatena Bookmark',
      510,
      420
    );
  }
}
