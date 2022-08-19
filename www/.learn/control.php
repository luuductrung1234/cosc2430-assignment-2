<html>
<head>
</head>
<body>
<?php $score = 90 ?>
<?php if ($score >= 95): ?>
    <strong>A</strong>
<?php elseif ($score >= 80): ?>
    <strong>B</strong>
<?php elseif ($score >= 70): ?>
    <strong>C</strong>
<?php elseif ($score >= 60): ?>
    <strong>D</strong>
<?php else: ?>
    <strong>F</strong>
<?php endif ?>
</body>
</html>
