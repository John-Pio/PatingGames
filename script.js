const body = document.body
const toggle = document.getElementById('toggle')
const isDark = document.cookie.includes('dark=true')

if (isDark) {
  body.classList.add('dark')
  toggle.src = './assets/img/light-mode.svg'
}

toggle.addEventListener('click', () => {
  body.classList.toggle('dark')
  if (body.classList.contains('dark'))
    toggle.src = './assets/img/light-mode.svg'
  else toggle.src = './assets/img/dark-mode.svg'
  const isDark = body.classList.contains('dark')
  document.cookie = `dark=${isDark}; expires=Thu, 18 Dec 2030 12:00:00`
})

const menu = document.getElementById('menubr')
const links = document.getElementById('navlnk')

menu.addEventListener('click', () => links.classList.toggle('active'))