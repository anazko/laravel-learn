<template>
  <header class="mb-20">
    <div class="header container">
      <ul class="main-menu">
        <li class="">
          <router-link to="/" class="main-menu__link">Главная</router-link>
        </li>
        <li class="">
          <router-link to="/users" class="main-menu__link"
            >Пользователи</router-link
          >
        </li>
        <li class="">
          <router-link to="/posts" class="main-menu__link">Посты</router-link>
        </li>
      </ul>
    </div>
  </header>
</template>

<script>
export default {
  setup() {
    return {};
  }
};
</script>

<style lang="scss" scoped></style>
