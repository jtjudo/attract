const myths = document.querySelectorAll('.myths__myth')
if (myths) {
    myths.forEach((myth) => {
        myth.addEventListener('click', () => {
            if (myth.classList.contains('open-js')) {
                myth.classList.remove('open-js')
            } else {
                myth.classList.add('open-js')
            }
        })
    })
}