'use strict';

import $ from 'jquery';

export default class MwShareButtonsPopup {
  constructor(target, title, width, height) {
    this.target = target;
    this.title  = title;
    this.width  = parseInt(width);
    this.height = parseInt(height);
    this.setListener();
  }

  setListener() {
    this.target.on('click', (event) => {
      event.preventDefault();
      window.open(
        this.target.attr('href'),
        this.title,
        `width=${this.width}, height=${this.height}, menubar=no, toolbar=no, scrollbars=yes`
      );
    });
  }
}
