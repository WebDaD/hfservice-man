/* global dataLayer */
var audios = document.getElementsByClassName('accordion')

for (var i = 0; i < audios.length; i++) {
  audios[i].addEventListener('play', function () {
    dataLayer.push({
      event: 'audio',
      eventCategory: 'radio',
      eventAction: 'play',
      eventLabel: this.dataset.title
    })
  })
  audios[i].addEventListener('pause', function () {
    dataLayer.push({
      event: 'audio',
      eventCategory: 'radio',
      eventAction: 'pause',
      eventLabel: this.dataset.title
    })
  })
  audios[i].addEventListener('stalled', function () {
    dataLayer.push({
      event: 'audio',
      eventCategory: 'radio',
      eventAction: 'download',
      eventLabel: this.dataset.title
    })
  })
}
