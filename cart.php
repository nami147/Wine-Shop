<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body, html {
            height: 100%;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #f0f0f0;
        }

        .a {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
        }

        .b {
            --font-color: #323232;
            --font-color-sub: #666;
            --bg-color: #fff;
            --main-color: #323232;
            --main-focus: #2d8cf0;
            width: 230px;
            background: var(--bg-color);
            border: 2px solid var(--main-color);
            box-shadow: 4px 4px var(--main-color);
            border-radius: 5px;
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            padding: 20px;
            gap: 10px;
            font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        }

        .card-title {
            font-size: 20px;
            font-weight: 500;
            text-align: center;
            color: var(--font-color);
        }

        .card-subtitle {
            font-size: 14px;
            font-weight: 400;
            color: var(--font-color-sub);
        }

        .card-divider {
            width: 100%;
            border: 1px solid var(--main-color);
            border-radius: 50px;
        }

        .card-footer {
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            align-items: center;
        }

        .card-price {
            font-size: 20px;
            font-weight: 500;
            color: var(--font-color);
        }

        .card-price span {
            font-size: 20px;
            font-weight: 500;
            color: var(--font-color-sub);
        }

        .card-btn {
            height: 35px;
            background: var(--bg-color);
            border: 2px solid var(--main-color);
            border-radius: 5px;
            padding: 0 15px;
            transition: all 0.3s;
        }

        .card-btn svg {
            width: 100%;
            height: 100%;
            fill: var(--main-color);
            transition: all 0.3s;
        }

        .card-img:hover {
            transform: translateY(-3px);
        }

        .card-btn:hover {
            border: 2px solid var(--main-focus);
        }

        .card-btn:hover svg {
            fill: var(--main-focus);
        }

        .card-btn:active {
            transform: translateY(3px);
        }
    </style>
</head>
<body>
    <div class="a">
        <?php foreach (Carts::get() as $item) { ?>
            <div class="b">
                <?php $product = Products::fetch($item['user_id']) ?>
                <h1 class="card-title"><?= $product['title'] ?></h1>
                <p class="card-subtitle"><?= $product['description'] ?></p>
                <p class="card-price"><span>€</span><?= $product['price'] ?></p>
                <p><?= $product['quantity'] ?></p>
                <p><?= $product['id'] ?></p>
            </div>
        <?php } ?>
    </div>
</body>
</html>
