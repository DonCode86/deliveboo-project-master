const email = document.getElementById('email')
const emailPattern = new RegExp('^[\\w-\\.]+@([\\w-]+\\.)+[\\w-]{2,4}$')

const psw = document.getElementById('password')
const pswConfirm = document.getElementById('password_confirmation')

const phone = document.getElementById('phone')
const phonePattern = new RegExp('^\\+(?:[0-9] ?){6,14}[0-9]$')

const vat = document.getElementById('vat')
const vatPattern = new RegExp(
  '(?:(AT)\\s*(U\\d{8}))|(?:(BE)\\s*(0?\\d{*}))|(?:(CZ)\\s*(\\d{8,10}))|(?:(DE)\\s*(\\d{9}))|(?:(CY)\\s*(\\d{8}[A-Z]))|(?:(DK)\\s*(\\d{8}))|(?:(EE)\\s*(\\d{9}))|(?:(GR)\\s*(\\d{9}))|(?:(ES|NIF:?)\\s*([0-9A-Z]\\d{7}[0-9A-Z]))|(?:(FI)\\s*(\\d{8}))|(?:(FR)\\s*([0-9A-Z]{2}\\d{9}))|(?:(GB)\\s*((\\d{9}|\\d{12})~(GD|HA)\\d{3}))|(?:(HU)\\s*(\\d{8}))|(?:(IE)\\s*(\\d[A-Z0-9\\\\+\\\\*]\\d{5}[A-Z]))|(?:(IT)\\s*(\\d{11}))|(?:(LT)\\s*((\\d{9}|\\d{12})))|(?:(LU)\\s*(\\d{8}))|(?:(LV)\\s*(\\d{11}))|(?:(MT)\\s*(\\d{8}))|(?:(NL)\\s*(\\d{9}B\\d{2}))|(?:(PL)\\s*(\\d{10}))|(?:(PT)\\s*(\\d{9}))|(?:(SE)\\s*(\\d{12}))|(?:(SI)\\s*(\\d{8}))|(?:(SK)\\s*(\\d{10}))|(?:\\D|^)(\\d{11})(?:\\D|$)|(?:(CHE)(-|\\s*)(\\d{3}\\.\\d{3}\\.\\d{3}))|(?:(SM)\\s*(\\d{5}))/i'
)

const price = document.getElementById('price')
const pricePattern = new RegExp('^\\d{1,3}([,.]\\d{0,2})?$')

email?.addEventListener('input', event => {
  let val = event.target.value

  if (emailPattern.test(val)) {
    email.classList.remove('is-invalid')
    email.classList.add('is-valid')
  } else {
    email.classList.remove('is-valid')
    email.classList.add('is-invalid')
  }
})

pswConfirm?.addEventListener('input', event => {
  let val = event.target.value

  if (val === psw.value) {
    psw.classList.remove('is-invalid')
    pswConfirm.classList.remove('is-invalid')

    psw.classList.add('is-valid')
    pswConfirm.classList.add('is-valid')
  } else {
    psw.classList.remove('is-valid')
    pswConfirm.classList.remove('is-valid')

    psw.classList.add('is-invalid')
    pswConfirm.classList.add('is-invalid')
  }
})

phone?.addEventListener('input', event => {
  let val = event.target.value

  if (phonePattern.test(val)) {
    phone.classList.remove('is-invalid')
    phone.classList.add('is-valid')
  } else {
    phone.classList.remove('is-valid')
    phone.classList.add('is-invalid')
  }
})

vat?.addEventListener('input', event => {
  let val = event.target.value

  if (vatPattern.test(val)) {
    vat.classList.remove('is-invalid')
    vat.classList.add('is-valid')
  } else {
    vat.classList.remove('is-valid')
    vat.classList.add('is-invalid')
  }
})

price?.addEventListener('input', event => {
  let val = event.target.value

  if (pricePattern.test(val)) {
    price.classList.remove('is-invalid')
    price.classList.add('is-valid')
  } else {
    price.classList.remove('is-valid')
    price.classList.add('is-invalid')
  }
})
