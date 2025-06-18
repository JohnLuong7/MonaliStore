<!-- <template>
  <nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom shadow-sm">
    <div class="container">
      <router-link class="navbar-brand fs-3 fw-bold text-primary" to="/">V-TEC</router-link>
      <ul class="navbar-nav me-auto ms-3">
        <li class="nav-item"><router-link class="nav-link" to="/blog">Bài Viết</router-link></li>
        <li class="nav-item"><router-link class="nav-link" to="/qna">Câu Hỏi</router-link></li>
        <li class="nav-item">
          <router-link class="nav-link" to="/discussion">Thảo Luận</router-link>
        </li>
        <li class="nav-item">
          <router-link class="nav-link" to="/about">Về Chúng Tôi</router-link>
        </li>
      </ul>

      <form class="d-flex me-3">
        <input class="form-control" type="search" placeholder="Tìm kiếm trên V-TEC" />
      </form>
      <router-link to="/login" class="btn btn1 btn-outline-primary btn-sm">Đăng nhập</router-link>
      <router-link to="/register" class="btn btn-outline-primary btn-sm">Đăng ký</router-link>
    </div>
  </nav>
</template>

<style scoped>
.btn1 {
  margin-right: 10px;
}
</style> -->

<template>
  <nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom shadow-sm">
    <div class="container">
      <router-link class="navbar-brand fs-3 fw-bold text-primary" to="/">V-TEC</router-link>

      <ul class="navbar-nav me-auto ms-3">
        <li class="nav-item"><router-link class="nav-link" to="/blog">Bài Viết</router-link></li>
        <li class="nav-item"><router-link class="nav-link" to="/qna">Câu Hỏi</router-link></li>
        <li class="nav-item">
          <router-link class="nav-link" to="/discussion">Thảo Luận</router-link>
        </li>
        <li class="nav-item">
          <router-link class="nav-link" to="/about">Về Chúng Tôi</router-link>
        </li>
      </ul>

      <form class="d-flex me-3">
        <input class="form-control" type="search" placeholder="Tìm kiếm trên V-TEC" />
      </form>

      <!-- Avatar Dropdown -->
      <div class="dropdown">
        <a
          class="d-flex align-items-center text-decoration-none dropdown-toggle"
          href="#"
          id="dropdownUser"
          data-bs-toggle="dropdown"
          aria-expanded="false"
        >
          <img
            src="https://i.pravatar.cc/40?img=3"
            alt="avatar"
            class="rounded-circle me-2"
            width="40"
            height="40"
          />
          <span class="d-none d-md-inline fw-semibold text-dark">Toàn</span>
        </a>
        <ul class="dropdown-menu dropdown-menu-end" style="overflow: hidden">
          <li><router-link class="dropdown-item" to="/profile">Trang cá nhân</router-link></li>
          <li><router-link class="dropdown-item" to="/my-posts">Bài viết của tôi</router-link></li>
          <li><hr class="dropdown-divider" /></li>
          <li>
            <a class="dropdown-item text-danger" href="#" @click.prevent="logout">Đăng xuất</a>
          </li>
          <li>
            <a class="dropdown-item text-danger" href="#" @click.prevent="logout"
              >Chuyển sang Admin</a
            >
          </li>
        </ul>
      </div>
    </div>
  </nav>
</template>

<script>
export default {
  methods: {
    logout() {
      // TODO: Xoá token / thông tin đăng nhập khỏi localStorage
      // Chuyển hướng về trang login hoặc home
      localStorage.removeItem('userToken')
      this.$router.push('/login')
    },
  },
}
</script>

<style scoped>
* {
  z-index: 9999 !important;
}
.dropdown-menu {
  position: absolute !important;
  z-index: 9999 !important;
  overflow: hidden !important;
}

img.rounded-circle {
  object-fit: cover;
}
</style>
