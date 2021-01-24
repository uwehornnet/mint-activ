import Swiper from 'swiper'
import flatpickr from 'flatpickr'
import { German } from 'flatpickr/dist/l10n/de.js'

const swiper = new Swiper('.swiper-container', {
    cssMode: true,
    slidesPerView: 1,
    spaceBetween: 0,
    loop: false,
    autoplay: {
        delay: 5000,
        disableOnInteraction: true,
    },
    speed: 400,
    init: true,
})

if (document.querySelector('.datepicker')) {
    flatpickr(document.querySelector('.datepicker'), {
        minDate: new Date(),
        dateFormat: 'd.m.Y',
        locale: German,
        disableMobile: true,
        inline: true,
        enableTime: true,
        onChange: (date) => {
            console.log(date)
            document.getElementById('appointment').value = date[0]
        },
    })
}

document.querySelector('.header__navigation--trigger').addEventListener('click', () => {
    const navigation = document.querySelector('.header__navigation')

    if (navigation.classList.contains('open')) {
        navigation.classList.remove('open')
        document.querySelector('body').style.overflow = 'auto'
    } else {
        navigation.classList.add('open')
        document.querySelector('body').style.overflow = 'hidden'
    }
})
