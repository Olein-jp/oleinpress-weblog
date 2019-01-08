'use strict';

import $ from 'jquery';

export default class MwShareButtonsButton {
  constructor(button, params) {
    $(() => {
      this.button = button;
      this.params = params;

      this.count();
      this.popup();
    });
  }

  count() {}

  popup() {}
}
