<?php
$items = require __DIR__ . '/../src/Data/items.php';
require __DIR__ . '/../src/Helpers/functions.php';

$totalItemTypes = count($items);
$totalQuantity = getTotalQuantity($items);
$availableItems = getAvailableItems($items);
$availableCount = count($availableItems);
$totalValue = calculateTotalValue($items);
?>
<!DOCTYPE html>
<html lang="en" data-theme="light"> <head>
    <meta charset="UTF-8">
    <title>Stationery Items</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    
    <style>
        /* Tùy chỉnh thanh điều hướng (Navbar) */
        nav { border-bottom: 1px solid var(--pico-muted-border-color); margin-bottom: 2rem; padding-bottom: 1rem; }
        
        /* CSS cho các Thẻ thống kê (Cards) */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1.5rem;
            margin-bottom: 3rem;
        }
        .stat-card {
            padding: 1.5rem;
            border-radius: 12px;
            background: var(--pico-card-background-color);
            box-shadow: 0 4px 12px rgba(0,0,0,0.05);
            text-align: center;
            border-top: 4px solid var(--pico-primary-background); /* Viền màu ở trên */
            transition: transform 0.2s; /* Hiệu ứng di chuột */
        }
        .stat-card:hover { transform: translateY(-5px); }
        .stat-card i { font-size: 2.5rem; color: var(--pico-primary-background); margin-bottom: 0.5rem; }
        .stat-card h3 { margin: 0; font-size: 2rem; font-weight: bold; }
        .stat-card p { margin: 0; color: var(--pico-muted-color); font-size: 0.95rem; text-transform: uppercase; letter-spacing: 1px; }

        /* CSS cho Nhãn trạng thái (Badges) */
        .badge {
            padding: 4px 10px;
            border-radius: 50px; /* Bo tròn hoàn toàn 2 đầu */
            font-size: 0.85em;
            font-weight: 600;
            display: inline-block;
        }
        .badge-success { background-color: #d1fae5; color: #065f46; border: 1px solid #34d399; }
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
                <li><a href="/" class="secondary"><i class='bx bx-home'></i> Trang chủ</a></li>
                <li><a href="/add_item.php" role="button" class="outline"><i class='bx bx-plus'></i> Thêm mới</a></li>
            </ul>
        </nav>

        <header style="margin-bottom: 2rem;">
            <h1>Danh sách Văn phòng phẩm</h1>
            <p style="color: var(--pico-muted-color);">Quản lý mặt hàng, số lượng tồn kho và giá cả theo thời gian thực.</p>
        </header>

        <section class="stats-grid">
            <div class="stat-card">
                <i class='bx bx-category'></i>
                <h3><?php echo $totalItemTypes; ?></h3>
                <p>Loại mặt hàng</p>
            </div>
            <div class="stat-card">
                <i class='bx bx-package'></i>
                <h3><?php echo $totalQuantity; ?></h3>
                <p>Tổng sản phẩm tồn</p>
            </div>
            <div class="stat-card">
                <i class='bx bx-check-circle'></i>
                <h3 style="color: #059669;"><?php echo $availableCount; ?></h3>
                <p>Mặt hàng còn hàng</p>
            </div>
            <div class="stat-card">
                <i class='bx bx-wallet'></i>
                <h3><?php echo number_format($totalValue); ?> đ</h3>
                <p>Giá trị kho</p>
            </div>
        </section>

        <section>
            <table class="striped">
                <thead>
                    <tr>
                        <th># ID</th>
                        <th>Tên sản phẩm</th>
                        <th>Danh mục</th>
                        <th style="text-align: right;">Đơn giá</th>
                        <th style="text-align: center;">Tồn kho</th>
                        <th style="text-align: center;">Trạng thái</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($items as $item): ?>
                    <tr>
                        <td style="color: var(--pico-muted-color);">#<?php echo $item['id']; ?></td>
                        <td><strong><?php echo formatItemName($item['name']); ?></strong></td>
                        <td>
                            <span style="display: flex; align-items: center; gap: 5px;">
                                <i class='bx bx-purchase-tag' style="color: var(--pico-muted-color);"></i> 
                                <?php echo $item['category']; ?>
                            </span>
                        </td>
                        <td style="text-align: right; font-family: monospace; font-size: 1.1em;">
                            <?php echo number_format($item['price']); ?> ₫
                        </td>
                        <td style="text-align: center;">
                            <?php echo $item['quantity']; ?>
                        </td>
                        <td style="text-align: center;">
                            <?php 
                                $quantity = $item['quantity'];
                                $statusText = getStockStatus($quantity);
                                
                                // Logic phân loại CSS Class cho Badge
                                $badgeClass = '';
                                if ($quantity <= 0) {
                                    $badgeClass = 'badge-danger';
                                    $icon = "<i class='bx bx-x-circle'></i>";
                                } elseif ($quantity <= 10) {
                                    $badgeClass = 'badge-warning';
                                    $icon = "<i class='bx bx-error-circle'></i>";
                                } else {
                                    $badgeClass = 'badge-success';
                                    $icon = "<i class='bx bx-check'></i>";
                                }
                            ?>
                            <span class="badge <?php echo $badgeClass; ?>">
                                <?php echo $icon . ' ' . $statusText; ?>
                            </span>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </section>

    </main>
</body>
</html>