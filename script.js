const body = document.body
const menu = document.getElementById('menubr')
const links = document.getElementById('navlnk')
const toggle = document.getElementById('toggle')
const addDialog = document.getElementById('add-dialog')
const editDialog = document.getElementById('edit-dialog')
const addButton = document.getElementById('add-button')
const closeAddDialog = document.getElementById('close-add-dialog')
// const editButton = document.getElementById('edit-button')
// const deleteButton = document.getElementById('delete-button')
const isDark = document.cookie.includes('dark=true')

if (isDark) {
  body.classList.add('dark')
  toggle.src = './assets/img/icons/light.svg'
}

// document.addEventListener('DOMContentLoaded', function () {
//   document.body.addEventListener('click', function (event) {
//     const target = event.target
//     console.log('Clicked', event.target)

//     if (target.classList.contains('edit-button')) {
//       console.log('edit')
//       const gameId = target.closest('.card').dataset.gameId
//       console.log('Clicked on edit button for game ID: ' + gameId)
//       // Implement your edit logic here
//     } else if (target.classList.contains('delete-button')) {
//       console.log('delete')
//       const gameId = target.closest('.card').dataset.gameId
//       console.log('Clicked on delete button for game ID: ' + gameId)
//       // Implement your delete logic here
//     }
//   })
// })

const closeEditDialog = document.getElementById('close-edit-dialog')

closeEditDialog.addEventListener('click', () => editDialog.close())

document.addEventListener('DOMContentLoaded', () => {
  const editButtons = document.querySelectorAll('.edit-button')

  editButtons.forEach(button => {
    const gameId = button.dataset.gameId

    button.addEventListener('click', () => {
      openEditDialog(gameId)
      console.log('Clicked on game with ID: ' + gameId)
    })
  })

  const deleteButtons = document.querySelectorAll('.delete-button')

  deleteButtons.forEach(button => {
    const gameId = button.dataset.gameId

    button.addEventListener('click', () => {
      console.log('Delete: ' + gameId)
    })
  })
})

function openEditDialog(gameId) {
  fetch(`update.php?gameId=${gameId}`)
    .then(response => response.json())
    .then(data => {
      // Populate the form inputs with the retrieved data
      document.getElementById('editTitle').value = data.title
      document.getElementById('editDescp').value = data.descp
      document.getElementById('editTags').value = data.tags

      // Open the edit dialog
      editDialog.showModal()
    })
    .catch(error => console.error('Error fetching game data:', error))
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
