</head>
<body>
<h2>Посты:</h2>
    <div class="row">
        <?php foreach($posts as $post): ?>
            <li><?= $post['title']?>|Автор: <?= $post['author']?>|<?= $post['date']?></li>
            <i><?= $post['content']?></i>
        <?php endforeach?>
        <div class="text-center">
            <p>Постов: <?=count($posts)?> из <?= $total?></p>
            <?php if($pagination->countPages > 1): ?>
                <?= $pagination ?>
            <?php endif ?>
        </div>
    </div>
</body>
</html>