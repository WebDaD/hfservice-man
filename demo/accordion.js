var acc = document.getElementsByClassName('accordion')
var hash = window.location.hash
var i

for (i = 0; i < acc.length; i++) {
  if (hash.startsWith('#' + acc[i].id)) {
    acc[i].classList.toggle('active')
    var panel = acc[i].nextElementSibling
    panel.style.maxHeight = panel.scrollHeight + 'px'
  }
  acc[i].addEventListener('click', function () {
    this.classList.toggle('active')
    var panel = this.nextElementSibling
    if (panel.style.maxHeight) {
      panel.style.maxHeight = null
    } else {
      panel.style.maxHeight = panel.scrollHeight + 'px'
    }
  })
}
