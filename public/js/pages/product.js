$('.toggle').click(function(e){
    e.preventDefault()
    let ancla = e.currentTarget
    if(ancla.classList.contains('category'))
    {
        let icono = ancla.querySelector('i')
        if (icono.classList.contains('fa-chevron-right')) {
            icono.classList.remove('fa-chevron-right')
            icono.classList.add('fa-chevron-down')
        }else{
            icono.classList.remove('fa-chevron-down')
            icono.classList.add('fa-chevron-right')
        }
    }
    $(this).siblings('ul').toggle();
})