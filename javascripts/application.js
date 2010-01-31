function loadAdditionalContent(content) {
  $('#additional_content').load("/additional_content", {'item': content});
}
