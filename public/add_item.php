<?php
$dataFile = __DIR__ . '/../src/Data/items.php';
$items = require $dataFile;
$errorMessage = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'] ?? '';
    $category = $_POST['category'] ?? '';
    $price = (int)($_POST['price'] ?? 0);
    $quantity = (int)($_POST['quantity'] ?? 0);

    if (empty($name) || empty($category) || $price <= 0 || $quantity < 0) {
        $errorMessage = "Lỗi: Vui lòng nhập đầy đủ thông tin (Giá > 0 và Số lượng >= 0).";
    } else {
        $maxId = 0;
        foreach ($items as $item) {
            if ($item['id'] > $maxId) {
                $maxId = $item['id'];
            }
        }

        $newItem = [
            'id' => $maxId + 1,
            'name' => $name,
            'category' => $category,
            'price' => $price,
            'quantity' => $quantity
        ];

        $items[] = $newItem;
        $fileContent = "<?php\n\nreturn " . var_export($items, true) . ";\n";
        file_put_contents($dataFile, $fileContent);

        header('Location: /items.php');
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en" data-theme="light">
<head>
    <meta charset="UTF-8">
    <title>Thêm sản phẩm - Mini Stationery</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <style>
        nav { border-bottom: 1px solid var(--pico-muted-border-color); margin-bottom: 2rem; padding-bottom: 1rem; }
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

        <article style="max-width: 600px; margin: 0 auto;">
            <header>
                <h2 style="margin-bottom: 0;"><i class='bx bx-add-to-queue'></i> Thêm Mặt hàng Mới</h2>
            </header>

            <?php if ($errorMessage): ?>
                <div style="background-color: #fee2e2; color: #991b1b; padding: 10px 15px; border-radius: 5px; margin-bottom: 20px; border: 1px solid #f87171;">
                    <i class='bx bx-error'></i> <?php echo $errorMessage; ?>
                </div>
            <?php endif; ?>

            <form action="/add_item.php" method="POST" style="margin-bottom: 0;">
                <label for="name">
                    Tên sản phẩm:
                    <input type="text" id="name" name="name" placeholder="VD: Bút chì 2B" required>
                </label>

                <label for="category">
                    Danh mục:
                    <select id="category" name="category" required>
                        <option value="" disabled selected>-- Chọn danh mục --</option>
                        <option value="Bút viết">Bút viết</option>
                        <option value="Sổ tay">Sổ tay</option>
                        <option value="Vật dụng văn phòng">Vật dụng văn phòng</option>
                        <option value="Khác">Khác</option>
                    </select>
                </label>

                <div class="grid">
                    <label for="price">
                        Đơn giá (VNĐ):
                        <input type="number" id="price" name="price" placeholder="VD: 5000" required>
                    </label>

                    <label for="quantity">
                        Số lượng nhập:
                        <input type="number" id="quantity" name="quantity" placeholder="VD: 50" required>
                    </label>
                </div>

                <footer style="margin-top: 2rem; text-align: right;">
                    <a href="/items.php" role="button" class="secondary outline" style="margin-right: 10px;">Hủy bỏ</a>
                    <button type="submit"><i class='bx bx-save'></i> Lưu sản phẩm</button>
                </footer>
            </form>
        </article>

    </main>
</body>
</html>