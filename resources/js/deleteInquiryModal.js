const deleteInquiry = document.getElementById('delete-inquiry')
const deleteInquiryModal = document.querySelector('.delete-inquiry-modal')
const closeModal = document.querySelector('.close-modal')


deleteInquiry.addEventListener('click', () => {
  deleteInquiryModal.classList.remove('hideModal')
})
closeModal.addEventListener('click', (e) => {
  if(e.target.matches('.close-modal')) {
    deleteInquiryModal.classList.add('hideModal')
  }
})