// api.js
import axios from 'axios'

const BASE_URL = 'http://localhost:3000'
const User_URL = `${BASE_URL}/User`
const Blog_URL = `${BASE_URL}/blogs`
const Comment_URL = `${BASE_URL}/comment`

// ---------- 🔐 USER / LOGIN ----------
export async function Login(username, password) {
  // Sử dụng query params để tìm user
  const res = await axios.get(User_URL, {
    params: { username, password },
  })
  // Nếu có user khớp, trả về true (logged in)
  return res.data.length > 0 ? res.data[0] : null
}

export function getAllUsers() {
  return axios.get(User_URL)
}

export function getUserByUsername(username) {
  return axios.get(User_URL, {
    params: { username },
  })
}

export function createUser(data) {
  return axios.post(User_URL, data)
}

export function updateUser(id, data) {
  return axios.put(`${User_URL}/${id}`, data)
}

export function deleteUser(id) {
  return axios.delete(`${User_URL}/${id}`)
}

// ---------- 📝 BLOGS ----------
export function getAllBlogs() {
  return axios.get(Blog_URL)
}

export function getBlogById(id) {
  return axios.get(`${Blog_URL}/${id}`)
}

export function createBlog(data) {
  return axios.post(Blog_URL, data)
}

export function updateBlog(id, data) {
  return axios.put(`${Blog_URL}/${id}`, data)
}

export function deleteBlog(id) {
  return axios.delete(`${Blog_URL}/${id}`)
}

// ---------- 💬 COMMENTS ----------
export function getAllComments() {
  return axios.get(Comment_URL)
}

export function getCommentById(id) {
  return axios.get(`${Comment_URL}/${id}`)
}

export function getCommentsByBlogId(blogId) {
  return axios.get(Comment_URL, {
    params: { blogId },
  })
}

export function createComment(data) {
  return axios.post(Comment_URL, data)
}

export function updateComment(id, data) {
  return axios.put(`${Comment_URL}/${id}`, data)
}

export function deleteComment(id) {
  return axios.delete(`${Comment_URL}/${id}`)
}
