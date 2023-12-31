const body = document.body
const menu = document.getElementById('menubr')
const links = document.getElementById('navlnk')
const toggle = document.getElementById('toggle')
const addDialog = document.getElementById('add-dialog')
const addButton = document.getElementById('add-button')
const closeAddDialog = document.getElementById('close-add-dialog')
const isDark = document.cookie.includes('dark=true')

if (isDark) {
  body.classList.add('dark')
  toggle.src = './assets/img/icons/light.svg'
}

menu.addEventListener('click', () => links.classList.toggle('active'))

toggle.addEventListener('click', () => {
  body.classList.toggle('dark')
  if (body.classList.contains('dark'))
    toggle.src = './assets/img/icons/light.svg'
  else toggle.src = './assets/img/icons/dark.svg'
  const isDark = body.classList.contains('dark')
  document.cookie = `dark=${isDark}; expires=Thu, 18 Dec 2030 12:00:00`
})

addButton.addEventListener('click', () => {
  addDialog.showModal()
})

closeAddDialog.addEventListener('click', () => {
  addDialog.close()
})
