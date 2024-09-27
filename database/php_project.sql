-- Bảng category
CREATE TABLE IF NOT EXISTS `category`(
  `category_id` int(11) NOT NULL AUTO_INCREMENT, -- ID của danh mục
  `category_name` varchar(255) NOT NULL,         -- Tên danh mục
  PRIMARY KEY (`category_id`)                    -- Khóa chính là ID của danh mục
);

-- Bảng products
CREATE TABLE IF NOT EXISTS `products` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT, -- ID của sản phẩm
  `product_name` varchar(100) NOT NULL,         -- Tên sản phẩm
  `category_id` int(11) NOT NULL,               -- ID của danh mục (khóa ngoại)
  `product_description` varchar(255) NOT NULL,  -- Mô tả sản phẩm
  `product_image` varchar(255) NOT NULL,        -- Hình ảnh sản phẩm
  `product_image2` varchar(255),                -- Hình ảnh sản phẩm (tuỳ chọn)
  `product_image3` varchar(255),                -- Hình ảnh sản phẩm (tuỳ chọn)
  `product_image4` varchar(255),                -- Hình ảnh sản phẩm (tuỳ chọn)
  `product_price` decimal(10,2) NOT NULL,       -- Giá sản phẩm
  `product_color` varchar(108),                 -- Màu sắc sản phẩm
  PRIMARY KEY (`product_id`),                   -- Khóa chính là ID của sản phẩm
  FOREIGN KEY (`category_id`) REFERENCES `category`(`category_id`) ON DELETE CASCADE -- Liên kết với bảng category
);

-- Bảng users
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT, -- ID của người dùng
  `user_name` varchar(108) NOT NULL,         -- Tên người dùng
  `user_email` varchar(100) NOT NULL,        -- Email của người dùng
  `user_password` varchar(100) NOT NULL,     -- Mật khẩu của người dùng
  PRIMARY KEY (`user_id`),                   -- Khóa chính là ID của người dùng
  UNIQUE KEY `UX_Constraint` (`user_email`)  -- Email phải là duy nhất
);

-- Bảng admins
CREATE TABLE IF NOT EXISTS `admins` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT, -- ID của admin
  `admin_name` varchar(108) NOT NULL,         -- Tên admin
  `admin_email` varchar(100) NOT NULL,        -- Email của admin
  `admin_password` varchar(100) NOT NULL,     -- Mật khẩu của admin
  PRIMARY KEY (`admin_id`),                   -- Khóa chính là ID của admin
  UNIQUE KEY `UX_Constraint` (`admin_email`)  -- Email phải là duy nhất
);

-- Bảng orders
CREATE TABLE IF NOT EXISTS `orders` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,             -- ID của đơn hàng
  `order_cost` decimal(10,2) NOT NULL,                    -- Chi phí đơn hàng
  `order_status` ENUM('pending', 'shipped', 'delivered')  -- Trạng thái đơn hàng với 3 giá trị
                NOT NULL DEFAULT 'delivered',  
  `user_id` int(11) NOT NULL,                             -- ID của người dùng (khóa ngoại)
  `user_phone` varchar(20) NOT NULL,                      -- Số điện thoại của người dùng
  `user_city` varchar(255) NOT NULL,                      -- Thành phố của người dùng
  `user_address` varchar(255) NOT NULL,                   -- Địa chỉ của người dùng
  `order_date` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP, -- Ngày đặt hàng
  PRIMARY KEY (`order_id`),                               -- Khóa chính là ID của đơn hàng
  FOREIGN KEY (`user_id`) REFERENCES `users`(`user_id`) ON DELETE CASCADE -- Liên kết với bảng users
);


-- Bảng order_items
CREATE TABLE IF NOT EXISTS `order_items` (
  `item_id` int(11) NOT NULL AUTO_INCREMENT,  -- ID của mục đơn hàng
  `order_id` int(11) NOT NULL,                -- ID của đơn hàng (khóa ngoại)
  `product_id` int(11) NOT NULL,              -- ID của sản phẩm (khóa ngoại)
  `product_name` varchar(255) NOT NULL,       -- Tên sản phẩm
  `product_price` decimal(10,2) NOT NULL,     -- Giá sản phẩm
  `product_image` varchar(255) NOT NULL,      -- Hình ảnh sản phẩm
  `user_id` int(11) NOT NULL,                 -- ID của người dùng (khóa ngoại)
  `order_date` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP, -- Ngày đặt hàng
  PRIMARY KEY (`item_id`),                    -- Khóa chính là ID của mục đơn hàng
  FOREIGN KEY (`order_id`) REFERENCES `orders`(`order_id`) ON DELETE CASCADE, -- Liên kết với bảng orders
  FOREIGN KEY (`product_id`) REFERENCES `products`(`product_id`) ON DELETE CASCADE, -- Liên kết với bảng products
  FOREIGN KEY (`user_id`) REFERENCES `users`(`user_id`) ON DELETE CASCADE -- Liên kết với bảng users
);

-- Cần xác định ID của các danh mục trước khi thêm sản phẩm
INSERT INTO `category`(`category_name`) VALUES ('Shirt');
INSERT INTO `category`(`category_name`) VALUES ('Shoes');
INSERT INTO `category`(`category_name`) VALUES ('Jeans');
INSERT INTO `category`(`category_name`) VALUES ('Jacket');

-- Thêm sản phẩm, sử dụng `category_id` từ bảng `category`
INSERT INTO `products`(`product_name`, `category_id`, `product_description`, `product_image`, `product_image2`, `product_image3`, `product_image4`, `product_price`, `product_color`)
VALUES ('T_shirt', 1, 'awesome T-Shirt', 'product10.jpg', 'product10.jpg', 'product10.jpg', 'product10.jpg', 155, 'white');

INSERT INTO `products`(`product_name`, `category_id`, `product_description`, `product_image`, `product_image2`, `product_image3`, `product_image4`, `product_price`, `product_color`)
VALUES ('T_shirt', 1, 'awesome T-Shirt', 'product11.jpg', 'product11.jpg', 'product11.jpg', 'product11.jpg', 225, 'white');

INSERT INTO `products`(`product_name`, `category_id`, `product_description`, `product_image`, `product_image2`, `product_image3`, `product_image4`, `product_price`, `product_color`)
VALUES ('T_shirt', 1, 'awesome T-Shirt', 'product1.jpg', 'product1.jpg', 'product1.jpg', 'product1.jpg', 355, 'white');

INSERT INTO `products`(`product_name`, `category_id`, `product_description`, `product_image`, `product_image2`, `product_image3`, `product_image4`, `product_price`, `product_color`)
VALUES ('T_shirt', 1, 'awesome T-Shirt', 'product.png', 'product.png', 'product.png', 'product.png', 125, 'white');

INSERT INTO `products`(`product_name`, `category_id`, `product_description`, `product_image`, `product_image2`, `product_image3`, `product_image4`, `product_price`, `product_color`)
VALUES ('T_shirt', 1, 'awesome T-Shirt', 'product2.jpg', 'product2.jpg', 'product2.jpg', 'product2.jpg', 299, 'black');

INSERT INTO `products`(`product_name`, `category_id`, `product_description`, `product_image`, `product_image2`, `product_image3`, `product_image4`, `product_price`, `product_color`)
VALUES ('Jordan', 2, 'awesome shoes', 'product5.jpg', 'product5.jpg', 'product5.jpg', 'product5.jpg', 125, 'red');

INSERT INTO `products`(`product_name`, `category_id`, `product_description`, `product_image`, `product_image2`, `product_image3`, `product_image4`, `product_price`, `product_color`)
VALUES ('Jogger', 3, 'awesome trousers', 'product7.jpg', 'product7.jpg', 'product7.jpg', 'product7.jpg', 225, 'black');

INSERT INTO `products`(`product_name`, `category_id`, `product_description`, `product_image`, `product_image2`, `product_image3`, `product_image4`, `product_price`, `product_color`)
VALUES ('Jacket', 4, 'awesome Jacket', 'product8.jpg', 'product8.jpg', 'product8.jpg', 'product8.jpg', 255, 'red');

INSERT INTO `products`(`product_name`, `category_id`, `product_description`, `product_image`, `product_image2`, `product_image3`, `product_image4`, `product_price`, `product_color`)
VALUES ('Shoes Girl', 2, 'awesome Shoes ', 'product12.jpg', 'product12.jpg', 'product12.jpg', 'product12.jpg', 265, 'white');
INSERT INTO `products`(`product_name`, `category_id`, `product_description`, `product_image`, `product_image2`, `product_image3`, `product_image4`, `product_price`, `product_color`)
VALUES ('T-shirt', 1, 'awesome T-shirt', 'product13.jpg', 'product13.jpg', 'product13.jpg', 'product13.jpg', 155, 'red');
INSERT INTO `products`(`product_name`, `category_id`, `product_description`, `product_image`, `product_image2`, `product_image3`, `product_image4`, `product_price`, `product_color`)
VALUES ('Jeans', 4, 'awesome Jeans', 'product14.jpg', 'product14.jpg', 'product14.jpg', 'product14.jpg', 215, 'blue');
INSERT INTO `products`(`product_name`, `category_id`, `product_description`, `product_image`, `product_image2`, `product_image3`, `product_image4`, `product_price`, `product_color`)
VALUES ('T-shirt black', 1, 'awesome T-shirt', 'product15.jpg', 'product15.jpg', 'product15.jpg', 'product15.jpg', 105, 'black');

INSERT INTO `admins` (`admin_name`, `admin_email`, `admin_password`) 
VALUES ('Admin', 'admin@gmail.com', 'admin');
