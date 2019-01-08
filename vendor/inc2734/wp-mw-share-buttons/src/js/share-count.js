'use strict';

import $ from 'jquery';

export default class MwShareButtonsShareCount {
  constructor(target, type = 'jsonp', data = {}) {
    this.target = target;
    this.type   = type;
    this.data   = data;
  }

  request() {
    return $.ajax({
      url     : this.target,
      dataType: this.type,
      data    : this.data
    });
  }
}
