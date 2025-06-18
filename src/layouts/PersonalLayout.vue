<!-- src/layouts/MainLayout.vue -->
<template>
  <div>
    <!-- Navbar -->
    <Navbar />

    <!-- Banner -->
    <div class="banner text-center p-2">
      🎉 V-TEC May Fest đã khép lại. Cảm ơn các bạn đã đồng hành cùng chúng tôi trong sứ mệnh lan
      tỏa tri thức Việt!
    </div>

    <!-- Main content + Sidebar -->
    <div class="container mt-4">
      <div class="">
        <!-- Main Content -->
        <div class="col-md-12">
          <router-view />
          <!-- Chỗ các trang con sẽ hiển thị -->
        </div>
        <!-- <div class="col-md-4">
          <Sidebar />
        </div> -->
        <!-- Sidebar -->
        <!-- <Sidebar /> -->
      </div>
    </div>

    <!-- Footer -->
    <Footer />
  </div>
  <Header />
</template>

<script setup>
// Tách các phần navbar, sidebar, footer ra component riêng cho sạch
import Navbar from '../components/Navbar.vue'
import Sidebar from '../components/Sidebar.vue'
import Footer from '../components/Footer.vue'
import Header from '../components/Header.vue'
</script>

<style scoped>
/* Style giữ nguyên hoặc tuỳ chỉnh nhẹ */

.cd__main {
  background: #c42c2c !important;
}

.animated-border-box,
.animated-border-box-glow {
  max-height: 120px;
  max-width: 230px;
  height: 100%;
  width: 100%;
  position: absolute;
  overflow: hidden;
  z-index: 0;
  border-radius: 10px;
}

.animated-border-box-glow {
  overflow: hidden;
  filter: blur(20px); /* 💫 Blur hiệu ứng glow */
}
.video-thumbnail {
  z-index: 1;
  position: relative;
}

.animated-border-box:before,
.animated-border-box-glow:before {
  content: '';
  z-index: -2;
  text-align: center;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%) rotate(0deg);
  position: absolute;
  width: 99999px;
  height: 99999px;
  background-repeat: no-repeat;
  background-position: 0 0;

  /* 🌈 Rainbow conic gradient border */
  background-image: conic-gradient(red, orange, yellow, lime, cyan, blue, violet, red);

  animation: rotate 4s linear infinite;
}

.animated-border-box:after {
  content: '';
  position: absolute;
  z-index: -1;
  left: 5px;
  top: 5px;
  width: calc(100% - 10px);
  height: calc(100% - 10px);
  background: rgb(24, 24, 24); /* Nền bên trong */
  border-radius: 7px;
}

@keyframes rotate {
  100% {
    transform: translate(-50%, -50%) rotate(1turn);
  }
}

/* Layout helper styles */
body {
  margin: 0px;
}

.center-box {
  height: 70vh;
  display: flex;
  justify-content: center;
  align-items: center;
  background: black;
}

.video-thumbnail img {
  width: 100%;
  height: 100%;
  object-fit: cover;
}
</style>
