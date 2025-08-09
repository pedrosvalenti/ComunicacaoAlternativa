<?php
// public/index.php - Demo estilizado
$boardJson = file_get_contents(__DIR__.'/../mocks/board_sample.json');
$board = json_decode($boardJson, true);
?>
<!doctype html>
<html lang="pt-BR">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Comunicação Alternativa — Demo</title>
  <link rel="stylesheet" href="style.css">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
</head>
<body>
  <header>
    <h1><?=htmlspecialchars($board['title'])?></h1>
  </header>

  <main>
    <div id="board" class="grid" style="grid-template-columns: repeat(<?= $board['cols']?>, 1fr);">
      <?php foreach($board['cells'] as $cell): ?>
        <button class="cell" data-text="<?=htmlspecialchars($cell['label'])?>">
          <?php if(!empty($cell['image'])): ?>
            <img src="assets/<?=htmlspecialchars($cell['image'])?>" alt="<?=htmlspecialchars($cell['label'])?>">
          <?php endif; ?>
          <div class="label"><?=htmlspecialchars($cell['label'])?></div>
        </button>
      <?php endforeach; ?>
    </div>

    <div id="phrase" aria-live="polite"></div>
  </main>

  <footer>
    <p>💬 Clique nos botões para formar frases | AAC Demo</p>
  </footer>

  <script src="app.js"></script>
</body>
</html>
