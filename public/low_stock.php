<?php
$items = require __DIR__ . '/../src/Data/items.php';
require __DIR__ . '/../src/Helpers/functions.php';

// Lọc chỉ lấy hàng sắp hết (<= 10)
$lowStockItems = array_values(array_filter($items, function ($item) {
    return $item['quantity'] <= 10;
}));
?>

<!DOCTYPE html>
<html lang="en" data-theme="light">
<head>
    <meta charset="UTF-8">
    <title>Hàng sắp hết - Mini Stationery</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <style>
        nav { border-bottom: 1px solid var(--pico-muted-border-color); margin-bottom: 2rem; padding-bottom: 1rem; }
        .badge { padding: 4px 10px; border-radius: 50px; font-size: 0.85em; font-weight: 600; display: inline-block; }
        .badge-warning { background-color: #fef3c7; color: #92400e; border: 1px solid #fbbf24; }
        .badge-danger  { background-color: #fee2e2; color: #991b1b; border: 1px solid #f87171; }
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
                <li><a href="/low_stock.php" class="secondary" style="color: #d97706;"><i class='bx bx-error-circle'></i> Sắp hết</a></li>
                <li><a href="/add_item.php" role="button" class="outline"><i class='bx bx-plus'></i> Thêm mới</a></li>
            </ul>
        </nav>

        <header style="margin-bottom: 2rem;">
            <h1 style="color: #b91c1c;"><i class='bx bx-alarm-exclamation'></i> Cảnh báo Hàng sắp hết</h1>
            <p style="color: var(--pico-muted-color);">Danh sách các mặt hàng có số lượng tồn kho dưới 10 cần được nhập gấp.</p>
        </header>

        <?php if (count($lowStockItems) > 0): ?>
            <section>
                <table class="striped">
                    <thead>
                        <tr>
                            <th># ID</th>
                            <th>Tên sản phẩm</th>
                            <th>Danh mục</th>
                            <th style="text-align: center;">Tồn kho</th>
                            <th style="text-align: center;">Trạng thái</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($lowStockItems as $item): ?>
                        <tr>
                            <td style="color: var(--pico-muted-color);">#<?php echo $item['id']; ?></td>
                            <td><strong><?php echo formatItemName($item['name']); ?></strong></td>
                            <td><?php echo $item['category']; ?></td>
                            <td style="text-align: center; font-weight: bold; font-size: 1.2rem; color: #b91c1c;">
                                <?php echo $item['quantity']; ?>
                            </td>
                            <td style="text-align: center;">
                                <?php 
                                    $quantity = $item['quantity'];
                                    $statusText = getStockStatus($quantity);
                                    if ($quantity <= 0) {
                                        echo "<span class='badge badge-danger'><i class='bx bx-x-circle'></i> $statusText</span>";
                                    } else {
                                        echo "<span class='badge badge-warning'><i class='bx bx-error-circle'></i> $statusText</span>";
                                    }
                                ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </section>
        <?php else: ?>
            <article style="text-align: center; padding: 3rem; background: #ecfdf5; border: 1px solid #10b981;">
                <i class='bx bx-check-shield' style="font-size: 4rem; color: #10b981;"></i>
                <h2>Kho hàng an toàn</h2>
                <p>Tuyệt vời! Hiện tại không có mặt hàng nào bị thiếu hụt số lượng.</p>
            </article>
        <?php endif; ?>

    </main>
</body>
</html>