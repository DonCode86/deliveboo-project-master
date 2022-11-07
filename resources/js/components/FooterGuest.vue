<template>
  <div class="">
    <section class="top-footer">
      <div class="container">
        <div class="row">
          <div class="col-4 col-left-footer">
            <div class="col-title">
              <h4>
                Rapidità, professionalità,<br />
                qualità, convenienza... <br />
                semplicemente Deliveboo!!!!
              </h4>
            </div>
            <div class="info pt-3">
              <p>
                Via Manzoni, 28 - Roma <br />
                <span>Email:info@deliveboo.com</span><br />
              </p>
            </div>
          </div>
          <div class="col-4 text-center col-footer-img">
            <img
              class="footer-img"
              src="data:image/png;base64,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"
              alt=""
            />
            <img
              class="footer-logo"
              src="images/deliveboo.png"
              alt=""
            />
          </div>
          <div class="col-4 text-end col-right-footer">
            <div class="col-title">
              <h4>Area Riservata</h4>
            </div>
            <div class="links">
              <p class="mb-0">
                <a
                  class="link-dark"
                  href="/login"
                  >Accedi alla tua area riservata</a
                >
              </p>
              <p>
                <a
                  class="link-dark"
                  href="/register"
                  >Non hai ancora un account? Registrati subito!</a
                >
              </p>
            </div>
          </div>
        </div>
      </div>
    </section>
    <div class="copiright text-center py-2">
      Copyright 2022 © Theme Created By <strong> Team3 - Boolean</strong> All
      Rights Reserved
    </div>
  </div>
</template>

<script>
export default {}
</script>

<style lang="scss"></style>
