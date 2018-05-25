/* global $, dataLayer */
$(document).ready(function () {
  var hash = window.location.hash
  $('.accordion').each(function (index) {
    if (hash.startsWith('#' + $(this).attr('id'))) {
      $(this).toggleClass('active')
      $(this).siblings('accordion-content').show()
    }
  })
})
