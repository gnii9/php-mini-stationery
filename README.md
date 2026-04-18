# Mini Library App

## Các bước tiến hành

Bài Lab này có các bước tiến hành sau:

### Cài môi trường
- Cài đặt PHP (phiên bản 7.4 trở lên)
- Cài đặt web server (Apache hoặc Nginx) hoặc sử dụng built-in server của PHP
- Đảm bảo có Composer để quản lý dependencies (nếu cần)

### Dựng cấu trúc dự án
- Tạo thư mục gốc của dự án
- Tạo thư mục `public/` cho các file công khai
- Tạo thư mục `src/` cho source code, chia thành `Data/` và `Helpers/`
- Tạo thư mục `views/` cho các template (nếu cần)

### Code ứng dụng
- Viết các file PHP cho logic ứng dụng
- Tạo giao diện HTML đơn giản
- Implement các chức năng CRUD cơ bản (tạo, đọc, cập nhật, xóa)
- Sử dụng array PHP để lưu trữ dữ liệu tạm thời

### Git/GitHub
- Khởi tạo repository Git: `git init`
- Thêm các file vào Git: `git add .`
- Commit các thay đổi: `git commit -m "Initial commit"`
- Tạo repository trên GitHub và push code: `git push origin main`

### Kiểm tra và nộp bài
- Chạy ứng dụng trên local server: `php -S localhost:8000 -t public/`
- Kiểm tra tất cả chức năng hoạt động đúng
- Đảm bảo code sạch, có comment và tuân thủ PSR standards
- Nộp bài bằng cách gửi link GitHub repository

## Mô tả bài toán

### Tên bài toán
Mini Library App

### Bối cảnh
Một thư viện nhỏ cần một chương trình đơn giản để:
- Hiển thị danh sách sách
- Cho biết sách còn hay hết
- Đếm số đầu sách
- Lọc sách còn hàng
- Tính tổng số lượng sách còn trong thư viện

Bài toán này phù hợp với Week 1 vì dữ liệu có thể lưu bằng array PHP, chưa cần database, nhưng vẫn đủ để dạy biến, mảng, điều kiện, vòng lặp, hàm và tách file. Đây cũng là kiểu dữ liệu rất gần với CRUD sau này: danh sách record, lọc, lấy cột, tính tổng.

### Yêu cầu chức năng
Ứng dụng phải có:
- Trang chủ
- Trang danh sách sách
- Trạng thái từng sách:
  - Available (Còn hàng)
  - Low stock (Sắp hết hàng - số lượng <= 10)
  - Out of stock (Hết hàng - số lượng <= 0)
- Khu vực thống kê:
  - Tổng số đầu sách
  - Tổng số bản sách
  - Số sách còn hàng

## Ghi nhận công việc đã thực hiện

### Đã làm đầy đủ:
- Trang chủ (index.php): Hiển thị menu điều hướng và giới thiệu ứng dụng
- Trang danh sách sách (items.php): Hiển thị tất cả sách với thông tin chi tiết và trạng thái
- Trang thêm sách (add_item.php): Form để thêm sách mới với validation
- Trang lọc sách sắp hết hàng (low_stock.php): Hiển thị sách có số lượng <= 10
- Thống kê: Tổng số loại sách, tổng số lượng, số sách còn hàng, tổng giá trị tồn kho
- Trạng thái sách: "Còn hàng", "Sắp hết hàng", "Hết hàng"
- Tách file: Logic trong src/Data/ và src/Helpers/
- Giao diện đơn giản với Pico CSS

### Làm thêm:
- Tính tổng giá trị tồn kho
- Format tên sách (viết hoa chữ cái đầu)
- Validation form khi thêm sách
- Giao diện responsive với Pico CSS
- Tự động tăng ID khi thêm sách mới
- Chuyển hướng sau khi thêm sách thành công# php-mini-stationery
