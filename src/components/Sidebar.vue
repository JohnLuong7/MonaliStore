<template>
  <div class="sidebar-box">
    <h6 class="fw-bold mb-3">📌 Câu hỏi mới nhất</h6>
    <p class="mb-1">Cách sử dụng ransackable_scopes trong ROR?</p>
    <small class="text-muted">7 giờ trước · 10 lượt xem</small>
    <hr />
    <p class="mb-1">Chạy docker với nextjs app bị lỗi</p>
    <small class="text-muted">3 giờ trước · 90 lượt xem</small>

    <h6 class="fw-bold mt-4 mb-3">🏆 Các tác giả hàng đầu</h6>
    <div class="d-flex align-items-center mb-2">
      <img src="https://i.pravatar.cc/36?img=1" class="author-img me-2" />
      <div>
        <div class="fw-bold">Minh Monem</div>
        <small>4.6K 🌟 · 351.7K 👁️</small>
      </div>
    </div>
    <div class="d-flex align-items-center mb-2">
      <img src="https://i.pravatar.cc/36?img=2" class="author-img me-2" />
      <div>
        <div class="fw-bold">Viblo Algorithm</div>
        <small>11.4K 🌟 · 1.8M 👁️</small>
      </div>
    </div>
    <div class="d-flex align-items-center">
      <img src="https://i.pravatar.cc/36?img=3" class="author-img me-2" />
      <div>
        <div class="fw-bold">Quang Binh Trương</div>
        <small>136 🌟 · 1.0K 👁️</small>
      </div>
    </div>
  </div>
</template>

<script setup>
// Chưa cần logic JS
</script>

<style scoped>
.sidebar-box {
  background: rgba(255, 255, 255, 0.85);
  border: 1px solid #e3e7ed;
  border-radius: 16px;
  padding: 20px;
  margin-bottom: 24px;
  box-shadow: 0 6px 20px rgba(0, 0, 0, 0.05);
}
.author-img {
  width: 36px;
  height: 36px;
  border-radius: 50%;
  object-fit: cover;
  border: 2px solid #fff;
}
</style>
