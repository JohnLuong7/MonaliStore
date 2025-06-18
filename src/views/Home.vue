<template>
  <div>
    <!-- Navbar -->

    <!-- Content -->
    <div class="container mt-4">
      <div class="row">
        <!-- Left Column -->
        <div class="container">
          <div class="post-card">
            <div class="post-title">🚀 V-TEC Mayfest 2025 | Công bố kết quả CHÍNH THỨC</div>
            <div class="post-meta">
              V-TEC Team · 2 giờ trước · <span class="badge bg-primary">Announcement</span>
            </div>
            <br />
            <a href="/post" class="btn btn-primary">Xem thêm</a>
          </div>

          <div class="post-card">
            <div class="post-title">📚 Học viên Pro nhận offer ANZ sau chuỗi bài tập!</div>
            <div class="post-meta">
              EngineerPro · 5 giờ trước · <span class="badge bg-secondary">Tag1</span>
              <span class="badge bg-secondary">Career</span>
            </div>
            <br />
            <a href="#" class="btn btn-primary">Xem thêm</a>
          </div>

          <div class="post-card">
            <div class="post-title">🔐 Keycloak API Document</div>
            <div class="post-meta">
              Minh Phạm · 7 giờ trước · <span class="badge bg-secondary">OAuth</span>
            </div>
            <br />
            <a href="#" class="btn btn-primary">Xem thêm</a>
          </div>

          <!-- Phân trang -->
          <nav aria-label="Page navigation">
            <ul class="pagination justify-content-center">
              <li class="page-item">
                <router-link class="page-link" to="/pagi">1</router-link>
              </li>
              <li class="page-item"><a class="page-link" href="#">2</a></li>
              <li class="page-item"><a class="page-link" href="#">3</a></li>
              <li class="page-item"><a class="page-link" href="#">...</a></li>
              <li class="page-item"><a class="page-link" href="#">2074</a></li>
            </ul>
          </nav>
        </div>

        <!-- Right Column -->
      </div>
    </div>

    <!-- Footer -->
  </div>
</template>

<script setup>
// Tạm thời chưa cần xử lý logic, sẽ thêm sau
</script>

<style>
body {
  background: #f7f9fc;
  font-family: 'Segoe UI', sans-serif;
  min-height: 100vh;
}

.navbar {
  backdrop-filter: blur(6px);
  border-radius: 0 0 10px 10px;
}

.banner {
  background: linear-gradient(90deg, #5a00e0, #7f3dff);
  color: white;
  padding: 12px;
  text-align: center;
  font-weight: 600;
  border-radius: 0 0 12px 12px;
  box-shadow: 0 4px 12px rgba(0, 0, 0, 0.12);
  font-size: 0.95rem;
}

.post-card,
.sidebar-box {
  background: rgba(255, 255, 255, 0.85);
  border: 1px solid #e3e7ed;
  border-radius: 16px;
  padding: 20px;
  margin-bottom: 24px;
  box-shadow: 0 6px 20px rgba(0, 0, 0, 0.05);
}

.post-title {
  font-size: 1.15rem;
  font-weight: 600;
  color: #333;
  margin-bottom: 6px;
}

.post-meta {
  font-size: 0.85rem;
  color: #666;
}

.footer {
  background: #0b1c3a;
  color: #eee;
  padding: 40px 0;
  font-size: 0.9rem;
}

.footer a {
  color: #ccc;
  text-decoration: none;
  display: block;
  margin-bottom: 6px;
}

.footer a:hover {
  color: #fff;
}

.footer .title {
  font-weight: bold;
  margin-bottom: 10px;
  color: white;
}

.author-img {
  width: 36px;
  height: 36px;
  border-radius: 50%;
  object-fit: cover;
  border: 2px solid #fff;
}

.pagination .page-link {
  background: white;
  border: 1px solid #ddd;
  margin: 0 4px;
  color: #333;
  transition: all 0.2s ease;
}

.pagination .page-link:hover {
  background: #eef1f7;
}

input.form-control {
  background: rgba(255, 255, 255, 0.95);
  border: 1px solid #ccc;
  color: #333;
  padding: 6px 10px;
  font-size: 0.9rem;
  border-radius: 6px;
  box-shadow: none;
  transition: border 0.2s;
}

input.form-control:focus {
  border-color: #0d6efd;
  outline: none;
  box-shadow: 0 0 0 0.1rem rgba(13, 110, 253, 0.25);
}
</style>
