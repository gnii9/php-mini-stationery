<!DOCTYPE html>
<html lang="en" data-theme="light">
<head>
    <meta charset="UTF-8">
    <title>Trang chủ - Mini Stationery</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <style>
        nav { border-bottom: 1px solid var(--pico-muted-border-color); margin-bottom: 2rem; padding-bottom: 1rem; }
        .hero { text-align: center; padding: 4rem 0 2rem; }
        .hero i { font-size: 5rem; color: var(--pico-primary-background); margin-bottom: 1rem; }
        .feature-card { text-align: center; padding: 2rem; border-radius: 12px; transition: transform 0.2s; text-decoration: none; display: block; color: inherit; }
        .feature-card:hover { transform: translateY(-5px); background-color: var(--pico-form-element-background-color); }
        .feature-card i { font-size: 3rem; margin-bottom: 1rem; color: var(--pico-primary); }
    </style>
</head>
<body>
    <main class="container">
        <nav>
            <ul>
                <li><h2 style="margin: 0; display: flex; align-items: center; gap: 8px;">
                    <i class='bx bx-store-alt'></i> Mini Stationery
                </h2></li>
            </ul>
            <ul>
                <li><a href="/index.php" class="secondary"><i class='bx bx-home'></i> Trang chủ</a></li>
                <li><a href="/items.php" class="secondary"><i class='bx bx-list-ul'></i> Danh sách</a></li>
                <li><a href="/low_stock.php" class="secondary"><i class='bx bx-error-circle'></i> Sắp hết</a></li>
                <li><a href="/add_item.php" role="button" class="outline"><i class='bx bx-plus'></i> Thêm mới</a></li>
            </ul>
        </nav>

        <section class="hero">
            <i class='bx bxs-store'></i>
            <h1>Hệ thống Quản lý Kho Văn phòng phẩm</h1>
            <p style="color: var(--pico-muted-color); font-size: 1.2rem;">Lựa chọn một chức năng bên dưới để bắt đầu công việc của bạn.</p>
        </section>

        <div class="grid" style="margin-top: 2rem;">
            <a href="/items.php" class="feature-card">
                <i class='bx bx-list-check'></i>
                <h3>Xem Danh sách</h3>
                <p>Quản lý toàn bộ mặt hàng, giá cả và số lượng tồn kho.</p>
            </a>
            <a href="/add_item.php" class="feature-card">
                <i class='bx bx-message-square-add'></i>
                <h3>Thêm Sản phẩm</h3>
                <p>Nhập thêm mặt hàng mới vào hệ thống dữ liệu.</p>
            </a>
            <a href="/low_stock.php" class="feature-card">
                <i class='bx bx-bell'></i>
                <h3>Cảnh báo Kho</h3>
                <p>Theo dõi các mặt hàng sắp hết để lên kế hoạch nhập thêm.</p>
            </a>
        </div>
    </main>
</body>
</html>