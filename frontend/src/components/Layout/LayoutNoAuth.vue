<template>
  <transition name="fade-in-up">
    <div class="login-page">
      <div class="login-box">
        <div class="login-logo">
          <div class="logo">
            <img src="/assets/images/logo.png" class="logo-login" />
          </div>
        </div>
        <router-view></router-view>
      </div>
    </div>
  </transition>
</template>

<script>
export default {
  name: "LayoutNoAuth",
};
</script>

<style lang="scss" scoped>
.logo {
  text-align: center;
}

.logo-login {
  width: 50%;
  margin-bottom: 1rem;
}
</style>
