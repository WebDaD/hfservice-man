/* global $, dataLayer */
$(document).ready(function () {
  $('audio').each(function (index) {
    $(this).on('play', function () {
      dataLayer.push({
        event: 'audio',
        eventCategory: 'radio',
        eventAction: 'play',
        eventLabel: $(this).data('title')
      })
    })
    $(this).on('pause', function () {
      dataLayer.push({
        event: 'audio',
        eventCategory: 'radio',
        eventAction: 'pause',
        eventLabel: $(this).data('title')
      })
    })
    $(this).on('stalled', function () {
      dataLayer.push({
        event: 'audio',
        eventCategory: 'radio',
        eventAction: 'stalled',
        eventLabel: $(this).data('title')
      })
    })
  })
})
