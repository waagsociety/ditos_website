!function(){
  var logo = document.querySelector('#navigation #svg-logo');
  var classNames = Array.prototype.slice.call(logo.querySelectorAll('[id]'))
    .map(function(letter) {
      return letter.id
    }).filter(function(name) {
      return /\-letter$/.test(name) 
    })
    .reverse()
    .map(function(name){
      return 'active-' + name[0]
    })

  var index = 0
  var className = ''
  var classNamesLength = classNames.length
  
  setInterval(function(){
    if (index >= classNamesLength) index = 0

    // console.log(classNames[index]);
    logo.setAttribute('class', classNames[index])
    index += 1
  }, 500)
}()
