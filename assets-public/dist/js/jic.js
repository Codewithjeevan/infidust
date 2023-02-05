// Interpolate JS from inside <style> and <link> tags with ${}
var jic = {}

jic.load = function() {

  var style = document.getElementsByTagName('style')

  for (i = 0; i < style.length; i++) {

    jic.process(style[i], style[i].innerHTML)

  }

  var link = document.getElementsByTagName('link')

  for (i = 0; i < link.length; i++) {

    var currentLink = link[i]

    if (currentLink.href && currentLink.rel == 'stylesheet') {

      (function() {

        var xhr = new XMLHttpRequest

        xhr.open('GET', currentLink.href, true)
        xhr.send(null)
        xhr.onreadystatechange = function() {

          jic.process(currentLink, xhr.responseText)

        }

      })()

    }

  }

}

jic.process = function(tag, stylesheet) {

  if (stylesheet) {

    var event = ['load', 'resize', 'input', 'click']
    var css = new Function('return `' + stylesheet + '`')

    for (var j=0; j<event.length; j++) {

      if (!tag.getAttribute('data-populated')) {

        var style = document.createElement('style')

        style.innerHTML = css()
        tag.setAttribute('data-populated', true)
        style.setAttribute('data-populated', true)
        document.head.appendChild(style)

      }

      window.addEventListener(event[j], function(e) {

        if (style) {

          style.innerHTML = css()

        }

      })

    }

  }

}

window.addEventListener('load', jic.load)